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

class m_demands_history_exec extends cls_model {
    private static $instance;
    public $sort            = array("dir"=>SORT_ASC_AZ, "by"=>"open_time");

    // private function __construct() { $this->orm_table = substr(__CLASS__, 2); }
    private function __clone() { }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    protected function set_conditions(ORM_EXT &$orm, $ar_conditions) {
        if ($ar_conditions["demand_id"]) {
            $orm->where_equal($this->orm_table.".demand_id", $ar_conditions["demand_id"]);
        }
    }

    protected function set_select(ORM_EXT &$orm) {
        $orm->select($this->orm_table.".*");
        $orm->select_expr("UNIX_TIMESTAMP(".$this->orm_table.".open_time)", "unix_open_time");
        $orm->select_expr("UNIX_TIMESTAMP(".$this->orm_table.".close_time)", "unix_close_time");
        $orm->select_expr("(IF(".$this->orm_table.".close_time IS NULL,UNIX_TIMESTAMP(NOW()), UNIX_TIMESTAMP(".$this->orm_table.".close_time))-UNIX_TIMESTAMP(".$this->orm_table.".open_time))", "elapsed_time");
        $orm->left_outer_join("users", $this->orm_table.".eu_eid = users.eid");
        m_users::orm_get_user_data($orm);
    }



}

?>
