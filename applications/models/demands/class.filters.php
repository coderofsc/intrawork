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

class m_demands_filters extends cls_model {
    private static $instance;

    // private function __construct() { $this->orm_table = substr(__CLASS__, 2); }
    private function __clone() { }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    protected  function prepare_data(&$data) {
        foreach ($data as &$value) {
            $value["conditions"] = unserialize($value["conditions"]);
            $value["sort"] = unserialize($value["sort"]);
        }
    }

    protected function set_conditions(ORM_EXT &$orm, $ar_conditions) {
        $orm->where_equal($this->orm_table.".user_id", m_cuser::get_instance()->get("id"));
    }

    protected function set_select(ORM_EXT &$orm) {
        $orm->select($this->orm_table.".*");
    }

    protected function set_save_data(ORM_EXT &$orm, $data) {
        $orm->set("user_id",       m_cuser::get_instance()->get("id"));
        $orm->set("name",          trim($data["name"]));
        $orm->set("conditions",    serialize($data["conditions"]));
        $orm->set("sort",          serialize($data["sort"]));
    }

}

?>
