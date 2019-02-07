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
 * Class cnt_users_view
 */
class cnt_users_view extends cls_controllerview {

    /**
     * @return array
     */
    public function get_info() {
        return parent::get_info();
    }

    /**
     * @param $action
     * @param array $parameters
     * @return bool
     */
    function check_access($action, $parameters = array()) {

        if (m_cuser::get_instance()->get("id") != intval($parameters["id"])) {
            if ($result = parent::check_access($action, $parameters)) {
            }
        } else {
            $result = true;
        }

        return $result;
    }

    /**
     * @return array
     */
    public function get_actions() {
        $result = array();

        parent::get_favorite_action($result);

        if (m_cuser::get_instance()->check_access_module($this->module_id, m_roles::CRUD_U)) {
            $result[] = array("name"=>"<span class='hidden-xs hidden-modal'>".L::actions_edit."</span>", "icon"=>"pencil", "href"=>$this->module_info["alias"]."/edit/".$this->data["id"]."/");
        }

        if ($this->user_request["id"] != m_cuser::get_instance()->get("id") && m_cuser::get_instance()->check_access_module($this->module_id, m_roles::CRUD_D)) {
            $result[] = array("name"=>"<span class='hidden-xs hidden-modal'>".L::actions_delete."</span>", "delete"=>true, "icon"=>"times", "type"=>"danger", "href"=>$this->module_info["alias"]."/delete/".$this->data["id"]."/?reports=true");
        }

        return $result;
    }

    /**
     * @param $user_eid
     */
    public function __action_get_stat($user_eid) {

        $ar_user_role = array(USER_ROLE_CUSTOMER, USER_ROLE_EXECUTOR, USER_ROLE_RESPONSIBLE);

        $ar_role_stat = array();
        foreach ($ar_user_role as $role) {

            $orm = ORM_EXT::for_table("demands");
            $orm->table_alias("d");
            $orm->select_expr("COUNT(d.id)", "count");
            $orm->select("d.status");
            $orm->inner_join("demands_messages", "d.id = m.demand_id and m.first = 1", "m");

            if ($role == USER_ROLE_CUSTOMER) {
                $orm->where_equal("m.from_eid", $user_eid);
            } elseif ($role == USER_ROLE_EXECUTOR) {
                $orm->where_equal("d.eu_eid", $user_eid);
            } else {
                $orm->where_equal("d.ru_eid", $user_eid);
            }

            $orm->group_by("status");
            $ar_role_stat[$role] = $orm->find_assoc("status", false, "count");
        }

        $ar_prepare_data = array();
        foreach ($ar_role_stat as $role => $stat) {
            foreach ($stat as $status=>$count) {
                $ar_prepare_data[$status][$role] = $count;
            }
        }

        foreach ($ar_prepare_data as $status=>$ar_counts) {
            $item = array();
            foreach ($ar_role_stat as $role => $stat) {
                //if ($stat) { // Если есть вообще данные по роли
                    $item["data"][] = isset($ar_counts[$role])?intval($ar_counts[$role]):0;
                //}
            }
            //: true
            $item["status"] = $status;
            $item["name"] = m_demands::$ar_status[$status]["name"];
            $item["color"]= "rgb(".cls_tools::get_instance()->hex2rgb(m_demands::$ar_status[$status]["hex_color"]).")";

            $data["series"][] = $item;
        }

        $data["xAxis"]["categories"] = array(L::members_customer, L::members_executor, L::members_responsible);
        /*if ($ar_role_stat[USER_ROLE_CUSTOMER]) $data["xAxis"]["categories"][] = "Заказчик";
        if ($ar_role_stat[USER_ROLE_EXECUTOR]) $data["xAxis"]["categories"][] = "Исполнитель";
        if ($ar_role_stat[USER_ROLE_RESPONSIBLE]) $data["xAxis"]["categories"][] = "Ответственный";*/

        echo json_encode($data);
        exit;
    }


    /**
     * @param $id
     * @param $data
     */
    static function supplement_data($id, $data) {

        $crud_categories = $crud_module = array();
        
        if ($data["role_id"]) {
            $crud_module      = m_roles::get_instance()->get_crud_module($data["role_id"]);
            $crud_categories  = m_roles::get_instance()->get_crud_categories($data["role_id"]);

            $ar_roles = m_roles::get_instance()->get_array(array("id"=>$data["role_id"]));
            cls_register::get_instance()->smarty->assign("ar_roles",        $ar_roles);
        }

        cls_register::get_instance()->smarty->assign("crud_module",        $crud_module);
        cls_register::get_instance()->smarty->assign("crud_categories",    $crud_categories);

        if ($crud_categories) {
            // Категории доступные пользователю
            $access_categories = array_keys($crud_categories);
            $ar_full_line_cats = m_categories::get_instance()->get_array(array(), false);
            $ar_access_line_categories = m_categories::get_instance()->build_complete_linear_tree($access_categories, $ar_full_line_cats);
            cls_register::get_instance()->smarty->assign("ar_tree_categories",  cls_tools::get_instance()->map_tree($ar_access_line_categories));

            // Активные заявки
            $ar_demands_member = array();
            $ar_demands_member["conditions"]    = array("mu_eid"=>$data["eid"],"status"=>array(m_demands::STATUS_WORK, m_demands::STATUS_NEW, m_demands::STATUS_PAUSE));
            $ar_demands_member["data"]          = m_demands::get_instance()->get_array($ar_demands_member["conditions"], 5, 0, array("dir"=>SORT_DSC_ZA, "by"=>"work_activity_date"), $ar_demands_member["total"]);
            cls_register::get_instance()->smarty->assign("ar_demands_member",  $ar_demands_member);

            // Активные заявки
            $ar_demands_executor = array();
            $ar_demands_executor["conditions"]    = array("eu_eid"=>$data["eid"],"status"=>array(m_demands::STATUS_WORK, m_demands::STATUS_NEW, m_demands::STATUS_PAUSE));
            $ar_demands_executor["total"]          = m_demands::get_instance()->count($ar_demands_executor["conditions"]);
            cls_register::get_instance()->smarty->assign("ar_demands_executor",  $ar_demands_executor);

            //$sql = "(SELECT SUM(IF (elapsed_time IS NULL,(UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(open_time)),elapsed_time)) times FROM demands_history_exec WHERE status=".m_demands::STATUS_WORK." AND eu_eid=".m_cuser::get_instance()->get("eid")." /*AND demand_id=".$this->orm_table.".demand_id*/ GROUP BY demand_id)";
            //$sql = "(SELECT COUNT(DISTINCT demand_id) FROM demands_history_exec WHERE status=".m_demands::STATUS_WORK." AND eu_eid=".m_cuser::get_instance()->get("eid")." /*AND demand_id=".$this->orm_table.".demand_id*/ GROUP BY demand_id)";
            //$a = ORM_EXT::for_table("hh")->raw_query($sql)->find_array();
            //var_dump($a);
            //exit;

        }
        
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


?>