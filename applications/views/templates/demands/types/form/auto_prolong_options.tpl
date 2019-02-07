<option value="0">Нет</option>
<option {if $dt_data.auto_prolong == $smarty.const.TIME_HOUR/2}selected=""{/if} value="{$smarty.const.TIME_HOUR/2}">30 минут</option>
<option {if $dt_data.auto_prolong == $smarty.const.TIME_HOUR}selected=""{/if} value="{$smarty.const.TIME_HOUR}">Час</option>
<option {if $dt_data.auto_prolong == $smarty.const.TIME_HOUR*3}selected=""{/if} value="{$smarty.const.TIME_HOUR*3}">Три часа</option>
<option {if $dt_data.auto_prolong == $smarty.const.TIME_HOUR*6}selected=""{/if} value="{$smarty.const.TIME_HOUR*6}">Шесть часов</option>
<option {if $dt_data.auto_prolong == $smarty.const.TIME_DAY}selected=""{/if} value="{$smarty.const.TIME_DAY}">Сутки</option>
