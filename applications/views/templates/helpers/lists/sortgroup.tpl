{*<div class="container-fluid">
    <div class="pull-left">*}

        {*<span>Сортировка</span>
        <i class="fa fa-sort"></i>*}

{if $ar_sort}
    <div class="pull-right">
        <div class="btn-group btn-group-sm">
            <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" title="Сортировка">
                <i class="fa fa-sort-amount-{if $sort.dir == $smarty.const.SORT_ASC_AZ}asc{else}desc{/if}"></i><span class="hidden-xs"> {$ar_sort[$sort.by].name}</span> <span class="caret"></span>
            </button>
    
            <ul class="dropdown-menu dropdown-menu-right dropdown-menu-wauto" role="menu">
                {foreach from=$ar_sort item=sort_item key=by}
                <li {if $sort.by == $by}class="active"{/if}><a href="{$current_url_path}?{$conditions|http_build_query:"cnd"}{if $conditions}&{/if}sort[by]={$by}&sort[dir]={$sort.dir}">{$sort_item.name}</a></li>
                {/foreach}
    
                <li class="divider"></li>
    
                <li {if $sort.dir == $smarty.const.SORT_ASC_AZ}class="active"{/if}><a href="{$current_url_path}?{$conditions|http_build_query:"cnd"}{if $conditions}&{/if}sort[by]={$sort.by}&sort[dir]={$smarty.const.SORT_ASC_AZ}"><i class="fa fa-sort-amount-asc"></i> {L::sort_asc}</a></li>
                <li {if $sort.dir == $smarty.const.SORT_DSC_ZA}class="active"{/if}><a href="{$current_url_path}?{$conditions|http_build_query:"cnd"}{if $conditions}&{/if}sort[by]={$sort.by}&sort[dir]={$smarty.const.SORT_DSC_ZA}"><i class="fa fa-sort-amount-desc"></i> {L::sort_desc}</a></li>
            </ul>
        </div>
    </div>
{/if}

{if $ar_group}
    <div class="pull-right">
        <div class="btn-group btn-group-sm">
            <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" title="Группировка">
                {*<i class="fa fa-sort-amount-{if $group.dir == $smarty.const.SORT_ASC_AZ}asc{else}desc{/if}"></i><span class="hidden-xs"> {$ar_group[$group.by].name}</span> <span class="caret"></span>*}
                <i class="fa fa-object-ungroup"></i><span class="hidden-xs"> {$ar_group[$group.by].name|default:"Нет"}</span> <span class="caret"></span>
            </button>

            <ul class="dropdown-menu dropdown-menu-right dropdown-menu-wauto" role="menu">
                <li {if !$group.by || $group.by=="none"}class="active"{/if}><a href="{$current_url_path}?{$conditions|http_build_query:"cnd"}{if $conditions}&{/if}group[by]=none">Нет</a></li>
                <li class="divider"></li>

                {foreach from=$ar_group item=group_item key=by}
                    <li {if $group.by == $by}class="active"{/if}><a href="{$current_url_path}?{$conditions|http_build_query:"cnd"}{if $conditions}&{/if}group[by]={$by}&group[dir]={$group.dir}">{$group_item.name}</a></li>
                {/foreach}

                <li class="divider"></li>

                <li {if $group.dir == $smarty.const.SORT_ASC_AZ}class="active"{/if}><a href="{$current_url_path}?{$conditions|http_build_query:"cnd"}{if $conditions}&{/if}group[by]={$group.by}&group[dir]={$smarty.const.SORT_ASC_AZ}"><i class="fa fa-sort-amount-asc"></i> {L::sort_asc}</a></li>
                <li {if $group.dir == $smarty.const.SORT_DSC_ZA}class="active"{/if}><a href="{$current_url_path}?{$conditions|http_build_query:"cnd"}{if $conditions}&{/if}group[by]={$group.by}&group[dir]={$smarty.const.SORT_DSC_ZA}"><i class="fa fa-sort-amount-desc"></i> {L::sort_desc}</a></li>
            </ul>
        </div>
    </div>
{/if}

{*    </div>
</div>*}
