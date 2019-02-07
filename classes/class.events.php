<?php
/*
 * 1, 2, 4, 8, 16, 32, 64, 128, 256, 512, 1024, 2048, 4096, 8192,
 * 16384, 32768, 65536, 131072, 262144, 524288, 1048576, 2097152,
 * 4194304, 8388608, 16777216, 33554432, 67108864, 134217728, 268435456,
 * 536870912,
 */

class cls_events {

    private static $instance;

    private function __construct()
    {
    }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new cls_events();
        }
        return self::$instance;
    }

    private function add($owner, $owner_id, $object_id, $event_crud, $object_name) {
        $data = array();
        $data["object_id"]      = $object_id;
        $data["owner"]          = $owner;
        $data["owner_id"]       = $owner_id;
        $data["crud"]           = $event_crud;

        if ($object_name) {
            $data["object_name"]    = $object_name;
        }

        m_events::get_instance()->save(false, $data);
    }

    static function get_module_item_name($module_id, $data) {
        $master_field[cls_modules::MODULE_CONTACTS]      = $data["face_surname"]." ".$data["face_name"]." ".$data["face_patronymic"];
        $master_field[cls_modules::MODULE_USERS]        = $data["surname"]." ".$data["name"]." ".$data["patronymic"];

        $object_name = "";

        if (isset($master_field[$module_id])) {
            $object_name = $master_field[$module_id];
        } elseif ($data["name"]) {
            $object_name = $data["name"];
        } elseif ($data["title"]) {
            $object_name = $data["title"];
        }

        return trim($object_name);
    }

    private function get_object_name($module_id, $crud, $data, $previous_data) {
        if ($crud == m_roles::CRUD_U && $previous_data) {
            $field_data = $previous_data;
        } else {
            $field_data = $data;
        }

        return self::get_module_item_name($module_id, $field_data);
    }

    private function trigger($crud, cls_model $model, $id, $data, $previous_data = false) {

        $module_id = $model->module_id;

        $owner = ($module_id == cls_modules::MODULE_DEMANDS)?m_roles::CRUD_OWNER_CATEGORIES:m_roles::CRUD_OWNER_MODULE;

        if ($owner == m_roles::CRUD_OWNER_CATEGORIES) {
            $owner_id = $data["cat_id"];
        } else {
            $owner_id = $module_id;
        }

        $this->add($owner, $owner_id, $id, $crud, $this->get_object_name($module_id, $crud, $data, $previous_data));

        $ar_new_data = $ar_previous_data = $ar_previous_data_decode = array();

        foreach ($model->ar_field as $field=>$name) {
            if ($previous_data) {
                if (isset($data[$field]) && isset($previous_data[$field]) && $previous_data[$field] != $data[$field]) {
                    $ar_new_data[$field]        = $data[$field];
                    $ar_previous_data[$field]   = $previous_data[$field];
                }
            } else {
                $ar_new_data[$field]        = $data[$field];
            }
        }

        $ar_new_data_decode         = $model->conditions_decode($ar_new_data);

        if ($previous_data) {
            $ar_previous_data_decode = $model->conditions_decode($ar_previous_data);
        }

        //var_dump($ar_new_data_decode, $ar_previous_data_decode);
        //exit;

        if ($ar_new_data_decode) {
            cls_mailman::get_instance()->notification_crud($model, $id, $crud, $data, $ar_new_data_decode, $ar_previous_data_decode);
        }
    }

    public function trigger_update(cls_model $model, $id, $data, $previous_data) {
        $this->trigger(m_roles::CRUD_U, $model, $id, $data, $previous_data);
    }

    public function trigger_insert($model, $id, $data) {
        $this->trigger(m_roles::CRUD_C, $model, $id, $data);
    }

    public function trigger_delete($model, $id, $data) {
        $this->trigger(m_roles::CRUD_D, $model, $id, $data);
    }

    public function trigger_restore($model, $id, $data) {
        //$this->trigger(m_roles::CRUD_D, $model, $id, $data);
    }


}