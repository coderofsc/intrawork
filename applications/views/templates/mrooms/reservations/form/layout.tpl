{if $controller_info.pane}
<div  class="ui-layout-center animated fadeInDown">
    {include file="main/title.tpl"}
    {include file="mrooms/reservations/form/form.tpl"}
</div>

<div class="ui-layout-east pane-content" >
    <div class="container-fluid">
    {include file="mrooms/reservations/calendar.tpl" mroom_id=$mroom_data.id}
        </div>
</div>
{else}
{include file="main/title.tpl"}
{include file="mrooms/reservations/form/form.tpl"}

{/if}