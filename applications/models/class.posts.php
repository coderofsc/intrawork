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

class m_posts extends cls_model {
    private static $instance;
    public $pre_delete      = true;

    public $sort    = array("dir"=>SORT_ASC_AZ, "by"=>"name");
    public $ar_sort  = array(
        "name"          => array("name"=>L::forms_labels_name),
        "users_count"   => array("name"=>L::forms_labels_composition, "expr"=>"users_count"),
    );

    public $ar_field = array(
        "name"      =>L::forms_labels_name,
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

    protected function set_select(ORM_EXT &$orm) {
        parent::set_select($orm);
        $orm->select_expr("(SELECT COUNT(*) FROM users u WHERE u.delete_date IS NULL AND u.post_id = ".$this->orm_table.".id)", "users_count");
    }

    protected function set_save_data(ORM_EXT $orm, $data) {
        $orm->set("name",              trim($data["name"]));
        $orm->set("descr",              trim($data["descr"]));
    }

}

?>
