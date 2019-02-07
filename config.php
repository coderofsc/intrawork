<?php
class config {
    private static $instance;
    private $_data = null;

    private function __construct()
    {
    }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new config();
            self::$instance->_data = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/config.json"));

        }
        return self::$instance;
    }

    public function __get($name) {

        return isset($this->_data->$name)?$this->_data->$name:null;
    }
}

function config() {
    return config::get_instance();
}
