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

class cls_tools {
    private static $instance;

    private function __construct()
    {
    }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new cls_tools();
        }
        return self::$instance;
    }

    public function build_sql_equal($field, $value) {

        if (is_array($value)) {
            $value = array_map("intval", $value);
            $raw_conditions = $field." IN (".implode(",",$value).")";
        } elseif ($value == EMPTY_VALUE) {
            $raw_conditions = $field." = 0";
        } elseif ($value == ANY_VALUE) {
            $raw_conditions = $field." > 0";
        } else {
            $raw_conditions = $field." = ".intval($value);
        }

        return $raw_conditions;

    }

    public function build_sql_like($field, $str) {
        $like       = array();
        $not_like   = array();
        $parts = array_map('trim', explode(",", $str));

        foreach ($parts as $item) {
            if ($item[0] == '!') {
                $not_like[] = substr($item, 1);
            } else {
                $like[] = $item;
            }
        }

        $ar_sql = $ar_sql_like = $ar_sql_not_like = array();
        if ($like) {
            foreach ($like as $substr) {
                if ($substr == ANY_VALUE) { // Любое значение
                    $ar_sql_like[]=$field." != ''";
                } else {
                    $ar_sql_like[]=$field." LIKE ('%".$substr."%')";
                }
            }
        }

        if ($not_like) {
            foreach ($not_like as $substr) {
                if ($substr == ANY_VALUE) { // Любое значение
                    $ar_sql_not_like[]=$field." = ''";
                } else {
                    $ar_sql_not_like[]=$field." NOT LIKE ('%".$substr."%')";
                }
            }
        }

        if ($ar_sql_like) {
            $ar_sql[] = "(".implode(" OR ", $ar_sql_like).")";
        }
        if ($ar_sql_not_like) {
            $ar_sql[] = "(".implode("AND", $ar_sql_not_like).")";
        }

        $sql = "(".implode(" AND ", $ar_sql).")";

        return $sql;
    }


    // Синхронизирует массив с эталонным, не позволяя значениям из первого выходить за пределы
    // установленных значений в эталонном массиве
    function sync_array($ar_source, $ar_etalon) {
        $result = array();

        foreach ($ar_source as $name=>$value) {
            // Пропускаем, если в эталоне нет текущего параметра
            if (!isset($ar_etalon[$name])) {
                $result[$name] = $value;
                continue;
            }

            $etalon_value = $ar_etalon[$name];

            if(is_array($value) && is_array($etalon_value)) {
                if (!$result[$name] = array_intersect($etalon_value, $value)) {
                    // Если нет никакого схождения, присваеваем полное значение эталона
                    $result[$name] = $etalon_value;
                }
            } else {
                $result[$name] = $etalon_value;
            }
        }

        // Добавляем эталонный набор
        foreach ($ar_etalon as $name => $value) {
            if (!isset($result[$name])) {
                $result[$name] = $value;
            }
        }

        return $result;

    }

    function link_it($text)
    {
        $text = preg_replace("/(^|[\n ])([\w]*?)((ht|f)tp(s)?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<a target=\"_blank\" href=\"$3\" >$3</a>", $text);
        $text = preg_replace("/(^|[\n ])([\w]*?)((www|ftp)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a target=\"_blank\" href=\"http://$3\" >$3</a>", $text);
        $text = preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a href=\"mailto:$2@$3\">$2@$3</a>", $text);
        return ($text);
    }

    function iso8601($time=false) {
        if(!$time) $time=time();
        return date("Y-m-d", $time) . 'T' . date("H:i:s", $time) .'+00:00';
    }

    public function array2rflags($ar) {
        $result = 0;
        foreach ($ar as $value) {
            $result |= $value;
        }

        return $result;
    }

    public function is_ajax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH'])
            && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }

    function random_color() {
        $str = '#';
        for ($i = 0; $i < 6; $i++) {
            $randNum = rand(0, 15);
            switch ($randNum) {
                case 10: $randNum = 'A';
                    break;
                case 11: $randNum = 'B';
                    break;
                case 12: $randNum = 'C';
                    break;
                case 13: $randNum = 'D';
                    break;
                case 14: $randNum = 'E';
                    break;
                case 15: $randNum = 'F';
                    break;
            }
            $str .= $randNum;
        }
        return $str;}



    public function add_img_class_in_content(&$content) {

        if (preg_match("/<img.*?class.*?>/", $content)) {
            $content = preg_replace('/<img(.*?)class="(.*?)"(.*?)>/i', '<img $1 class="$2 img-responsive" $3>', $content);
        } else {
            $content = preg_replace('/<img(.*?)>/i', '<img class="img-responsive" $1>', $content);
        }

        $content = preg_replace('/<img(.*?)style="(.*?)width:\s?([0-9]*)px(.*?)"(.*?)>/i', '<img $1 style="$2 width: auto $4" $5>', $content);
        $content = preg_replace('/<img(.*?)style="(.*?)height:\s?([0-9]*)px(.*?)"(.*?)>/i', '<img $1 style="$2 height: auto $4" $5>', $content);
        $content = preg_replace('/<img(.*?)src="(.*?)"(.*)>/i', '<a href="$2" rel="cnt-group" class="fancybox"><img $1 src="$2" $3></a>', $content);
    }

    public function clear_html_content(&$content) {
        //$content = preg_replace('/<(.*?)style="(.*?)"(.*?)>/i', '<$1 $3>', $content);
        $content = preg_replace('/<p>\s<\/p>/i', '', $content);
    }

    public function selected_search_result(&$result, $text) {
        if ($text) {
            foreach ($result as &$item) {
                $item["name"] = preg_replace('/('.$text.')/iu', "<span class=\"ss\">$1</span>", $item["name"]);
            }
        }
    }

    public function get_line_spec_areas($ar_section_areas) {
        $result = array();
        foreach ($ar_section_areas as $ar_areas) {
            $result = array_merge($result, $ar_areas);
        }

        return $result;
    }

    public function get_file_extension($filename) {
        return substr(strrchr($filename, '.'), 1);
    }


    static function parse_bbcode($bbcode)
    {
        //include_once $path_level."classes/class.bbcode.lib.php";

        //$bb = new bbcode;

        $smiles = array();
        $smiles[":)"] 		= '<img title="Улыбка" 		src="/jscript/wysibb/theme/default/img/smiles/sm1.png" 	class="sm">';
        $smiles[":("] 		= '<img title="Огорчение" 		src="/jscript/wysibb/theme/default/img/smiles/sm8.png" 	class="sm">';
        $smiles[":D"] 		= '<img title="Смех" 			src="/jscript/wysibb/theme/default/img/smiles/sm2.png" 	class="sm">';
        $smiles[";)"] 		= '<img title="Подмигивание" 	src="/jscript/wysibb/theme/default/img/smiles/sm3.png" 	class="sm">';
        $smiles[":up:"] 	= '<img title="Спасибо, класс" 	src="/jscript/wysibb/theme/default/img/smiles/sm4.png" 	class="sm">';
        $smiles[":down:"] 	= '<img title="Ругаю" 		src="/jscript/wysibb/theme/default/img/smiles/sm5.png" 	class="sm">';
        $smiles[":shock:"] 	= '<img title="Шок" 			src="/jscript/wysibb/theme/default/img/smiles/sm6.png" 	class="sm">';
        $smiles[":angry:"] 	= '<img title="Злой" 			src="/jscript/wysibb/theme/default/img/smiles/sm7.png" 	class="sm">';
        $smiles[":sick:"] 	= '<img title="Тошнит" 		src="/jscript/wysibb/theme/default/img/smiles/sm9.png" 	class="sm">';

        $bb = new cls_bbcode();
        $bb -> mnemonics = $smiles;
        $bb->parse($bbcode);
        return $bb->get_html();
    }

    function truncate($string, $limit, $break=".", $pad="...")
    {
        // return with no change if string is shorter than $limit
        if(strlen($string) <= $limit) return $string;

        // is $break present between $limit and the end of the string?
        if(false !== ($breakpoint = strpos($string, $break, $limit))) {
            if($breakpoint < strlen($string) - 1) {
                $string = substr($string, 0, $breakpoint) . $pad;
            }
        }

        return $string;
    }

    public function file_remote_exists($url) {
        $ar_headers = @get_headers($url);

        if(strpos($ar_headers[0], "200")) {
            return true;
        } else {
            return false;
        }
    }

    function copy_remove_file($src, $dst) {
        $ch = curl_init($src);
        $fp = fopen($dst, 'wb');

        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        curl_exec($ch);
        curl_close($ch);

        fclose($fp);
    }


    public function get_month_name($month, $short = false) {

        //$ar_mon_shortnames = array("янв", "фев", "мар", "апр", "май", "июн", "июл", "авг", "сен", "окт", "ноя", "дек");
        //$ar_mon_names = array("январь", "февраль", "март", "апрель", "май", "июнь", "июль", "август", "сентябрь", "октябрь", "ноябрь", "декабрь");

        if ($short) {
            $lang_prop = "L::months_short_".$month;
            return constant($lang_prop);
        } else {
            $lang_prop = "L::months_full_".$month;
            return constant($lang_prop);
        }
    }

    public function ts2hours($seconds, $full = true, $not_null = false) {

        $str = array();

        $hours = floor($seconds / 3600);
        if ($hours > 0 || $not_null) {
            $str[] = ($full)?$hours:sprintf("%02d",$hours);
            if ($full) $str[] = cls_tools::get_instance()->word_declension($hours,array(L::dates_hour_morph_one, L::dates_hour_morph_two,L::dates_hour_morph_five));
            $seconds -= $hours * 3600;
        }

        $minutes = floor($seconds / 60);
        //if ($hours > 0) {
            if ($minutes > 0 || $not_null) {
                $str[] = ($full)?$minutes:sprintf("%02d",$minutes);
                if ($full) $str[] = cls_tools::get_instance()->word_declension($minutes,array(L::dates_min_morph_one, L::dates_min_morph_two,L::dates_min_morph_five));
            }
        //}

        if (!$str) {
            return "0 ".L::dates_hour_morph_five." 0 ".L::dates_min_morph_five;
        }

        return implode($str, ($full)?" ":":");
    }

    public function get_weekday_name($index) {
        //$ar_name = array("Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Воскресенье");
        $prop_name = "L::weekdays_".($index+1);
        return constant($prop_name);
    }

    public function ts2text($today, $time=true, $month_fupper=false, $mon_short = true) {

        $today	= getdate($today);
        $month	= $this->get_month_name($today['mon'], $mon_short);

        if ($month_fupper) {
            $month = cls_tools::get_instance()->mb_ucfirst($month);
        }

        $mday	= sprintf("%02d", $today['mday']);
        $year	= $today['year'];

        /*if ($date == strtotime("now")) return "Сегодня";
        if ($date == strtotime("-1 day")) return "Вчера";
        if ($date == strtotime("+1 day")) return "Завтра";*/

        if ($b_today && mktime(0,0,0, date("n", time()), date("d", time()), date("Y", time())) ==  mktime(0,0,0, $today['mon'], $mday, $year))
        {
            $day_date = L::dates_today;
        }
        elseif ($b_today && (mktime(0,0,0, date("n", time()-86400), date("d", time()-86400), date("Y", time()-86400)) == mktime(0,0,0, $today['mon'], $mday, $year)))
        {	$day_date = L::dates_yesterday;
        }
        else
        {	$day_date = "$mday $month";
            if (date("Y") != $year)  $day_date.=" ".$year;
        }

        if ($time) {
            if ($today['hours'] == 0 && $today['minutes'] == 0) {
                $day_time = L::dates_midnight;
            } elseif ($today['hours'] == 12 && $today['minutes'] == 0) {
                $day_time = L::dates_noon;
            } else {
                $day_time = sprintf("%02d", $today['hours']).":".sprintf("%02d", $today['minutes']);
            }

            $day_date.=" ".$day_time;
        }

        return $day_date;

    }


    public function get_microtime()
    {
        $mtime = explode(' ',microtime());
        return $mtime[1]+$mtime[0];
    }

    public function prepare_text($text) {
        return trim($text);
    }

    public function gen_hash($string = false) {
        if ($string) {
            $hash = sha1($string.PASSWORD_SALT);
        } else {
            $hash = sha1(uniqid(rand(), true));
        }

        return $hash;
    }

    function generate_password($number = 7)
    {
        $arr = array('a','b','c','d','e','f',
            'g','h','i','j','k','l',
            'm','n','o','p','r','s',
            't','u','v','x','y','z',
            'A','B','C','D','E','F',
            'G','H','I','J','K','L',
            'M','N','O','P','R','S',
            'T','U','V','X','Y','Z',
            '1','2','3','4','5','6',
            '7','8','9','0');

        $pass = "";
        for($i = 0; $i < $number; $i++) {
            $index = rand(0, count($arr) - 1);
            $pass .= $arr[$index];
        }

        return $pass;
    }

    public function word_declension($count, $forms)
    {
        $count = abs($count);

        $mod100 = $count % 100;

        switch ($count%10) {
            case 1:
                if ($mod100 == 11)
                    return $forms[2];
                else
                    return $forms[0];
            case 2:
            case 3:
            case 4:
                if (($mod100 > 10) && ($mod100 < 20))
                    return $forms[2];
                else
                    return $forms[1];
            case 5:
            case 6:
            case 7:
            case 8:
            case 9:
            case 0:
                return $forms[2];
        }
    }

    public function remain_time2txt($seconds, $time = false, $full = false, $latest = false) {

        if (!$time)  $time = time();
        if (!$seconds || $seconds <= $time) return false;

        $seconds =  $seconds - $time;

        $str = array();
        $years = floor($seconds / 31536000);

        if ($years > 0) {
            $str[] = $years.' '.cls_tools::get_instance()->word_declension($years,array(L::dates_year_morph_one, L::dates_year_morph_two,L::dates_year_morph_five));
            if ($latest) return implode($str, " ");
        }

        $seconds -= $years * 31536000;

        $months = floor($seconds / 2628000);
        if ($years > 0 OR $months > 0) {
            if ($months > 0) {
                $str[] = $months.' '.cls_tools::get_instance()->word_declension($months,array(L::dates_mon_morph_one, L::dates_mon_morph_two,L::dates_mon_morph_five));
                if ($latest) return implode($str, " ");
            }
            $seconds -= $months * 2628000;
        }

        if ($full) {
            $weeks = floor($seconds / 604800);
            if ($years > 0 OR $months > 0 OR $weeks > 0) {
                if ($weeks > 0 && $full) {
                    $str[] = $weeks.' '.cls_tools::get_instance()->word_declension($weeks,array(L::dates_week_morph_one, L::dates_week_morph_two,L::dates_week_morph_five));
                    if ($latest) return implode($str, " ");
                }
                $seconds -= $weeks * 604800;
            }
        }

        $days = floor($seconds / 86400);
        if ($months > 0 OR $weeks > 0 OR $days > 0) {
            if ($days > 0) {
                $str[] = $days.' '.cls_tools::get_instance()->word_declension($days,array(L::dates_day_morph_one, L::dates_day_morph_two,L::dates_day_morph_five));
                if ($latest) return implode($str, " ");
            }
            $seconds -= $days * 86400;
        }

        $hours = floor($seconds / 3600);
        if ($days > 0 OR $hours > 0) {
            if ($hours > 0 && $full) {
                $str[] = $hours.' '.cls_tools::get_instance()->word_declension($hours,array(L::dates_hour_morph_one, L::dates_hour_morph_two,L::dates_hour_morph_five));
                if ($latest) return implode($str, " ");
            }
            $seconds -= $hours * 3600;
        }

        $minutes = floor($seconds / 60);
        if ($days > 0 OR $hours > 0 OR $minutes > 0) {
            if ($minutes > 0 && $full) {
                $str[] = $minutes.' '.cls_tools::get_instance()->word_declension($minutes,array(L::dates_min_morph_one, L::dates_min_morph_two,L::dates_min_morph_five));
                if ($latest) return implode($str, " ");
            }
            $seconds -= $minutes * 60;
        }

        if (!$str) {
            //$str[] = $seconds.' '.cls_tools::get_instance()->word_declension($seconds,array('секунду','секунды','секунд'));
        }

        if (!$full) {
            $str[] = sprintf("%02d",$hours).":".sprintf("%02d",$minutes).":".sprintf("%02d",$seconds);
        }


        if ($str) {
            return implode($str, " ");
        } else {
            return "только что";
        }

    }

    function mb_ucfirst($str) {
        //return mb_substr(mb_strtoupper($str,'utf-8'),0,1,'utf-8').mb_strtolower(mb_substr($str,1,mb_strlen($str,'utf-8'),'utf-8'),'utf-8');
        return mb_substr(mb_strtoupper($str,'utf-8'),0,1,'utf-8').mb_substr($str,1,mb_strlen($str,'utf-8'),'utf-8');
    }

    function mb_lcfirst($str) {
        return mb_substr(mb_strtolower($str,'utf-8'),0,1,'utf-8').mb_substr($str,1,mb_strlen($str,'utf-8'),'utf-8');
    }

    function convert_image($src, $dest_dir, $dest_filename = false, $x = 200, $y = 200, $crop=false, $image_convert = false, $clear=false, $water = false, $text = false, $crop_off = false, $no_upload_check = false) {
        $handle = new upload($src);

        if ($no_upload_check) {
            $handle->no_upload_check = $no_upload_check;
        }

        if ($dest_filename) {
            $handle->file_new_name_body   = $dest_filename;
        }

        if ($water) {
            $handle->image_watermark = 'copyright.png';
            //$handle->image_watermark_position = 'LT';
            $handle->image_watermark_no_zoom_in = true;
            $handle->image_watermark_no_zoom_out = true;
            //$handle->image_watermark_x  = 100;
            //$handle->image_watermark_y  = 100;
        }

        $handle->file_auto_rename       = false;
        $handle->file_overwrite         = true;

        $handle->image_convert        = $image_convert;

        /*
        if ($crop) {
            //var_dump($crop);
            //$handle->image_crop = '150';
            $handle->image_precrop = array($crop["y"], $crop["x"]+$crop["width"], $crop["y"]+$crop["height"], $crop["x"]);
            //var_dump($handle->image_precrop);
        }*/

        if ($x && $y) {
            $handle->image_resize         = true;
            $handle->image_x              = $x;
            $handle->image_y              = $y;

            if ($crop) {
                $handle->image_ratio_crop      = true;
            } else {
                $handle->image_ratio_fill      = true;
                $handle->image_ratio_no_zoom_in = true;
            }

            $handle->image_background_color = '#FFFFFF';
        }

        if ($text) {
            $handle->image_text            = 'intrawork.ru';
            $handle->image_text_direction  = 'h';
            $handle->image_text_background = '#000000';
            $handle->image_text_background_opacity = 35;
            $handle->image_text_font       = 2;
            $handle->image_text_position   = 'BR';
            $handle->image_text_padding_x  = 5;
            $handle->image_text_padding_y  = 1;
        }

        $handle->process($dest_dir);

        if ($clear) {
            $handle->clean();
        }

        if ($handle->error) {
            return $handle->error;
        }

        return true;
    }


    public function utf2win($str) {
        return iconv('utf-8', 'cp1251', $str);
    }

    public function win2utf($str) {
        return iconv('cp1251', 'utf-8', $str);
    }

    function flatten_json_tree($JSON, $parent_id = 0, $level = 0)
    {
        $result = array();
        $position = 1;
        foreach ($JSON as $children) {
            $descendents = array();
            if (isset($children['children'])) {
                $descendents = $this->flatten_json_tree($children['children'], $children['id'], $level+1);
            }
            $result[$children['id']] = array(
                'item_id'       => $children['id'],
                'parent_id'     => $parent_id,
                'level'         => $level,
                'position'      => $position++,
            );
            $result = ($result+$descendents);
        }
        return $result;
    }

    // Преобразует двумерный массив $dataset в многомерный древовидный $tree
    // на основе родителя $parent_field (проверка дочерних элементов на наличию индекса children)

    public function map_tree($dataset, $parent_field = "parent_id", $count_field = false)
    {
        $tree = array();

        if (!is_array($dataset)) return false;

        foreach ($dataset as $id=>&$node) {
            if (!$node[$parent_field]) {
                $tree[$id] = &$node;
            }
            else {
                $id_parent = $node[$parent_field];
                if ($count_field) {
                    /*if (isset($dataset[$id_parent][$count_field."_sum"])) {
                        $dataset[$id_parent][$count_field."_sum"] = $node[$count_field];
                    } else {
                        $dataset[$id_parent][$count_field."_sum"] += $node[$count_field];
                    }*/

                    $dataset[$id_parent][$count_field] += $node[$count_field];
                }
                $dataset[$id_parent]["children"][$id] = &$node;
            }
        }

        return $tree;
    }

    public function map_tree_parents($current_id, $ar_line_tree) {
        $ar_result = array();

        for ($level=0;;$level++) {
            if ($current_id = $ar_line_tree[$current_id]["parent_id"]) {
                $ar_result[] = intval($current_id);
            } else {
                break;
            }

            if ($level > 999) {
                echo "Критическая ошибка во вложенности дерева!";
                print_r(debug_backtrace());
                exit;
            }
        }

        return $ar_result;
    }

    public function map_tree_children($current_id, $ar_tree) {
        function get_children($ar_children, &$ar_result) {

            foreach($ar_children as $node_id => $value) {
                $ar_result[] = $node_id;
                if (isset($value["children"])) {
                    get_children($value["children"], $ar_result);
                }
            }
        }

        function find_node($find_id, $ar_tree, &$ar_result) {

            foreach($ar_tree as $node_id => $value) {
                if ($node_id == $find_id) {
                    if ($value["children"]) {
                        get_children($value["children"], $ar_result);
                    }
                }

                if (isset($value["children"]) && !$ar_result) {
                    find_node($find_id, $value["children"], $ar_result);
                }
            }
        }

        $ar_result = array();

        find_node($current_id, $ar_tree, $ar_result);

        return $ar_result;
    }


    public function crypt_password($password) {
        return md5( crypt($password, PASSWORD_SALT) );
    }

    function get_contrast_YIQ($hexcolor){
        $r = hexdec(substr($hexcolor,0,2));
        $g = hexdec(substr($hexcolor,2,2));
        $b = hexdec(substr($hexcolor,4,2));
        $yiq = (($r*299)+($g*587)+($b*114))/1000;
        return ($yiq >= 128) ? '#333333' : '#ffffff';
    }

    function hex2rgb($hex) {
        $hex = str_replace("#", "", $hex);

        if(strlen($hex) == 3) {
            $r = hexdec(substr($hex,0,1).substr($hex,0,1));
            $g = hexdec(substr($hex,1,1).substr($hex,1,1));
            $b = hexdec(substr($hex,2,1).substr($hex,2,1));
        } else {
            $r = hexdec(substr($hex,0,2));
            $g = hexdec(substr($hex,2,2));
            $b = hexdec(substr($hex,4,2));
        }
        $rgb = array($r, $g, $b);
        return implode(",", $rgb); // returns the rgb values separated by commas
        //return $rgb; // returns an array with the rgb values
    }

    public function add_ncrnd_url($url) {

        $part_url = parse_url($url);
        parse_str($part_url["query"], $ar_query_vars);

        $result = "";

        if ($part_url["path"]{0} == "/") {
            $result = substr($part_url["path"], 1);
        }

        if (isset($part_url["host"]) && $part_url["host"]) {
            $result = $part_url["host"]."/".$result;
        }

        if (isset($part_url["scheme"]) && $part_url["scheme"]) {
            $result = $part_url["scheme"]."://".$result;
        }

        $ar_query_vars["ncrnd"] = time();

        if ($ar_query_vars) {
            $result.="?".http_build_query($ar_query_vars);
        }

        return $result;
    }

    public function get_current_url($path_only = false, $leader_slash = false) {

        $result = $_SERVER['REQUEST_URI'];

        if ($path_only) {
            $part_url = parse_url($result);
            $result = $part_url["path"];
        }

        if (!$leader_slash && $result{0} == '/') {
            $result = substr($result, 1);
        }

        return $result;
    }

    public function this($url) {

        $part_url = parse_url($url);
        $part_this  = parse_url("http://".$_SERVER["SERVER_NAME"]);

        return ($part_url["host"] == $part_this["host"] || !$part_url["host"]);
    }

    public function notfound() {

        header("HTTP/1.1 404 Not Found");
        header("location: ".HOST_ROOT."404.html");
        exit();
    }

    public function get_mk_date() {
        return mktime(0, 0, 0, date("m"), date("d"), date("Y"));
    }

    public function ya_detector() {

        $query = http_build_query(
            array(
                'user-agent' => $_SERVER['HTTP_USER_AGENT']
            )
        );

        $result = file_get_contents('http://phd.yandex.net/detect?'.$query);

        $s = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
            <root xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
            '.$result.'</root>';



        $xml = simplexml_load_string($s);

        $error = $xml->{'yandex-mobile-info-error'};

        //если тип устройства определить не удалось - возвращаем пусткю строку
        if($error == 'Unknown user agent and wap profile') return false;

        return true;

    }


}

?>
