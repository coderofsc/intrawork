<tr data-id="{$history_id}">
    <td>
        {*<a data-toggle="modal" href="#modal-remote" data-remote="users/view/6/"><img width="32" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNDAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjcwIiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9zdmc+"></a>*}
        {if $history.user_id}
            {include file="helpers/avatar.tpl" hash=$history.user_avatar_storage_hash dir=$smarty.const.STORAGE_DIR_AVATARS_USERS}
        {else}
            <img width="32px" src="{$smarty.const.STORAGE_DIR}{$smarty.const.STORAGE_DIR_AVATARS}intrawork_xs.jpg" alt="Avatar" class="img-avatar">
        {/if}
    </td>
    <td>
        {if $history.user_id}
            <div><a data-toggle="modal" href="#modal-remote" data-remote="users/view/{$history.user_id}/">{$history.user_short_fio}</a></div>
            {if $history.user_post_id}<span class="small text-muted">{$history.user_post_name}</span>{/if}
            {if $history.user_dprt_id}<span class="small text-muted">{$history.user_dprt_name}</span>{/if}
        {else}
            <div class="text-muted">{L::intrawork}</div>
            <div class="text-muted small">{L::text_auto_change}</div>
        {/if}
    </td>
    <td>
        {$history.unix_event_time|ts2text}
    </td>
    <td>
        {if $history.column == "status"}
            {L::forms_labels_demands_status}
        {elseif $history.column == "priority"}
            {L::forms_labels_demands_priority}
        {elseif $history.column == "criticality"}
            {L::forms_labels_demands_criticality}
        {elseif $history.column == "cat_id"}
            {L::modules_categories_morph_one|mb_ucfirst}
        {elseif $history.column == "required_time"}
            {L::forms_labels_demands_required_time}
        {elseif $history.column == "eu_eid"}
            {L::members_executor}
        {elseif $history.column == "ru_eid"}
            {L::members_responsible}
        {elseif $history.column == "type_id"}
            Тип
        {elseif $history.column == "deadline_date"}
            Дедлайн
        {elseif $history.column == "percent_complete"}
            Процент выполнения
        {/if}
    </td>
    <td>
        {decode_value column=$history.column value_decode=$history.old_value_decode value=$history.old_value muted=true}
    </td>
    <td class="text-center text-muted">
        <i class="fa fa-long-arrow-right"></i>
    </td>
    <td>
        {decode_value column=$history.column value_decode=$history.new_value_decode value=$history.new_value old_value=$history.old_value}
    </td>
</tr>
