<?php
if (empty($_SERVER['DOCUMENT_ROOT']))   $_SERVER['DOCUMENT_ROOT']   = isset(config()->document_root)?config()->document_root:dirname(__FILE__);
if (empty($_SERVER['HTTP_HOST']))       $_SERVER['HTTP_HOST']       = config()->domain_name;
if (empty($_SERVER['SERVER_NAME']))     $_SERVER['SERVER_NAME']     = config()->domain_name;
if (!isset($_SERVER['REMOTE_ADDR']) || !$_SERVER['REMOTE_ADDR']) $_SERVER['REMOTE_ADDR'] = '127.0.0.1';
if (!isset($_SERVER['REQUEST_URI']) || !$_SERVER['REQUEST_URI']) $_SERVER['REQUEST_URI'] = '/cron.php';

define("HOST_ROOT",            "http://".$_SERVER["SERVER_NAME"]."/");
define("DOC_ROOT",              $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR);

define("RESOURCE_VERSION", 17); // Собъются CSS, удалить в /var/lib/php5 все. и перезаписать из demo CSSки (ПРОВЕРИТЬ, возможно починил симлинком)

define("DEFAULT_DEMAND_TYPE_ID",     1); // Идентификатор типа по умолчанию (нельзя удалить)

/* ПОИСК */
define("ANY_VALUE",     "*");
define("EMPTY_VALUE",   "!*");
define("SESSION_USER_EID_VALUE",   ":SESSION_USER_EID:");
/* /ПОИСК */

/* Редикерты форм */
define("FORM_NA_STAY"               , 0); // Остаться на текущей странице
define("FORM_NA_LIST"               , 1); // Перейти к списку
define("FORM_NA_VIEW"               , 2); // Посмотреть
define("FORM_NA_CREATE"             , 3); // Создать еще
define("FORM_NA_JOIN"               , 4); // Прикрепить еще

/* Редикерты форм */
define("NATURAL_PERSON"              , 1); // Физлицо
define("LEGAL_PERSON"                , 2); // Юрлицо

/* Хранилище */
define("STORAGE_DIR",                   "file_storage/");
define("STORAGE_DIR_CONTENTS",          "contents/");
define("STORAGE_DIR_AVATARS",           "avatars/");
define("STORAGE_DIR_AVATARS_USERS",     "avatars/users/");
define("STORAGE_DIR_AVATARS_CONTACTS",  "avatars/contacts/");
define("STORAGE_DIR_DEMANDS",           "demands/");
define("STORAGE_DIR_FILES",             "files/");
define("STORAGE_DIR_TEST",              "test/");
define("STORAGE_DIR_COMMENTS",          "comments/");
/* /Хранилище */

/* Смарти */
define("SMARTY_TPL_DIR",            DOC_ROOT."applications/views/templates/");
define("SMARTY_TPL_COMPILE_DIR",    DOC_ROOT."applications/views/templates_cmp/");
define("SMARTY_TPL_CACHE_DIR",      DOC_ROOT."applications/views/templates_cache/");
define("SMARTY_COMPILE_CHECK",      true); // Проверка компиляции. При значении false, измененный шаблон не будет перекомпилирован.
/* /Смарти */

/* Сортировка */
define("SORT_DSC_ZA",               "desc");
define("SORT_ASC_AZ",               "asc");
//define("SORT_DEFAULT",          0);
//define("SORT_NAME",             1);
/* /Сортировка */

/* Источники поиска */
define("SEARCH_SRC_DEMANDS",    1);
define("SEARCH_SRC_USERS",      2);
/* /Источники поиска */

/* Роли в задаче */
define("USER_ROLE_CUSTOMER",        1);
define("USER_ROLE_EXECUTOR",        2);
define("USER_ROLE_RESPONSIBLE",     3);
/* /Роли в задаче */

/* Переговорные комнаты */
define("RM_PROJECTOR"	, 1);   // Проектор
define("RM_LOUDSPEAKER"	, 2);   // Колонки
define("RM_MICROPHONE"	, 4);   // Микрофон
define("RM_WHITEBOARD"	, 8);   // Маркерная доска
define("RM_CONFERENCE"	, 16);  // Конференц-связь
/* /Переговорные комнаты */

/* Коды ответов */
define("STATUS_OK",                 200);
define("STATUS_BAD_REQUEST",        400);
define("STATUS_FORBIDDEN",          403);
define("STATUS_NOT_FOUND",          404);
define("STATUS_METHOD_NOT_ALLOWED", 405);
/* /Коды ответов */

//define ("MAILMAN_ANSWER_DIVIDER",         '<font style="color:#cfcfcf">========Напишите свой ответ над этой чертой========</font>');
define ("MAILMAN_ANSWER_DIVIDER",         '========Напишите свой ответ над этой чертой========');

/* События почтальона */
define ("MAILMAN_EVENT_NOTIFICATION_CRUD",         1);
define ("MAILMAN_EVENT_DEMAND_MESSAGE",            2);
define ("MAILMAN_EVENT_DEMAND_REGISTER",           3);
define ("MAILMAN_EVENT_EXEC_NOTICE",               4);
define ("MAILMAN_EVENT_BEFORE_COMPLETE",           5);
define ("MAILMAN_EVENT_USER_INVITATION",           6);
define ("MAILMAN_EVENT_CHANGE_MEMBER_ROLE",        7);
/* /События почтальона */

/* Типы протокола */
define ("MB_POP3",              0);
define ("MB_IMAP",              1);
define ("MB_NNTP",              2);
/* /Типы протокола */

define ("OWNER_DEMAND",         1);
define ("OWNER_DEMAND_MESSAGE", 4);
define ("OWNER_USER",           2);
define ("OWNER_CONTACT",        3);
define ("OWNER_NEWS",           4);
define ("OWNER_POST",           5);
define ("OWNER_CATEGORY",       6);
define ("OWNER_DPRT",           7);
define ("OWNER_MAILBOT",        8);
define ("OWNER_MROOM",          9);
define ("OWNER_ROLE",           10);
define ("OWNER_FILE_FOLDER",    11);
define ("OWNER_COMMENT",        12);

/* ВИДИМОСТЬ ФАЙЛОВ */
define ("FILE_PUBLIC",      1);
/* /ВИДИМОСТЬ ФАЙЛОВ */


define("CUSER_SESSION_KEY",      "cuser_data");
define("PASSWORD_SALT",          ":dollar7a~"); // уникальный для каждой площадки


?>