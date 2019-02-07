
<div class="ui-layout-west">
	<div class="ui-layout-north pane-container">
		<h4 class="ui-pane-header">{L::modules_dashboard_text_headers_member_demands} <a href="demands/{if $ar_demands_member.conditions}?{$ar_demands_member.conditions|http_build_query:"cnd"}{/if}"><span class="badge badge-info pull-right">{$ar_demands_member.total}</span></a></h4>
        <div class="ui-layout-content">
	        {include file="demands/list.tpl" ar_demands=$ar_demands_member module_id=cls_modules::MODULE_DEMANDS}
        </div>
	</div>
	<div class="ui-layout-center pane-container">
	    <h4 class="ui-pane-header">{L::modules_dashboard_text_headers_new_demands} <a href="demands/{if $ar_demands_new.conditions}?{$ar_demands_new.conditions|http_build_query:"cnd"}{/if}"><span class="badge badge-primary pull-right">{$ar_demands_new.total}</span></a></h4>
        <div class="ui-layout-content">
            {include file="demands/list.tpl" ar_demands=$ar_demands_new module_id=cls_modules::MODULE_DEMANDS}
        </div>
    </div>

	<div class="ui-layout-south pane-container">
			<h4 class="ui-pane-header">{L::modules_dashboard_text_headers_last_news} <a href="news/{if $ar_news.conditions}?{$ar_news.conditions|http_build_query:"cnd"}{/if}"><span class="badge badge-success pull-right">{$ar_news.total}</span></a></h4>
        <div class="ui-layout-content">
            {include file="news/list.tpl" module_id=cls_modules::MODULE_NEWS}
        </div>

    </div>
</div>


<div class="ui-layout-center">

	<div class="ui-layout-north {*pane-content*} bg-light-muted" id="pulse-container" >
		{include file="dashboard/chart.tpl"}
	</div>

	<div class="ui-layout-center pane-container">
        <h4 class="ui-pane-header">{L::modules_dashboard_text_headers_last_events} <a href="events/{if $ar_events.conditions}?{$ar_events.conditions|http_build_query:"cnd"}{/if}"><span class="badge badge-success pull-right">{$ar_events.total}</span></a></h4>
		<div class="ui-layout-content">
		    {*{include file="dashboard/calendar.tpl"}*}
            {include file="dashboard/events.tpl"}
		</div>
	</div>

</div>



{literal}
    <script>

        // зададим обработчик
        $('body').bind('init.layout', function(event){





		});

    </script>
{/literal}