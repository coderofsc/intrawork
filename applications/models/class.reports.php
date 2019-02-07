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

class m_reports extends cls_model {
    private static $instance;

    public $sort    = array("dir"=>SORT_DSC_ZA, "by"=>"took_time");

    public $ar_sort = array(
        "surname"          => array("name"=>"Пользователь"),
        "took_time"         => array("name"=>"Время в работе", "expr"=>"took_time_2"), // В работе
    );

    public $ar_field = array(
        "period_start"                 => "Дата &le;",
        "period_end"                   => "Дата &ge;",
        "role_id"                   => "Роль",
        "dprt_id"                   => "Департамент",
        "post_id"                   => "Должность",
        "user_id"               => "Пользователь"
    );

    protected function __construct() {
        $this->orm_table = "users";
    }


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

        if (isset($ar_condition["user_id"])) { $ar_dictionary_field["user_id"] = array("dictionary"=>m_users::get_instance()->get_array(array("id"=>$ar_condition["user_id"])), "field"=>"short_fio"); }
        if (isset($ar_condition["role_id"])) { $ar_dictionary_field["role_id"] = array("dictionary"=>m_roles::get_instance()->get_array(array("id"=>$ar_condition["role_id"])), "field"=>"name"); }
        if (isset($ar_condition["post_id"])) { $ar_dictionary_field["post_id"] = array("dictionary"=>m_posts::get_instance()->get_array(array("id"=>$ar_condition["post_id"])), "field"=>"name"); }
        if (isset($ar_condition["dprt_id"])) { $ar_dictionary_field["dprt_id"] = array("dictionary"=>m_departments::get_instance()->get_array(array("id"=>$ar_condition["dprt_id"])), "field"=>"name"); }

        return parent::conditions_decode($ar_condition, $ar_dictionary_field);
    }


    protected function prepare_data(&$data, $detailed = true) {
/*
        $ar_user_id = array_keys($data);

        $orm = ORM_EXT::for_table("demands_history_exec");
        $orm->table_alias("d_h_e");

        $orm->select_expr("SUM(IF (elapsed_time IS NULL,(UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(open_time)),elapsed_time))", "took_time");
        $orm->select_expr("COUNT(*)", "count");

        $orm->select("eu_eid");
        $orm->select("status");
        $orm->where_in("eu_eid", $ar_user_id);
        $orm->group_by("eu_eid");
        $orm->group_by("status");
        $ar_exec_status = $orm->find_array();

        foreach ($ar_exec_status as $exec_status) {
            $user_id = $exec_status["eu_eid"];
            $status = $exec_status["status"];

            $data[$user_id]["ar_exec_status"][$status]["took_time"] = $exec_status["took_time"];
            $data[$user_id]["ar_exec_status"][$status]["count"]     = $exec_status["count"];
        }


//        var_dump($data);
  //      exit;

        //var_dump($data);
        //exit;
*/
    }

    protected function set_conditions(ORM_EXT &$orm, $ar_conditions) {
        parent::set_conditions($orm, $ar_conditions);

        if (isset($ar_conditions["post_id"])) {
            if (is_array($ar_conditions["post_id"])) {
                $orm->where_in($this->orm_table.".post_id", ($ar_conditions["post_id"]));
            } else {
                $orm->where_equal($this->orm_table.".post_id", intval($ar_conditions["post_id"]));
            }
        }

        if (isset($ar_conditions["dprt_id"])) {
            if (is_array($ar_conditions["dprt_id"])) {
                $orm->where_in($this->orm_table.".dprt_id", ($ar_conditions["dprt_id"]));
            } else {
                $orm->where_equal($this->orm_table.".dprt_id", intval($ar_conditions["dprt_id"]));
            }
        }

        if (isset($ar_conditions["role_id"])) {
            if (is_array($ar_conditions["role_id"])) {
                $orm->where_in("users_roles.role_id", ($ar_conditions["role_id"]));
            } else {
                $orm->where_equal("users_roles.role_id", intval($ar_conditions["role_id"]));
            }

            $orm->left_outer_join("users_roles", "users.id = users_roles.user_id");
        }

        if ($ar_conditions["user_id"]) {
            if (is_array($ar_conditions["user_id"])) {
                $orm->where_in("users.id", $ar_conditions["user_id"]);
            } else {
                $orm->where_equal("users.id", intval($ar_conditions["user_id"]));
            }
        }


    }

    protected function set_select(ORM_EXT &$orm, $detailed = true, $conditions = array()) {
        $orm->select($this->orm_table.".*");
        m_users::orm_get_user_data($orm);


        $sql_dhe_date = "";
        if (isset($conditions["period_start"])) {
            $sql_dhe_date.= "AND (open_time >= '".$conditions["period_start"]."')";
        }
        if (isset($conditions["period_end"])) {
            $sql_dhe_date.= "AND (open_time <= '".$conditions["period_end"]."')";
        }

        foreach (array_keys(m_demands::$ar_status) as $status) {
            $orm->raw_join("LEFT JOIN (SELECT status, eu_eid, COUNT(DISTINCT demand_id) count, SUM(IF (elapsed_time IS NULL,(UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(open_time)),elapsed_time)) elapsed_time FROM demands_history_exec WHERE status=".$status." ".$sql_dhe_date.")", "(d_h_e_".$status.".eu_eid = users.id)", "d_h_e_".$status);
            $orm->select_expr("IFNULL(d_h_e_".$status.".count,0)", "count_".$status);
            $orm->select_expr("IFNULL(d_h_e_".$status.".elapsed_time,0)", "took_time_".$status);
        }
    }

    protected function set_save_data(ORM_EXT $orm, $data) {
        $orm->set("user_eid",  (m_cuser::get_instance()->is_login())?m_cuser::get_instance()->get("eid"):0);
        $orm->set("object_id",      intval($data["object_id"]));
        $orm->set("owner_id",      intval($data["owner_id"]));
        $orm->set("crud",           intval($data["crud"]));
        $orm->set("owner",           intval($data["owner"]));

        if (isset($data["object_name"]) && $data["object_name"]) {
            $orm->set("object_name",    trim($data["object_name"]));
        }
    }

}
