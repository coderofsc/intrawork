<?php
define("CRON", true);

// Очистка временных файлов файлового хранилища
// Удалить все пустые каталоги: find /file_storage/ -type d -empty -delete
// Раз в неделю

$_SERVER["DOCUMENT_ROOT"] = dirname(dirname($_SERVER["PHP_SELF"])).DIRECTORY_SEPARATOR;
define("DOC_ROOT", $_SERVER["DOCUMENT_ROOT"]);

require(DOC_ROOT.'bootstrap.php');
require(DOC_ROOT.'connect_db.php');

class clean_fs {
    private static $instance;

    private $thumbs_size = array("xs", "sm", "md");

    private function __construct() {
    }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new clean_fs();
        }
        return self::$instance;
    }

    private function get_unused_files() {
        // Выбераем все не используемые файлы возрастом больше 7 дней

        $orm = ORM_EXT::for_table("file_storage");
        $orm->where_equal("used", 0);
        $orm->where_raw("UNIX_TIMESTAMP(create_date) > ".time()-(7*TIME_DAY));
        $orm->limit(2);
        return $orm->find_array();

    }

    public function process() {
        $ar_files = $this->get_unused_files();

        foreach ($ar_files as $file) {
            $path = STORAGE_DIR.$file["root"].$file["dir"].$file["filename"].".".$file["ext"];
            if (file_exists($path)) {
                if (unlink($path)) {
                    echo "Основной файл удален".PHP_EOL;
                }

                foreach ($this->thumbs_size as $size) {
                    $path = STORAGE_DIR.$file["root"].$file["dir"].$file["filename"]."_".$size.".".$file["ext"];
                    if (unlink($path)) {
                        echo "Файл ".$size." удален".PHP_EOL;
                    }
                }
            }

            ORM_EXT::for_table("file_storage")->raw_execute("DELETE FROM file_storage WHERE id=?", array($file["id"]));
        }

        //print_r($ar_files);

    }
}

clean_fs::get_instance()->process();