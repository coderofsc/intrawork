{extends file="helpers/abstracts/list.tpl"}
{block name="tclass"}{/block}  {*Убираем footable *}
{block name="colgroup"}
    <colgroup>
        <col width="*" />
        <col width="50px" />
        <col width="50px" />
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
    <tr data-id="{$item.id}">
        <td>
            <span class="title">{$item.name}</span>
        </td>
        <td class="text-center valign-middle">
            <a href="users/?cnd[post_id]={$item_id}" class="badge badge-white">
                {$item.users_count}
            </a>
        </td>
        <td class="text-right">
            {include file="helpers/lists/actions.tpl" module_id=$module_id id=$item_id}
        </td>
    </tr>
{/block}


{*{if !$module_id && $controller_info.module_id}
    {assign var="module_id" value=$controller_info.module_id}
{/if}

{if $ar_posts.data}
<table id="posts-table" class="table table-valign-middle table-condensed table-hover table-sticky-head">
    <colgroup>
        <col width="*" />
        <col width="50px" />
        <col width="50px" />
    </colgroup>
	<thead>
	<tr>
		<th>{L::forms_labels_name}</th>
		<th class="text-center"><i class="fa fa-users"></i></th>
        <th class="text-right">&nbsp;</th>
	</tr>
	</thead>
	<tbody>
	{foreach from=$ar_posts.data item=post key=post_id}
		<tr data-id="{$post.id}">
			<td>
				<span class="title">{$post.name}</span>
			</td>
			<td class="text-center valign-middle">
                <a href="users/?cnd[post_id]={$post_id}" class="badge badge-white">
                    {$post.users_count}
                </a>
			</td>
            <td class="text-right">
                {include file="helpers/lists/actions.tpl" module_id=$module_id id=$post_id}
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
    {include file="helpers/lists/more.tpl" ar_data=$ar_posts module_id=$module_id}
{/if}
*}