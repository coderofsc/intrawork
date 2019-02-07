<?php
    /**
     * Smarty plugin - declension modifier
     * @package Smarty
     * @subpackage plugins
     */


function smarty_modifier_pass_time($seconds, $time = false, $latest=false)
{
    return cls_tools::get_instance()->remain_time2txt(time()+(time()-$seconds), $time, true, $latest);
}
?>