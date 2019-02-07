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

class m_categories extends cls_model {
    private static $instance;

    public $pre_delete      = true;

    public $ar_field = array(
        "name"          => L::forms_labels_name,
        "parent_id"     => L::forms_labels_categories_parent_id,
        "descr"         => L::forms_labels_descr,
    );

    private function __clone() { }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function conditions_decode($ar_condition) {

        $ar_dictionary_field = array();

        if (isset($ar_condition["parent_id"])) {
            $ar_dictionary_field["parent_id"] = array("dictionary"=>cls_register::get_instance()->get("ar_access_line_categories"), "field"=>"name");
        }

        return parent::conditions_decode($ar_condition, $ar_dictionary_field);
    }


    public function get_roles_crud($cat_id) {
        $orm = ORM_EXT::for_table("roles_crud_categories");
        $orm->select('crud')->select("role_id");

        $orm->where_equal("object_id", $cat_id);
        return $orm->find_assoc("role_id", false, "crud");
    }

    public function calc_demands(/*$ar_cat_id*/) {
        /*if (!$ar_cat_id) {
            return array();
        }*/

        $orm = ORM_EXT::for_table("demands");
        $orm->select_expr("COUNT(*)", "count");
        $orm->select("cat_id");
        //$orm->where_in("cat_id", $ar_cat_id);
        $orm->where_in("status", array(m_demands::STATUS_NEW, m_demands::STATUS_PAUSE, m_demands::STATUS_WORK));
        $orm->where_null("delete_date");
        $orm->group_by("cat_id");

        if (m_cuser::get_instance()->access_data["filter"]) {
            $ar_where = m_demands::get_instance()->get_raw_conditions(m_cuser::get_instance()->access_data["filter_data"]);
            foreach ($ar_where as $raw_where) {
                $orm->where_raw($raw_where);
            }
            /*$orm->inner_join("demands_members", "d_mbr.demand_id = demands.id", "d_mbr");
            $orm->where_equal("d_mbr.eid", m_cuser::get_instance()->get("eid"));
            $orm->where_equal("d_mbr.tracking", 1);*/
        }

        return $orm->find_assoc("cat_id", false, "count");
    }

    protected function prepare_data(&$data, $detailed = true) {

        //Считаем по AJAX
        /*$active_demands_count = $this->calc_demands(array_keys($data));
        foreach ($data as $cat_id=>&$item) {
            $item["active_demands_count"] = (isset($active_demands_count[$cat_id]))?$active_demands_count[$cat_id]:0;
        }*/

    }

    /*
    protected function set_conditions(ORM_EXT &$orm, $ar_conditions) {
        parent::set_conditions($orm, $ar_conditions);
    }*/

    protected function set_select(ORM_EXT &$orm) {
        parent::set_select($orm);
        //$orm->select_expr("(SELECT COUNT(*) FROM demands d WHERE d.cat_id = ".$this->orm_table.".id AND d.status IN (".m_demands::STATUS_NEW."))", "demands_new_count");
    }

    protected function set_sort(ORM_EXT &$orm, $by, $dir) {

        $orm->order_by_asc("categories.parent_id");
        $orm->order_by_asc("categories.position");

        parent::set_sort($orm, $by, $dir);
    }

    public function get_missing_parents($ar_have_cats_id, $ar_full_line_cats) {
        $ar_missing_parents = array();

        foreach ($ar_have_cats_id as $cat_id) {
            $ar_parents = $this->get_category_parents($cat_id, $ar_full_line_cats);
            $ar_missing_parents = array_merge($ar_missing_parents, $ar_parents);
        }

        return array_unique(array_diff($ar_missing_parents, $ar_have_cats_id));
    }

    public function build_complete_linear_tree($ar_have_cats_id, $ar_full_line_cats) {

        $ar_missing_parents = $this->get_missing_parents($ar_have_cats_id, $ar_full_line_cats);

        $result = $this->get_array(array("id"=>array_merge($ar_missing_parents, $ar_have_cats_id)), false);

        foreach ($ar_missing_parents as $cat_id) {
            $result[$cat_id]["visible_only"] = true;
        }

        return $result;
    }


    public function get_category_parents($current_id, $ar_line_catalog) {
        $ar_result = cls_tools::get_instance()->map_tree_parents($current_id, $ar_line_catalog);

        return $ar_result;
    }

    public function get_category_children($current_id, $ar_tree_catalog) {

        /*
        function get_children($ar_catalog, &$ar_result) {

            foreach($ar_catalog as $cat_id => $value) {
                $ar_result[] = $cat_id;
                if (isset($value["children"])) {
                    get_children($value["children"], $ar_result);
                }
            }
        }

        function find_cat($find_id, $ar_catalog, &$ar_result) {

            foreach($ar_catalog as $cat_id => $value) {
                if ($cat_id == $find_id) {
                    if ($value["children"]) {
                        get_children($value["children"], $ar_result);
                    }
                }

                if (isset($value["children"]) && !$ar_result) {
                    find_cat($find_id, $value["children"], $ar_result);
                }
            }
        }
        */

        //$ar_result = array();

        $ar_result = cls_tools::get_instance()->map_tree_children($current_id, $ar_tree_catalog);

        //find_cat($current_id, $ar_tree_catalog, $ar_result);

        return $ar_result;
    }

    protected function set_save_data(ORM_EXT &$orm, $data) {
        $orm->set("name",               trim($data["name"]));
        $orm->set("parent_id",          intval($data["parent_id"]));
        $orm->set("descr",              trim($data["descr"]));
        $orm->set("bgcolor",            trim($data["bgcolor"]));
        $orm->set("icon",               trim($data["icon"]));
    }

    private  function update_crud_roles($ar_crud_object, $cat_id) {

        ORM_EXT::for_table("roles_crud_categories")->where_equal("object_id", $cat_id)->delete_many();

        if (!$ar_crud_object) {
            return true;
        }

        $ar_sql_insert = array();
        foreach ($ar_crud_object as $role_id => $crud) {
            $ar_sql_insert[] = "('".$role_id."', '".$cat_id."', '".$crud."')";
        }

        $sql = "INSERT INTO roles_crud_categories (role_id, object_id, crud) VALUES ".implode(",", $ar_sql_insert);
        return ORM_EXT::for_table("roles_crud_categories")->raw_execute($sql);
    }


    public function save($id = false, $data, $crud_roles = array(), &$previous_data = false) {
        $cat_id = parent::save($id, $data, $previous_data);

        if ($cat_id) {
            $this->update_crud_roles($crud_roles, $cat_id);
        }

        return $cat_id;
    }

    public function update_orders($ar_orders) {

        $ar_sql_update_parent = $ar_sql_update_position = array();

        foreach ($ar_orders as $id => $item) {
            $ar_sql_update_parent[]     = " WHEN id = ".$id." THEN ".$item["parent_id"];
            $ar_sql_update_position[]   = " WHEN id = ".$id." THEN ".$item["position"];
        }

        $sql = "UPDATE ".$this->orm_table." SET parent_id = CASE ".implode(" ", $ar_sql_update_parent)." END, position = CASE ".implode(" ", $ar_sql_update_position)." END WHERE id IN(".implode(",", array_keys($ar_orders)).")";

        return ORM_EXT::for_table($this->orm_table)->raw_execute($sql);
    }

    public function get_array($conditions = array(), $limit = 4, $offset = 0, $sort = array(), &$total_records = false, $detailed = false, $deleted = false) {
        $result = array();

        $income = array();
        $income["id"]           = 0;
        $income["parent_id"]    = 0;
        $income["name"]         = L::text_inbox;
        //$income["demands_new_count"]         = ORM_EXT::for_table("demands")->where_equal("cat_id", 0)->where_in("status", array(m_demands::STATUS_NEW))->count();


        //$orm->select_expr("(SELECT COUNT(*) FROM demands d WHERE d.cat_id = ".$this->orm_table.".id AND d.status IN (".m_demands::STATUS_NEW."))", "demands_new_count");

        $result[0] = $income;

        $result = $result + parent::get_array($conditions, $limit, $offset, $sort, $total_records, $detailed, $deleted);

        //var_dump($result);
        //exit;

        return $result;
    }

    public function get_one($id, $detailed = true, $escape = false, $deleted = false) {
        if ($result = parent::get_one($id, $detailed, $escape, $deleted)) {
            $result["users_count"] = sizeof(m_users::get_instance()->get_users_category($id));
        }

        return $result;

    }

}

?>
