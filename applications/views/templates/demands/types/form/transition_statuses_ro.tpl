<div style="overflow-x: auto">
<table class="table" style="max-width: none" id="transition-statuses">
    <colgroup>
        <col width="100"/>
        <col width="100"/>
    </colgroup>
    <thead>
    <tr>
        <th></th>
        <th class="text-center">Активен</th>
        {foreach from=$ts|array_keys item=m_status_id}
            <th data-id="{$m_status_id}" class="text-center">{m_demands::$ar_status[$m_status_id].name}</th>
        {/foreach}
    </tr>
    </thead>
    <tbody>
    {foreach from=$ts key=m_status_id item=master}
        <tr data-id="{$m_status_id}">
            <th nowrap="">
                {m_demands::$ar_status[$m_status_id].name}
            </th>
            <th class="text-center">
                {if $master.active_role==$smarty.const.USER_ROLE_CUSTOMER}{L::members_customer}
                {elseif $master.active_role==$smarty.const.USER_ROLE_EXECUTOR}{L::members_executor}
                {elseif $master.active_role==$smarty.const.USER_ROLE_RESPONSIBLE}{L::members_responsible}
                {else}<span class="text-muted">&mdash;</span>
                {/if}
            </th>
            {foreach from=$ts|array_keys item=s_status_id}
                <td data-id="{$s_status_id}" class="text-center">
                    <i class="fa {if $m_status_id == $s_status_id}fa-check text-muted{elseif in_array($s_status_id, $master.slaves)}fa-check text-success{else}fa-times text-muted{/if}"></i>
                </td>
            {/foreach}
        </tr>
    {/foreach}
    </tbody>
</table>
</div>