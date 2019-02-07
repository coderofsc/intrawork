{if $ar_reports.data}
    <table id="report-table" class="table table-valign-middle table-condensed table-hover clamped table-sticky-head footable" >
        <colgroup>
            <col width="40px"/>
            <col width="10px"/>
            <col width="*"/>
        </colgroup>
        <thead>
        <tr>
            <th></th>
            <th data-toggle="true"></th>
            <th></th>
            <th class="text-center">{L::forms_labels_reports_time_in_work}</th>
            {foreach from=m_demands::$ar_status item=status key=status_id}
                <th class="text-center" title="{$status.name}"><i class="fa hidden-lg hidden-md hidden-sm text-{m_demands::$ar_status[$status_id].color} fa-{m_demands::$ar_status[$status_id].icon}"></i><span class="hidden-xs"> {$status.name}</span></th>
            {/foreach}
        </tr>
        </thead>
        {foreach from=$ar_reports.data item=user}
            <tr>
                <td>
                    {include file="helpers/avatar.tpl" hash=$user.user_avatar_storage_hash dir=$smarty.const.STORAGE_DIR_AVATARS_USERS}
                </td>
                <td></td>
                <td>
                    <div><a data-toggle="modal" href="#modal-remote" data-remote="users/view/{$user.user_id}/">{$user.user_short_fio}</a></div>
                    {if $user.user_post_id}<span class="small text-muted">{$user.user_post_name}</span>{/if}
                    {if $user.user_dprt_id}<span class="small text-muted">{$user.user_dprt_name}</span>{/if}
                </td>
                <td class="text-center valign-middle">

                    {assign var="took_time_index" value="took_time_"|cat:m_demands::STATUS_WORK}

                    {if $user.$took_time_index}
                        {$user.$took_time_index|ts2hours}
                        {*<div class="text-muted small">{$user.ar_exec_status[m_demands::STATUS_PAUSE].took_time|ts2hours:false} на паузе</div>*}
                    {else}
                        <span class="text-muted">&mdash;</span>
                    {/if}
                </td>
                {foreach from=m_demands::$ar_status item=status key=status_id}
                    <td class="text-center valign-middle">
                        {assign var="count_index" value="count_"|cat:$status_id}
                        {assign var="took_time_index" value="took_time_"|cat:$status_id}

                        {if $user.$count_index}
                            <div class="badge badge-{m_demands::$ar_status[$status_id].color}">{$user.$count_index}</div>
                        {else}
                            <span class="text-muted">&mdash;</span>
                        {/if}

                    </td>
                {/foreach}

            </tr>
        {/foreach}
    </table>
{else}
    <div class="alert alert-default">
            {L::text_nothing_found}
    </div>
{/if}

{include file="helpers/lists/more.tpl" ar_data=$ar_reports module_alias="reports" module_id=false}