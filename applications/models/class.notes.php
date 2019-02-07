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

class m_notes extends cls_model {
    private static $instance;

    public $sort    = array("dir"=>SORT_DSC_ZA, "by"=>"create_date");

    protected function __construct() {
        $this->orm_table = "notes";
    }


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
            $item = cls_tools::get_instance()->link_it($item);

        }
    }


    protected function set_conditions(ORM_EXT &$orm, $ar_conditions, $deleted = false) {
        parent::set_conditions($orm, $ar_conditions, $deleted);
        $orm->where_equal("user_id", m_cuser::get_instance()->get("id"));

    }


    protected function set_select(ORM_EXT &$orm) {
        $orm->select($this->orm_table.".*");
        $orm->select_expr("UNIX_TIMESTAMP(create_date)", "create_date_unix");
    }


    protected function set_save_data(ORM_EXT $orm, $data) {
        $orm->set("user_id",  (m_cuser::get_instance()->is_login())?m_cuser::get_instance()->get("id"):0);
        $orm->set("title",     trim($data["title"]));
        $orm->set("text",      trim($data["text"]));
    }

}
