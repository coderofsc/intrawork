<?php
define("CRON", true);
// Получение новостей системы
// Раз в день

$_SERVER["DOCUMENT_ROOT"] = dirname(dirname($_SERVER["PHP_SELF"])).DIRECTORY_SEPARATOR;
define("DOC_ROOT", $_SERVER["DOCUMENT_ROOT"]);


require(DOC_ROOT.'bootstrap.php');
require(DOC_ROOT.'connect_db.php');

class get_system_news {
    private static $instance;

    const FORCE_VIEW = 1;

    private function __construct() {
    }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new get_system_news();
        }
        return self::$instance;
    }

    private function get_time() {
        $orm = ORM_EXT::for_table("news");
        $orm->where_equal("user_id", 0);
        $orm->select_expr("UNIX_TIMESTAMP(create_date)", "time");
        $orm->order_by_desc("create_date");

        if ($orm = $orm->find_one()) {
            return $orm->get("time");
        }

        return 0;
    }

    public function get_system_news($time) {
        if ($buffer = file_get_contents("http://intrawork.ru/get_news/?time=".$time)) {
            if ($ar_news = json_decode($buffer)) {
                return $ar_news;
            }
        }

        return array();

    }

    public function process() {
        $time = $this->get_time();
        $ar_news = $this->get_system_news($time);

        foreach ($ar_news as $news) {

            $news = (array)$news;

            $data = array();
            $data["create_date"]    = $data["publish_date"] = date('Y-m-d H:i:s', $news["time"]);
            $data["user_id"]        = 0;
            $data["force_view"]     = self::FORCE_VIEW;
            $data["title"]          = $news["title"];
            $data["news"]           = nl2br($news["text"]);

            ORM_EXT::for_table("news")->create($data)->save();
        }
    }
}

get_system_news::get_instance()->process();