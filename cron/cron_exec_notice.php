<?php
define("CRON", true);
// Отправка списка исполняемых заявок
// Раз в час

$_SERVER["DOCUMENT_ROOT"] = dirname(dirname($_SERVER["PHP_SELF"])).DIRECTORY_SEPARATOR;
define("DOC_ROOT", $_SERVER["DOCUMENT_ROOT"]);


require(DOC_ROOT.'bootstrap.php');
require(DOC_ROOT.'connect_db.php');

class exec_notice {
    private static $instance;

    private function __construct() {
    }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new exec_notice();
        }
        return self::$instance;
    }

    private function get_users() {
        $orm = ORM_EXT::for_table("users");
        $orm->select_many("id", "eid");
        $orm->where_equal("exec_notice", 1);
        $orm->where_equal("exec_notice_time", date("G"));
        $orm->where_raw("FIND_IN_SET (".(date("w")).", exec_notice_weekdays)>0");
        return $orm->find_assoc("eid");
    }

    private function get_group_demands($ar_users) {
        $ar_eid = array_keys($ar_users);
        $orm = ORM_EXT::for_table("demands");
        $orm->select_many("id", "eu_eid", "title", "cat_id", "status");
        $orm->where_in("eu_eid", $ar_eid);
        $orm->where_in("status", array(m_demands::STATUS_NEW, m_demands::STATUS_WORK, m_demands::STATUS_PAUSE));
        $orm->order_by_desc("create_date");
        return $orm->find_assoc("eu_eid", true);
    }

    public function process() {
        if (!$ar_users = $this->get_users()) {
            return false;
        }

        $ar_exec_demands = $this->get_group_demands($ar_users);

        foreach ($ar_exec_demands as $eu_eid => $ar_demands) {
            cls_mailman::get_instance()->exec_notice($eu_eid, $ar_demands);
        }
    }
}

exec_notice::get_instance()->process();