<?php

class cls_mailman {
    private static $instance;

    private function __construct()
    {
        if (!cls_register::get_instance()->get("smarty")) {
            include DOC_ROOT."classes/smarty/Smarty.class.php";

            $smarty = new Smarty();
            $smarty->setTemplateDir(SMARTY_TPL_DIR);
            $smarty->setCompileDir(SMARTY_TPL_COMPILE_DIR);
            $smarty->setCacheDir(SMARTY_TPL_CACHE_DIR);
            $smarty->compile_check = SMARTY_COMPILE_CHECK;

            cls_register::get_instance()->smarty   = $smarty;

            $ar_access_line_categories = m_categories::get_instance()->get_array(array(), false);
            $cuser_data["ar_access_line_categories"] = $ar_access_line_categories;
            $cuser_data["ar_access_tree_categories"] = cls_tools::get_instance()->map_tree($ar_access_line_categories);

            cls_register::get_instance()->smarty->assign("cuser_data",     $cuser_data);

        }
    }


    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new cls_mailman();
        }
        return self::$instance;
    }

    private function create_message($message_data) {
        $orm = ORM_EXT::for_table("mailman_messages");

        $message_data["from_eid"]   = (m_cuser::get_instance()->is_login())?m_cuser::get_instance()->get("eid"):0;
        $orm->create($message_data)->save();

        if (!$message_id = $orm->id()) {
            return false;
        }

        return $message_id;
    }

    private function send($message_id, $to_eid, $ar_e_copies = array()) {

        if (!$message_id || !$to_eid) {
            return false;
        }

        $data = array();
        $data["message_id"]     = $message_id;
        $data["to_eid"]    = $to_eid;
        $data["json_ar_e_copies"] = json_encode($ar_e_copies);

        $orm = ORM_EXT::for_table("mailman_recipients");
        $orm->create($data);
        $orm->save();

        return $message_id;
    }


    public function send_rt($body_message, $subject, $to, $from = false, $name=false, $light = false) {

        require_once 'swift/swift_required.php';

        $transport = Swift_SmtpTransport::newInstance('localhost', 25);
        $mailer       = Swift_Mailer::newInstance($transport);

        $message = Swift_Message::newInstance();
        $message->setSubject($subject);
        $message->setTo(array($to));
        $message->setFrom(array(config()->mailman_no_reply_address=>L::intrawork));

        if ($from) {
            $message->setReplyTo(array($from=>($name)?$name:null));
        }

        // Подготовка содержимого письма
        $letter_data["subject"]     = $subject;
        $letter_data["message"]     = $body_message;
        ///$letter_data["user_to_id"]  = $message_data["user_to_id"];
        //$letter_data["user_to_fi"]  = $message_data["user_to_fi"];
        //$letter_data["event_id"]    = $message_data["event_id"];

        $letter_data["logo_cid"]    = $message->embed(Swift_Image::fromPath(dirname(__FILE__).'/../resources/images/intrawork-logo.png'));
        $letter_data["logo_cid_vk"] = $message->embed(Swift_Image::fromPath(dirname(__FILE__).'/../resources/images/icon-vk-attached-logo.png'));

        cls_register::get_instance()->smarty->assign("letter_data", $letter_data);
        $message->setBody(cls_register::get_instance()->smarty->fetch("mailman/layout.tpl"), "text/html");


        /*if ($light) {

            cls_register::get_instance()->smarty->assign("message", strip_tags($body_message));
            $message->setBody(trim(cls_register::get_instance()->smarty->fetch("letters/template_main_light.tpl")), "text/plain");

        } else {
            cls_register::get_instance()->smarty->assign("logo_cid", $message->embed(Swift_Image::fromPath(DOC_ROOT.'images/logos/navbar-head-logo.png')));
            cls_register::get_instance()->smarty->assign("logo_cid_vk", $message->embed(Swift_Image::fromPath(DOC_ROOT.'images/icon-vk-attached-logo.png')));

            cls_register::get_instance()->smarty->assign("message", $body_message);
            $message->setBody(trim(cls_register::get_instance()->smarty->fetch("letters/layout.tpl")), "text/html");
        }*/


        $result = $mailer->send($message, $res);

        return $result;
    }

    private function send_notification_crud_observer($message_id, $object_id, $crud, $crud_owner) {

        $crud_table = "users_notification_crud_".(($crud_owner==m_roles::CRUD_OWNER_MODULE)?"module":"categories");

        $sql = "INSERT INTO mailman_recipients (to_eid, message_id)
                (SELECT users.eid, ".$message_id."
                 FROM ".$crud_table." u_n_c
                 INNER JOIN users ON (users.id = u_n_c.user_id)
                 WHERE users.id != ? AND object_id = ? AND (crud & ".intval($crud).") != 0)";

        return ORM_EXT::for_table("mailman_recipients")->raw_execute($sql, array(m_cuser::get_instance()->is_login()?m_cuser::get_instance()->get("id"):0, $object_id));
    }


    /*public function feedback($feedback_data) {
        cls_register::get_instance()->smarty->assign("feedback_data", $feedback_data);
        $message = cls_register::get_instance()->smarty->fetch("letters/template_feedback.tpl");
        //return $this->send_rt($message, "Обратная связь", MAIL_SUPPORT, ($feedback_data["email"])?$feedback_data["email"]:false, ($feedback_data["name"])?$feedback_data["name"]:false);
        return $this->send_rt($message, "Обратная связь", MAIL_SUPPORT, ($feedback_data["email"])?$feedback_data["email"]:false, ($feedback_data["name"])?$feedback_data["name"]:false, true);
    }*/

    public function notification_crud(cls_model $model, $object_id, $crud, $data, $data_decode, $previous_data_decode = array()) {
        $module_id = $model->module_id;
        $object_name = cls_modules::$ar_modules[$module_id]["morph"][0];

        $cat_id = 0;
        if ($module_id == cls_modules::MODULE_DEMANDS) {
            $cat_id = $data["cat_id"];
        }

        cls_register::get_instance()->smarty->assign("module_id",  $module_id);
        cls_register::get_instance()->smarty->assign("module_info",  cls_modules::$ar_modules[$module_id]);
        cls_register::get_instance()->smarty->assign("object_id",  $object_id);
        cls_register::get_instance()->smarty->assign("crud",       $crud);

        //cls_register::get_instance()->smarty->assign("master_field", $model->master_field);
        cls_register::get_instance()->smarty->assign("item_name", cls_events::get_module_item_name($module_id, $data));
        cls_register::get_instance()->smarty->assign("data", $data);
        cls_register::get_instance()->smarty->assign("data_decode", $data_decode);
        cls_register::get_instance()->smarty->assign("previous_data_decode", $previous_data_decode);
        cls_register::get_instance()->smarty->assign("object_name", $object_name);

        $crud_names = array();
        $crud_names[m_roles::CRUD_U] = "update";
        $crud_names[m_roles::CRUD_C] = "create";
        $crud_names[m_roles::CRUD_D] = "delete";


        if (m_cuser::get_instance()->is_login()) {
            $title = m_cuser::get_instance()->get("short_fio")." ";
        } else {
            $title = L::intrawork." ";
        }


        switch ($crud) {
            case m_roles::CRUD_U: $title.= L::modules_events_crud_update." ".L::text_object_morph_one." \"".cls_tools::get_instance()->mb_ucfirst($object_name)."\""; break;
            case m_roles::CRUD_D: $title.= L::modules_events_crud_delete." ".L::text_object_morph_one." \"".cls_tools::get_instance()->mb_ucfirst($object_name)."\""; break;
            case m_roles::CRUD_C:
            default:
             $title = $title.L::modules_events_crud_create." ".L::text_object_morph_one." \"".cls_tools::get_instance()->mb_ucfirst($object_name)."\"";
        }

        $data = array();
        $data["subject"]        = $title;
        $data["message"]        = cls_register::get_instance()->smarty->fetch("mailman/letters/notification/crud_".$crud_names[$crud].".tpl");
        $data["event_id"]       = MAILMAN_EVENT_NOTIFICATION_CRUD;

        if ($module_id == cls_modules::MODULE_DEMANDS) {
            return $this->send_notification_crud_observer($this->create_message($data), $cat_id, $crud, m_roles::CRUD_OWNER_CATEGORIES);
        } else {
            return $this->send_notification_crud_observer($this->create_message($data), $module_id, $crud, m_roles::CRUD_OWNER_MODULE);
        }
    }

    public function demand_message($demand_id, $message_data, $cat_id = 0, $subject_id = true)
    {
        if (!$message_data["to_eid"]) {
            return false;
        }

        // Предыдущее сообщение
        $prev_message_data = m_demands_messages::get_instance()->prev($message_data["id"], $demand_id);
        // Добавить в смарти
        $demand_data = m_demands::get_instance()->get_one($demand_id);

        $message_data["cat_id"] = $demand_data["cat_id"];
        cls_register::get_instance()->smarty->assign("message_data",   $message_data);
        cls_register::get_instance()->smarty->assign("prev_message_data",   $prev_message_data);
        cls_register::get_instance()->smarty->assign("demand_data",    $demand_data);

        $data = array();

        if ($subject_id) {
            $data["subject"]            = "[#".$demand_id."]: ".$message_data["title"];
        } else {
            $data["subject"]            = $message_data["title"];
        }

        $data["message"]       = cls_register::get_instance()->smarty->fetch("mailman/letters/demands/message.tpl");
        $data["event_id"]      = MAILMAN_EVENT_DEMAND_MESSAGE;
        $data["from_eid"]      = $message_data["from_eid"];
        $data["from_mb_id"]    = $message_data["from_mb_id"];

        $ar_attach = array();
        if (isset($message_data["ar_attach"]) && is_array($message_data["ar_attach"])) {
            foreach ($message_data["ar_attach"] as $attach) {
                $ar_attach[] = $attach["id"];
            }
        }

        $data["json_ar_attach"]     = json_encode($ar_attach);

        $ar_e_copies = array();
        if (isset($message_data["ar_copies"]) && is_array($message_data["ar_copies"])) {
            foreach ($message_data["ar_copies"] as $copy) {
                $ar_e_copies[] = intval($copy["user_eid"]);
            }
        }

        return $this->send($this->create_message($data), $message_data["to_eid"], $ar_e_copies);

        //$data =
    }

    // $action - 0 сняли, 1 - назначили
    public function change_member_role($demand_id, $demand_data, $user_eid, $role, $action) {

        if ($user_eid == m_cuser::get_instance()->get("eid")) {
            return true;
        }

        $users = m_users::get_instance()->get_array(array("eid"=>$user_eid));
        $user_data = array_shift($users);

        if ($user_data) {
            cls_register::get_instance()->smarty->assign("demand_data",    $demand_data);
            cls_register::get_instance()->smarty->assign("user_data",      $user_data);
            cls_register::get_instance()->smarty->assign("role",           $role);
            cls_register::get_instance()->smarty->assign("action",         $action);

            $data = array();
            $data["subject"]       = "[#".$demand_id."]: Вас ".(($action)?"назначили на роль":"сняли с роли")." ".(($role==USER_ROLE_EXECUTOR)?"исполнителя":"ответственного");
            $data["message"]       = cls_register::get_instance()->smarty->fetch("mailman/letters/demands/change_member_role.tpl");
            $data["event_id"]      = MAILMAN_EVENT_CHANGE_MEMBER_ROLE;
            $data["from_eid"]      = m_cuser::get_instance()->get("eid");
            $data["from_mb_id"]    = $demand_data["mb_id"];

            return $this->send($this->create_message($data), $user_eid);

        }

        /*cls_register::get_instance()->smarty->assign("message_data", $message_data);

        $data = array();
        $data["subject"]       = "[#".$demand_id."]: ".$message_data["title"];
        $data["message"]       = cls_register::get_instance()->smarty->fetch("mailman/letters/demands/register.tpl");
        $data["event_id"]      = MAILMAN_EVENT_DEMAND_REGISTER;
        $data["from_eid"]      = 0;
        $data["from_mb_id"]    = $message_data["from_mb_id"];

        return $this->send($this->create_message($data), $message_data["from_eid"]);*/
    }

    public function register_demand($demand_id, $message_data) {

        cls_register::get_instance()->smarty->assign("message_data", $message_data);

        $data = array();
        $data["subject"]       = "[#".$demand_id."]: ".$message_data["title"];
        $data["message"]       = cls_register::get_instance()->smarty->fetch("mailman/letters/demands/register.tpl");
        $data["event_id"]      = MAILMAN_EVENT_DEMAND_REGISTER;
        $data["from_eid"]      = 0;
        $data["from_mb_id"]    = $message_data["from_mb_id"];

        return $this->send($this->create_message($data), $message_data["from_eid"]);
    }

    public function forgot_password_query($contact_data, $magic) {
        cls_register::get_instance()->smarty->assign("magic", $magic);
        cls_register::get_instance()->smarty->assign("contact_data", $contact_data);

        $message = cls_register::get_instance()->smarty->fetch("mailman/letters/forgotpass/query.tpl");
        return $this->send_rt($message, L::mailman_subjects_forgot_password_query, $contact_data["email"]);
    }

    public function forgot_password_complete($chpass_data, $contact_data) {

        cls_register::get_instance()->smarty->assign("chpass_data", $chpass_data);
        cls_register::get_instance()->smarty->assign("contact_data", $contact_data);

        $message = cls_register::get_instance()->smarty->fetch("mailman/letters/forgotpass/complete.tpl");
        return $this->send_rt($message, L::mailman_subjects_forgot_password_complete, $contact_data["email"]);
    }


    public function exec_notice($eu_eid, $ar_demands) {

        cls_register::get_instance()->smarty->assign("ar_demands", $ar_demands);

        $data = array();
        $data["subject"]            = L::mailman_subjects_exec_notice;
        $data["message"]            = cls_register::get_instance()->smarty->fetch("mailman/letters/notification/exec_notice.tpl");
        $data["event_id"]           = MAILMAN_EVENT_EXEC_NOTICE;
        $data["from_eid"]      = 0;
        $data["from_mb_id"]         = 0;

        return $this->send($this->create_message($data), $eu_eid);
    }

    public function before_complete($demand_data) {

        cls_register::get_instance()->smarty->assign("demand_data", $demand_data);

        $data = array();
        $data["subject"]            = "[#".$demand_data["id"]."]: ".$demand_data["title"];
        $data["message"]            = cls_register::get_instance()->smarty->fetch("mailman/letters/notification/before_complete.tpl");
        $data["event_id"]           = MAILMAN_EVENT_BEFORE_COMPLETE;
        $data["from_eid"]      = $demand_data["eu_eid"];
        $data["from_mb_id"]         = $demand_data["mb_id"];

        return $this->send($this->create_message($data), $demand_data["cu_eid"]);
    }

    public function user_invitation($user_id, $user_data, $password, $acmp_text = '') {

        $user_data["password"] = $password;
        cls_register::get_instance()->smarty->assign("user_data",  $user_data);
        cls_register::get_instance()->smarty->assign("user_id",    $user_id);
        cls_register::get_instance()->smarty->assign("acmp_text",  $acmp_text);

        $data = array();
        $data["subject"]            = "Добро пожаловать в Интраворк";
        $data["message"]            = cls_register::get_instance()->smarty->fetch("mailman/letters/users/invitation.tpl");
        $data["event_id"]           = MAILMAN_EVENT_USER_INVITATION;
        $data["from_eid"]      = m_cuser::get_instance()->get("eid");
        $data["from_mb_id"]         = 0;

        return $this->send($this->create_message($data), $user_data["eid"]);
    }




}

