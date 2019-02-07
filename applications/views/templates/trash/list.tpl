{if !$module_id && $controller_info.module_id}
    {assign var="module_id" value=$controller_info.module_id}
{/if}

{if $ar_trash.data}
<table id="trash-table" class="table table-valign-middle table-condensed table-hover clamped-margin-bottom table-sticky-head footable">
    <colgroup>
        <col width="15px" />
        <col width="*" />
        <col width="100px" />
        <col width="100px" />
        <col width="100px" />
    </colgroup>
	<thead>
	<tr>
        <th data-toggle="true"></th>
		<th>{L::forms_labels_name}</th>
		<th>{L::forms_labels_events_type_object}</th>
        <th data-hide="phone">{L::forms_labels_date}</th>
        <th data-hide="phone">{cls_modules::$ar_modules[cls_modules::MODULE_USERS].morph.0|mb_ucfirst}</th>
	</tr>
	</thead>
	<tbody>
	{foreach from=$ar_trash.data item=trash key=trash_id}
		<tr data-id="{$trash.id}">
            <td></td>
			<td>
				<span class="title">{$trash.object_name}</span>
			</td>
			<td>
                {cls_modules::$ar_modules[$trash.module_id].morph.0|mb_ucfirst}
			</td>
            <td>
                {$trash.unix_delete_date|ts2text}
            </td>
            <td>
                {if $trash.delete_user_id}
                    {$trash.user_short_fio}
                {else}
                    {L::text_iw_auto_action|mb_ucfirst}
                {/if}

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
    {include file="helpers/lists/more.tpl" ar_data=$ar_trash module_id=$module_id}
{/if}