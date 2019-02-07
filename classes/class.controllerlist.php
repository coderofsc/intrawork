<?php
abstract class cls_controllerlist extends cls_controller {
    public      $total        = 0;
    protected   $LIMIT_LIST   = 30;
    protected   $detailed     = true;

    public function __construct()
    {
        $model_name = "m_".substr(get_called_class(), 4);
        $this->model = $model_name::get_instance();

        //$this->sort = array("dir"=>$this->model->sort["dir"], "by"=>$this->model->sort["by"]);

        if (!$this->module_id) {
            $module_id = "cls_modules::MODULE_".mb_strtoupper($this->model->get_table_name());
            $this->module_id = constant($module_id);
        }

        parent::__construct();
    }

    function check_access($action, $parameters = array()) {
        if ($this->module_id) {
            switch ($action) {
                case "delete"   : $action_crud = m_roles::CRUD_D; break;
                default         : $action_crud = m_roles::CRUD_R; break;
            }
            return m_cuser::get_instance()->check_access_module($this->module_id, $action_crud);
        }
        return true;
    }

    public function get_actions() {
        $result = array();
        if (m_cuser::get_instance()->check_access_module($this->module_id, m_roles::CRUD_C)) {
            $result[] = array("name"=>"<span class='hidden-xs'>".L::actions_add."</span>", "icon"=>"plus", "href"=>$this->module_info["alias"]."/create/");
        }

        return $result;
    }

    protected function get_layout($comments = false) {
        $center__childOptions = array("name"=>"middle_layout");
        $center__childOptions["center"]   = array("size"=>"40%", "minWidth"=>'350', "onresize_end"=>"layout_resize_end");
        $center__childOptions["east"]     = array("size"=>"60%", "minSize"=>'350', "initClosed"=>config()->layout_west_initclosed );

        if ($comments) {
            $east__childOptions = array("name"=>$this->module_info["alias"]."_layout");
            $east__childOptions["south"]        = array("size"=>"250", "minSize"=>'200', "initHidden"=>true, "showOverflowOnHover"=>true);
            $center__childOptions["east"]["childOptions"] = $east__childOptions;
        }

        return $center__childOptions;
    }

    public function get_info() {

        $result = array();
        $result["meta_title"] = $this->module_info["name"];

        $result["actions"] = $this->get_actions();

        $result["ar_sort"]      = $this->model->ar_sort;
        $result["ar_group"]      = $this->model->ar_group;
        $result["module_id"]    = $this->module_id;
        $result["module"]       = $this->module_info;
        $result["total"]        = $this->total;

        if ($center__childOptions = $this->get_layout($this->module_info["comments"])) {
            $result["layout"]["center"]["childOptions"]["center"]["childOptions"] = $center__childOptions;
            $result["layout"]["stateManagement__includeChildren"] = false;
        }

        return $result;
    }

    public function delete_success() {
        cls_alerts::get_instance()->add(cls_tools::get_instance()->mb_ucfirst($this->module_info["morph"][0])." успешно удалена", ALERT_SUCCESS);
    }

    public function delete_error() {
        cls_alerts::get_instance()->add("Произошла ошибка удаления ".$this->module_info["morph"][1].", напишите на ".IW_EMAIL_SUPPORT, ALERT_ERROR);
    }

    public function restore_success() {
        cls_alerts::get_instance()->add(cls_tools::get_instance()->mb_ucfirst($this->module_info["morph"][0])." успешно восстановлена", ALERT_SUCCESS);
    }

    public function restore_error() {
        cls_alerts::get_instance()->add("Произошла ошибка восстановления ".$this->module_info["morph"][1].", напишите на ".IW_EMAIL_SUPPORT, ALERT_ERROR);
    }

    public function __action_delete($id = 0) {
        $report = isset($_GET["reports"])?true:false;

        $result = array();

        if ($result["status"] = $this->model->delete($id)) {
            if ($report) {
                $this->delete_success();
            }
        } else {
            $this->delete_error();
        }

        if (cls_tools::get_instance()->is_ajax()) {
            echo json_encode($result);
            exit;
        }

        header("location: ".HOST_ROOT.$this->module_info["alias"]."/");
        exit;

    }

    public function get_user_request()
    {
        parent::get_user_request();

        $this->user_request["limit"]	= (isset($_GET["limit"]))?intval($_GET["limit"]):$this->LIMIT_LIST;
        $this->user_request["offset"]	= (isset($_GET["offset"]))?intval($_GET["offset"]):0;

        if (!isset($_GET["page"])) {
            $this->user_request["offset"]	= (isset($_GET["offset"]))?intval($_GET["offset"]):0;
        } else {
            $this->user_request["offset"]	= (isset($_GET["page"]))?(intval($_GET["page"])*$this->LIMIT_LIST):0;
        }

        $this->user_request["continue"]	= (isset($_GET["continue"]))?true:false;
    }

    public function validate()
    {
        return true;
    }

    public function display($render = RENDER_DEFAULT)
    {
        $tpldir = str_replace('_', '/', substr(get_class($this->model),2));

        if ($this->user_request["continue"]) {
            $content = cls_register::get_instance()->smarty->fetch($tpldir."/list.tpl");
        } else {
            $content = cls_register::get_instance()->smarty->fetch($tpldir."/layout.tpl");
        }

        /*var_dump($content);
        exit;*/

        if ($render == RENDER_JSON) {
            $result["data"]     = $content;
            $result["total"]       = $this->total;
            $result["offset"]      = $this->user_request["offset"];
            $result["limit"]       = $this->user_request["limit"];
            //$result["conditions"]  = http_build_query($this->user_request["conditions"]);
            //$result["group"]       = $this->user_request["group"];
            $result["status"]   = 1;

            return $result;
        }

        return $content;
    }

    public function process() {
        $this->get_user_request();

        $ar_name = "ar_".substr(get_class($this->model),2);

        $ar_data = array();

        $ar_data["data"]        = $this->model->get_array($this->user_request["conditions"], $this->user_request["limit"], $this->user_request["offset"], $this->user_request["sort"], $this->total, $this->detailed, false, $this->user_request["group"]);

        if ($this->total && $this->total <= $this->user_request["offset"]) {
            //var_dump($this->user_request["offset"]);
            $this->user_request["offset"]=ceil($this->total/$this->LIMIT_LIST)*$this->LIMIT_LIST-1;
            $ar_data["data"]        = $this->model->get_array($this->user_request["conditions"], $this->user_request["limit"], $this->user_request["offset"], $this->user_request["sort"], $this->total, true, false, $this->user_request["group"]);
            //var_dump($this->user_request["offset"]);
            //exit;
        }

        $ar_data["total"]       = $this->total;
        $ar_data["offset"]      = $this->user_request["offset"];
        $ar_data["limit"]       = $this->user_request["limit"];
        $ar_data["conditions"]  = $this->user_request["conditions"];
        $ar_data["group"]       = $this->user_request["group"];

        //var_dump($$ar_name);
        //exit;
        cls_register::get_instance()->smarty->assign($ar_name, $ar_data);


        if (!$this->total) {
            //$this->ar_sort = array();
        }

        cls_register::get_instance()->smarty->assign("conditions", $this->user_request["conditions"]);
        cls_register::get_instance()->smarty->assign("sort",       $this->user_request["sort"]);
        cls_register::get_instance()->smarty->assign("group",       $this->user_request["group"]);
        //cls_register::get_instance()->smarty->assign("offset",     $this->user_request["offset"]);
        //cls_register::get_instance()->smarty->assign("limit",      $this->user_request["limit"]);
        //cls_register::get_instance()->smarty->assign("total",      $this->total);

        return true;
    }
}



