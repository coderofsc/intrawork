<?php
/*
 * 1, 2, 4, 8, 16, 32, 64, 128, 256, 512, 1024, 2048, 4096, 8192,
 * 16384, 32768, 65536, 131072, 262144, 524288, 1048576, 2097152,
 * 4194304, 8388608, 16777216, 33554432, 67108864, 134217728, 268435456,
 * 536870912,
 */

class cls_modules {

    /* Модули */
    const MODULE_CATEGORIES     = 1;
    const MODULE_CONTACTS        = 2;
    const MODULE_DEMANDS        = 4;
    const MODULE_DEPARTMENTS    = 8;
    const MODULE_MROOMS         = 16;
    const MODULE_MROOMS_RESERVATIONS       = 32;
    const MODULE_NEWS           = 64;
    const MODULE_POSTS          = 128;
    const MODULE_ROLES          = 256;
    const MODULE_USERS          = 512;
    const MODULE_MAILBOTS       = 1024;
    //const MODULE_EVENTS       = 2048;
    //const MODULE_ATTR_SUITES  = 4096;
    const MODULE_FILES          = 8192;
    const MODULE_CONTACTS_TYPES = 16384;
    const MODULE_DEMANDS_TYPES = 32768;
    const MODULE_PROJECTS       = 65536;

    /* /Модули */

    static $ar_modules = array(
        self::MODULE_CATEGORIES     => array("name"=>L::modules_categories_name,     "icon"=>"sitemap", "alias"=>"categories", "morph"=>array(L::modules_categories_morph_one, L::modules_categories_morph_two, L::modules_categories_morph_five, L::modules_categories_morph_genitive), "possible_access_mode"=>array(m_roles::CRUD_U, m_roles::CRUD_C, m_roles::CRUD_D), "comments"=>false, "favorites"=>false),
        self::MODULE_CONTACTS       => array("name"=>L::modules_contacts_name,       "icon"=>"users", "alias"=>"contacts", "morph"=>array(L::modules_contacts_morph_one, L::modules_contacts_morph_two, L::modules_contacts_morph_five, L::modules_contacts_morph_genitive), "possible_access_mode"=>array(m_roles::CRUD_R, m_roles::CRUD_U, m_roles::CRUD_C, m_roles::CRUD_D), "comments"=>true, "favorites"=>true),
        self::MODULE_DEMANDS        => array("name"=>L::modules_demands_name,        "icon"=>"tasks", "alias"=>"demands", "morph"=>array(L::modules_demands_morph_one, L::modules_demands_morph_two, L::modules_demands_morph_five, L::modules_demands_morph_genitive), "possible_access_mode"=>array(m_roles::CRUD_U, m_roles::CRUD_C, m_roles::CRUD_D), "comments"=>false, "favorites"=>true),
        self::MODULE_DEPARTMENTS    => array("name"=>L::modules_departments_name, "icon"=>"users",  "alias"=>"departments", "morph"=>array(L::modules_departments_morph_one, L::modules_departments_morph_two, L::modules_departments_morph_five, L::modules_departments_morph_genitive), "possible_access_mode"=>array(m_roles::CRUD_R, m_roles::CRUD_U, m_roles::CRUD_C, m_roles::CRUD_D), "comments"=>false, "favorites"=>false),
        self::MODULE_MROOMS         => array("name"=>L::modules_mrooms_name,  "icon"=>"users", "alias"=>"mrooms", "morph"=>array(L::modules_mrooms_morph_one, L::modules_mrooms_morph_two, L::modules_mrooms_morph_five, L::modules_mrooms_morph_genitive), "possible_access_mode"=>array(m_roles::CRUD_R, m_roles::CRUD_U, m_roles::CRUD_C, m_roles::CRUD_D), "comments"=>false, "favorites"=>false),
        self::MODULE_MROOMS_RESERVATIONS       =>array("name"=>L::modules_mroomsres_name, "icon"=>"users", "alias"=>"mrooms/reservations", "morph"=>array(L::modules_mroomsres_morph_one, L::modules_mroomsres_morph_two, L::modules_mroomsres_morph_five, L::modules_mroomsres_morph_genitive), "possible_access_mode"=>array(m_roles::CRUD_R, m_roles::CRUD_U, m_roles::CRUD_C, m_roles::CRUD_D), "comments"=>false, "favorites"=>false),
        self::MODULE_NEWS           => array("name"=>L::modules_news_name,       "icon"=>"fa-newspaper-o", "alias"=>"news", "morph"=>array(L::modules_news_morph_one, L::modules_news_morph_two, L::modules_news_morph_five, L::modules_news_morph_genitive), "possible_access_mode"=>array(m_roles::CRUD_R, m_roles::CRUD_U, m_roles::CRUD_C, m_roles::CRUD_D), "comments"=>true, "favorites"=>true),
        self::MODULE_POSTS          => array("name"=>L::modules_posts_name,     "icon"=>"users", "alias"=>"posts", "morph"=>array(L::modules_posts_morph_one, L::modules_posts_morph_two, L::modules_posts_morph_five, L::modules_posts_morph_genitive), "possible_access_mode"=>array(m_roles::CRUD_R, m_roles::CRUD_U, m_roles::CRUD_C, m_roles::CRUD_D), "comments"=>false, "favorites"=>false),
        self::MODULE_ROLES          => array("name"=>L::modules_roles_name,          "icon"=>"users", "alias"=>"roles", "morph"=>array(L::modules_roles_morph_one, L::modules_roles_morph_two, L::modules_roles_morph_five, L::modules_roles_morph_genitive), "possible_access_mode"=>array(m_roles::CRUD_R, m_roles::CRUD_U, m_roles::CRUD_C, m_roles::CRUD_D), "comments"=>false, "favorites"=>true),
        self::MODULE_USERS          => array("name"=>L::modules_users_name,  "icon"=>"users", "alias"=>"users", "morph"=>array(L::modules_users_morph_one, L::modules_users_morph_two, L::modules_users_morph_five, L::modules_users_morph_genitive), "possible_access_mode"=>array(m_roles::CRUD_R, m_roles::CRUD_U, m_roles::CRUD_C, m_roles::CRUD_D), "comments"=>false, "favorites"=>true),
        self::MODULE_MAILBOTS       => array("name"=>L::modules_mailbots_name, "icon"=>"users", "alias"=>"mailbots", "morph"=>array(L::modules_mailbots_morph_one, L::modules_mailbots_morph_two, L::modules_mailbots_morph_five, L::modules_mailbots_morph_genitive), "possible_access_mode"=>array(m_roles::CRUD_R, m_roles::CRUD_U, m_roles::CRUD_C, m_roles::CRUD_D), "comments"=>false, "favorites"=>true),
        //self::MODULE_ATTR_SUITES    =>array("name"=>"Атрибуты заявк","alias"=>"", "morph"=>array("", "", ""), "possible_access_mode"=>array(m_roles::CRUD_R, m_roles::CRUD_U, m_roles::CRUD_C, m_roles::CRUD_D))
        self::MODULE_FILES       => array("name"=>L::modules_files_name, "icon"=>"files-o", "alias"=>"files", "morph"=>array(L::modules_files_morph_one, L::modules_files_morph_two, L::modules_files_morph_five, L::modules_files_morph_genitive), "possible_access_mode"=>array(m_roles::CRUD_R, m_roles::CRUD_U, m_roles::CRUD_C, m_roles::CRUD_D), "inside"=>true, "comments"=>false, "favorites"=>false),
        self::MODULE_CONTACTS_TYPES       => array("name"=>L::modules_contacts_types_name, "icon"=>"files-o", "alias"=>"contacts/types", "morph"=>array(L::modules_contacts_types_morph_one, L::modules_contacts_types_morph_two, L::modules_contacts_types_morph_five, L::modules_contacts_types_morph_genitive), "possible_access_mode"=>array(m_roles::CRUD_R, m_roles::CRUD_U, m_roles::CRUD_C, m_roles::CRUD_D)/*, "inside"=>true*/, "comments"=>false, "favorites"=>false),
        self::MODULE_DEMANDS_TYPES       => array("name"=>L::modules_demands_types_name, "icon"=>"files-o", "alias"=>"demands/types", "morph"=>array(L::modules_demands_types_morph_one, L::modules_demands_types_morph_two, L::modules_demands_types_morph_five, L::modules_demands_types_morph_genitive), "possible_access_mode"=>array(m_roles::CRUD_R, m_roles::CRUD_U, m_roles::CRUD_C, m_roles::CRUD_D)/*, "inside"=>true*/, "comments"=>false, "favorites"=>false),
        self::MODULE_PROJECTS       => array("name"=>L::modules_projects_name, "icon"=>"files-o", "alias"=>"projects", "morph"=>array(L::modules_projects_morph_one, L::modules_projects_morph_two, L::modules_projects_morph_five, L::modules_projects_morph_genitive), "possible_access_mode"=>array(m_roles::CRUD_R, m_roles::CRUD_U, m_roles::CRUD_C, m_roles::CRUD_D)/*, "inside"=>true*/, "comments"=>true, "favorites"=>true),
    );
}