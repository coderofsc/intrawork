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
 * Class cnt_notes
 */
class cnt_notes extends cls_controllerlist {

    /**
     * cnt_notes constructor.
     */
    public function __construct() {
        $this->model = m_notes::get_instance();
        //parent::__construct();
    }

    public function __action_create() {
        $result = array();

        $title = isset($_POST["title"])?htmlentities(strip_tags(trim($_POST["title"])), ENT_QUOTES, "utf-8"):false;
        $text = isset($_POST["text"])?htmlentities(strip_tags(trim($_POST["text"])), ENT_QUOTES, "utf-8"):false;

        $result["status"] = STATUS_BAD_REQUEST;
        if ($text) {
            $result["id"] = $this->model->save(false, array("title"=>$title, "text"=>$text));
            $result["status"] = STATUS_OK;
        }

        echo json_encode($result);
        exit;
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
        $result["meta_title"] = "Заметки";
        //$result["modal"] = array("note");

        $result["actions"][] = array("name"=>'<span class="hidden-xs">'.L::actions_create.'</span>', "modal"=>true, "inline"=>true, "icon"=>"plus", "href"=>"#modal-note");

        return $result;
    }


}
