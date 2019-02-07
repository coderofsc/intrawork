<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 02:52:07
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\helpers\include_resource_js.tpl" */ ?>
<?php /*%%SmartyHeaderCode:145895c5a21a77a7ba5-31380253%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fff5d9bdb95ec1f90936d77df542c96974b30a0' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\include_resource_js.tpl',
      1 => 1437604252,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145895c5a21a77a7ba5-31380253',
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
  'unifunc' => 'content_5c5a21a77d69b4_47060685',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a21a77d69b4_47060685')) {function content_5c5a21a77d69b4_47060685($_smarty_tpl) {?><?php if (!$_smarty_tpl->tpl_vars['config']->value->dev_mode) {?>
	<?php echo '<script'; ?>
 type="text/javascript" src="min/<?php echo sha1(@constant('RESOURCE_VERSION'));?>
/?g=<?php  $_smarty_tpl->tpl_vars['file'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['file']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ar_resource']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['file']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['file']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['file']->key => $_smarty_tpl->tpl_vars['file']->value) {
$_smarty_tpl->tpl_vars['file']->_loop = true;
 $_smarty_tpl->tpl_vars['file']->iteration++;
 $_smarty_tpl->tpl_vars['file']->last = $_smarty_tpl->tpl_vars['file']->iteration === $_smarty_tpl->tpl_vars['file']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['r_js']['last'] = $_smarty_tpl->tpl_vars['file']->last;
echo $_smarty_tpl->tpl_vars['file']->value;
if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['r_js']['last']) {?>,<?php }
} ?>"><?php echo '</script'; ?>
>
<?php } else { ?>
<?php  $_smarty_tpl->tpl_vars['file'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['file']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ar_resource']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['file']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['file']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['file']->key => $_smarty_tpl->tpl_vars['file']->value) {
$_smarty_tpl->tpl_vars['file']->_loop = true;
 $_smarty_tpl->tpl_vars['file']->iteration++;
 $_smarty_tpl->tpl_vars['file']->last = $_smarty_tpl->tpl_vars['file']->iteration === $_smarty_tpl->tpl_vars['file']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['r_js']['last'] = $_smarty_tpl->tpl_vars['file']->last;
?>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['file']->value;?>
?v=<?php echo sha1(@constant('RESOURCE_VERSION'));?>
"><?php echo '</script'; ?>
>
<?php } ?>
<?php }?>
<?php }} ?>
