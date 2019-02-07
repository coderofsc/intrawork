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
 * Class cnt_users_form
 */
class cnt_users_form extends cls_controllerform {

    private     $crud_notification_categories = false;
    private     $crud_notification_module = false;

    public function get_info() {
        $result = parent::get_info();
        $result["modal"] = array("avatar");
        return $result;
    }

    /**
     * @param $action
     * @param array $parameters
     * @return bool
     */
    function check_access($action, $parameters = array()) {


        if (m_cuser::get_instance()->get("id") != intval($parameters["id"])) {
            if ($result = parent::check_access($action, $parameters)) {
            }
        } else {
            $result = true;
        }


        /*
        if ($action == "set_avatar") {
            if (m_cuser::get_instance()->get("id") != $this->user_request["id"]) {
                $action_crud    = m_roles::CRUD_U;
                $result         = m_cuser::get_instance()->check_access_module($this->module_id, $action_crud);
            }
        }*/


        return $result;
    }

    /**
     * @param $user_id
     * @throws Exception
     * @throws SmartyException
     */
    public function __action_get_notification_modules($user_id) {
        $result = array();

        $ar_roles = (isset($_GET["ar_roles"]))?explode(",", $_GET["ar_roles"]):array();

        $ar_notification_crud = array();
        if (isset($_GET["crud_module"])) {
            foreach ($_GET["crud_module"] as $object_id => $ar_crud) {
                $ar_notification_crud[$object_id] = cls_tools::get_instance()->array2rflags($ar_crud);
            }
        } else {
            $ar_notification_crud = m_users::get_instance()->get_crud_notification_module($user_id);
        }

        $crud_modules = m_roles::get_instance()->get_crud_module($ar_roles);

        if ($crud_modules) {
            $ar_access_modules = array();
            foreach (array_keys($crud_modules) as $module_id) {
                $ar_access_modules[$module_id] = cls_modules::$ar_modules[$module_id];
            }

            cls_register::get_instance()->smarty->assign("ar_destinations",  $ar_access_modules);
            cls_register::get_instance()->smarty->assign("ar_crud",  $ar_notification_crud);
            cls_register::get_instance()->smarty->assign("name",  "module");
            cls_register::get_instance()->smarty->assign("hide_read",  true);

            $result["data"]  = cls_register::get_instance()->smarty->fetch("roles/form/table_crud.tpl");
        } else {
            $result["data"]  = '<div class="alert alert-default">';
            $result["data"] .= 'У роли нет доступных модулей или ';
            $result["data"] .= '<a ';
            if ($user_id) {
                $result["data"] .= 'href="users/edit/'.$user_id.'/#tab-general" ';
            } else {
                $result["data"] .= 'href="users/create/#tab-general" ';
            }
            $result["data"] .= 'onclick="$(\'#user-form-tabs\').find(\'a[href=#general]\').tab(\'show\')">роль</a> ';
            $result["data"] .= 'не указана';
            $result["data"] .= '</div>';
        }

        echo json_encode($result);
        exit;
    }

    /**
     * @param $user_id
     * @throws Exception
     * @throws SmartyException
     */
    public function __action_get_notification_categories($user_id) {

        $result = array();

        $ar_roles = (isset($_GET["ar_roles"]))?explode(",", $_GET["ar_roles"]):array();

        $ar_notification_crud = array();
        if (isset($_GET["crud_categories"])) {
            foreach ($_GET["crud_categories"] as $object_id => $ar_crud) {
                $ar_notification_crud[$object_id] = cls_tools::get_instance()->array2rflags($ar_crud);
            }
        } else {
            $ar_notification_crud = m_users::get_instance()->get_crud_notification_categories($user_id);
        }

        $crud_categories = m_roles::get_instance()->get_crud_categories($ar_roles);

        if ($crud_categories) {

            $access_categories = array_keys($crud_categories);
            $ar_roles_tree_categories   = cls_tools::get_instance()->map_tree(m_categories::get_instance()->build_complete_linear_tree($access_categories, m_categories::get_instance()->get_array(array(), false)));

            cls_register::get_instance()->smarty->assign("ar_destinations",  $ar_roles_tree_categories);
            cls_register::get_instance()->smarty->assign("ar_crud",  $ar_notification_crud);
            cls_register::get_instance()->smarty->assign("nested",  true);
            cls_register::get_instance()->smarty->assign("name",  "categories");
            cls_register::get_instance()->smarty->assign("hide_read",  true);

            $result["data"]  = cls_register::get_instance()->smarty->fetch("roles/form/table_crud.tpl");
        } else {
            $result["data"]  = '<div class="alert alert-default">';
            $result["data"] .= L::alerts_error_role_not_categories.' ';
            $result["data"] .= '<a ';
            if ($user_id) {
                $result["data"] .= 'href="users/edit/'.$user_id.'/#tab-general" ';
            } else {
                $result["data"] .= 'href="users/create/#tab-general" ';
            }
            $result["data"] .= 'onclick="$(\'#user-form-tabs\').find(\'a[href=#general]\').tab(\'show\')">'.L::modules_roles_morph_two.'</a> ';
            $result["data"] .= L::text_not_specified;
            $result["data"] .= '</div>';

        }

        echo json_encode($result);
        exit;
    }

    /**
     * @param int $user_id
     */
    public function __action_set_avatar($user_id = 0) {
        $result = array();
        $result["status"] = 0;

        $fs = cls_storage::for_owner(OWNER_USER, $user_id);
        $fs->set_dir(STORAGE_DIR_AVATARS_USERS);
        $crop = (array)json_decode($_POST["avatar_data"]);
        $fs->set_crop($crop);

        if ($user_id) { $fs->set_used(true); }

        if ($result = $fs->upload("avatar_file")) {
            if ($user_id) {
                m_cuser::get_instance()->set("avatar_storage_hash", $result["hash"]);
            }
            $result["status"] = 1;
        } else {
            $result["status"] = 0;
        }

        echo json_encode($result);
        exit;
    }

    public function get_user_request()
    {
        if (isset($_POST["save"])) {

            // crud_notification_module_update и crud_notification_categories_update
            // устанавливаются по загрузке соответствующей формы

            if (isset($_POST["crud_notification_module_update"])) {
                $this->crud_notification_module      = isset($_POST["crud_module"])?$_POST["crud_module"]:array();
            }

            if (isset($_POST["crud_notification_categories_update"])) {
                $this->crud_notification_categories  = isset($_POST["crud_categories"])?$_POST["crud_categories"]:array();
            }

            if ($this->crud_notification_module) {
                foreach ($this->crud_notification_module as $module_id => $ar_crud) {
                    $this->crud_notification_module[$module_id] = cls_tools::get_instance()->array2rflags($ar_crud);
                }
            }

            if ($this->crud_notification_categories) {
                foreach ($this->crud_notification_categories as $cat_id => $ar_crud) {
                    $this->crud_notification_categories[$cat_id] = cls_tools::get_instance()->array2rflags($ar_crud);
                }
            }

        } /*else {
            $this->crud_notification_categories = m_users::get_instance()->get_crud_notification_categories($this->user_request["id"]);
            $this->crud_notification_module     = m_users::get_instance()->get_crud_notification_module($this->user_request["id"]);
        }*/


        parent::get_user_request();
    }


    /**
     * @return array
     */
    public function get_form_rules() {
        $ar_email_rules = array();
        $ar_email_rules["required"]     = L::validate_message_required;
        $ar_email_rules["valid_email"]  = L::validate_message_valid_email;

        //if (!$this->user_request["id"] || m_cuser::get_instance()->get("email") != $this->data["email"]) {
            //$ar_email_rules["unique[email_addresses.email:".intval($this->original_data["eid"])."]"] = L::validate_message_unique_user;
            $ar_email_rules["email_exist[".intval($this->original_data["eid"])."]"] = L::validate_message_unique_user;

        //}

        $form_rules[] = array("field"=>"name", "label"=>L::forms_labels_face_name, "rules"=>array("required"=>L::validate_message_required));
        $form_rules[] = array("field"=>"surname", "label"=>L::forms_labels_face_surname, "rules"=>array("required"=>L::validate_message_required));
        $form_rules[] = array("field"=>"email", "label"=>L::forms_labels_email, "rules"=>$ar_email_rules);

        if (!$this->user_request["id"] || isset($this->data["change_pwd"])) {
            $form_rules[] = array("field"=>"password", "label"=>L::forms_labels_password, "rules"=>array("required"=>L::validate_message_required));
            $form_rules[] = array("field"=>"password_confirm", "label"=>L::forms_labels_password_confirm, "rules"=>array("required"=>L::validate_message_required, "matches[password]"=>L::validate_message_matches_password));
        }

        return $form_rules;
    }

    /**
     * @return mixed
     */
    public function save() {
        if ($result = $this->model->save($this->user_request["id"], $this->data, $this->crud_notification_module, $this->crud_notification_categories, $this->previous_data)) {
            if (!$this->user_request["id"] && $this->data["avatar_storage_hash"]) {
                ORM_EXT::raw_execute("UPDATE file_storage SET owner_hash=?, used=? WHERE used=? AND owner=? AND hash=?", array(sha1($result), 1, 0, OWNER_USER, $this->data["avatar_storage_hash"]));
            }

            if (!$this->user_request["id"] && isset($_POST["send_invitation"])) {
                cls_mailman::get_instance()->user_invitation($result, m_users::get_instance()->get_one($result), $this->data["password"], trim($_POST["text_invitation"]));
                cls_alerts::get_instance()->add_js("", "Пользователю отправлено приглашение.", ALERT_INFO);
            }
        }

        return $result;
    }


    public function save_success() {

        parent::save_success();

        // Проверка на изменение текущего пользователя
        if ($this->user_request["id"] == m_cuser::get_instance()->get("id")) {
            m_cuser::get_instance()->refresh(true);
        }
    }

    /**
     * @param bool $id
     * @return bool
     */
    public function process($id = false)
	{
        if (!$id && config()->limit->users_limit) {
            if ($count = m_users::get_instance()->count() >= config()->limit->users_limit) {
                cls_register::get_instance()->smarty->assign("record_limit", true);
                return true;
            }
        }

        parent::process($id);

        // Оповещение CRUD
        cls_register::get_instance()->smarty->assign("crud_notification_module", $this->crud_notification_module);
        cls_register::get_instance()->smarty->assign("crud_notification_categories", $this->crud_notification_categories);

        // Профессии
        $ar_conditions = array();
        $ar_posts = m_posts::get_instance()->get_array($ar_conditions, false);
        cls_register::get_instance()->smarty->assign("ar_posts", $ar_posts);

        // Подразделения
        $ar_conditions          = array();
        $ar_departments         = m_departments::get_instance()->get_array($ar_conditions, false);
        $ar_tree_departments    = cls_tools::get_instance()->map_tree($ar_departments);
        cls_register::get_instance()->smarty->assign("ar_tree_departments", $ar_tree_departments);

        // Роли
        $ar_conditions = array();
        $ar_roles = m_roles::get_instance()->get_array($ar_conditions, false);
        cls_register::get_instance()->smarty->assign("ar_roles", $ar_roles);

        // Все контакты
        $ar_conditions      = array();
        $ar_contacts           = m_contacts::get_instance()->get_array($ar_conditions, false, 0, array("by"=>"type", "dir"=>SORT_DSC_ZA));
        cls_register::get_instance()->smarty->assign("ar_contacts", $ar_contacts);

		return true;
	}
}