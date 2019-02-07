{if $controller_info.pane}

    {if !$readonly}
	<div class="ui-layout-north overflow-hidden" id="demands-navbar-pane">

        {if $demand_data}
		    {include file="demands/view/navbar_actions.tpl"}
        {/if}
	</div>
    {/if}

    {if $demand_data}
		<div class="ui-layout-center layout-preview bg-light-muted {*bg-light-muted*}" id="demands-view-pane">
            <div class="ui-pane-header ui-pane-header-pager">
                {include file="helpers/lists/next_prev.tpl" np_calc=true id=$demand_data.id}
            </div>
            <div class="ui-layout-content preview-container">
                {include file="main/title.tpl" light=true}
                {include file="demands/view/wrap.tpl"}
            </div>
        </div>
    {else}
		<div class="ui-layout-center layout-preview bg-muted" id="demands-view-pane" {*style="background-color: #F1F1F1"*}>
            <div class="ui-pane-header ui-pane-header-pager" style="display: none">{include file="helpers/lists/next_prev.tpl" np_calc=true}</div>
            <div class="ui-layout-content preview-container cm-container"></div>
		</div>
	{/if}

    {*{if !$readonly}*} {*Здесь, конечно, непонятно, запрещять ли сообщения для пользователей, у которых, например нет достпуа на правку заявок, или ограниченный доступ к заявке у роли. *}
        <form id="message-form">
        <div class="ui-layout-south pane-content-sm" id="message-form-pane">
            {include file="demands/view/message_form_pane.tpl"}
        </div>
        </form>


        {include file="demands/view/message_form_pane_toggler.tpl"}

        <script src="resources/js/intrawork.demand.js"></script>
        <script>
            DemandIW.init();
            {if $demand_data}
                DemandIW.set_demand_id({$demand_data.id});
                DemandIW.start_observer();
                DemandIW.get_member_options();
            {/if}
        </script>
    {*{/if}*}
{else}
    {include file="main/title.tpl" light=true}
    {include file="demands/view/wrap.tpl"}
{/if}


