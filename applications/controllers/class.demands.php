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
 * Class cnt_demands
 */
class cnt_demands extends cls_controllerlist {
    private $cur_category   = false;
    //protected   $LIMIT_LIST   = 1;

    /**
     * @return array
     */
    public function get_actions() {

        $category_id = 0;
        if ($this->cur_category) {
            $category_id = $this->cur_category["id"];
            $category_access    = m_cuser::get_instance()->check_access_category($category_id, m_roles::CRUD_C);
        } else {
            $category_access    = true;
        }

        $module_access      = m_cuser::get_instance()->check_access_module($this->module_id, m_roles::CRUD_C);

        $result = array();
        if ($module_access && $category_access) {
            $result[] = array("name"=>"<span class='hidden-xs'>".L::actions_add."</span>", "icon"=>"plus", "href"=>$this->module_info["alias"]."/create/".(($category_id)?"?demand_data[cat_id]=".$category_id:""));
        }

        $url_query = "";
        if ($this->user_request["conditions"]) {
            $action_search["type"] = "success";
            $url_query.= "?".http_build_query(array("cnd"=>$this->user_request["conditions"]));
        }

        if ($this->user_request["sort"]) {
            $divider = ($this->user_request["conditions"])?"&":"?";
            $url_query.= $divider.http_build_query(array("sort"=>$this->user_request["sort"]));
        }

        if ($this->total) {
            $result[] = array("name" => "<span class='hidden-xs'>Изменить</span>", "icon" => "pencil", "href" => "demands/massedit/".$url_query, "modal" => true);
        }

        return $result;
    }

    /**
     * @return array
     */
    protected function get_layout() {
        $result = parent::get_layout(true);

        $result["east"]["childOptions"]["north"]        = array("size"=>"51", "showOverflowOnHover"=>true, "spacing_open"=>0, "initHidden"=>true);

        return $result;
    }

    /**
     * @return array
     */
    public function get_info() {
        $result = parent::get_info();

        $action_search = array("name"=>L::actions_search, "icon"=>"search", "href"=>"demands/search/", "modal"=>true);

        if ($this->user_request["conditions"]) {
            $action_search["type"] = "success";
            $action_search["href"].= "?".http_build_query(array("cnd"=>$this->user_request["conditions"]));
            if ($this->user_request["sort"]) {
                $action_search["href"].= "&".http_build_query(array("sort"=>$this->user_request["sort"]));
            }
        }

        $result["actions"][] = $action_search;

        $result["layout"]["stateManagement__includeChildren"] = false;


        if ($this->cur_category) {
            $ar_access_line_categories = cls_register::get_instance()->get("ar_access_line_categories");

            foreach ($this->cur_category["ar_parents"] as $cat_id) {
                $result["path"][] = array("icon"=>$ar_access_line_categories[$cat_id]["icon"], "title"=>$ar_access_line_categories[$cat_id]["name"], "url"=>"demands/?cnd[cat_id]=".$cat_id, "muted"=>isset($ar_access_line_categories[$cat_id]["visible_only"]));
            }
            $result["path"][] = array("icon"=>$this->cur_category["icon"], "title"=>$this->cur_category["name"], "url"=>"demands/?cnd[cat_id]=".$this->cur_category["id"], "muted"=>isset($this->cur_category["visible_only"]));
        }

        //$result["ar_sort"] = $this->ar_sort;

        return $result;
    }

    /**
     * @param $branch
     */
    public function __action_branch_update_orders($branch) {

        $json = isset($_POST["json"])?$_POST["json"]:false;
        $orders = cls_tools::get_instance()->flatten_json_tree($json);

        $result["status"] = ($this->model->branch_update_orders($branch,$orders))?STATUS_OK:STATUS_BAD_REQUEST;

        echo json_encode($result);
        exit();
    }

    /**
     * @param $id
     * @return bool
     */
    private function get_category($id) {

        $ar_access_line_categories = cls_register::get_instance()->get("ar_access_line_categories");

        if ($cur_area = $ar_access_line_categories[$id]) {
            $cur_area["ar_parents"] = m_categories::get_instance()->get_category_parents($cur_area["id"], $ar_access_line_categories);
            $cur_area["ar_children"] = m_categories::get_instance()->get_category_children($cur_area["id"], cls_register::get_instance()->get("ar_access_tree_categories"));

            return $cur_area;
        }

        return false;
    }

    public function get_user_request() {
        parent::get_user_request();

        if (isset($this->user_request["conditions"]["cat_id"]) && !is_array($this->user_request["conditions"]["cat_id"])) {
            $this->cur_category = $this->get_category($this->user_request["conditions"]["cat_id"]);

            cls_register::get_instance()->smarty->assign("cur_category", $this->cur_category);

            if ($this->cur_category["ar_children"]) {
                $this->user_request["conditions"]["cat_id"] = array(0=>$this->user_request["conditions"]["cat_id"]);
                $this->user_request["conditions"]["cat_id"] = array_merge($this->user_request["conditions"]["cat_id"], $this->cur_category["ar_children"]);

                // Убираем из условий недоступные категории для пользователя
                $access_categories = array_keys(m_cuser::get_instance()->get("crud_categories"));
                $this->user_request["conditions"]["cat_id"] = array_intersect($this->user_request["conditions"]["cat_id"], $access_categories);
            }
        }

        if (m_cuser::get_instance()->access_data["filter"]) {
            $this->user_request["conditions"] = cls_tools::get_instance()->sync_array($this->user_request["conditions"], m_cuser::get_instance()->access_data["filter_data"]);
        }

        //m_demands::get_instance()->convert_const_variables($this->user_request["conditions"]);

        $conditions_decode = $this->model->conditions_decode($this->user_request["conditions"]);
        cls_register::get_instance()->smarty->assign("conditions_decode", $conditions_decode);
    }

    /**
     * @return array
     */
    private function get_qf_types() {
        // Считаем сколько количество типов заявок

        $ar_filters = array();

        $global_ar_demands_types = cls_register::get_instance()->get("global_ar_demands_types");
        $conditions = $this->user_request["conditions"];
        unset($conditions["type_id"]);

        $ar_quick_filters = array();
        $ar_quick_filters[0] = array("name"=>"Типы заявок");
        $ar_types_count = m_demands::get_instance()->count($conditions, "type_id");
        foreach ($ar_types_count as $type_id => $count) {
            $type = $global_ar_demands_types[$type_id];
            $conditions = $this->user_request["conditions"];
            $conditions["type_id"] = array($type_id);
            $ar_filters[] = array("name"=>$type["name"], "type"=>$type["type"], "link"=>"demands/?".http_build_query(array("cnd"=>$conditions)), "count"=>$count);
        }

        return $ar_filters;
    }

    /**
     * @return array
     */
    private function get_qf_status() {
        // Считаем сколько количество статусов заявок

        $ar_filters = array();

        $global_ar_demands_statuses = m_demands::$ar_status;
        $conditions = $this->user_request["conditions"];
        unset($conditions["status"]);

        $ar_statuses_count = m_demands::get_instance()->count($conditions, "status");
        foreach ($ar_statuses_count as $status_id => $count) {
            $status = $global_ar_demands_statuses[$status_id];
            $conditions = $this->user_request["conditions"];
            $conditions["status"] = array($status_id);
            $ar_filters[] = array("name"=>$status["name"], "type"=>$status["color"], "link"=>"demands/?".http_build_query(array("cnd"=>$conditions)), "count"=>$count);
        }

        return $ar_filters;
    }


    /**
     * @return bool|void
     */
    public function process()
	{
        $result = parent::process();

        $ar_quick_filters = array();

        if ($ar_qf_types = $this->get_qf_types()) {
            $ar_quick_filters[] = array("name"=>"Типы заявок", "filters"=>$ar_qf_types);
        }

        if ($ar_qf_status = $this->get_qf_status()) {
            $ar_quick_filters[] = array("name"=>"Статусы", "filters"=>$ar_qf_status);
        }

        cls_register::get_instance()->smarty->assign("ar_quick_filters", $ar_quick_filters);

        return $result;
	}
}
