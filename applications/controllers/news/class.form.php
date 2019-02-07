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
 * Class cnt_news_form
 */
class cnt_news_form extends cls_controllerform {
    protected $data_prefix = "news";
    protected $module_id = cls_modules::MODULE_NEWS;

    //protected $attach_storage_dir = STORAGE_DIR_COMMENTS_NEWS;
    //protected $attach_owner = OWNER_COMMENT;

    /**
     * @return array
     */
    public function get_form_rules()
    {
        $form_rules[] = array("field"=>"title", "label"=>L::forms_labels_title, "rules"=>array("required"=>L::validate_message_required));
        $form_rules[] = array("field"=>"news", "label"=>L::forms_labels_news_news, "rules"=>array("required"=>L::validate_message_required));
        return $form_rules;
    }
}


?>