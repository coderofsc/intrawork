<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 02:55:46
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\dashboard\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:235485c5a22823e4e24-72420373%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3fa4ef43a6d8313c835af11241118b630e4f5543' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\dashboard\\layout.tpl',
      1 => 1447934390,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '235485c5a22823e4e24-72420373',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_demands_member' => 0,
    'ar_demands_new' => 0,
    'ar_news' => 0,
    'ar_events' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a228249c7d0_35264294',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a228249c7d0_35264294')) {function content_5c5a228249c7d0_35264294($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_http_build_query')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.http_build_query.php';
?>
<div class="ui-layout-west">
	<div class="ui-layout-north pane-container">
		<h4 class="ui-pane-header"><?php echo L::modules_dashboard_text_headers_member_demands;?>
 <a href="demands/<?php if ($_smarty_tpl->tpl_vars['ar_demands_member']->value['conditions']) {?>?<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['ar_demands_member']->value['conditions'],"cnd");
}?>"><span class="badge badge-info pull-right"><?php echo $_smarty_tpl->tpl_vars['ar_demands_member']->value['total'];?>
</span></a></h4>
        <div class="ui-layout-content">
	        <?php echo $_smarty_tpl->getSubTemplate ("demands/list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ar_demands'=>$_smarty_tpl->tpl_vars['ar_demands_member']->value,'module_id'=>cls_modules::MODULE_DEMANDS), 0);?>

        </div>
	</div>
	<div class="ui-layout-center pane-container">
	    <h4 class="ui-pane-header"><?php echo L::modules_dashboard_text_headers_new_demands;?>
 <a href="demands/<?php if ($_smarty_tpl->tpl_vars['ar_demands_new']->value['conditions']) {?>?<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['ar_demands_new']->value['conditions'],"cnd");
}?>"><span class="badge badge-primary pull-right"><?php echo $_smarty_tpl->tpl_vars['ar_demands_new']->value['total'];?>
</span></a></h4>
        <div class="ui-layout-content">
            <?php echo $_smarty_tpl->getSubTemplate ("demands/list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ar_demands'=>$_smarty_tpl->tpl_vars['ar_demands_new']->value,'module_id'=>cls_modules::MODULE_DEMANDS), 0);?>

        </div>
    </div>

	<div class="ui-layout-south pane-container">
			<h4 class="ui-pane-header"><?php echo L::modules_dashboard_text_headers_last_news;?>
 <a href="news/<?php if ($_smarty_tpl->tpl_vars['ar_news']->value['conditions']) {?>?<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['ar_news']->value['conditions'],"cnd");
}?>"><span class="badge badge-success pull-right"><?php echo $_smarty_tpl->tpl_vars['ar_news']->value['total'];?>
</span></a></h4>
        <div class="ui-layout-content">
            <?php echo $_smarty_tpl->getSubTemplate ("news/list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('module_id'=>cls_modules::MODULE_NEWS), 0);?>

        </div>

    </div>
</div>


<div class="ui-layout-center">

	<div class="ui-layout-north  bg-light-muted" id="pulse-container" >
		<?php echo $_smarty_tpl->getSubTemplate ("dashboard/chart.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>

	<div class="ui-layout-center pane-container">
        <h4 class="ui-pane-header"><?php echo L::modules_dashboard_text_headers_last_events;?>
 <a href="events/<?php if ($_smarty_tpl->tpl_vars['ar_events']->value['conditions']) {?>?<?php echo smarty_modifier_http_build_query($_smarty_tpl->tpl_vars['ar_events']->value['conditions'],"cnd");
}?>"><span class="badge badge-success pull-right"><?php echo $_smarty_tpl->tpl_vars['ar_events']->value['total'];?>
</span></a></h4>
		<div class="ui-layout-content">
		    
            <?php echo $_smarty_tpl->getSubTemplate ("dashboard/events.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		</div>
	</div>

</div>




    <?php echo '<script'; ?>
>

        // зададим обработчик
        $('body').bind('init.layout', function(event){





		});

    <?php echo '</script'; ?>
>
<?php }} ?>
