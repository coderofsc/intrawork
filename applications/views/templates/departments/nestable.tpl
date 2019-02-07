{if !$module_id && $controller_info.module_id}
    {assign var="module_id" value=$controller_info.module_id}
{/if}

{if $ar_tree}
<ol class="dd-list"{* id="departments-table"*}>
    {foreach from=$ar_tree item=dprt key=dprt_id}
        <li class="dd-item" data-id="{$dprt_id}">
			<button class="btn btn-default btn-sm dd-handle"><i class="fa fa-arrows-alt"></i></button>
            <div data-id="{$dprt_id}" class="dd-content c-hand">
                <span class="title pull-left2 text-ellipsis">{$dprt.name}</span>
                <div class="clearfix"></div>
            </div>
            <div class="dd-extra">
            <span class="pull-right" style="">
                {include file="helpers/lists/actions.tpl" module_id=$module_id id=$dprt_id tree=true}
            </span>
            <span class="pull-right" style="">
                <a href="users/?cnd[dprt_id]={$dprt_id}" class="btn btn-link btn-sm">
                    {*<span class="donut" style="line-height: 1">{rand(50,320)}/360</span>
                    <span>{$dprt.users_count}</span>*}
                    <span class="badge badge-white">{$dprt.users_count}</span>
                </a>
            </span>
            </div>

            {if $dprt.children}
                {include file="departments/nestable.tpl" nested=$nested+1 ar_tree=$dprt.children}
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