<?php
define("CRON", true);

$_SERVER["DOCUMENT_ROOT"] = dirname(dirname($_SERVER["PHP_SELF"])).DIRECTORY_SEPARATOR;
define("DOC_ROOT", $_SERVER["DOCUMENT_ROOT"]);

//define("DOC_ROOT", $_SERVER["DOCUMENT_ROOT"].DIRECTORY_SEPARATOR);

require DOC_ROOT.'classes/swift/swift_required.php';
require DOC_ROOT.'bootstrap.php';
require DOC_ROOT.'connect_db.php';
include DOC_ROOT."classes/smarty/Smarty.class.php";

$smarty = new Smarty();
$smarty->setTemplateDir(SMARTY_TPL_DIR);
$smarty->setCompileDir(SMARTY_TPL_COMPILE_DIR);
$smarty->setCacheDir(SMARTY_TPL_CACHE_DIR);
$smarty->compile_check = SMARTY_COMPILE_CHECK;

cls_register::get_instance()->smarty = 	$smarty;

class cls_mailman_out {
    private static $instance;
    private $transport, $mailer;

    public $ar_send = array();

    private function __construct() {
        $this->transport = Swift_SmtpTransport::newInstance('localhost', 25);
        $this->mailer       = Swift_Mailer::newInstance($this->transport);
    }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new cls_mailman_out();
        }
        return self::$instance;
    }

    function get_messages() {
        $orm = ORM_EXT::for_table("mailman_recipients");
        $orm->table_alias("m_r");

        $orm->select_many("m_r.id", "m_r.json_ar_e_copies");
        $orm->select_many("m_m.subject", "m_m.message", "m_m.json_ar_attach", "m_m.from_eid", "m_m.event_id");

        $orm->left_outer_join("mailman_messages", "m_m.id = m_r.message_id", "m_m");

        $orm->left_outer_join("mailbots", "m_m.from_mb_id = mailbots.id")
            ->select("mailbots.id",         "mb_id")
            ->select("mailbots.address",    "mb_address")
            ->select("mailbots.name",       "mb_name")
            ->select("mailbots.footer",     "mb_footer");

        $orm->inner_join("email_addresses", "to_e_a.id = m_r.to_eid", "to_e_a")
            ->left_outer_join("users", "to_e_a.id = user_to.eid", "user_to")
            ->select("user_to.id",     "user_to_id")
            ->select("to_e_a.email",  "user_to_email")
            ->select("to_e_a.id",     "user_to_eid")
            ->select_expr("CONCAT(user_to.surname, ' ', LEFT(user_to.name,1 ),'.', IF(user_to.patronymic<>'', CONCAT(LEFT(user_to.patronymic, 1),'.'), ''))", "user_to_short_fio")
            ->select_expr("CONCAT(user_to.surname, ' ', user_to.name)", "user_to_fi");

        $orm->left_outer_join("email_addresses", "from_e_a.id = m_m.from_eid", "from_e_a")
            ->left_outer_join("users", "from_e_a.id = user_from.eid", "user_from")
            ->select("user_from.id",     "user_from_id")
            ->select("from_e_a.email",  "user_from_email")
            ->select("from_e_a.id",     "user_from_eid")
            ->select_expr("CONCAT(user_from.surname, ' ', LEFT(user_from.name,1 ),'.', IF(user_from.patronymic<>'', CONCAT(LEFT(user_from.patronymic, 1),'.'), ''))", "user_from_short_fio")
            ->select_expr("CONCAT(user_from.surname, ' ', user_from.name)", "user_from_fi");

        $orm->limit(10);
        $result = $orm->find_array();

        return $result;
    }

    function get_users_by_eid($ar_e_id) {
        $orm = ORM_EXT::for_table("email_addresses");
        $orm->table_alias("e_a");
        $orm->left_outer_join("users", "e_a.id = user.eid", "user")
            ->select("user.id",     "id")
            ->select("e_a.email",  "email")
            ->select("e_a.id",     "eid")
            ->select_expr("CONCAT(user.surname, ' ', LEFT(user.name,1 ),'.', IF(user.patronymic<>'', CONCAT(LEFT(user.patronymic, 1),'.'), ''))", "short_fio")
            ->select_expr("CONCAT(user.surname, ' ', user.name)", "fi");

        $orm->where_in("e_a.id", $ar_e_id);

        return $orm->find_array();
    }

    function get_file_fs($ar_id) {
        return ORM_EXT::for_table("file_storage")->where_equal("owner", OWNER_DEMAND_MESSAGE)->where_in("id", $ar_id)->find_assoc();
    }

    function __cc(Swift_Message &$message, $ar_e_copies) {
        $ar_users = $this->get_users_by_eid($ar_e_copies);
        $ar_addressee = array();
        foreach ($ar_users as $user) {
            if ($user["id"]) {
                $ar_addressee[$user["email"]] = $user["fi"];
            } else {
                $ar_addressee[] = $user["email"];
            }
        }
        $message->setCc($ar_addressee);
    }

    function __attachments(Swift_Message &$message, $ar_attach) {
        $ar_files = $this->get_file_fs($ar_attach);

        foreach ($ar_files as $file) {
            $path = HOST_ROOT.STORAGE_DIR.STORAGE_DIR_DEMANDS.cls_storage::hash2dir($file["hash"]).$file["hash"].".".$file["ext"];
            $message->attach(Swift_Attachment::fromPath($path, $file["mimetype"])->setFilename($file["name"])->setDisposition('inline'));
        }
    }

    function send($message_data, $ar_e_copies = array(), $ar_attach = array()) {

        $letter_data = array();

        // Настройка заголовоков письма
        $message = Swift_Message::newInstance();
        $message->setSubject($message_data["subject"]);

        if ($message_data["user_to_id"]) {
            $message->setTo(array($message_data["user_to_email"]=>$message_data["user_to_fi"]));
        } else {
            $message->setTo(array($message_data["user_to_email"]));
        }

        if ($message_data["mb_id"]) {
            // Сообщения требующие ответа (от почтовых ботов)
            $from = array($message_data["mb_address"]=>(($message_data["from_eid"])?$message_data["user_from_fi"]:$message_data["mb_name"]));
            $message->setFrom($from);
        } else {
            // Служебные сообщения
            $message->setFrom(array(config()->mailman_no_reply_address=>L::intrawork));
        }

        // Копии
        if ($ar_e_copies) {
            $this->__cc($message, $ar_e_copies);
        }

        // Вложения
        if ($ar_attach) {
            $this->__attachments($message, $ar_attach);
        }

        // Подготовка содержимого письма
        $letter_data["subject"]     = $message_data["subject"];
        $letter_data["message"]     = $message_data["message"];
        $letter_data["user_to_id"]  = $message_data["user_to_id"];
        $letter_data["user_to_fi"]  = $message_data["user_to_fi"];
        $letter_data["event_id"]    = $message_data["event_id"];
        $letter_data["footer"]      = $message_data["mb_footer"];

        // Если сообщение от почтового бота, отключаем приветствие и добавляем разделитель
        if ($message_data["mb_id"]) {
            $letter_data["greeting"]    = false;
            $letter_data["answer"]      = true;
        }

        // Если письмо НЕ от бота или футер выключен
        if (!$message_data["mb_id"] || $letter_data["footer"]) {
            $letter_data["logo_cid"]    = $message->embed(Swift_Image::fromPath(dirname(__FILE__).'/../resources/images/intrawork-logo.png'));
            $letter_data["logo_cid_vk"] = $message->embed(Swift_Image::fromPath(dirname(__FILE__).'/../resources/images/icon-vk-attached-logo.png'));
        }

        cls_register::get_instance()->smarty->assign("letter_data", $letter_data);
        $message->setBody(cls_register::get_instance()->smarty->fetch("mailman/layout.tpl"), "text/html");

        $result = $this->mailer->send($message, $res);

        if ($result) {

            // Добавить инкремент почтовым ботам...
            //var_dump($message_data);
            //exit;

            $this->ar_send[] = $message_data["id"];
        }
    }

    function cleaning() {
        ORM_EXT::for_table("mailman_recipients")->where_in("mailman_recipients.id", $this->ar_send)->delete_many();
        ORM_EXT::for_table("mailman_messages")->where_raw("NOT EXISTS(SELECT id FROM mailman_recipients m_r WHERE mailman_messages.id = m_r.message_id)")->delete_many();
    }

    function process() {
        $ar_messages = $this->get_messages();

        foreach ($ar_messages as $message) {
            $ar_e_copies    = json_decode($message["json_ar_e_copies"]);
            $ar_attach      = json_decode($message["json_ar_attach"]);

            $this->send($message, $ar_e_copies, $ar_attach);
        }

        if ($this->ar_send) {
            $this->cleaning();
        }

        return $this->ar_send;
    }
}

$ar_send = cls_mailman_out::get_instance()->process();

echo "Отправлено: ".sizeof($ar_send);

