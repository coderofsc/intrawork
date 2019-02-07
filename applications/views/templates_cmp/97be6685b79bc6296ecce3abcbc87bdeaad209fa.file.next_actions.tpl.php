<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 02:55:44
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\helpers\forms\next_actions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:47685c5a22800eaad5-08608593%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97be6685b79bc6296ecce3abcbc87bdeaad209fa' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\forms\\next_actions.tpl',
      1 => 1449494986,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47685c5a22800eaad5-08608593',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'controller_info' => 0,
    'next_redirect' => 0,
    'module' => 0,
    'parent_data' => 0,
    'reset' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a228015bf62_11892082',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a228015bf62_11892082')) {function content_5c5a228015bf62_11892082($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["next_redirect"] = new Smarty_variable($_SESSION['next_redirect'][$_smarty_tpl->tpl_vars['controller_info']->value['module']['alias']], null, 0);?>

<select class="selectpicker" name="next_redirect" data-width="170px">
	<option <?php if (!'next_redirect'||$_smarty_tpl->tpl_vars['next_redirect']->value==@constant('FORM_NA_LIST')) {?>selected=""<?php }?> value="<?php echo @constant('FORM_NA_LIST');?>
"><?php echo L::next_actions_list;?>
</option>
    <option <?php if ($_smarty_tpl->tpl_vars['next_redirect']->value==@constant('FORM_NA_VIEW')) {?>selected=""<?php }?> value="<?php echo @constant('FORM_NA_VIEW');?>
"><?php echo L::next_actions_view;?>
 <?php echo $_smarty_tpl->tpl_vars['module']->value['morph'][3];?>
</option>
	<option data-divider="true"></option>
    <option <?php if ($_smarty_tpl->tpl_vars['next_redirect']->value==@constant('FORM_NA_CREATE')) {?>selected=""<?php }?> value="<?php echo @constant('FORM_NA_CREATE');?>
"><?php echo L::next_actions_create;?>
</option>
    <?php if ($_smarty_tpl->tpl_vars['controller_info']->value['module_id']==cls_modules::MODULE_DEMANDS&&$_smarty_tpl->tpl_vars['parent_data']->value) {?>
    <option <?php if ($_smarty_tpl->tpl_vars['next_redirect']->value==@constant('FORM_NA_JOIN')) {?>selected=""<?php }?> value="<?php echo @constant('FORM_NA_JOIN');?>
"><?php echo L::next_actions_join;?>
</option>
    <?php }?>
    <option data-divider="true"></option>
    <option <?php if ($_smarty_tpl->tpl_vars['next_redirect']->value===@constant('FORM_NA_STAY')) {?>selected=""<?php }?> value="<?php echo @constant('FORM_NA_STAY');?>
"><?php echo L::next_actions_stay;?>
</option>
</select><?php if (!isset($_smarty_tpl->tpl_vars['reset']->value)||$_smarty_tpl->tpl_vars['reset']->value==true) {?> или <button class="btn btn-default btn-form-reset"><i class="fa fa-undo"></i> <span class="hidden-xs"><?php echo L::actions_reset;?>
</span></button><?php }?><?php }} ?>
