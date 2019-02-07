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

class m_files_folders extends cls_model {
    private static $instance;

    public $sort    = array("dir"=>SORT_ASC_AZ, "by"=>"position");

    private function __clone() { }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function delete($id, $finally = false) {
        $result = parent::delete($id, $finally);

        return $result;
    }


    public function update_orders($ar_orders) {

        $ar_sql_update_parent = $ar_sql_update_position = $ar_sql_update_public = array();

        foreach ($ar_orders as $id => $item) {
            $ar_sql_update_parent[]     = " WHEN id = ".$id." THEN ".$item["parent_id"];
            $ar_sql_update_position[]   = " WHEN id = ".$id." THEN ".$item["position"];
            //$ar_sql_update_public[]   = " WHEN id = ".$id." THEN IFNULL((SELECT IF (ff.public=1 OR ff.parent_id=1,1,0) FROM files_folders ff WHERE ff.id=".intval($item["parent_id"])."), 0)";
        }

        $sql = "UPDATE ".$this->orm_table." SET parent_id = CASE ".implode(" ", $ar_sql_update_parent)." END, position = CASE ".implode(" ", $ar_sql_update_position)." END WHERE id IN(".implode(",", array_keys($ar_orders)).")";

        ORM_EXT::for_table($this->orm_table)->raw_execute($sql);

        // Обновляем видимость.
        $update_public_sql = "UPDATE files_folders SET public = IF (files_folders.parent_id = 1,1, IFNULL((SELECT IF(x.public=1 OR x.parent_id=1,1,0) FROM (SELECT id, public, parent_id FROM files_folders) x WHERE x.id=files_folders.parent_id),0)) AND files_folders.id IN(".implode(",", array_keys($ar_orders)).")";
        return ORM_EXT::for_table($this->orm_table)->raw_execute($update_public_sql);
    }

    protected function set_conditions(ORM_EXT &$orm, $ar_conditions, $deleted = false) {
        parent::set_conditions($orm, $ar_conditions, $deleted);

        if (m_cuser::get_instance()->check_access_module(cls_modules::MODULE_FILES, m_roles::CRUD_R)) {
            $orm->where_raw("(user_id = ? OR public=?)", array(m_cuser::get_instance()->get("id"), 1));
        } else {
            $orm->where_raw("(user_id = ? AND public!=?)", array(m_cuser::get_instance()->get("id"), 1));
        }


    }


    protected function set_select(ORM_EXT &$orm) {
        $orm->select($this->orm_table.".*");
    }


    protected function set_save_data(ORM_EXT $orm, $data) {
        $orm->set("user_id",  m_cuser::get_instance()->get("id"));
        $orm->set("name",     trim($data["name"]));

        if (isset($data["parent_id"])) {
            $orm->set("parent_id",     intval($data["parent_id"]));
            $orm->set_expr("public", "IFNULL((SELECT IF (ff.public=1 OR ff.parent_id=1,1,0) FROM files_folders ff WHERE ff.id=".intval($data["parent_id"])."), 0)");
        }
    }

}
