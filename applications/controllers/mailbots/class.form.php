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
 * Class cnt_mailbots_form
 */
class cnt_mailbots_form extends cls_controllerform {
    protected $data_prefix = "mb";
    protected $module_id = cls_modules::MODULE_MAILBOTS;


    /**
     * @return array
     */
    public function get_form_rules()
    {
        $form_rules[] = array("field"=>"name",      "label"=>L::forms_labels_name, "rules"=>array("required"=>L::validate_message_required));

        if ($this->data["status"]) {
            $form_rules[] = array("field"=>"server",    "label"=>L::forms_labels_mailbots_server, "rules"=>array("required"=>L::validate_message_required));
            $form_rules[] = array("field"=>"port",      "label"=>L::forms_labels_mailbots_port, "rules"=>array("required"=>L::validate_message_required));
            $form_rules[] = array("field"=>"login",     "label"=>L::forms_labels_mailbots_login, "rules"=>array("required"=>L::validate_message_required));
            $form_rules[] = array("field"=>"password",  "label"=>L::forms_labels_password, "rules"=>array("required"=>L::validate_message_required));
        }

        return $form_rules;
    }

    /**
     * @return array|bool
     */
    public function validate() {
        if (($result = parent::validate()) === true && $this->data["status"]) {

            $result = array();

            require dirname(__FILE__).'/../../../classes/imap/Mailbox.php';

            $mailbox = new PhpImap\Mailbox('{'.$this->data["server"].':'.$this->data["port"].'/ssl}INBOX', $this->data["login"], $this->data["password"]);

            $connect = true;
            try {
                $mailbox->getImapStream();
            } catch (Exception $e) {
                $result["server"] = $e->getMessage();
                $connect = false;
            }

            if($connect && ($message_count = $mailbox->countMails())) {
                $result["server"] = sprintf(L::validate_message_mailbots_mailbox_not_clear,$message_count, cls_tools::get_instance()->word_declension($message_count, [L::text_message_morph_one, L::text_message_morph_two, L::text_message_morph_five]));//"В почтовом ящике обнаружено ".$message_count." ".cls_tools::get_instance()->word_declension($message_count, ["сообщение", "сообщения", "сообщений"]).". Удалите все сообщения в нем.";
            }

        }

        return sizeof($result)?$result:true;
    }

    /**
     * @param bool $id
     * @return bool
     */
    public function process($id = false)
    {

        $mailbot_master = m_mailbots::get_instance()->count(array("master"=>1));
        cls_register::get_instance()->smarty->assign("mailbot_master", $mailbot_master);


        if (!$id && config()->limit->mailbots_limit) {
            if ($count = m_mailbots::get_instance()->count() >= config()->limit->mailbots_limit) {
                cls_register::get_instance()->smarty->assign("record_limit", true);
                return true;
            }
        }

        parent::process($id);

        /*$ar_conditions      = array();
        $ar_categories      = m_categories::get_instance()->get_array($ar_conditions, 30);
        $ar_tree_categories = cls_tools::get_instance()->map_tree($ar_categories);
        cls_register::get_instance()->smarty->assign("ar_tree_categories", $ar_tree_categories);
        */
        return true;
	}
}


?>