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
 * Class cnt_files
 */
class cnt_files extends cls_controllerlist {

    /**
     * @param $action
     * @param array $parameters
     * @return bool
     */
    function check_access($action, $parameters = array()) {
        if ($this->module_id) {
            switch ($action) {
                case "delete"   : $action_crud = m_roles::CRUD_D; break;
                default         : $action_crud = m_roles::CRUD_R; break;
            }
            //return m_cuser::get_instance()->check_access_module($this->module_id, $action_crud);
            return true;
        }
        return true;
    }


    /**
     * @param $folder_id
     * @throws Exception
     * @throws SmartyException
     */
    public function __action_read_folder($folder_id) {

        $ar_files = m_files::get_instance()->get_array(array("folder_id"=>intval($folder_id)), false);
        //echo ORM_EXT::get_last_query();
        //exit;

        $result = array();

        $result["status"] = STATUS_OK;

        $result["total"] = sizeof($ar_files);

        foreach ($ar_files as $file) {
            cls_register::get_instance()->smarty->assign("file", $file);
            $result["data"].=cls_register::get_instance()->smarty->fetch("files/item.tpl");
        }

        echo json_encode($result);
        exit;
    }

    public function __action_upload() {

        $folder_id = isset($_POST["folder_id"])?intval($_POST["folder_id"]):0;

        $result = array();
        $result["status"] = 0;

        $fs = cls_storage::for_owner(OWNER_FILE_FOLDER);
        $fs->set_dir(STORAGE_DIR_FILES);

        if ($result = $fs->upload("file")) {

            if ($file_id = m_files::get_instance()->save(0, array("storage_id"=>$result["storage_id"], "folder_id"=>$folder_id))) {
                cls_register::get_instance()->smarty->assign("file", m_files::get_instance()->get_one($file_id));
                $result["status"] = 1;
                $result["item"] = cls_register::get_instance()->smarty->fetch("files/item.tpl");
            }
        }

        echo json_encode($result);
        exit;
    }

    /**
     * @return array|bool
     */
    private function get_tree_folders() {
        $ar_folders = (m_files_folders::get_instance()->get_array(array(), false));

        if (m_cuser::get_instance()->check_access_module(cls_modules::MODULE_FILES, m_roles::CRUD_R)) {
            $ar_folders[FILE_PUBLIC] = array("name"=>"Общие файлы",     "parent_id"=>0, "id"=>1);
        }

        return cls_tools::get_instance()->map_tree($ar_folders);
    }

    public function __action_get_folders() {


        cls_register::get_instance()->smarty->assign("ar_tree_folders", $this->get_tree_folders());

        $result = array();
        $result["data"] = cls_register::get_instance()->smarty->fetch("files/folders.tpl");

        echo json_encode($result);
        exit;
    }

    public function __action_create_folder() {
        $result = array();
        $result["status"] = STATUS_BAD_REQUEST;

        $name = isset($_POST["name"])?$_POST["name"]:false;
        $parent_id = isset($_POST["parent_id"])?$_POST["parent_id"]:false;

        if ($name) {
            $result["status"] = STATUS_OK;
            m_files_folders::get_instance()->save(0, array("name"=>$name, "parent_id"=>$parent_id));
        }

        echo json_encode($result);
        exit;
    }

    /**
     * @param $folder_id
     */
    public function __action_update_folder($folder_id) {
        $result = array();
        $result["status"] = STATUS_BAD_REQUEST;

        $name = isset($_POST["name"])?$_POST["name"]:false;

        if ($name && $folder_id) {
            $result["status"] = STATUS_OK;
            m_files_folders::get_instance()->save($folder_id, array("name"=>$name));
        }

        echo json_encode($result);
        exit;
    }

    public function __action_update_folders_order() {
        $json = isset($_POST["json"])?$_POST["json"]:false;
        $orders = cls_tools::get_instance()->flatten_json_tree($json);

        $result["status"] = (m_files_folders::get_instance()->update_orders($orders))?STATUS_OK:STATUS_BAD_REQUEST;

        echo json_encode($result);
        exit();
    }

    /**
     * @param $folder_id
     */
    public function __action_delete_folder($folder_id) {
        $result = array();
        $result["status"] = STATUS_BAD_REQUEST;

        if ($folder_id) {

            $ar_tree_folders = $this->get_tree_folders();

            $ar_result   = cls_tools::get_instance()->map_tree_children($folder_id, $ar_tree_folders);
            $ar_result[] = $folder_id;


            $count_files = $count_folders = 0;
            foreach ($ar_result as $folder_id) {

                // Удалаем файлы папки
                $ar_files = m_files::get_instance()->get_array(array("folder_id"=>$folder_id), false);
                foreach ($ar_files as $file) {
                    if (m_files::get_instance()->delete($file["id"])) {
                        $count_files++;
                    }
                }

                // Удаляем саму папки
                if (m_files_folders::get_instance()->delete($folder_id)) {
                    $count_folders++;
                }
            }

            $result["count_files"]      = $count_files;
            $result["count_folders"]    = $count_folders;
            $result["status"]           = STATUS_OK;

        }

        echo json_encode($result);
        exit;
    }

    /**
     * @param $id
     */
    public function __action_delete_file($id) {
        $result = array();
        $result["status"] = STATUS_BAD_REQUEST;

        $folder_id = isset($_POST["folder_id"])?$_POST["folder_id"]:false;

        if ($id) {
            $result["status"] = STATUS_OK;
            m_files::get_instance()->delete($id);
        }

        echo json_encode($result);
        exit;
    }

    /**
     * @param $id
     */
    public function __action_move_file($id) {
        $result = array();
        $result["status"] = STATUS_BAD_REQUEST;

        $folder_id = isset($_POST["folder_id"])?$_POST["folder_id"]:false;

        if ($id && $folder_id !== false) {
            if (m_files::get_instance()->move($id, $folder_id)) {
                $result["status"] = STATUS_OK;
            }
        }

        echo json_encode($result);
        exit;
    }


    public function get_user_request() {
        parent::get_user_request();

        if (!isset($this->user_request["conditions"]["folder_id"])) {
            $this->user_request["conditions"]["folder_id"] = 0;
        }
    }


    /**
     * @return array
     */
    public function get_info() {

        $result = array();
        $result["meta_title"] = "Файловый менеджер";
        //$result["modal"] = array("folder-edit");

        //$result["actions"][] = array("name"=>'<span class="hidden-xs">'.L::actions_create.'</span>', "modal"=>true, "inline"=>true, "icon"=>"plus", "href"=>"#modal-note");

        $center__childOptions = array("name"=>"middle_layout");
        $center__childOptions["west"]     = array("size"=>"30%", "minSize"=>'250', "initClosed"=>false );
        $center__childOptions["center"]   = array("size"=>"70%", "minWidth"=>'350', "onresize_end"=>"layout_resize_end");
        $result["layout"]["center"]["childOptions"]["center"]["childOptions"] = $center__childOptions;


        return $result;
    }

    /**
     * @return bool|void
     */
    public function process() {

        return parent::process();
    }


}
