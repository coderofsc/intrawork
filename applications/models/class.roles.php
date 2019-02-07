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

class m_roles extends cls_model {
    private static $instance;

    public $pre_delete      = true;

    public $sort    = array("dir"=>SORT_ASC_AZ, "by"=>"name");
    public $ar_sort = array(
        "name"          => array("name"=>L::forms_labels_name),
        "users_count"   => array("name"=>L::forms_labels_composition, "expr"=>"users_count"),
    );

    public $ar_field = array(
        "name"      =>L::forms_labels_name,
        "descr"     =>L::forms_labels_descr,
        "cat_id"     =>L::modules_categories_morph_one
    );

    const CRUD_OWNER_MODULE = 0;
    const CRUD_OWNER_CATEGORIES = 1;

    /* Права доступа */
    const CRUD_R    = 1;
    const CRUD_U    = 2;
    const CRUD_D    = 4;
    const CRUD_C    = 8;
    const CRUD_ALL  = 15;
    /* /Права доступа */

    // private function __construct() { $this->orm_table = substr(__CLASS__, 2); }
    private function __clone() { }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    protected function prepare_data(&$data, $detailed = true) {
        parent::prepare_data($data, $detailed);

        foreach ($data as &$item) {
            $item["filter_data"] = unserialize(html_entity_decode($item["filter_data"]));
        }

    }

    protected function set_conditions(ORM_EXT &$orm, $ar_conditions, $deleted) {

        parent::set_conditions($orm, $ar_conditions, $deleted);

        if ($ar_conditions["cat_id"]) {
            //$orm->select("rcc.crud");
            //$orm->select("rcc.object_id");
            $orm->inner_join("roles_crud_categories", "rcc.role_id = roles.id", "rcc");
            $orm->where_equal("rcc.object_id", $ar_conditions["cat_id"]);
        }
    }

    public function conditions_decode($ar_condition) {

        $ar_dictionary_field = array();

        if (isset($ar_condition["cat_id"])) {
            $ar_dictionary_field["cat_id"] = array("dictionary"=>cls_register::get_instance()->get("ar_access_line_categories"), "field"=>"name");
        }

        return parent::conditions_decode($ar_condition, $ar_dictionary_field);
    }

    protected function set_select(ORM_EXT &$orm) {
        parent::set_select($orm);
        $orm->select_expr("(SELECT COUNT(*) FROM users_roles ru WHERE ru.role_id = ".$this->orm_table.".id)", "users_count");
    }

    private  function get_crud($role_id, $crud_owner) {

        $crud_table = "roles_crud_".(($crud_owner==self::CRUD_OWNER_MODULE)?"module":"categories");

        $orm = ORM_EXT::for_table($crud_table);
        $orm->select('object_id')->select('crud')->select("role_id");

        if (is_array($role_id)) {
            $orm->where_in("role_id", $role_id);
            $ar_roles = $orm->find_array();

            $result = array();
            foreach($ar_roles as $role) {
                if (isset($result[$role["object_id"]])) {
                    $result[$role["object_id"]] |= intval($role["crud"]);
                } else {
                    $result[$role["object_id"]] = intval($role["crud"]);
                }
            }

        } else {
            $orm->where_equal("role_id", $role_id);
            $result = $orm->find_assoc("object_id", false, 'crud');
        }

        return $result;
    }

    public function get_crud_module($role_id) {
        $result = $this->get_crud($role_id, self::CRUD_OWNER_MODULE);
        return $result;
    }

    public function get_crud_categories($role_id) {
        $result = $this->get_crud($role_id, self::CRUD_OWNER_CATEGORIES);
        return $result;
    }

    public function merge_roles_data($role_id, $user_data) {
        $ar_roles = $this->get_array(array("id"=>$role_id));

        $result = array();

        // Объеденяем параметры фильтрации заявок
        foreach ($ar_roles as $role) {
            if ($role["filter"]) {
                if (isset($result["filter_data"])) {

                    foreach ($role["filter_data"] as $key=>$data) {
                        if (isset($result["filter_data"][$key])) {
                            if (is_array($result["filter_data"][$key])) {
                                $result["filter_data"][$key] = array_merge($result["filter_data"][$key], $data);
                            } elseif ($data) {
                                $result["filter_data"][$key].=$data;
                            }
                        } else {
                            $result["filter_data"][$key] = $data;
                        }
                    }
                } else {
                    $result["filter_data"] = $role["filter_data"];
                }
            }
        }

        if (isset($result["filter_data"])) {
            $ar_convert_fields = array("cu_eid", "eu_eid", "ru_eid", "mu_eid");
            foreach ($ar_convert_fields as $filed) {
                if (isset($result["filter_data"][$filed])) {
                    if (is_array($result["filter_data"][$filed])) {
                        $result["filter_data"][$filed] = array_replace($result["filter_data"][$filed], array(SESSION_USER_EID_VALUE), array($user_data["eid"]));
                    } else {
                        if ($result["filter_data"][$filed] == SESSION_USER_EID_VALUE) {
                            $result["filter_data"][$filed] = $user_data["eid"];
                        }
                    }
                }
            }
        }

        // Объеденяем флаги
        $ar_flags = array("filter", "limited_setting", "project_member");
        foreach ($ar_roles as $role) {
            foreach ($ar_flags as $flag) {
                if ($role[$flag]) {
                    $result[$flag] = $role[$flag];
                }
            }
        }

        return $result;

    }

    private  function update_crud($ar_crud_object, $role_id, $crud_owner) {

        $crud_table = "roles_crud_".(($crud_owner==self::CRUD_OWNER_MODULE)?"module":"categories");

        ORM_EXT::for_table($crud_table)->where_equal("role_id", $role_id)->delete_many();

        if (!$ar_crud_object) {
            return true;
        }

        $ar_sql_insert = array();
        foreach ($ar_crud_object as $object_id => $crud) {
            $ar_sql_insert[] = "('".$role_id."', '".$object_id."', '".$crud."')";
        }

        $sql = "INSERT INTO ".$crud_table." (role_id, object_id, crud) VALUES ".implode(",", $ar_sql_insert);
        return ORM_EXT::for_table($crud_table)->raw_execute($sql);
    }

    public function update_crud_module($ar_crud_module, $role_id) {
        $this->update_crud($ar_crud_module, $role_id, self::CRUD_OWNER_MODULE);
    }

    public function update_crud_categories($ar_crud_categories, $role_id) {
        $this->update_crud($ar_crud_categories, $role_id, self::CRUD_OWNER_CATEGORIES);
    }

    public function save($id = false, $data, $crud_module = array(), $crud_categories = array(), &$previous_data = false) {
        $role_id = parent::save($id, $data, $previous_data);

        if ($role_id) {
            $this->update_crud_module($crud_module, $role_id);
            $this->update_crud_categories($crud_categories, $role_id);
        }

        return $role_id;
    }

    protected function set_save_data(ORM_EXT $orm, $data) {
        $orm->set("name",   trim($data["name"]));
        $orm->set("descr",  trim($data["descr"]));
        $orm->set("limited_setting",  isset($data["limited_setting"])?1:0);
        $orm->set("project_member",  isset($data["project_member"])?1:0);
        $orm->set("filter",  isset($data["filter"])?1:0);
        $orm->set("filter_data",  serialize(m_demands::get_instance()->clear_conditions($data["filter_data"])));
    }
}

?>
