{extends file="helpers/abstracts/list.tpl"}
{block name="colgroup"}
    <colgroup>
        <col width="40px"/>
        <col width="18px"/>
        <col width="18px"/>
        <col width="*"/>
        <col width="50px"/>
        <col width="130px"/>
        <col width="130px"/>
        <col width="100px"/>
        <col width="130px"/>
        <col width="50px"/>
    </colgroup>
{/block}
{block name="thead"}
    <thead>
    <tr>
        <th>&nbsp;</th>
        <th data-toggle="true"></th>
        <th>&nbsp;</th>
        <th>{L::forms_labels_face_name}</th>
        <th class="text-center">{L::forms_labels_users_work}</th>
        <th data-hide="phone,tablet">{L::modules_departments_morph_one|mb_ucfirst}</th>
        <th data-hide="phone">{L::forms_labels_email}</th>
        <th data-hide="phone,tablet">{L::forms_labels_phone}</th>
        <th data-hide="all">{L::forms_labels_users_activity_date}</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
{/block}
{block name="trow"}
    <tr data-id="{$item.id}">
        <td>
            {include file="helpers/avatar.tpl" hash=$item.avatar_storage_hash dir=$smarty.const.STORAGE_DIR_AVATARS_USERS}
        </td>
        <td></td>
        <td>
            <i class="fa fa-toggle-{if $item.inside}on text-success{else}off text-muted{/if}"></i>
        </td>
        <td>
            <a class="title" href="users/view/{$item.id}/">
                {$item.fio}
            </a>
            <div class="small text-muted">{if $item.post_id}{$item.post_name}{/if}</div>
            <div class="clearfix"></div>
        </td>
        <td class="text-center">
            {if $item.demands_work}
                <a href="demands/?cnd[status][0]={m_demands::STATUS_WORK}&cnd[eu_eid]={$item.eid}">{L::text_yes}</a>
            {else}
                <span class="text-muted">{L::text_no}</span>
            {/if}
        </td>
        <td>
            {if $item.dprt_id}{$item.dprt_name}{else}<span class="text-muted">&mdash;</span>{/if}
        </td>
        <td>
            <a href="mailto: {$item.email}">{$item.email}</a>
        </td>
        <td>
            {if $item.phone}{$item.phone}{else}<span class="text-muted">&mdash;</span>{/if}
        </td>
        <td>
            <i class="fa fa-clock-o text-muted"></i> {if !$item.unix_activity_date}{L::text_unknown|mb_ucfirst}{elseif $smarty.now-$item.unix_activity_date<$smarty.const.TIME_MIN}В течении минуты{else}{$item.unix_activity_date|pass_time} {L::text_ago}{/if}
        </td>
        <td class="text-right">
            {include file="helpers/lists/actions.tpl" module_id=$module_id id=$item_id denied_delete=($cuser_data.id==$item.id || $denied_delete)}
        </td>
    </tr>
{/block}

{*

{if !$module_id && $controller_info.module_id}
    {assign var="module_id" value=$controller_info.module_id}
{/if}

{if $ar_users.data}
<table id="users-table" class="table table-valign-middle table-condensed table-hover clamped table-sticky-head footable" >
    <colgroup>
        <col width="40px"/>
        <col width="18px"/>
        <col width="18px"/>
        <col width="*"/>
        <col width="50px"/>
        <col width="130px"/>
        <col width="130px"/>
        <col width="100px"/>
        <col width="130px"/>
        <col width="50px"/>
    </colgroup>
    <thead>
    <tr>
        <th>&nbsp;</th>
        <th data-toggle="true"></th>
        <th>&nbsp;</th>
        <th>{L::forms_labels_face_name}</th>
        <th class="text-center">{L::forms_labels_users_work}</th>
        <th data-hide="phone,tablet">{L::modules_departments_morph_one|mb_ucfirst}</th>
        <th data-hide="phone">{L::forms_labels_email}</th>
        <th data-hide="phone,tablet">{L::forms_labels_phone}</th>
        <th data-hide="all">{L::forms_labels_users_activity_date}</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
	{foreach from=$ar_users.data item=user key=user_id}
		<tr data-id="{$user.id}">
            <td>
                {include file="helpers/avatar.tpl" hash=$user.avatar_storage_hash dir=$smarty.const.STORAGE_DIR_AVATARS_USERS}
            </td>
            <td></td>
            <td>
                <i class="fa fa-toggle-{if $user.inside}on text-success{else}off text-muted{/if}"></i>
            </td>
            <td>
                <a class="title" href="users/view/{$user.id}/">
                {$user.fio}
                </a>
                <div class="small text-muted">{if $user.post_id}{$user.post_name}{/if}</div>
                <div class="clearfix"></div>
            </td>
            <td class="text-center">
                {if $user.demands_work}
                    <a href="demands/?cnd[status][0]={m_demands::STATUS_WORK}&cnd[eu_eid]={$user.eid}">{L::text_yes}</a>
                {else}
                    <span class="text-muted">{L::text_no}</span>
                {/if}
            </td>
            <td>
                {if $user.dprt_id}{$user.dprt_name}{else}<span class="text-muted">&mdash;</span>{/if}
            </td>
			<td>
				<a href="mailto: {$user.email}">{$user.email}</a>
			</td>
            <td>
                {if $user.phone}{$user.phone}{else}<span class="text-muted">&mdash;</span>{/if}
            </td>
            <td>
                <i class="fa fa-clock-o text-muted"></i> {if $smarty.now-$user.unix_activity_date<$smarty.const.TIME_MIN}В течении минуты{else}{$user.unix_activity_date|pass_time} {L::text_ago}{/if}
            </td>
            <td class="text-right">
                {include file="helpers/lists/actions.tpl" module_id=$module_id id=$user_id denied_delete=($cuser_data.id==$user.id || $denied_delete)}
            </td>
        </tr>
    {/foreach}

    </tbody>
</table>
{else}
    <div class="alert alert-default">
        {if $module_id}
            {cls_modules::$ar_modules[$module_id].name} не найдены
        {else}
            {L::text_nothing_found}
        {/if}
    </div>
{/if}

{if $module_id}
    {include file="helpers/lists/more.tpl" ar_data=$ar_users module_id=$module_id}
{/if}

*}