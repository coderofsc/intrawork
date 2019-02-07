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
 * Class cnt_demands_types_view
 */
class cnt_demands_types_view extends cls_controllerview {
    protected $data_prefix = "dt";

    /**
     * @return array
     */
    public function get_actions() {
        $result = array();
        if (m_cuser::get_instance()->check_access_module($this->module_id, m_roles::CRUD_U)) {
            $result[] = array("name"=>"<span class='hidden-xs'>".L::actions_edit."</span>", "icon"=>"pencil", "href"=>$this->module_info["alias"]."/edit/".$this->data["id"]."/");
        }
        if ($this->data["id"] != DEFAULT_DEMAND_TYPE_ID && m_cuser::get_instance()->check_access_module($this->module_id, m_roles::CRUD_D)) {
            $result[] = array("name"=>"<span class='hidden-xs'>".L::actions_delete."</span>", "delete"=>true, "icon"=>"times", "type"=>"danger", "href"=>$this->module_info["alias"]."/delete/".$this->data["id"]."/?reports=true");
        }

        return $result;
    }

    /**
     * @param bool $id
     * @return bool
     */
    public function process($id = false)
    {
        parent::process($id);

        if ($this->data["id"]) {
            /*$ar_conditions    = array("post_id"=>$this->data["id"]);
            $ar_users         = m_users::get_instance()->get_array($ar_conditions, 10);
            cls_register::get_instance()->smarty->assign("ar_users", $ar_users);*/

            $ar_demands = array();
            $ar_demands["conditions"]    = array("type_id"=>$this->data["id"]);
            $ar_demands["data"]          = m_demands::get_instance()->get_array($ar_demands["conditions"], 10, 0, array(), $ar_demands["total"]);
            cls_register::get_instance()->smarty->assign("ar_demands", $ar_demands);
            
        }

        return true;
    }

}


?>