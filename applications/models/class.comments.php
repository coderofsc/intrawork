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

class m_comments extends cls_model {
    private $owner_module_id  = 0;
    private $owner_id   = 0;

    private static $instance;

    public $sort    = array("dir"=>SORT_ASC_AZ, "by"=>"create_date");

    protected function __construct($module_id, $owner_id) {
        $this->orm_table    = "comments";
        $this->owner_module_id    = $module_id;
        $this->owner_id     = $owner_id;
    }

    private function __clone() { }

    public static function singleton($module_id, $owner_id)
    {
        if (!isset(self::$instance[$module_id][$owner_id])) {
            self::$instance[$module_id][$owner_id] = new self($module_id, $owner_id);
        }

        return self::$instance[$module_id][$owner_id];
    }

    protected function prepare_data(&$data, $detailed = true) {

        $ar_id      = array_keys($data);
        $ar_hash    = array();

        foreach ($ar_id as $id) $ar_hash[] = sha1($id);

        $ar_attach = ORM_EXT::for_table("file_storage")->where_equal("owner", OWNER_COMMENT)->where_in("owner_hash", $ar_hash)->find_assoc("owner_hash", true);
        //var_dump($ar_attach);
        //exit;

        foreach ($data as $id=>&$item) {
            cls_tools::get_instance()->add_img_class_in_content($item["text"]);
            $item["ar_attach"] = isset($ar_attach[sha1($id)])?$ar_attach[sha1($id)]:array();
        }
    }

    public function attach($comment_id) {
        $ar_attach = (isset($_POST["ar_attach"]) && is_array($_POST["ar_attach"]))?$_POST["ar_attach"]:array();
        if ($ar_attach) {
            foreach ($ar_attach["hash"] as $hash) {
                ORM_EXT::raw_execute("UPDATE file_storage SET owner_hash=?, used=? WHERE used=? AND owner=? AND hash=?", array(sha1($comment_id), 1, 0, OWNER_COMMENT, $hash));
            }
        }
    }


    protected function set_conditions(ORM_EXT &$orm, $ar_conditions, $deleted = false) {
        parent::set_conditions($orm, $ar_conditions, $deleted);

        $orm->where_equal("module_id", $this->owner_module_id);
        $orm->where_equal("owner_id",  $this->owner_id);
    }

    protected function set_select(ORM_EXT &$orm) {
        $orm->select($this->orm_table.".*");
        $orm->select_expr("UNIX_TIMESTAMP(comments.create_date)", "create_date_unix");

        $orm->left_outer_join("users", "users.id = comments.user_id");
        m_users::orm_get_user_data($orm);
    }

    protected function set_save_data(ORM_EXT $orm, $data) {

        $orm->set("module_id", $this->owner_module_id);
        $orm->set("owner_id",  $this->owner_id);

        $orm->set("user_id",  (m_cuser::get_instance()->is_login())?m_cuser::get_instance()->get("id"):0);
        $orm->set("text",      trim($data["text"]));
    }

}
