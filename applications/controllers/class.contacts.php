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
 * Class cnt_contacts
 */
class cnt_contacts extends cls_controllerlist {

    /**
     * @param $action
     * @param array $parameters
     * @return bool
     */
    function check_access($action, $parameters = array()) {
        if ($this->module_id) {
            switch ($action) {
                case "delete"   : $action_crud = m_roles::CRUD_D; break;
                default         : $action_crud = m_roles::CRUD_R; break;
            }
            return true;
        }
        return true;
    }

    /**
     * @return array
     */
    public function get_actions() {
        $result = array();
        $result[] = array("name"=>"<span class='hidden-xs'>".L::actions_add."</span>", "icon"=>"plus", "href"=>$this->module_info["alias"]."/create/");

        return $result;
    }

    /**
     * @return array
     */
    public function get_info() {
        $result = parent::get_info();

        $action_search = array("name"=>L::actions_search, "icon"=>"search", "href"=>"contacts/search/", "modal"=>true);

        if ($this->user_request["conditions"]) {
            $action_search["type"] = "success";
            $action_search["href"].= "?".http_build_query(array("cnd"=>$this->user_request["conditions"]));
            if ($this->user_request["sort"]) {
                $action_search["href"].= "&".http_build_query(array("sort"=>$this->user_request["sort"]));
            }
        }

        $result["actions"][] = $action_search;

        // Перенести layout_init в отдельный метод у родителя и по необходимости его переобределять

        return $result;
    }

    public function get_user_request() {
        parent::get_user_request();

        $conditions_decode = $this->model->conditions_decode($this->user_request["conditions"]);
        cls_register::get_instance()->smarty->assign("conditions_decode", $conditions_decode);

    }


}
