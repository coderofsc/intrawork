<?php
use Routing\Router;
use Routing\MatchedRoute;

require DOC_ROOT."classes/routing/func.php";
require DOC_ROOT."classes/routing/UrlMatcher.php";
require DOC_ROOT."classes/routing/Router.php";
require DOC_ROOT."classes/routing/MatchedRoute.php";

/*
 * Фронт-контроллер
 */

define("RENDER_DEFAULT",             0);
define("RENDER_MODAL",               1);
define("RENDER_BLANK",               2);
define("RENDER_INLINE",              3);
define("RENDER_JSON",                4);
define("RENDER_LOGIN",               5);


/**
 * Class cnt_front
 */
class cnt_front extends cls_controller {

    protected   $controller_info;
    protected   $render = RENDER_DEFAULT;

    public $route;

    /**
     * cnt_front constructor.
     */
    function __construct()
    {
        $this->controller_info["meta_title"]         = L::meta_title;
        $this->controller_info["meta_keywords"]      = L::meta_keywords;
        $this->controller_info["meta_description"]   = L::meta_description;

        $this->controller_info["modal"][] = "remote";
        $this->controller_info["modal"][] = "note";
        if (config()->dev_mode) {
            $this->controller_info["modal"][] = "loadlog";
        }

        $layout["name"]     = 'super_layout';
        $layout["zIndex"]     = 1;

        $layout["west"]     = array("size"=>'300', "minSize"=>'280', "maxSize"=>'350', "onresize_end"=>"layout_resize_end");
        //$layout["south"]     = array("size"=>"51", "spacing_open"=>0, "showOverflowOnHover"=>true);

        $layout["west"]["childOptions"]["enableCursorHotkey"] = false;
        $layout["west"]["childOptions"]["north"]     = array("size"=>"51", "spacing_open"=>0, "showOverflowOnHover"=>true);
        //$layout["west"]["childOptions"]["center"]     = array("showOverflowOnHover"=>true);

        $layout["center"]   = array("size"=>'100%');
        $layout["center"]["childOptions"]["enableCursorHotkey"] = false;
        $layout["center"]["childOptions"]["name"] = "super_middle_layout";
        $layout["center"]["childOptions"]["north"]     = array("size"=>"51", "spacing_open"=>0, "showOverflowOnHover"=>true);

        $layout["stateManagement__enabled"] = true;
        $layout["enableCursorHotkey"] = false;
        $layout["stateManagement__includeChildren"] = true;

        $this->controller_info["layout"] = $layout;
    }

    function set_resource() {
        $controller_name = $this->route->getController();

        // Группы ресурсов описаны в min/groupsConfig.php

        $result = $result["head"] = $result["foot"] = array();

        $result["head"]["css"][]  = "headcss";
        $result["head"]["js"][]   = "headjs";
        $result["foot"]["css"][]  = "footcss";
        $result["foot"]["js"][]   = "footjs";

        $result["foot"]["css"][]  = "tourcss";
        $result["foot"]["js"][]   = "tourjs";

        $result["foot"]["css"][]  = "fancyboxcss";
        $result["foot"]["js"][]   = "fancyboxjs";


        if(in_array($controller_name, array("dashboard"))) {
            $result["foot"]["js"][]   = "highchartsjs";
        }

        if (config()->dev_mode) {
            $resource_groups    = (require DOC_ROOT.'min/groupsConfig.php');
            $tmp_result         = array();

            foreach($result as $place => $type_resource) {
                foreach($type_resource as $type => $ar_groups) {
                    foreach($ar_groups as $group) {
                        if (!isset($tmp_result[$place][$type]) || !is_array($tmp_result[$place][$type])) {
                            $tmp_result[$place][$type] = array();
                        }
                        $tmp_result[$place][$type] = array_merge($tmp_result[$place][$type], $resource_groups[$group]);

                        foreach ($tmp_result[$place][$type] as &$resource_file) {
                            $resource_file = str_replace("//", "", $resource_file);
                        }
                    }
                }
            }
            $result = $tmp_result;
        }

        cls_register::get_instance()->smarty->assign("ar_resource", 	$result);
    }

    function get_user_request()
    {
        $this->user_request["render"] 	        = (isset($_GET["render"]))?$_GET["render"]:((cls_tools::get_instance()->is_ajax())?RENDER_MODAL:RENDER_DEFAULT);
        $this->user_request["page"] 	        = (isset($_GET["page"]))?intval($_GET["page"]):false;
        $this->controller_info["pane"] 	        = ((isset($_GET["pane"]) && !$_GET["pane"]) || $this->user_request["render"] == RENDER_MODAL)?false:true;
    }

    function validate()
    {
    }

    /**
     * @param int $render
     * @return string
     * @throws Exception
     * @throws SmartyException
     */
    function display($render = RENDER_DEFAULT)
    {
        switch ($this->render) {
            case RENDER_BLANK : $render_tpl = "render/blank";  break;
            case RENDER_INLINE: $render_tpl = "render/inline"; break;
            case RENDER_JSON:   $render_tpl = "render/json"; break;
            case RENDER_MODAL:  $render_tpl = "render/modal";  break;
            case RENDER_LOGIN:  $render_tpl = "render/login";  break;

            case RENDER_DEFAULT:
            default: $render_tpl = "main"; break;
        }

        return cls_register::get_instance()->smarty->fetch("main/".$render_tpl.".tpl");
    }

    public function check_system_alerts()
    {
        if (cls_alerts::get_instance()->get_count()) {
            cls_register::get_instance()->smarty->assign("system_alerts",  cls_alerts::get_instance()->get_alerts());
        }

        if (cls_alerts::get_instance()->get_js_count()) {
            cls_register::get_instance()->smarty->assign("float_alerts",  cls_alerts::get_instance()->get_js_alerts());
        }
    }

    public function get_route() {

        try {
            $router = new Router(GET_HTTP_HOST());

            $router->add("superadmin", '/toggle_superadmin/', "ext_front:toggle_superadmin");
            $router->add("get_counters", '/get_counters/', "ext_front:get_counters");

            $router->add("dashboard", '/', "dashboard");
            $router->add("dashboard_get_pulse", '/dashboard/get_pulse/', "dashboard:get_pulse");
            $router->add("dashboard_reload_demands_member", '/dashboard/reload_demands_member/', "dashboard:reload_demands_member");
            $router->add("dashboard_get_events",        '/dashboard/get_events/',                  "dashboard:get_events");

            $router->add("login",       '/login/',      "auth_login");
            $router->add("logout",      '/logout/',     "auth_logout");
            $router->add("fp", '/forgotpass/', "auth_forgotpass");
            $router->add("fp_ms", '/forgotpass/magic_send/', "auth_forgotpass:magic_send");
            $router->add("fp_snp", '/forgotpass/set_newpass/', "auth_forgotpass:set_newpass");
            $router->add("fp_c", '/forgotpass/complete/', "auth_forgotpass:complete");

            $router->add("user_create_set_avatar",    '/users/create/set_avatar/',          "users_form:set_avatar");
            $router->add("user_edit_set_avatar",      '/users/edit/(id:num)/set_avatar/',   "users_form:set_avatar");
            $router->add("user_edit_ntf_modules",      '/users/edit/(id:num)/get_notification_modules/',   "users_form:get_notification_modules");
            $router->add("user_edit_ntf_cats",      '/users/edit/(id:num)/get_notification_categories/',   "users_form:get_notification_categories");
            $router->add("user_view_stat", '/users/view/(id:num)/get_stat/', "users_view:get_stat");

            $router->add("contact_create_set_avatar",  '/contacts/create/set_avatar/',        "contacts_form:set_avatar");
            $router->add("contact_edit_set_avatar",    '/contacts/edit/(id:num)/set_avatar/', "contacts_form:set_avatar");
            $router->add("departments_update_order",  '/departments/update_order/',         "departments:update_order");
            $router->add("categories_update_order",   '/categories/update_order/',           "categories:update_order");
            $router->add("categories_calc_demands",   '/categories/calc_demands/',           "categories:calc_demands");
            $router->add("categories_get_users",        '/categories/view/(id:num)/get_users/',  "categories_view:get_users");

            $router->add("branch_update_orders",  '/demands/branch_update_orders/(branch:any)/',         "demands:branch_update_orders");
            $router->add("demand_create_join",        '/demands/join/(parent_id:num)/',     "demands_form:join");
            //$router->add("demand_create_attach",      '/demands/create/attach/',            "demands_form:attach");
            //$router->add("demand_edit_attach",        '/demands/edit/(id:num)/attach/',     "demands_form:attach");
            $router->add("demand_add_message",        '/demands/view/(id:num)/add_message/',  "demands_view:add_message");
            $router->add("demand_status_message",        '/demands/view/(id:num)/status_message/',  "demands_view:status_message");
            $router->add("demand_add_member",        '/demands/view/(id:num)/add_member/',  "demands_view:add_member");
            $router->add("demand_get_history",        '/demands/view/(id:num)/get_history/',  "demands_view:get_history");
            $router->add("demand_get_members",        '/demands/view/(id:num)/get_members/',  "demands_view:get_members");
            $router->add("demand_toggle_track",       '/demands/view/(id:num)/toggle_tracking/',  "demands_view:toggle_tracking");
            $router->add("demand_get_new_message",    '/demands/view/(id:num)/get_new_message/',  "demands_view:get_new_message");
            $router->add("demand_save",               '/demands/edit/(id:num)/save/',  "demands_form:save");
            $router->add("demand_get_members_option",        '/demands/view/(id:num)/get_members_option/',  "demands_view:get_members_option");
            $router->add("demand_change_status",        '/demands/tuning/(id:num)/change_status/',  "demands_form:change_status");
            $router->add("demands_search_filter",     '/demands/search/(id:num)/',          "demands_search");
            $router->add("demands_delete_filter",     '/demands/search/(id:num)/delete/',    "demands_search:delete");
            $router->add("demands_quick_search",     '/demands/search/(str:any).json',      "demands_search:quick_search");

            $router->add("project_add_version",        '/projects/view/(id:num)/add_version/',  "projects_versions_form:add");
            $router->add("project_delete_version",        '/projects/view/(id:num)/delete_version/',  "projects_versions_form:delete");
            $router->add("project_get_versions",        '/projects/view/(id:num)/get_versions/',  "projects_view:get_versions");


            $router->add("get_reservations_events",   '/mrooms/reservations/get_events/',     "mrooms_reservations:get_reservations_events");
            $router->add("move_reservations_events",  '/mrooms/reservations/move_events/',    "mrooms_reservations:move_events");

            //$router->add("mrooms_reservations",  '/mrooms/reservations/', "mrooms_reservations_form");

            $ar_modules = array(
                "categories", "contacts", "projects", "contacts_types", "demands_types", "demands", "departments", "mailbots", "mrooms", "mrooms_reservations", "news", "posts", "roles", "users"
            );

            foreach ($ar_modules as $module) {
                $module_path = str_replace('_', '/', $module);
                $router->add($module,           '/'.$module_path.'/',                    $module);

                if ($module == "demands") {
                    $router->add($module.'_setup',   '/'.$module_path.'/tuning/(id:num)/',      $module.'_form');
                } else {
                    $router->add($module.'_edit',   '/'.$module_path.'/edit/(id:num)/',      $module.'_form');
                }

                $router->add($module.'_create', '/'.$module_path.'/create/',             $module.'_form');
                $router->add($module.'_view',   '/'.$module_path.'/view/(id:num)/',      $module.'_view');
                $router->add($module.'_view_ac',   '/'.$module_path.'/view/(id:num)/add_comment/',      $module.'_view:add_comment');
                //$router->add($module.'_create_attach',      '/demands/create/attach/',            "demands_form:attach");
                $router->add($module.'_create_attach', '/'.$module_path.'/create/attach/',             $module.'_form:attach');

                $router->add($module.'_get_next_prev',   '/'.$module_path.'/view/(id:num)/get_next_prev_id/',      $module.'_view:get_next_prev_id');
                $router->add($module.'_delete', '/'.$module_path.'/delete/(id:num)/',    $module.':delete');
            }

            $ar_controllers = array(
                "search", "notes", "todo", "demands_massedit", "files", "demands_search", "users_search", "contacts_search", "about", "phpinfo", "reports", "reports_tuning", "events", "events_tuning"
            );
            foreach ($ar_controllers as $controller) {
                $router->add($controller, '/'.str_replace('_', '/', $controller).'/', $controller);
            }

            $router->add('files_read_folder',       '/files/folder/(id:num)/',      'files:read_folder');
            $router->add('files_upload',            '/files/upload/',      'files:upload');
            $router->add('files_get_folders',       '/files/get_folders/',      'files:get_folders');
            $router->add('files_create_folder',     '/files/create_folder/',      'files:create_folder');
            $router->add('files_update_folders_order',   '/files/update_folders_order/',      'files:update_folders_order');
            $router->add('files_update_folder',     '/files/update_folder/(id:num)/',      'files:update_folder');
            $router->add('files_delete_folder',     '/files/delete_folder/(id:num)/',      'files:delete_folder');
            $router->add('files_delete_file',       '/files/delete_file/(id:num)/',      'files:delete_file');
            $router->add('files_move_file',       '/files/move_file/(id:num)/',      'files:move_file');

            $router->add('notes_add',               '/notes/create/',      'notes:create');
            $router->add('notes_delete',            '/notes/delete/(id:num)/',      'notes:delete');

            $router->add('todo_add',               '/todo/create/',      'todo:create');
            $router->add('todo_update',            '/todo/update/(id:num)/',      'todo:update');
            $router->add('todo_delete',            '/todo/delete/(id:num)/',      'todo:delete');
            $router->add('todo_set_status',        '/todo/set_status/(id:num)/',  'todo:set_status');

            $router->add('favorites',               '/favorites/',      'favorites');
            $router->add('favorites_view',          '/favorites/view/(id:any)/',      'favorites_view');
            $router->add('favorites_delete',        '/favorites/delete/(module_id:num)/(object_id:num)/',      'favorites:delete');
            $router->add('favorites_add',           '/favorites/add/(module_id:num)/(object_id:num)/',      'favorites:add');
            $router->add('favorites__get_next_prev',    '/favorites/view/(id:any)/get_next_prev_id/',      'favorites_view:get_next_prev_id');

            $router->add('trash',                   '/trash/',      'trash');
            $router->add('trash_view',              '/trash/view/(id:any)/',      'trash_view');
            $router->add('trash_delete',            '/trash/delete/(id:any)/',      'trash:delete');
            $router->add('trash_restore',           '/trash/restore/(id:any)/',      'trash:restore');
            $router->add('trash_clear',             '/trash/clear/',      'trash:clear');
            $router->add('trash__get_next_prev',    '/trash/view/(id:any)/get_next_prev_id/',      'trash_view:get_next_prev_id');

            $this->route = $router->match(GET_METHOD(), GET_PATH_INFO());

            if (!m_cuser::get_instance()->is_login() &&
                !in_array($this->route->getController(), array("auth_forgotpass"))) {

                $this->route = new MatchedRoute('auth_login');
            } elseif (!$this->route) {
                $this->route = new MatchedRoute('front:404');
            }

            $controller_name          = $this->route->getController();
            $controller_action        = $this->route->getAction();
            $controller_parameters    = $this->route->getParameters();

            $this->user_request["controller_name"] 	        = ($controller_name)?$controller_name:"dashboard";
            $this->user_request["controller_action"] 	    = ($controller_action)?"__action_".$controller_action:"process";
            $this->user_request["controller_parameters"]    = $controller_parameters;

        } catch (Exception $e) {

            header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);

            echo $e->getMessage();
            echo $e->getTraceAsString();
            exit;
        }
    }

    /**
     * @param $controller_info
     */
    private function apply_controller_info($controller_info) {
        /**
         * Ожидаем:
         * $result["title"]             = "page title";
         * $result["meta_title"]        = "meta title";
         * $result["meta_description"]  = "meta description";
         * $result["meta_keywords"]     = "meta keywords";
         */

        // Объеденяем основные настроки и настройки контроллера

        $layout = $modals = array();
        if (isset($controller_info["layout"])) {
            $layout = $controller_info["layout"];
            unset($controller_info["layout"]);
        }
        if (isset($controller_info["modal"])) {
            $modals = $controller_info["modal"];
            unset($controller_info["modal"]);
        }

        $this->controller_info = array_merge($this->controller_info, $controller_info);

        if ($layout) {
            $this->controller_info["layout"] = array_merge_recursive($this->controller_info["layout"], $layout);
            if (isset($layout["stateManagement__includeChildren"])) {
                $this->controller_info["layout"]["stateManagement__includeChildren"] = $layout["stateManagement__includeChildren"];
            }
        }

        if ($modals) {
            $this->controller_info["modal"] = array_merge_recursive($this->controller_info["modal"], $modals);
        }

        if (!isset($this->controller_info["title"])) {
            $this->controller_info["title"] = $this->controller_info["meta_title"];
        }

        if ($this->user_request["page"] !== false) {
            $this->controller_info["title"]             .=" (стр. ".$this->user_request["page"].")";
            $this->controller_info["meta_title"]        .=" (стр. ".$this->user_request["page"].")";
            $this->controller_info["meta_description"]  .=" (стр. ".$this->user_request["page"].")";
        }

    }

    private function __action_404() {
        echo "404 not fount";
        exit();
    }

    private function access_denied() {
        header("status: ".STATUS_FORBIDDEN);

        $this->controller_info["title"] = L::text_access_denied;
        cls_register::get_instance()->smarty->assign("controller_info", $this->controller_info);

        $controller_data    = cls_register::get_instance()->smarty->fetch("main/access_denied.tpl");

        if (cls_tools::get_instance()->is_ajax()) {
            $result["data"] = $controller_data;
            $result["status"] = STATUS_METHOD_NOT_ALLOWED;

            echo json_encode($result);
            exit;
        }

        cls_register::get_instance()->smarty->assign("controller_data", $controller_data);
    }

    public function process()
    {
        $this->get_user_request();
        $this->get_route();

        $controller_class       = "cnt_".$this->user_request["controller_name"];
        $controller_object      = new $controller_class;

        cls_register::get_instance()->smarty->assign("controller_origin_path", explode("_", $this->user_request["controller_name"]));
        cls_register::get_instance()->smarty->assign("controller_name", $this->user_request["controller_name"]);
        cls_register::get_instance()->smarty->assign("pane", $this->user_request["pane"]);

        $this->set_resource();

        if (!$controller_object->check_access($this->route->getAction(), $this->route->getParameters())) {
            $this->access_denied();

        } else {
            $process_result = call_user_func_array(array($controller_object, $this->user_request["controller_action"]), $this->user_request["controller_parameters"]);

            if (method_exists($controller_object, "get_info")) {
                $this->apply_controller_info($controller_object->get_info());
            }

            cls_register::get_instance()->smarty->assign("controller_info", $this->controller_info);

            $this->render = (isset($this->controller_info["render"]))?$this->controller_info["render"]:$this->user_request["render"];
            define("RENDER_MODE", $this->render);

            $this->check_system_alerts();

            if ($process_result) {
                $controller_data    = $controller_object->display($this->render);
                cls_register::get_instance()->smarty->assign("controller_data", $controller_data);
            }
        }


    }
}