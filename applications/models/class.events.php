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

class m_events extends cls_model {
    private static $instance;

    public $sort    = array("dir"=>SORT_DSC_ZA, "by"=>"create_date");

    public $ar_sort = array(
        "surname"       => array("name"=>L::modules_users_morph_one),
        "owner"         => array("name"=>L::forms_labels_events_type_object),
        "create_date"   => array("name"=>L::forms_labels_date),
    );

    public $ar_field = array(
        "period_start"              => L::forms_labels_date_start,
        "period_end"                => L::forms_labels_date_end,
        "user_id"                   => L::modules_users_morph_one,
        "role_id"                   => L::modules_roles_morph_one,
        "dprt_id"                   => L::modules_departments_morph_one,
        "post_id"                   => L::modules_posts_morph_one,
        "type_id"                   => L::forms_labels_events_type_object,
        "text"                      => L::forms_labels_events_text,
    );


    private function __clone() { }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function conditions_decode($ar_condition) {

        $ar_dictionary_field = array();

        if (isset($ar_condition["user_id"])) { $ar_dictionary_field["user_id"] = array("dictionary"=>m_users::get_instance()->get_array(array("id"=>$ar_condition["user_id"])), "field"=>"short_fio"); }
        if (isset($ar_condition["role_id"])) { $ar_dictionary_field["role_id"] = array("dictionary"=>m_roles::get_instance()->get_array(array("id"=>$ar_condition["role_id"])), "field"=>"name"); }
        if (isset($ar_condition["post_id"])) { $ar_dictionary_field["post_id"] = array("dictionary"=>m_posts::get_instance()->get_array(array("id"=>$ar_condition["post_id"])), "field"=>"name"); }
        if (isset($ar_condition["dprt_id"])) { $ar_dictionary_field["dprt_id"] = array("dictionary"=>m_departments::get_instance()->get_array(array("id"=>$ar_condition["dprt_id"])), "field"=>"name"); }

        if (isset($ar_condition["type_id"])) { $ar_dictionary_field["type_id"] = array("dictionary"=>cls_modules::$ar_modules, "field"=>"name"); }

        return parent::conditions_decode($ar_condition, $ar_dictionary_field);
    }


    protected function set_conditions(ORM_EXT &$orm, $ar_conditions) {
        parent::set_conditions($orm, $ar_conditions);

        $orm->left_outer_join("users", "users.eid = ".$this->orm_table.".user_eid");

        if ($ar_conditions["period_start"]) {
            $orm->where_gte($this->orm_table.".create_date", $ar_conditions["period_start"]);
        }

        if ($ar_conditions["period_end"]) {
            $orm->where_lte($this->orm_table.".create_date", $ar_conditions["period_end"]);
        }

        if ($ar_conditions["owner_id"]) {
            $orm->where_equal("owner_id", intval($ar_conditions["owner_id"]));
        }
        if ($ar_conditions["object_id"]) {
            $orm->where_equal("object_id", intval($ar_conditions["object_id"]));
        }
        if ($ar_conditions["crud"]) {
            $orm->where_equal("crud", intval($ar_conditions["crud"]));
        }

        if ($ar_conditions["user_id"]) {
            if (is_array($ar_conditions["user_id"])) {
                $orm->where_in("users.id", $ar_conditions["user_id"]);
            } else {
                $orm->where_equal("users.id", intval($ar_conditions["user_id"]));
            }
        }

        if ($ar_conditions["post_id"]) {
            if (is_array($ar_conditions["post_id"])) {
                $orm->where_in("users.post_id", $ar_conditions["post_id"]);
            } else {
                $orm->where_equal("users.post_id", intval($ar_conditions["post_id"]));
            }
        }

        if ($ar_conditions["dprt_id"]) {
            if (is_array($ar_conditions["dprt_id"])) {
                $orm->where_in("users.dprt_id", $ar_conditions["dprt_id"]);
            } else {
                $orm->where_equal("users.dprt_id", intval($ar_conditions["dprt_id"]));
            }
        }

        if ($ar_conditions["text"]) {
            if (intval($ar_conditions["text"])) {
                $orm->where_equal($this->orm_table.".object_id", intval($ar_conditions["text"]));
            } else {
                $orm->where_like($this->orm_table.".object_name", "%".$ar_conditions["text"]."%");
            }
        }


        if ($ar_conditions["type_id"]) {

            if (!is_array($ar_conditions["type_id"])) {
                $ar_conditions["type_id"] = array($ar_conditions["type_id"]);
            }

            $ar_type_sql = array();

            if (($demand_index = array_search(cls_modules::MODULE_DEMANDS, $ar_conditions["type_id"])) !== false) {
                $ar_type_sql[] = "(".$this->orm_table.".owner = ".m_roles::CRUD_OWNER_CATEGORIES.")";
                unset($ar_conditions["type_id"][$demand_index]);
            }

            if ($ar_conditions["type_id"]) {
                $ar_type_sql[] = "(".$this->orm_table.".owner = ".m_roles::CRUD_OWNER_MODULE." AND ".$this->orm_table.".owner_id IN (".implode(",",$ar_conditions["type_id"])."))";
            }

            if ($ar_type_sql) {
                $orm->where_raw("(".implode("OR", $ar_type_sql).")");
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

        $orm->where_raw("((".$this->orm_table.".owner = ".m_roles::CRUD_OWNER_MODULE." AND ".$this->orm_table.".owner_id IN (".implode(",", array_keys(m_cuser::get_instance()->get("crud_module"))).")) OR ".$this->orm_table.".owner = ".m_roles::CRUD_OWNER_CATEGORIES." AND ".$this->orm_table.".owner_id IN (".implode(",", array_keys(m_cuser::get_instance()->get("crud_categories")))."))");
    }

    protected function set_select(ORM_EXT &$orm) {
        $orm->select($this->orm_table.".*");

        $orm->select_expr("UNIX_TIMESTAMP(".$this->orm_table.".create_date)", "unix_create_date");
        $orm->select_expr("UNIX_TIMESTAMP(DATE_ADD(DATE_FORMAT(".$this->orm_table.".create_date, '%Y-%m-%d %H:00:00'),INTERVAL IF(MINUTE(".$this->orm_table.".create_date) < 30, 0, 1) HOUR))", "unix_round_create_date");

        $orm->select_expr("IF (".$this->orm_table.".object_name = '' OR ".$this->orm_table.".object_name IS NULL, '".L::text_unknown."' , object_name)", "object_name");

        m_users::orm_get_user_data($orm);
    }

    protected function set_save_data(ORM_EXT $orm, $data) {
        $orm->set("user_eid",  (m_cuser::get_instance()->is_login())?m_cuser::get_instance()->get("eid"):0);
        $orm->set("object_id",      intval($data["object_id"]));
        $orm->set("owner_id",      intval($data["owner_id"]));
        $orm->set("crud",           intval($data["crud"]));
        $orm->set("owner",           intval($data["owner"]));

        if (isset($data["object_name"]) && $data["object_name"]) {
            $orm->set("object_name",    trim($data["object_name"]));
        }
    }

}
