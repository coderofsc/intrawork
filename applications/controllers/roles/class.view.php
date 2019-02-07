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
 * Class cnt_roles_view
 */
class cnt_roles_view extends cls_controllerview {
//    protected $crud_categories, $crud_module;

    /**
     * @param $id
     * @param $data
     */
    static function supplement_data($id, $data) {

        $crud_module      = m_roles::get_instance()->get_crud_module($id);
        $crud_categories  = m_roles::get_instance()->get_crud_categories($id);

        cls_register::get_instance()->smarty->assign("crud_module",        $crud_module);
        cls_register::get_instance()->smarty->assign("crud_categories",    $crud_categories);

        /*$ar_line_categories      = m_categories::get_instance()->get_array(array(), false);
        cls_register::get_instance()->smarty->assign("ar_tree_categories",  cls_tools::get_instance()->map_tree($ar_line_categories));*/
        $access_categories = array_keys($crud_categories);
        $ar_full_line_cats = m_categories::get_instance()->get_array(array(), false);
        $ar_access_line_categories = m_categories::get_instance()->build_complete_linear_tree($access_categories, $ar_full_line_cats);
        cls_register::get_instance()->smarty->assign("ar_tree_categories",  cls_tools::get_instance()->map_tree($ar_access_line_categories));

    }

    /**
     * @param bool $id
     * @return bool
     */
    public function process($id = false)
    {
        parent::process($id);

        if ($id && $this->data["filter_data"]) {
            $filter_decode = m_demands::get_instance()->conditions_decode(m_demands::get_instance()->clear_conditions($this->data["filter_data"]));
            cls_register::get_instance()->smarty->assign("filter_decode", $filter_decode);
        }


		return true;
	}
}


?>