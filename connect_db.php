<?php
include "classes/class.idiorm.php";

class ORM_EXT extends ORM {
    static $query_count     = 0;
    static $query_time      = 0;
    static $affected_rows   = 0;

    static $all_query_time = 0;
    static $ar_query_time  = array();


    public $SQL_CALC_FOUND_ROWS = false;

    public static function get_query_log($connection_name = self::DEFAULT_CONNECTION) {
        $result = array();

        if (isset(self::$_query_log[$connection_name])) {
            foreach (self::$_query_log[$connection_name] as $item) {
                $result[sha1($item["query"])] = $item;
            }

            return $result;
        }

        return array();
    }

    public static function for_table($table_name, $connection_name = self::DEFAULT_CONNECTION) {
        self::_setup_db($connection_name);
        //return new ORM_EXT(TBL_PREFIX."_".$table_name, array(), $connection_name);
        return new ORM_EXT($table_name, array(), $connection_name);
    }

    protected function _create_instance_from_row($row) {
        $instance = ORM_EXT::for_table($this->_table_name, $this->_connection_name);
        $instance->use_id_column($this->_instance_id_column);
        $instance->hydrate($row);
        return $instance;
    }

    public function find_assoc($column = false, $array = false, $value_cell=false) {
        $rows = $this->find_array();

        $column = ($column)?$column:$this->_get_id_column_name();
        $array_column = (is_bool($array))?false:$array;

        $data = array();
        foreach($rows as $row) {
            if ($value_cell) {
                $value = $row[$value_cell];
            } else {
                $value = $row;
            }

            if ($array) {
                if ($array_column) {
                    $data[$row[$column]][$row[$array_column]] = $value;
                } else {
                    $data[$row[$column]][] = $value;
                }

            } else {
                $data[$row[$column]] = $value;
            }
        }

        return $data;
    }

    public function find_array_cell() {
        $rows = $this->find_array();

        $data = array();
        foreach($rows as $row) {
            $data[] = array_shift($row);
        }
        return $data;
    }

    /**
     * Build a SELECT statement based on the clauses that have
     * been passed to this instance by chaining method calls.
     */
    public function _build_select() {
        $result = parent::_build_select();
        return $result;
    }

    /**
     * Execute the SELECT query that has been built up by chaining methods
     * on this class. Return an array of rows as associative arrays.
     */
    public function _run() {
        ORM_EXT::$query_count++;

        $start_time = cls_tools::get_instance()->get_microtime();
        $result = parent::_run();
        $end_time = cls_tools::get_instance()->get_microtime();

        $query_time = $end_time - $start_time;

        ORM_EXT::$ar_query_time[sha1($this->get_last_query())] = $query_time;

        //$ar_query_time

        ORM_EXT::$all_query_time+=($query_time);

        ORM_EXT::$affected_rows+=parent::get_last_statement()->rowCount();

        return $result;
    }

}

try {
    $dbh = new PDO("mysql:host=".config()->db->host.";dbname=".config()->db->name, config()->db->user, config()->db->password, array(PDO::ATTR_ERRMODE=>/*PDO::ERRMODE_SILENT*/PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
} catch (PDOException $e) { die("Подключение не удалось: " . $e->getMessage()); }

ORM_EXT::set_db($dbh);

/*
 * ORM::configure('mysql:host='.DB_HOST.';dbname='.DB_NAME);
 * ORM::configure('username', DB_USER);
 * ORM::configure('password', DB_PASSWORD);
 * ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
 */

ORM::configure('return_result_sets',            true);
ORM::configure('caching',            false);
if (config()->dev_mode) {
    ORM::configure('logging', true);
}

/*ORM_EXT::configure('logger', function($log_string) { echo $log_string; });*/
/*ORM_EXT::configure('id_column_overrides', array());*/


?>
