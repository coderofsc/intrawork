{extends file="helpers/abstracts/list.tpl"}
{block name="tclass"}{/block}  {*Убираем footable *}
{block name="colgroup"}
    <colgroup>
        <col width="*"/>
        <col width="50px"/>
        <col width="50px"/>
    </colgroup>
{/block}
{block name="thead"}
    <thead>
    <tr>
        <th>{L::forms_labels_name}</th>
        <th class="text-center"><i class="fa fa-users"></i></th>
        <th class="text-right">&nbsp;</th>
    </tr>
    </thead>
{/block}
{block name="trow"}
    <tr data-id="{$item_id}">
        <td>
            {$item.name}
        </td>
        <td class="text-center valign-middle">
            <a href="users/?cnd[role_id]={$item.id}" class="badge badge-white">
                {$item.users_count}
            </a>
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

{if $ar_roles.data}
<table id="roles-table" class="table table-valign-middle table-condensed table-hover clamped table-sticky-head" >
    <colgroup>
        <col width="*"/>
        <col width="50px"/>
        <col width="50px"/>
    </colgroup>
    <thead>
    <tr>
        <th>{L::forms_labels_name}</th>
        <th class="text-center"><i class="fa fa-users"></i></th>
        <th class="text-right">&nbsp;</th>
    </tr>
    </thead>
    <tbody>

	{foreach from=$ar_roles.data item=role key=role_id}
		<tr data-id="{$role_id}">
			<td>
				{$role.name}
			</td>
            <td class="text-center valign-middle">
                <a href="users/?cnd[role_id]={$role.id}" class="badge badge-white">
                    {$role.users_count}
                </a>
            </td>
            <td class="text-right">
                {include file="helpers/lists/actions.tpl" module_id=$module_id id=$role_id}
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
    {include file="helpers/lists/more.tpl" ar_data=$ar_roles module_id=$module_id}
{/if}
*}