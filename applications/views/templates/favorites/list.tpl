{if !$module_id && $controller_info.module_id}
    {assign var="module_id" value=$controller_info.module_id}
{/if}

{if $ar_favorites.data}
<table id="favorites-table" class="table table-valign-middle table-condensed table-hover clamped-margin-bottom table-sticky-head footable">
    <colgroup>
        <col width="15px" />
        <col width="*" />
        <col width="100px" />
        <col width="100px" />
    </colgroup>
	<thead>
	<tr>
        <th data-toggle="true"></th>
		<th>{L::forms_labels_name}</th>
		<th>{L::forms_labels_events_type_object}</th>
        <th data-hide="phone">{L::forms_labels_date}</th>
	</tr>
	</thead>
	<tbody>
	{foreach from=$ar_favorites.data item=favorite key=favorite_id}
		<tr data-id="{$favorite.id}">
            <td></td>
			<td>
				<span class="title">{$favorite.object_name}</span>
			</td>
			<td>
                {cls_modules::$ar_modules[$favorite.module_id].morph.0|mb_ucfirst}
			</td>
            <td>
                {$favorite.unix_create_date|ts2text}
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
    {include file="helpers/lists/more.tpl" ar_data=$ar_favorites module_id=$module_id}
{/if}