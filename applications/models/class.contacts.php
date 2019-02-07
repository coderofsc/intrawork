<?php
/*
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

defined('CORE_INTRAWORK_WS') or die('Отсутствует прямой доступ к файлу');

class m_contacts extends cls_model {
    private static $instance;

    public $pre_delete      = true;

    public $sort    = array("dir"=>SORT_ASC_AZ, "by"=>"create_date");
    public $ar_sort = array(
        "surname"       => array("name"=>L::forms_labels_face_surname),
        "name"          => array("name"=>L::forms_labels_face_name),
        "legal"          => array("name"=>L::forms_labels_contacts_legal),
        "create_date"   => array("name"=>L::forms_labels_registration_date),
    );

    public $master_field = "face_full_fio";
    public $ar_field = array(
        "fio"           => L::forms_labels_fio,
        "public"        => "Общий контакт",
        "legal"         => L::forms_labels_contacts_legal,
        "type_id"       => L::forms_labels_contacts_type,
        "company"       => L::forms_labels_contacts_company_name,
        "phone"         => L::forms_labels_phone,
        "email"         => L::forms_labels_email,
        "reg_start"     => "Регистрация &le;",
        "reg_end"       => "Регистрация &ge;",
        "face_name"     => L::forms_labels_face_name,
        "face_surname"  => L::forms_labels_face_surname,
        "face_patronymic" => L::forms_labels_face_patronymic,
        "opf"           => L::forms_labels_contacts_opf,
        "phone_mobile"  => L::forms_labels_phone_mobile,
        "site"          => L::forms_labels_site,
        "descr"         => L::forms_labels_descr
    );

    private function __clone() { }

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function conditions_decode($ar_condition) {

        $ar_dictionary_field = array();

        if (isset($ar_condition["legal"])) {
            $ar_dictionary_field["legal"] = array("dictionary"=>array(NATURAL_PERSON=>array("name"=>"Физическое лицо"), LEGAL_PERSON=>array("name"=>"Юридическое лицо")), "field"=>"name");
        }

        if (isset($ar_condition["type_id"])) {
            if (isset($ar_condition["type_id"])) { $ar_dictionary_field["type_id"] = array("dictionary"=>m_contacts_types::get_instance()->get_array(array("id"=>$ar_condition["type_id"])), "field"=>"name"); }
        }

        return parent::conditions_decode($ar_condition, $ar_dictionary_field);
    }

    public function get_raw_conditions($ar_conditions, $deleted = false) {
        $raw_conditions = parent::get_raw_conditions($ar_conditions, $deleted);

        if ($ar_conditions["legal"]) {
            $raw_conditions[] = cls_tools::get_instance()->build_sql_equal($this->orm_table.".legal", $ar_conditions["legal"]);
            //$orm->where_equal($this->orm_table.".legal", $ar_conditions["legal"]);
        }

        if (isset($ar_conditions["public"])) {
            $raw_conditions[] = cls_tools::get_instance()->build_sql_equal($this->orm_table.".public", $ar_conditions["public"]);
            //$orm->where_equal($this->orm_table.".legal", $ar_conditions["legal"]);
        }

        if (isset($ar_conditions["type_id"])) {
            $raw_conditions[] = cls_tools::get_instance()->build_sql_equal($this->orm_table.".type_id", $ar_conditions["type_id"]);
            //$orm->where_equal($this->orm_table.".type_id", $ar_conditions["type_id"]);
        }

        if (isset($ar_conditions["email"])) {
            $raw_conditions[] = cls_tools::get_instance()->build_sql_equal($this->orm_table.".face_email", $ar_conditions["email"]);
            //$orm->where_equal($this->orm_table.".face_email", $ar_conditions["email"]);
        }

        if (isset($ar_conditions["phone"])) {
            $raw_conditions[] = "CONCAT_WS(' ', ".$this->orm_table.".phone) LIKE ('%".$ar_conditions["phone"]."%')";
            //$orm->where_raw("CONCAT_WS(' ', ".$this->orm_table.".phone) LIKE ('%".$ar_conditions["phone"]."%')");
        }

        if (isset($ar_conditions["company"])) {
            $raw_conditions[] = cls_tools::get_instance()->build_sql_like($this->orm_table.".company", $ar_conditions["company"]);
            //$orm->where_like($this->orm_table.".company", $ar_conditions["company"]);
        }

        if (isset($ar_conditions["fio"])) {
            $raw_conditions[] = "CONCAT_WS(' ', ".$this->orm_table.".face_surname, ".$this->orm_table.".face_name, ".$this->orm_table.".face_patronymic) LIKE ('%".$ar_conditions["fio"]."%')";
            //$orm->where_raw("CONCAT_WS(' ', ".$this->orm_table.".face_surname, ".$this->orm_table.".face_name, ".$this->orm_table.".face_patronymic) LIKE ('%".$ar_conditions["fio"]."%')");
        }

        if (isset($ar_conditions["reg_start"])) {
            $raw_conditions[] = $this->orm_table.".create_date >= '".$ar_conditions["reg_start"]."'";
            //$orm->where_gte($this->orm_table.".create_date", $ar_conditions["reg_start"]);
        }
        if (isset($ar_conditions["reg_end"])) {
            $raw_conditions[] = $this->orm_table.".create_date <= '".$ar_conditions["reg_end"]." 23:59:59'";
            //$orm->where_lte($this->orm_table.".create_date", $ar_conditions["reg_end"]);
        }

        if (!m_cuser::get_instance()->check_access_module($this->module_id, m_roles::CRUD_R)) {
            $raw_conditions[] = cls_tools::get_instance()->build_sql_equal($this->orm_table.".user_id", m_cuser::get_instance()->get("id"));
        } else {
            $raw_conditions[] = "(".$this->orm_table.".user_id = ".m_cuser::get_instance()->get("id")." OR ".$this->orm_table.".public=1)";
        }

        return $raw_conditions;
    }


    protected  function set_conditions(ORM_EXT &$orm, $ar_conditions, $deleted)
    {
        parent::set_conditions($orm, $ar_conditions, $deleted);


    }


    protected function set_select(ORM_EXT &$orm) {
        parent::set_select($orm);

        $orm->select("ct.name", "type_name");
        $orm->left_outer_join("contacts_types", "ct.id = ".$this->orm_table.".type_id", "ct");

        $orm->select_expr("CONCAT_WS(' ', contacts.face_surname, contacts.face_name, IF (contacts.face_patronymic<>'', contacts.face_patronymic, NULL))", "face_full_fio");
        $orm->select_expr("CONCAT(contacts.face_surname, ' ', LEFT(contacts.face_name,1 ),'.', IF(contacts.face_patronymic<>'', CONCAT(LEFT(contacts.face_patronymic, 1),'.'),''))", "face_short_fio");
        $orm->select_expr("CONCAT_WS(' ', IF(contacts.opf<>'',contacts.opf, NULL), contacts.company)", "company_full_name");

        //$orm->select_expr("CONCAT_WS(', ', IF (contacts.company!='',CONCAT_WS(' ', IF(contacts.opf<>'',contacts.opf, ''), contacts.company),NULL), CONCAT(contacts.face_surname, ' ', LEFT(contacts.face_name,1 ),'.', IF(contacts.face_patronymic<>'', CONCAT(LEFT(contacts.face_patronymic, 1),'.'),'')))", "fio");

        $orm->select("file_storage.hash", "avatar_storage_hash");
        $orm->select("file_storage.ext", "avatar_storage_ext");
        $orm->left_outer_join("file_storage", "(file_storage.owner_hash = SHA1(contacts.id) AND file_storage.owner=".OWNER_CONTACT." AND file_storage.used=1)");

        $orm->select_expr("(SELECT COUNT(*) FROM demands d WHERE d.contact_id = ".$this->orm_table.".id)", "demands_count");
    }

    protected function set_save_data(ORM_EXT &$orm, $data, $id = 0) {

        if (!$id) {
            $orm->set("user_id",                  intval(m_cuser::get_instance()->get("id")));
        }

        $orm->set("public",                 isset($data["public"])?1:0);

        $orm->set("legal",                  intval($data["legal"]));
        $orm->set("type_id",                intval($data["type_id"]));
        $orm->set("opf",                    trim($data["opf"]));
        $orm->set("company",                trim($data["company"]));
        $orm->set("face_surname",           trim($data["face_surname"]));
        $orm->set("face_name",              trim($data["face_name"]));
        $orm->set("face_patronymic",        trim($data["face_patronymic"]));
        $orm->set("bank_account",           trim($data["bank_account"]));
        $orm->set("bank_offset_account",    trim($data["bank_offset_account"]));
        $orm->set("bank_name",              trim($data["bank_name"]));
        $orm->set("bank_inn",               trim($data["bank_inn"]));
        $orm->set("bank_kpp",               trim($data["bank_kpp"]));
        $orm->set("bank_bik",               trim($data["bank_bik"]));
        $orm->set("legal_address",          trim($data["legal_address"]));
        $orm->set("email",                  trim($data["email"]));
        $orm->set("phone",                  trim($data["phone"]));
        $orm->set("phone_ext",              trim($data["phone_ext"]));
        $orm->set("phone_mobile",           trim($data["phone_mobile"]));
        $orm->set("icq",                    trim($data["icq"]));
        $orm->set("skype",                  trim($data["skype"]));
        $orm->set("address",                trim($data["address"]));
        $orm->set("site",                   trim($data["site"]));
        $orm->set("descr",                  trim($data["descr"]));
    }

}

?>
