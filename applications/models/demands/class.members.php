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

class m_demands_members extends cls_model {
    private static $instance;
    public $sort            = array("dir"=>SORT_ASC_AZ, "by"=>"id");

    // private function __construct() { $this->orm_table = substr(__CLASS__, 2); }
    private function __clone() { }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    protected function set_conditions(ORM_EXT &$orm, $ar_conditions) {
        if ($ar_conditions["demand_id"]) {
            $orm->where_equal($this->orm_table.".demand_id", $ar_conditions["demand_id"]);
        }
        if ($ar_conditions["except"]) {
            $orm->where_not_in($this->orm_table.".eid", $ar_conditions["except"]);
        }

    }

    protected function set_select(ORM_EXT &$orm) {
        $orm->select($this->orm_table.".*");
        $orm->select_expr("(SELECT SUM(IF (elapsed_time IS NULL,(UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(open_time)),elapsed_time)) FROM demands_history_exec WHERE status=".m_demands::STATUS_WORK." AND eu_eid=".$this->orm_table.".eid AND demand_id=".$this->orm_table.".demand_id)", "exec_time");
        $orm->select_expr("(SELECT (SUM(IF (elapsed_time IS NULL,(UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(open_time)),elapsed_time))/".TIME_HOUR.")*users.price_per_hour FROM demands_history_exec LEFT JOIN users ON users.eid=demands_history_exec.eu_eid WHERE status=".m_demands::STATUS_WORK." AND demand_id=".$this->orm_table.".demand_id AND eu_eid=".$this->orm_table.".eid)", "exec_price");


        // От кого
        $orm->left_outer_join("users", $this->orm_table.".eid = users.eid", "users");
        $orm->left_outer_join("email_addresses", "user_from_e_a.id = ".$this->orm_table.".eid", "user_from_e_a")
            ->select("user_from_e_a.email",  "user_email")
            ->select("user_from_e_a.id",     "user_eid");

        m_users::orm_get_user_data($orm, "user", "users", false);

        //$orm->left_outer_join("users", $this->orm_table.".eid = users.eid");
        //m_users::orm_get_user_data($orm);
    }

    protected function set_save_data(ORM_EXT &$orm, $data) {
        $orm->set("demand_id",    intval($data["demand_id"]));
        $orm->set("eid",     intval($data["eid"]));
    }

    public function toggle_tracking($demand_id, $mu_eid) {
        return ORM_EXT::for_table($this->orm_table)->raw_execute("UPDATE ".$this->orm_table." SET tracking=IF(tracking=1,0,1) WHERE demand_id=".$demand_id." AND eid=".$mu_eid);
    }

    private function check_exist($demand_id, $eid) {
        return ORM_EXT::for_table($this->orm_table)->where_equal("demand_id", $demand_id)->where_equal("eid", $eid)->count();

    }

    public function save($id = false, $data, &$previous_data = false) {
        if ($this->check_exist($data["demand_id"], $data["eid"])) {
            return false;
        }

        return parent::save($id, $data, $previous_data);
    }

    /*public function update_members($demand_id, $ar_members) {

        $tmp_current_ar_members = $this->get_array(array("demand_id"=>$demand_id), false);

        $current_ar_members = array();
        foreach ($tmp_current_ar_members as $member) {
            $current_ar_members[] = $member["eid"];
        }

        //var_dump($current_ar_members);

        foreach ($ar_members as $eid) {
            if (!in_array($eid, $current_ar_members)) {
                $data = array();
                $data["eid"]   = $eid;
                $data["demand_id"]  = $demand_id;
                ORM_EXT::for_table("demands_members")->create($data)->save();
            }
        }

    }*/


}

?>
