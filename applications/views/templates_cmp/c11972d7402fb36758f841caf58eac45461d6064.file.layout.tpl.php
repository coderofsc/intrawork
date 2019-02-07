<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:14:56
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\demands\view\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:234815c5a2700841432-07341972%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c11972d7402fb36758f841caf58eac45461d6064' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\view\\layout.tpl',
      1 => 1450880902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '234815c5a2700841432-07341972',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'controller_info' => 0,
    'readonly' => 0,
    'demand_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a2700914360_10663218',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2700914360_10663218')) {function content_5c5a2700914360_10663218($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['controller_info']->value['pane']) {?>

    <?php if (!$_smarty_tpl->tpl_vars['readonly']->value) {?>
	<div class="ui-layout-north overflow-hidden" id="demands-navbar-pane">

        <?php if ($_smarty_tpl->tpl_vars['demand_data']->value) {?>
		    <?php echo $_smarty_tpl->getSubTemplate ("demands/view/navbar_actions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php }?>
	</div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['demand_data']->value) {?>
		<div class="ui-layout-center layout-preview bg-light-muted " id="demands-view-pane">
            <div class="ui-pane-header ui-pane-header-pager">
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/lists/next_prev.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('np_calc'=>true,'id'=>$_smarty_tpl->tpl_vars['demand_data']->value['id']), 0);?>

            </div>
            <div class="ui-layout-content preview-container">
                <?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('light'=>true), 0);?>

                <?php echo $_smarty_tpl->getSubTemplate ("demands/view/wrap.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
        </div>
    <?php } else { ?>
		<div class="ui-layout-center layout-preview bg-muted" id="demands-view-pane" >
            <div class="ui-pane-header ui-pane-header-pager" style="display: none"><?php echo $_smarty_tpl->getSubTemplate ("helpers/lists/next_prev.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('np_calc'=>true), 0);?>
</div>
            <div class="ui-layout-content preview-container cm-container"></div>
		</div>
	<?php }?>

     
        <form id="message-form">
        <div class="ui-layout-south pane-content-sm" id="message-form-pane">
            <?php echo $_smarty_tpl->getSubTemplate ("demands/view/message_form_pane.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
        </form>


        <?php echo $_smarty_tpl->getSubTemplate ("demands/view/message_form_pane_toggler.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


        <?php echo '<script'; ?>
 src="resources/js/intrawork.demand.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
>
            DemandIW.init();
            <?php if ($_smarty_tpl->tpl_vars['demand_data']->value) {?>
                DemandIW.set_demand_id(<?php echo $_smarty_tpl->tpl_vars['demand_data']->value['id'];?>
);
                DemandIW.start_observer();
                DemandIW.get_member_options();
            <?php }?>
        <?php echo '</script'; ?>
>
    
<?php } else { ?>
    <?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('light'=>true), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("demands/view/wrap.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>


<?php }} ?>
