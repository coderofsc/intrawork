<?php
function smarty_modifier_mb_ucfirst($string)
{
    return cls_tools::get_instance()->mb_ucfirst($string);
}
?>