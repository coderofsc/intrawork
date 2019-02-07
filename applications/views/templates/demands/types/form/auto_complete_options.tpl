<option value="0">Нет</option>
<option {if $value == $smarty.const.TIME_HOUR}selected=""{/if} value="{$smarty.const.TIME_HOUR}">Час</option>
<option {if $value == $smarty.const.TIME_HOUR*3}selected=""{/if} value="{$smarty.const.TIME_HOUR*3}">3 часа</option>
<option {if $value == $smarty.const.TIME_HOUR*6}selected=""{/if} value="{$smarty.const.TIME_HOUR*6}">6 часов</option>
<option {if $value == $smarty.const.TIME_HOUR*12}selected=""{/if} value="{$smarty.const.TIME_HOUR*12}">12 часов</option>

<option {if $value == $smarty.const.TIME_DAY}selected=""{/if} value="{$smarty.const.TIME_DAY}">Сутки</option>
<option {if $value == $smarty.const.TIME_HOUR*36}selected=""{/if} value="{$smarty.const.TIME_HOUR*36}">36 часов</option>
<option {if $value == $smarty.const.TIME_DAY*2}selected=""{/if} value="{$smarty.const.TIME_DAY*2}">Два дня</option>
<option {if $value == $smarty.const.TIME_WEEK}selected=""{/if} value="{$smarty.const.TIME_WEEK}">Неделя</option>
<option {if $value == $smarty.const.TIME_WEEK*2}selected=""{/if} value="{$smarty.const.TIME_WEEK*2}">Две недели</option>
<option {if $value == $smarty.const.TIME_MONTH}selected=""{/if} value="{$smarty.const.TIME_MONTH}">Месяц</option>
