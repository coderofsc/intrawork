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
 * Class cnt_departments
 */
class cnt_departments extends cls_controllerlist {

    /**
     * @return array
     */
    public function get_info() {
        $result = parent::get_info();

        $center__childOptions = array("name"=>"middle_layout");
        $center__childOptions["center"]   = array("size"=>"40%", "minWidth"=>'350', "onresize_end"=>"layout_resize_end");
        $center__childOptions["east"]     = array("size"=>"60%", "minSize"=>'350', "initClosed"=>config()->layout_west_initclosed );
        $result["layout"]["center"]["childOptions"]["center"]["childOptions"] = $center__childOptions;

        return $result;
    }

    /**
     * @param $action
     * @param array $parameters
     * @return bool
     */
    function check_access($action, $parameters = array()) {
        if ($result = parent::check_access($action, $parameters)) {
            $action_crud    = m_roles::CRUD_U;
            $result         = m_cuser::get_instance()->check_access_module($this->module_id, $action_crud);
        }

        return $result;
    }

    public function __action_update_order() {

        $json = isset($_POST["json"])?$_POST["json"]:false;
        $orders = cls_tools::get_instance()->flatten_json_tree($json);

        $result["status"] = ($this->model->update_orders($orders))?STATUS_OK:STATUS_BAD_REQUEST;

        echo json_encode($result);
        exit();
    }

    /**
     * @return bool
     */
    public function process()
	{
        $this->get_user_request();

        $ar_conditions          = array();
        $ar_departments         = $this->model->get_array($ar_conditions, 30);
        $this->total            = sizeof($ar_departments);

        $ar_tree_departments    = cls_tools::get_instance()->map_tree($ar_departments);

        cls_register::get_instance()->smarty->assign("ar_tree", $ar_tree_departments);
        cls_register::get_instance()->smarty->assign("readonly", !m_cuser::get_instance()->check_access_module($this->module_id, m_roles::CRUD_U));

		return true;
	}
}


?>