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

class m_mailbots extends cls_model {
    private static $instance;

    public $pre_delete      = true;

    public $sort   = array("dir"=>SORT_ASC_AZ, "by"=>"name");
    public $ar_sort  = array(
        "name"      => array("name"=>L::forms_labels_name),
        "status"    => array("name"=>L::forms_labels_mailbots_status),
        "server"    => array("name"=>L::forms_labels_mailbots_server),
        "cat_id"    => array("name"=>L::modules_categories_morph_one),
    );

    public $ar_field = array(
        "name"          => L::forms_labels_name,
        "status"        => L::forms_labels_mailbots_status,
        "cat_id"        => L::modules_categories_morph_one,
        "demand_type_id"        => L::modules_demands_types_morph_one,
        "confirm"       => L::forms_labels_mailbots_confirm,
        "protocol"      => L::forms_labels_mailbots_protocol,
        "server"        => L::forms_labels_mailbots_server,
        "port"          => L::forms_labels_mailbots_port,
        "login"         => L::forms_labels_mailbots_login,
        "descr"         => L::forms_labels_descr
    );

    private function __clone() { }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    protected function prepare_data(&$data, $detailed = true) {
        foreach ($data as &$item) {
            $item["regex"] = ($item["regex"])?unserialize(html_entity_decode($item["regex"], ENT_QUOTES)):array();
        }
    }

    public function conditions_decode($ar_condition) {

        $ar_dictionary_field = array();

        if (isset($ar_condition["cat_id"])) {
            $ar_dictionary_field["cat_id"] = array("dictionary"=>cls_register::get_instance()->get("ar_access_line_categories"), "field"=>"name");
        }

        if (isset($ar_condition["status"])) {
            $ar_dictionary_field["status"] = array("dictionary"=>array(0=>array("name"=>"Выключен"), 1=>array("name"=>"Включен")), "field"=>"name");
        }

        if (isset($ar_condition["confirm"])) {
            $ar_dictionary_field["confirm"] = array("dictionary"=>array(0=>array("name"=>"Выключено"), 1=>array("name"=>"Включено")), "field"=>"name");
        }

        return parent::conditions_decode($ar_condition, $ar_dictionary_field);
    }


    protected function set_save_data(ORM_EXT &$orm, $data) {
        $orm->set("name",          trim($data["name"]));
        $orm->set("address",       trim($data["address"]));
        $orm->set("status",        trim($data["status"]));
        $orm->set("protocol",      trim($data["protocol"]));
        $orm->set("server",        trim($data["server"]));
        $orm->set("port",          trim($data["port"]));
        $orm->set("login",         trim($data["login"]));
        $orm->set("password",      trim($data["password"]));
        $orm->set("descr",         trim($data["descr"]));
        $orm->set("footer",        intval($data["footer"]));
        $orm->set("cat_id",        intval($data["cat_id"]));
        $orm->set("demand_type_id",        intval($data["demand_type_id"]));

        $orm->set("confirm",       isset($data["confirm"])?1:0);
        $orm->set("master",        isset($data["master"])?1:0);
        $orm->set("from_unknown",  isset($data["from_unknown"])?1:0);

        $regex = array_values(array_filter($data["regex"], function($item) { return ($item["expr"]);}));
        $orm->set("regex",  serialize($regex));
    }

    protected function set_conditions(ORM_EXT &$orm, $ar_conditions, $deleted = false)
    {
        parent::set_conditions($orm, $ar_conditions, $deleted);
        if ($ar_conditions["master"]) {
            $orm->where_equal($this->orm_table.".master", intval($ar_conditions["master"]));
        }
    }

    protected function set_select(ORM_EXT &$orm) {
        parent::set_select($orm);

        $orm->select("categories.name", "cat_name");
        $orm->left_outer_join("categories", "categories.id = ".$this->orm_table.".cat_id");

        // Типы заявок
        $orm->left_outer_join("demands_types", $this->orm_table.".demand_type_id = demands_types.id");
        //$orm->select_expr("IF (".$this->orm_table.".demand_type_id=0, 'Задача', demands_types.name)", "type_name");
        //$orm->select_expr("IF (".$this->orm_table.".demand_type_id=0, 'default', demands_types.type)", "type_type");
    }

    public function save($id = false, $data, &$previous_data = false) {
        if ($result = parent::save($id, $data, $previous_data)) {

            // Если включен флаг "Основной"  -- отключаем все боты
            if (isset($data["master"])) {
                $sql = "UPDATE mailbots SET master=? WHERE id!=? AND master=?";
                ORM_EXT::for_table("mailbots")->raw_execute($sql, array(0, $id, 1));
            }
        }

        return $result;
    }

    public function auto_select($cat_id) {
        $orm = ORM_EXT::for_table("mailbots");
        $orm->select("id");
        $orm->where_raw("(cat_id = ? OR master=?) AND status=?", array($cat_id, 1,1));
        $orm->order_by_asc("master"); // Сначала подходящие под категории (если есть), потом главный
        if (!$result = $orm->find_array()) {
            return 0;
        }

        return $result[0]["id"];
    }



}

?>
