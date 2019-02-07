<tr data-id="{$member_id}" {if $demand_data.eu_eid == $member.eid}class="warning" {/if}>
    <td>
        {*<a data-toggle="modal" href="#modal-remote" data-remote="users/view/6/"><img width="32" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNDAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjcwIiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9zdmc+"></a>*}
        {include file="helpers/avatar.tpl" hash=$member.user_avatar_storage_hash dir=$smarty.const.STORAGE_DIR_AVATARS_USERS}
    </td>
    <td>
        {if $member.user_id}
        <div><a data-toggle="modal" href="#modal-remote" data-remote="users/view/{$member.user_id}/">{$member.user_short_fio}</a></div>
        {if $member.user_post_id}<span class="small text-muted">{$member.user_post_name}</span>{/if}
        {if $member.user_dprt_id}<span class="small text-muted">{$member.user_dprt_name}</span>{/if}
        {else}
            {$member.user_email}
        {/if}
    </td>
    <td>
        {if $member.exec_time}
        {*{$demand_data.exec_time}*}
            {assign var="percent_exec" value=ceil($member.exec_time/$demand_data.exec_time*100)}
            <div class="progress progress-striped {if $demand_data.eu_eid == $member.eid && $demand_data.status == m_demands::STATUS_WORK}active{/if} clamped">
                <div class="progress-bar{if $demand_data.eu_eid == $member.eid} progress-bar-success{/if}" aria-valuenow="{$percent_exec}" aria-valuemin="0" aria-valuemax="100"  style="width: {$percent_exec}%;">{$percent_exec}%</div>
            </div>
            <small class="text-muted">{$member.exec_time|ts2hours}</small>
        {else}
            <span class="text-muted">&mdash;</span>
        {/if}
    </td>
    <td>
        {if $member.exec_time}
            {$member.exec_price|number_format:1}
        {else}
            <span class="text-muted">&mdash;</span>
        {/if}
    </td>
    <td class="text-center">
        <span class="badge badge-white">{$member.count_messages}</span>
    </td>
    <td>
        {if $demand_data.eu_eid == $member.eid}
            {L::members_executor}
        {elseif $demand_data.cu_eid == $member.eid}
            {L::members_customer}
        {elseif $demand_data.ru_eid == $member.eid}
            {L::members_responsible}
        {elseif $member.exec_time}
            {L::members_member}
        {else}
            {L::members_observer}
        {/if}
    </td>
    <td>
        {if $cuser_data.eid == $member.eid}
            <a href="demands/view/{$demand_data.id}/toggle_tracking/" class="dm-toggle"><i class="fa fa-toggle-{if $member.tracking}on{else}off{/if}"></i></a>
        {/if}
    </td>
</tr>
