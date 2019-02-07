<p>{L::mailman_letters_forgotpass_complete_ip|sprintf:$smarty.server.REMOTE_ADDR}</p>

<p>
{L::mailman_letters_forgotpass_complete_ip}:<br/>
{L::mailman_enter_url}: <a href="{$smarty.const.HOST_ROOT}">{$smarty.const.HOST_ROOT}</a><br/>
{L::forms_labels_login}: {$user_data.email}<br/>
{L::forms_labels_password}: {$chpass_data.new_password}
</p>

<p>{L::mailman_letters_forgotpass_complete_warning} <a href="mailto:admin@intrawork.ru">admin@intrawork.ru</a></p>
