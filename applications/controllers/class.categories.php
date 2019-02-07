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
 * Class cnt_categories
 */
class cnt_categories extends cls_controllerlist {

    /**
     * @return array
     */
    public function get_info() {
        $result = parent::get_info();
        return $result;
    }

    /**
     * @param $action
     * @param array $parameters
     * @return bool
     */
    function check_access($action, $parameters = array()) {
        if ($result = parent::check_access($action, $parameters)) {

            if ($action == "update_order") {
                $action_crud = m_roles::CRUD_U;
                $result = m_cuser::get_instance()->check_access_module($this->module_id, $action_crud);
            }
        }

        return $result;
    }

    public function __action_calc_demands() {
        $result = m_categories::get_instance()->calc_demands(/*m_cuser::get_instance()->get("ar_access_visible_categories_id")*/);

        /*echo ORM_EXT::get_last_query();
        var_dump($result);
        exit;*/

        echo json_encode($result);
        exit();
    }

    public function __action_update_order() {

        $json = isset($_POST["json"])?$_POST["json"]:false;
        $orders = cls_tools::get_instance()->flatten_json_tree($json);

        $result["status"] = ($this->model->update_orders($orders))?STATUS_OK:STATUS_BAD_REQUEST;

        m_cuser::get_instance()->refresh(true);

        echo json_encode($result);
        exit();
    }

    /**
     * @return bool
     */
    public function process()
	{
        $this->get_user_request();

        if (m_cuser::get_instance()->check_access_module($this->module_id, m_roles::CRUD_U)) {
            $ar_conditions      = array();
            $ar_categories      = $this->model->get_array($ar_conditions, false);
            $this->total = sizeof($ar_categories);
            $ar_tree_categories = cls_tools::get_instance()->map_tree($ar_categories, "parent_id", "demands_count");

        } else {
            $ar_tree_categories = cls_register::get_instance()->get("ar_access_tree_categories");
            $this->total = sizeof(cls_register::get_instance()->get("ar_access_line_categories"));
        }


        // "Неразобранное " не выводим
        if (isset($ar_tree_categories[0])) {
            unset($ar_tree_categories[0]);
        }

        cls_register::get_instance()->smarty->assign("ar_tree", $ar_tree_categories);
        cls_register::get_instance()->smarty->assign("readonly", !m_cuser::get_instance()->check_access_module($this->module_id, m_roles::CRUD_U));



        return true;
	}
}
