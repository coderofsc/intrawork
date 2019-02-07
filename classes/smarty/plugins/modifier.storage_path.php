<?php
    /**
     * Smarty plugin - declension modifier
     * @package Smarty
     * @subpackage plugins
     */


function smarty_modifier_storage_path($hash, $root)
{
    //cls_storage::get_instance()->set_root_folder($root);
    $dir = cls_storage::hash2dir($hash);

    return HOST_ROOT.STORAGE_DIR.$root.$dir;//cls_storage::get_instance()->build_path($dir, true);
}
   ?>