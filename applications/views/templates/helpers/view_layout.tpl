{*
{if $controller_info.pane}
    <div class="ui-pane-header ui-pane-header-pager">
        {include file="helpers/lists/next_prev.tpl" np_calc=true id=$id}
    </div>

    <div class="ui-layout-content">
        {include file="main/title.tpl"}

        <div class="container-fluid">
            {include file="{$controller_info.module.alias}/view/wrap.tpl"}
        </div>
    </div>
{else}
    {include file="main/title.tpl"}
    <div class="container-fluid">
        {include file="{$controller_info.module.alias}/view/wrap.tpl"}
    </div>
{/if}
*}

{if $controller_info.pane}

    {capture name=content}
        <div class="ui-pane-header ui-pane-header-pager">
            {include file="helpers/lists/next_prev.tpl" np_calc=true id=$id}
        </div>
        <div class="ui-layout-content">
            {include file="main/title.tpl"}
            <div class="container-fluid">
                {include file="{$controller_info.module.alias}/view/wrap.tpl"}
                {if $controller_info.module.comments}
                    {include file="comments/wrap.tpl"}
                {/if}
            </div>
        </div>
    {/capture}

    {*Если в модуле включены комментарии, обрамляем контект в layout и добавляем pane формы комментария*}
    {if $controller_info.module.comments}
        <div class="ui-layout-center">
            {$smarty.capture.content}
        </div>
        {include file="comments/pane.tpl" owner_id=$id}
    {else}
        {$smarty.capture.content}
    {/if}
{else}
    {include file="main/title.tpl"}
    <div class="container-fluid">
        {include file="{$controller_info.module.alias}/view/wrap.tpl"}
        {if $controller_info.module.comments}
            {include file="comments/wrap.tpl"}
        {/if}
    </div>
{/if}


