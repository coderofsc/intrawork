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
 * Class cnt_reports
 */
class cnt_reports extends cls_controllerlist {

    /**
     * cnt_reports constructor.
     */
    public function __construct() {
        $this->model = m_reports::get_instance();
        //parent::__construct();
    }

    /**
     * @return array
     */
    public function get_info() {

        $result = array();
        $result["meta_title"] = L::modules_report_name;
        $result["ar_sort"]      = $this->model->ar_sort;
        $result["total"]        = $this->total;
        $result["module"] = array("morph"=> array(L::modules_users_morph_one,L::modules_users_morph_two, L::modules_users_morph_five));

        $action_search = array("name"=>L::text_setup, "icon"=>"search", "href"=>"reports/tuning/", "modal"=>true);

        if ($this->user_request["conditions"]) {
            $action_search["type"] = "success";
            $action_search["href"].= "?".http_build_query(array("cnd"=>$this->user_request["conditions"]));
            if ($this->user_request["sort"]) {
                $action_search["href"].= "&".http_build_query(array("sort"=>$this->user_request["sort"]));
            }
        }

        $result["actions"][] = $action_search;


        $center__childOptions = array("name"=>"middle_layout");
        $center__childOptions["center"]   = array("size"=>"100%");
        $result["layout"]["center"]["childOptions"]["center"]["childOptions"] = $center__childOptions;


        return $result;
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


?>