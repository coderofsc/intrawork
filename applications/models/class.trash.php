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

class m_trash extends cls_model {
    private static $instance;
    public $pre_delete      = false;

    public $sort    = array("dir"=>SORT_DSC_ZA, "by"=>"delete_date");
    public $ar_sort  = array(
        "delete_date"          => array("name"=>L::forms_labels_date)
    );

    public $ar_field = array(
        "delete_date"      =>L::forms_labels_date
    );

    private function __clone() { }

    public static function get_instance()
    {

        /*
        echo "ALTER ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `trash` AS ";

        $ar_unions = array();

        $ar_unions[] = "SELECT SHA1(CONCAT(source.id, '-',".cls_modules::MODULE_CATEGORIES.")) id, ".cls_modules::MODULE_CATEGORIES." as module_id, source.delete_date, source.delete_user_id, source.id object_id, source.name object_name, '' description, '' extra_data FROM categories source WHERE source.delete_date IS NOT NULL";
        $ar_unions[] = "SELECT SHA1(CONCAT(source.id, '-',".cls_modules::MODULE_CONTACTS.")) id, ".cls_modules::MODULE_CONTACTS." as module_id, source.delete_date, source.delete_user_id, source.id object_id, CONCAT_WS(' ', source.face_surname, source.face_name, source.face_patronymic, CONCAT_WS(' ', IF(source.opf<>'',source.opf, NULL), CONCAT('«',source.company,'»'))) object_name, '' description, '' extra_data FROM contacts source WHERE source.delete_date IS NOT NULL";
        $ar_unions[] = "SELECT SHA1(CONCAT(source.id, '-',".cls_modules::MODULE_DEMANDS.")) id, ".cls_modules::MODULE_DEMANDS." as module_id, source.delete_date, source.delete_user_id, source.id object_id, source.title object_name, '' description, '' extra_data FROM demands source WHERE source.delete_date IS NOT NULL";
        $ar_unions[] = "SELECT SHA1(CONCAT(source.id, '-',".cls_modules::MODULE_DEPARTMENTS.")) id, ".cls_modules::MODULE_DEPARTMENTS." as module_id, source.delete_date, source.delete_user_id, source.id object_id, source.name object_name, '' description, '' extra_data FROM departments source WHERE source.delete_date IS NOT NULL";
        $ar_unions[] = "SELECT SHA1(CONCAT(source.id, '-',".cls_modules::MODULE_MAILBOTS.")) id, ".cls_modules::MODULE_MAILBOTS." as module_id, source.delete_date, source.delete_user_id, source.id object_id, source.name object_name, '' description, '' extra_data FROM mailbots source WHERE source.delete_date IS NOT NULL";
        $ar_unions[] = "SELECT SHA1(CONCAT(source.id, '-',".cls_modules::MODULE_MROOMS.")) id, ".cls_modules::MODULE_MROOMS." as module_id, source.delete_date, source.delete_user_id, source.id object_id, source.name object_name, '' description, '' extra_data FROM mrooms source WHERE source.delete_date IS NOT NULL";
        $ar_unions[] = "SELECT SHA1(CONCAT(source.id, '-',".cls_modules::MODULE_NEWS.")) id, ".cls_modules::MODULE_NEWS." as module_id, source.delete_date, source.delete_user_id, source.id object_id, source.title object_name, '' description, '' extra_data FROM news source WHERE source.delete_date IS NOT NULL";
        $ar_unions[] = "SELECT SHA1(CONCAT(source.id, '-',".cls_modules::MODULE_POSTS.")) id, ".cls_modules::MODULE_POSTS." as module_id, source.delete_date, source.delete_user_id, source.id object_id, source.name object_name, '' description, '' extra_data FROM posts source WHERE source.delete_date IS NOT NULL";
        $ar_unions[] = "SELECT SHA1(CONCAT(source.id, '-',".cls_modules::MODULE_ROLES.")) id, ".cls_modules::MODULE_ROLES." as module_id, source.delete_date, source.delete_user_id, source.id object_id, source.name object_name, '' description, '' extra_data FROM roles source WHERE source.delete_date IS NOT NULL";
        $ar_unions[] = "SELECT SHA1(CONCAT(source.id, '-',".cls_modules::MODULE_USERS.")) id, ".cls_modules::MODULE_USERS." as module_id, source.delete_date, source.delete_user_id, source.id object_id, CONCAT_WS(' ', source.surname, source.name, source.patronymic) object_name, '' description, '' extra_data FROM users source WHERE source.delete_date IS NOT NULL";

        foreach ($ar_unions as $union) {
            echo $union;
            echo "<BR/> UNION ";
        }
        exit;
        */

        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function get_raw_conditions($ar_conditions, $deleted = false) {
        $raw_conditions = array();

        if ($ar_conditions["id"]) {
            if (is_array($ar_conditions["id"])) {
                $raw_conditions[] = $this->orm_table.".id IN ('".implode("','", $ar_conditions["id"])."')";
            } else {
                $raw_conditions[] = $this->orm_table.".id = '".trim($ar_conditions["id"]."'");
            }
        }

        $raw_conditions[] = $this->orm_table.".delete_user_id = ".m_cuser::get_instance()->get("id");

        return $raw_conditions;
    }

    protected function set_conditions(ORM_EXT &$orm, $ar_conditions, $deleted) {
        parent::set_conditions($orm, $ar_conditions, $deleted);
        //$orm->where_equal($this->orm_table.".delete_user_id", m_cuser::get_instance()->get("id"));
    }

    protected function set_select(ORM_EXT &$orm) {
        parent::set_select($orm);

        $orm->select_expr("UNIX_TIMESTAMP(".$this->orm_table.".delete_date)", "unix_delete_date");
        $orm->left_outer_join("users", "users.id = ".$this->orm_table.".delete_user_id");
        m_users::orm_get_user_data($orm);
    }

    public function delete($id) {
        $result = false;

        $orm = ORM_EXT::for_table($this->get_table_name());
        if ($data = $orm->find_one($id)) {

            $module_data = cls_modules::$ar_modules[$data->module_id];
            $model_name = "m_".$module_data["alias"];
            $model = $model_name::get_instance();

            $result = $model->delete($data["object_id"], true);
        }

        return $result;
    }

    public function restore($id, &$module_data = false, &$data = false) {
        $result = false;

        $orm = ORM_EXT::for_table($this->get_table_name());
        if ($data = $orm->find_one($id)) {

            $module_data = cls_modules::$ar_modules[$data->module_id];
            $model_name = "m_".$module_data["alias"];
            $model = $model_name::get_instance();

            $result = $model->restore($data["object_id"]);
        }

        return $result;

    }

    public function clear() {
        $ar_table = array();
        $ar_table[] = "categories";
        $ar_table[] = "contacts";
        $ar_table[] = "demands";
        $ar_table[] = "departments";
        $ar_table[] = "mailbots";
        $ar_table[] = "mrooms";
        $ar_table[] = "news";
        $ar_table[] = "posts";
        $ar_table[] = "roles";
        $ar_table[] = "users";

        foreach ($ar_table as $table) {
            return ORM_EXT::for_table($table)->where_equal("delete_user_id", m_cuser::get_instance()->get("id"))->delete_many();
        }


    }



}
