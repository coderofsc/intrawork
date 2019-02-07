<?php

class cls_storage {

    private $storage_dir        = STORAGE_DIR;
    private $root_host          = HOST_ROOT;
    private $root_doc           = DOC_ROOT;

    private $thumb_size         = array("xs"=>32, "sm"=>128, "md"=>320);
    private $owner, $owner_id   = 0;
    private $current_dir        = '';

    private $crop = array();
    private $used = false, $user_eid = 0;

    private $file = array();

    private function __construct($owner, $owner_id = 0)
    {
        $this->user_eid = (m_cuser::get_instance()->is_login())?m_cuser::get_instance()->get("id"):0;
        $this->owner    = $owner;
        $this->owner_id = $owner_id;
    }

    public static function for_owner($owner, $owner_id = 0)
    {
        $instance = new cls_storage($owner, $owner_id);
        return $instance;
    }

    public static function hash2dir($hash) {
        return substr($hash, 0, 2)."/".substr($hash, 2, 2)."/".substr($hash, 4, 2)."/";
    }

    private function build_path($dir, $host = false) {
        $path = $this->storage_dir.($this->current_dir?$this->current_dir:"").$dir;

        if ($host) {
            return $this->root_host.$path;
        } else {
            return $this->root_doc.$path;
        }
    }

    private function create_dir($dir, $mode = 0777) {
        if (!file_exists($dir)) {
            return mkdir($dir, $mode, true);
        }

        return true;
    }

    private function delete_dir($dir) {
        if (file_exists($dir)) {
            return rmdir($dir);
        }

        return true;
    }

    private function get_extension($filename) {
        return substr(strrchr($filename, '.'), 1);
    }

    private function get_file_info($name) {
        $this->file["name"] 		= pathinfo($_FILES[$name]['name'], PATHINFO_FILENAME);
        $this->file["mimetype"] 	= $_FILES[$name]['type'];
        $this->file["ext"] 		    = strtolower($this->get_extension($_FILES[$name]['name']));
        $this->file["hash"] 		= cls_tools::get_instance()->gen_hash();
        $this->file["dir"]          = cls_storage::hash2dir($this->file["hash"]);
        $this->file["root"]         = $this->current_dir;
        $this->file["filename"]     = $this->file["hash"];
        $this->file["owner"]        = $this->owner;
        $this->file["owner_hash"]   = sha1($this->owner_id);
        $this->file["owner_id"]     = $this->owner_id;
        $this->file["user_eid"]     = $this->user_eid;
        $this->file["used"]           = ($this->used)?1:0;


    }

    private function get_file_path() {
        return $this->build_path($this->file["dir"]).$this->file["filename"].".".$this->file["ext"];
    }

    private function create_thumbs($crop = array()) {
        $ar_image_mime = array('image/jpeg', 'image/gif', 'image/png', 'image/bmp');

        $result = false;

        if (in_array($this->file["mimetype"], $ar_image_mime)) {
            $thumbs_dir = $this->build_path($this->file["dir"])."thumbs/";
            $this->create_dir($thumbs_dir);
            require_once(DOC_ROOT.'classes/class.upload.php');

            foreach ($this->thumb_size as $name=>$size) {
                $result = cls_tools::get_instance()->convert_image($this->get_file_path(), $thumbs_dir, $this->file["filename"]."_".$name, $size, $size, $crop, "jpg", false, false, false, true);
            }
        }

        return $result;
    }

    private function save() {
        $orm = ORM_EXT::for_table("file_storage");

        $data = $this->file;
        unset($data["owner_id"], $data["storage_id"]);
        $orm->create($data);

        if ($this->owner_id && $this->used) {
            ORM_EXT::raw_execute("UPDATE file_storage SET used=? WHERE owner=? AND owner_hash=?", array(0, $this->owner, sha1($this->owner_id)));
        }

        if ($rrr = $orm->save()) {
            $this->file["storage_id"] = $orm->id();
            return true;
        } else {
            return false;
        }
    }

    public function set_dir($dir) {
        $this->current_dir = $dir;
        return $this;
    }

    public function set_user_eid($user_eid) {
        $this->user_eid = $user_eid;
        return $this;
    }

    public function set_crop($crop) {
        $this->crop = $crop;
        return $this;
    }

    public function set_used($used = false) {
        $this->used = $used;
        return $this;
    }

    public function upload($name, $uploaded = true) {
        if ((!$uploaded && !file_exists($_FILES[$name]['tmp_name'])) || ($uploaded && !is_uploaded_file($_FILES[$name]['tmp_name']))) {
            return false;
        }

        $this->get_file_info($name);

        $result = true;

        if ($this->create_dir($this->build_path($this->file["dir"]))) {
            if (($uploaded && move_uploaded_file($_FILES[$name]['tmp_name'], $this->get_file_path())) ||
                (!$uploaded && rename($_FILES[$name]['tmp_name'], $this->get_file_path()))) {

                $this->file["size"] = filesize($this->get_file_path());
                $this->file["thumb"] = intval($this->create_thumbs($this->crop));
                if (!$this->save()) {
                    $result = false;
                }
            } else {
                $this->delete_dir($this->build_path($this->file["dir"]));
            }
        }

        return ($result)?$this->file:false;
    }

    public function copy($file, $name = false) {

        if (!$name) {
            $finfo = pathinfo($file);
            $name = $finfo["basename"];
        }

        $index = uniqid();
        $_FILES[$index]["name"] = $name;
        $_FILES[$index]["tmp_name"] = $file;
        $_FILES[$index]["type"] = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $file);

        return $this->upload($index, false);
    }

    public function delete($hash) {
        if (!$orm = ORM_EXT::for_table("file_storage")->where_equal("hash", $hash)->where_equal("owner", $this->owner)->find_one()) {
            return false;
        }

        $file = $orm->as_array();

        $storage_path = $this->root_doc.$this->storage_dir.$file["root"].self::hash2dir($file["hash"]);

        $filename_thumb = $storage_path."thumbs/".$file["filename"].".".$file["ext"];
        $filename = $storage_path.$file["filename"].".".$file["ext"];

        @unlink($filename_thumb);
        @unlink($filename);

        return $orm->delete();

    }

}

?>
