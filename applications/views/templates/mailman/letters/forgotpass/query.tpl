<p>{L::mailman_letters_forgotpass_query_request}</p>
<p>{L::mailman_letters_forgotpass_query_ignore}</p>

<p>{L::mailman_letters_forgotpass_query_instruction}:<br/>
<a href="{$smarty.const.HOST_ROOT}forgotpass/set_newpass/?magic={$magic}">{$smarty.const.HOST_ROOT}forgotpass/set_newpass/?magic={$magic}</a>
({L::mailman_letters_forgotpass_query_time_warning})<p>

{*<p>Если вы не заказывали восстановление пароля, значит кто-то по ошибке указал ваш email-адрес. В любом случае, данная информация поступает только на контактные email-адреса их владельцев.</p>*}

<p>{L::mailman_letters_forgotpass_query_repeat} <a href="mailto:admin@intrawork.ru">admin@intrawork.ru</a>.</p>