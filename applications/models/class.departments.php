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

class m_departments extends cls_model {
    private static $instance;

    public $pre_delete      = true;

    public $ar_field = array(
        "name"      =>L::forms_labels_name,
        "parent_id" =>L::forms_labels_dprt_parent_id,
        "descr"     =>L::forms_labels_descr
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
            $ar_conditions  = array("id"=>array($ar_condition["parent_id"]));
            $ar_dictionary_field["parent_id"] = array("dictionary"=>$this->get_array($ar_conditions, false), "field"=>"name");
        }

        return parent::conditions_decode($ar_condition, $ar_dictionary_field);
    }

    public function set_sort(ORM_EXT &$orm, $by, $dir) {
        $orm->order_by_asc("departments.parent_id");
        $orm->order_by_asc("departments.position");

        switch ($by) {
            default:
                $orm->order_by_expr($this->orm_table.".".$by." ".$dir);
        }
    }

    protected function set_select(ORM_EXT &$orm) {
        parent::set_select($orm);
        $orm->select_expr("(SELECT COUNT(*) FROM users u WHERE u.dprt_id = ".$this->orm_table.".id)", "users_count");
    }


    protected function set_save_data(ORM_EXT &$orm, $data) {
        $orm->set("name",               trim($data["name"]));
        $orm->set("parent_id",          intval($data["parent_id"]));
        $orm->set("descr",              trim($data["descr"]));
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

}
?>
