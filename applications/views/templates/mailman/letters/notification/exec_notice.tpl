<p>
    {L::mailman_letters_exec_notice|sprintf:($smarty.now|ts2text):($ar_demands|@sizeof):($ar_demands|sizeof|declension:"заявка;заявки;заявок")}
{*На момент {$smarty.now|ts2text} у вас на исполнении {$ar_demands|@sizeof} {$ar_demands|sizeof|declension:"заявка;заявки;заявк"}.*}
</p>
<table border="0" style="border-collapse: collapse; border-spacing: 0; width:100%; max-width:800px;">
    <thead>
    <tr>
        <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">{L::forms_labels_code}</th>
        <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">{L::forms_labels_demands_status}</th>
        <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">{L::forms_labels_title}</th>
    </tr>
    </thead>
    <tbody>
    {foreach from=$ar_demands item=demand}
        <tr>
            <td style="{if $demand.status == m_demands::STATUS_WORK}background-color: #FCF8E3;{/if} width:50px; font-size:14px; border-top: 1px solid #ddd; padding: 8px; vertical-align: top;">{$demand.id}</td>
            <td style="{if $demand.status == m_demands::STATUS_WORK}background-color: #FCF8E3;{/if} width:90px; font-size:14px; border-top: 1px solid #ddd; padding: 8px; vertical-align: top;">
                {m_demands::$ar_status[$demand.status].name}
            </td>
            <td style="{if $demand.status == m_demands::STATUS_WORK}background-color: #FCF8E3;{/if} font-size:14px; border-top: 1px solid #ddd; padding: 8px; vertical-align: top;">
                <a href="{$smarty.const.HOST_ROOT}demands/view/{$demand.id}/">{$demand.title}</a><br/>
                <small style="color: #cccccc">{if $demand.cat_id}{include file="helpers/catpath.tpl" id=$demand.cat_id}{*{$mb.cat_name}*}{else}{L::text_inbox}{/if}</small>
            </td>
        </tr>
    {/foreach}
    <tr></tr>
    </tbody>
</table>
