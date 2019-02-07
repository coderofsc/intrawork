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

class m_news extends cls_model {
    private static $instance;

    public $pre_delete      = true;

    public $sort    = array("dir"=>SORT_DSC_ZA, "by"=>"publish_date");
    public $ar_sort = array(
        "publish_date"  => array("name"=>L::forms_labels_news_publish_date),
        "create_date"   => array("name"=>L::forms_labels_created_date),
    );

    public $master_field = "title";
    public $ar_field = array(
        "title"        => L::forms_labels_title,
        "news"        => L::forms_labels_news_news
    );

    // private function __construct() { $this->orm_table = substr(__CLASS__, 2); }
    private function __clone() { }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function conditions_decode($ar_condition) {

        $ar_dictionary_field = array();

        if (isset($ar_condition["news"])) {
            $ar_condition["news"] = substr(strip_tags($ar_condition["news"]), 0, 255)."...";
        }

        return parent::conditions_decode($ar_condition, $ar_dictionary_field);
    }


    protected function set_select(ORM_EXT &$orm) {
        parent::set_select($orm);
        $orm->select_expr("UNIX_TIMESTAMP(".$this->orm_table.".publish_date)", "unix_publish_date");

        $orm->left_outer_join("users", "users.id = ".$this->orm_table.".user_id");
        m_users::orm_get_user_data($orm);

    }

    protected function set_conditions(ORM_EXT &$orm, $ar_conditions, $deleted) {
        parent::set_conditions($orm, $ar_conditions, $deleted);

        if (isset($ar_conditions["day"]) && $ar_conditions["day"]) {
            $orm->where_raw("DAY(create_date) = ?",   array($ar_conditions["day"]));
        }

        if (isset($ar_conditions["month"]) && $ar_conditions["month"]) {
            $orm->where_raw("MONTH(create_date) = ?",   array($ar_conditions["month"]));
        }

        if (isset($ar_conditions["year"]) && $ar_conditions["year"]) {
            $orm->where_raw("YEAR(create_date) = ?",   array($ar_conditions["year"]));
        }

        if (isset($ar_conditions["time"])) {
            $orm->where_raw("UNIX_TIMESTAMP(create_date) >= ?",   array($ar_conditions["time"]));
        }

        if ($ar_conditions["user_id"]) {
            $orm->where_equal("user_id", $ar_conditions["user_id"]);
        }

        if ($ar_conditions["not_view"]) {
            $orm->where_raw("UNIX_TIMESTAMP(news.create_date) > ? ",   array(m_cuser::get_instance()->get("unix_create_date")));
            $orm->left_outer_join("news_view", "(news_view.news_id = news.id AND news_view.user_id = ".m_cuser::get_instance()->get("id").")");
            $orm->where_null("news_view.id");
            $orm->where_equal("news.force_view", 1);
            $orm->where_not_equal("news.user_id", m_cuser::get_instance()->get("id"));
        }
    }

    protected function set_save_data(ORM_EXT &$orm, $data) {
        $orm->set("title",             trim($data["title"]));
        $orm->set("publish",           isset($data["publish"])?1:0);
        $orm->set("force_view",        isset($data["force_view"])?1:0);

        if (!isset($data["id"])) {
            $orm->set("user_id",           m_cuser::get_instance()->get("id"));
        }

        if (isset($data["publish"]) && !$data["publish_date"]) {
            $orm->set_expr("publish_date = NOW()");
        } else {
            $orm->set("publish_date",      $data["publish_date"]);
        }

        $orm->set("news",              trim($data["news"]));
   }

    public function get_one($id, $detailed = true, $escape=false, $deleted=false) {
        $result = parent::get_one($id, $detailed, $escape, $deleted);

        if ($result) {
            $sql = "INSERT IGNORE INTO news_view (user_id, news_id) VALUES(?, ?)";
            ORM_EXT::for_table("news_view")->raw_execute($sql, array(m_cuser::get_instance()->get("id"), $id));
        }

        return $result;

    }

}

?>
