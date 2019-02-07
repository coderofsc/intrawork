{function name=category_level nested=0 ar_tree=array() open=false}
    <ul class="sidebar-block">

        {if !$nested}
            <li {if $controller_name == "demands" && !$cur_category}class="active"{/if}>
                <div class="row">
                    <a href="demands/" class="col-sm-12 cat-item cat-readonly">
                        <i class="fa fa-fw fa-circle" {*style="color: yellow"*}></i>
                        <span class="nav-label">Все категории</span>
                    </a>
                </div>
            </li>
        {/if}

        {foreach from=$ar_tree item=category key=category_id}
            {if ($smarty.cookies.sidebarBlockOpen && in_array($category_id, explode(",", $smarty.cookies.sidebarBlockOpen))) || ($cur_category && (($cur_category.ar_children && in_array($category_id, $cur_category.ar_children)) || in_array($category_id, $cur_category.ar_parents) || $cur_category.id == $category_id))}
                {assign var="open" value=true}
            {else}
                {assign var="open" value=false}
            {/if}
            <li data-id="{$category_id}" class="{if $cur_category && $cur_category.id == $category_id}active{/if}{if $open} open{/if}">

                <div class="row" {if $category.visible_only}title="Недоступная категория" {/if}>
                    <div class="col-sm-9" {if $nested}style="padding-left: {(15+$nested*15)}px;"{/if}>
                        <a class="text-ellipsis cat-item {if $category.visible_only || !($cuser_data.crud_categories.$category_id & m_roles::CRUD_C)}cat-readonly{/if} {if $category.visible_only}path-only{/if}" href="demands/?cnd[cat_id]={$category_id}&cnd[status][]={m_demands::STATUS_NEW}&cnd[status][]={m_demands::STATUS_WORK}&cnd[status][]={m_demands::STATUS_PAUSE}" >
                            <i class="fa fa-fw {if $category.icon}{$category.icon}{else}fa-circle{/if}" {if $category.bgcolor}style="color: {$category.bgcolor}"{/if}></i>
                            <span class="nav-label">{$category.name}</span>
                        </a>
                    </div>

                    <a data-id="{$category_id}" href="demands/?cnd[cat_id]={$category_id}&cnd[status][]={m_demands::STATUS_NEW}&cnd[status][]={m_demands::STATUS_WORK}&cnd[status][]={m_demands::STATUS_PAUSE}" class="col-sm-2 text-center cat-dmd-count {if !$category.active_demands_count}hidden{/if}">
                        <span class="badge badge-count">{$category.active_demands_count}</span>
                    </a>

                    {if $category.children}
                        <div class="col-sm-1 btn-toggle">
                            <i class="fa fa-fw fa-caret-down {if $open}open{/if}{*{if $open}up{else}down{/if}*}"></i>
                        </div>
                    {else}
                        <div class="col-sm-1"></div>
                    {/if}
                </div>

                {if $category.children}
                    {category_level nested=$nested+1 ar_tree=$category.children open=$open}
                {/if}

                {*
                {if $category.children}
                    <a href="demands/?cnd[cat_id]={$category_id}" {if $nested}style="padding-left: {$nested*30}px;"{/if}>
                        <i class="fa fa-circle" {if $category.bgcolor}style="color: {$category.bgcolor}"{/if}></i>
                        <span class="nav-label">{$category.name}</span>
                        <i class="action-icon toggle-icon fa fa-{if $open}caret-up{else}caret-down{/if}"></i>
                    </a>
                    {category_level nested=$nested+1 ar_tree=$category.children open=$open}
                {else}
                    <a href="demands/?cnd[cat_id]={$category_id}" {if $nested}style="padding-left: {$nested*30}px;"{/if}>
                        <i class="fa fa-circle" {if $category.bgcolor}style="color: {$category.bgcolor}"{/if}></i>
                        <span class="nav-label">{$category.name}</span>
                    </a>
                {/if}
                *}
            </li>
        {/foreach}
    </ul>
{/function}


{category_level ar_tree=$cuser_data.ar_access_tree_categories}

{*
<ul{if $open} style="display: block"{/if}>
{if !$nested}
	<li {if $controller_name == "demands" && !$cur_category}class="active"{/if}>
		<a href="demands/">
            <i class="fa fa-circle" style="color: yellow"></i>
            <span class="nav-label">Все категории</span>
		</a>
	</li>
{/if}
{foreach from=$ar_tree item=category key=category_id}
	{if $cur_category && (in_array($category_id, $cur_category.ar_parents) || $cur_category.id == $category_id)}
		{assign var="open" value=true}
	{else}
		{assign var="open" value=false}
	{/if}
	<li class="{if $cur_category && $cur_category.id == $category_id}active{/if} {if $open}open{/if}">
	{if $category.children}
		<a href="demands/?cnd[cat_id]={$category_id}" {if $nested}style="padding-left: {$nested*30}px;"{/if}>
            <i class="fa fa-circle" {if $category.bgcolor}style="color: {$category.bgcolor}"{/if}></i>
			<span class="nav-label">{$category.name}</span>
			<i class="action-icon toggle-icon fa fa-{if $open}caret-up{else}caret-down{/if}"></i>
		</a>
		{include file="main/sidebar_categories_level.tpl" nested=$nested+1 ar_tree=$category.children open=$open}
	{else}
		<a href="demands/?cnd[cat_id]={$category_id}" {if $nested}style="padding-left: {$nested*30}px;"{/if}>
            <i class="fa fa-circle" {if $category.bgcolor}style="color: {$category.bgcolor}"{/if}></i>
            <span class="nav-label">{$category.name}</span>
		</a>
	{/if}
	</li>
{/foreach}
</ul>
*}