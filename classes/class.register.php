<?

/**
 * @property \Smarty smarty
 */
class cls_register {
    private static $instance;
    private $stack       = array();

    private function __construct()
    {
    }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new cls_register();
        }
        return self::$instance;
    }

    public function set($name, $value) {
        $this->stack[$name] = $value;
    }

    public function __set($name, $value) {
        $this->set($name, $value);
    }

    public function get($name)
    {
        if (array_key_exists($name, $this->stack)) {
            return $this->stack[$name];
        }

        return null;
    }

    public function __get($name)
    {
        return $this->get($name);
    }


    public function __isset($name)
    {
        return isset($this->stack[$name]);
    }

    public function __unset($name)
    {
        unset($this->stack[$name]);
    }
}

?>