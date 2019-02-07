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
 * Class cnt_attributes_suites_view
 */
class cnt_attributes_suites_view extends cls_controller {
	//private $user_request;
	//private $validate_result = true;
    private $suite_data;

    /**
     * @return array
     */
    public function get_info() {
        $result = array();

        if ($this->suite_data) {
            $result["meta_title"] = $this->suite_data["name"];
        } else {
            $result["meta_title"] = "Набор дополнительных атрибутов";
        }

        $result["path"][] = array("title"=>"Дополнительные атрибуты заявк", "url"=>"attributes_suites/");

        $result["actions"][] = array("name"=>"Изменить", "icon"=>"pencil", "href"=>"attributes_suites_form/");

        return $result;
    }

    /**
     * cnt_attributes_suites_view constructor.
     */
    public function __construct()
	{
	}
	

	public function get_user_request()
	{
//        $this->user_request["suite_id"] = isset($_GET["suite_id"])?$_GET["suite_id"]:false;
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
        $content = cls_register::get_instance()->smarty->fetch("attributes/suites/view/layout.tpl");

        if ($render == RENDER_JSON) {
            $result["data"] = $content;
            $result["suite"] = $this->suite_data;
            $result["status"] = 1;

            return $result;
        }

        return $content;
	}

    /**
     * @param bool $id
     * @return bool
     */
    public function process($id = false)
    {
        $this->user_request["suite_id"] = $id;
		$this->get_user_request();

        $this->suite_data = m_attributes::get_instance()->get_suite($this->user_request["suite_id"]);
        cls_register::get_instance()->smarty->assign("attribute_data", $this->suite_data);

        $ar_conditions = array();
        $ar_demands = m_demands::get_instance()->get_array($ar_conditions, 5);
        cls_register::get_instance()->smarty->assign("ar_demands", $ar_demands);

		return true;
	}
}


?>