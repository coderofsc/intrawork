    <?php
function smarty_modifier_ts2hours($time=true, $full = true, $not_null = false)
{
    //if (!$time) return "0 часов";

    return cls_tools::get_instance()->ts2hours($time, $full, $not_null);

}
    ?>