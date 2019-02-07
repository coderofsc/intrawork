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

class m_files extends cls_model {
    private static $instance;

    public $save_events = false; // отключаем сохранения событий

    public $sort    = array("dir"=>SORT_DSC_ZA, "by"=>"create_date", "table"=>"fs");

    public $ar_field    = array(
        "folder_id"                  => "Папка",
    );


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

        $file = $this->get_one($id);
        cls_storage::for_owner(OWNER_FILE_FOLDER)->delete($file["hash"]);

        return $result;
    }

    public function move($id, $folder_id) {
        $result = false;

        $orm = ORM_EXT::for_table($this->orm_table);
        $orm->select($this->orm_table.".*");
        $orm->where_raw("(fs.user_eid = ? AND (folder.id IS NULL OR folder.public!=? AND folder.id != ?))", array(m_cuser::get_instance()->get("eid"), 1, FILE_PUBLIC));
        $orm->left_outer_join("files_folders", "files.folder_id = folder.id", "folder");
        $orm->inner_join("file_storage", "files.storage_id = fs.id", "fs");

        if ($file = $orm->find_one($id)) {
            $file->set("folder_id", $folder_id);
            $result = $file->save();
        }

        return $result;
    }


    private function get_group($ext) {
        $ar_groups["image"] = array("jpg", "jpeg", "png", "gif", "bmp");
        $ar_groups["doc"] = array("xls", "xlsx", "doc", "docx");
        $ar_groups["audio"] = array("mp3", "wav");
        $ar_groups["video"] = array("mp4", "avi", "mov");

        foreach ($ar_groups as $group => $ar_ext) {
            if (in_array($ext, $ar_ext)) {
                return $group;
            }
        }

        return "other";
    }

    protected function prepare_data(&$data, $detailed = true) {
        foreach ($data as &$item) {
            $item["group"] = $this->get_group($item["ext"]);
        }
    }

    protected function set_conditions(ORM_EXT &$orm, $ar_conditions, $deleted = false) {
        parent::set_conditions($orm, $ar_conditions, $deleted);

        if (isset($ar_conditions["folder_id"])) {
            $orm->where_equal("folder_id", intval($ar_conditions["folder_id"]));
        }

        if (m_cuser::get_instance()->check_access_module(cls_modules::MODULE_FILES, m_roles::CRUD_R)) {
            $orm->where_raw("(fs.user_eid = ? OR folder.public=? OR folder.id = ?)", array(m_cuser::get_instance()->get("eid"), 1, FILE_PUBLIC));
        } else {
            $orm->where_raw("(fs.user_eid = ? AND (folder.id IS NULL OR folder.public!=? AND folder.id != ?))", array(m_cuser::get_instance()->get("eid"), 1, FILE_PUBLIC));
        }

        $orm->inner_join("file_storage", "files.storage_id = fs.id", "fs");
        $orm->left_outer_join("files_folders", "files.folder_id = folder.id", "folder");
    }


    protected function set_select(ORM_EXT &$orm) {
        parent::set_select($orm);

        $orm->select("fs.create_date", "create_date");
        $orm->select_expr("UNIX_TIMESTAMP(fs.create_date)", "create_date_unix");
        $orm->select("fs.user_eid", "user_eid");
        $orm->select("fs.hash", "hash");
        $orm->select("fs.size", "size");
        $orm->select("fs.thumb", "thumb");
        $orm->select("fs.name", "name");
        $orm->select("fs.ext", "ext");

        // Исполнитель
        $orm->left_outer_join("users", "fs.user_eid = users.eid", "users");
        m_users::orm_get_user_data($orm);

    }


    protected function set_save_data(ORM_EXT $orm, $data) {
        $orm->set("storage_id",     intval($data["storage_id"]));
        $orm->set("folder_id",      intval($data["folder_id"]));
    }

    protected function trigger_insert($id, $data) {
        ORM_EXT::for_table("file_storage")->raw_execute("UPDATE file_storage SET used=? WHERE id=?", array(1, $data["storage_id"]));
        //protected function trigger_insert($id, $data) { }
    }

}
