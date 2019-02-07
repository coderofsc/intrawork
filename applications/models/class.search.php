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

class m_search {
    private static $instance;
    protected $default_sort_by    = "name";
    const DESCRIPTION_MAX_LENGTH = 255;

    // private function __construct() { $this->orm_table = substr(__CLASS__, 2); }
    private function __clone() { }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function clear_conditions(&$conditions) { return $conditions; }

    private function prepare_data(&$data) {
        foreach ($data as &$value) {
            $value["description"] = strip_tags(html_entity_decode($value["description"]));
        }
    }

    private function gen_like($ar_word, $ar_field = array("title"), $method = "OR") {
        $ar_like = array();
        foreach ($ar_field as $field) {
            $ar_like[] = " $field LIKE ('%".implode("%", $ar_word)."%') ";
        }

        return implode (" ".$method." ", $ar_like);
    }

    private function selected_search_result(&$result, $ar_word, $ar_fields = array("title", "description")) {
        if ($ar_word) {
            foreach ($result as &$item) {
                foreach ($ar_fields as $field) {
                    $item[$field] = preg_replace('/('.implode("|",$ar_word).')/iu', "<span class=\"ss\">$1</span>", $item[$field]);
                }
            }
        }
    }

    private function prepare_description(&$result, $ar_word) {

        foreach ($result as &$item) {
            $description_parts = array();

            $description = mb_strtolower($item["description"]);

            if (mb_strlen($description) < self::DESCRIPTION_MAX_LENGTH) {
                continue;
            }

            $ar_word_pos = array();
            foreach ($ar_word as $word) {
                if (($pos = mb_strpos($description, $word)) !== false) {
                    $ar_word_pos[$word] = $pos;
                }
            }

            $part_length = (sizeof($ar_word_pos)>1)?self::DESCRIPTION_MAX_LENGTH/sizeof($ar_word_pos):self::DESCRIPTION_MAX_LENGTH;

            $index = 0;
            foreach ($ar_word_pos as $word=>$pos) {
                $middle = $part_length/2-mb_strlen($word)/2;
                $start = ($pos<$middle)?0:$pos-$middle;

                if (!$index && $start) {
                    $description_parts[] = "";
                }

                $description_parts[] = mb_substr($description, $start, $part_length);

                if ($index == sizeof($ar_word_pos)-1 && $start+$part_length < mb_strlen($description)) {
                    $description_parts[] = "";
                }

                $index++;
            }

            $item["description"] = implode(" ... ", $description_parts);
        }

    }

    public function search($text, $sources = array(), $limit = 30, $offset = 0, $selected=true) {

        $ar_word = explode(" ", mb_strtolower($text));
        $ar_word = array_filter($ar_word, function($word) { return (mb_strlen($word)>2); });

        $ar_union = array();
        if (in_array(OWNER_USER, $sources)) {
            $ar_union[] = "
            (SELECT
                '".OWNER_USER."' as object_type,
                CONCAT('users/view/', source.id, '/') link,
                source.id, CONCAT_WS(' ', source.surname, source.name, source.patronymic) title,
                CONCAT_WS(', ', posts.name, departments.name) description,
                file_storage.hash extra_data
             FROM users source
             LEFT JOIN file_storage ON (file_storage.owner_hash = SHA1(source.id) AND file_storage.owner=".OWNER_USER." AND file_storage.used=1)

             LEFT JOIN posts ON (posts.id = source.post_id)
             LEFT JOIN departments ON (departments.id = source.dprt_id)
             WHERE ".$this->gen_like($ar_word, array("CONCAT(source.surname,source.name,source.patronymic)"), "OR")." LIMIT ".(10).")";
        }

        if (in_array(OWNER_CONTACT, $sources)) {
            $ar_union[] = "
            (SELECT
                '" . OWNER_CONTACT . "' as object_type,
                CONCAT('contacts/view/', source.id, '/') link,
                source.id,

                CONCAT_WS(' ', source.face_surname, source.face_name, source.face_patronymic, CONCAT_WS(' ', IF(source.opf<>'',source.opf, NULL), CONCAT('«',source.company,'»'))) title,
                /*CONCAT_WS(', ', posts.name, departments.name) description,*/
                source.descr description,
                file_storage.hash extra_data
             FROM contacts source
             LEFT JOIN file_storage ON (file_storage.owner_hash = SHA1(source.id) AND file_storage.owner=" . OWNER_CONTACT . " AND file_storage.used=1)
             WHERE " . $this->gen_like($ar_word, array("CONCAT(source.face_surname,source.face_name,source.face_patronymic,source.company)"), "OR") . " LIMIT " . (10) . ")";
        }

        if (in_array(OWNER_DEMAND, $sources)) {
            $ar_union[] = "(SELECT '" . OWNER_DEMAND . "' as object_type, CONCAT('demands/view/', source.id, '/') link, source.id, source.title title, /*SUBSTRING(source.demand,1,255)*/d_m.message description, source.status extra_data FROM demands source INNER JOIN demands_messages d_m ON (source.id = d_m.demand_id and d_m.first=1) WHERE " . $this->gen_like($ar_word, array("source.title", "d_m.message"), "AND") . " LIMIT " . (10) . ")";
            $ar_union[] = "(SELECT '" . OWNER_DEMAND . "' as object_type, CONCAT('demands/view/', source.id, '/') link, source.id, source.title title, /*SUBSTRING(source.demand,1,255)*/d_m.message description, source.status extra_data FROM demands source INNER JOIN demands_messages d_m ON (source.id = d_m.demand_id and d_m.first=1) WHERE " . $this->gen_like($ar_word, array("source.title"), "AND") . "  LIMIT " . (10) . ")";
            $ar_union[] = "(SELECT '" . OWNER_DEMAND . "' as object_type, CONCAT('demands/view/', source.id, '/') link, source.id, source.title title, /*SUBSTRING(source.demand,1,255)*/d_m.message description, source.status extra_data FROM demands source INNER JOIN demands_messages d_m ON (source.id = d_m.demand_id and d_m.first=1) WHERE " . $this->gen_like($ar_word, array("d_m.message"), "AND") . " LIMIT " . (10) . ")";
        }

        if (in_array(OWNER_NEWS, $sources)) {
            $ar_union[] = "
            (SELECT
                '" . OWNER_NEWS . "' as object_type,
                CONCAT('news/view/', source.id, '/') link,
                source.id, source.title title,
                source.news description,
                file_storage.hash extra_data
             FROM news source
             LEFT JOIN file_storage ON (file_storage.owner_hash = SHA1(source.user_id) AND file_storage.owner=" . OWNER_CONTACT . " AND file_storage.used=1)
             WHERE " . $this->gen_like($ar_word, array("CONCAT(source.title)"), "OR") . " LIMIT " . (10) . ")";
        }

        if ($result = ORM_EXT::for_table("union")->raw_query("SELECT sresult.* FROM (".implode("UNION DISTINCT", $ar_union).") sresult LIMIT ".$offset.", ".$limit)->find_array()) {
            $this->prepare_data($result);
            $this->prepare_description($result, $ar_word);
            if ($selected){
                $this->selected_search_result($result, $ar_word);
            }
        }

        return $result;
    }
}

?>
