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
 * Class cnt_mrooms_form
 */
class cnt_mrooms_form extends cls_controllerform {
    protected $module_id = cls_modules::MODULE_MROOMS;

    /**
     * @return array
     */
    public function get_form_rules() {
        $form_rules[] = array("field"=>"name", "label"=>L::forms_labels_name, "rules"=>array("required"=>L::validate_message_required));
        $form_rules[] = array("field"=>"bgcolor", "label"=>L::forms_labels_mrooms_color, "rules"=>array("regexp[/#([a-f]|[A-F]|[0-9]){3}(([a-f]|[A-F]|[0-9]){3})?\\b/]"=>L::validate_message_hex_color));

        return $form_rules;
    }

    /**
     * @param bool $id
     * @return bool
     */
    public function process($id = false)
    {
        parent::process($id);

        if (!$this->data) {
            $rand_color = cls_tools::get_instance()->random_color();
            cls_register::get_instance()->smarty->assign("rand_color", $rand_color);
        }

		return true;
	}
}


?>