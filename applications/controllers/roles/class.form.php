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
 * Class cnt_roles_form
 */
class cnt_roles_form extends cls_controllerform {
    protected $crud_categories, $crud_module;
    //protected   $module_id = cls_modules::MODULE_ROLES;

    public function get_user_request()
    {
        $this->crud_module      = isset($_POST["crud_module"])?$_POST["crud_module"]:array();
        $this->crud_categories  = isset($_POST["crud_categories"])?$_POST["crud_categories"]:array();

        foreach ($this->crud_module as $module_id => $ar_crud) {
            $this->crud_module[$module_id] = cls_tools::get_instance()->array2rflags($ar_crud);
        }

        foreach ($this->crud_categories as $cat_id => $ar_crud) {
            $this->crud_categories[$cat_id] = cls_tools::get_instance()->array2rflags($ar_crud);
        }

        parent::get_user_request();

    }

    /**
     * @return array
     */
    public function get_form_rules() {
        $form_rules[] = array("field"=>"name", "label"=>L::forms_labels_name, "rules"=>array("required"=>L::validate_message_required));
        return $form_rules;
    }

    /**
     * @return array|bool
     */
    public function validate() {
        $result = parent::validate();

        if (!$this->crud_categories && !$this->crud_module) {
            $result["crud"] = L::validate_message_required_crud;
        }

        return $result;
    }

    /**
     * @return mixed
     */
    public function save() {
        return $this->model->save($this->user_request["id"], $this->data, $this->crud_module, $this->crud_categories, $this->previous_data);
    }

    public function save_success() {
        if (in_array($this->user_request["id"], m_cuser::get_instance()->get("role_id"))) {
            m_cuser::get_instance()->refresh(true);
        }

        parent::save_success();

    }

    /**
     * @param bool $id
     * @return bool
     */
    public function process($id = false)
    {
        parent::process($id);

        if ($this->user_request["id"] && $this->validate_result) {
            $this->crud_module      = m_roles::get_instance()->get_crud_module($this->user_request["id"]);
            $this->crud_categories  = m_roles::get_instance()->get_crud_categories($this->user_request["id"]);
        }

        cls_register::get_instance()->smarty->assign("crud_module",        $this->crud_module);
        cls_register::get_instance()->smarty->assign("crud_categories",    $this->crud_categories);

        $ar_line_categories      = m_categories::get_instance()->get_array(array(), false);
        cls_register::get_instance()->smarty->assign("ar_tree_categories",  cls_tools::get_instance()->map_tree($ar_line_categories));

        // Все пользователи
        $ar_conditions      = array();
        $ar_users           = m_users::get_instance()->get_array($ar_conditions, false, 0, array("by"=>"dprt_id", "dir"=>SORT_ASC_AZ));
        cls_register::get_instance()->smarty->assign("ar_users", $ar_users);

        // Все контакты
        $ar_conditions      = array();
        $ar_contacts           = m_contacts::get_instance()->get_array($ar_conditions, false, 0, array("by"=>"type", "dir"=>SORT_DSC_ZA));
        cls_register::get_instance()->smarty->assign("ar_contacts", $ar_contacts);

        // Все почтовые боты
        $ar_conditions      = array();
        $ar_mb           = m_mailbots::get_instance()->get_array($ar_conditions, false, 0, array("by"=>"cat_uid", "dir"=>SORT_DSC_ZA));
        cls_register::get_instance()->smarty->assign("ar_mb", $ar_mb);


        // Все проекты
        $ar_conditions      = array();
        $ar_projects        = m_projects::get_instance()->get_array($ar_conditions);
        cls_register::get_instance()->smarty->assign("ar_projects", $ar_projects);


		return true;
	}
}


?>