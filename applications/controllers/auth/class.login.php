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

/**
 * Class cnt_auth_login
 */
class cnt_auth_login extends cls_controller {
    private $validate_result = true;
    protected $login_data;

    /**
     * @return array
     */
    public function get_info() {
        $result = array();
        $result["title"] = L::modules_login_name;

        $result["render"] = RENDER_LOGIN;

        return $result;
    }

    /**
     * cnt_auth_login constructor.
     */
    public function __construct()
	{
	}


    public function get_user_request()
    {
        $this->login_data = $_REQUEST["login_data"];

        if (isset($_POST["login"])) {

            if (($ar_errors = $this->validate()) !== true) {
                cls_alerts::get_instance()->add(array_values($ar_errors), ALERT_ERROR);
            } else {

                cls_alerts::get_instance()->add(L::text_welcome.", ".m_cuser::get_instance()->get("name"), ALERT_SUCCESS);

                if (!($current_url = cls_tools::get_instance()->get_current_url())) {
                    if ($restore_location = m_cuser::get_instance()->restore_location()) {
                        $current_url = $restore_location;
                    }
                }

                if ($current_url) {
                    header("location: ".HOST_ROOT.$current_url);
                } else {
                    header("location: ".HOST_ROOT);
                }

                exit();
            }
        }

    }

    /**
     * @return array|bool
     */
    public function validate()
    {
        $form_rules[] = array("field"=>"email", "label"=>L::forms_labels_email, "rules"=>array("required"=>L::validate_message_required, "valid_email"=>L::validate_message_valid_email));
        $form_rules[] = array("field"=>"password", "label"=>L::forms_labels_password, "rules"=>array("required"=>L::validate_message_required));

        $validator = new cls_validator($this->login_data);
        $validator->set_rules($form_rules);
        $this->validate_result = $validator->run();

        if (!$this->validate_result) {
            return $validator->get_array_errors();
        } else {

           $login_result = m_cuser::get_instance()->login($this->login_data["email"], $this->login_data["password"], true);

            if (!$login_result) {
                return array(L::validate_message_login_unknown_user);
            } elseif ($login_result["block"]) {
                m_cuser::get_instance()->logout();
                return array("Пользователь <strong>".$login_result["name"]." заблокирован</strong> администратором."); // администрацией сайта
            }
        }

        return true;
    }


    /**
     * @param int $render
     * @return string
     * @throws Exception
     * @throws SmartyException
     */
    public function display($render = RENDER_DEFAULT)
	{
		return cls_register::get_instance()->smarty->fetch("login.tpl");
	}

    /**
     * @return bool
     */
    public function process()
	{
		$this->get_user_request();

		return true;
	}
}


?>