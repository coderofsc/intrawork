<ol class="dd-list">
    {foreach from=$ar_tree item=demand key=demand_id}
        <li class="dd-item" data-id="{$demand_id}">
            <button class="btn btn-default btn-sm dd-handle"><i class="fa fa-arrows-alt"></i></button>
            <div data-id="{$demand_id}" class="dd-content c-hand {if $demand_data.id == $demand.id}selected{/if}">
                <a href="demands/view/{$demand.id}/" class="title pr-90 text-ellipsis">
                    {*<i class="fa text-{m_demands::$ar_status[$demand.status].color} fa-{m_demands::$ar_status[$demand.status].icon}" title="{m_demands::$ar_status[$demand.status].name}"></i>*}
                    {$demand.title}
                </a>
                <div class="clearfix"></div>
            </div>
            <div class="dd-extra">
                <span class="pull-left">
                    <span class="btn btn-block">
                    {include file="helpers/forms/demand_status.tpl" value=$demand.status read=true}
                    </span>
                </span>
                <span class="pull-left">
                    {*{include file="helpers/lists/actions.tpl" module_id=$module_id id=$demand_id tree=true}*}
                </span>
            </div>

            {if $demand.children}
                {include file="./nestable.tpl" nested=$nested+1 ar_tree=$demand.children}
            {/if}
        </li>
    {/foreach}
</ol>
