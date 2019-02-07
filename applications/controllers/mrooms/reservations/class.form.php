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
 * Class cnt_mrooms_reservations_form
 */
class cnt_mrooms_reservations_form extends cls_controllerform {
    protected   $data_prefix = "mrr";

    /**
     * @return array
     */
    public function get_info() {

        $result["path"][] = array("title"=>L::modules_mrooms_name, "url"=>"mrooms/");
        $result = array_merge_recursive($result, parent::get_info());
        //$result["title"] = "Резервирование переговорной";

        $center__childOptions = array();
        $center__childOptions["center"]   = array("size"=>"60%", "minWidth"=>'350', "onresize_end"=>"layout_resize_end");
        $center__childOptions["east"]     = array("size"=>"40%", "minSize"=>'350');
        $result["layout"]["center"]["childOptions"]["center"]["childOptions"] = $center__childOptions;


        return $result;
    }

    /**
     * @return array
     */
    public function get_form_rules()
    {
        $form_rules[] = array("field"=>"mroom_id", "label"=>cls_tools::get_instance()->mb_ucfirst(L::modules_mailbots_morph_one), "rules"=>array("required"=>L::validate_message_required));
        $form_rules[] = array("field"=>"start", "label"=>L::forms_labels_mroomsres_start, "rules"=>array("required"=>L::validate_message_required));
        $form_rules[] = array("field"=>"end",   "label"=>L::forms_labels_mroomsres_end, "rules"=>array("required"=>L::validate_message_required));
        return $form_rules;
    }


    /**
     * @param bool $id
     * @return bool
     */
    public function process($id = false)
    {
        parent::process($id);

        $ar_conditions = array();
        $ar_mrooms = m_mrooms::get_instance()->get_array($ar_conditions, false);
        cls_register::get_instance()->smarty->assign("ar_mrooms", $ar_mrooms);

		return true;
	}
}


?>