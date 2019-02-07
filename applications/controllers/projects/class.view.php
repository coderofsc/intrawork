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

/**
 * Class cnt_projects_view
 */
class cnt_projects_view extends cls_controllerview {
    protected $data_prefix = "project";

    /**
     * @param $project_id
     */
    public function __action_get_versions($project_id) {
        $result = m_projects_versions::get_instance()->get_array(array("project_id"=>$project_id));

        echo json_encode($result);
        exit();
    }

    /**
     * @param $id
     * @param $data
     */
    static function supplement_data($id, $data) {

        if ($data["id"]) {
            // Заявки проекта
            $ar_demands = array();
            $ar_demands["conditions"] = array("project_id" => $data["id"]);
            $ar_demands["data"] = m_demands::get_instance()->get_array($ar_demands["conditions"], 10, 0, array(), $ar_demands["total"]);
            cls_register::get_instance()->smarty->assign("ar_demands", $ar_demands);

            // Версии проекта
            $ar_versions = m_projects_versions::get_instance()->get_array(array("project_id" => $data["id"]));
            cls_register::get_instance()->smarty->assign("ar_versions", $ar_versions);

            // Заявки ожидающие присвоения версии
            $pending_demands_count = m_demands::get_instance()->count(array("project_id" => $data["id"], "version_id" => 0));
            cls_register::get_instance()->smarty->assign("pending_demands_count", $pending_demands_count);
        }

    }

    /**
     * @param bool $id
     * @return bool
     */
    public function process($id = false)
    {
        parent::process($id);

        /*
        if ($this->data["id"]) {
            // Заявки проекта
            $ar_demands = array();
            $ar_demands["conditions"]    = array("project_id"=>$this->data["id"]);
            $ar_demands["data"]          = m_demands::get_instance()->get_array($ar_demands["conditions"], 10, 0, array(), $ar_demands["total"]);
            cls_register::get_instance()->smarty->assign("ar_demands", $ar_demands);

            // Версии проекта
            $ar_versions          = m_projects_versions::get_instance()->get_array(array("project_id"=>$this->data["id"]));
            cls_register::get_instance()->smarty->assign("ar_versions", $ar_versions);

            // Заявки ожидающие присвоения версии
            $pending_demands_count = m_demands::get_instance()->count(array("project_id"=>$this->data["id"], "version_id"=>0));
            cls_register::get_instance()->smarty->assign("pending_demands_count", $pending_demands_count);
        }*/

        return true;
    }

}
