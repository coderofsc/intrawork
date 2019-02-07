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
 * Class cnt_trash_view
 */
class cnt_trash_view extends cls_controllerview {
    protected $data_prefix = "trash";

    /**
     * cnt_trash_view constructor.
     */
    public function __construct() {
        $this->model = m_trash::get_instance();
    }

    /**
     * @return array
     */
    public function get_actions() {
        $result = array();
        $result[] = array("name"=>"<span class='hidden-xs'>Восстановить</span>", "icon"=>"rotate-left", "href"=>"trash/restore/".$this->data["id"]."/?reports=true");
        $result[] = array("name"=>"<span class='hidden-xs'>".L::actions_delete."</span>", /*"delete"=>true,*/ "icon"=>"times", "type"=>"danger", "href"=>"trash/delete/".$this->data["id"]."/?reports=true");

        return $result;
    }


    /**
     * @return array
     */
    public function get_info() {

        $result = array();
        $result["meta_title"]   = cls_tools::get_instance()->mb_ucfirst(cls_modules::$ar_modules[$this->data["module_id"]]["morph"][0])." &laquo;".$this->data["object_name"]."&raquo;";

        $result["module_id"] = 0;
        $result["module"] = array("name"=>"Удаленные объекты","alias"=>"trash", "morph"=> array(L::text_object_morph_one,L::text_object_morph_two, L::text_object_morph_five));

        $result["actions"] = $this->get_actions();

        $result["path"][] = array("title"=>"Корзина", "url"=>"trash/");

        return $result;
    }

    /**
     * @return mixed
     */
    private function get_object_data() {

        $module_data = cls_modules::$ar_modules[$this->data["module_id"]];
        $model_name = "m_".$module_data["alias"];
        $model = $model_name::get_instance();

        $object_data = $model->get_one($this->data["object_id"], true, false, true);

        $cnt_name = "cnt_".$module_data["alias"]."_view";
        $cnt_name::supplement_data($this->data["object_id"], $object_data);

        return $object_data;

    }


    /**
     * @param bool $id
     * @return bool
     */
    public function process($id = false)
    {
        parent::process($id);

        if ($this->data["id"]) {
            $object_data = $this->get_object_data();

            cls_register::get_instance()->smarty->assign("object_data",  $object_data);
            //var_dump($object_data);
            //exit;

        }

        return true;
    }

}


?>