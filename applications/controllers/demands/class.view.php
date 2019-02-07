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
 * Class cnt_demands_view
 */
class cnt_demands_view extends cls_controllerview {
	//private $user_request;
	//private $validate_result = true;
    private $cur_category   = false;
    private $readonly       = false;
    private $ar_branch      = array();

    /**
     * @return array
     */
    public function get_actions() {
        //$result = parent::get_actions();

        $result = array();

        parent::get_favorite_action($result);

        if ($this->data) {
            $module_access      = m_cuser::get_instance()->check_access_module($this->module_id, m_roles::CRUD_U);
            if (!$this->readonly && $module_access) {
                $result[] = array("name"=>'<span class="hidden-xs">'.L::text_setup.'</span>', "modal"=>true, "icon"=>"cog", "href"=>$this->model->get_table_name()."/tuning/".$this->data["id"]."/");
                $result[] = array("name"=>'<span class="hidden-xs">'.L::actions_join.'</span>', "icon"=>"share-alt", "href"=>$this->model->get_table_name()."/join/".$this->data["id"]."/");
            }
        }
        $result[] = array("name"=>'<span class="hidden-xs">'.L::text_downwards.'</span>', "icon"=>"long-arrow-down", "class"=>"scroll-to-down", "href"=>"#");

        return $result;
    }

    /**
     * @param $demand
     * @return string
     */
    private function get_demand_title($demand) {
        $ar_part = array();
        //$ar_part[] = cls_tools::get_instance()->mb_ucfirst($this->module_info["morph"][0]);
        $ar_part[] = cls_tools::get_instance()->mb_ucfirst($this->data["type_name"]);
        $ar_part[] = "<span class='text-success'>№</span><span class='text-success'>".$demand["id"]."</span>";

        $value = $this->data["criticality"];
        $ar_part[] = "<i class='fa text-".m_demands::$ar_criticality[$value]["color"]." fa-".m_demands::$ar_criticality[$value]["icon"]."' title='".m_demands::$ar_criticality[$value]["name"]."'></i>";
        
        $ar_part[] = "&laquo;" . $demand[$this->model->master_field] . "&raquo;";
        return  implode(" ", $ar_part);
    }

    /**
     * @return array
     */
    public function get_info() {

        $result = parent::get_info();

        if ($this->data["id"]) {
            $result["meta_title"] = $this->get_demand_title($this->data);
        }

        if ($this->data) {
            $center__childOptions = array("name" => "middle_layout");
            $center__childOptions["north"] = array("size" => "51", "showOverflowOnHover" => true, "spacing_open" => 0);
            $center__childOptions["south"] = array("size" => "250", "minSize" => '200', "initHidden" => true, "showOverflowOnHover"=>true);

            $result["layout"]["center"]["childOptions"]["center"]["childOptions"] = $center__childOptions;
        }

        if ($this->cur_category) {
            $ar_access_line_categories = cls_register::get_instance()->get("ar_access_line_categories");

            foreach ($this->cur_category["ar_parents"] as $cat_id) {
                $result["path"][] = array("icon"=>$ar_access_line_categories[$cat_id]["icon"], "title"=>$ar_access_line_categories[$cat_id]["name"], "url"=>"demands/?cnd[cat_id]=".$cat_id, "muted"=>isset($ar_access_line_categories[$cat_id]["visible_only"]));
            }
            $result["path"][] = array("icon"=>$this->cur_category["icon"], "title"=>$this->cur_category["name"], "url"=>"demands/?cnd[cat_id]=".$this->cur_category["id"], "muted"=>isset($this->cur_category["visible_only"]));
        }

        if ($this->ar_branch) {
            $ar_branch_parents = cls_tools::get_instance()->map_tree_parents($this->data["id"], $this->ar_branch);

            foreach ($ar_branch_parents as $demand_id) {
                $demand = $this->ar_branch[$demand_id];
                $result["path"][] = array("icon"=>"fa-".m_demands::$ar_status[$demand["status"]]["icon"], "title"=>$this->get_demand_title($demand), "url"=>"demands/view/".$demand_id."/");
            }
        }

        return $result;
    }

    /**
     * @param $demand_id
     * @throws Exception
     * @throws SmartyException
     */
    public function __action_get_new_message($demand_id) {
        $result["status"] = STATUS_BAD_REQUEST;

        $time = (isset($_GET["time"]) && intval($_GET["time"]))?$_GET["time"]:time();

        //exit;

        if ($time && $demand_id) {

            //set_time_limit(0);

            while (true) {

                $result["status"]   = STATUS_OK;

                $conditions = array();
                $conditions["demand_id"]    = $demand_id;
                $conditions["time_old"]     = $time;
                $conditions["noself"]       = true;

                $ar_message = m_demands_messages::get_instance()->get_array($conditions, false);

                if ($ar_message) {
                    foreach ($ar_message as $message) {
                        cls_register::get_instance()->smarty->assign("message", $message);
                        $item = array();
                        $item["from"]  = $message["user_from_id"]?$message["user_from_short_fio"]:$message["user_from_email"];
                        $item["text"]    = cls_tools::get_instance()->truncate(strip_tags($message["message"]),64);
                        $item["html"]       = cls_register::get_instance()->smarty->fetch("demands/view/messages/item.tpl");
                        $result["data"][]   = $item;
                        $result["time"]     = $message["unix_create_date"];
                    }
                    break;
                } else {
                    $result["time"]     = $time;
                    //sleep(1);
                    //time_sleep_until(time()+TIME_MIN);
                    break;
                }
            }
        }

        echo json_encode($result);
        exit();


    }

    /**
     * @param $demand_id
     */
    public function __action_toggle_tracking($demand_id) {
        $result["status"] = STATUS_BAD_REQUEST;
        if (m_demands_members::get_instance()->toggle_tracking($demand_id, m_cuser::get_instance()->get("eid"))) {
            $result["status"] = STATUS_OK;
        }

        echo json_encode($result);
        exit();
    }

    /**
     * @param $demand_id
     */
    public function __action_add_member($demand_id) {
        $invite_data = isset($_GET["invite_data"])?$_GET["invite_data"]:array();
        $ar_user_eid = isset($invite_data["user_eid"])?$invite_data["user_eid"]:array();

        $result["status"] = STATUS_BAD_REQUEST;

        $count = 0;
        foreach ($ar_user_eid as $user_eid) {
            $data = array();
            $data["demand_id"] = $demand_id;
            $data["eid"] = $user_eid;

            if ($user_eid && m_demands_members::get_instance()->save(0, $data)) {
                $result["status"] = STATUS_OK;
                $count++;
            }
        }

        $result["count"] = $count;

        echo json_encode($result);
        exit();
    }

    /**
     * @param $demand_id
     * @throws Exception
     * @throws SmartyException
     */
    public function __action_add_message($demand_id) {

        $demand_data = m_demands::get_instance()->get_one($demand_id);

        $data = isset($_POST["message_data"])?$_POST["message_data"]:false;
        $data["from_eid"]  = m_cuser::get_instance()->get("eid");
        $data["from_mb_id"]     = $demand_data["mb_id"];
        if (!isset($data["title"])) {
            $data["title"] = $demand_data["title"];
        }

        $result["status"] = STATUS_BAD_REQUEST;

        if ($message_id = m_demands_messages::get_instance()->save(false, $data)) {

            m_demands_messages::get_instance()->attach($message_id);

            $message_data = m_demands_messages::get_instance()->get_one($message_id);
            cls_register::get_instance()->smarty->assign("message", $message_data);
            cls_mailman::get_instance()->demand_message($demand_id, $message_data, $demand_data["cat_id"]);

            $result["data"] = cls_register::get_instance()->smarty->fetch("demands/view/messages/item.tpl");
            $result["status"] = STATUS_OK;
        }

        echo json_encode($result);
        exit();
    }

    /**
     * @param $demand_id
     * @throws Exception
     * @throws SmartyException
     */
    public function __action_get_history($demand_id) {

        $ar_conditions = array("demand_id"=>$demand_id);
        $ar_history = m_demands_history::get_instance()->get_array($ar_conditions);
        cls_register::get_instance()->smarty->assign("ar_history", $ar_history);

        $result["data"] = cls_register::get_instance()->smarty->fetch("demands/view/history/list.tpl");
        $result["status"] = STATUS_OK;

        echo json_encode($result);
        exit();
    }

    /**
     * @param $demand_id
     */
    public function __action_status_message($demand_id) {

        $message_id = isset($_POST["message_id"])?intval($_POST["message_id"]):0;
        $status = isset($_POST["status"])?intval($_POST["status"]):0;

        $result["status"] = STATUS_BAD_REQUEST;

        $demand_data = m_demands::get_instance()->get_one($demand_id);

        if ($demand_data) { // Добавить проверку, можно ли менять статус
            if (m_demands_messages::get_instance()->change_status($message_id, $status)) {
                $result["status"] = STATUS_OK;
            }
        }

        echo json_encode($result);
        exit();
    }

    /**
     * @param $demand_id
     * @throws Exception
     * @throws SmartyException
     */
    public function __action_get_members($demand_id) {

        $demand_data = m_demands::get_instance()->get_one($demand_id);

        $ar_conditions = array("demand_id"=>$demand_id);
        $ar_members = m_demands_members::get_instance()->get_array($ar_conditions, false);
        cls_register::get_instance()->smarty->assign("ar_members", $ar_members);
        cls_register::get_instance()->smarty->assign("demand_data", $demand_data);

        // Все пользователи
        // TODO: сделать автокомплит по пользователям, ни к чему таскать постоянно данные

        $ar_conditions      = array();
        $ar_users           = m_users::get_instance()->get_array($ar_conditions, false, 0, array("by"=>"dprt_id", "dir"=>SORT_ASC_AZ));
        cls_register::get_instance()->smarty->assign("ar_users", $ar_users);

        $result["data"] = cls_register::get_instance()->smarty->fetch("demands/view/members/list.tpl");
        $result["status"] = STATUS_OK;

        echo json_encode($result);
        exit();
    }

    /**
     * @param $demand_id
     */
    public function __action_get_members_option($demand_id) {

        $demand_data = m_demands::get_instance()->get_one($demand_id);

        $ar_conditions = array("demand_id"=>$demand_id/*, "except"=>array(m_cuser::get_instance()->get("eid"))*/);
        $ar_members = m_demands_members::get_instance()->get_array($ar_conditions, false);

        $ar_members_groups = array();
        $ar_members_groups[1] = L::members_customer;
        $ar_members_groups[2] = L::members_eu_plural;
        $ar_members_groups[3] = L::members_responsible;
        $ar_members_groups[4] = L::members_member_plural;
        $ar_members_groups[5] = L::members_observer_plural;

        $option_group = array();

        foreach ($ar_members as $member) {
            $ar_group = array();

            if (in_array($member["eid"], array($demand_data["cu_eid"], $demand_data["eu_eid"], $demand_data["ru_eid"]))) {
                if ($demand_data["cu_eid"] == $member["eid"]) {
                    $ar_group[] = 1;
                }
                if ($demand_data["eu_eid"] == $member["eid"]) {
                    $ar_group[] = 2;
                }
                if ($demand_data["ru_eid"] == $member["eid"]) {
                    $ar_group[] = 3;
                }
            } elseif ($member["exec_time"]) {
                $ar_group[] = 4;
            } else {
                $ar_group[] = 5;
            }

            //foreach($ar_group as $group) {
                $selected = "";
                if (m_cuser::get_instance()->get("eid") == $demand_data["cu_eid"] && in_array(2, $ar_group)) {
                    $selected = "selected";
                } elseif (m_cuser::get_instance()->get("eid") == $demand_data["eu_eid"] && in_array(1, $ar_group)) {
                    $selected = "selected";
                }

                $option_group[implode(",",$ar_group)][$member["eid"]]='<option '.$selected.' value="'.$member["eid"].'">'.(($member["user_short_fio"])?$member["user_short_fio"]:$member["user_email"]).'</option>';
            //}
        }

        ksort($option_group);

        //var_dump($option_group);
        //exit;

        $buffer = "";
        foreach ($option_group as $group => $options) {
            $groups = explode(",", $group);
            $groups_names = array();
            foreach ($groups as $group_id) $groups_names[] = $ar_members_groups[$group_id];
            $buffer.='<optgroup data-group="'.$group.'" label="'.implode(", ", $groups_names).'">';
            $buffer.=implode(PHP_EOL,$options);
            $buffer.="</optgroup>";
        }

        //var_dump($buffer);
        //exit;

        $result["data"] = $buffer;
        $result["status"] = STATUS_OK;

        echo json_encode($result);
        exit();
    }


    /**
     * @param int $render
     * @return string
     * @throws Exception
     * @throws SmartyException
     */
    public function display($render = RENDER_DEFAULT) {
        $result = parent::display($render);

        if ($render == RENDER_JSON) {
            $result["navbar_actions"]   = cls_register::get_instance()->smarty->fetch("demands/view/navbar_actions.tpl");
            $result["readonly"] = $this->readonly;

            //$result["message_form"]     = cls_register::get_instance()->smarty->fetch("demands/view/message_form_pane.tpl");
        }

        return $result;
    }

    /**
     * @param $id
     * @return bool
     */
    private function get_category($id) {
        $ar_access_line_categories = cls_register::get_instance()->get("ar_access_line_categories");

        if ($cur_area = $ar_access_line_categories[$id]) {
            $cur_area["ar_parents"] = m_categories::get_instance()->get_category_parents($cur_area["id"], cls_register::get_instance()->get("ar_access_line_categories"));
            return $cur_area;
        }

        return false;
    }

    /**
     * @return int
     */
    function get_complete_in_branch() {
        $count = 0;
        foreach($this->ar_branch as $branch) {
            if ($branch["status"] == m_demands::STATUS_COMPLETE) $count++;
        }
        return $count;
    }

    /**
     * @param bool $id
     * @return bool
     */
    public function process($id = false)
    {
        parent::process($id);

        if (isset($this->data["id"])) {

            $cuser_data = m_cuser::get_instance()->get_data();
            if ($cuser_data["access_data"]["limited_setting"]) {
                $this->readonly    = true;
            }

            if (isset($this->data["cat_id"])) {
                $this->cur_category = $this->get_category($this->data["cat_id"]);
                cls_register::get_instance()->smarty->assign("cur_category", $this->cur_category);

                $category_id = $this->data["cat_id"];
                if (!m_cuser::get_instance()->check_access_category($category_id, m_roles::CRUD_U)) {
                    $this->readonly    = true;
                }
            }

            $ar_todo = array();
            $ar_todo["conditions"] =  array("demand_id"=>$this->data["id"]);
            $ar_todo["total"] = 0;
            $ar_todo["data"] = m_todo::get_instance()->get_array($ar_todo["conditions"], false,0,array(), $ar_todo["total"]);
            $ar_todo["complete"] = m_todo::get_instance()->count(array_merge($ar_todo["conditions"], array("status"=>1)));
            cls_register::get_instance()->smarty->assign("ar_todo", $ar_todo);

            // Доступные статусы по типу заявки
            $ar_type_current_ts = m_demands_types::get_instance()->get_type_ts($this->data["type_id"], $this->data["status"]);
            cls_register::get_instance()->smarty->assign("ar_type_current_ts", $ar_type_current_ts);

            //var_dump($ar_todo);
            //exit;

            $this->ar_branch = m_demands::get_instance()->get_branch($this->data["branch"]);
            cls_register::get_instance()->smarty->assign("ar_branch_tree", cls_tools::get_instance()->map_tree($this->ar_branch));
            cls_register::get_instance()->smarty->assign("branch_size", sizeof($this->ar_branch));
            cls_register::get_instance()->smarty->assign("branch_complete", $this->get_complete_in_branch());

            $ar_conditions = array("demand_id"=>$this->user_request["id"]);
            $ar_messages = m_demands_messages::get_instance()->get_array($ar_conditions, false);
            cls_register::get_instance()->smarty->assign("ar_messages", $ar_messages);

            /*$ar_history_exec = m_demands_history_exec::get_instance()->get_array($ar_conditions, false);
            $ar_history = m_demands_history::get_instance()->get_array($ar_conditions);
            var_dump($ar_history);
            exit;*/

        }

        cls_register::get_instance()->smarty->assign("readonly", $this->readonly);

		return true;
	}
}


?>