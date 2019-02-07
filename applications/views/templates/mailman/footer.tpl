<tr>
    <td valign="middle">
        <br/>
        <table width="100%" cellpadding="15" cellspacing="0" border="0" style="background-color: #34495E">
            <tr>
                <td>
                    <a href="http://intrawork.ru" title="{L::meta_title}"><img src="{$letter_data.logo_cid}" border="0" alt="{L::intrawork}" /></a>
                </td>
                <td width="130px" align="right" style="color: #a1a1a1; font-family: Helvetica,Arial,sans-serif; line-height:11px; font-size:11px; vertical-align:top">
                    {L::mailman_support}:<br/> <a style="color: #F2F1EF" href="mailto:support@intrawork.ru">support@intrawork.ru</a>
                </td>
                <td width="25px" align="right">
                    <a href="http://vk.com/intrawork"><img src="{$letter_data.logo_cid_vk}" border="0" /></a>
                </td>
            </tr>
            <tr>
                <td style="font-family: Helvetica,Arial,sans-serif; font-size:11px;" colspan="3">
                    <font style="color: #F2F1EF;">
                    {if $letter_data.answer}
                        {L::mailman_warning_change_title}<br/>
                    {else}
                        {L::mailman_no_reply}<br/>
                    {/if}

                    {if $letter_data.event_id == $smarty.const.MAILMAN_EVENT_NOTIFICATION_CRUD ||
                        $letter_data.event_id == $smarty.const.MAILMAN_EVENT_EXEC_NOTICE}
                        {L::mailman_notification_info}. {L::mailman_notification_setup|sprintf:$smarty.const.HOST_ROOT:$letter_data.user_to_id}<br/>
                    {/if}
                    </font>
                    <br/>
                    <font style="color: #a1a1a1;">
                        {L::mailman_create_date}: {$smarty.now|ts2text}<br/>
                    </font>
                </td>
            </tr>
        </table>
    </td>
</tr>
