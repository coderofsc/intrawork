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
 * Class cnt_trash
 */
class cnt_trash extends cls_controllerlist {

    /**
     * cnt_trash constructor.
     */
    public function __construct() {
        $this->module_info = array("name"=>"Объекты","alias"=>"trash", "morph"=> array(L::text_object_morph_one,L::text_object_morph_two, L::text_object_morph_five));
        $this->model = m_trash::get_instance();
    }

    /**
     * @return array
     */
    public function get_info() {

        $result = array();
        $result["meta_title"]   = "Корзина";
        $result["ar_sort"]      = $this->model->ar_sort;
        $result["total"]        = $this->total;

        $result["module"] = $this->module_info;

        $center__childOptions = array("name"=>"middle_layout");
        $center__childOptions["center"]   = array("size"=>"40%", "minWidth"=>'350', "onresize_end"=>"layout_resize_end");
        $center__childOptions["east"]     = array("size"=>"60%", "minSize"=>'350', "initClosed"=>config()->layout_west_initclosed );
        $result["layout"]["center"]["childOptions"]["center"]["childOptions"] = $center__childOptions;

        return $result;
    }

    /**
     * @param int $id
     */
    public function __action_restore($id = 0) {
        $report = isset($_GET["reports"])?true:false;

        $result = array();

        if ($result["status"] = $this->model->restore($id, $module_data, $trash_data)) {
            if ($report) {
                $this->restore_success();
                header("location: ".HOST_ROOT.$module_data["alias"]."/view/".$trash_data["object_id"]."/");
            }
        } else {
            $this->restore_error();
            header("location: ".HOST_ROOT.$this->module_info["alias"]."/");
        }

        exit;
    }

    public function __action_clear() {

        if ($this->model->clear()) {
            cls_alerts::get_instance()->add("Корзина успешно очищена", ALERT_SUCCESS);
        }

        header("location: ".HOST_ROOT.$this->module_info["alias"]."/");
        exit;
    }


    public function get_user_request() {

        // По умолчанию ставим начало месяца
        if (!isset($_GET["cnd"]["period_start"])) {
            $_GET["cnd"]["period_start"] = date("Y-m-d", mktime(0,0,0,date("m"), 1, date("Y")));
        }

        parent::get_user_request();

        $conditions_decode = $this->model->conditions_decode($this->user_request["conditions"]);
        cls_register::get_instance()->smarty->assign("conditions_decode", $conditions_decode);

    }


}
