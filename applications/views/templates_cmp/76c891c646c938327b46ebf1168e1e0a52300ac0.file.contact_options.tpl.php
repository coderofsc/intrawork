<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 02:55:43
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\helpers\forms\contact_options.tpl" */ ?>
<?php /*%%SmartyHeaderCode:107595c5a227fdd73c9-61984638%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76c891c646c938327b46ebf1168e1e0a52300ac0' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\forms\\contact_options.tpl',
      1 => 1449747522,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107595c5a227fdd73c9-61984638',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'empty' => 0,
    'ar_contacts' => 0,
    'old_legal' => 0,
    'item' => 0,
    'value' => 0,
    'only' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a227fe77663_74925354',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a227fe77663_74925354')) {function content_5c5a227fe77663_74925354($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['empty']->value) {?>
    <option value="0"></option>
<?php }?>

<?php $_smarty_tpl->tpl_vars["old_legal"] = new Smarty_variable("0", null, 0);?>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ar_contacts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
 $_smarty_tpl->tpl_vars['item']->index++;
 $_smarty_tpl->tpl_vars['item']->first = $_smarty_tpl->tpl_vars['item']->index === 0;
?>

    <?php if ($_smarty_tpl->tpl_vars['old_legal']->value!=$_smarty_tpl->tpl_vars['item']->value['legal']) {?>
        <?php if (!$_smarty_tpl->tpl_vars['item']->first) {?></optgroup><?php }?>
        <optgroup label="<?php if ($_smarty_tpl->tpl_vars['item']->value['legal']==@constant('NATURAL_PERSON')) {?>Частные<?php } else { ?>Юридические<?php }?> лица">
        <?php $_smarty_tpl->tpl_vars["old_legal"] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value['legal'], null, 0);?>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['item']->value['legal']==@constant('NATURAL_PERSON')) {?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['value']->value==$_smarty_tpl->tpl_vars['item']->value['id']) {?>selected=""<?php }?>>
            <?php echo $_smarty_tpl->tpl_vars['item']->value['face_short_fio'];?>

        </option>
    <?php } else { ?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['only']->value&&((is_array($_smarty_tpl->tpl_vars['only']->value)&&!in_array($_smarty_tpl->tpl_vars['item']->value['id'],$_smarty_tpl->tpl_vars['only']->value))||(!is_array($_smarty_tpl->tpl_vars['only']->value)&&$_smarty_tpl->tpl_vars['only']->value!=$_smarty_tpl->tpl_vars['item']->value['id']))) {?>disabled<?php }?> <?php if ((is_array($_smarty_tpl->tpl_vars['value']->value)&&in_array($_smarty_tpl->tpl_vars['item']->value['id'],$_smarty_tpl->tpl_vars['value']->value))||$_smarty_tpl->tpl_vars['value']->value==$_smarty_tpl->tpl_vars['item']->value['id']) {?>selected=""<?php }?> data-subtext="<?php echo $_smarty_tpl->tpl_vars['item']->value['face_short_fio'];?>
">
            <?php echo $_smarty_tpl->tpl_vars['item']->value['company_full_name'];?>

        </option>
    <?php }?>
<?php } ?>
</optgroup><?php }} ?>
