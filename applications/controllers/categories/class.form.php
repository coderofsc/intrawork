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
 * Class cnt_categories_form
 */
class cnt_categories_form extends cls_controllerform {
    protected   $data_prefix = "cat";
    private     $crud_roles = array();
    //protected   $module_id = cls_modules::MODULE_CATEGORIES;

    public function get_user_request()
    {
        $this->crud_roles      = isset($_POST["crud_roles"])?$_POST["crud_roles"]:array();

        foreach ($this->crud_roles as $role_id => $ar_crud) {
            $this->crud_roles[$role_id] = cls_tools::get_instance()->array2rflags($ar_crud);
        }

        parent::get_user_request();

    }

    /**
     * @return array
     */
    public function get_form_rules()
    {
        $form_rules[] = array("field"=>"name", "label"=>L::forms_labels_name, "rules"=>array("required"=>L::validate_message_required));
        /*if ($this->data["bgcolor"]) {
            $form_rules[] = array("field"=>"bgcolor", "label"=>"Цвет", "rules"=>array("regexp[/#([a-f]|[A-F]|[0-9]){3}(([a-f]|[A-F]|[0-9]){3})?\\b/]"=>"Укажите цвет в формате HEX"));
        }*/
        return $form_rules;
    }

    /**
     * @return mixed
     */
    public function save() {
        return $this->model->save($this->user_request["id"], $this->data, $this->crud_roles, $this->previous_data);
    }

    public function save_success() {

        parent::save_success();

        // Обновляем доступ у пользователя
        m_cuser::get_instance()->refresh(true);
    }

    /**
     * @param bool $id
     * @return bool
     */
    public function process($id = false)
    {
        parent::process($id);

        if (!$this->data) {
            //$rand_color = cls_tools::get_instance()->random_color();
            //cls_register::get_instance()->smarty->assign("rand_color", $rand_color);
        }

        $ar_conditions      = array();
        $ar_categories      = $this->model->get_array($ar_conditions, false);
        unset($ar_categories[0]); // удалем категорию "Неразобранное "
        $ar_tree_categories = cls_tools::get_instance()->map_tree($ar_categories);
        cls_register::get_instance()->smarty->assign("ar_tree_categories", $ar_tree_categories);


        // Дерево категорий

        // Все роли
        $ar_conditions      = array();
        $ar_roles           = m_roles::get_instance()->get_array($ar_conditions, 30);
        cls_register::get_instance()->smarty->assign("ar_roles", $ar_roles);

        // CRUD для категории
        $ar_crud_category   = m_categories::get_instance()->get_roles_crud($id);
        cls_register::get_instance()->smarty->assign("ar_crud_category", $ar_crud_category);

        return true;
	}
}
