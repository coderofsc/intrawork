<?php
define("CRON", true);
// Автоматическое завершение заявки с предварительной отправкой сообщения заказчику
// в соответствии с настройками типа, к которому она принадлежит
// Раз в час

$_SERVER["DOCUMENT_ROOT"] = dirname(dirname($_SERVER["PHP_SELF"])).DIRECTORY_SEPARATOR;
define("DOC_ROOT", $_SERVER["DOCUMENT_ROOT"]);
//define("DOC_ROOT", $_SERVER["DOCUMENT_ROOT"]."/");

require(DOC_ROOT.'bootstrap.php');
require(DOC_ROOT.'connect_db.php');

class demand_auto_complete {
    private static $instance;

    private function __construct() {
    }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new demand_auto_complete();
        }
        return self::$instance;
    }

    private function get_demands($notice = true) {
        $orm = ORM_EXT::for_table("demands");
        $orm->select_many("demands.id", "demands.required_time", "demands.mb_id", "demands.eu_eid", "demands.title", "demands.cat_id");

        // Заказчик
        $orm->select("first_d_m.from_eid", "cu_eid");
        $orm->select("cu.id", "user_id");
        $orm->left_outer_join("demands_messages", "demands.id = first_d_m.demand_id and first_d_m.first = 1", "first_d_m");
        $orm->left_outer_join("email_addresses", "first_d_m.from_eid = cu_e_a.id", "cu_e_a");
        $orm->left_outer_join("users", "cu_e_a.id = cu.eid", "cu");

        // Дата последнего сообщение
        $orm->select("last_d_m.create_date", "last_message_date");
        // Прошло с момента последнего сообщения
        $orm->select_expr("(UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(last_d_m.create_date))", "answer_passed_time");
        // Осталось время ДО закрытия (через сколько закроется задача - время прошло от ответа минус время закрытия)
        $orm->select_expr("demands_types.auto_complete-(UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(last_d_m.create_date))", "auto_complete_remain");
        $orm->left_outer_join("demands_messages", "last_d_m.id = (SELECT d_m.id FROM demands_messages d_m WHERE d_m.demand_id = demands.id ORDER BY create_date DESC LIMIT 1)", "last_d_m");

        // Почтовый бот
        $orm->select("mailbots.name", "mb_name")->select("mailbots.address", "mb_address");
        $orm->left_outer_join("mailbots", "mailbots.id = demands.mb_id");

        // Категория
        $orm->left_outer_join("categories", "categories.id = demands.cat_id");

        // Тип
        $orm->select('demands_types.auto_complete');
        $orm->select('demands_types.auto_complete_notice');
        $orm->inner_join("demands_types", "demands_types.id = demands.type_id");

        // Заявки с авто завершением
        $orm->where_not_equal("demands_types.auto_complete", 0);
        // Последнее сообщение должно быть НЕ от автора
        $orm->where_raw("last_d_m.from_eid != first_d_m.from_eid");
        // Только заявки с указанным почтовым ботом
        $orm->where_not_equal("demands.mb_id", 0);
        // Только заявки в указанном статусе!
        $orm->where_raw("demands.status = demands_types.auto_complete_status");



        if ($notice) {
            $orm->where_not_equal("demands_types.auto_complete_notice", 0);
            // Прошедшее время от последнего сообщения должно быть больше указанного в настройках оповещения заказчика
            $orm->where_raw("(UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(last_d_m.create_date)) > demands_types.auto_complete_notice");
            // Но меньше самой даты закрытия
            $orm->where_raw("(UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(last_d_m.create_date)) < demands_types.auto_complete");
            // И где дата сообщения больше даты оповещения
            $orm->where_raw("UNIX_TIMESTAMP(last_d_m.create_date) > UNIX_TIMESTAMP(demands.notice_auto_complete)");
        } else {
            $orm->where_raw("UNIX_TIMESTAMP(last_d_m.create_date)+demands_types.auto_complete < UNIX_TIMESTAMP(NOW())");
        }

        return $orm->find_assoc();
    }

    private function notice($demand) {
        ORM_EXT::for_table("demands")->raw_execute("UPDATE demands SET notice_auto_complete=NOW() WHERE id=?", array($demand["id"]));
        cls_mailman::get_instance()->before_complete($demand);
    }

    private function complete($demand) {
        ORM_EXT::for_table("demands")->raw_execute("UPDATE demands SET status=? WHERE id=?", array(m_demands::STATUS_COMPLETE, $demand["id"]));
    }

    public function process(&$complete, &$notice) {

        // Завершение
        $ar_complete = $this->get_demands(false);
        foreach ($ar_complete as $demand_id=>$demand) {
            $this->complete($demand);
        }
        $complete = sizeof($ar_complete);

        // Оповещение о скором завершении
        $ar_before_complete = $this->get_demands();
        foreach ($ar_before_complete as $demand_id=>$demand) {
            $this->notice($demand);
        }

        $notice = sizeof($ar_before_complete);


    }
}

$complete = $notice = 0;
demand_auto_complete::get_instance()->process($complete, $notice);
echo "Завершено: $complete".PHP_EOL;
echo "Предупреждено: $notice".PHP_EOL;