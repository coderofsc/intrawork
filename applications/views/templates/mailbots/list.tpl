{extends file="helpers/abstracts/list.tpl"}
{block name="colgroup"}
    <colgroup>
        <col width="18px"/>
        <col width="18px"/>
        <col width="18px"/>
        <col width="*"/>
        <col width="150px"/>
        <col width="100px"/>
        <col width="250px"/>
        <col width="150px"/>
        <col width="50px"/>
        <col width="50px"/>
        <col width="50px"/>
    </colgroup>
{/block}
{block name="thead"}
    <thead>
    <tr>
        <th data-toggle="true"></th>
        <th></th>
        <th></th>
        <th>{L::forms_labels_name}</th>
        <th data-hide="phone">{L::forms_labels_mailbots_address}</th>
        <th data-hide="all">{L::modules_demands_types_morph_one|mb_ucfirst}</th>
        <th data-hide="all">{L::modules_categories_morph_one|mb_ucfirst}</th>
        <th data-hide="phone">{L::forms_labels_mailbots_server}</th>
        <th data-name="{L::forms_labels_mailbots_in}" class="text-center"><i class="fa fa-sign-in"></i></th>
        <th data-name="{L::forms_labels_mailbots_out}" class="text-center"><i class="fa fa-sign-out"></i></th>
        <th class="text-right">&nbsp;</th>
    </tr>
    </thead>
{/block}
{block name="trow"}
    <tr data-id="{$item.id}">
        <td></td>
        <td>
            <i class="fa fa-toggle-{if $item.status}on{else}off{/if}"></i>
        </td>
        <td>
            {if $item.master}
                <i class="fa text-danger fa-flag"></i>
            {/if}
        </td>
        <td>
            <span class="title">{$item.name}</span>
        </td>
        <td>
            {$item.address}
        </td>
        <td>
            <label class="label label-{$item.type_type}">{$item.type_name}</label>
        </td>
        <td>
            {if $item.cat_id}{include file="helpers/catpath.tpl" id=$item.cat_id}{else}{L::text_inbox}{/if}
        </td>
        <td>
            {$item.server}
        </td>
        <td class="text-center">
            <span class="badge badge-white">{$item.count_in}</span>
        </td>
        <td class="text-center">
            <span class="badge badge-white">{$item.count_out}</span>
        </td>
        <td class="text-right">
            {include file="helpers/lists/actions.tpl" module_id=$module_id id=$item_id}
        </td>
    </tr>
{/block}

{*
{if !$module_id && $controller_info.module_id}
    {assign var="module_id" value=$controller_info.module_id}
{/if}

{if $ar_mailbots.data}
<table id="mailbots-table" class="table table-valign-middle table-condensed table-hover clamped-margin-bottom table-sticky-head footable">
    <colgroup>
        <col width="18px"/>
        <col width="18px"/>
        <col width="18px"/>
        <col width="*"/>
        <col width="150px"/>
        <col width="250px"/>
        <col width="150px"/>
        <col width="50px"/>
        <col width="50px"/>
        <col width="50px"/>
    </colgroup>

	<thead>
	<tr>
        <th data-toggle="true"></th>
        <th></th>
        <th></th>
		<th>{L::forms_labels_name}</th>
        <th data-hide="phone">{L::forms_labels_mailbots_address}</th>
        <th data-hide="phone">{L::modules_categories_morph_one|mb_ucfirst}</th>
        <th data-hide="phone">{L::forms_labels_mailbots_server}</th>
        <th data-name="{L::forms_labels_mailbots_in}" class="text-center"><i class="fa fa-sign-in"></i></th>
        <th data-name="{L::forms_labels_mailbots_out}" class="text-center"><i class="fa fa-sign-out"></i></th>
		<th class="text-right">&nbsp;</th>
	</tr>
	</thead>
	<tbody>
	{foreach from=$ar_mailbots.data item=mb key=mb_id}
		<tr data-id="{$mb.id}">
            <td></td>
            <td>
                <i class="fa fa-toggle-{if $mb.status}on{else}off{/if}"></i>
            </td>
            <td>
                {if $mb.master}
                    <i class="fa text-danger fa-flag"></i>
                {/if}
            </td>
            <td>
                <span class="title">{$mb.name}</span>
            </td>
			<td>
                {$mb.address}
			</td>
            <td>
                {if $mb.cat_id}{include file="helpers/catpath.tpl" id=$mb.cat_id}{else}{L::text_inbox}{/if}
            </td>
			<td>
				{$mb.server}
			</td>
            <td class="text-center">
                <span class="badge badge-white">{$mb.count_in}</span>
            </td>
            <td class="text-center">
                <span class="badge badge-white">{$mb.count_out}</span>
            </td>
            <td class="text-right">
                {include file="helpers/lists/actions.tpl" module_id=$module_id id=$mb_id}
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
    {include file="helpers/lists/more.tpl" ar_data=$ar_mailbots module_id=$module_id}
{/if}
*}