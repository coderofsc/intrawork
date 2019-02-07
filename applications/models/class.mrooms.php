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

class m_mrooms extends cls_model {
    private static $instance;

    public $pre_delete      = true;

    public $ar_field = array(
        "name"          => L::forms_labels_name,
        "places"        => L::forms_labels_mrooms_places,
        "descr"         => L::forms_labels_descr
    );

    private function __clone() { }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    protected function set_save_data(ORM_EXT &$orm, $data) {

        if (is_array($data["rflags"])) {
            $data["rflags"] = cls_tools::get_instance()->array2rflags($data["rflags"]);
        }

        $orm->set("name",               trim($data["name"]));
        $orm->set("rflags",             intval($data["rflags"]));
        $orm->set("places",             intval($data["places"]));
        $orm->set("descr",              trim($data["descr"]));
        $orm->set("bgcolor",            trim($data["bgcolor"]));
    }

}

?>
