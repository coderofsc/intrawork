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
 * Class cnt_demands_types_form
 */
class cnt_demands_types_form extends cls_controllerform {
    protected $data_prefix = "dt";

    /**
     * @return array
     */
    public function get_form_rules() {
        $form_rules[] = array("field"=>"name", "label"=>L::forms_labels_name, "rules"=>array("required"=>L::validate_message_required));
        return $form_rules;
    }

    /**
     * @return array
     */
    public function get_actions() {
        $result = array();
        $result[] = array("name"=>"<span class='hidden-xs'>".L::actions_view."</span>", "icon"=>"eye", "href"=>$this->module_info["alias"]."/view/".$this->data["id"]."/");

        if ($this->data["id"] != DEFAULT_DEMAND_TYPE_ID && m_cuser::get_instance()->check_access_module($this->module_id, m_roles::CRUD_D)) {
            $result[] = array("name"=>"<span class='hidden-xs'>".L::actions_delete."</span>", "delete"=>true, "icon"=>"times", "type"=>"danger", "href"=>$this->module_info["alias"]."/delete/".$this->data["id"]."/?reports=true");
        }

        return $result;
    }

    /**
     * @param bool $id
     * @return bool|void
     */
    public function process($id = false) {
        $result = parent::process($id);

        $ar_types = array();
        $ar_types[] = "default";
        $ar_types[] = "primary";
        $ar_types[] = "success";
        $ar_types[] = "info";
        $ar_types[] = "warning";
        $ar_types[] = "danger";

        cls_register::get_instance()->smarty->assign("ar_type_types", $ar_types);

        if (!$this->data["ts"]) {
            $this->data["ts"][m_demands::STATUS_NEW] = array("active_role"=>0, "slaves"=>array(m_demands::STATUS_NEW));
            cls_register::get_instance()->smarty->assign($this->data_prefix."_data", $this->data);
        }

        return $result;

    }



}
