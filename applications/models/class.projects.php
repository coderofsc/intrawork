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

class m_projects extends cls_model {
    private static $instance;
    public $pre_delete      = true;

    public $sort    = array("dir"=>SORT_ASC_AZ, "by"=>"name");
    public $ar_sort  = array(
        "name"          => array("name"=>L::forms_labels_name),
        "demands_count"   => array("name"=>L::forms_labels_composition, "expr"=>"demands_count"),
    );

    public $ar_field = array(
        "name"      =>L::forms_labels_name,
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

    private function get_user_projects_member() {
        $email_id = m_cuser::get_instance()->get("eid");
        $orm = ORM_EXT::for_table("demands");
        $orm->select("project_id");
        $orm->distinct();
        $orm->inner_join("demands_members", "demands_members.demand_id = demands.id");
        $orm->where_equal("demands_members.eid", $email_id);
        $orm->where_not_equal("project_id", 0);
        return $orm->find_array_cell();
    }

    public function get_raw_conditions($ar_conditions, $deleted = false)
    {
        $raw_conditions = parent::get_raw_conditions($ar_conditions, $deleted);

        $cuser_data = m_cuser::get_instance()->get_data();
        if ($cuser_data["access_data"]["project_member"]) {
            if ($ar_id = $this->get_user_projects_member()) {
                $raw_conditions[] = "projects.id IN (".implode(",", $ar_id).")";
            } else {
                $raw_conditions[] = "2*2=5"; // Запрещаем в противном случае
            }
        }

        return $raw_conditions;

    }

    protected function set_select(ORM_EXT &$orm) {
        parent::set_select($orm);

        $orm->select_expr("(SELECT COUNT(*) FROM demands WHERE demands.delete_date IS NULL AND demands.project_id = ".$this->orm_table.".id)", "demands_count");
        $orm->select_expr("(SELECT COUNT(*) FROM demands WHERE demands.delete_date IS NULL AND demands.project_id = ".$this->orm_table.".id AND demands.status =".m_demands::STATUS_COMPLETE.")", "demands_count_complete");
    }

    protected function set_save_data(ORM_EXT $orm, $data) {
        $orm->set("name",              trim($data["name"]));
        $orm->set("descr",              trim($data["descr"]));
    }
}

?>
