{literal}
    <style>
        .pane  {
            display:	none; /* появится, когда макет инициализирует */
        }

        #small-screen-warning {
            display: none;
        }

        @media (max-width : 979px){
            #small-screen-warning {
                display: table;
            }
            .pane, .ui-layout-resizer {
                display:	none !important;
            }
        }
    </style>
{/literal}

<div id="small-screen-warning" class="cm-container">
    <div>
        <div class="h2">Слишком маленькое разрешение</div>
        Для работы с интерфейсом Интраворка необходимо свыше 980 пикселей горизонтального разрешения экрана!
    </div>
</div>

<div class="pane ui-layout-west" id="main-sidebar">
    {include file="main/sidebar/layout.tpl"}
</div>

<div class="pane ui-layout-center">
    <div class="ui-layout-north overflow-hidden">
        {include file="main/navbar/wrap.tpl"}
    </div>
    <div id="main-content" class="ui-layout-center{if !$controller_info.layout.center.childOptions.center.childOptions} animated fadeInDown{/if} {if $controller_info.jscroll}jscroll{/if}">
        {*{if !$controller_info.layout.center.childOptions.center.childOptions}
            {include file="main/title.tpl"}
        {/if}*}

        {$controller_data}
    </div>
</div>

{*
<div class="ui-layout-south">
	{include file="main/navbar_bottom.tpl"}
</div>
*}


<script type="text/javascript">

    function layout_resize_end(way,e) {
		$('body').trigger('layout_resize_end');
    }


    function customSaveState (Instance, state, options, name) {
        var state_JSON = Instance.readState();
        var state_string = Instance.encodeJSON( state_JSON );
        $.ui.cookie.write('customState', state_string );
    }

    function customLoadState (Instance, state, options, name) {
        var state_string = $.ui.cookie.read('customState');
        var savedState_JSON = Instance.decodeJSON( state_string );
        Instance.loadState( savedState_JSON, false ); // false = DO NOT animate open/close/resize (default)
    }


    $.layout.defaults.panes.fxName = 'none';
    $.layout.defaults.scrollToBookmarkOnLoad = false;

	var pageLayout;
	$(document).ready(function () {
        pageLayout = $('body').layout({$controller_info.layout|@json_encode});

        var state = pageLayout.options.stateManagement;

        window.fullState = pageLayout.readState(
                "north.size,south.size,east.size,west.size,"+
                        "north.isClosed,south.isClosed,east.isClosed,west.isClosed,"+
                        "north.isHidden,south.isHidden,east.isHidden,west.isHidden"
        );

        $('body').trigger('init.layout');
        SidebarIW.reload_cat_dmd_counts();
        CoreIW.reload_counters();


	});
</script>