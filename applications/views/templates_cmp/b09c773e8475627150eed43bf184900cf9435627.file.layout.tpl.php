<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 02:55:44
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\main\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:312625c5a22802a41b4-76357278%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b09c773e8475627150eed43bf184900cf9435627' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\main\\layout.tpl',
      1 => 1454578854,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '312625c5a22802a41b4-76357278',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'controller_info' => 0,
    'controller_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a22802cf144_68192191',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a22802cf144_68192191')) {function content_5c5a22802cf144_68192191($_smarty_tpl) {?>
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


<div id="small-screen-warning" class="cm-container">
    <div>
        <div class="h2">Слишком маленькое разрешение</div>
        Для работы с интерфейсом Интраворка необходимо свыше 980 пикселей горизонтального разрешения экрана!
    </div>
</div>

<div class="pane ui-layout-west" id="main-sidebar">
    <?php echo $_smarty_tpl->getSubTemplate ("main/sidebar/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>

<div class="pane ui-layout-center">
    <div class="ui-layout-north overflow-hidden">
        <?php echo $_smarty_tpl->getSubTemplate ("main/navbar/wrap.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
    <div id="main-content" class="ui-layout-center<?php if (!$_smarty_tpl->tpl_vars['controller_info']->value['layout']['center']['childOptions']['center']['childOptions']) {?> animated fadeInDown<?php }?> <?php if ($_smarty_tpl->tpl_vars['controller_info']->value['jscroll']) {?>jscroll<?php }?>">
        

        <?php echo $_smarty_tpl->tpl_vars['controller_data']->value;?>

    </div>
</div>




<?php echo '<script'; ?>
 type="text/javascript">

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
        pageLayout = $('body').layout(<?php echo json_encode($_smarty_tpl->tpl_vars['controller_info']->value['layout']);?>
);

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
<?php echo '</script'; ?>
><?php }} ?>
