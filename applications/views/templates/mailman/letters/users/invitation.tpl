<p>{$cuser_data.short_fio} приглашает вас в Интраворк{if $acmp_text}: {$acmp_text}{else}.{/if}</p>
<p>Для входа используйте следующие учетные данные:</p>

<table border="0" style="border-collapse: collapse; border-spacing: 0; width:100%; max-width:300px;">
    <colgroup>
        <col width="50%"/>
    </colgroup>
    <tr>
        <td style="border-top: 1px solid #dddddd; text-align:left; padding: 8px; vertical-align: top;">Адрес аккаунта</td>
        <td style="border-top: 1px solid #dddddd; text-align:left; padding: 8px; vertical-align: top;"><a href="{$smarty.const.HOST_ROOT}">{$smarty.const.HOST_ROOT}</a></td>
    </tr>
    <tr>
        <td style="border-top: 1px solid #dddddd; text-align:left; padding: 8px; vertical-align: top;">Логин</td>
        <td style="border-top: 1px solid #dddddd; text-align:left; padding: 8px; vertical-align: top;">{$user_data.email}</td>
    </tr>
    <tr>
        <td style="border-top: 1px solid #dddddd; text-align:left; padding: 8px; vertical-align: top;">Пароль</td>
        <td style="border-top: 1px solid #dddddd; text-align:left; padding: 8px; vertical-align: top;">{$user_data.password}</td>
    </tr>
</table>

<p>
    <font style="color: #a1a1a1;">
        Если Вы вдруг забудете пароль, Вы можете восстановить его по этой ссылке: <a href="{$smarty.const.HOST_ROOT}forgotpass/">{$smarty.const.HOST_ROOT}forgotpass/</a>
    </font>
<p>

<p><strong>Пожалуйста, сохраните пароли и не передавайте их третьим лицам.</strong></p>