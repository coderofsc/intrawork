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

class m_favorites extends cls_model {
    private static $instance;
    public $pre_delete      = false;

    public $sort    = array("dir"=>SORT_DSC_ZA, "by"=>"create_date");
    public $ar_sort  = array(
        "create_date"          => array("name"=>L::forms_labels_date)
    );

    public $ar_field = array(
        "create_date"      =>L::forms_labels_date
    );

    private function __clone() { }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function get_raw_conditions($ar_conditions, $deleted = false) {
        $raw_conditions = parent::get_raw_conditions($ar_conditions, $deleted);
        $raw_conditions[] = $this->orm_table.".user_id = ".m_cuser::get_instance()->get("id");

        return $raw_conditions;
    }

    protected function set_conditions(ORM_EXT &$orm, $ar_conditions, $deleted = false) {
        parent::set_conditions($orm, $ar_conditions, $deleted);
    }

    protected function set_select(ORM_EXT &$orm) {
        parent::set_select($orm);
        //$orm->select("object_id", "object_name");
        $orm->select_expr("UNIX_TIMESTAMP(".$this->orm_table.".create_date)", "unix_create_date");

        $orm->select_expr("
        CASE
            WHEN module_id = ".cls_modules::MODULE_DEMANDS." THEN (SELECT title FROM demands WHERE id=favorites.object_id)
            WHEN module_id = ".cls_modules::MODULE_CONTACTS." THEN (SELECT CONCAT_WS(' ', face_surname, face_name, face_patronymic) FROM contacts WHERE id=favorites.object_id)
            WHEN module_id = ".cls_modules::MODULE_NEWS." THEN (SELECT title FROM news WHERE id=favorites.object_id)
            WHEN module_id = ".cls_modules::MODULE_ROLES." THEN (SELECT name FROM roles WHERE id=favorites.object_id)
            WHEN module_id = ".cls_modules::MODULE_USERS." THEN (SELECT CONCAT_WS(' ', surname, name, patronymic) FROM users WHERE id=favorites.object_id)
            WHEN module_id = ".cls_modules::MODULE_MAILBOTS." THEN (SELECT name FROM mailbots WHERE id=favorites.object_id)
            WHEN module_id = ".cls_modules::MODULE_PROJECTS." THEN (SELECT name FROM projects WHERE id=favorites.object_id)
        END", "object_name");
    }

    protected function set_save_data(ORM_EXT &$orm, $data) {
        $orm->set("module_id",  $data["module_id"]);
        $orm->set("object_id",  $data["object_id"]);
        $orm->set("user_id",    m_cuser::get_instance()->get("id"));
    }

    public function delete($module_id, $object_id) {
        $result = false;

        $orm = ORM_EXT::for_table($this->get_table_name());
        $orm->where_equal("object_id", $object_id);
        $orm->where_equal("module_id", $module_id);
        if ($data = $orm->find_one()) {
            $result = $data->delete();
        }

        return $result;
    }



}
