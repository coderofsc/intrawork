<?php
/*
 * Контроллер выход
 */

/**
 * Class cnt_auth_logout
 */

/**
 * Class cnt_auth_logout
 */
class cnt_auth_logout extends cls_controller {

    protected $user_request;
    private $validate_result  = true;

    /**
     * @return array
     */
    public function get_page_info() {
        $result = array();
        $result["meta_title"]        = L::modules_logout_name;
        return $result;
    }

    /*
     * Конструктор
     */

    /**
     * cnt_auth_logout constructor.
     */
    public function __construct()
    {
    }

    /*
     * Получение запросов пользователя
     */

    public function get_user_request()
    {
        $this->user_request["redirect"] 	= (isset($_GET["redirect"]))?urldecode($_GET["redirect"]):"";
    }

    /*
     * Проверка запросов пользователя
     */

    public function validate()
    {
    }

    /*
     * Печать страницы
     */

    /**
     * @param int $render
     * @return bool
     */
    public function display($render = RENDER_DEFAULT)
    {
        return true;
    }

    /*
     * Точка входа в контроллер
     * Возврат: true/false
     */

    public function process()
    {
        $this->get_user_request();
        cls_alerts::get_instance()->add(L::text_goodbye.", ".m_cuser::get_instance()->get("name"), ALERT_INFO);
        m_cuser::get_instance()->logout();

        header("location: ".HOST_ROOT);
        exit();
    }
}
?>