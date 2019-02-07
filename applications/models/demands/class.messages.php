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

class m_demands_messages extends cls_model {
    private static $instance;
    public $sort   = array("dir"=>SORT_ASC_AZ, "by"=>"create_date");

    // private function __construct() { $this->orm_table = substr(__CLASS__, 2); }
    private function __clone() { }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function change_status($message_id, $status) {
        return ORM_EXT::for_table($this->orm_table)->raw_execute("UPDATE ".$this->orm_table." SET status=? WHERE id=?", array($status, $message_id));
    }

    private function find_task_list(&$message) {

        /*<div class="checkbox i-checks">
                    <label>
                        <input type="checkbox" name="mroom_data[rflags][]" {if $mroom_data.rflags & $smarty.const.RM_PROJECTOR}checked{/if} value="{$smarty.const.RM_PROJECTOR}"> {L::forms_labels_mrooms_projector}
                    </label>
                </div>*/


        $message = preg_replace('/<li data-task="([\d]+)">(.*)<\/li>/', '<li data-task="$1" class="checkbox i-checks"><label><input type="checkbox"> $2</label></li>', $message);
    }

    protected function prepare_data(&$data, $detailed = true) {
        $ar_id      = array_keys($data);
        $ar_hash    = array();

        foreach ($ar_id as $id) $ar_hash[] = sha1($id);

        $ar_attach = ORM_EXT::for_table("file_storage")->where_equal("owner", OWNER_DEMAND_MESSAGE)->where_in("owner_hash", $ar_hash)->find_assoc("owner_hash", true);
        $ar_copies = ORM_EXT::for_table("demands_messages_copies")
            ->table_alias("d_m_c")
            ->select("d_m_c.message_id")
            ->left_outer_join("email_addresses", "user_e_a.id = d_m_c.eid", "user_e_a")
            ->left_outer_join("users", "user_e_a.id = users.eid")
            ->select("users.id",          "user_id")
            ->select("user_e_a.email",  "user_email")
            ->select("user_e_a.id",     "user_eid")
            ->select_expr("CONCAT(users.surname, ' ', LEFT(users.name,1 ),'.', IF(users.patronymic<>'', CONCAT(LEFT(users.patronymic, 1),'.'), ''))", "user_short_fio")
            ->select_expr("CONCAT(users.surname, ' ', users.name)", "user_fi")

            ->where_in("d_m_c.message_id", $ar_id)
            ->find_assoc("message_id", true);

        foreach ($data as $id=>&$item) {
            cls_tools::get_instance()->add_img_class_in_content($item["message"]);
            $this->find_task_list($item["message"]);
            $item["ar_attach"] = isset($ar_attach[sha1($id)])?$ar_attach[sha1($id)]:array();
            $item["ar_copies"] = isset($ar_copies[$id])?$ar_copies[$id]:array();
        }
    }

    public function attach($message_id) {
        $ar_attach = (isset($_POST["ar_attach"]) && is_array($_POST["ar_attach"]))?$_POST["ar_attach"]:array();
        if ($ar_attach) {
            foreach ($ar_attach["hash"] as $hash) {
                ORM_EXT::raw_execute("UPDATE file_storage SET owner_hash=?, used=? WHERE used=? AND owner=? AND hash=?", array(sha1($message_id), 1, 0, OWNER_DEMAND_MESSAGE, $hash));
            }
        }
    }

    protected function set_conditions(ORM_EXT &$orm, $ar_conditions) {
        if ($ar_conditions["demand_id"]) {
           $orm->where_equal($this->orm_table.".demand_id", $ar_conditions["demand_id"]);
        }

        if ($ar_conditions["time_old"]) {
            $orm->where_raw("UNIX_TIMESTAMP(".$this->orm_table.".create_date) > ?", array($ar_conditions["time_old"]));
        }

        if ($ar_conditions["noself"]) {
            $orm->where_not_equal($this->orm_table.".from_eid", m_cuser::get_instance()->get("eid"));
        }
    }

    protected function set_select(ORM_EXT &$orm) {
        $orm->select($this->orm_table.".*");
        $orm->select_expr("UNIX_TIMESTAMP(".$this->orm_table.".create_date)", "unix_create_date");

        // От кого
        $orm->left_outer_join("users", $this->orm_table.".from_eid = user_from.eid", "user_from");
        $orm->left_outer_join("email_addresses", "user_from_e_a.id = ".$this->orm_table.".from_eid", "user_from_e_a")
            ->select("user_from_e_a.email",  "user_from_email")
            ->select("user_from_e_a.id",     "user_from_eid");

            m_users::orm_get_user_data($orm, "user_from", "user_from", false);

        // Кому
        $orm->left_outer_join("email_addresses", "user_to_e_a.id = ".$this->orm_table.".to_eid", "user_to_e_a")
            ->left_outer_join("users", "user_to_e_a.id = user_to.eid", "user_to")
            ->select("user_to.id",          "user_to_id")
            ->select("user_to_e_a.email",  "user_to_email")
            ->select("user_to_e_a.id",     "user_to_eid")
            ->select_expr("CONCAT(user_to.surname, ' ', LEFT(user_to.name,1 ),'.', IF(user_to.patronymic<>'', CONCAT(LEFT(user_to.patronymic, 1),'.'), ''))", "user_to_short_fio")
            ->select_expr("CONCAT(user_to.surname, ' ', user_to.name)", "user_to_fi");
    }

    protected function set_save_data(ORM_EXT &$orm, $data) {
        $orm->set("from_eid",      intval($data["from_eid"]));
        $orm->set("from_mb_id",         intval($data["from_mb_id"]));
        $orm->set("title",              trim($data["title"]));
        $orm->set("first",              intval($data["first"]));
        $orm->set("demand_id",          intval($data["demand_id"]));
        $orm->set("to_eid",        intval($data["to_eid"]));

        $orm->set("style",        trim($data["style"]));

        if (extension_loaded('tidy')) {
            $config = array(
                'doctype' => 'strict',
                'fix-uri' => 0,
                'hide-comments' => 1,
                'indent' => 0,
                'indent-spaces' => 0,
                'output-xhtml' => 1,
                'tab-size' => 0,
                'wrap' => 0,
                'wrap-sections' => 0,
                'tidy-mark' => 0,
            );
            $Tidy = new tidy();
            $Tidy->parseString(trim($data["message"]), $config, 'utf8');
            $Tidy->cleanRepair();
            $orm->set("message",            $Tidy->body());
        } else {
            $orm->set("message",            trim($data["message"]));
        }

    }

    private function add_copies($ar_copies, $message_id, $demand_id, $members = false) {
        if (!$ar_copies) {
            return true;
        }

        $ar_sql_insert = $ar_sql_insert_member = array();
        foreach ($ar_copies as $eid) {
            $ar_sql_insert[] = "('".$eid."', '".$message_id."', '".$demand_id."')";
            $ar_sql_insert_member[] = "('".$demand_id."', '".$eid."')";
        }

        $sql = "INSERT INTO demands_messages_copies (eid, message_id, demand_id) VALUES ".implode(",", $ar_sql_insert);
        $result = ORM_EXT::for_table("demands_messages_copies")->raw_execute($sql);

        if ($members) {
            $sql = "INSERT IGNORE INTO demands_members (demand_id, eid) VALUES ".implode(",", $ar_sql_insert_member);
            ORM_EXT::for_table("demands_members")->raw_execute($sql);
        }

        return $result;

    }

    public function save($id = false, $data, $members=false, &$previous_data = false) {
        $message_id = parent::save($id, $data, $previous_data);

        if ($message_id) {
            if ($data["copy_eid"]) {
                $this->add_copies(array_unique($data["copy_eid"]), $message_id, $data["demand_id"], $members);
            }

        }

        return $message_id;
    }

    public function prev($id, $demand_id) {
        $orm = ORM_EXT::for_table($this->orm_table);
        $orm->where_lt("id", $id);
        $orm->where_equal("demand_id", $demand_id);
        $orm->limit(1);
        $orm->order_by_desc("id");

        if ($result = $orm->find_one()) {
            return $result->as_array();
        } else {
            return $result;
        }

    }

}