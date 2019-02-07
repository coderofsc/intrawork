<?php
/*
 * Copyright (C) 2013-2014  ИсходныйКод
 * Этот файл является частью проекта Интраворк
 * bootstrap.php - конфигурационный файл
 */

define ("CORE_INTRAWORK_WS", true);
define ("IW_VERSION", "7.1");
define ("IW_EMAIL_SUPPORT", "support@intrawork.ru");

define ("TIME_SEC",     1);
define ("TIME_MIN",     TIME_SEC * 60);
define ("TIME_HOUR",    TIME_MIN * 60);
define ("TIME_DAY",     TIME_HOUR * 24);
define ("TIME_WEEK",    TIME_DAY * 7);
define ("TIME_MONTH",   TIME_DAY * 30);
define ("TIME_YEAR",    TIME_DAY * 365);

error_reporting(E_ALL & ~E_NOTICE);

// локаль, временная зона
date_default_timezone_set("Europe/Minsk");
setlocale(LC_ALL, 'ru_RU.UTF-8');

if (ini_get("register_globals") == 1) {
    die("Отключите директиву register_global в конфигурационном файле php");
}

if (empty($_SERVER['DOCUMENT_ROOT']))   $_SERVER['DOCUMENT_ROOT']   = dirname(__FILE__);

//require "defines_server.php";
require "config.php";
require "defines.php";

ini_set('pcre.backtrack_limit', '2M');
ini_set('pcre.recursion_limit', '2M');

ini_set('session.save_path', DOC_ROOT.'sessions');
if (!defined("CRON")) {
    session_start();
}
ini_set("session.cookie_lifetime", 0); // Пока не будет закрыт браузер
ini_set("session.gc_maxlifetime", TIME_HOUR);

/*
 * Настройка автозагрузчика классов
 */


function __autoload($class_name)
{
    $prepare_way = preg_replace(array("/^m/", "/^cls/", "/^cnt/"), array("applications/models", "classes", "applications/controllers"), str_replace("_", "/", $class_name));
    $path_info = pathinfo($prepare_way);

    if (preg_match("/^Swift/", $path_info["dirname"])) {
        return false;
    }

    if (preg_match("/^Smarty/", $path_info["dirname"])) {
        return false;
    }

    $include_class = $path_info["dirname"] . "/class." . $path_info["filename"] . ".php";

    try {
        if (!@include_once $include_class) {
            throw new Exception("Не возможно подключить " . $include_class . ". Файл не найден.");
        }
        elseif (!class_exists($class_name, false)) {
            throw new Exception("Класс " . $class_name . " не объявлен в файле " . $include_class);
        }
    } catch (Exception $e) {
        custom_exception_handler($e);
        return false;
    }
}

function default_autoload($className)
{
    if (function_exists('__autoload')) {
        __autoload($className);
    }
}

spl_autoload_register('default_autoload');


// обработчик исключений
function custom_exception_handler($e)
{
    echo($e->getMessage());
    return true;
}


set_exception_handler('custom_exception_handler');

// обработчик ошибок
function custom_error_handler($errno, $errstr, $errfile, $errline)
{
    if (!(error_reporting() & $errno)) {
        return false;
    }

    $error_type[E_USER_ERROR] = $error_type[E_ERROR]        = "Фатальная ошибка";
    $error_type[E_USER_WARNING] = $error_type[E_WARNING]    = "Предупреждение";
    $error_type[E_USER_NOTICE] = $error_type[E_NOTICE]      = "Уведомление";

    if (config()->dev_mode && strstr($errstr, "PDOStatement")) {
        $_GET["show_query_log"] = "true";
    }

    cls_alerts::get_instance()->add("<strong>" . ((isset($error_type[$errno]) ? $error_type[$errno] : "Неизвестная ошибка")) . "</strong> [$errno]  $errstr ($errfile:$errline)", ALERT_DANGER);

    return true;
}
if (!defined("CRON")) {
    set_error_handler('custom_error_handler');
}

// Настройка языка интерфейса

require "classes/class.i18n.php";
if (m_cuser::get_instance()->is_login()) {
    define ("LANG_CURRENT", m_cuser::get_instance()->get("lang"));
} else {
    define ("LANG_CURRENT", config()->lang_default);
}

$i18n = new i18n(DOC_ROOT.'lang/lang_{LANGUAGE}.json', DOC_ROOT.'lang/cache/', LANG_CURRENT);
$i18n->setForcedLang(LANG_CURRENT);
$i18n->setFallbackLang(config()->lang_default);
$i18n->init();

