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
 * Class cnt_contacts_types
 */
class cnt_contacts_types extends cls_controllerlist {

    /**
     * @return array
     */
        public function get_info() {
        $result = parent::get_info();

        $center__childOptions = array("name"=>"middle_layout");
        $center__childOptions["center"]   = array("size"=>"40%", "minWidth"=>'350', "onresize_end"=>"layout_resize_end");
        $center__childOptions["east"]     = array("size"=>"60%", "minSize"=>'350', "initClosed"=>config()->layout_west_initclosed );
        $result["layout"]["center"]["childOptions"]["center"]["childOptions"] = $center__childOptions;

        return $result;
    }

}


?>