{*
<div  class="ui-layout-center animated fadeInDown">
    {include file="main/title.tpl"}
    {include file="mrooms/view/wrap.tpl"}
</div>*}

{if $controller_info.pane}
    {if $mroom_data}
        <div class="ui-layout-center animated fadeInDown">
            <div class="preview-container">
                {include file="main/title.tpl"}
                {include file="mrooms/view/wrap.tpl"}
            </div>
        </div>
    {else}
        <div class="ui-layout-center layout-preview bg-muted" id="mrooms-view-pane">
            <div class="preview-container cm-container"></div>
        </div>
    {/if}


    <div class="ui-layout-south pane-content{*east*}" >
        <div class="container-fluid">
        {include file="mrooms/reservations/calendar.tpl" modal=true}
        </div>
    </div>
{else}
    {include file="main/title.tpl"}
    {include file="mrooms/view/wrap.tpl"}
{/if}
