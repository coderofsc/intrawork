<?php
abstract class cls_model  {
    protected $orm_table    = "";

    public $save_events = true;

    public $pre_delete      = false;
    public $assoc_field     = false;
    public $sort            = array("dir"=>SORT_ASC_AZ, "by"=>"name");
    public $ar_sort         = array(); // expr
    public $group           = false;
    public $ar_group        = array();  // expr

    public $ar_field        = array();
    public $master_field    = "name";

    public $module_id       = null;

    protected function __construct() {
        $this->orm_table = substr(get_called_class(), 2);
        $module_id_constant = "cls_modules::MODULE_".mb_strtoupper($this->orm_table);
        if (defined($module_id_constant)) {
            $this->module_id = constant($module_id_constant);
        }
    }

    private function escape_data(&$data) {
        foreach ($data as &$row) {
            foreach ($row as &$field) {
                if (!is_array($field)) {
                    $field = htmlspecialchars($field, ENT_QUOTES, "utf-8");
                }
            }
        }
    }

    protected function prepare_data(&$data, $detailed = true) {
    }

    private function conditions_decode_get_array_value(&$result, $item, $ar_data, $source, $value, $ar_condition, $field = "name") {
        if (is_array($value)) {
            foreach ($value as $id) {
                $remove = $ar_condition;
                unset($remove[$source][array_search($id, $remove[$source])]);
                $remove[$source] = array_values($remove[$source]);
                //$item["decode"] = $ar_data[$id][$field];

                if (isset($ar_data[$id][$field])) {
                    $item["decode"] = $ar_data[$id][$field];
                } elseif ($id == EMPTY_VALUE) {
                    $item["decode"] = "Без значения";
                } else if ($id == ANY_VALUE) {
                    $item["decode"] = "Любое значение";
                } else {
                    $item["decode"] = $ar_data[$field]; // ??
                }

                $item["remove"] = http_build_query(array("cnd"=>$remove));
                $result[] = $item;
            }
        } else {
            /*if (isset($ar_data[$value][$field])) {
                $item["decode"] = $ar_data[$value][$field];
            } else {
                $item["decode"] = $ar_data[$field];
            }
            $result[] = $item;*/

            if (isset($ar_data[$value][$field])) {
                $item["decode"] = $ar_data[$value][$field];
            } elseif ($value == EMPTY_VALUE) {
                $item["decode"] = "Без значения";
            } else if ($value == ANY_VALUE) {
                $item["decode"] = "Любое значение";
            } else {
                $item["decode"] = $ar_data[$field];
            }
            $result[] = $item;

        }
    }


    public function conditions_decode($ar_condition, $ar_dictionary_field = array()) {
        $result = array();
        foreach ($ar_condition as $source=>$value) {

            $remove = $ar_condition;
            unset($remove[$source]);

            $item = array("name"=>cls_tools::get_instance()->mb_ucfirst($this->ar_field[$source]), "value"=>$value, "decode"=>$value, "remove"=>http_build_query(array("cnd"=>$remove)));

            if (isset($ar_dictionary_field[$source])) {
                $this->conditions_decode_get_array_value($result, $item, $ar_dictionary_field[$source]["dictionary"], $source, $value, $ar_condition, $ar_dictionary_field[$source]["field"]);

            } else {
                $result[] = $item;
            }
        }

        return $result;
    }

    public function clear_conditions($conditions) {
        $data = array();
        $ar_av_data = array_keys($this->ar_field);

        foreach($ar_av_data as $search_index) {
            if (isset($conditions[$search_index]) && ($conditions[$search_index])) {

                if (is_array($conditions[$search_index])) {
                    $data[$search_index] = $conditions[$search_index];
                } else {
                    $data[$search_index] = htmlentities(strip_tags(trim($conditions[$search_index])), ENT_QUOTES, "utf-8");
                }
            }
        }

        return $data;
    }

    public function get_table_name() {
        return $this->orm_table;
    }

    public function restore($id) {
        $result = false;

        $orm = ORM_EXT::for_table($this->get_table_name());
        if ($data = $orm->find_one($id)) {

            if ($this->pre_delete) {
                $result = $data->set_expr("delete_date", "NULL")->set("delete_user_id", 0)->save();
            }
            if ($result) {
                if ($this->module_id && $this->save_events) {
                    cls_events::get_instance()->trigger_restore($this, $id, $data->as_array());
                }
            }
        }

        return $result;

    }

    protected function set_delete_set_conditions(ORM_EXT $orm) {

    }

    public function delete($id, $finally = false) {
        /*$delete_sql = "DELETE FROM ".$this->get_table_name()." WHERE id='".$id."'";
        // !!! set_conditions !!!! например, для фильтров -- удаление только текущего пользователя
        $result = ORM_EXT::for_table($this->get_table_name())->raw_execute($delete_sql);
        */

        $result = false;

        $orm = ORM_EXT::for_table($this->get_table_name());
        $this->set_delete_set_conditions($orm);
        if ($data = $orm->find_one($id)) {

            if ($this->pre_delete && !$finally) {
                $result = $data->set_expr("delete_date", "NOW()")->set("delete_user_id", intval(m_cuser::get_instance()->get("id")))->save();
            } else {
                $result = $data->delete();
            }

            if ($result) {
                if ($this->module_id && $this->save_events) {
                    cls_events::get_instance()->trigger_delete($this, $id, $data->as_array());
                }
            }
        }

        return $result;
    }

    public function get_one($id, $detailed = true, $escape=false, $deleted=false) {
        $conditions["id"] = $id;

        $total = false;
        if (!$result[$id] = $this->get_array($conditions, 1, 0, array(), $total, $detailed, $deleted)) {
            return false;
        }

        if ($escape) {
            $this->escape_data($result);
        }

        $this->prepare_data($result, $detailed);

        return $result[$id];
    }

    protected function set_group(ORM_EXT &$orm, $by, $dir) {

        if (isset($this->ar_group[$by])) {
            $expr = isset($this->ar_group[$by]["expr"])?$this->ar_group[$by]["expr"]:$this->orm_table.".".$by;
            $orm->order_by_expr($expr." ".$dir);

        } elseif ($this->group) {
            $table = isset($this->group["table"])?$this->group["table"]:$this->orm_table;
            $orm->order_by_expr($table.".".$this->group["by"]." ".$this->group["dir"]);
        }
    }
    

    protected function set_sort(ORM_EXT &$orm, $by, $dir) {

        if (isset($this->ar_sort[$by])) {
            $expr = isset($this->ar_sort[$by]["expr"])?$this->ar_sort[$by]["expr"]:$this->orm_table.".".$by;
            $orm->order_by_expr($expr." ".$dir);

        } elseif ($this->sort) {
            $table = isset($this->sort["table"])?$this->sort["table"]:$this->orm_table;
            $orm->order_by_expr($table.".".$this->sort["by"]." ".$this->sort["dir"]);
        }
    }

    // Для получения, например условий при выборки следующего/предыдущего (в группировке используется)
    public function get_raw_joins() {
        $raw_joins = array();
        return $raw_joins;
    }

    public function get_raw_conditions($ar_conditions, $deleted = false) {
        $raw_conditions = array();

        if ($ar_conditions["id"]) {
            if (is_array($ar_conditions["id"])) {
                $raw_conditions[] = $this->orm_table.".id IN (".implode(",", $ar_conditions["id"]).")";
            } else {
                $raw_conditions[] = $this->orm_table.".id = ".intval($ar_conditions["id"]);
                ///$orm->where_equal($this->orm_table.".id", $ar_conditions["id"]);
            }
        }

        if ($this->pre_delete && !$deleted) {
            $raw_conditions[] = $this->orm_table.".delete_date IS NULL ";
        }

        return $raw_conditions;
    }


    protected function set_conditions(ORM_EXT &$orm, $ar_conditions, $deleted = false) {
        $raw_conditions = $this->get_raw_conditions($ar_conditions, $deleted);

        foreach ($raw_conditions as $where_raw) {
            $orm->where_raw($where_raw);
        }

    }

    protected function set_select(ORM_EXT &$orm, $detailed = true, $conditions = array()) {
        $orm->select($this->orm_table.".*");
        if (m_cuser::get_instance()->is_login() && $this->module_id && cls_modules::$ar_modules[$this->module_id]["favorites"]) {
            $orm->select("favorites.id", "favorite_id");
            $orm->left_outer_join("favorites", "favorites.user_id = ".m_cuser::get_instance()->get("id")." AND favorites.object_id = ".$this->orm_table.".id and favorites.module_id = ".$this->module_id);
        }
    }

    protected function get_total($orm) {
        $clone_orm = clone $orm;
        return $clone_orm->count();
    }

    public function count($conditions = array(), $group = false) {
        $orm = ORM_EXT::for_table($this->orm_table);
        $this->set_conditions($orm, $conditions);
        if ($group) {
            $orm->select($group)->select_expr("COUNT(*)", "count");
            $orm->group_by($group);
            return $orm->find_assoc($group, false, "count");
        }
        return $this->get_total($orm);
    }

    public function get_array($conditions = array(), $limit = false/*4*/, $offset = 0, $sort = array(), &$total_records = false, $detailed = true, $deleted = false, $group=array()) {

        $orm = ORM_EXT::for_table($this->orm_table);

        $this->set_conditions($orm, $conditions, $deleted);

        if ($total_records !== false) {
            $total_records = $this->get_total($orm);
        }

        $this->set_select($orm, $detailed, $conditions);

        // Группируем набор
        $dir        = (isset($group["dir"]) && in_array($group["dir"], array(SORT_DSC_ZA, SORT_ASC_AZ)))?$group["dir"]:$this->group["dir"];
        $dir_sql    = ($dir == SORT_ASC_AZ)?"asc":"desc";
        $by         = (isset($group["by"]))?$group["by"]:$this->group["by"];

        if ($by != "none") {
            $this->set_group($orm, $by, $dir_sql);
        }

        // Сортируем набор
        $dir        = (isset($sort["dir"]) && in_array($sort["dir"], array(SORT_DSC_ZA, SORT_ASC_AZ)))?$sort["dir"]:$this->sort["dir"];
        $dir_sql    = ($dir == SORT_ASC_AZ)?"asc":"desc";
        $by         = (isset($sort["by"]))?$sort["by"]:$this->sort["by"];

        $this->set_sort($orm, $by, $dir_sql);

        // Идентификатор пользователя, возвращаем только одну запись
        if ($conditions["id"] && !is_array($conditions["id"])) {
            if ($orm = $orm->find_one($conditions["id"])) {
                return $orm->as_array();
            }
            return false;
        }

        // Лимитируем набор
        if ($limit) {
            $orm->limit($limit);
        }
        if ($offset) {
            $orm->offset($offset);
        }

        if ($result = $orm->find_assoc($this->assoc_field)) {
            $this->prepare_data($result, $detailed);
        }

        return $result;
    }

    protected function set_save_data(ORM_EXT &$orm, $data, $id) { }

    protected function trigger_update($id, $data, $previous_data) { }
    protected function trigger_insert($id, $data) { }

    protected function add_select_clear_one(&$orm) { }

    public function save($id = false, $data, &$previous_data = false) {

        if ($id) {
            $orm = ORM_EXT::for_table($this->orm_table);
            $this->add_select_clear_one($orm);
            $orm = $orm->find_one($id);
            $previous_data = $orm->as_array();

        } else {
            $orm = ORM_EXT::for_table($this->orm_table)->create();
        }

        if (!$orm) {
            return false;
        }

        $this->set_save_data($orm, $data, $id);

        if (!$id) {
            $orm->set_expr("create_date",   'NOW()');
        }

        if ($orm->save()) {
            if ($id) {
                if ($this->module_id && $this->save_events) {
                    cls_events::get_instance()->trigger_update($this, $orm->get("id"), $data, $previous_data);
                }
                $this->trigger_update($orm->get("id"), $data, $previous_data);
            } else {
                if ($this->module_id && $this->save_events) {
                    cls_events::get_instance()->trigger_insert($this, $orm->get("id"), $data);
                }
                $this->trigger_insert($orm->get("id"), $data);
            }
        }

        return $orm->get("id");
    }


}


