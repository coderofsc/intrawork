<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 02:52:07
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\helpers\include_resource_css.tpl" */ ?>
<?php /*%%SmartyHeaderCode:249165c5a21a7742296-15109376%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc2518097c44f2e4d1a2184b52c5f9e7b9b61ada' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\include_resource_css.tpl',
      1 => 1437604238,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '249165c5a21a7742296-15109376',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'ar_resource' => 0,
    'file' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a21a7778da6_95916607',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a21a7778da6_95916607')) {function content_5c5a21a7778da6_95916607($_smarty_tpl) {?><?php if (!$_smarty_tpl->tpl_vars['config']->value->dev_mode) {?>
	<link type="text/css" rel="stylesheet" href="min/<?php echo sha1(@constant('RESOURCE_VERSION'));?>
/?g=<?php  $_smarty_tpl->tpl_vars['file'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['file']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ar_resource']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['file']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['file']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['file']->key => $_smarty_tpl->tpl_vars['file']->value) {
$_smarty_tpl->tpl_vars['file']->_loop = true;
 $_smarty_tpl->tpl_vars['file']->iteration++;
 $_smarty_tpl->tpl_vars['file']->last = $_smarty_tpl->tpl_vars['file']->iteration === $_smarty_tpl->tpl_vars['file']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['r_css']['last'] = $_smarty_tpl->tpl_vars['file']->last;
echo $_smarty_tpl->tpl_vars['file']->value;
if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['r_css']['last']) {?>,<?php }
} ?>" />
<?php } else { ?>
<?php  $_smarty_tpl->tpl_vars['file'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['file']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ar_resource']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['file']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['file']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['file']->key => $_smarty_tpl->tpl_vars['file']->value) {
$_smarty_tpl->tpl_vars['file']->_loop = true;
 $_smarty_tpl->tpl_vars['file']->iteration++;
 $_smarty_tpl->tpl_vars['file']->last = $_smarty_tpl->tpl_vars['file']->iteration === $_smarty_tpl->tpl_vars['file']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['r_css']['last'] = $_smarty_tpl->tpl_vars['file']->last;
?>
	<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['file']->value;?>
?v=<?php echo sha1(@constant('RESOURCE_VERSION'));?>
"/>
<?php } ?>
<?php }?>
<?php }} ?>
