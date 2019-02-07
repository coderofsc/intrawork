{*
Отключено. Нужно сдлеать разбор параметров, если пришол массив с таким значением. В тулс.
<option {if $value == $smarty.const.ANY_VALUE || (is_array($value) && in_array($smarty.const.ANY_VALUE, $value))}selected=""{/if} value={$smarty.const.ANY_VALUE}>Любое значение</option>
<option {if $value == $smarty.const.EMPTY_VALUE || (is_array($value) && in_array($smarty.const.EMPTY_VALUE, $value))}selected=""{/if} value={$smarty.const.EMPTY_VALUE}>Без значения</option>
*}
{*<option data-divider="true"></option>*}