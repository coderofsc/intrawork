<?php
abstract class cls_controllerview extends cls_controller {
    protected $data_prefix = false;
    protected $data;

    public function __construct()
    {
        $called_class = explode("_", substr(get_called_class(), 4));
        array_pop($called_class);
        $model_name = "m_".implode("_", $called_class);
        $this->model = $model_name::get_instance();

        if (!$this->data_prefix) {
            $this->data_prefix = substr($this->model->get_table_name(),0, -1);
        }

        if (!$this->module_id) {
            $module_id = "cls_modules::MODULE_".mb_strtoupper($this->model->get_table_name());
            $this->module_id = constant($module_id);
        }

        parent::__construct();

    }

    function check_access($action, $parameters = array()) {
        if ($this->module_id) {
            return m_cuser::get_instance()->check_access_module($this->module_id, m_roles::CRUD_R);
        }
        return true;
    }

    public function __action_add_comment($owner_id) {
        $result = array();
        $result["status"] = STATUS_METHOD_NOT_ALLOWED;

        if ($this->module_info["comments"]) {
            $comment_data = isset($_POST["comment_data"])?$_POST["comment_data"]:array();

            if ($comment_data && $owner_id && $comment_data["text"]) {
                $m_comments = m_comments::singleton($this->module_id, intval($owner_id));

                if ($comment_id = $m_comments->save(0, $comment_data)) {
                    $result["status"] = STATUS_OK;

                    // Присоеденяем аттачи
                    $m_comments->attach($comment_id);

                    $comment_data = $m_comments->get_one($comment_id);
                    cls_register::get_instance()->smarty->assign("comment", $comment_data);
                    $result["data"] = cls_register::get_instance()->smarty->fetch("comments/item.tpl");
                }

            }
        }

        echo json_encode($result);
        exit();
    }

    public function __action_get_next_prev_id($id) {
        $this->get_user_request();

        $result["data"] = $this->get_next_prev_id($id);
        $result["data"]["page"] = ceil($result["data"]["rownum"]/30);
        $result["status"] = STATUS_OK;

        echo json_encode($result);
        exit();
    }

    protected function get_next_prev_id_sql($sql_where, $sql_sort) {
        $sql = "
                SELECT rownum,id FROM (
                    SELECT
                      @rownum := @rownum + 1 AS rownum,
                      ".$this->model->get_table_name().".id
                      FROM ".$this->model->get_table_name().", (SELECT @rownum := 0) r WHERE ".$sql_where."
                    order by ".$sql_sort.", ".$this->model->get_table_name().".id
                ) AS src";

        return $sql;
    }

    private function get_next_prev_id($id) {

        $result = array("next"=>0, "rownum"=>0, "total"=>0, "prev"=>0);

        //$raw_join = $this->model->get_raw_joins();
        $raw_conditions = $this->model->get_raw_conditions($this->user_request["conditions"]);
        if ($this->model->pre_delete) {
            $sql_where = "`".$this->model->get_table_name()."`.`delete_date` IS NULL";
        } else {
            $sql_where = '1=1';
        }

        if ($raw_conditions) {
            $sql_where = implode(" AND ", $raw_conditions);
        }

        //echo $sql_where;
        //exit;

        $ar_sql_sort = array();

        // Группировка
        if (isset($this->model->ar_group[$this->user_request["group"]["by"]])) {
            $expr = isset($this->model->ar_group[$this->user_request["group"]["by"]]["expr"])?$this->model->ar_group[$this->user_request["group"]["by"]]["expr"]:$this->model->get_table_name().".".$this->user_request["group"]["by"];
            $ar_sql_sort[] = $expr." ".$this->user_request["group"]["dir"];

        } elseif ($this->model->group && $this->user_request["group"]["by"] != "none") {
            $ar_sql_sort[] = $this->model->get_table_name().".".$this->user_request["group"]["by"]." ".$this->user_request["group"]["dir"];
        }

        // Сортировка
        if (isset($this->model->ar_sort[$this->user_request["sort"]["by"]])) {
            $expr = isset($this->model->ar_sort[$this->user_request["sort"]["by"]]["expr"])?$this->model->ar_sort[$this->user_request["sort"]["by"]]["expr"]:$this->model->get_table_name().".".$this->user_request["sort"]["by"];
            $ar_sql_sort[] = $expr." ".$this->user_request["sort"]["dir"];

        } elseif ($this->model->sort) {
            $ar_sql_sort[] = $this->model->get_table_name().".".$this->user_request["sort"]["by"]." ".$this->user_request["sort"]["dir"];
        }

        if ($ar_sql_sort) {
            $sql_sort = implode(",", $ar_sql_sort);
        } else {
            $sql_sort = "1";
        }

        //var_dump($sql_sort);
        //exit;

        $sql = $this->get_next_prev_id_sql($sql_where, $sql_sort);

        if ($orm = ORM_EXT::for_table($this->model->get_table_name())->raw_query("SELECT COUNT(*) total FROM (".$sql.") total")->find_one()) {
            $result['total'] = $orm->get("total");
        }

        //echo ORM_EXT::get_last_query();
        //exit;

        $rownum = 0;
        if ($orm = ORM_EXT::for_table($this->model->get_table_name())->raw_query($sql." WHERE src.id='".$id."'")->find_one()) {



            $result['rownum'] = $rownum = $orm->get("rownum");

            if ($rownum > 1) {
                $qres = ORM_EXT::for_table($this->model->get_table_name())->raw_query($sql." WHERE src.id!='".$id."' LIMIT ".($rownum-2).", 2")->find_array();

                if(!empty($qres[0]['id'])){
                    $result['prev'] = $qres[0]['id'];
                }
                /*Если вторая запись существует то она будет NextId либо текущая запись последняя в наборе*/
                if(!empty($qres[1]['id'])){
                    $result['next'] = $qres[1]['id'];
                }
            } else {
                $qres = ORM_EXT::for_table($this->model->get_table_name())->raw_query($sql." WHERE rownum>".$rownum." LIMIT 1")->find_array();

                if(!empty($qres[0]['id'])){
                    $result['next'] = $qres[0]['id'];
                }

            }
        }


        return $result;

    }

    protected function get_favorite_action(&$result) {
        if ($this->module_info["favorites"] && $this->data["id"]) {
            $data = array("object_id"=>$this->data["id"], "module_id"=>$this->module_id);
            if ($this->data["favorite_id"]) $data["id"] = $this->data["favorite_id"];
            $result[] = array("name"=>'<span class="hidden-xs hidden-modal">Избранное</span>', "icon"=>"star", "class"=>"btn-favorite".(($this->data["favorite_id"])?" active":""), "href"=>"favorites/".(($this->data["favorite_id"])?"delete":"add")."/".$this->module_id."/".$this->data["id"]."/", "data"=>$data);
        }
    }

    public function get_actions() {
        $result = array();

        $this->get_favorite_action($result);

        if (m_cuser::get_instance()->check_access_module($this->module_id, m_roles::CRUD_U)) {
            $result[] = array("name"=>"<span class='hidden-xs'>".L::actions_edit."</span>", "icon"=>"pencil", "href"=>$this->module_info["alias"]."/edit/".$this->data["id"]."/");
        }

        if (m_cuser::get_instance()->check_access_module($this->module_id, m_roles::CRUD_D)) {
            $result[] = array("name"=>"<span class='hidden-xs'>".L::actions_delete."</span>", "delete"=>true, "icon"=>"times", "type"=>"danger", "href"=>$this->module_info["alias"]."/delete/".$this->data["id"]."/?reports=true");
        }

        return $result;
    }

    public function get_info() {
        $result = array();

        if ($this->user_request["id"] && $this->data) {
            $result["meta_title"] = cls_tools::get_instance()->mb_ucfirst($this->module_info["morph"][0])." &laquo;".$this->data[$this->model->master_field]."&raquo;";
            $result["actions"] = $this->get_actions();
        } else {
            $result["meta_title"] = cls_tools::get_instance()->mb_ucfirst($this->module_info["morph"][0])." №".intval($this->user_request["id"])." не найдена";
        }

        $result["path"][] = array("title"=>$this->module_info["name"], "url"=>$this->module_info["alias"]."/");

        $result["module_id"]    = $this->module_id;
        $result["module"]       = $this->module_info;

        if ($this->module_info["comments"]) {
            $center__childOptions = array("name" => "middle_layout");
            $center__childOptions["south"] = array("size" => "250", "minSize" => '200', "initHidden" => true, "showOverflowOnHover"=>true);
            $result["layout"]["center"]["childOptions"]["center"]["childOptions"] = $center__childOptions;
        }

        return $result;
    }

    public function get_user_request() {
        parent::get_user_request();

        //$this->user_request["conditions"] = (isset($_GET["cnd"])) ? $this->model->clear_conditions($_GET["cnd"]) : array();

        /*$sort = $this->model->sort;
        $group = $this->model->sort;

        if (isset($_GET["sort"]["by"])) {
            $sort["by"] = $_GET["sort"]["by"];
        } elseif (isset($_SESSION["sort"][$this->module_info["alias"]]["by"])) {
            $sort["by"] = $_SESSION["sort"][$this->module_info["alias"]]["by"];
        }

        if (isset($_GET["sort"]["dir"])) {
            $sort["dir"] = $_GET["sort"]["dir"];
        } elseif (isset($_SESSION["sort"][$this->module_info["alias"]]["dir"])) {
            $sort["dir"] = $_SESSION["sort"][$this->module_info["alias"]]["dir"];
        }

        if (isset($_GET["group"]["by"])) {
            $group["by"] = $_GET["group"]["by"];
        } elseif (isset($_SESSION["group"][$this->module_info["alias"]]["by"])) {
            $group["by"] = $_SESSION["group"][$this->module_info["alias"]]["by"];
        }

        if (isset($_GET["group"]["dir"])) {
            $group["dir"] = $_GET["group"]["dir"];
        } elseif (isset($_SESSION["group"][$this->module_info["alias"]]["dir"])) {
            $group["dir"] = $_SESSION["group"][$this->module_info["alias"]]["dir"];
        }
        

        $this->user_request["sort"] = $sort;
        $this->user_request["group"] = $group;*/

    }

    public function validate() {
        return true;
    }

    protected function not_found() {
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

            $content = cls_register::get_instance()->smarty->fetch(str_replace('_', '/', $this->model->get_table_name())."/view/layout.tpl");

            if ($render == RENDER_JSON) {
                $result["data"] = $content;
                $result["status"] = 1;
                $result[$this->data_prefix] = $this->data;

                return $result;
            }

            return $content;
        }
    }

    // Дополняем данные (передаем в смарти, например)
    static function supplement_data($id, $data) {
    }

    public function process($id = false)
    {
        $this->user_request["id"] = $id;
        $this->get_user_request();

        $this->data = $this->model->get_one($this->user_request["id"]);

        if (!$this->data) {
            return true;
        }

        $conditions_decode = $this->model->conditions_decode($this->user_request["conditions"]);
        cls_register::get_instance()->smarty->assign("conditions_decode", $conditions_decode);
        cls_register::get_instance()->smarty->assign("conditions", $this->user_request["conditions"]);
        cls_register::get_instance()->smarty->assign("sort", $this->user_request["sort"]);
        cls_register::get_instance()->smarty->assign("group", $this->user_request["group"]);

        cls_register::get_instance()->smarty->assign($this->data_prefix."_data", $this->data);

        if ($this->module_info["comments"]) {
            $ar_comments = m_comments::singleton($this->module_id, $this->data["id"])->get_array(array());

            cls_register::get_instance()->smarty->assign("ar_comments", $ar_comments);
        }

        static::supplement_data($id, $this->data);

        return true;
    }

}



