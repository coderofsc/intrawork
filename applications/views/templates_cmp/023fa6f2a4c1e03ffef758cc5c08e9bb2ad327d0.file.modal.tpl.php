<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-09-22 14:34:50
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\main\render\modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2515359c4f55a3a9372-64018394%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '023fa6f2a4c1e03ffef758cc5c08e9bb2ad327d0' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\main\\render\\modal.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2515359c4f55a3a9372-64018394',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'controller_info' => 0,
    'action' => 0,
    'query_log_result' => 0,
    'controller_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59c4f55a3eeb63_30802114',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c4f55a3eeb63_30802114')) {function content_59c4f55a3eeb63_30802114($_smarty_tpl) {?><div class="modal-header">
	

	<div class="action-block">
		<?php if ($_smarty_tpl->tpl_vars['controller_info']->value['actions']) {?>
			<?php  $_smarty_tpl->tpl_vars['action'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['action']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['controller_info']->value['actions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['action']->key => $_smarty_tpl->tpl_vars['action']->value) {
$_smarty_tpl->tpl_vars['action']->_loop = true;
?>
				<a <?php if ($_smarty_tpl->tpl_vars['action']->value['delete']) {?>data-confirm-title="<?php echo L::crud_delete;?>
 <?php if ($_smarty_tpl->tpl_vars['controller_info']->value['module']) {
echo $_smarty_tpl->tpl_vars['controller_info']->value['module']['morph'][1];
} else {
echo L::text_object_morph_two;
}?>" data-confirm="<?php echo L::confirm_delete_message;?>
"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['action']->value['href'];?>
" class="<?php if ($_smarty_tpl->tpl_vars['action']->value['delete']) {?>confirmcall<?php }?> btn btn-<?php if ($_smarty_tpl->tpl_vars['action']->value['type']) {
echo $_smarty_tpl->tpl_vars['action']->value['type'];
} else { ?>default<?php }?> btn-sm">
                    <?php if ($_smarty_tpl->tpl_vars['action']->value['icon']) {?><i class="fa fa-<?php echo $_smarty_tpl->tpl_vars['action']->value['icon'];?>
"></i> <?php }
echo $_smarty_tpl->tpl_vars['action']->value['name'];?>

                </a>
			<?php } ?>
		<?php }?>
		<button type="button" data-dismiss="modal" class="btn btn-default btn-sm" aria-hidden="true">&times;</button>
	</div>

	<h4 class="modal-title"><?php if ($_smarty_tpl->tpl_vars['controller_info']->value['title']) {
echo $_smarty_tpl->tpl_vars['controller_info']->value['title'];
} else {
echo L::text_unknown_controller;?>
!<?php }?></h4>
	<?php echo $_smarty_tpl->getSubTemplate ("main/breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<div class="modal-body">
	<?php if ($_smarty_tpl->tpl_vars['query_log_result']->value) {
echo $_smarty_tpl->tpl_vars['query_log_result']->value;
}?>
	<?php echo $_smarty_tpl->getSubTemplate ("helpers/alerts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php echo $_smarty_tpl->tpl_vars['controller_data']->value;?>

</div>
<?php }} ?>
