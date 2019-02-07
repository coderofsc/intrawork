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
 * Class cnt_search
 */
class cnt_search extends cls_controller {
    protected $total = 0;

    protected $LIMIT_LIST   = 30;
    protected $search_data;

    /**
     * @return array
     */
    public function get_info() {
        $result = array();
        $result["meta_title"] = L::navbar_global_search;
        $result["jscroll"] = true;

        return $result;
    }

    /**
     * cnt_search constructor.
     */
    public function __construct()
	{
	}
	

	public function get_user_request()
	{
        $this->search_data["text"]	    = (isset($_GET["text"]))?trim($_GET["text"]):false;
        $this->search_data["sources"]	= (isset($_GET["sources"]) && is_array($_GET["sources"]))?$_GET["sources"]:array(OWNER_USER, OWNER_CONTACT, OWNER_DEMAND, OWNER_NEWS);

        $this->user_request["conditions"]	= (isset($_GET["cnd"]))?m_search::get_instance()->clear_conditions($_GET["cnd"]):array();
        $this->user_request["sort"]	        = (isset($_GET["sort"]) && is_array($_GET["sort"]))?($_GET["sort"]):array();

        $this->user_request["limit"]	= (isset($_GET["limit"]))?intval($_GET["limit"]):$this->LIMIT_LIST;
        $this->user_request["offset"]	= (isset($_GET["offset"]))?intval($_GET["offset"]):0;

        $this->user_request["continue"]	= (isset($_GET["continue"]))?true:false;
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
        if ($this->user_request["continue"]) {
            $content = cls_register::get_instance()->smarty->fetch("search/list.tpl");
        } else {
            $content = cls_register::get_instance()->smarty->fetch("search/layout.tpl");
        }

        if ($render == RENDER_JSON) {
            $result["data"]     = $content;
            $result["status"]   = 1;

            return $result;
        }

        return $content;
	}

    /**
     * @return bool
     */
    public function process()
	{
	    $this->get_user_request();

        if ($this->search_data["text"]) {
            $start_time = cls_tools::get_instance()->get_microtime();
            $this->search_data["result"] = m_search::get_instance()->search($this->search_data["text"], $this->search_data["sources"], $this->user_request["limit"], $this->user_request["offset"]);
            $end_time = cls_tools::get_instance()->get_microtime();

            $this->search_data["time"] = $end_time - $start_time;
        } else {
            cls_alerts::get_instance()->add(L::validate_message_query_empty, ALERT_WARNING);
        }

        cls_register::get_instance()->smarty->assign("search_data", $this->search_data);

        cls_register::get_instance()->smarty->assign("conditions", $this->user_request["conditions"]);
        cls_register::get_instance()->smarty->assign("offset", $this->user_request["offset"]);
        cls_register::get_instance()->smarty->assign("limit", $this->user_request["limit"]);
        cls_register::get_instance()->smarty->assign("total", $this->total);

		return true;
	}
}


?>