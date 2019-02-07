<option value="0">Нет</option>
<option {if $dt_data.auto_complete_notice == $smarty.const.TIME_HOUR}selected=""{/if} value="{$smarty.const.TIME_HOUR}">Час</option>
<option {if $dt_data.auto_complete_notice == $smarty.const.TIME_HOUR*3}selected=""{/if} value="{$smarty.const.TIME_HOUR*3}">3 часа</option>
<option {if $dt_data.auto_complete_notice == $smarty.const.TIME_HOUR*6}selected=""{/if} value="{$smarty.const.TIME_HOUR*6}">6 часов</option>
<option {if $dt_data.auto_complete_notice == $smarty.const.TIME_HOUR*12}selected=""{/if} value="{$smarty.const.TIME_HOUR*12}">12 часов</option>
<option {if $dt_data.auto_complete_notice == $smarty.const.TIME_DAY}selected=""{/if} value="{$smarty.const.TIME_DAY}">Сутки</option>
<option {if $dt_data.auto_complete_notice == $smarty.const.TIME_HOUR*36}selected=""{/if} value="{$smarty.const.TIME_HOUR*36}">36 часов</option>
