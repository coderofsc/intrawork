<? /*
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

 defined('CORE_INTRAWORK_WS') or die('Нет прямого доступа: '.__FILE__);

define("ALERT_INFO",        1);
define("ALERT_SUCCESS",     2);
define("ALERT_WARNING",     3);
define("ALERT_ERROR",       4);
define("ALERT_DANGER",      5);

define("ALERT_STACK_SESSION_KEY",      "alerts_stack");
define("ALERT_JS_STACK_SESSION_KEY",   "alerts_js_stack");

class cls_alerts {
    private static $instance;

    private function __construct()
    {
    }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new cls_alerts();
        }
        return self::$instance;
    }

    public function add($message, $type = ALERT_INFO)
    {
        if (is_array($message)) {
            foreach ($message as $text) {
                $_SESSION[ALERT_STACK_SESSION_KEY][$type][] = array("type"=>$type, "message"=>$text, "time"=>time());
            }
        } elseif (!empty($message)) {
            $_SESSION[ALERT_STACK_SESSION_KEY][$type][] = array("type"=>$type, "message"=>$message, "time"=>time());
        } else {
            return false;
        }

        return true;
    }

    public function add_js($title, $message, $type = ALERT_SUCCESS) {
        $_SESSION[ALERT_JS_STACK_SESSION_KEY][$type][] = array("title"=>$title, "message"=>$message, "type"=>$type);
    }

    public function get_alerts($type = 0, $clear_stack = true)
    {
        $result = array();

        if ($type) {
            foreach ($_SESSION[ALERT_STACK_SESSION_KEY] as $message) {
                if ($message["type"] == $type) {
                    $result[] = $message;
                }
            }
        } else {
            $result = $_SESSION[ALERT_STACK_SESSION_KEY];
        }

        if ($clear_stack) {
            $this->clear_stack();
        }

        return $result;
    }

    public function get_js_alerts($clear_stack = true) {
        $result = $_SESSION[ALERT_JS_STACK_SESSION_KEY];

        if ($clear_stack) {
            $this->clear_js_stack();
        }

        return $result;
    }

    public function clear_stack() {
        unset($_SESSION[ALERT_STACK_SESSION_KEY]);
    }

    public function clear_js_stack() {
        unset($_SESSION[ALERT_JS_STACK_SESSION_KEY]);
    }

    public function get_count($type = 0) {
        if ($type) {
            $result = sizeof($this->get_alerts($type));
        } else {
            $result = sizeof($_SESSION[ALERT_STACK_SESSION_KEY]);
        }

        return $result;
    }

    public function get_js_count() {
        $result = sizeof($_SESSION[ALERT_JS_STACK_SESSION_KEY]);
        return $result;
    }

}

?>