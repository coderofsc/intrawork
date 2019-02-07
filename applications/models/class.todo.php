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

class m_todo extends cls_model {
    private static $instance;

    public $sort    = array("dir"=>SORT_ASC_AZ, "by"=>"status");
    public $ar_sort  = array(
        "create_date"       => array("name"=>L::forms_labels_date),
        "status"            => array("name"=>L::forms_labels_demands_status, "expr"=>"status")
    );

    public $ar_field = array(
        "title"      =>L::forms_labels_title
    );

    private function __clone() { }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function set_status($id, $status) {
        return ORM_EXT::for_table($this->orm_table)->find_one($id)->set("status", $status)->save();
    }

    protected function set_conditions(ORM_EXT &$orm, $ar_conditions, $deleted = false) {
        parent::set_conditions($orm, $ar_conditions, $deleted);

        if (isset($ar_conditions["demand_id"])) {
            $orm->where_equal("demand_id", intval($ar_conditions["demand_id"]));
        }

        if (isset($ar_conditions["user_id"])) {
            $orm->where_equal("user_id", intval($ar_conditions["user_id"]));
        }

        if (isset($ar_conditions["status"])) {
            $orm->where_equal("status", intval($ar_conditions["status"]));
        }
    }

    protected function set_select(ORM_EXT &$orm) {
        parent::set_select($orm);
    }

    protected function set_save_data(ORM_EXT $orm, $data, $id = 0) {
        $orm->set("title",        trim($data["title"]));
        $orm->set("demand_id",    intval($data["demand_id"]));
        $orm->set("status",       intval($data["status"]));

        if (!$id) {
            $orm->set("user_id",  m_cuser::get_instance()->get("id"));
        }
    }
}