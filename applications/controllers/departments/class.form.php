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
 * Class cnt_departments_form
 */
class cnt_departments_form extends cls_controllerform {
    protected $data_prefix = "dprt";
    protected $module_id = cls_modules::MODULE_DEPARTMENTS;

    /**
     * @return array
     */
    public function get_form_rules()
    {
        $form_rules[] = array("field"=>"name", "label"=>L::forms_labels_name, "rules"=>array("required"=>L::validate_message_required));
        return $form_rules;
    }

    /**
     * @param bool $id
     * @return bool
     */
    public function process($id = false)
    {
        parent::process($id);

        $ar_conditions          = array();
        $ar_departments         = $this->model->get_array($ar_conditions, 30);
        $ar_tree_departments    = cls_tools::get_instance()->map_tree($ar_departments);

        cls_register::get_instance()->smarty->assign("ar_tree_departments", $ar_tree_departments);

        return true;
    }
}


?>