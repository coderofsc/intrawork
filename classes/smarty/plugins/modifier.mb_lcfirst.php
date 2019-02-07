<?php
function smarty_modifier_mb_lcfirst($string)
{
    return cls_tools::get_instance()->mb_lcfirst($string);
}
?>