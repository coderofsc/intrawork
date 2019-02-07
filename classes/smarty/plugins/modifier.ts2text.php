    <?php
    /**
     * Smarty plugin - declension modifier
     * @package Smarty
     * @subpackage plugins
     */


    /**
     * Модификатор declension: склонение существительных
     *
     * @param int $count
     * @param string $forms
     * @return string
     */
function smarty_modifier_ts2text($today, $time=true, $month_fupper=false, $mon_short = true)
{
    if (!$today) return false;

    return cls_tools::get_instance()->ts2text($today, $time, $month_fupper, $mon_short);

}
    ?>