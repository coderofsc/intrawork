<?php
/*
  * Copyright 2007 - 2017 Alexey Yuriev
  *
  * Licensed under the Apache License, Version 2.0 (the "License");
  * you may not use this file except in compliance with the License.
  * You may obtain a copy of the License at
  *
  *    http://www.apache.org/licenses/LICENSE-2.0
  *
  * Unless required by applicable law or agreed to in writing, software
  * distributed under the License is distributed on an "AS IS" BASIS,
  * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  * See the License for the specific language governing permissions and
  * limitations under the License.
  */

defined('CORE_INTRAWORK_WS') or die('Отсутствует прямой доступ к файлу');

/**
 * Class cnt_demands_search
 */
class cnt_demands_search extends cls_controller {

    /**
     * @return array
     */
    public function get_info() {
        $result = array();
        $result["meta_title"] = L::actions_search." ".L::modules_demands_morph_two;

        $result["path"][] = array("title"=>L::modules_demands_name, "url"=>"demands/");

        return $result;
    }

    /**
     * cnt_demands_search constructor.
     */
    public function __construct()
	{
	}

    /**
     * @param $filter_id
     */
    public function __action_delete($filter_id) {

        $result["status"] = STATUS_BAD_REQUEST;

        if (m_demands_filters::get_instance()->delete($filter_id)) {
            $result["status"] = STATUS_OK;
        }

        echo json_encode($result);
        exit();
    }
	

	public function get_user_request()
	{

        //var_dump($_REQUEST["cnd"]);
        //exit;

        $this->user_request["conditions"]	= (isset($_REQUEST["cnd"]))?m_demands::get_instance()->clear_conditions($_REQUEST["cnd"]):array();
        $this->user_request["sort"]["by"]	= (isset($_REQUEST["sort"]["by"]) && $_REQUEST["sort"]["by"])?($_REQUEST["sort"]["by"]):null;
        $this->user_request["sort"]["dir"]	= (isset($_REQUEST["sort"]["dir"]) && in_array($_REQUEST["sort"]["dir"], array(SORT_DSC_ZA, SORT_ASC_AZ)))?($_REQUEST["sort"]["dir"]):null;

        if (!$this->user_request["sort"]["by"])     { unset($this->user_request["sort"]["by"]); }
        if (!$this->user_request["sort"]["dir"])    { unset($this->user_request["sort"]["dir"]); }
        if (!$this->user_request["sort"])           { unset($this->user_request["sort"]); }

        if (m_cuser::get_instance()->access_data["filter"]) {
            $this->user_request["conditions"] = cls_tools::get_instance()->sync_array($this->user_request["conditions"], m_cuser::get_instance()->access_data["filter_data"]);
            //$this->user_request["conditions"] = array_merge($this->user_request["conditions"], m_cuser::get_instance()->access_data["filter_data"]);
        }

        if (isset($_POST["search"])) {

            if ($filter_name = trim($_POST["filter_name"])) {
                if ($filter_id = m_demands_filters::get_instance()->save(false, array("name"=>$filter_name, "conditions"=>$this->user_request["conditions"], "sort"=>$this->user_request["sort"]))) {
                    cls_alerts::get_instance()->add(L::alerts_success_save_filter, ALERT_SUCCESS);
                } else {
                    cls_alerts::get_instance()->add(L::alerts_error_save_filter, ALERT_ERROR);
                }
            }

            $url = HOST_ROOT."demands/";
            if ($this->user_request["conditions"]) {
             $url.="?".http_build_query(array("cnd"=>$this->user_request["conditions"]));
            }

            if ($this->user_request["sort"]) {
                $url.=($this->user_request["conditions"])?"&":"?";
                $url.=http_build_query(array("sort"=>$this->user_request["sort"]));
            }

            header("location: ".$url);
            exit;
        }
	}

    /**
     * @param $str
     */
    public function __action_quick_search($str) {
        $result = array();

        /*foreach ($ar_cmp as $value) {
            $result[] = array("name"=>html_entity_decode(trim($value["opf"]." ".$value["name"])), "id"=>$value["id"]);
        }*/

        /*$result[] = array("value"=>html_entity_decode(trim("aaaa4")), "id"=>1003);
        $result[] = array("value"=>html_entity_decode(trim("aaaa")), "id"=>1);
        $result[] = array("value"=>html_entity_decode(trim("aaaa2")), "id"=>2);
        $result[] = array("value"=>html_entity_decode(trim("aaaa3")), "id"=>3);*/

        $search_result = m_search::get_instance()->search(urldecode($str), array(OWNER_DEMAND), 10, 0, false);

        foreach ($search_result as $value) {
            //$result = $value;
            $result[] = array("value"=>html_entity_decode(trim($value["title"])), "id"=>$value["id"], "object_type"=>$value["object_type"], "link"=>$value["link"]);
            //$result[] = array("id"=>$value["id"], "value"=>$value["title"]);
        }

        header('Content-Type: application/json');
        echo json_encode($result);
        exit();
    }


    /**
     * @return bool
     */
    public function validate()
    {
        return true;
    }


    /**
     * @param int $render
     * @return string
     * @throws Exception
     * @throws SmartyException
     */
    public function display($render = RENDER_DEFAULT)
	{
		return cls_register::get_instance()->smarty->fetch("demands/search/layout.tpl");
	}

    /**
     * @param int $filter_id
     * @return bool
     */
    public function process($filter_id = 0)
	{
        if ($filter_id && $filter = m_demands_filters::get_instance()->get_one($filter_id)) {
            if (!$_REQUEST["cnd"])  $_REQUEST["cnd"]    = $filter["conditions"];
            if (!$_REQUEST["sort"]) $_REQUEST["sort"]   = $filter["sort"];
        }

        $this->get_user_request();

        $c_demands = new cnt_demands();
        $cnd_demands_info = $c_demands->get_info();

        cls_register::get_instance()->smarty->assign("conditions", $this->user_request["conditions"]);
        cls_register::get_instance()->smarty->assign("sort",       $this->user_request["sort"]);
        cls_register::get_instance()->smarty->assign("ar_sort",    $cnd_demands_info["ar_sort"]);

        // Все пользователи
        $ar_conditions      = array();
        $ar_users           = m_users::get_instance()->get_array($ar_conditions, false, 0, array("by"=>"dprt_id", "dir"=>SORT_ASC_AZ));
        cls_register::get_instance()->smarty->assign("ar_users", $ar_users);

        // Все контакты
        $ar_conditions      = array();
        $ar_contacts           = m_contacts::get_instance()->get_array($ar_conditions, false, 0, array("by"=>"type", "dir"=>SORT_DSC_ZA));
        cls_register::get_instance()->smarty->assign("ar_contacts", $ar_contacts);

        // Все почтовые боты
        $ar_conditions      = array();
        $ar_mb           = m_mailbots::get_instance()->get_array($ar_conditions, false, 0, array("by"=>"cat_uid", "dir"=>SORT_DSC_ZA));
        cls_register::get_instance()->smarty->assign("ar_mb", $ar_mb);

        // Все проекты
        $ar_conditions      = array();
        $ar_projects        = m_projects::get_instance()->get_array($ar_conditions);
        cls_register::get_instance()->smarty->assign("ar_projects", $ar_projects);


		return true;
	}
}


?>