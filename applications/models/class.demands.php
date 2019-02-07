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

class m_demands extends cls_model {
    private static $instance;

    public $pre_delete      = true;

    public $sort    = array("dir"=>SORT_DSC_ZA, "by"=>"create_date");
    public $ar_sort = array(
        "create_date"   => array("name"=>L::forms_labels_created_date),
        "activity_date" => array("name"=>L::forms_labels_users_activity_date),
        "status"        => array("name"=>L::forms_labels_demands_status, "expr"=>"demands.status"),
        "priority"      => array("name"=>L::forms_labels_demands_priority),
        //"percent"       => array("name"=>L::forms_labels_demands_implement_percent),
        "title"         => array("name"=>L::forms_labels_title),
        "cu_eid"        => array("name"=>L::members_customer, "expr"=>"cu.surname"),
        "eu_eid"      => array("name"=>L::members_executor, "expr"=>"eu.surname"),
        "ru_eid"   => array("name"=>L::members_responsible, "expr"=>"ru.surname")
        );

    // Неверная сортировка в next_prev (если сортируем по полю join'a)
    public $group           = array(/*"dir"=>SORT_DSC_ZA, "by"=>"create_dd"*/);
    public $ar_group        = array(
        /*"status"        => array("name"=>L::forms_labels_demands_status),
        "priority"      => array("name"=>L::forms_labels_demands_priority),
        "criticality"      => array("name"=>L::forms_labels_demands_criticality),

        // Нельзя использовать агреггированые функции иил данный из других таблиц, нет join и тд при next_prev
        "create_dd"       => array("name"=>L::forms_labels_created_date, "expr"=>"create_dd"),
        "cu_surname"        => array("name"=>L::members_customer, "expr"=>"cu.surname"),
        "eu_surname"      => array("name"=>L::members_executor, "expr"=>"eu.surname"),
        "ru_surname"   => array("name"=>L::members_responsible, "expr"=>"ru.surname")*/
    );

    public $master_field = "title";
    public $ar_field    = array(
        "text"                  => L::forms_labels_text,
        "title"                 => L::forms_labels_title,
        "demand"                => L::forms_labels_demands_demand,
        "mu_eid"       => L::forms_labels_demands_members,
        "cat_id"                => L::modules_categories_morph_one,
        "cu_eid"     => L::members_customer,
        "eu_eid"     => L::members_executor,
        "ru_eid"  => L::members_responsible,
        "type_id"                => "Тип заявки",
        "project_id"                => L::modules_projects_morph_one,
        "version_id"                => "Версия",
        "status"                => L::forms_labels_demands_status,
        "priority"              => L::forms_labels_demands_priority,
        "criticality"           => L::forms_labels_demands_criticality,
        "create_date_start"                 => L::forms_labels_create_start,
        "create_date_end"                   => L::forms_labels_create_end,
        "required_time"         => L::forms_labels_demands_required_time,
        "contact_id"             => L::modules_contacts_morph_one,
        "mb_id"                 => L::modules_mailbots_morph_one,
        "cu_type"         => "Тип заказчика",
        "percent_complete"=>"Процент выполнения"
    );

    /* Статусы заявок */
    const STATUS_NEW         = 1; // Новый
    const STATUS_WORK        = 2; // В работе
    const STATUS_COMPLETE    = 3; // Завершено
    const STATUS_DENY        = 4; // Отказ
    const STATUS_PAUSE       = 5; // Отложена
    const STATUS_SPAM        = 6; // Спам
    const STATUS_CHECK       = 7; // Проверка
    const STATUS_WAITING     = 8; // Проверка

    /* Критичность заявок */
    const CRITICALITY_LOW    = 1; // Низкая
    const CRITICALITY_MID    = 2; // Средняя
    const CRITICALITY_HI     = 3; // Высокая
    const CRITICALITY_EXPR   = 4; // Блокирующая

    static $ar_status = array(
        self::STATUS_NEW        => array("name"=>L::modules_demands_status_new,         "icon"=>"square",           "color"=>"warning",  "hex_color"=>"#f8ac59"),
        self::STATUS_WORK       => array("name"=>L::modules_demands_status_work,        "icon"=>"toggle-right",     "color"=>"primary",  "hex_color"=>"#1ab394"),
        self::STATUS_PAUSE      => array("name"=>L::modules_demands_status_pause,       "icon"=>"pause",            "color"=>"info",     "hex_color"=>"#23c6c8"),
        self::STATUS_CHECK      => array("name"=>L::modules_demands_status_check,       "icon"=>"eye",              "color"=>"success",  "hex_color"=>"#ed5565"),
        self::STATUS_WAITING    => array("name"=>L::modules_demands_status_waiting,     "icon"=>"clock-o",          "color"=>"info",     "hex_color"=>"#23c6c8"),
        self::STATUS_COMPLETE   => array("name"=>L::modules_demands_status_complete,    "icon"=>"check-square-o",   "color"=>"success",  "hex_color"=>"#1c84c6"),
        self::STATUS_DENY       => array("name"=>L::modules_demands_status_deny,        "icon"=>"times-circle",     "color"=>"danger",   "hex_color"=>"#ed5565"),
        self::STATUS_SPAM      => array("name"=>L::modules_demands_status_spam,         "icon"=>"fire",             "color"=>"danger",   "hex_color"=>"#ed5565")
    );

    /*
    static $ar_status_mode = array(
        self::STATUS_NEW        => array(self::STATUS_NEW=>array("id"=>self::STATUS_NEW), self::STATUS_WORK=>array("id"=>self::STATUS_WORK), self::STATUS_DENY=>array("id"=>self::STATUS_DENY), self::STATUS_SPAM=>array("id"=>self::STATUS_SPAM)),
        self::STATUS_WORK       => array(self::STATUS_WORK=>array("id"=>self::STATUS_WORK), self::STATUS_CHECK=>array("id"=>self::STATUS_CHECK), self::STATUS_COMPLETE=>array("id"=>self::STATUS_COMPLETE), self::STATUS_DENY=>array("id"=>self::STATUS_DENY), self::STATUS_PAUSE=>array("id"=>self::STATUS_PAUSE)),
        self::STATUS_COMPLETE   => array(self::STATUS_NEW=>array("id"=>self::STATUS_NEW), self::STATUS_COMPLETE=>array("id"=>self::STATUS_COMPLETE)),
        self::STATUS_DENY       => array(self::STATUS_NEW=>array("id"=>self::STATUS_NEW), self::STATUS_WORK=>array("id"=>self::STATUS_WORK), self::STATUS_DENY=>array("id"=>self::STATUS_DENY)),
        self::STATUS_PAUSE      => array(self::STATUS_WORK=>array("id"=>self::STATUS_WORK), self::STATUS_PAUSE=>array("id"=>self::STATUS_PAUSE), self::STATUS_CHECK=>array("id"=>self::STATUS_CHECK), self::STATUS_COMPLETE=>array("id"=>self::STATUS_COMPLETE), self::STATUS_DENY=>array("id"=>self::STATUS_DENY)),
    );
    */

    static $ar_criticality = array(
        self::CRITICALITY_LOW   => array("name"=>L::modules_demands_criticality_low,         "icon"=>"star-o",           "color"=>"success"),
        self::CRITICALITY_MID   => array("name"=>L::modules_demands_criticality_mid,        "icon"=>"star-half-empty",  "color"=>"warning"),
        self::CRITICALITY_HI    => array("name"=>L::modules_demands_criticality_hi,        "icon"=>"star",             "color"=>"danger"),
        self::CRITICALITY_EXPR  => array("name"=>L::modules_demands_criticality_expr,         "icon"=>"flash",            "color"=>"danger"),
    );

    protected function __construct() {
        $this->ar_sort["work_activity_date"] = array("name"=>"Ваша активность", "expr"=>"IF(demands.status=".self::STATUS_WORK." AND eu_eid=".intval(m_cuser::get_instance()->get("eid")).",0,1), activity_date");

        parent::__construct();
    }

    private function __clone() { }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function clear_conditions($conditions) {
        $result = parent::clear_conditions($conditions);

        if (isset($conditions["cat_id"]) && $conditions["cat_id"] == 0) {
            $result["cat_id"] = 0;
        }

        if (isset($conditions["version_id"]) && $conditions["version_id"] == 0) {
            $result["version_id"] = 0;
        }

        return $result;

    }

    protected function prepare_data(&$data, $detailed = true) {
        if ($detailed) {
            $ar_id = array_keys($data);
            $ar_result = m_projects_versions::get_instance()->detect_versions($ar_id);

            foreach ($ar_result as $demand_id => $ar_versions) {
                $data[$demand_id]["ar_versions"] = $ar_versions;
            }
        }
    }

    protected function set_sort(ORM_EXT &$orm, $by, $dir) {
        parent::set_sort($orm, $by, $dir);
        $orm->order_by_expr("demands.id");
    }

    public function branch_update_orders($branch, $ar_orders) {

        $ar_sql_update_parent = $ar_sql_update_position = array();

        foreach ($ar_orders as $id => $item) {
            $ar_sql_update_parent[]     = " WHEN id = ".$id." THEN ".$item["parent_id"];
            $ar_sql_update_position[]   = " WHEN id = ".$id." THEN ".$item["position"];
        }

        $sql = "UPDATE ".$this->orm_table." SET parent_id = CASE ".implode(" ", $ar_sql_update_parent)." END, position = CASE ".implode(" ", $ar_sql_update_position)." END WHERE id IN(".implode(",", array_keys($ar_orders)).") AND branch=?";

        return ORM_EXT::for_table($this->orm_table)->raw_execute($sql, array($branch));
    }


    public static function decode_priority($value) {

        if ($value <=100) $result = L::modules_demands_priority_low;
        elseif ($value <=200) $result = L::modules_demands_priority_mid;
        else $result = L::modules_demands_priority_hi;

        return $result;
    }

    public function conditions_decode($ar_condition) {

        $ar_dictionary_field = array();

        if (isset($ar_condition["cat_id"])) {
            if (!($ar_access_line_categories = cls_register::get_instance()->get("ar_access_line_categories"))) {
                $ar_access_line_categories = m_categories::get_instance()->get_array(array(), false);
            }
            $ar_dictionary_field["cat_id"] = array("dictionary"=>$ar_access_line_categories, "field"=>"name");
        }

        $ar_users = $ar_users_data = array();
        if (isset($ar_condition["cu_eid"]))    { $ar_users = array_merge($ar_users, (is_array($ar_condition["cu_eid"])?$ar_condition["cu_eid"]:array($ar_condition["cu_eid"]))); }
        if (isset($ar_condition["eu_eid"]))    { $ar_users = array_merge($ar_users, (is_array($ar_condition["eu_eid"])?$ar_condition["eu_eid"]:array($ar_condition["eu_eid"]))); }
        if (isset($ar_condition["ru_eid"])) { $ar_users = array_merge($ar_users, (is_array($ar_condition["ru_eid"])?$ar_condition["ru_eid"]:array($ar_condition["ru_eid"]))); }
        if (isset($ar_condition["mu_eid"]))      { $ar_users = array_merge($ar_users, (is_array($ar_condition["mu_eid"])?$ar_condition["mu_eid"]:array($ar_condition["mu_eid"]))); }

        if ($ar_users) {
            $ar_users = array_unique($ar_users);
            $tmp_ar_users_data = m_users::get_instance()->get_array(array("eid"=>$ar_users), false);
            $ar_users_data = array();
            foreach ($tmp_ar_users_data as $value) {
                $ar_users_data[$value["eid"]] = $value;
            }
        }

        if (isset($ar_condition["cu_type"])) {
            $ar_dictionary_field["cu_type"] = array("dictionary"=>array(1=>array("name"=>"Внутренний пользователь"), 2=>array("name"=>"Внешний пользователь")), "field"=>"name");
        }

        //var_dump($ar_users);
        //exit;

        if (isset($ar_condition["contact_id"])) {
            $ar_dictionary_field["contact_id"] = array("dictionary"=>m_contacts::get_instance()->get_array(array("id"=>$ar_condition["contact_id"])), "field"=>"face_short_fio");
        }

        if (isset($ar_condition["type_id"])) {
            $ar_dictionary_field["type_id"] = array("dictionary"=>cls_register::get_instance()->get("global_ar_demands_types"), "field"=>"name");
        }

        if (isset($ar_condition["project_id"])) {
            $ar_dictionary_field["project_id"] = array("dictionary"=>m_projects::get_instance()->get_array(array("id"=>$ar_condition["project_id"])), "field"=>"name");
        }

        if (isset($ar_condition["version_id"])) {
            $ar_dictionary_field["version_id"] = array("dictionary"=>m_projects_versions::get_instance()->get_array(array("id"=>$ar_condition["version_id"])), "field"=>"name");
        }

        if (isset($ar_condition["mb_id"])) { $ar_dictionary_field["mb_id"] = array("dictionary"=>m_mailbots::get_instance()->get_array(array("id"=>$ar_condition["mb_id"])), "field"=>"name"); }

        if (isset($ar_condition["cu_eid"]))    { $ar_dictionary_field["cu_eid"]     = array("dictionary"=>$ar_users_data, "field"=>"short_fio"); }
        if (isset($ar_condition["eu_eid"]))    { $ar_dictionary_field["eu_eid"]     = array("dictionary"=>$ar_users_data, "field"=>"short_fio"); }
        if (isset($ar_condition["ru_eid"])) { $ar_dictionary_field["ru_eid"]  = array("dictionary"=>$ar_users_data, "field"=>"short_fio"); }
        if (isset($ar_condition["mu_eid"]))      { $ar_dictionary_field["mu_eid"]       = array("dictionary"=>$ar_users_data, "field"=>"short_fio"); }

        if (isset($ar_condition["status"])) { $ar_dictionary_field["status"]  = array("dictionary"=>self::$ar_status, "field"=>"name"); }
        if (isset($ar_condition["criticality"])) { $ar_dictionary_field["criticality"]  = array("dictionary"=>self::$ar_criticality, "field"=>"name"); }

        if (isset($ar_condition["priority"])) {
            if (!is_array($ar_condition["priority"])) {
                $ar_condition["priority"] = array($ar_condition["priority"]);
            }
            $ar_priority = array();
            foreach ($ar_condition["priority"] as $value) {
                $ar_priority[$value] = array("name"=>self::decode_priority($value)." (".$value.")");
            }
            $ar_dictionary_field["priority"]  = array("dictionary"=>$ar_priority, "field"=>"name");
        }

        if (isset($ar_condition["required_time"])) {
            $ar_required_time = array();
            if ($ar_condition["required_time"]) {
                $ar_required_time[$ar_condition["required_time"]] = array("name"=>cls_tools::get_instance()->ts2hours($ar_condition["required_time"]));
            } else {
                $ar_required_time[$ar_condition["required_time"]] = array("name"=>"Не указано");
            }

            $ar_dictionary_field["required_time"]  = array("dictionary"=>$ar_required_time, "field"=>"name");
        }

        return parent::conditions_decode($ar_condition, $ar_dictionary_field);
    }

    public function get_raw_conditions($ar_conditions, $deleted = false) {

        // Устанавливаем фильтр ролей
        if (m_cuser::get_instance()->access_data["filter"]) {
            $ar_conditions = cls_tools::get_instance()->sync_array($ar_conditions, m_cuser::get_instance()->access_data["filter_data"]);
        }

        $raw_conditions = parent::get_raw_conditions($ar_conditions, $deleted);

        if ($ar_conditions["text"]) {
            $raw_conditions[] = cls_tools::get_instance()->build_sql_like("CONCAT(".$this->orm_table.".title)", $ar_conditions["text"]);
        }

        if ($ar_conditions["criticality"]) {
            $raw_conditions[] = cls_tools::get_instance()->build_sql_equal($this->orm_table.".criticality", $ar_conditions["criticality"]);
        }

        if ($ar_conditions["priority"]) {
            $raw_conditions[] = cls_tools::get_instance()->build_sql_equal($this->orm_table.".priority", $ar_conditions["priority"]);
        }

        if ($ar_conditions["status"]) {
            $raw_conditions[] = cls_tools::get_instance()->build_sql_equal($this->orm_table.".status", $ar_conditions["status"]);
        }

        if (isset($ar_conditions["cat_id"])) {
            $raw_conditions[] = cls_tools::get_instance()->build_sql_equal($this->orm_table.".cat_id", $ar_conditions["cat_id"]);
        }

        if (isset($ar_conditions["mb_id"])) {
            $raw_conditions[] = cls_tools::get_instance()->build_sql_equal($this->orm_table.".mb_id", $ar_conditions["mb_id"]);
        }

        if (isset($ar_conditions["contact_id"])) {
            $raw_conditions[] = cls_tools::get_instance()->build_sql_equal($this->orm_table.".contact_id", $ar_conditions["contact_id"]);
        }

        if (isset($ar_conditions["type_id"])) {
            $raw_conditions[] = cls_tools::get_instance()->build_sql_equal($this->orm_table.".type_id", $ar_conditions["type_id"]);
        }

        if (isset($ar_conditions["project_id"])) {
            $raw_conditions[] = cls_tools::get_instance()->build_sql_equal($this->orm_table.".project_id", $ar_conditions["project_id"]);

            if (isset($ar_conditions["version_id"])) {
                if ($ar_conditions["version_id"]) {

                    $raw_conditions[] = "demands.id IN
                    (
                        SELECT
                            history.demand_id
                        FROM
                            demands_history history
                            INNER JOIN projects_versions max_v ON (max_v.id = ".intval($ar_conditions["version_id"]).")

                            INNER JOIN (
                                SELECT
                                    IFNULL(MAX(version_date), '0000-00-00 00:00') version_date
                                FROM
                                    projects_versions
                                WHERE
                                    projects_versions.project_id=".$ar_conditions["project_id"]."
                                    AND version_date < (SELECT version_date FROM projects_versions WHERE id=".intval($ar_conditions["version_id"]).")
                                ) low_v

                        WHERE
                            history.demand_id = demands.id
                            AND history.column='status'
                            AND history.new_value=".m_demands::STATUS_COMPLETE."
                            AND history.event_time <= max_v.version_date
                            AND history.event_time >= low_v.version_date
                    )";


                } else {
                    $raw_conditions[] = "demands.id IN
                    (
                        SELECT
                            history.demand_id
                        FROM
                            demands_history history
                            INNER JOIN (SELECT IFNULL(MAX(version_date), '0000-00-00') version_date FROM projects_versions WHERE projects_versions.project_id=".$ar_conditions["project_id"].") max_v
                        WHERE
                            history.demand_id = demands.id AND
                            history.column='status'
                            AND history.new_value=".m_demands::STATUS_COMPLETE."
                            AND history.event_time >= max_v.version_date
                    )";

                    $raw_conditions[] = $this->orm_table.".status = ".m_demands::STATUS_COMPLETE;
                }

            }
        }

        if ($ar_conditions["eu_eid"]) {
            $raw_conditions[] = cls_tools::get_instance()->build_sql_equal($this->orm_table.".eu_eid", $ar_conditions["eu_eid"]);
        }

        if ($ar_conditions["ru_eid"]) {
            $raw_conditions[] = cls_tools::get_instance()->build_sql_equal($this->orm_table.".ru_eid", $ar_conditions["ru_eid"]);
        }

        if ($ar_conditions["cu_eid"]) {
            if (is_array($ar_conditions["cu_eid"])) {
                $raw_conditions[] = "(SELECT d_m.from_eid FROM demands_messages d_m WHERE d_m.demand_id = demands.id AND d_m.first=1 AND d_m.from_eid IN (".implode(",", $ar_conditions["cu_eid"]).")) ";
            } else {
                $raw_conditions[] = "(SELECT d_m.from_eid FROM demands_messages d_m WHERE d_m.demand_id = demands.id AND d_m.first=1 AND d_m.from_eid = ".intval($ar_conditions["cu_eid"]).") ";
            }
        }

        if ($ar_conditions["mu_eid"]) {

            if (is_array($ar_conditions["mu_eid"])) {
                $raw_conditions[] = "EXISTS (SELECT d_mbr.eid FROM demands_members d_mbr WHERE d_mbr.tracking=1 AND d_mbr.demand_id = demands.id AND d_mbr.eid IN (".implode(",", $ar_conditions["mu_eid"]).")) ";
            } else {
                $raw_conditions[] = "EXISTS (SELECT d_mbr.eid FROM demands_members d_mbr WHERE d_mbr.tracking=1 AND d_mbr.demand_id = demands.id AND d_mbr.eid = (".intval($ar_conditions["mu_eid"]).")) ";
            }
        }

        if ($ar_conditions["cu_type"]) {
            $raw_conditions[] = "(SELECT users.eid FROM demands_messages d_m INNER JOIN users ON users.eid=d_m.from_eid WHERE d_m.demand_id = demands.id AND d_m.first=1) ".(($ar_conditions["cu_type"]==1)?"IS NOT NULL":"IS NULL");
        }


        if ($ar_conditions["create_date_start"]) {
            $raw_conditions[] = $this->orm_table.".create_date >= '".$ar_conditions["create_date_start"]."'";
        }
        if ($ar_conditions["create_date_end"]) {
            $raw_conditions[] = $this->orm_table.".create_date <= '".$ar_conditions["create_date_end"]." 23:59:59'";
        }

        if (m_cuser::get_instance()->is_login()) {
            $raw_conditions[] = $this->orm_table.".cat_id IN (".implode(",", array_merge(array(0), array_keys(m_cuser::get_instance()->get("crud_categories")))).")";
        }

        return $raw_conditions;
    }

    protected function set_conditions(ORM_EXT &$orm, $ar_conditions, $deleted = false) {

        //$this->convert_const_variables($ar_conditions);

        parent::set_conditions($orm, $ar_conditions, $deleted);

        /*if ($ar_conditions["cu_eid"]) {
            $orm->inner_join("demands_messages", "demands.id = m.demand_id and m.first = 1", "m");
            if (is_array($ar_conditions["cu_eid"])) {
                $orm->where_in("m.from_eid", $ar_conditions["cu_eid"]);
            } else {
                $orm->where_equal("m.from_eid", $ar_conditions["cu_eid"]);
            }
        }*/
    }

    public function get_raw_joins() {
        $raw_joins = parent::get_raw_joins();

        return $raw_joins;
    }

    public function set_select(ORM_EXT &$orm, $detailed = true) {

        parent::set_select($orm);

        $orm->select_expr("UNIX_TIMESTAMP(DATE(".$this->orm_table.".create_date))", "create_dd");
        $orm->select_expr("UNIX_TIMESTAMP((".$this->orm_table.".create_date))", "unix_create_date");
        $orm->select_expr("UNIX_TIMESTAMP(".$this->orm_table.".activity_date)", "unix_activity_date");
        $orm->select_expr("UNIX_TIMESTAMP(".$this->orm_table.".deadline_date)", "unix_deadline_date");

        if ($detailed) {

            /*$ar_joins = $this->get_raw_joins();
            foreach ($ar_joins as $table, $constraint) {
                $orm->raw_join()
            }*/

            // Автор последнего изменения
            $orm->left_outer_join("users", $this->orm_table.".activity_eid = activity_user.eid", "activity_user");
            $orm->select("activity_user.id",    "activity_user_id")
                ->select_expr("CONCAT(activity_user.surname, ' ', LEFT(activity_user.name,1 ),'.', IF(activity_user.patronymic<>'', CONCAT(LEFT(activity_user.patronymic, 1),'.'), ''))", "activity_user_short_fio")
                ->select_expr("CONCAT(activity_user.surname, ' ',activity_user.name)", "activity_user_fi");


            $orm->select_expr("(SELECT SUM(IF (elapsed_time IS NULL,(UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(open_time)),elapsed_time)) FROM demands_history_exec WHERE status=".m_demands::STATUS_WORK." AND demand_id=".$this->orm_table.".id)", "exec_time");
            $orm->select_expr("(SELECT SUM(IF (elapsed_time IS NULL,(UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(open_time)),elapsed_time)/".TIME_HOUR."*users.price_per_hour) FROM demands_history_exec LEFT JOIN users ON users.eid=demands_history_exec.eu_eid WHERE status=".m_demands::STATUS_WORK." AND demand_id=".$this->orm_table.".id)", "exec_price");

            //$orm->select_expr("(SELECT SUM(IF (elapsed_time IS NULL,(UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(open_time)),elapsed_time)) FROM demands_history_exec WHERE status=".m_demands::STATUS_WORK." AND eu_eid=demands.eu_eid AND demand_id=".$this->orm_table.".id)", "exec_time_executor");

            // Первое сообщение
            $orm->select_many("d_m.message", "d_m.from_eid");
            //left_outer_join, должен быть INNER!
            $orm->left_outer_join("demands_messages", $this->orm_table.".id = d_m.demand_id and d_m.first = 1", "d_m");
            $orm->select_expr("(SELECT COUNT(*) FROM file_storage WHERE owner=".OWNER_DEMAND_MESSAGE." AND owner_hash=SHA1(d_m.id))", "attach_count");

            // Заказчик
            $orm->left_outer_join("email_addresses", "d_m.from_eid = cu_e_a.id", "cu_e_a");
            $orm->left_outer_join("users", "cu_e_a.id = cu.eid", "cu");

            $orm->select("cu.id",    "cu_id")
                ->select("cu_e_a.email",  "cu_email")
                ->select("cu_e_a.id",     "cu_eid")
                ->select_expr("CONCAT(cu.surname, ' ', LEFT(cu.name,1 ),'.', IF(cu.patronymic<>'', CONCAT(LEFT(cu.patronymic, 1),'.'), ''))", "cu_short_fio")
                ->select_expr("CONCAT(cu.surname, ' ',cu.name)", "cu_fi");

            // Исполнитель
            $orm->left_outer_join("users", $this->orm_table.".eu_eid = eu.eid", "eu");
            m_users::orm_get_user_data($orm, "eu", "eu");

            // Ответственный
            $orm->left_outer_join("users", $this->orm_table.".ru_eid = ru.eid", "ru");
            $orm->left_outer_join("email_addresses", "ru.eid = ru_e_a.id", "ru_e_a");
            $orm->select("ru.id",    "ru_id")
                ->select("ru_e_a.email", "ru_email")
                ->select_expr("CONCAT(ru.surname, ' ', LEFT(ru.name,1 ),'.', IF(ru.patronymic<>'', CONCAT(LEFT(ru.patronymic, 1),'.'), ''))", "ru_short_fio")
                ->select_expr("CONCAT(ru.surname, ' ',ru.name)", "ru_fi");

            // Контакт
            $orm->left_outer_join("contacts", $this->orm_table.".contact_id = contacts.id");
            $orm->select("contacts.legal", "contact_legal");
            $orm->select_expr("CONCAT(contacts.face_surname, ' ', LEFT(contacts.face_name,1 ),'.', IF(contacts.face_patronymic<>'', CONCAT(LEFT(contacts.face_patronymic, 1),'.'),''))", "contact_face_short_fio");
            $orm->select_expr("CONCAT_WS(' ', IF(contacts.opf<>'',contacts.opf, NULL), contacts.company)", "contact_company_full_name");

            // Типы заявок
            $orm->left_outer_join("demands_types", $this->orm_table.".type_id = demands_types.id");
            $orm->select("demands_types.type", "type_type");
            $orm->select("demands_types.name", "type_name");

            // Активный пользователь
            $orm->left_outer_join("demands_types_ts_m", "(".$this->orm_table.".type_id = demands_types_ts_m.type_id AND demands_types_ts_m.status_id = ".$this->orm_table.".status)");
            $orm->select("demands_types_ts_m.active_role");

            // Проект
            $orm->left_outer_join("projects", $this->orm_table.".project_id = projects.id");
            $orm->select("projects.name", "project_name");

            /*
             * В prepare
            // Версия проекта
            $orm->raw_join("LEFT JOIN (SELECT * FROM projects_versions)", "projects_versions.id = (SELECT id FROM projects_versions p_v WHERE p_v.version_date>demands.create_date AND p_v.project_id=projects.id ORDER BY p_v.version_date LIMIT 1)", "projects_versions");
            $orm->select("projects_versions.id", "version_id");
            $orm->select("projects_versions.name", "version_name");
            */

            //$orm->select_expr("IF (demands.type_id=0, 'Задача', demands_types.name)", "type_name");
            //$orm->select_expr("IF (demands.type_id=0, 'default', demands_types.type)", "type_type");
        }


        //$orm->select_expr("(UNIX_TIMESTAMP(NOW())+(".(TIME_DAY*3.3)."))", "finish_time");


    }

    /*protected function trigger_insert($id, $data) {}
    protected function trigger_update($id, $data, $previous_data) { }*/

    private function update_todo($demand_id, $ar_todo) {
        foreach ($ar_todo as $todo) {
            $todo["demand_id"] = $demand_id;
            m_todo::get_instance()->save(0, $todo);
        }
    }

    public function save($id = false, $data, &$previous_data = false, $ar_todo = false) {

        $status             = isset($data["status"])?intval($data["status"]):0;
        $eu_eid  = isset($data["eu_eid"])?intval($data["eu_eid"]):m_cuser::get_instance()->get("eid");

        // Если изменилися статус заявки на "В работе" -- переводим текущую заявку "В работе" на "Пауза"
        if ($status == m_demands::STATUS_WORK && $previous_data["status"] != m_demands::STATUS_WORK && $eu_eid) {
            $sql = "UPDATE demands SET status=? WHERE id!=? AND eu_eid=? AND status=?";
            ORM_EXT::for_table("demands")->raw_execute($sql, array(m_demands::STATUS_PAUSE, $id, $eu_eid, m_demands::STATUS_WORK));
        }

        if ($result = parent::save($id, $data, $previous_data)) {
            // Создаем checklist только при создании заявки
            if (!$id && $ar_todo !== false) {
                $this->update_todo($result, $ar_todo);
            }
        }

        return $result;
    }


    protected function set_save_data(ORM_EXT &$orm, $data, $id) {
        if (isset($data["title"])) $orm->set("title",          trim($data["title"]));
        if (isset($data["cat_id"])) $orm->set("cat_id",        intval($data["cat_id"]));
        if (isset($data["type_id"])) $orm->set("type_id",        intval($data["type_id"]));
        if (isset($data["project_id"])) $orm->set("project_id",        intval($data["project_id"]));
        if (isset($data["parent_id"])) $orm->set("parent_id",        intval($data["parent_id"]));
        if (isset($data["deadline_date"])) $orm->set("deadline_date",        trim($data["deadline_date"]));

        if (isset($data["percent_complete"])) $orm->set("percent_complete",        intval($data["percent_complete"]));

        if (isset($data["status"])) {
            if ($id) {
                $orm->set("status",     intval($data["status"]));
            } else {
                $orm->set("status",     self::STATUS_NEW);
            }
        }

        $cuser_data = m_cuser::get_instance()->get_data();
        if (!$cuser_data["access_data"]["limited_setting"]) {
            if (isset($data["eu_eid"]))     $orm->set("eu_eid",       intval($data["eu_eid"]));
            if (isset($data["ru_eid"]))     $orm->set("ru_eid", intval($data["ru_eid"]));

            if (isset($data["contact_id"])) $orm->set("contact_id",          intval($data["contact_id"]));
            if (isset($data["priority"]))       $orm->set("priority",        intval($data["priority"]));
            if (isset($data["criticality"]))    $orm->set("criticality",     intval($data["criticality"]));
            if (isset($data["required_time"]))  $orm->set("required_time",   intval($data["required_time"]));
            if (isset($data["mb_id"]))          $orm->set("mb_id",           intval($data["mb_id"]));
        }
    }

    public function get_branch($branch) {
        $orm = ORM_EXT::for_table("demands");
        $orm->where_equal("branch", $branch);
        $orm->order_by_asc("demands.parent_id");
        $orm->order_by_asc("demands.position");
        return $orm->find_assoc();
    }

    public function update($update_data, $conditions = array(), $sort=array(), $limit = 0, $offset = 0) {

        unset($update_data["range_from"], $update_data["range_to"]);

        $orm = ORM_EXT::for_table($this->orm_table);
        $orm->select("id");
        $this->set_conditions($orm, $conditions);

        // Сортируем набор
        $dir        = (isset($sort["dir"]) && in_array($sort["dir"], array(SORT_DSC_ZA, SORT_ASC_AZ)))?$sort["dir"]:$this->sort["dir"];
        $dir_sql    = ($dir == SORT_ASC_AZ)?"asc":"desc";
        $by         = (isset($sort["by"]))?$sort["by"]:$this->sort["by"];

        $this->set_sort($orm, $by, $dir_sql);

        $ar_id = $orm->find_array_cell();

        if ($limit || $offset) {
            $ar_id = array_slice($ar_id, $offset, ($limit)?$limit:null);
        }

        if (!$ar_id) {
            return false;
        }

        $ar_update = array();
        foreach ($update_data as $field=>$value) {
            $ar_replace = array_map("trim", explode("=", $value));
            if (sizeof($ar_replace) == 2) {
                $ar_update[] = "`".$field."`=REPLACE(`".$field."`, '".$ar_replace[0]."', '".$ar_replace[1]."' )";
            } else {
                $ar_update[] = "`".$field."` ='".$value."'";
            }
        }

        // Массив категорий с флагом записи
        $ar_crud_update_cats = m_cuser::get_instance()->get_crud_cats(m_roles::CRUD_U);
        if ($ar_update && $ar_crud_update_cats) {
            $sql_update = "UPDATE IGNORE ".$this->orm_table." SET ".implode(",", $ar_update)." WHERE id IN (".implode(",",$ar_id).") AND cat_id IN (".implode(",",$ar_crud_update_cats).")";
            ORM_EXT::for_table($this->orm_table)->raw_execute($sql_update);
            return ORM_EXT::get_last_statement()->rowCount();
        } else {
            return 0;
        }
    }

    private function check_change_members_role($id, $data, $previous_data) {

        if ($data["eu_eid"] != $previous_data["eu_eid"]) {

            if ($data["eu_eid"]) {
                // Смена исполнителя - вас назначили на роль исполнителя
                cls_mailman::get_instance()->change_member_role($id, $data, $data["eu_eid"], USER_ROLE_EXECUTOR, 1);
            }

            if ($previous_data["eu_eid"]) {
                // Снятие исполнителя - вас сняли с роли исполнителя
                cls_mailman::get_instance()->change_member_role($id, $data, $previous_data["eu_eid"], USER_ROLE_EXECUTOR, 0);
            }
        }

        if ($data["ru_eid"] != $previous_data["ru_eid"]) {
            if ($data["ru_eid"]) {
                // Смена ответственного - вас назначили на роль ответственного
                cls_mailman::get_instance()->change_member_role($id, $data, $data["ru_eid"], USER_ROLE_RESPONSIBLE, 1);
            }

            if ($previous_data["ru_eid"]) {
                // Снятие ответственного - вас сняли с роли ответственного
                cls_mailman::get_instance()->change_member_role($id, $data, $previous_data["ru_eid"], USER_ROLE_RESPONSIBLE, 0);
            }

        }
    }

    protected function trigger_update($id, $data, $previous_data) {
        $this->check_change_members_role($id, $data, $previous_data);
    }
    protected function trigger_insert($id, $data) {
        $this->check_change_members_role($id, $data, array("eu_eid"=>0, "ru_eid"=>0));
    }

}
