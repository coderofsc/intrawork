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

class m_demands_types extends cls_model {
    private static $instance;
    public $pre_delete      = true;

    public $sort    = array("dir"=>SORT_ASC_AZ, "by"=>"name");
    public $ar_sort  = array(
        "name"          => array("name"=>L::forms_labels_name),
        "default"          => array("name"=>"По умолчанию"),
        //"users_count"   => array("name"=>L::forms_labels_composition, "expr"=>"users_count"),
    );

    public $ar_field = array(
        "name"      =>L::forms_labels_name,
        "type"      =>"Тип",
        "auto_complete" => L::forms_labels_categories_auto_complete,
        "auto_prolong"  => L::forms_labels_categories_auto_prolong,
        "default"      =>"По умолчанию",
        "descr"     =>L::forms_labels_descr
    );

    private function __clone() { }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function get_type_ts($type_id, $status_id) {

        // По-умолчанию
        $orm = ORM_EXT::for_table("demands_types_ts_s");
        $orm->select("s_status_id", "id");

        $orm->where_equal("type_id", $type_id);
        $orm->where_equal("m_status_id", $status_id);
        $orm->order_by_asc("ord");
        $ar_ts = $orm->find_assoc("id");

        foreach ($ar_ts as $status=>$ts) {
            $ar_ts[$status] = array_merge($ts, m_demands::$ar_status[$status]);
        }

        if(!isset($ar_ts[$status_id])) {
            $ar_ts[$status_id] = m_demands::$ar_status[$status_id];
        }

        return $ar_ts;
    }

    protected function prepare_data(&$data, $detailed = true) {
        $ar_id = array_keys($data);
        if ($detailed) {
            $ar_type_ts_m = ORM_EXT::for_table("demands_types_ts_m")->where_in("type_id", $ar_id)->order_by_asc("ord")->find_array();
            $ar_type_ts_s = ORM_EXT::for_table("demands_types_ts_s")->where_in("type_id", $ar_id)->order_by_asc("ord")->find_assoc("m_status_id", true, "s_status_id");

            foreach ($ar_type_ts_m as $master) {
                $m_status_id = $master["status_id"];
                $type_id     = $master["type_id"];
                $data[$type_id]["ts"][$m_status_id]["active_role"] = $master["active_role"];
                $data[$type_id]["ts"][$m_status_id]["slaves"] = $ar_type_ts_s[$m_status_id];
            }
        }
    }

    protected function set_delete_set_conditions(ORM_EXT $orm) {
        $orm->where_not_equal("id", DEFAULT_DEMAND_TYPE_ID);
    }

    protected function set_select(ORM_EXT &$orm) {
        $orm->select($this->orm_table.".*");
        $orm->select_expr("(SELECT COUNT(*) FROM demands c WHERE c.delete_date IS NULL AND c.type_id = ".$this->orm_table.".id)", "demands_count");
    }

    protected function set_save_data(ORM_EXT $orm, $data) {
        $orm->set("name",              trim($data["name"]));
        $orm->set("type",              trim($data["type"]));
        $orm->set("descr",              trim($data["descr"]));

        $orm->set("auto_complete",      intval($data["auto_complete"]));
        $orm->set("auto_complete_status",      intval($data["auto_complete_status"]));
        $orm->set("auto_complete_notice",      intval($data["auto_complete_notice"]));
        $orm->set("auto_prolong",       intval($data["auto_prolong"]));
    }

    public function save($id = false, $data, &$previous_data = false) {
        if ($dt_id = parent::save($id, $data, $previous_data)) {

            if (!$data["ts"][m_demands::STATUS_NEW]) {
                $data["ts"][m_demands::STATUS_NEW]["active_role"] = 0;
                $data["ts"][m_demands::STATUS_NEW]["slaves"] = array(m_demands::STATUS_NEW);
            }

            $ar_sql_insert_m = $ar_sql_insert_s = array();
            $master_ord = 0;
            foreach ($data["ts"] as $m_status_id => $master) {
                $active_role = intval($master["active_role"]);
                $ar_sql_insert_m[] = "('".$dt_id."', '".$m_status_id."', '".$active_role."', '".$master_ord."')";

                foreach ($master["slaves"] as $ord=>$s_status_id) {
                    $ar_sql_insert_s[] = "('".$dt_id."', '".$m_status_id."', '".$s_status_id."', '".$ord."')";
                }

                $master_ord++;
            }

            ORM_EXT::for_table("demands_types_ts_m")->where_equal("type_id", $dt_id)->delete_many();
            ORM_EXT::for_table("demands_types_ts_s")->where_equal("type_id", $dt_id)->delete_many();

            $sql = "INSERT INTO demands_types_ts_m (type_id, status_id, active_role, ord) VALUES ".implode(",", $ar_sql_insert_m);
            ORM_EXT::for_table("demands_types_ts_m")->raw_execute($sql);
            $sql = "INSERT INTO demands_types_ts_s (type_id, m_status_id, s_status_id, ord) VALUES ".implode(",", $ar_sql_insert_s);
            ORM_EXT::for_table("demands_types_ts_s")->raw_execute($sql);
        }

        return $dt_id;

    }

}

?>
