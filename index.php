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

/*
 * Интраворк.ру | http://www.intrawork.ru
 * Права защищены 2013-2014 Исходный код  | http://www.src-code.ru
 * Сделано в России!
 *
 * index.php - главный файл
 * Этот файл является частью проекта Интраворк.ру
 */

include "bootstrap.php";
include "connect_db.php";

include "classes/optimize-2.3.4/optimize.php";
include "classes/smarty/Smarty.class.php";

$smarty = new Smarty();
$smarty->setTemplateDir(SMARTY_TPL_DIR);
$smarty->setCompileDir(SMARTY_TPL_COMPILE_DIR);
$smarty->setCacheDir(SMARTY_TPL_CACHE_DIR);
$smarty->compile_check = SMARTY_COMPILE_CHECK;

if (defined("SMARTY_FORCE_COMPILE")) {
    $smarty->force_compile = SMARTY_FORCE_COMPILE;
}

$smarty->assign("config", config::get_instance());

cls_register::get_instance()->smarty = $smarty;


class cnt_ext_front extends cnt_front
{

    public function get_access_categories(&$cuser_data)
    {

        // Все достпуные категории
        $access_categories_id = array_keys(m_cuser::get_instance()->get("crud_categories"));

        // Категории - линейный список категорий с дополненными родителями
        $ar_access_line_categories = m_categories::get_instance()->get_array(array("id" => m_cuser::get_instance()->get("ar_access_visible_categories_id")), false);
        foreach ($ar_access_line_categories as $cat_id => $value) {
            if ($cat_id && !in_array($cat_id, $access_categories_id)) {
                $ar_access_line_categories[ $cat_id ]["visible_only"] = true;
            }
        }
        $cuser_data["ar_access_line_categories"] = $ar_access_line_categories;

        // Категории - древовидный список
        $cuser_data["ar_access_tree_categories"] = cls_tools::get_instance()->map_tree($ar_access_line_categories);

    }


    function register_global_data()
    {
        if (m_cuser::get_instance()->is_login()) {

            $cuser_data = $_SESSION[ CUSER_SESSION_KEY ];

            $this->get_access_categories($cuser_data);

            // Фильтры
            $ar_filters = m_demands_filters::get_instance()->get_array(array(), false);
            $cuser_data["ar_filters"] = $ar_filters;

            // Активные заявки
            $ar_demands_member = array();
            $ar_demands_member["conditions"]    = array("mu_eid" => m_cuser::get_instance()->get("eid"), "status" => array(m_demands::STATUS_WORK, m_demands::STATUS_NEW, m_demands::STATUS_PAUSE));
            $ar_demands_member["sort"]          = array("dir" => SORT_DSC_ZA, "by" => "work_activity_date");
            $ar_demands_member["data"]          = m_demands::get_instance()->get_array($ar_demands_member["conditions"], 5, 0, $ar_demands_member["sort"], $ar_demands_member["total"], false);

            $cuser_data["ar_demands_member"] = $ar_demands_member;

            cls_register::get_instance()->set("ar_access_line_categories", $cuser_data["ar_access_line_categories"]);
            cls_register::get_instance()->set("ar_access_tree_categories", $cuser_data["ar_access_tree_categories"]);

            cls_register::get_instance()->smarty->assign("cuser_data", $cuser_data);

            // Типы заявок глобальный массив
            $dt_total = false;
            $global_ar_demands_types = m_demands_types::get_instance()->get_array(null, null, null, array("by" => "default", "dir" => SORT_DSC_ZA), $dt_total, false);
            cls_register::get_instance()->smarty->assign("global_ar_demands_types", $global_ar_demands_types);
            cls_register::get_instance()->set("global_ar_demands_types", $global_ar_demands_types);

            // Типы контактов
            $global_ar_contacts_types = m_contacts_types::get_instance()->get_array(array(), false);
            cls_register::get_instance()->smarty->assign("global_ar_contacts_types", $global_ar_contacts_types);

        }

        cls_register::get_instance()->smarty->assign("current_url_path", cls_tools::get_instance()->get_current_url(true));
    }

    function __action_toggle_superadmin()
    {
        if (m_cuser::get_instance()->get("super_admin")) {

            if (isset($_SESSION[ CUSER_SESSION_KEY ]["super_admin_mode"])) {
                unset($_SESSION[ CUSER_SESSION_KEY ]["super_admin_mode"]);
            } else {
                $_SESSION[ CUSER_SESSION_KEY ]["super_admin_mode"] = true;
            }

            m_cuser::get_instance()->refresh(true);
        }

        header("location: /");
        exit;
    }

    function __action_get_counters()
    {
        $result = array();

        $cnd_status = array("status" => array(m_demands::STATUS_WORK, m_demands::STATUS_NEW, m_demands::STATUS_PAUSE));

        $result["my_dd_executor"]       = m_demands::get_instance()->count(array_merge($cnd_status, array("eu_eid" => m_cuser::get_instance()->get("id"))));
        $result["my_dd_customer"]       = m_demands::get_instance()->count(array_merge($cnd_status, array("cu_eid" => m_cuser::get_instance()->get("id"))));
        $result["my_dd_responsible"]    = m_demands::get_instance()->count(array_merge($cnd_status, array("ru_eid" => m_cuser::get_instance()->get("id"))));
        $result["my_dd_member"]         = m_demands::get_instance()->count(array_merge($cnd_status, array("mu_eid" => m_cuser::get_instance()->get("id"))));
        $result["dd_actual"]            = m_demands::get_instance()->count(array_merge($cnd_status));

        $dd_criticality = m_demands::get_instance()->count(array_merge($cnd_status, array("mu_eid" => m_cuser::get_instance()->get("id"))), "criticality");
        foreach (m_demands::$ar_criticality as $criticality_id => $criticality) {
            $result[ "my_dd_criticality_" . $criticality_id ] = isset($dd_criticality[ $criticality_id ]) ? $dd_criticality[ $criticality_id ] : 0;
        }

        $dd_type = m_demands::get_instance()->count($cnd_status, "type_id");
        $ar_types = cls_register::get_instance()->get("global_ar_demands_types");
        foreach ($ar_types as $type_id => $type) {
            $result[ "dd_type_" . $type_id ] = isset($dd_type[ $type_id ]) ? $dd_type[ $type_id ] : 0;
        }

        $result["my_favorites"] = m_favorites::get_instance()->count();

        // TODO
        //$todo_not_complete = m_todo::get_instance()->count(array("user_id"=>m_cuser::get_instance()->get("id"), "status"=>0, "demand_id"=>0));
        //$cuser_data["todo"]["counts"]["not_complete"] = $todo_not_complete;
        $result["my_todo_not_complete"] = m_todo::get_instance()->count(array("user_id" => m_cuser::get_instance()->get("id"), "status" => 0, "demand_id" => 0));


        echo json_encode($result);
        exit();

    }

    function get_important_news()
    {

        $ar_imp_news = m_news::get_instance()->get_array(array("not_view" => true));
        cls_register::get_instance()->smarty->assign("ar_imp_news", array_values($ar_imp_news));

    }

    function process()
    {
        $this->register_global_data();

        if (m_cuser::get_instance()->is_login()) {
            ORM_EXT::raw_execute("SET @USER_ID=?", array(m_cuser::get_instance()->get("id")));
            ORM_EXT::raw_execute("SET @USER_EID=?", array(m_cuser::get_instance()->get("eid")));
            $this->get_important_news();
        }

        cls_register::get_instance()->smarty->assign("cache_rand", time());
        parent::process();

        if (m_cuser::get_instance()->is_login()) {
            m_cuser::get_instance()->activity();
        }

    }
}

$start_time = cls_tools::get_instance()->get_microtime();

$_core = new cnt_ext_front();
$_core->process();

$end_time = cls_tools::get_instance()->get_microtime();

/*
* Сбор данных о выполнении для dev
*/

if (config()->dev_mode) {
    cls_register::get_instance()->smarty->assign("exec_time", $end_time - $start_time);
    cls_register::get_instance()->smarty->assign("exec_query_time", ORM_EXT::$all_query_time);
    cls_register::get_instance()->smarty->assign("exec_php_time", ($end_time - $start_time) - ORM_EXT::$all_query_time);

    cls_register::get_instance()->smarty->assign("query_count", ORM_EXT::$query_count);
    cls_register::get_instance()->smarty->assign("query_time", ORM_EXT::$query_time);
    cls_register::get_instance()->smarty->assign("affected_rows", ORM_EXT::$affected_rows);

    require_once('classes/sql_formatter/sql_formatter.php');

    cls_register::get_instance()->smarty->assign("ar_query", ORM_EXT::get_query_log());
    cls_register::get_instance()->smarty->assign("ar_query_time", ORM_EXT::$ar_query_time);
}

echo $_core->display();