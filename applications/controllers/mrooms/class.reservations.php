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
 * Class cnt_mrooms_reservations
 */
class cnt_mrooms_reservations extends cls_controllerlist {

    /**
     * @return array
     */
    public function get_info() {
        $result = parent::get_info();

        $center__childOptions = array();
        $center__childOptions["center"]   = array("size"=>"40%", "minWidth"=>'350');
        $center__childOptions["east"]     = array("size"=>"60%", "minSize"=>'350');
        $result["layout"]["center"]["childOptions"]["center"]["childOptions"] = $center__childOptions;

        $result["path"][] = array("title"=>L::modules_mrooms_name, "url"=>"mrooms/");

        return $result;
    }

    /**
     * @param $action
     * @param array $parameters
     * @return bool
     */
    function check_access($action, $parameters = array()) {
        if ($result = parent::check_access($action, $parameters)) {
            if ($action == "move_events") {
                $action_crud    = m_roles::CRUD_U;
                $result         = m_cuser::get_instance()->check_access_module($this->module_id, $action_crud);
            }
        }

        return $result;
    }

    public function __action_move_events() {
        $mrr_id         = isset($_GET["mrr_id"])?intval($_GET["mrr_id"]):0;
        $delta_start    = isset($_GET["delta_start"])?intval($_GET["delta_start"]):0;
        $delta_end      = isset($_GET["delta_end"])?intval($_GET["delta_end"]):0;

        $result["status"] = STATUS_BAD_REQUEST;

        if ($mrr_id && $orm = ORM_EXT::for_table("mrooms_reservations")->find_one($mrr_id)) {
            if ($delta_end) {
                $orm->set_expr("end", "FROM_UNIXTIME(UNIX_TIMESTAMP(end)+".$delta_end.")");
            }
            if ($delta_start) {
                $orm->set_expr("start", "FROM_UNIXTIME(UNIX_TIMESTAMP(start)+".$delta_start.")");
            }
            if ($orm->save()) {
                $result["status"] = STATUS_OK;
            }
        }

        echo json_encode($result);
        exit();

    }
    
    public function __action_get_reservations_events() {

        $mroom_id   = isset($_GET["mroom_id"])?intval($_GET["mroom_id"]):0;
        $start      = isset($_GET["start"])?intval($_GET["start"]):0;
        $end        = isset($_GET["end"])?intval($_GET["end"]):0;

        $ar_events = array();

        $conditions = array("mroom_id"=>$mroom_id, "start"=>$start, "end"=>$end);
        $ar_mrr = m_mrooms_reservations::get_instance()->get_array($conditions, false);

        foreach ($ar_mrr as $mrr) {
            $event = array();
            $event["id"]        = $mrr["id"];
            $event["title"]     = $mrr["name"];
            $event["start"]     = $mrr["start"];
            $event["end"]       = $mrr["end"];
            $event["color"]     = $mrr["bgcolor"];
            $event["textColor"] = cls_tools::get_instance()->get_contrast_YIQ(substr($mrr["bgcolor"],1));

            $ar_events[] = $event;
        }

        $result["data"] = $ar_events;
        $result["status"] = STATUS_OK;

        echo json_encode($result);
        exit();
    }


}


?>