{extends file="helpers/abstracts/list.tpl"}
{block name="tclass"}{/block}  {*Убираем footable *}
{block name="colgroup"}
    <colgroup>
        <col width="50px" />
        <col width="*" />
        <col width="50px" />
        <col width="50px" />
    </colgroup>
{/block}
{block name="thead"}
    <thead>
    <tr>
        <th></th>
        <th>{L::forms_labels_name}</th>
        <th class="text-center"><i class="fa fa-tasks"></i></th>
        <th class="text-right">&nbsp;</th>
    </tr>
    </thead>
{/block}
{block name="trow"}
    <tr data-id="{$item.id}">
        <td>
            <div style="height:24px; width:24px;" class="label-{$item.type}">&nbsp;</div>
        </td>
        <td>
            <span class="title">{$item.name}</span>
        </td>
        <td class="text-center valign-middle">
            <a href="demands/?cnd[type_id]={$item_id}" class="badge badge-white">
                {$item.demands_count}
            </a>
        </td>
        <td class="text-right">
            {if $item.id == $smarty.const.DEFAULT_DEMAND_TYPE_ID}
                {include file="helpers/lists/actions.tpl" module_id=$module_id id=$item_id denied_delete=true}
            {else}
                {include file="helpers/lists/actions.tpl" module_id=$module_id id=$item_id}
            {/if}
        </td>
    </tr>
{/block}


{*{if !$module_id && $controller_info.module_id}
    {assign var="module_id" value=$controller_info.module_id}
{/if}

{if $ar_demands_types.data}
<table id="demands-types-table" class="table table-valign-middle table-condensed table-hover table-sticky-head">
    <colgroup>
        <col width="50px" />
        <col width="*" />
        <col width="50px" />
        <col width="50px" />
    </colgroup>
	<thead>
	<tr>
        <th></th>
		<th>{L::forms_labels_name}</th>
		<th class="text-center"><i class="fa fa-tasks"></i></th>
        <th class="text-right">&nbsp;</th>
	</tr>
	</thead>
	<tbody>
	{foreach from=$ar_demands_types.data item=type key=type_id}
		<tr data-id="{$type.id}">
            <td>
                <div style="height:24px; width:24px;" class="label-{$type.type}">&nbsp;</div>
            </td>
			<td>
				<span class="title">{$type.name}</span>
			</td>
			<td class="text-center valign-middle">
                <a href="users/?cnd[type_id]={$type_id}" class="badge badge-white">
                    {$type.demands_count}
                </a>
			</td>
            <td class="text-right">
                {include file="helpers/lists/actions.tpl" module_id=$module_id id=$type_id}
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
    {include file="helpers/lists/more.tpl" ar_data=$ar_demands_types module_id=$module_id}
{/if}
*}