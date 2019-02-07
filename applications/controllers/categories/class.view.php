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
 * Class cnt_categories_view
 */
class cnt_categories_view extends cls_controllerview {
    protected $data_prefix = "cat";

    /**
     * @param int $cat_id
     */
    public function __action_get_users($cat_id = 0) {

        //$ar_users = m_users::get_instance()->get_users_category();

        $result["status"] = STATUS_OK;
        $result["data"] = m_users::get_instance()->get_users_category($cat_id, "eid");

        //m_categories::get_instance()->
        //m_users::get_instance()->


        echo json_encode($result);
        exit();

    }

    /**
     * @param $id
     * @param $data
     */
    static function supplement_data($id, $data) {
        // Все роли
        $ar_conditions      = array();
        $ar_roles           = m_roles::get_instance()->get_array($ar_conditions, 30);
        cls_register::get_instance()->smarty->assign("ar_roles", $ar_roles);

        // CRUD для категории
        $ar_crud_category   = m_categories::get_instance()->get_roles_crud($id);
        cls_register::get_instance()->smarty->assign("ar_crud_category", $ar_crud_category);

        // Заявки
        $ar_demands = array();
        $ar_demands["conditions"]    = array("cat_id"=>$data["id"]);
        $ar_demands["data"]          = m_demands::get_instance()->get_array($ar_demands["conditions"], 10, 0, array(), $ar_demands["total"]);
        cls_register::get_instance()->smarty->assign("ar_demands", $ar_demands);
    }

    /**
     * @param bool $id
     * @return bool
     */
    public function process($id = false)
    {
        parent::process($id);

        return true;
    }

}
