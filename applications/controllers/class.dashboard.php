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
 * Class cnt_dashboard
 */
class cnt_dashboard extends cls_controller {
	////private $user_request;
	//private $validate_result = true;
    protected $feedback_data;

    /**
     * @return array
     */
    public function get_info() {
        $result = array();
        $result["meta_title"] = L::modules_dashboard_name;

        $center__childOptions = array();
        $center__childOptions["center"]   = array("size"=>"60%", "minWidth"=>'350');
        $center__childOptions["west"]     = array("size"=>"40%", "minSize"=>'350', "onresize_end"=>"layout_resize_end");

        $center__childOptions["center"]["childOptions"] = array();
        $center__childOptions["center"]["childOptions"]["center"]   = array("size"=>"50%");
        $center__childOptions["center"]["childOptions"]["north"]    = array("size"=>"50%");

        $center__childOptions["west"]["childOptions"] = array();
        $center__childOptions["west"]["childOptions"]["center"]     = array("size"=>"33%");
        $center__childOptions["west"]["childOptions"]["north"]      = array("size"=>"33%");
        $center__childOptions["west"]["childOptions"]["south"]      = array("size"=>"33%");

        $result["layout"]["center"]["childOptions"]["center"]["childOptions"] = $center__childOptions;

        return $result;
    }

    /**
     * cnt_dashboard constructor.
     */
    public function __construct()
	{
	}
	

	public function get_user_request()
	{
	}

    /**
     * @return bool
     */
    public function validate()
    {
        return true;
    }

    public function __action_reload_demands_member() {
        $result = array();

        $result["data"]  = cls_register::get_instance()->smarty->fetch("main/sidebar/block_demands_member.tpl");

        echo json_encode($result);
        exit;

    }

    public function __action_get_pulse() {

        $separators = array();
        $separators[TIME_MONTH] = array(
            "category"      => function($value) { return cls_tools::get_instance()->mb_ucfirst(cls_tools::get_instance()->ts2text($value, false)); }
        );
        $separators[TIME_YEAR] = array(
            "category"      => function($value) { return cls_tools::get_instance()->mb_ucfirst(cls_tools::get_instance()->get_month_name(date("n", $value))).((date("Y", time()) != date("Y", $value))?" ".date("Y", $value):""); }
        );
        $separators[TIME_DAY] = array(
            "category"      => function($value) { return date("H:00", $value); }
        );

        $orm = ORM_EXT::for_table("demands_history_exec");
        $orm->select_expr("MIN(UNIX_TIMESTAMP(open_time))", "min");
        $first_event_time = $orm->find_one()->get("min");

        if (time() - $first_event_time < TIME_DAY) {
            $current_separator = TIME_DAY;
        } elseif (time() - $first_event_time < TIME_MONTH) {
            $current_separator = TIME_MONTH;
        } else {
            $current_separator = TIME_YEAR;
        }


        $orm = ORM_EXT::for_table("demands_history_exec");
        $orm->table_alias("d_h_e");
        $orm->select_expr("COUNT(`id`)", "count");
        $orm->select("status");

        if ($current_separator == TIME_MONTH) {
            // Месяц
            $orm->select_expr("DATE_FORMAT(`open_time`, '%Y/%m/%d')", "group_time");
            $orm->select_expr("UNIX_TIMESTAMP(DATE_FORMAT(`open_time`, '%Y-%m-%d'))", "time");
            $orm->where_raw("open_time >= DATE_ADD(NOW(), INTERVAL -1 MONTH)");
        } elseif ($current_separator == TIME_YEAR) {
            // Год
            $orm->select_expr("DATE_FORMAT(`open_time`, '%Y/%m')", "group_time");
            $orm->select_expr("UNIX_TIMESTAMP(DATE_FORMAT(`open_time`, '%Y-%m-1'))", "time");
            $orm->where_raw("open_time >= DATE_ADD(NOW(), INTERVAL -1 YEAR)");
        } else {
            // День
            $orm->select_expr("HOUR(`open_time`)", "group_time");
            $orm->select_expr("UNIX_TIMESTAMP(DATE_FORMAT(`open_time`, '%Y-%m-%d %H'))", "time");
            $orm->where_raw("DATE_FORMAT(open_time, '%Y-%m-%d') = CURDATE()");
        }

        $orm->group_by_expr("group_time")->group_by("status");
        $orm->order_by_expr("group_time asc");

        $result = $orm->find_array();

        //print_r($result);
        //exit;


        $ar_status_time = array();

        $ar_sequence = array();
        foreach ($result as $item) {
            $ar_sequence[] = $item["time"];
            $ar_status_time[$item["status"]][$item["time"]] = $item["count"];
        }
        $ar_sequence = array_unique($ar_sequence);
        sort($ar_sequence);

        $data = array();

        foreach ($ar_status_time as $status => $groups) {
            $item = array();
            $item["name"] = m_demands::$ar_status[$status]["name"];

            $ar_counts = array();
            foreach ($ar_sequence as $time) {
                $ar_counts[] = isset($groups[$time])?intval($groups[$time]):null;
            }

            $item["data"] = $ar_counts;
            $item["color"]= "rgb(".cls_tools::get_instance()->hex2rgb(m_demands::$ar_status[$status]["hex_color"]).")";

            $data["series"][] = $item;
        }

        $data["xAxis"]["categories"] = array();
        foreach ($ar_sequence as $time) {
            $data["xAxis"]["categories"][] = $separators[$current_separator]["category"]($time);
        }

        echo json_encode($data);
        exit;
    }


    /**
     * @param int $render
     * @return string
     * @throws Exception
     * @throws SmartyException
     */
    public function display($render = RENDER_DEFAULT)
	{
		return cls_register::get_instance()->smarty->fetch("dashboard/layout.tpl");
	}

    /**
     * @return bool
     */
    public function process()
	{
		$this->get_user_request();

        // Последние новости
        $ar_news = array();
        $ar_news["conditions"]    = array();
        $ar_news["data"]          = m_news::get_instance()->get_array($ar_news["conditions"], 10, 0, array(), $ar_news["total"]);
        cls_register::get_instance()->smarty->assign("ar_news", $ar_news);

        // Новые заявки
        $ar_demands_new = array();
        $ar_demands_new["conditions"]    = array("status"=>m_demands::STATUS_NEW);
        $ar_demands_new["data"]          = m_demands::get_instance()->get_array($ar_demands_new["conditions"], 10, 0, array(), $ar_demands_new["total"]);
        cls_register::get_instance()->smarty->assign("ar_demands_new", $ar_demands_new);

        // Активные заявки
        $ar_demands_member = array();
        $ar_demands_member["conditions"]    = array("mu_eid"=>m_cuser::get_instance()->get("eid"),"status"=>array(m_demands::STATUS_WORK, m_demands::STATUS_NEW, m_demands::STATUS_PAUSE));
        $ar_demands_member["data"]          = m_demands::get_instance()->get_array($ar_demands_member["conditions"], 10, 0, array(), $ar_demands_member["total"]);
        cls_register::get_instance()->smarty->assign("ar_demands_member", $ar_demands_member);

        // Последние события
        $ar_events = array();
        $ar_events["conditions"]    = array("period_start"=>date("Y-m-d", mktime(0, 0, 0, date("m")  , date("d"), date("Y"))-TIME_WEEK));
        $ar_events["data"]          = m_events::get_instance()->get_array($ar_events["conditions"], 10, 0, array(), $ar_events["total"]);
        cls_register::get_instance()->smarty->assign("ar_events", $ar_events);

        //echo ORM_EXT::get_last_query();
        //exit;

		return true;
	}
}