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
 * Class cnt_news_view
 */
class cnt_news_view extends cls_controllerview {
    protected $data_prefix = "news";

    /**
     * @return array
     */
    public function get_info() {
        $result = parent::get_info();

        /*if ($this->user_request["year"] && $this->user_request["month"] && $this->user_request["day"]) {
            $result["path"][] = array("title"=>$this->user_request["year"], "url"=>"blog/".$this->user_request["year"]."/");
            $result["path"][] = array("title"=>cls_tools::get_instance()->mb_ucfirst(cls_tools::get_instance()->get_month_name($this->user_request["month"])), "url"=>"blog/".$this->user_request["year"]."/".sprintf("%02d",$this->user_request["month"])."/");
            $result["meta_title"] = "Посты за ".$this->user_request["day"]." ".cls_tools::get_instance()->get_month_name($this->user_request["month"])." ".$this->user_request["year"];;
        }
        elseif ($this->user_request["year"] && $this->user_request["month"]) {
            $result["path"][] = array("title"=>$this->user_request["year"], "url"=>"blog/".$this->user_request["year"]."/");
            $result["meta_title"] = "Посты за ".cls_tools::get_instance()->get_month_name($this->user_request["month"])." ".$this->user_request["year"];;
        }
        elseif ($this->user_request["year"]) {
            $result["meta_title"] = "Посты за ".$this->user_request["year"]." год";

        } else {
            $result["meta_title"] = "Блог";
        }

        */
        return $result;
    }


    /**
     * @return array
     */
    public function get_actions() {
        if (!$this->data["user_id"]) {
            $result = array();
            parent::get_favorite_action($result);
        } else {
            $result = parent::get_actions();
        }

        return $result;
    }

}
