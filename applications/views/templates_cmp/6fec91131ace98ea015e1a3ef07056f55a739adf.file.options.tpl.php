<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-09-22 14:34:49
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\helpers\forms\options.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1255859c4f559adec14-57769417%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6fec91131ace98ea015e1a3ef07056f55a739adf' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\forms\\options.tpl',
      1 => 1449567962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1255859c4f559adec14-57769417',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'selected' => 0,
    'text' => 0,
    'value_src' => 0,
    'value' => 0,
    'empty' => 0,
    'data' => 0,
    'group' => 0,
    'old_group' => 0,
    'item' => 0,
    'key' => 0,
    'only' => 0,
    'current_value' => 0,
    'subtext' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59c4f559b75d82_43449033',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c4f559b75d82_43449033')) {function content_59c4f559b75d82_43449033($_smarty_tpl) {?><?php if (!isset($_smarty_tpl->tpl_vars['selected']->value)) {?>
    <?php $_smarty_tpl->tpl_vars['selected'] = new Smarty_variable(-999, null, 0);?>
<?php }?>


<?php if (!$_smarty_tpl->tpl_vars['text']->value) {?>
    <?php $_smarty_tpl->tpl_vars["text"] = new Smarty_variable("name", null, 0);?>
<?php }?>

<?php if (!$_smarty_tpl->tpl_vars['value_src']->value) {?>
    <?php $_smarty_tpl->tpl_vars["value_src"] = new Smarty_variable("value", null, 0);?>
<?php }?>

<?php if (!$_smarty_tpl->tpl_vars['value']->value&&$_smarty_tpl->tpl_vars['value_src']->value!="key") {?>
    <?php $_smarty_tpl->tpl_vars["value"] = new Smarty_variable("id", null, 0);?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['empty']->value) {?>
    <option value="0"></option>
<?php }?>

<?php $_smarty_tpl->tpl_vars["old_group"] = new Smarty_variable(-1, null, 0);?>

<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->index++;
 $_smarty_tpl->tpl_vars['item']->first = $_smarty_tpl->tpl_vars['item']->index === 0;
?>
    <?php if ($_smarty_tpl->tpl_vars['group']->value&&$_smarty_tpl->tpl_vars['old_group']->value!=$_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['group']->value]) {?>
        <?php if (!$_smarty_tpl->tpl_vars['item']->first) {?></optgroup><?php }?>
        <optgroup label="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['group']->value])===null||$tmp==='' ? 'Без группы' : $tmp);?>
">
        <?php $_smarty_tpl->tpl_vars["old_group"] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['group']->value], null, 0);?>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['value_src']->value=="key") {?>
        <?php $_smarty_tpl->tpl_vars["current_value"] = new Smarty_variable($_smarty_tpl->tpl_vars['key']->value, null, 0);?>
        <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars["current_value"] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['value']->value], null, 0);?>
    <?php }?>


    <option <?php if ($_smarty_tpl->tpl_vars['only']->value&&((is_array($_smarty_tpl->tpl_vars['only']->value)&&!in_array($_smarty_tpl->tpl_vars['current_value']->value,$_smarty_tpl->tpl_vars['only']->value))||(!is_array($_smarty_tpl->tpl_vars['only']->value)&&$_smarty_tpl->tpl_vars['only']->value!=$_smarty_tpl->tpl_vars['current_value']->value))) {?>disabled<?php }?> <?php if ($_smarty_tpl->tpl_vars['subtext']->value) {?>data-subtext="<?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['subtext']->value];?>
"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['current_value']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['selected']->value==$_smarty_tpl->tpl_vars['current_value']->value||(is_array($_smarty_tpl->tpl_vars['selected']->value)&&in_array($_smarty_tpl->tpl_vars['current_value']->value,$_smarty_tpl->tpl_vars['selected']->value))) {?>selected=""<?php }?>>
        <?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['text']->value];?>

    </option>
<?php } ?>

<?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
    </optgroup>
<?php }?>
<?php }} ?>
