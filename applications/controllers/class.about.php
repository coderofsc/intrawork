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
 * Class cnt_about
 */
class cnt_about extends cls_controller {

	/**
	 * @return array
     */
	public function get_info() {
        $result = array();
        $result["meta_title"] = L::navbar_setup_dd_about;

        return $result;
    }

	/**
	 * cnt_about constructor.
     */
	public function __construct()
	{
	}
	

	public function get_user_request()
	{
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
		return cls_register::get_instance()->smarty->fetch("about.tpl");
	}

	/**
	 * @return bool
     */
	public function process()
	{
		$this->get_user_request();

		return true;
	}
}


?>