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
 * Class cnt_contacts_view
 */
class cnt_contacts_view extends cls_controllerview {

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

        parent::get_favorite_action($result);

        if ($this->data["user_id"] == m_cuser::get_instance()->get("id") || m_cuser::get_instance()->check_access_module($this->module_id, m_roles::CRUD_U)) {
            $result[] = array("name"=>"<span class='hidden-xs'>".L::actions_edit."</span>", "icon"=>"pencil", "href"=>$this->module_info["alias"]."/edit/".$this->data["id"]."/");
        }
        if ($this->data["user_id"] == m_cuser::get_instance()->get("id") || m_cuser::get_instance()->check_access_module($this->module_id, m_roles::CRUD_D)) {
            $result[] = array("name"=>"<span class='hidden-xs'>".L::actions_delete."</span>", "delete"=>true, "icon"=>"times", "type"=>"danger", "href"=>$this->module_info["alias"]."/delete/".$this->data["id"]."/?reports=true");
        }

        return $result;
    }


    /**
     * @return array
     */
    public function get_info() {

        if ($this->data["legal"] == LEGAL_PERSON) {
            $this->model->master_field = "company_full_name";
        } else {
            $this->model->master_field = "face_full_fio";
        }

        $result = parent::get_info();

        if ($this->data["type_id"]) {
            $type_name = cls_tools::get_instance()->mb_ucfirst($this->data["type_name"]);
        } else {
            $type_name = cls_tools::get_instance()->mb_ucfirst($this->module_info["morph"][0]);
        }

        $result["meta_title"] = $type_name." &laquo;".$this->data[$this->model->master_field]."&raquo;";

        return $result;
    }

    /**
     * @param bool $id
     * @return bool
     */
    public function process($id = false)
    {
        parent::process($id);

        // Последние заявки
        $ar_demands_last = array();
        //$ar_demands_last["conditions"]    = array("contact_id"=>$this->data["eid"],"status"=>array(m_demands::STATUS_WORK, m_demands::STATUS_NEW, m_demands::STATUS_PAUSE));
        $ar_demands_last["conditions"]    = array("contact_id"=>$this->data["id"]);
        $ar_demands_last["data"]          = m_demands::get_instance()->get_array($ar_demands_last["conditions"], 5, 0, array(), $ar_demands_last["total"]);

        cls_register::get_instance()->smarty->assign("ar_demands_last",  $ar_demands_last);

		return true;
	}
}
