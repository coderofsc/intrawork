<?php
define("CRON", true);
// Продление установленного времени решения заявки
// в соответствии с настройками типа, к которому она принадлежит
// Раз в час

$_SERVER["DOCUMENT_ROOT"] = dirname(dirname($_SERVER["PHP_SELF"])).DIRECTORY_SEPARATOR;
define("DOC_ROOT", $_SERVER["DOCUMENT_ROOT"]);

require(DOC_ROOT.'bootstrap.php');
require(DOC_ROOT.'connect_db.php');

class demand_prolong {
    private static $instance;

    private function __construct() {
    }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new demand_prolong();
        }
        return self::$instance;
    }

    private function get_demands() {
        $orm = ORM_EXT::for_table("demands");
        $orm->select_many("demands.id", "demands.required_time", 'demands_types.auto_prolong');
        $orm->select_expr("(SELECT SUM(IF (elapsed_time IS NULL,(UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(open_time)),elapsed_time)) FROM demands_history_exec WHERE status=".m_demands::STATUS_WORK." AND demand_id=demands.id)", "exec_time");

        $orm->inner_join("demands_types", "demands_types.id = demands.type_id");
        $orm->where_not_equal("demands_types.auto_prolong", 0);

        // Только заявки в работе!
        $orm->where("status", m_demands::STATUS_WORK);

        $orm->where_gt("demands.required_time", 0);
        $orm->having_raw("exec_time > demands.required_time");
        return $orm->find_assoc();
    }

    private function prolong($demand) {
        ORM_EXT::for_table("demands")->raw_execute("UPDATE demands SET required_time=? WHERE id=?", array(intval($demand["exec_time"])+intval($demand["auto_prolong"]), $demand["id"]));
    }

    public function process() {
        $ar_demands = $this->get_demands();

        foreach ($ar_demands as $demand_id=>$demand) {
            $this->prolong($demand);
        }
    }
}

demand_prolong::get_instance()->process();