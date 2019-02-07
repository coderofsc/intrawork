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
 * Class cnt_contacts_form
 */
class cnt_contacts_form extends cls_controllerform {

    //protected $attach_storage_dir = STORAGE_DIR_COMMENTS_CONTACTS;
    //protected $attach_owner = OWNER_COMMENT;

    /**
     * @param $action
     * @param array $parameters
     * @return bool
     */
    function check_access($action, $parameters = array()) {
        return true;
    }

    /**
     * @return array
     */
    public function get_actions() {
        $result = array();
        $result[] = array("name"=>"<span class='hidden-xs'>".L::actions_view."</span>", "icon"=>"eye", "href"=>$this->module_info["alias"]."/view/".$this->data["id"]."/");

        if ($this->data["user_id"] == m_cuser::get_instance()->get("id") || m_cuser::get_instance()->check_access_module($this->module_id, m_roles::CRUD_D)) {
            $result[] = array("name"=>"<span class='hidden-xs'>".L::actions_delete."</span>", "delete"=>true, "icon"=>"times", "type"=>"danger", "href"=>$this->module_info["alias"]."/delete/".$this->data["id"]."/?reports=true");
        }

        return $result;
    }


    public function get_info() {

        if ($this->data["legal"] == LEGAL_PERSON) {
            $this->model->master_field = "company_full_name";
        } else {
            $this->model->master_field = "face_full_fio";
        }

        $result = parent::get_info();

        $result["modal"] = array("avatar");
        return $result;
    }

    /**
     * @param int $contact_id
     */
    public function __action_set_avatar($contact_id = 0) {
        $result = array();
        $result["status"] = 0;

        $fs = cls_storage::for_owner(OWNER_CONTACT, $contact_id);
        $fs->set_dir(STORAGE_DIR_AVATARS_CONTACTS);
        $fs->set_crop($_POST["avatar_data"]);
        if ($contact_id) { $fs->set_used(true); }

        if ($result = $fs->upload("avatar_file")) {
            $result["status"] = 1;
        } else {
            $result["status"] = 0;
        }

        echo json_encode($result);
        exit;
    }

    public function save() {
        if ($result = parent::save()) {
            if (!$this->user_request["id"] && $this->data["avatar_storage_hash"]) {
                ORM_EXT::raw_execute("UPDATE file_storage SET owner_hash=?, used=? WHERE used=? AND owner=? AND hash=?", array(sha1($result), 1, 0, OWNER_CONTACT, $this->data["avatar_storage_hash"]));
//                echo ORM_EXT::get_last_query();
//                exit;
            }
        }

        return $result;
    }


    /**
     * @return array
     */
    public function get_form_rules()
    {
        if ($this->data["legal"] == LEGAL_PERSON) {
            $form_rules[] = array("field"=>"company", "label"=>L::forms_labels_contacts_company_name, "rules"=>array("required"=>L::validate_message_required));
        }
        $form_rules[] = array("field"=>"face_name", "label"=>L::forms_labels_face_name, "rules"=>array("required"=>L::validate_message_required));
        $form_rules[] = array("field"=>"face_surname", "label"=>L::forms_labels_face_surname, "rules"=>array("required"=>L::validate_message_required));

        return $form_rules;
    }

    /**
     * @param bool $id
     * @return bool
     */
    public function process($id = false)
    {
        parent::process($id);

        // Типы контактов
        $ar_types =  m_contacts_types::get_instance()->get_array(array(), false);
        cls_register::get_instance()->smarty->assign("ar_types", $ar_types);

        return true;
    }

}
