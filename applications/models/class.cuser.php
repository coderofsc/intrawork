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

class m_cuser {
    private static $instance;

    private function __construct() { }
    private function __clone() { }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function activity()
    {
        $state_sort     = isset($_SESSION["sort"])?$_SESSION["sort"]:array();
        $state_na       = isset($_SESSION["next_redirect"])?$_SESSION["next_redirect"]:array();
        $current_url    = cls_tools::get_instance()->is_ajax()?null:cls_tools::get_instance()->get_current_url();

        $session_state    = array("sort"=>$state_sort, "next_redirect"=>$state_na);

        $update_field = array();
        $update_field["session_state"]  = serialize($session_state);
        if ($current_url !== null && $current_url != "logout/") {
            $pathinfo = pathinfo($current_url);
            $update_field["current_url"]    = ($current_url && !$pathinfo["extension"])?$current_url:null;
        }

        $update_sql = "update users set activity_date=NOW(), ".implode("=?,", array_keys($update_field))."=?  where id='".$this->get("id")."'";
        ORM_EXT::raw_execute($update_sql, array_values($update_field));
        $_SESSION[CUSER_SESSION_KEY]["unix_activity_date"] = time();
    }

    /*public function offline_act_date()
    {
        ORM_EXT::raw_execute("update users set act_date=FROM_UNIXTIME(UNIX_TIMESTAMP(NOW())-?) where id=?", array(USERS_ACTIVE_TIME, $this->get("id")));
    }*/

    public function check_access($owner_id, $crud_owner, $crud = false) {

        if ($_SESSION[CUSER_SESSION_KEY]["super_admin"] /*&& (isset($_SESSION[CUSER_SESSION_KEY]["super_admin_mode"]))*/) {
            return true;
        }

        $owner = ($crud_owner == m_roles::CRUD_OWNER_MODULE)?"module":"categories";

        // Разрешаем, если в модуле CRUD всегда разрешен (например, категории -
        // всегда открыт просмотр) или модуля нет в настройках доступа
        if ($crud_owner == m_roles::CRUD_OWNER_MODULE) {
            /*if (!isset(cls_modules::$ar_modules[$owner_id])) {
                echo "Неизвестный модуль";
                var_dump($owner_id);
                exit;
            }*/


            if (!isset(cls_modules::$ar_modules[$owner_id]) || !in_array($crud, cls_modules::$ar_modules[$owner_id]["possible_access_mode"])) {
                return $crud;
            }
        }

        if ($crud && isset($_SESSION[CUSER_SESSION_KEY]["crud_".$owner][$owner_id])
            && $_SESSION[CUSER_SESSION_KEY]["crud_".$owner][$owner_id] & $crud) {
            return $_SESSION[CUSER_SESSION_KEY]["crud_".$owner][$owner_id];
        } else if (!$crud && isset($_SESSION[CUSER_SESSION_KEY]["crud_".$owner])) {
            return $_SESSION[CUSER_SESSION_KEY]["crud_".$owner];
        }

        return false;
    }

    // Возвращает массив категорий с утановленным CRUD-флагом
    public function get_crud_cats($need_crud) {

        $result = array();

        $ar_cats = $this->get("crud_categories");
        foreach ($ar_cats as $cat_id => $crud) {
            if ($crud & $need_crud) {
                $result[] = $cat_id;
            }

        }

        return $result;
    }

    public function check_access_module($module_id, $crud = false) {
        return $this->check_access($module_id, m_roles::CRUD_OWNER_MODULE, $crud);
    }

    public function check_access_category($category_id, $crud = false) {
        return $this->check_access($category_id, m_roles::CRUD_OWNER_CATEGORIES, $crud);
    }

    public function get_data()
    {
        return $_SESSION[CUSER_SESSION_KEY];
    }

    public function get($name)
    {
        if (isset($_SESSION[CUSER_SESSION_KEY][$name])) {
            return $_SESSION[CUSER_SESSION_KEY][$name];
        }
        return null;
    }

    public function __get($name)
    {
        return $this->get($name);
    }


    public function set($name, $value)
    {
        return $_SESSION[CUSER_SESSION_KEY][$name] = $value;
    }

    public function is_login() {
        return (isset($_SESSION[CUSER_SESSION_KEY]));
    }

    private function set_user_data($data, $access = true) {

        if ($access) {
            $data["crud_module"]      = m_roles::get_instance()->get_crud_module($data["role_id"]);
            $data["crud_categories"]  = m_roles::get_instance()->get_crud_categories($data["role_id"]);
            $data["access_data"]      = m_roles::get_instance()->merge_roles_data($data["role_id"], $data);

            if ($access_categories = array_keys($data["crud_categories"])) {
                $ar_missing_parents = m_categories::get_instance()->get_missing_parents($access_categories, m_categories::get_instance()->get_array(array(), false));
                $data["ar_access_visible_categories_id"] = array_unique(array_merge($ar_missing_parents, $access_categories));
            }

        } else {
            $data["crud_module"]      = $this->get("crud_module");
            $data["crud_categories"]  = $this->get("crud_categories");
            $data["ar_access_visible_categories_id"]  = $this->get("ar_access_visible_categories_id");
            $data["access_data"]      = $this->get("access_data");
        }

        return $_SESSION[CUSER_SESSION_KEY] = $data;
    }

    public function refresh($access = true) {

        if ($user_data = m_users::get_instance()->get_one($this->get("id"))) {
            return $this->set_user_data($user_data, $access);
        }

        return false;
    }

    public function restore_session_state() {
        if ($orm = ORM_EXT::for_table("users")->select("session_state")->find_one($this->get("id"))) {

            if ($session_state = $orm->get("session_state")) {
                $session_state = unserialize($session_state);
                $_SESSION["sort"]           = isset($session_state["sort"])?$session_state["sort"]:array();
                $_SESSION["next_redirect"]  = isset($session_state["next_redirect"])?$session_state["next_redirect"]:array();
            }
        }
    }

    public function restore_location() {
        if ($orm = ORM_EXT::for_table("users")->select("current_url")->find_one($this->get("id"))) {

            if ($current_url = $orm->get("current_url")) {
                return $current_url;
            }
        }

        return false;
    }

    public function login($email, $password) {
        $ar_conditions["password"]  = $password;
        $ar_conditions["email"]     = $email;

        $total = 0;
        $result = m_users::get_instance()->get_array($ar_conditions, 1, 0, array(), $total, true);

        if (!$total || !$result) {
            return false;
        }

        $result = array_pop($result);
        if ($result = $this->set_user_data($result)) {
            $this->save_session_id();
            $this->restore_session_state();


        }

        return $result;
    }

    public function logout() {
        unset($_SESSION[CUSER_SESSION_KEY]);
    }

    public function save_session_id() {
        ORM_EXT::raw_execute("update users set session_id='".session_id()."' where id=?", array($this->get("id")));
    }

}

?>
