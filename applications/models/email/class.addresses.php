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

class m_email_addresses extends cls_model {
    private static $instance;
    public $sort   = array("dir"=>SORT_DSC_ZA, "by"=>"publish_date");
    public  $ar_sort  = array(
        "publish_date"       => array("name"=>"Дата публикации"),
        "create_date"          => array("name"=>"Дата создания"),
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

    protected function set_select(ORM_EXT &$orm) {
        $orm->select($this->orm_table.".*");
    }

    protected function set_save_data(ORM_EXT &$orm, $data) {
        $orm->set("email",             trim($data["email"]));
    }

}

?>
