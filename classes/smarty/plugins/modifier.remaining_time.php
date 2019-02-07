<?php
    /**
     * Smarty plugin - declension modifier
     * @package Smarty
     * @subpackage plugins
     */


function smarty_modifier_remaining_time($seconds, $time = false, $full=false)
{
    return cls_tools::get_instance()->remain_time2txt($seconds, $time, $full);
}
   ?>