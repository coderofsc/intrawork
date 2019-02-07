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
 * Class cnt_projects_versions_form
 */
class cnt_projects_versions_form extends cls_controllerform {

    protected $module_id = false;

    /**
     * @param $project_id
     */
    private function get_versions($project_id) {
        // Версии проекта
        $ar_versions          = m_projects_versions::get_instance()->get_array(array("project_id"=>$project_id), false, 0, array(), $ar_versions["total"]);
        cls_register::get_instance()->smarty->assign("ar_versions", $ar_versions);

        // Заявки ожидающие присвоения версии
        $pending_demands_count = m_demands::get_instance()->count(array("project_id"=>$project_id, "version_id"=>0));
        cls_register::get_instance()->smarty->assign("pending_demands_count", $pending_demands_count);
    }

    /**
     * @param $project_id
     * @throws Exception
     * @throws SmartyException
     */
    public function __action_delete($project_id) {
        $id = isset($_POST["id"])?intval($_POST["id"]):0;

        $result = array();
        $result["status"] = STATUS_BAD_REQUEST;

        if ($this->model->delete($id)) {
            $result["status"] = STATUS_OK;

            $this->get_versions($project_id);
            cls_register::get_instance()->smarty->assign("project_id", $project_id);
            $result["list"] = cls_register::get_instance()->smarty->fetch("projects/versions/list.tpl");

        }

        echo json_encode($result);
        exit();
    }

    /**
     * @param $project_id
     * @throws Exception
     * @throws SmartyException
     */
    public function __action_add($project_id) {
        $this->data = isset($_POST["pv_data"])?$_POST["pv_data"]:false;
        $this->data["project_id"] = $project_id;

        $result = array();

        $result["status"] = STATUS_BAD_REQUEST;

        if (($ar_errors = $this->validate()) !== true) {
            $result["ar_errors"] = array_values($ar_errors);

        } elseif ($this->model->save(0, $this->data)) {
            $result["status"] = STATUS_OK;

            $this->get_versions($project_id);

            cls_register::get_instance()->smarty->assign("project_id", $project_id);
            $result["list"] = cls_register::get_instance()->smarty->fetch("projects/versions/list.tpl");
        }


        echo json_encode($result);
        exit();

    }

    /**
     * @return array
     */
    public function get_form_rules() {
        $form_rules[] = array("field"=>"name", "label"=>L::forms_labels_name, "rules"=>array("required"=>L::validate_message_required));
        $form_rules[] = array("field"=>"date", "label"=>L::forms_labels_date, "rules"=>array("required"=>L::validate_message_required));
        $form_rules[] = array("field"=>"project_id", "label"=>L::modules_projects_morph_one, "rules"=>array("required"=>L::validate_message_required));
        return $form_rules;
    }

}
