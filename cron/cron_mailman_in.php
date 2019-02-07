<?php
define("CRON", true);

// Сбор почты
// Раз в 15 минут


$_SERVER["DOCUMENT_ROOT"] = dirname(dirname($_SERVER["PHP_SELF"])).DIRECTORY_SEPARATOR;
define("DOC_ROOT", $_SERVER["DOCUMENT_ROOT"]);
//define("DOC_ROOT", $_SERVER["DOCUMENT_ROOT"].DIRECTORY_SEPARATOR);

require(DOC_ROOT.'bootstrap.php');
require(DOC_ROOT.'connect_db.php');

include DOC_ROOT."classes/smarty/Smarty.class.php";

$smarty = new Smarty();
$smarty->setTemplateDir(SMARTY_TPL_DIR);
$smarty->setCompileDir(SMARTY_TPL_COMPILE_DIR);
$smarty->setCacheDir(SMARTY_TPL_CACHE_DIR);
$smarty->compile_check = SMARTY_COMPILE_CHECK;

cls_register::get_instance()->smarty = 	$smarty;

require DOC_ROOT.'classes/imap/IncomingMail.php';
require DOC_ROOT.'classes/imap/Mailbox.php';

define("STRANGER", true);

class cls_mailman_in
{
    private static $instance;

    private $mailbox;

    private function __construct()
    {
    }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new cls_mailman_in();
        }
        return self::$instance;
    }

    public function get_mailbots() {
        $orm = ORM_EXT::for_table("mailbots");
        $orm->where_equal("status", 1);
        return $orm->find_array();
    }

    private function get_demand_id(&$subject) {
        preg_match_all('|\[#([\d]+)\]|Ui', $subject, $out);
        $subject = trim(preg_replace('/(^\[#[\d]+\]):(.*)/i', "$2", $subject));

        return (isset($out[1][0]))?intval($out[1][0]):0;
    }

    private function get_user_by_email($email, $mb) {

        $orm = ORM_EXT::for_table("email_addresses")->where_equal("email", $email);
        $orm->select("email_addresses.id", "email_id");
        $orm->select("users.contact_id");
        $orm->left_outer_join("users", "users.eid = email_addresses.id");

        // Если запрещено получение заявок от неизвестных адресов
        if (!config()->limit->accept_mail_from_unknow_users || !$mb["from_unknown"]) {
            $orm->where_not_null("users.id");
        }

        $result = $orm->find_one();

        if ($result) {
            return $result->as_array();
        } elseif (config()->limit->accept_mail_from_unknow_users && $mb["from_unknown"]) {
            // Если адрес не найден - создаем его (если разрешено получение от неизвестных)
            $data = array();
            $data["email"] = $email;
            $orm = ORM_EXT::for_table("email_addresses")->create($data);
            $orm->save();
            return array("email_id"=>$orm->id());
        }

        return false;
    }

    private function get_eid_by_fi($fi) {
        list ($surname, $name) = explode(" ", $fi);

        if ($orm = ORM_EXT::for_table("users")->where_equal("name", $name)->where_equal("surname", $surname)->where_null("delete_date")->find_one()) {
            return $orm->get("eid");
        }

        return 0;
    }

    private function temp_attach($eid, $ar_attachments) {
        $result = array();

        $fs = cls_storage::for_owner(OWNER_DEMAND_MESSAGE)->set_user_eid($eid)->set_dir(STORAGE_DIR_DEMANDS);
        foreach ($ar_attachments as $file) {
            $file_path = $file->filePath;
            $finfo = pathinfo($file_path);
            $file_name = preg_replace("/^(\d+_\d+_)/i", "", trim($finfo["basename"]));

            $storage = $fs->copy($file_path, $file_name);
            $result[$file->id] = $storage;
        }

        return $result;
    }

    private function attach($message_id, $ar_temp_attach) {
        foreach ($ar_temp_attach as $storage) {
            $_POST["ar_attach"]["hash"][] =  $storage["hash"];
        }
        m_demands_messages::get_instance()->attach($message_id);
    }

    private function add_demand($message_data, $ar_attachments = array(), $ar_attach_placeholders) {

        // Если в теме сообщение не было установлен ID заявки, создаем ее
        if (!$message_data["demand_id"]) {
            $message_data["first"] = 1;

            $demand_data = array();
            $demand_data["title"]       = $message_data["title"];
            $demand_data["cu_eid"]      = $message_data["from_eid"];
            $demand_data["contact_id"]  = intval($message_data["contact_id"]);
            $demand_data["cat_id"]      = intval($message_data["cat_id"]);
            $demand_data["type_id"]     = intval($message_data["type_id"]);
            $demand_data["priority"]    = 1;
            $demand_data["mb_id"]       = $message_data["from_mb_id"];

            $message_data["demand_id"] = m_demands::get_instance()->save(false, $demand_data);
        }

        // Заливаем в хранилище аттачи
        $ar_temp_attach = array();
        if ($ar_attachments) {
            $ar_temp_attach = $this->temp_attach($message_data["from_eid"], $ar_attachments);

            foreach($ar_attach_placeholders as $attachmentId => $placeholder) {
                if(isset($ar_temp_attach[$attachmentId])) {
                    $storage = $ar_temp_attach[$attachmentId];
                    $file = STORAGE_DIR.$storage["root"].$storage["dir"].$storage["filename"].".".$storage["ext"];
                    $message_data["message"] = str_replace($placeholder, $file, $message_data["message"]);
                }
            }
        }

        // Создаем сообщение
        $message_id = m_demands_messages::get_instance()->save(0, $message_data);

        // Присваеваем аттачи сообщению
        if ($ar_temp_attach) {
            $this->attach($message_id, $ar_temp_attach);
        }

        // Оповещаем пользователя по его имени
        if ($message_data["to_eid"]) {
            $message_data = m_demands_messages::get_instance()->get_one($message_id);
            cls_mailman::get_instance()->demand_message($message_data["demand_id"], $message_data, null, ($message_data["first"])?true:false);
        }

        return $message_data["demand_id"];
    }
    
    private function get_original_message($text, $type = 'html') {
        if (($start_divider_pos = strpos($text, MAILMAN_ANSWER_DIVIDER)) !== false) {
            $text = substr($text, 0, $start_divider_pos);
        }

        $text = trim(preg_replace('#<script[^>]*>.*?</script>#is', '', $text));

        return $text;
    }

    private function regex_clear_message($text, $ar_regex) {
        $ar_patterns = $ar_replacement = array();

        if (is_array($ar_regex)) {
            foreach ($ar_regex as $item) {
                $ar_patterns[]      = "/".$item["expr"]."/".$item["modifier"];
                $ar_replacement[]   = "";
            }

            // Запускаем правила
            if ($ar_patterns) {
                $text = preg_replace($ar_patterns, $ar_replacement, $text);
            }
        }

        // Удалем лишние пробелы
        $text = trim(preg_replace('/\<br(\s*)?\/?\>/i', PHP_EOL, $text));
        $text = nl2br($text);

        return $text;
    }

    private function send_notification($message_data) {
        cls_mailman::get_instance()->register_demand($message_data["demand_id"], $message_data);
    }

    private function collection_mail($mb) {
        if(!($ar_mail = $this->mailbox->searchMailBox('ALL'))) { return 0; }

        $count = 0;

        foreach ($ar_mail as $mail_id) {
            $message_data = array();
            $mail = $this->mailbox->getMail($mail_id);

            $to_user_fi = array_shift($mail->to);

            if ($from_user = $this->get_user_by_email($mail->fromAddress, $mb)) {
                $message_data["from_eid"]  = $from_user["email_id"];
                // Запоминаем также contact_id, чтобы создать заявку от контакта
                $message_data["contact_id"]     = isset($from_user["contact_id"])?intval($from_user["contact_id"]):0;

            } else {
                $this->mailbox->deleteMail($mail_id);
                continue;
            }

            $message_data["cat_id"]     = $mb["cat_id"];
            $message_data["type_id"]    = $mb["demand_type_id"];

            if ($to_user_fi) {
                $message_data["to_eid"] = $this->get_eid_by_fi($to_user_fi);
            }

            $message_data["title"]      = ($mail->subject)?$mail->subject:"Без заголовка";
            $message_data["from_mb_id"] = $mb["id"];

            if ($demand_id = $this->get_demand_id($message_data["title"])) {
                if (!$demand_data = m_demands::get_instance()->get_one($demand_id)) {
                    $demand_id = 0;
                } elseif (!in_array($demand_data["status"], array(m_demands::STATUS_NEW, m_demands::STATUS_PAUSE, m_demands::STATUS_WORK))) {
                    // СОЗДАВАТЬ НОВУЮ ТОЛЬКО ОТ ПОЛЬЗОВАТЕЛЕЙ ВНЕ СИСТЕМЫ ИЛИ ОТ АВТОРА???
                    // Если завка не активна, создаем новую с вложением закрытой
                    // $message_data["parent_id"] = $demand_id; не ясно, стоит ли связывать. Может вынести в настройки почтового бота?
                    $demand_id = 0;
                }
            }

            $message_data["demand_id"]  = $demand_id;

            if ($mail->textHtml) {
                $message_data["message"] = $this->get_original_message($mail->textHtml, 'html');
            } else if ($mail->textPlain) {
                $message_data["message"] = $this->get_original_message($mail->textPlain, 'text');
            }

            if ($mb["regex"]) {
                $regex = unserialize(html_entity_decode($mb["regex"], ENT_QUOTES));
                $message_data["message"] = $this->regex_clear_message($message_data["message"], $regex);
            }

            if ($demand_id = $this->add_demand($message_data, $mail->getAttachments(), $mail->getInternalLinksPlaceholders())) {
                if ($message_data["demand_id"] != $demand_id && $mb["confirm"]) {
                    $message_data["demand_id"] = $demand_id;
                    $this->send_notification($message_data);
                }

                $this->mailbox->deleteMail($mail_id);
                $count++;
            }
        }

        return $count;
    }

    public function process() {
        $ar_mailbots = $this->get_mailbots();
        $count = 0;

        foreach ($ar_mailbots as $mb) {
            $this->mailbox = new PhpImap\Mailbox('{'.$mb["server"].':'.$mb["port"].'/ssl}INBOX', $mb["login"], $mb["password"], DOC_ROOT.'sessions', "utf-8");

            if ($this->mailbox) {
                $count+=$this->collection_mail($mb);
            }
        }

        return $count;
    }
}

$count = cls_mailman_in::get_instance()->process();

echo "Обработано ".$count." сообщений.";

