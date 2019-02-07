{if !$module_id && $controller_info.module_id}
    {assign var="module_id" value=$controller_info.module_id}
{/if}

{if $ar_tree}
<ol class="dd-list">
    {foreach from=$ar_tree item=category key=category_id}
        <li class="dd-item" data-id="{$category_id}">
			<button class="btn btn-default btn-sm dd-handle"><i class="fa fa-arrows-alt"></i></button>
			<div data-id="{$category_id}" class="dd-content c-hand">
				<span class="title pr-90 text-ellipsis"> {$category.name}</span>
                <div class="clearfix"></div>
            </div>
            <div class="dd-extra">
                {*{if $cuser_data.ar_access_line_categories.$category_id}
                    <span class="pull-left">
                    <a href="demands/?cnd[cat_id]={$category_id}" class="btn btn-link btn-sm">
                        <span class="badge badge-white">
                            {$category.demands_count}/{$category.demands_count_sum}
                        </span>
                    </a>
				</span>
                {/if}*}
                <span class="pull-left">
                    <span class="btn btn-block btn-sm">
                    <i class="fa fa-fw {if $category.icon}{$category.icon}{else}fa-circle{/if}" style="color: {if $category.bgcolor}{$category.bgcolor}{elseif $category.icon}#a7b1c2{else}#e7e7e7{/if}"></i>
                    </span>
                </span>
                <span class="pull-left">
                    {include file="helpers/lists/actions.tpl" module_id=$module_id id=$category_id tree=true}
                </span>

            </div>

            {if $category.children}
                {include file="categories/nestable.tpl" nested=$nested+1 ar_tree=$category.children}
            {/if}
        </li>
    {/foreach}
</ol>
{else}
    <div class="alert alert-default">
    {if $module_id}
        {cls_modules::$ar_modules[$module_id].name} не найдены
    {else}
        {L::text_nothing_found}
    {/if}
    </div>
{/if}