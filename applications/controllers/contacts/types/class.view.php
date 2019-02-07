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
 * Class cnt_contacts_types_view
 */
class cnt_contacts_types_view extends cls_controllerview {
    protected $data_prefix = "ct";

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

            $ar_contacts = array();
            $ar_contacts["conditions"]    = array("type"=>$this->data["id"]);
            $ar_contacts["data"]          = m_contacts::get_instance()->get_array($ar_contacts["conditions"], 10, 0, array(), $ar_contacts["total"]);
            cls_register::get_instance()->smarty->assign("ar_contacts", $ar_contacts);
            
        }

        return true;
    }

}


?>