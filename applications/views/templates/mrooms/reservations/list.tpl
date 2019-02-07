{if !$module_id && $controller_info.module_id}
    {assign var="module_id" value=$controller_info.module_id}
{/if}

<table id="mrooms-reservations-table" class="table table-hover clamped-margin-bottom table-sticky-head footable">
    <colgroup>
        <col width="50px"/>
        <col width="30px"/>
        <col width="*"/>
        <col width="80px"/>
        <col width="80px"/>
        <col width="50px"/>
    </colgroup>

	<thead>
	<tr>
		<th></th>
        <th></th>
		<th data-toggle="true">{L::forms_labels_name}</th>
        <th data-hide="phone">{L::forms_labels_mroomsres_start}</th>
        <th data-hide="phone">{L::forms_labels_mroomsres_end}</th>
        <th data-name="{L::forms_labels_mroomsres_remain}">{L::forms_labels_mroomsres_remain_short}</th>
		<th class="text-right">&nbsp;</th>
	</tr>
	</thead>
	<tbody>
	{foreach from=$ar_mrooms_reservations.data item=mrr key=mrr_id}
		<tr data-id="{$mrr.id}">
            <td>
                {include file="helpers/avatar.tpl" hash=$mrr.user_avatar_storage_hash dir=$smarty.const.STORAGE_DIR_AVATARS_USERS}
            </td>
            <td>
                <i class="fa fa-{if $mrr.unix_end<$smarty.now}unlock text-info{else}lock text-danger{/if}"></i>
            </td>
			<td>
                <span class="title">{$mrr.name}</span>
                <div class="small text-muted">
                    {if $mrr.descr|trim}
                        {$mrr.descr|trim|strip_tags|truncate}
                    {/if}
                </div>

			</td>
            <td>
                {$mrr.unix_start|ts2text}
            </td>
            <td>
                {$mrr.unix_end|ts2text}
            </td>
            <td>
                {if $mrr.unix_end<$smarty.now}
                    <span class="text-muted">&mdash;</span>
                {else}
                    {$mrr.unix_end|remaining_time}
                {/if}
            </td>
            <td class="text-right">
                {include file="helpers/lists/actions.tpl" module_id=$module_id id=$mrr_id}
            </td>
        </tr>
        {foreachelse}
        <tr class="info">
            <td colspan="10" class="text-center">
                {if $module_id}
                    {cls_modules::$ar_modules[$module_id].name} не найдены
                {else}
                    {L::text_nothing_found}
                {/if}
            </td>
        </tr>
	{/foreach}
	</tbody>
</table>

{*
{if $offset+$ar_mrooms_reservations|@sizeof < $total}
<ul class="pager">
	<li><a href="mbs/?render={$smarty.const.RENDER_JSON}&offset={$offset+$limit}&continue=true&{$conditions|http_build_query:"cnd"}">Загрузить еще</a></li>
</ul>
{/if}
*}
{if $module_id}
    {include file="helpers/lists/more.tpl" ar_data=$ar_mrooms_reservations module_id=$module_id}
{/if}
