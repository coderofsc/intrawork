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
 * Class cnt_demands_massedit
 */
class cnt_demands_massedit extends cls_controller {

    public $ar_errors;
    public $data = array();

    /**
     * @return array
     */
    public function get_info() {
        $result = array();
        $result["meta_title"] = "Массовое редактирование";

        $result["path"][] = array("title"=>"Заявки", "url"=>"demands/");

        return $result;
    }

    /**
     * cnt_demands_massedit constructor.
     */
    public function __construct()
	{
	}

	public function get_user_request()
    {
        $this->user_request["conditions"]	= (isset($_REQUEST["cnd"]))?m_demands::get_instance()->clear_conditions($_REQUEST["cnd"]):array();

        $this->user_request["sort"]["by"]	= (isset($_REQUEST["sort"]["by"]) && $_REQUEST["sort"]["by"])?($_REQUEST["sort"]["by"]):null;
        $this->user_request["sort"]["dir"]	= (isset($_REQUEST["sort"]["dir"]) && in_array($_REQUEST["sort"]["dir"], array(SORT_DSC_ZA, SORT_ASC_AZ)))?($_REQUEST["sort"]["dir"]):null;

        if (!$this->user_request["sort"]["by"])     { unset($this->user_request["sort"]["by"]); }
        if (!$this->user_request["sort"]["dir"])    { unset($this->user_request["sort"]["dir"]); }
        if (!$this->user_request["sort"])           { unset($this->user_request["sort"]); }

        if (isset($_POST["massedit"])) {

            $this->data = $_POST["massedit_data"];

            if (($this->ar_errors = $this->validate()) !== true) {
                cls_alerts::get_instance()->add(array_values($this->ar_errors), ALERT_ERROR);
            } else {
                $this->data["range_to"] = intval($this->data["range_to"]);
                $this->data["range_from"] = intval($this->data["range_from"]);

                if (!$this->data["range_from"] && $this->data["range_to"]) {
                    //$this->data["range_from"] = 1;
                }

                $limit  = ($this->data["range_to"] && $this->data["range_to"]>=$this->data["range_from"])?intval($this->data["range_to"]-$this->data["range_from"]+1):0;
                $offset =  ($this->data["range_from"])?$this->data["range_from"]-1:0;

                $count = m_demands::get_instance()->update($this->data, $this->user_request["conditions"], $this->user_request["sort"], $limit, $offset);

                cls_alerts::get_instance()->add("Данные успешно установлены для ".$count." ".cls_tools::get_instance()->word_declension($count, array("заявки", "заявок", "заявок")).".", ALERT_INFO);

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
	}

    /**
     * @return array|bool
     */
    public function validate()
    {
        $result = true;

        $update_data = $this->data;
        unset($update_data["range_from"], $update_data["range_to"]);

        if (!$update_data) {
            $result = array();
            $result[] = "Не указаны данные для замены";
        }

        return $result;
    }


    /**
     * @param int $render
     * @return string
     * @throws Exception
     * @throws SmartyException
     */
    public function display($render = RENDER_DEFAULT)
	{
		return cls_register::get_instance()->smarty->fetch("demands/massedit.tpl");
	}

    /**
     * @return bool
     */
    public function process()
	{
        $this->get_user_request();

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


        $conditions_decode = m_demands::get_instance()->conditions_decode($this->user_request["conditions"]);
        cls_register::get_instance()->smarty->assign("conditions_decode", $conditions_decode);

        cls_register::get_instance()->smarty->assign("conditions", $this->user_request["conditions"]);
        cls_register::get_instance()->smarty->assign("sort",       $this->user_request["sort"]);
        //cls_register::get_instance()->smarty->assign("ar_sort",    $cnd_demands_info["ar_sort"]);

        cls_register::get_instance()->smarty->assign("massedit_data",       $this->data);


		return true;
	}
}


?>