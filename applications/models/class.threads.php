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

class m_threads {
    private static $instance;

    private function __construct()
    {
    }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new m_threads();
        }
        return self::$instance;
    }


    public function get_thread($user_id)
    {
        $orm = ORM_EXT::for_table("thread_union");
        $orm->table_alias("th_u");
        $orm->select("th.id");
        $orm->select("th.cdate");
		$orm->select("u_r.name",    "rcpt_name");
        $orm->select("u_r.id",      "rcpt_id");
		$orm->select("u_s.name",    "sender_name");
        $orm->select("u_s.id",      "sender_id");

        $orm->select_expr("IF ($user_id = th.sender_id, u_r.name, u_s.name)", "real_recipient_name");
		$orm->select_expr("IF ($user_id = th.sender_id, th.recipient_id, th.sender_id)", "real_recipient_id");
        $orm->select_expr("(SELECT COUNT(th_m_u.id) FROM thread_messages_union th_m_u WHERE th_m_u.thread_id = th.id AND th_m_u.user_id = $user_id AND th_m_u.read = 0)", "nm_count");

        $orm->left_outer_join("thread", "th.id = th_u.thread_id", "th");
        $orm->left_outer_join("users", "th.recipient_id = u_r.id", "u_r");
        $orm->left_outer_join("users", "th.sender_id = u_s.id", "u_s");

        $orm->where_equal("th_u.user_id", $user_id);

        $orm->order_by_desc("th.udate");

        return $orm->find_array();
    }

    public function add_thread($sender_id, $rcpt_id)
    {
        $data["cdate"] = $data["udate"] = time();
        $data["sender_id"]      = $sender_id;
        $data["recipient_id"]   = $rcpt_id;

        $orm = ORM_EXT::for_table("thread");
        $orm->create($data)->save();

        $thread_id = $orm->id();

        ORM_EXT::for_table("thread_union")->create(array("thread_id"=>$thread_id, "user_id"=>$rcpt_id))->save();
        ORM_EXT::for_table("thread_union")->create(array("thread_id"=>$thread_id, "user_id"=>$sender_id))->save();

        return $thread_id;
    }

    public function add_message($user_id, $rcpt_id, $thread_id, $message, $first = false)
    {
        $data["cdate"]      = time();
        $data["thread_id"]  = $thread_id;
        $data["user_id"]    = $user_id;
        $data["message"]    = htmlentities($message, ENT_QUOTES, 'UTF-8');

        $orm = ORM_EXT::for_table("thread_messages");
        $orm->create($data);
        $orm->save();

        $message_id = $orm->id();

        $orm = ORM_EXT::for_table("thread_messages_union");
        $orm->create(array("thread_id"=>$thread_id, "user_id"=>$rcpt_id, "message_id"=>$message_id, "read"=>0))->save();
        $orm->create(array("thread_id"=>$thread_id, "user_id"=>$user_id, "message_id"=>$message_id, "read"=>1))->save();

        $union_id = $orm->id();

        ORM_EXT::for_table("thread")->find_one($thread_id)->set("udate", time())->save();

        if (!$first) {

            // Проверить наличие связи для адресата, если нет, то создать!!!

            $thread_rcpt_union = ORM_EXT::for_table("thread_union")->where_equal("user_id", $rcpt_id)->count("id");

            if (!$thread_rcpt_union) {
                ORM_EXT::for_table("thread_union")->create(array("thread_id"=>$thread_id, "user_id"=>$rcpt_id))->save();
            }
        }

        return $union_id;
    }

    public function get_new_msg_count()
    {
        $user_id = cls_users::get_instance()->get("id");
        return ORM_EXT::for_table("thread_messages_union")->table_alias("th_m_u")->where_equal("th_m_u.user_id", $user_id)->where_equal("read", 0)->count("id");
    }

    public function get_messages($user_id, $thread_id, $new_only, $user_id, $offset, $limit, $ar_id_notice, &$count = false)
    {
        $orm = ORM_EXT::for_table("thread_messages_union");
        $orm->table_alias("th_m_u");

        $orm->select("th_m_u.id")
            ->select("th_m.message")
            ->select("th_m_u.read")
            ->select("th_m_u.thread_id")
            ->select("th_m.cdate")
            ->select("u.name", "sender_name")
            ->select("u.id", "sender_id")
            ->select("u.avatar", "sender_avatar")
            ->select_expr("th_m.cdate", "cdate_ts");

        $orm->left_outer_join("thread_messages", "th_m.id = th_m_u.message_id", "th_m")
            ->left_outer_join("users", "u.id = th_m.user_id", "u");


        if ($new_only) {
            $orm->where_equal("read", 0);
        }

        if ($thread_id) {
            $orm->where_equal("th_m_u.thread_id", $thread_id);
        }

        if ($new_only && sizeof($ar_id_notice)) {
            $orm->where_not_in("th_m_u.id", $ar_id_notice);
        }

        $orm->where_equal("th_m_u.user_id", $user_id);

        if ($count !== false) {
            $count_orm = clone $orm;
            $count = $count_orm->count();
        }

        if ($offset)    $orm->offset($offset);
        if ($limit)     $orm->limit($limit);

        $orm->order_by_desc("th_m.cdate");

        $result = $orm->find_array();

        if ($offset == 0) krsort($result);

        return $result;
    }

    public function read($ar_id, $min_ts) {
        $sql = "UPDATE
            thread_messages_union th_m_u
            LEFT JOIN thread_messages th_m ON (th_m.thread_id = th_m_u.thread_id)
        SET
            th_m_u.read = 1
        WHERE
            th_m_u.read = 0
            AND th_m_u.id IN (".implode(",", $ar_id).")
			AND th_m.cdate > $min_ts";

        ORM_EXT::for_table("thread_messages_union")->raw_execute($sql);
    }

    public function get_nr_thread($user_id) {

        $orm = ORM_EXT::for_table("thread_messages_union");
        $orm->table_alias("th_m_u");

        $orm->select("u_a.name",    "author_name");
        $orm->select("u_a.id",      "author_id");
        $orm->select("th_m_u.thread_id");
        $orm->select("th_m.cdate");
        $orm->select_expr("COUNT(th_m_u.id)", "cnt");

        $orm->left_outer_join("thread_messages", "th_m.id = th_m_u.message_id", "th_m");
        $orm->left_outer_join("users", "th_m.user_id = u_a.id", "u_a");

        $orm->where_equal("th_m_u.user_id", $user_id);
        $orm->where_equal("th_m_u.read", 0);

        $orm->group_by("th_m_u.thread_id");
        $orm->order_by_asc("cnt");

        return $orm->find_array();

    }

    public function clear_thread($user_id, $thread_id) {
        return ORM_EXT::for_table("thread_messages_union")->where_equal("user_id", $user_id)->where_equal("thread_id", $thread_id)->delete_many();
    }

    public function delete_thread($user_id, $thread_id) {
        ORM_EXT::for_table("thread_messages_union")->where_equal("user_id", $user_id)->where_equal("thread_id", $thread_id)->delete_many();
        ORM_EXT::for_table("thread_union")->where_equal("user_id", $user_id)->where_equal("thread_id", $thread_id)->delete_many();
    }

    public function delete_message($user_id, $message_id, $thread_id) {
        ORM_EXT::for_table("thread_messages_union")->where_equal("user_id", $user_id)->where_equal("thread_id", $thread_id)->where_equal("id", $message_id)->delete_many();
    }



}

?>