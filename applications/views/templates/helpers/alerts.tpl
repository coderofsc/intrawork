{foreach from=$system_alerts name=alert_types key=type item=alerts}

    {if $type == $smarty.const.ALERT_SUCCESS}
        {assign var="alert_type" value="success"}
        {assign var="alert_title" value="Сообщение"}
    {elseif $type == $smarty.const.ALERT_WARNING}
        {assign var="alert_type" value="warning"}
        {assign var="alert_title" value="Внимание"}
    {elseif $type == $smarty.const.ALERT_ERROR}
        {assign var="alert_type" value="danger"}
        {assign var="alert_title" value="Обнаружены ошибки"}
    {elseif $type == $smarty.const.ALERT_DANGER}
        {assign var="alert_type" value="danger"}
        {assign var="alert_title" value="Обнаружены системные ошибки"}
    {else}
        {assign var="alert_type" value="info"}
        {assign var="alert_title" value="Информация"}
    {/if}

    <div class="alert alert-{$alert_type} {if $smarty.foreach.alert_types.last}clamped-margin-bottom{/if}">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {*<h4>{$alert_title}</h4>*}

        {assign var="alerts_buffer" value=""}
        {foreach from=$alerts name=alerts item=alert}
            {if $smarty.foreach.alerts.first}
                <small>{$alert.time|date_format:'%D %H:%M:%S'}</small>
            {/if}

            {if $type == $smarty.const.ALERT_DANGER}
                {assign var="alerts_buffer" value=$alerts_buffer|cat:$alert.message}
                {if !$smarty.foreach.alerts.last}
                    {assign var="alerts_buffer" value=$alerts_buffer|cat:$smarty.const.PHP_EOL|cat:"---"|cat:$smarty.const.PHP_EOL}
                {/if}
            {else}
                <p>{$alert.message}</p>
            {/if}
        {/foreach}

        {if $type == $smarty.const.ALERT_DANGER}
            <textarea rows="3" class="form-control form-base64">{if $config->dev_mode}{$alerts_buffer}{else}{$alerts_buffer|base64_encode}{/if}</textarea>
            <p>Пожалуйста, отправте этот код по адресу службы поддержки: <a href="mailto:{$smarty.const.IW_EMAIL_SUPPORT}">{$smarty.const.IW_EMAIL_SUPPORT}</a></p>
        {/if}

    </div>
{/foreach}

{*{assign var="cur_alert_type" value=0}
{foreach from=$system_alerts name=alerts key=alert_type item=alert}
	{if $alert.type == $smarty.const.ALERT_SUCCESS}
		{assign var="alert_type" value="success"}
		{assign var="alert_title" value="Сообщение"}
	{elseif $alert.type == $smarty.const.ALERT_WARNING}
		{assign var="alert_type" value="warning"}
		{assign var="alert_title" value="Внимание"}
	{elseif $alert.type == $smarty.const.ALERT_ERROR}
		{assign var="alert_type" value="danger"}
		{assign var="alert_title" value="Обнаружены ошибки"}
    {elseif $alert.type == $smarty.const.ALERT_DANGER}
        {assign var="alert_type" value="danger"}
        {assign var="alert_title" value="Обнаружены системные ошибки"}
	{else}
		{assign var="alert_type" value="info"}
		{assign var="alert_title" value="Информация"}
	{/if}

	{if $cur_alert_type != $alert.type}
		{if !$smarty.foreach.alerts.first}</p></div><div class="space"></div>{/if}
		{assign var="cur_alert_type" value=$alert.type}
		<div class="alert alert-{$alert_type} clamped-margin-bottom">
		<h4>{$alert_title}</h4>
		<small>{$alert.time|date_format:'%D %H:%M:%S'}</small>
		<p>
	{/if}

    {if $alert.type != $smarty.const.ALERT_DANGER}
        <p>{$alert.message}</p>
    {else}
        <textarea rows="3" class="form-control">{if $smarty.const.DEV_MODE}{$alert.message}{else}{$alert.message|base64_encode}{/if}</textarea>
        <p>Пожалуйста, отправте этот код по адресу службы поддержки: <a href="mailto:{$smarty.const.IW_EMAIL_SUPPORT}">{$smarty.const.IW_EMAIL_SUPPORT}</a></p>
    {/if}

	{if $smarty.foreach.alerts.last}</p></div>{/if}
{/foreach}
*}