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
 * Class cnt_todo
 */
class cnt_todo extends cls_controllerlist {
    protected   $LIMIT_LIST   = false;

    /**
     * cnt_todo constructor.
     */
    public function __construct() {
        $this->model = m_todo::get_instance();
        //parent::__construct();
    }

    /**
     * @param int $id
     */
    public function __action_create($id = 0) {
        $result = array();

        $title = isset($_POST["title"])?htmlentities(strip_tags(trim($_POST["title"])), ENT_QUOTES, "utf-8"):false;
        $demand_id = isset($_POST["demand_id"])?intval($_POST["demand_id"]):0;

        $result["status"] = STATUS_BAD_REQUEST;
        if ($title) {
            $result["id"] = $this->model->save($id, array("title"=>$title, "demand_id"=>$demand_id));
            $result["status"] = STATUS_OK;
        }

        echo json_encode($result);
        exit;
    }

    /**
     * @param $id
     */
    public function __action_set_status($id) {
        $result = array();

        $status = (isset($_POST["status"]) && $_POST["status"])?1:0;

        $result["status"] = STATUS_BAD_REQUEST;
        if ($result["id"] = $this->model->set_status($id, $status)) {
            $result["status"] = STATUS_OK;
        }


        echo json_encode($result);
        exit;
    }

    /**
     * @param $id
     */
    public function __action_update($id) {
        $this->__action_create($id);
    }


    /**
     * @param int $id
     */
    public function __action_delete($id) {
        $result = array();

        if ($id) {
            $this->model->delete($id);
            $result["status"] = STATUS_OK;
        }

        echo json_encode($result);
        exit;
    }

    /**
     * @return array
     */
    public function get_info() {

        $result = array();
        $result["meta_title"] = "Сделать (ToDo)";

        $result["ar_sort"]      = $this->model->ar_sort;

        return $result;
    }

    public function get_user_request()
    {
        parent::get_user_request();
        $this->user_request["conditions"]["user_id"]    = m_cuser::get_instance()->get("id");
        $this->user_request["conditions"]["demand_id"]  = 0;
    }


}
