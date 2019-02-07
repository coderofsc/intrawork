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

class m_projects_versions extends cls_model {
    private static $instance;
    public $pre_delete      = false;

    public $sort    = array("dir"=>SORT_DSC_ZA, "by"=>"version_date");
    public $ar_sort  = array(
        "name"          => array("name"=>L::forms_labels_name),
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

    public function detect_versions($ar_demands_id) {
        $orm = ORM_EXT::for_table("projects_versions");
        $orm->distinct();
        $orm->select("demands.id", "demand_id");
        $orm->select("projects_versions.id", "id");
        $orm->select("projects_versions.name", "name");


        $orm->inner_join("demands", "(demands.project_id = projects_versions.project_id AND demands.delete_date IS NULL)");
        $orm->where_in("demands.id", $ar_demands_id);

        $orm->inner_join("demands_history",
            "history.demand_id = demands.id
            AND history.column='status'
            AND history.new_value=".m_demands::STATUS_COMPLETE."
            AND history.event_time < projects_versions.version_date
            AND history.event_time > (
                            SELECT
                                IFNULL(MAX(version_date), '0000-00-00 00:00')
                            FROM
                                projects_versions low_v
                            WHERE
                                low_v.version_date < projects_versions.version_date
                                AND low_v.project_id=projects_versions.project_id
                            )", "history");

        return $orm->find_assoc("demand_id", true);

    }

    protected function set_conditions(ORM_EXT &$orm, $ar_conditions, $deleted = false) {

        if (intval($ar_conditions["project_id"])) {
            $orm->where_equal($this->orm_table.".project_id", intval($ar_conditions["project_id"]));
        }
    }


    protected function set_select(ORM_EXT &$orm) {
        $orm->select($this->orm_table.".*");
        //$orm->select("demands.id");
        //$orm->select_expr("(COUNT(DISTINCT history.demand_id))", "demands_count");
        $orm->select_expr("UNIX_TIMESTAMP(".$this->orm_table.".version_date)", "unix_version_date");

        /*$orm->left_outer_join("demands", "(demands.project_id = " . $this->orm_table . ".project_id AND demands.delete_date IS NULL)");
        $orm->left_outer_join("demands_history",
            "history.demand_id = demands.id
            AND history.column='status'
            AND history.new_value=".m_demands::STATUS_COMPLETE."
            AND history.event_time < ". $this->orm_table . ".version_date
            AND history.event_time > (
                            SELECT
                                IFNULL(MAX(version_date), '0000-00-00 00:00')
                            FROM
                                ".$this->orm_table." low_v
                            WHERE
                                low_v.version_date < ".$this->orm_table.".version_date
                                AND low_v.project_id=".$this->orm_table.".project_id
                            )
            ",
            "history");*/

        /*$orm->where_raw("history.event_time < ". $this->orm_table . ".version_date");
        $orm->where_raw("history.event_time > (
                            SELECT
                                IFNULL(MAX(version_date), '0000-00-00 00:00')
                            FROM
                                ".$this->orm_table." low_v
                            WHERE
                                low_v.version_date < ".$this->orm_table.".version_date
                                AND low_v.project_id=".$this->orm_table.".project_id
                            )");*/


        //$orm->group_by($this->orm_table.".id");
        //$orm->group_by("history.demand_id");


        $orm->select_expr("(
                SELECT
                    COUNT(DISTINCT d.id)
                FROM
                    demands d
                    INNER JOIN demands_history history ON (history.demand_id = d.id AND history.column='status' AND history.new_value=".m_demands::STATUS_COMPLETE.")
                WHERE
                    d.delete_date IS NULL
                    AND d.project_id = " . $this->orm_table . ".project_id
                    AND (
                        history.event_time < " . $this->orm_table . ".version_date
                        AND history.event_time > (
                            SELECT
                                IFNULL(MAX(version_date), '0000-00-00 00:00')
                            FROM
                                ".$this->orm_table." low_v
                            WHERE
                                low_v.version_date < ".$this->orm_table.".version_date
                                AND low_v.project_id=".$this->orm_table.".project_id
                            )
                        )
                    )",

            "demands_count");
    }

    protected function set_save_data(ORM_EXT $orm, $data) {
        $orm->set("project_id", intval($data["project_id"]));
        $orm->set("name", trim($data["name"]));
        $orm->set("version_date", ($data["date"]));
        $orm->set("descr", trim($data["descr"]));
    }

}

?>
