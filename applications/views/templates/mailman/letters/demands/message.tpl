{*<hr style="margin-bottom:6px;height:1px;border:none;color:#cfcfcf;background-color:#cfcfcf;"/>*}
{*<hr style="border:0; border-top:1px dashed #cfcfcf;"/>*}
{$message_data.message}

<br/>
<blockquote type="cite">
    {$prev_message_data.message}
</blockquote>

<br/>
{include file="./detail.tpl" demand_id=$message_data.demand_id cat_id=$message_data.cat_id}
