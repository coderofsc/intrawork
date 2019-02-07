<?php
/*
 * Контроллер авторизации
 */

define ("STEP_FORGOTPASS_GET_MAGIC",          0);
define ("STEP_FORGOTPASS_MAGIC_SEND",     1);
define ("STEP_FORGOTPASS_SETNEWPASS",            2);
define ("STEP_FORGOTPASS_SETNEWPASS_COMPLETE",   3);

/**
 * Class cnt_auth_forgotpass
 */
class cnt_auth_forgotpass extends  cls_controller {

    protected   $forgotpass_data, $chpass_data, $magic_data;

    private     $validate_result  = true;
    private     $current_step = STEP_FORGOTPASS_GET_MAGIC;

    /**
     * @return array
     */
    public function get_info() {
        $result = array();
        $result["meta_title"]        = L::modules_forgotpass_name;
        $result["render"] = RENDER_LOGIN;

        //$result["path"][] = array("title"=>"Клиентская панель", "url"=>"cp/");

        return $result;
    }

    /*
     * Конструктор
     */

    /**
     * cnt_auth_forgotpass constructor.
     */
    public function __construct()
    {
        $this->magic_data = false;
        $this->current_step 	= (isset($_GET["step"]))?$_GET["step"]:STEP_FORGOTPASS_GET_MAGIC;
    }

    /**
     * @param $user_id
     * @return bool|string
     */
    private function create_query_forgot_password($user_id) {

        $magic = sha1(time().$user_id.PASSWORD_SALT);

        $result = ORM_EXT::for_table("query_forgot_password")->create()
            ->set("user_id", $user_id)
            ->set("magic", $magic)
            ->set_expr("date", "now()")
            ->save();

        if (!$result) {
            return false;
        }

        return $magic;
    }


    /**
     * @return array|bool
     */
    private function is_exists_magic() {

        $orm = ORM_EXT::for_table("query_forgot_password");
        $orm->select_many("query_forgot_password.user_id", "query_forgot_password.magic");
        $orm->where_equal("magic", $this->user_request["magic"]);
        $orm->left_outer_join("users", "users.id = query_forgot_password.user_id");
        $orm->where_raw("date BETWEEN NOW()-INTERVAL 1 MONTH AND NOW()");

        m_users::orm_get_user_data($orm, false);

        if ($result = $orm->find_one()) {
            return $result->as_array();
        }

        return false;
    }

    /*
     * Получение запросов пользователя
     */

    public function get_user_request()
    {
        $this->user_request["magic"] 	= (isset($_GET["magic"]))?$_GET["magic"]:false;

        if ($this->user_request["magic"]) {
            $this->magic_data = $this->is_exists_magic();
        }

        if ($this->current_step == STEP_FORGOTPASS_SETNEWPASS && !$this->magic_data) {
            cls_alerts::get_instance()->add(L::validate_message_forgotpass_unknown_magic, ALERT_ERROR);
            header("location: ".HOST_ROOT."forgotpass/");
            exit();
        }

        $this->forgotpass_data  = $_REQUEST["forgotpass"];
        $this->chpass_data      = $_REQUEST["chpass_data"];

        if (isset($_POST["send"])) {

            // Отправка подтвердения смены пароля
            if ($this->current_step == STEP_FORGOTPASS_GET_MAGIC) {
                if (($ar_errors = $this->validate()) !== true) {
                    cls_alerts::get_instance()->add(array_values($ar_errors), ALERT_ERROR);

                } elseif ($user_data = m_users::get_instance()->find_by_email($this->forgotpass_data["email"])) {

                    $magic = $this->create_query_forgot_password($user_data["id"]);
                    cls_mailman::get_instance()->forgot_password_query($user_data, $magic);

                    header("location: ".cls_tools::get_instance()->add_ncrnd_url(HOST_ROOT."forgotpass/magic_send/"));
                    exit();
                } else {
                    cls_alerts::get_instance()->add(L::validate_message_unknown_user, ALERT_WARNING);
                }

            }
            // Установка нового пароля
            elseif ($this->current_step == STEP_FORGOTPASS_SETNEWPASS) {
                if (($ar_errors = $this->validate()) !== true) {
                    cls_alerts::get_instance()->add(array_values($ar_errors), ALERT_ERROR);
                } elseif (m_users::get_instance()->change_password($this->chpass_data["new_password"], $this->magic_data["user_id"])) {

                    cls_mailman::get_instance()->forgot_password_complete($this->chpass_data, $this->magic_data);
                    header("location: ".cls_tools::get_instance()->add_ncrnd_url(HOST_ROOT."forgotpass/complete/?magic=".$this->user_request["magic"]));
                    exit();
                } else {
                    cls_alerts::get_instance()->add(L::validate_message_forgotpass_unknown_error, ALERT_ERROR);
                }

            }
        }
    }

    /*
     * Проверка запросов пользователя
     */

    /**
     * @return array|bool
     */
    public function validate()
    {
        if ($this->current_step == STEP_FORGOTPASS_GET_MAGIC) {
            $form_rules[] = array("field"=>"email", "label"=>L::forms_labels_email, "rules"=>array("required"=>L::validate_message_required, "valid_email"=>L::validate_message_valid_email));
            $form_rules[] = array("field"=>"captcha",    "label"=>L::forms_labels_captcha, "rules"=>array("valid_captcha[captcha]"=>"Не верно введен %s"));
            $validator = new cls_validator($this->forgotpass_data);
        } else {
            $form_rules[] = array("field"=>"new_password", "label"=>L::forms_labels_password, "rules"=>array("required"=>L::validate_message_required));
            $form_rules[] = array("field"=>"new_password_confirm", "label"=>L::forms_labels_password_confirm, "rules"=>array("required"=>L::validate_message_required, "matches[new_password]"=>L::validate_message_matches_password));

            $validator = new cls_validator($this->chpass_data);
        }

        $validator->set_rules($form_rules);
        $this->validate_result = $validator->run();

        if (!$this->validate_result) {
            return $validator->get_array_errors();
        }

        return true;
    }

    /**
     * @return bool
     */
    public function __action_magic_send() {
        $this->current_step = STEP_FORGOTPASS_MAGIC_SEND;
        $this->get_user_request();

        return true;
    }

    /**
     * @return bool
     */
    public function __action_set_newpass() {
        $this->current_step = STEP_FORGOTPASS_SETNEWPASS;
        $this->get_user_request();

        return true;
    }

    /**
     * @return bool
     */
    public function __action_complete() {
        $this->current_step = STEP_FORGOTPASS_SETNEWPASS_COMPLETE;
        $this->get_user_request();

        return true;
    }

    /*
     * Печать страницы
     */

    /**
     * @param int $render
     * @return string
     * @throws Exception
     * @throws SmartyException
     */
    public function display($render = RENDER_DEFAULT)
    {
        //cls_register::get_instance()->smarty->assign("current_step", $this->current_step);

        if ($this->current_step == STEP_FORGOTPASS_MAGIC_SEND) {
            $current_step_tpl = "magic_send";
        } elseif ($this->current_step == STEP_FORGOTPASS_SETNEWPASS) {
            $current_step_tpl = "set_newpass";
        } elseif ($this->current_step == STEP_FORGOTPASS_SETNEWPASS_COMPLETE) {
            $current_step_tpl = "complete";
        } else {
            $current_step_tpl = "default";
        }

        return cls_register::get_instance()->smarty->fetch("forgotpass/step_".$current_step_tpl.".tpl");
    }

    /*
     * Точка входа в контроллер
     * Возврат: true/false
     */

    /**
     * @return $this
     */
    public function process()
    {
        $this->get_user_request();

        cls_register::get_instance()->smarty->assign("magic_data", $this->magic_data);
        cls_register::get_instance()->smarty->assign("forgotpass", $this->forgotpass_data);

        return $this;
    }
}
?>