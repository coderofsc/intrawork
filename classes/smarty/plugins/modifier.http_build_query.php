<?php
    /**
     * Smarty plugin - declension modifier
     * @package Smarty
     * @subpackage plugins
     */


function smarty_modifier_http_build_query($array, $name)
{
    if ($name) {
        return http_build_query(array($name=>$array));
    }

    return http_build_query($array);

}
?>