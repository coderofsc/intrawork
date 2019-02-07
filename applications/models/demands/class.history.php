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

class m_demands_history extends cls_model {
    private static $instance;
    public $sort            = array("dir"=>SORT_ASC_AZ, "by"=>"event_time");

    // private function __construct() { $this->orm_table = substr(__CLASS__, 2); }
    private function __clone() { }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /*protected function set_conditions(ORM_EXT &$orm, $ar_conditions) {
        if ($ar_conditions["demand_id"]) {
            $orm->where_equal($this->orm_table.".demand_id", $ar_conditions["demand_id"]);
        }
    }*/

    protected function set_select(ORM_EXT &$orm) {
        $orm->select($this->orm_table.".*");
        $orm->select_expr("UNIX_TIMESTAMP(".$this->orm_table.".event_time)", "unix_event_time");
        $orm->left_outer_join("users", $this->orm_table.".user_id = users.id");
        m_users::orm_get_user_data($orm);
    }

    public function get_array($conditions = array(), $limit = 9999, $offset = 0, $sort = array(), &$total_records = false, $detailed = false) {

        $result = array();

        if ($conditions["demand_id"]) {

            $ar_union = array();
            $ar_union[] = "(SELECT user_id, event_time, `column`, old_value, new_value, old_value as old_value_decode, new_value new_value_decode FROM demands_history d_h WHERE `column` IN ('status', 'priority', 'criticality', 'cat_id', 'required_time', 'type_id', 'deadline_date', 'percent_complete') AND d_h.demand_id=".intval($conditions["demand_id"]).")";
            $ar_union[] = "(SELECT user_id, event_time, `column`, old_value, new_value, CONCAT(v_old.surname, ' ', LEFT(v_old.name,1 ),'.', IF(v_old.patronymic<>'', CONCAT(LEFT(v_old.patronymic, 1),'.'), '')) as old_value_decode, CONCAT(v_new.surname, ' ', LEFT(v_new.name,1 ),'.', IF(v_new.patronymic<>'', CONCAT(LEFT(v_new.patronymic, 1),'.'), '')) new_value_decode FROM demands_history d_h LEFT JOIN users v_new ON (v_new.eid = d_h.new_value) LEFT JOIN users v_old ON (v_old.eid = d_h.old_value) WHERE `column` IN ('eu_eid', 'ru_eid') AND d_h.demand_id=".intval($conditions["demand_id"]).")";

            if ($result = ORM_EXT::for_table("union")->raw_query(
                "SELECT hr.*,
                    UNIX_TIMESTAMP(hr.event_time) unix_event_time,
                    CONCAT(users.surname, ' ', LEFT(users.name,1 ),'.', IF(users.patronymic<>'', CONCAT(LEFT(users.patronymic, 1),'.'), '')) user_short_fio,
                    users.id user_id,
                    file_storage.hash user_avatar_storage_hash
                FROM
                    (".implode("UNION DISTINCT", $ar_union).") hr
                LEFT JOIN
                    users ON (users.id = hr.user_id)
                LEFT JOIN
                    file_storage ON (file_storage.owner_hash=SHA1(users.id) AND file_storage.owner=".OWNER_USER." AND file_storage.used=1)
                ORDER BY hr.event_time DESC
                LIMIT ".$offset.", ".$limit)->find_array()) {
                $this->prepare_data($result);
            }

            //echo ORM_EXT::get_last_query();
            //exit;

        }

        return $result;
    }




}

?>
