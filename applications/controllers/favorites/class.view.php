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
 * Class cnt_favorites_view
 */
class cnt_favorites_view extends cls_controllerview {
    protected $data_prefix = "favorite";
    private $object_data = false, $object_module_data = array();

    /**
     * cnt_favorites_view constructor.
     */
    public function __construct() {
        $this->model = m_favorites::get_instance();
        $this->module_info = array("name"=>"Избранное","alias"=>"favorites", "morph"=> array(L::text_object_morph_one,L::text_object_morph_two, L::text_object_morph_five));
    }

    /**
     * @return array
     */
    public function get_actions() {
        $result = array();
        if (m_cuser::get_instance()->check_access_module($this->data["module_id"], m_roles::CRUD_U)) {
            $result[] = array("name"=>"<span class='hidden-xs'>".L::actions_edit."</span>", "icon"=>"pencil", "href"=>$this->object_module_data["alias"]."/edit/".$this->data["object_id"]."/");
        }

        $result[] = array("name"=>"<span class='hidden-xs'>".L::actions_view."</span>", "icon"=>"eye", "href"=>$this->object_module_data["alias"]."/view/".$this->data["object_id"]."/");

        return $result;
    }


    /**
     * @return array
     */
    public function get_info() {

        if ($this->data["id"]) {
            //return $this->controller->get_info();
        }

        $result = array();
        $result["meta_title"]   = $this->data["object_name"];

        $result["module_id"] = 0;
        $result["module"] = $this->module_info;

        $result["actions"] = $this->get_actions();

        $result["path"][] = array("title"=>"Избранное", "url"=>"favorites/");

        return $result;
    }

    private function get_object_data() {

        $this->object_module_data = cls_modules::$ar_modules[$this->data["module_id"]];
        $model_name = "m_".$this->object_module_data["alias"];
        $model = $model_name::get_instance();

        $object_data = $model->get_one($this->data["object_id"], true, false, true);

        $cnt_name = "cnt_".$this->object_module_data["alias"]."_view";
        $cnt_name::supplement_data($this->data["object_id"], $object_data);

        return $object_data;

    }

    /**
     * @param bool $id
     * @return bool|void
     */
    public function process($id = false)
    {
        $result = parent::process($id);

        if ($this->data["id"]) {

            $this->object_data = $this->get_object_data();
            cls_register::get_instance()->smarty->assign("object_data",  $this->object_data);

            /*$module_data = cls_modules::$ar_modules[$this->data["module_id"]];
            $cnt_name = "cnt_".$module_data["alias"]."_view";
            $this->controller = new $cnt_name();
            $this->controller->process($this->data["object_id"]);*/
        }

        return $result;
    }

}