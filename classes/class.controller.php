<?php
abstract class cls_controller {
    protected $module_id = 0;
    protected $module_info = null;

    protected $user_request;
    protected $model;
    function __construct() {
        if ($this->module_id) {
            $this->module_info = cls_modules::$ar_modules[$this->module_id];
        }
    }
    function check_access($action, $parameters = array()) { return true; }

    private function get_group() {
        $group_default["by"]     = ($this->model->group["by"])?$this->model->group["by"]:"none";
        $group_default["dir"]    = ($this->model->group["dir"])?$this->model->group["dir"]:SORT_ASC_AZ;
        $group_set["by"]         = $group_set["dir"] = false;

        if (isset($_GET["group"]["by"])) {
            $_SESSION["group"][$this->module_info["alias"]]["by"] = $group_set["by"] = $_GET["group"]["by"];
        } elseif (isset($_SESSION["group"][$this->module_info["alias"]]["by"])) {
            $group_set["by"] = $_SESSION["group"][$this->module_info["alias"]]["by"];
        }

        if (isset($_GET["group"]["dir"])) {
            $_SESSION["group"][$this->module_info["alias"]]["dir"] = $group_set["dir"] = $_GET["group"]["dir"];
        } elseif ($this->module_info && isset($_SESSION["group"][$this->module_info["alias"]]["dir"])) {
            $group_set["dir"] = $_SESSION["group"][$this->module_info["alias"]]["dir"];
        }

        $this->user_request["group"]["by"]	        = ($group_set["by"]=="none" || ($group_set["by"] && in_array($group_set["by"], array_keys($this->model->ar_group))))?($group_set["by"]):$group_default["by"];
        $this->user_request["group"]["dir"]	        = ($group_set["dir"] && in_array($group_set["dir"], array(SORT_DSC_ZA, SORT_ASC_AZ)))?($group_set["dir"]):$group_default["dir"];

        if (!$this->user_request["group"]["by"]) {
            unset($this->user_request["group"]["by"]);
        }
    }


    private function get_sort() {
        $sort_default["by"]     = $this->model->sort["by"];
        $sort_default["dir"]    = $this->model->sort["dir"];
        $sort_set["by"]         = $sort_set["dir"] = false;

        if (isset($_GET["sort"]["by"])) {
            $_SESSION["sort"][$this->module_info["alias"]]["by"] = $sort_set["by"] = $_GET["sort"]["by"];
        } elseif (isset($_SESSION["sort"][$this->module_info["alias"]]["by"])) {
            $sort_set["by"] = $_SESSION["sort"][$this->module_info["alias"]]["by"];
        }

        if (isset($_GET["sort"]["dir"])) {
            $_SESSION["sort"][$this->module_info["alias"]]["dir"] = $sort_set["dir"] = $_GET["sort"]["dir"];
        } elseif ($this->module_info && isset($_SESSION["sort"][$this->module_info["alias"]]["dir"])) {
            $sort_set["dir"] = $_SESSION["sort"][$this->module_info["alias"]]["dir"];
        }

        $this->user_request["sort"]["by"]	        = ($sort_set["by"] && in_array($sort_set["by"], array_keys($this->model->ar_sort)))?($sort_set["by"]):$sort_default["by"];
        $this->user_request["sort"]["dir"]	        = ($sort_set["dir"] && in_array($sort_set["dir"], array(SORT_DSC_ZA, SORT_ASC_AZ)))?($sort_set["dir"]):$sort_default["dir"];
    }

    function get_user_request() {
        // Используется по всех контрллерах в form/view/list
        $this->user_request["conditions"]	= (isset($_GET["cnd"]))?$this->model->clear_conditions($_GET["cnd"]):array();
        $this->get_sort();
        $this->get_group();
    }

    abstract function validate();
    abstract function display($render = RENDER_DEFAULT);
    function process() { }
}


