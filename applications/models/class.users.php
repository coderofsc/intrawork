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

class m_users extends cls_model {
    private static $instance;

    public $pre_delete      = true;

    public  $ar_sort  = array(
        "surname"       => array("name"=>L::forms_labels_face_surname),
        "name"          => array("name"=>L::forms_labels_face_name),
        "inside"        => array("name"=>L::forms_labels_users_network_status, "expr"=>"inside"),
        "dprt_id"       => array("name"=>L::modules_departments_morph_one),
        "post_id"       => array("name"=>L::modules_posts_morph_one),
        "create_date"   => array("name"=>L::forms_labels_registration_date, "expr"=>"users.create_date"),
        "activity_date" => array("name"=>L::forms_labels_users_activity_date)
    );
    public $sort   = array("dir"=>SORT_ASC_AZ, "by"=>"surname");

    public $ar_field = array(
        "fio"           => L::forms_labels_fio,
        "cat_id"        => L::modules_categories_morph_one,
        "phone"         => L::forms_labels_phone,
        "phone_mobile"  => L::forms_labels_phone_mobile,
        "name"          => L::forms_labels_face_name,
        "surname"       => L::forms_labels_face_surname,
        "patronymic"    => L::forms_labels_face_patronymic,

        "email"         => L::forms_labels_email,
        "dprt_id"       => L::modules_departments_morph_one,
        "post_id"       => L::modules_posts_morph_one,
        "role_id"       => L::modules_roles_morph_one,
        "reg_start"     => L::forms_labels_reg_start,
        "reg_end"       => L::forms_labels_reg_end,
        "act_start"     => L::forms_labels_act_start,
        "act_end"       => L::forms_labels_act_end,
        "descr"         => L::forms_labels_descr
    );

    public $master_field = "fio";

    private function __clone() { }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function find_by_email($email) {
        $orm = ORM_EXT::for_table($this->orm_table);
        $orm->select($this->orm_table.".*");
        $orm->select("e_a.email", "email");
        $orm->left_outer_join("email_addresses", "e_a.id = ".$this->orm_table.".eid", "e_a");

        $orm->where_equal("e_a.email", $email);
        if ($orm = $orm->find_one()) {
            return $orm->as_array();
        }

        return false;
    }

    public function change_password($password, $user_id) {

        if(!$password || !$user_id) {
            return false;
        }

        if (m_cuser::get_instance()->is_login() && m_cuser::get_instance()->get("id") == $user_id) {
            $_SESSION[CUSER_SESSION_KEY]["password"] = sha1($password.PASSWORD_SALT);
        }

        ORM_EXT::for_table("users")->find_one($user_id)->set_expr("password", "SHA1(CONCAT('".$password."','".PASSWORD_SALT."'))")->save();

        return true;
    }



    public function conditions_decode($ar_condition) {

        $ar_dictionary_field = array();

        if (isset($ar_condition["cat_id"])) {
            $ar_dictionary_field["cat_id"] = array("dictionary"=>cls_register::get_instance()->get("ar_access_line_categories"), "field"=>"name");
        }

        if (isset($ar_condition["role_id"])) { $ar_dictionary_field["role_id"] = array("dictionary"=>m_roles::get_instance()->get_array(array("id"=>$ar_condition["role_id"])), "field"=>"name"); }
        if (isset($ar_condition["post_id"])) { $ar_dictionary_field["post_id"] = array("dictionary"=>m_posts::get_instance()->get_array(array("id"=>$ar_condition["post_id"])), "field"=>"name"); }
        if (isset($ar_condition["dprt_id"])) { $ar_dictionary_field["dprt_id"] = array("dictionary"=>m_departments::get_instance()->get_array(array("id"=>$ar_condition["dprt_id"])), "field"=>"name"); }

        return parent::conditions_decode($ar_condition, $ar_dictionary_field);
    }


    static function orm_get_user_data(ORM_EXT &$orm, $prefix = "user", $user_table = "users", $email = true) {

        $field_prefix = ($prefix)?$prefix."_":"";

        $orm->select_expr("CONCAT_WS(' ', ".$user_table.".surname, ".$user_table.".name, IF(".$user_table.".patronymic<>'', ".$user_table.".patronymic, NULL))", $field_prefix."fio");
        $orm->select_expr("CONCAT_WS(' ', ".$user_table.".surname, ".$user_table.".name)", $field_prefix."fi");
        $orm->select_expr("CONCAT(".$user_table.".surname, ' ', LEFT(".$user_table.".name,1 ),'.', IF(".$user_table.".patronymic<>'', CONCAT(LEFT(".$user_table.".patronymic, 1),'.'), ''))", $field_prefix."short_fio");

        $orm->select("file_storage.ext", $field_prefix."avatar_storage_ext");
        $orm->select("file_storage.hash", $field_prefix."avatar_storage_hash");
        $orm->left_outer_join("file_storage", "(file_storage.owner_hash = SHA1(".$user_table.".id) AND file_storage.owner=".OWNER_USER." AND file_storage.used=1)");


        //$orm->select_expr("(SELECT SUM(IF (elapsed_time IS NULL,(UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(open_time)),elapsed_time)) FROM demands_history_exec WHERE status=".m_demands::STATUS_WORK." AND eu_eid=".$this->orm_table.".eid AND demand_id=".$this->orm_table.".demand_id)", "exec_time");


        $orm->select_expr("UNIX_TIMESTAMP(".$user_table.".create_date)", $field_prefix."unix_create_date");
        $orm->select_expr("UNIX_TIMESTAMP(".$user_table.".activity_date)", $field_prefix."unix_activity_date");
        $orm->select_expr("IF (UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(".$user_table.".activity_date) > ".config()->inside_time_period.",0,1)", $field_prefix."inside");

        if ($field_prefix) {
            $orm->select($user_table.".id", $field_prefix."id");
        }
        $orm->select("posts.id", $field_prefix."post_id")->select("posts.name", $field_prefix."post_name");
        $orm->select("departments.id", $field_prefix."dprt_id")->select("departments.name", $field_prefix."dprt_name");
        $orm->left_outer_join("posts", "posts.id = ".$user_table.".post_id");
        $orm->left_outer_join("departments", "departments.id = ".$user_table.".dprt_id");

        if ($email) {
            $orm->select("e_a.email", $field_prefix."email");
            $orm->left_outer_join("email_addresses", "e_a.id = ".$user_table.".eid", "e_a");
        }
    }

    public function get_roles($user_id) {
        $orm = ORM_EXT::for_table("users_roles");

        if (is_array($user_id)) {
            $orm->select_many("user_id", "role_id");
            $orm->where_in("user_id", $user_id);
            $result = $orm->find_assoc("user_id", true, "role_id");
        } else {
            $orm->select("role_id");
            $orm->where_equal("user_id", $user_id);
            $result = $orm->find_array_cell();
        }

        return $result;
    }

    protected function prepare_data(&$data, $detailed = false) {

        foreach ($data as $id=>$value) {
            $data[$id]["exec_notice_weekdays"] = explode(",", $value["exec_notice_weekdays"]);
        }

        if ($detailed) {

            $ar_id = array_keys($data);
            $ar_roles = $this->get_roles($ar_id);//ORM_EXT::for_table("users_roles")->where_in("user_id", $ar_id)->find_assoc("user_id", true, "role_id");

            foreach ($ar_roles as $user_id => $role_id) {
                $data[$user_id]["role_id"] = $role_id;
            }
        }
    }

    public function delete($id) {
        $result = false;

        if ($id != m_cuser::get_instance()->get("id")) {
            $result = parent::delete($id);
        }

        return $result;
    }

    protected  function set_conditions(ORM_EXT &$orm, $ar_conditions, $deleted = false)
    {
        parent::set_conditions($orm, $ar_conditions, $deleted);

        if (isset($ar_conditions["post_id"])) {
            if (is_array($ar_conditions["post_id"])) {
                $orm->where_in($this->orm_table.".post_id", ($ar_conditions["post_id"]));
            } else {
                $orm->where_equal($this->orm_table.".post_id", intval($ar_conditions["post_id"]));
            }
        }

        if (isset($ar_conditions["dprt_id"])) {
            if (is_array($ar_conditions["dprt_id"])) {
                $orm->where_in($this->orm_table.".dprt_id", ($ar_conditions["dprt_id"]));
            } else {
                $orm->where_equal($this->orm_table.".dprt_id", intval($ar_conditions["dprt_id"]));
            }
        }

        if (isset($ar_conditions["role_id"])) {
            if (is_array($ar_conditions["role_id"])) {
                $orm->where_in("users_roles.role_id", ($ar_conditions["role_id"]));
            } else {
                $orm->where_equal("users_roles.role_id", intval($ar_conditions["role_id"]));
            }

            $orm->left_outer_join("users_roles", "users.id = users_roles.user_id");
        }

        if (isset($ar_conditions["email"])) {
            $orm->where_equal("e_a.email", $ar_conditions["email"]);
        }

        if ($ar_conditions["eid"]) {
            if (is_array($ar_conditions["eid"])) {
                $orm->where_in($this->orm_table.".eid", $ar_conditions["eid"]);
            } else {
                $orm->where_equal($this->orm_table.".eid", $ar_conditions["eid"]);
            }
        }

        if (isset($ar_conditions["phone"])) {
            $orm->where_raw("CONCAT_WS(' ', users.phone) LIKE ('%".$ar_conditions["phone"]."%')");
        }

        if (isset($ar_conditions["fio"])) {
            $orm->where_raw("CONCAT_WS(' ', users.surname, users.name, users.patronymic) LIKE ('%".$ar_conditions["fio"]."%')");
        }

        if (isset($ar_conditions["reg_start"])) {
            $orm->where_gte("users.create_date", $ar_conditions["reg_start"]);
        }
        if (isset($ar_conditions["reg_end"])) {
            $orm->where_lte("users.create_date", $ar_conditions["reg_end"]);
        }
        if (isset($ar_conditions["act_start"])) {
            $orm->where_gte("users.activity_date", $ar_conditions["act_start"]);
        }
        if (isset($ar_conditions["act_end"])) {
            $orm->where_lte("users.activity_date", $ar_conditions["act_end"]);
        }
        if (isset($ar_conditions["cat_id"])) {
            /*$orm->inner_join("users_roles", "u_r.user_id = users.id", "u_r");
            $orm->inner_join("roles_crud_categories", "r_c_c.role_id = u_r.role_id", "r_c_c");
            $orm->where_equal("r_c_c.object_id", intval($ar_conditions["cat_id"]));*/
            if ($ar_users = self::get_instance()->get_users_category(intval($ar_conditions["cat_id"]))) {
                $orm->where_in("users.id", $ar_users);
            } else {
                $orm->where_raw("2+2=5");
            }
        }

        if (isset($ar_conditions["password"])) {
            $orm->where_equal($this->orm_table.".password", sha1($ar_conditions["password"].PASSWORD_SALT));
            //var_dump(sha1($ar_conditions["password"].PASSWORD_SALT));
            //exit;
        }

    }

    protected function get_total(ORM_EXT $orm) {
        $clone_orm = clone $orm;
        $clone_orm->select("e_a.email");
        $clone_orm->inner_join("email_addresses", "e_a.id = users.eid", "e_a");
        return $clone_orm->count();
    }

    protected function set_select(ORM_EXT &$orm, $detailed = true) {
        parent::set_select($orm, $detailed);

        $orm->select_expr("(SELECT COUNT(*) FROM demands WHERE eu_eid = ".$this->orm_table.".eid and demands.status=".m_demands::STATUS_WORK.")", "demands_work");

        self::orm_get_user_data($orm, false);

        /*$orm->select("demand_work.title", "demand_work_title");
        $orm->select("demand_work.id", "demand_work_id");
        //$orm->left_outer_join("demands", "demand_work.eu_eid = users.eid and demand_work.status=".m_demands::STATUS_WORK, "demand_work");

        $orm->raw_join("LEFT JOIN (SELECT * FROM demands WHERE eu_eid = ".$this->orm_table.".eid LIMIT 1)", "demand_work.status=".m_demands::STATUS_WORK, "demand_work");*/
    }

    private function update_roles($user_id, $ar_roles) {
        ORM_EXT::for_table("users_roles")->where_equal("user_id", $user_id)->delete_many();

        if (!$ar_roles) {
            return true;
        }

        $ar_sql_insert = array();
        foreach ($ar_roles as $role_id) {
            $ar_sql_insert[] = "('".$user_id."', '".$role_id."')";
        }

        $sql = "INSERT INTO users_roles (user_id, role_id) VALUES ".implode(",", $ar_sql_insert);
        return ORM_EXT::for_table("users_roles")->raw_execute($sql);
    }

   private function update_crud_notification($ar_crud_object, $user_id, $crud_owner) {

       $crud_table = "users_notification_crud_".(($crud_owner==m_roles::CRUD_OWNER_MODULE)?"module":"categories");

        ORM_EXT::for_table($crud_table)->where_equal("user_id", $user_id)->delete_many();

        if (!$ar_crud_object) {
            return true;
        }

        $ar_sql_insert = array();
        foreach ($ar_crud_object as $object_id => $crud) {
            $ar_sql_insert[] = "('".$user_id."', '".$object_id."', '".$crud."')";
        }

        $sql = "INSERT INTO ".$crud_table." (user_id, object_id, crud) VALUES ".implode(",", $ar_sql_insert);
        return ORM_EXT::for_table($crud_table)->raw_execute($sql);

    }

    public function get_crud_notification($user_id, $crud_owner) {

        $crud_table = "users_notification_crud_".(($crud_owner==m_roles::CRUD_OWNER_MODULE)?"module":"categories");

        $orm = ORM_EXT::for_table($crud_table);
        $orm->select('crud')->select("object_id");
        $orm->where_equal("user_id", $user_id);

        //$orm->inner_join("users_roles", "u_r.user_id = users_crud_notification.user_id", "u_r");
        //$orm->inner_join("roles_crud_categories", "r_c_c.role_id = u_r.role_id", "r_c_c");

        $result = $orm->find_assoc("object_id", false, 'crud');

        return $result;
    }

    public function get_crud_notification_module($user_id) {
        return $this->get_crud_notification($user_id, m_roles::CRUD_OWNER_MODULE);
    }

    public function get_crud_notification_categories($user_id) {
        return $this->get_crud_notification($user_id, m_roles::CRUD_OWNER_CATEGORIES);
    }

    public function get_users_category($cat_id, $field="id") {
        $orm = ORM_EXT::for_table("users");
        $orm->select_expr("DISTINCT users.".$field);
        $orm->inner_join("users_roles", "u_r.user_id = users.id", "u_r");
        $orm->inner_join("roles_crud_categories", "r_c_c.role_id = u_r.role_id", "r_c_c");
        $orm->where_equal("r_c_c.object_id", $cat_id);
        return $orm->find_array_cell();
    }

    protected function trigger_update($id, $data, $previous_data) {

        $change_data = array_diff_assoc($previous_data, $data);

        if (isset($change_data["email"])) {
            m_email_addresses::get_instance()->save($previous_data["eid"], array("email"=>$data["email"]));
        }
    }

    protected function trigger_insert($id, $data) {
        $eid = m_email_addresses::get_instance()->save(false, array("email"=>$data["email"]));
        ORM_EXT::for_table("users")->raw_execute("UPDATE users SET eid = ? WHERE id=?", array($eid, $id));
    }

    public function save($id = false, $data, $crud_notification_module = false, $crud_notification_categories = false, &$previous_data = false) {
        $user_id = parent::save($id, $data, $previous_data);

        if ($user_id) {
            $this->update_roles($user_id, $data["role_id"]);

            if ($crud_notification_module !== false) {
                $this->update_crud_notification($crud_notification_module, $user_id, m_roles::CRUD_OWNER_MODULE);
            }

            if ($crud_notification_categories !== false) {
                $this->update_crud_notification($crud_notification_categories, $user_id, m_roles::CRUD_OWNER_CATEGORIES);
            }

        }

        return $user_id;
    }

    protected function add_select_clear_one(&$orm) {

        $orm->select($this->orm_table.".*");
        $orm->select("e_a.email", "email");
        $orm->left_outer_join("email_addresses", "e_a.id = ".$this->orm_table.".eid", "e_a");
    }

    protected function set_save_data(ORM_EXT &$orm, $data, $id) {

        $orm->set("name",           trim($data["name"]));
        $orm->set("surname",        trim($data["surname"]));
        $orm->set("patronymic",     trim($data["patronymic"]));
        $orm->set("name",           trim($data["name"]));

        if (!$id || isset($data["change_pwd"])) {
            $orm->set("password",   sha1($data["password"].PASSWORD_SALT));
        }

        $orm->set("post_id",        intval($data["post_id"]));
        $orm->set("dprt_id",        intval($data["dprt_id"]));
        $orm->set("contact_id",     intval($data["contact_id"]));

        $orm->set("price_per_hour",        floatval($data["price_per_hour"]));

        $orm->set("lang",           trim($data["lang"]));
        $orm->set("icq",            trim($data["icq"]));
        $orm->set("skype",          trim($data["skype"]));
        $orm->set("phone",          trim($data["phone"]));
        $orm->set("phone_ext",      trim($data["phone_ext"]));
        $orm->set("phone_mobile",   trim($data["phone_mobile"]));
        $orm->set("room",           trim($data["room"]));
        $orm->set("descr",          trim($data["descr"]));

        $orm->set("exec_notice",    isset($data["exec_notice"])?1:0);
        $orm->set("exec_notice_time",    $data["exec_notice_time"]);

        $exec_notice_weekdays = isset($data["exec_notice_weekdays"])?implode(",", $data["exec_notice_weekdays"]):'';

        $orm->set("exec_notice_weekdays",  $exec_notice_weekdays);
    }

}

?>
