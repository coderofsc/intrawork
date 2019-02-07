<?php
abstract class cls_controllerform extends cls_controller {
    protected $validate_result = true;
    protected $data_prefix = false;
    protected $data = array(), $original_data = array(), $previous_data = array();

    public    $storage_data = array();
    public    $storage_field = array();

    protected $attach_storage_dir = false;
    protected $attach_owner = OWNER_COMMENT;

    private $ar_errors = array();

    public function __construct()
    {
        $called_class = explode("_", substr(get_called_class(), 4));
        array_pop($called_class);
        $model_name = "m_".implode("_", $called_class);

        $this->model = $model_name::get_instance();

        if (!$this->data_prefix) {
            $this->data_prefix = substr($this->model->get_table_name(),0, -1);
        }

        if ($this->module_id === 0) {
            $module_id = "cls_modules::MODULE_".mb_strtoupper($this->model->get_table_name());
            $this->module_id = constant($module_id);
        }

        if (!$this->attach_storage_dir) {
            $this->attach_storage_dir = STORAGE_DIR_COMMENTS.$this->model->get_table_name()."/";
        }

        parent::__construct();
    }

    public function __action_attach($id = 0) {

        $result = array();
        $result["status"] = 0;

        //var_dump($this->attach_storage_dir, $this->attach_owner);

        if ($this->attach_storage_dir && $this->attach_owner) {
            $fs = cls_storage::for_owner($this->attach_owner);
            $fs->set_dir($this->attach_storage_dir);

            if ($result = $fs->upload("file")) {
                $result["status"] = 1;
            } else {
                $result["status"] = 0;
            }
        }

        echo json_encode($result);
        exit;
    }

    /**
     * @param $action
     * @param array $parameters
     * @return bool
     */

    function check_access($action, $parameters = array()) {
        if ($this->module_id) {
            $action_crud = ($this->user_request["id"])?m_roles::CRUD_U:m_roles::CRUD_C;
            return m_cuser::get_instance()->check_access_module($this->module_id, $action_crud);
        }

        return true;
    }

    public function get_actions() {
        $result = array();
        $result[] = array("name"=>"<span class='hidden-xs'>".L::actions_view."</span>", "icon"=>"eye", "href"=>$this->module_info["alias"]."/view/".$this->data["id"]."/");

        if (m_cuser::get_instance()->check_access_module($this->module_id, m_roles::CRUD_D)) {
            $result[] = array("name"=>"<span class='hidden-xs'>".L::actions_delete."</span>", "delete"=>true, "icon"=>"times", "type"=>"danger", "href"=>$this->module_info["alias"]."/delete/".$this->data["id"]."/?reports=true");
        }

        return $result;
    }


    public function get_info() {

        if ($this->user_request["id"]) {
            if ($this->data) {
                $object_name = trim($this->original_data[$this->model->master_field]);
                $result["meta_title"] = L::forms_actions_edit." ".$this->module_info["morph"][1]." <span class='rec-title'>«".$object_name."»</span>";
                $result["actions"] = $this->get_actions();

            } else {
                $result["meta_title"] = cls_tools::get_instance()->mb_ucfirst($this->module_info["morph"][0])." №".intval($this->user_request["id"])." не найдена";
            }

        } else {
            $result["meta_title"] = L::forms_actions_create." ".$this->module_info["morph"][1]." <span class='rec-title'></span>";
        }

        $result["path"][] = array("title"=>$this->module_info["name"], "url"=>$this->module_info["alias"]."/");

        $result["module_id"]    = $this->module_id;
        $result["module"]       = $this->module_info;

        return $result;
    }

    public function save() {
        return $this->model->save($this->user_request["id"], $this->data, $this->previous_data);
    }

    public function save_success() {
        /*var_dump($this->data);
        $this->model->
        exit;*/
        //$diff_data = array_diff_assoc($this->data, $this->previous_data);
        //cls_events::get_instance()->trigger($this->module_id, ($this->user_request["id"])?m_roles::CRUD_U:m_roles::CRUD_C);

        $ar_message_part = array();
        $ar_message_part[] = cls_tools::get_instance()->mb_ucfirst(L::text_object_morph_one);
        $ar_message_part[] = "(ID:".$this->data["id"].")";

        $object_name = cls_tools::get_instance()->mb_ucfirst($this->module_info["morph"][0]);
        if (isset($this->data[$this->model->master_field])) {
            $ar_message_part[] = "&laquo;".$object_name." &mdash; ".$this->data[$this->model->master_field]."&raquo;";
        } else {
            $ar_message_part[] = "&laquo;".$object_name."&raquo;";
        }

        $ar_message_part[] = "успешно";
        $ar_message_part[] = (($this->user_request["id"])?"изменен":"добавлен");

        cls_alerts::get_instance()->add(implode(" ", $ar_message_part), ALERT_SUCCESS);
    }

    public function save_error() {
        cls_alerts::get_instance()->add("Произошла ошибка ".(($this->user_request["id"])?"сохранения":"добавления")." ".$this->module_info["morph"][1].", напишите на ".IW_EMAIL_SUPPORT, ALERT_ERROR);
    }

    protected function get_redirect_location($redirect, $id) {
        switch ($redirect) {
            case FORM_NA_VIEW:
                $location = $this->module_info["alias"]."/view/".$id."/";
                break;
            case FORM_NA_CREATE:
                $location = $this->module_info["alias"]."/create/";
                break;
            case FORM_NA_LIST:
                $location = $this->module_info["alias"]."/";
                break;
            case FORM_NA_STAY:
            default:
                $location = cls_tools::get_instance()->add_ncrnd_url(cls_tools::get_instance()->get_current_url(false, true));
                break;
        }

        return $location;

    }

    public function redirect($id) {

        $redirect = isset($_POST["next_redirect"])?intval($_POST["next_redirect"]):FORM_NA_LIST;
        $_SESSION["next_redirect"][$this->module_info["alias"]] = $redirect;

        $location = $this->get_redirect_location($redirect, $id);
        //echo HOST_ROOT.$location;

        header("location: ".HOST_ROOT.$location);
        exit();
    }

    protected function get_storage_data() {
        $this->storage_data = isset($_SESSION["storage_data"])?$_SESSION["storage_data"]:array();
        $this->storage_field = array_keys($this->storage_data);

        if (!$this->user_request["id"]) {
            foreach ($this->storage_data as $field=>$data) {
                $this->data[$field] = $data;
            }
        }
    }

    public function get_user_request()
    {
        // parent::get_user_request(); -- включить если нужен next_prev механизм

        if (isset($_POST["save"])) {
            $_SESSION["storage_data"] = array();
            if ($_POST["storage_field"]) {
                foreach ($_POST["storage_field"] as $field) {
                    if (is_array($_POST[$this->data_prefix."_data"][$field])) {
                        $_SESSION["storage_data"][$field] = $_POST[$this->data_prefix."_data"][$field];
                    } else {
                        $_SESSION["storage_data"][$field] = htmlentities($_POST[$this->data_prefix."_data"][$field], null, 'utf-8');
                    }
                }
            }
        }

        $this->get_storage_data();

        if ($_REQUEST[$this->data_prefix."_data"]) {

            // Почему, не на оба метода merge???
            if ($_GET[$this->data_prefix."_data"]) {
                $this->data = array_merge($this->data, $_REQUEST[$this->data_prefix."_data"]);
            } else {
                $this->data = $_REQUEST[$this->data_prefix."_data"];
            }


            if ($this->user_request["id"]) {
                $this->data["id"] = $this->user_request["id"];
            }
        }

        if (isset($_POST["save"])) {

            if (($this->ar_errors = $this->validate()) !== true) {
                cls_alerts::get_instance()->add(array_values($this->ar_errors), ALERT_ERROR);
            } else {

                if (!$id = $this->save()) {
                    $this->save_error();
                } else {
                    $this->data["id"] = $id;
                    $this->save_success();
                }

                $this->redirect($id);
            }
        }
    }

    public function get_form_rules() {
        return array();
    }

    public function validate()
    {
        $result = true;

        $validator = new cls_validator($this->data);
        $validator->set_rules($this->get_form_rules());
        $this->validate_result = $validator->run();

        if (!$this->validate_result) {
            $result = $validator->get_array_errors();
        }

        return $result;
    }

    private function not_found() {
        //$delete_event = cls_events::get_instance()->get_events($this->module_id, $this->user_request["id"], m_roles::CRUD_D);

        $ar_conditions = array();
        $ar_conditions["module_id"] = $this->module_id;
        $ar_conditions["object_id"] = $this->user_request["id"];
        $ar_conditions["crud"]      = m_roles::CRUD_D;

        if ($delete_event = m_events::get_instance()->get_array($ar_conditions, 1)) {
            $delete_event = array_shift($delete_event);
        }

        cls_register::get_instance()->smarty->assign("delete_event", $delete_event);
        cls_register::get_instance()->smarty->assign("id", $this->user_request["id"]);
        return cls_register::get_instance()->smarty->fetch("object_not_fount.tpl");
    }

    public function display($render = RENDER_DEFAULT)
    {
        if ($this->user_request["id"] && !$this->data) {
            return $this->not_found();
        } else {
            return cls_register::get_instance()->smarty->fetch(str_replace('_', '/', $this->model->get_table_name())."/form/layout.tpl");
        }
    }

    public function process($id = false)
    {
        $this->user_request["id"] = $id;

        if ($this->user_request["id"] /*&& $this->validate_result -- если только после get_user_request*/) {
            $this->data = $this->original_data = $this->model->get_one($this->user_request["id"], true, true);

            if (!$this->data) {
                return true;
            }
        }

        $this->get_user_request();

        cls_register::get_instance()->smarty->assign($this->data_prefix."_data", $this->data);
        cls_register::get_instance()->smarty->assign("ar_errors_form", $this->ar_errors);
        cls_register::get_instance()->smarty->assign("storage_field", $this->storage_field);

        return true;
    }
}



