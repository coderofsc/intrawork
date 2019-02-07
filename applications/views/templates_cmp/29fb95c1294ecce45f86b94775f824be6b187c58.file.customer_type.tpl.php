<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:12:41
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\helpers\forms\customer_type.tpl" */ ?>
<?php /*%%SmartyHeaderCode:107155c5a2679b57758-74044264%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29fb95c1294ecce45f86b94775f824be6b187c58' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\forms\\customer_type.tpl',
      1 => 1450428784,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107155c5a2679b57758-74044264',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'read' => 0,
    'only' => 0,
    'cu_type' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a2679bd08f9_42509864',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2679bd08f9_42509864')) {function content_5c5a2679bd08f9_42509864($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['read']->value) {?>

<?php } else { ?>
    
    <?php $_smarty_tpl->tpl_vars["cu_type"] = new Smarty_variable(1, null, 0);?>
    <option <?php if ($_smarty_tpl->tpl_vars['only']->value&&((is_array($_smarty_tpl->tpl_vars['only']->value)&&!in_array($_smarty_tpl->tpl_vars['cu_type']->value,$_smarty_tpl->tpl_vars['only']->value))||(!is_array($_smarty_tpl->tpl_vars['only']->value)&&$_smarty_tpl->tpl_vars['only']->value!=$_smarty_tpl->tpl_vars['cu_type']->value))) {?>disabled<?php }?> <?php if ((is_array($_smarty_tpl->tpl_vars['value']->value)&&in_array($_smarty_tpl->tpl_vars['cu_type']->value,$_smarty_tpl->tpl_vars['value']->value))||$_smarty_tpl->tpl_vars['value']->value==$_smarty_tpl->tpl_vars['cu_type']->value) {?>selected=""<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['cu_type']->value;?>
">Внутренний пользователь</option>
    <?php $_smarty_tpl->tpl_vars["cu_type"] = new Smarty_variable(2, null, 0);?>
    <option <?php if ($_smarty_tpl->tpl_vars['only']->value&&((is_array($_smarty_tpl->tpl_vars['only']->value)&&!in_array($_smarty_tpl->tpl_vars['cu_type']->value,$_smarty_tpl->tpl_vars['only']->value))||(!is_array($_smarty_tpl->tpl_vars['only']->value)&&$_smarty_tpl->tpl_vars['only']->value!=$_smarty_tpl->tpl_vars['cu_type']->value))) {?>disabled<?php }?> <?php if ((is_array($_smarty_tpl->tpl_vars['value']->value)&&in_array($_smarty_tpl->tpl_vars['cu_type']->value,$_smarty_tpl->tpl_vars['value']->value))||$_smarty_tpl->tpl_vars['value']->value==$_smarty_tpl->tpl_vars['cu_type']->value) {?>selected=""<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['cu_type']->value;?>
">Внешний пользователь</option>
<?php }?><?php }} ?>
