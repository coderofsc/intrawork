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
 * Class cnt_contacts_search
 */
class cnt_contacts_search extends cls_controller {
	//private $user_request;
	//private $validate_result = true;
    protected $feedback_data;

    /**
     * @return array
     */
    public function get_info() {
        $result = array();
        $result["meta_title"] = L::actions_search." ".L::modules_contacts_morph_five;

        $result["path"][] = array("title"=>L::modules_contacts_name, "url"=>"contacts/");

        return $result;
    }

    /**
     * cnt_contacts_search constructor.
     */
    public function __construct()
	{
	}
	

	public function get_user_request()
	{
        $this->user_request["conditions"]	= (isset($_REQUEST["cnd"]))?m_contacts::get_instance()->clear_conditions($_REQUEST["cnd"]):array();

        $this->user_request["sort"]["by"]	        = (isset($_REQUEST["sort"]["by"]) && in_array($_REQUEST["sort"]["by"], array_keys(m_contacts::get_instance()->ar_sort)))?($_GET["sort"]["by"]):m_contacts::get_instance()->sort["by"];
        $this->user_request["sort"]["dir"]	        = (isset($_REQUEST["sort"]["dir"]) && in_array($_REQUEST["sort"]["dir"], array(SORT_DSC_ZA, SORT_ASC_AZ)))?($_GET["sort"]["dir"]):m_contacts::get_instance()->sort["dir"];

        if (isset($_POST["search"])) {

            $url = HOST_ROOT."contacts/";
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
		return cls_register::get_instance()->smarty->fetch("contacts/search.tpl");
	}

    /**
     * @return bool
     */
    public function process()
	{
        $this->get_user_request();

        $c_contacts = new cnt_contacts();
        $cnd_contacts_info = $c_contacts->get_info();

        cls_register::get_instance()->smarty->assign("conditions", $this->user_request["conditions"]);
        cls_register::get_instance()->smarty->assign("sort",       $this->user_request["sort"]);
        cls_register::get_instance()->smarty->assign("ar_sort",    $cnd_contacts_info["ar_sort"]);

        $ar_types =  m_contacts_types::get_instance()->get_array(array(), false);
        cls_register::get_instance()->smarty->assign("ar_types", $ar_types);

		return true;
	}
}


?>