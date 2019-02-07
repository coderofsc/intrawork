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
 * Class cnt_demands_form
 */
class cnt_demands_form extends cls_controllerform {
    private $cur_category   = false;
    private $parent_data    = false;
    private $ar_todo        = array();

    protected $attach_storage_dir = STORAGE_DIR_DEMANDS;
    protected $attach_owner = OWNER_DEMAND_MESSAGE;

    /**
     * @param $redirect
     * @param $id
     * @return string
     */
    protected function get_redirect_location($redirect, $id) {

        if ($redirect == FORM_NA_JOIN && $this->data["parent_id"]) {
            $location = $this->module_info["alias"]."/join/".intval($this->data["parent_id"])."/";
        } else {
            $location = parent::get_redirect_location($redirect, $id);
        }

        return $location;
    }

    public function get_user_request()
    {
        if ($this->parent_data) {
            // Было GET
            $_REQUEST[$this->data_prefix."_data"]["parent_id"] = $this->parent_data["id"];
        }

        if (isset($_POST["todo"]) && $_POST["todo"]) {
            $this->ar_todo = $_POST["todo"];
        }

        parent::get_user_request();

        if (!$this->user_request["id"] && !isset($this->storage_data["contact_id"]) && !$this->data["contact_id"]) {
            $this->data["contact_id"] = m_cuser::get_instance()->get("contact_id");
        }
    }

    /**
     * @param $action
     * @param array $parameters
     * @return bool
     */
    function check_access($action, $parameters = array()) {

        $result = parent::check_access($action, $parameters);

        if ($result && $parameters["id"]) {
            if ($demand_data = m_demands::get_instance()->get_one($parameters["id"], false)) {
                $category_id = $demand_data["cat_id"];
                $result    = m_cuser::get_instance()->check_access_category($category_id, m_roles::CRUD_U);
            }
        }

        return $result;
    }

    /**
     * @return array
     */
    public function get_actions() {
        $result = array();

        $result[] = array("name"=>"<span class='hidden-xs hidden-modal'>".L::actions_view."</span>", "icon"=>"eye", "href"=>$this->module_info["alias"]."/view/".$this->data["id"]."/");

        $category_id = $this->data["cat_id"];
        $category_access    = m_cuser::get_instance()->check_access_category($category_id, m_roles::CRUD_D);
        $module_access      = m_cuser::get_instance()->check_access_module($this->module_id, m_roles::CRUD_D);

        if ($module_access && $category_access) {
            $result[] = array("name"=>"<span class='hidden-xs hidden-modal'>".L::actions_delete."</span>", "delete"=>true, "icon"=>"times", "type"=>"danger", "href"=>$this->module_info["alias"]."/delete/".$this->data["id"]."/?report=true");
        }

        return $result;
    }


    public function get_info() {
        $result = parent::get_info();

        if ($this->user_request["id"]) {
            $result["meta_title"] = L::text_setup." ".$this->module_info["morph"][1]." <span class='rec-title'>«".trim($this->data["title"])."»</span>";
        } elseif ($this->parent_data) {
            $result["meta_title"] = L::forms_actions_join." ".$this->module_info["morph"][1];
        }

        if ($this->cur_category) {
            $ar_access_line_categories = cls_register::get_instance()->get("ar_access_line_categories");

            foreach ($this->cur_category["ar_parents"] as $cat_id) {
                $result["path"][] = array("icon"=>$ar_access_line_categories[$cat_id]["icon"], "title"=>$ar_access_line_categories[$cat_id]["name"], "url"=>"demands/?cnd[cat_id]=".$cat_id, "muted"=>isset($ar_access_line_categories[$cat_id]["visible_only"]));
            }
            $result["path"][] = array("icon"=>$this->cur_category["icon"], "title"=>$this->cur_category["name"], "url"=>"demands/?cnd[cat_id]=".$this->cur_category["id"], "muted"=>isset($this->cur_category["visible_only"]));
        }

        if ($this->parent_data) {
            $parent_title = cls_tools::get_instance()->mb_ucfirst($this->module_info["morph"][0]) . "&nbsp;<span class='text-success'>№</span><span class='text-success'>".$this->parent_data["id"]."</span>&nbsp;&laquo;" . $this->parent_data[$this->model->master_field] . "&raquo;";
            $result["path"][] = array("title"=>$parent_title, "url"=>"demands/view/".$this->parent_data["id"]."/");
        }

        return $result;

    }

    /**
     * @param $id
     */
    public function __action_save($id) {

        $this->user_request["id"] = $id;

        $result = array();

        $this->data = isset($_POST["demand_data"])?$_POST["demand_data"]:array("not_empty"=>"");

        if (($ar_errors = $this->validate()) !== true) {
            $result["status"] = STATUS_BAD_REQUEST;
            $result["ar_errors"] = array_values($ar_errors);
        } else {
            if (m_demands::get_instance()->save($id, $this->data, $this->parent_data)){
                $result["status"] = STATUS_OK;
            } else {
                $result["status"] = STATUS_BAD_REQUEST;
            }
        }

        echo json_encode($result);
        exit;
    }


    /**
     * @param $demand_id
     * @throws Exception
     * @throws SmartyException
     */
    public function __action_change_status($demand_id) {

        $status = isset($_GET["status"])?intval($_GET["status"]):0;
        $result["status"] = STATUS_BAD_REQUEST;
        $demand_data = m_demands::get_instance()->get_one($demand_id);

        if ($status) {

            $data["status"] = $status;
            $data["cat_id"] = $demand_data["cat_id"];

            if (m_demands::get_instance()->save($demand_id, $data)) { // Текущее и предыдущее состояние взять если надо

                $demand_data = m_demands::get_instance()->get_one($demand_id);
                cls_register::get_instance()->smarty->assign("demand_data", $demand_data);

                // Доступные статусы по типу заявки
                $ar_type_current_ts = m_demands_types::get_instance()->get_type_ts($demand_data["type_id"], $demand_data["status"]);
                cls_register::get_instance()->smarty->assign("ar_type_current_ts", $ar_type_current_ts);


                $result["data"]["demand_block"]     = cls_register::get_instance()->smarty->fetch("demands/view/block_demand.tpl");
                $result["data"]["navbar_actions"]   = cls_register::get_instance()->smarty->fetch("demands/view/navbar_actions.tpl");

                $result["status"] = STATUS_OK;
            }
        }

        echo json_encode($result);
        exit();
    }



    /*public function __action_attach($id = 0) {

        $result = array();
        $result["status"] = 0;

        $fs = cls_storage::for_owner(OWNER_DEMAND_MESSAGE);
        $fs->set_dir(STORAGE_DIR_DEMANDS);

        if ($result = $fs->upload("file")) {
            $result["status"] = 1;
        } else {
            $result["status"] = 0;
        }

        echo json_encode($result);
        exit;
    }*/


    /**
     * @return mixed
     */
    public function save() {

        // Если бот не установлен, то пытаемся найти подходящего почтового бота --
        // соответствующий категории или по-умолчанию
        if (!$this->data["mb_id"]) {
            $this->data["mb_id"] = m_mailbots::get_instance()->auto_select($this->data["cat_id"]);
        }

        if ($demand_id = $this->model->save($this->user_request["id"], $this->data, $this->previous_data, $this->ar_todo)/*parent::save()*/) {

            if (!$this->user_request["id"]) {

                // Добавление сообщения только при создании заявки (редактировать нельзя)
                $message_data = array();
                $message_data["from_eid"]  = m_cuser::get_instance()->get("eid");
                $message_data["from_mb_id"]     = $this->data["mb_id"];
                $message_data["title"]          = $this->data["title"];
                $message_data["message"]        = $this->data["message"];
                $message_data["demand_id"]      = $demand_id;
                $message_data["first"]          = 1;

                // Если выбран исполнитель ставим его в получателя
                if ($this->data["eu_eid"]) {
                    $message_data["to_eid"] = $this->data["eu_eid"];
                }

                // Если выбран ответственный или участники, ставим их всех в копию
                $message_data["copy_eid"] = array();
                if ($this->data["ru_eid"]) {
                    $message_data["copy_eid"][] = $this->data["ru_eid"];
                }
                if ($this->data["members_eid"]) {
                    $message_data["copy_eid"] = array_merge($message_data["copy_eid"], $this->data["members_eid"]);
                }
                $message_data["copy_eid"] = array_unique($message_data["copy_eid"]);

                // Если есть участники, но нет получателя (исполниеля), ставим в получателя первого участника
                // и удаляем его из участников
                if (!$message_data["to_eid"] && $message_data["copy_eid"]) {
                    $message_data["to_eid"] = $message_data["copy_eid"][0];
                    unset($message_data["copy_eid"][0]);
                }

                if ($message_id = m_demands_messages::get_instance()->save(false, $message_data, true)) {
                    m_demands_messages::get_instance()->attach($message_id);

                    if ($message_data["to_eid"]) {
                        $message_data = m_demands_messages::get_instance()->get_one($message_id);
                        cls_mailman::get_instance()->demand_message($demand_id, $message_data, $this->data["cat_id"]);
                    }
                }
            }
        }

        return $demand_id;
    }

    /**
     * @return array
     */
    public function get_form_rules()
    {
        $form_rules[] = array("field"=>"title", "label"=>L::forms_labels_title, "rules"=>array("required"=>L::validate_message_required));

        if (!$this->user_request["id"]) {
            $form_rules[] = array("field"=>"message", "label"=>L::forms_labels_demands_demand, "rules"=>array("required"=>L::validate_message_required));
        }

        return $form_rules;
    }

    /**
     * @param $id
     * @return bool
     */
    private function get_category($id) {
        $ar_access_line_categories = cls_register::get_instance()->get("ar_access_line_categories");

        if ($cur_area = $ar_access_line_categories[$id]) {
            $cur_area["ar_parents"] = m_categories::get_instance()->get_category_parents($cur_area["id"], cls_register::get_instance()->get("ar_access_line_categories"));
            return $cur_area;
        }

        return false;
    }

    /**
     * @param $parent_id
     * @return bool
     */
    public function __action_join($parent_id) {

        if (!$this->parent_data = m_demands::get_instance()->get_one($parent_id)) {
            header("location: ".HOST_ROOT."demands/view/".$parent_id."/");
            exit;
        }
        $this->data["cat_id"] = $this->parent_data["cat_id"];
        return $this->process();
    }

    /**
     * @param bool $id
     * @return bool
     */
    public function process($id = false)
    {
        parent::process($id);

        //var_dump($this->data);
        //exit;

        if (isset($this->data["cat_id"])) {
            $this->cur_category = $this->get_category($this->data["cat_id"]);
            cls_register::get_instance()->smarty->assign("cur_category", $this->cur_category);
        }

        cls_register::get_instance()->smarty->assign("parent_data", $this->parent_data);

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
