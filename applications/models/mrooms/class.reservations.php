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

class m_mrooms_reservations extends cls_model {
    private static $instance;
    public $sort   = array("dir"=>SORT_DSC_ZA, "by"=>"end");
    public  $ar_sort  = array(
        "start"       => array("name"=>L::forms_labels_mroomsres_start),
        "end"         => array("name"=>L::forms_labels_mroomsres_end),
        "user_id"     => array("name"=>L::modules_users_morph_one),
        "mroom_id"    => array("name"=>L::modules_mrooms_morph_one),
        "duration"    => array("name"=>L::forms_labels_mroomsres_duration, "expr"=>"duration"),
        "remaning"    => array("name"=>L::forms_labels_mroomsres_remain_short, "expr"=>"remaning"),

    );


    // private function __construct() { $this->orm_table = substr(__CLASS__, 2); }
    private function __clone() { }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    protected  function set_conditions(ORM_EXT &$orm, $ar_conditions) {
        if ($ar_conditions["mroom_id"]) {
            $orm->where_equal("mroom_id", $ar_conditions["mroom_id"]);
        }
        if ($ar_conditions["start"]) {
            $orm->where_raw("UNIX_TIMESTAMP(start) >= ?", array($ar_conditions["start"]));
        }
        if ($ar_conditions["end"]) {
            $orm->where_raw("UNIX_TIMESTAMP(end) <= ?", array($ar_conditions["end"]));
        }
    }

    protected function set_select(ORM_EXT &$orm) {
        $orm->select($this->orm_table.".*");
        $orm->select("mrooms.name", "name");
        $orm->select("mrooms.bgcolor", "bgcolor");
        $orm->select_expr("UNIX_TIMESTAMP(start)",   "unix_start");
        $orm->select_expr("UNIX_TIMESTAMP(end)",     "unix_end");
        $orm->select_expr("UNIX_TIMESTAMP(end)-UNIX_TIMESTAMP(start)",     "duration");
        $orm->select_expr("IF (UNIX_TIMESTAMP(NOW())>UNIX_TIMESTAMP(end),0,UNIX_TIMESTAMP(end)-UNIX_TIMESTAMP(NOW()))",     "remaning");

        $orm->left_outer_join("mrooms", "mrooms.id = mroom_id");

        $orm->left_outer_join("users", "users.id = ".$this->orm_table.".user_id");
        m_users::orm_get_user_data($orm);
    }

    protected function add_select_clear_one(&$orm) {
        $orm->select("mrooms.name", "name");
        $orm->left_outer_join("mrooms", "mrooms.id = mroom_id");
    }

    protected function set_save_data(ORM_EXT &$orm, $data, $id = false) {
        $orm->set("mroom_id",           intval($data["mroom_id"]));
        $orm->set("start",              $data["start"]);
        $orm->set("end",                $data["end"]);
        $orm->set("descr",              trim($data["descr"]));

        if (!$id) {
            $orm->set("user_id",           m_cuser::get_instance()->get("id"));
        }
    }


}
