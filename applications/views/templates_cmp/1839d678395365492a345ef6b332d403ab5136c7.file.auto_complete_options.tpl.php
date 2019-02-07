<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:48:11
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\demands\types\form\auto_complete_options.tpl" */ ?>
<?php /*%%SmartyHeaderCode:160645c5a2ecb3b58d5-89644345%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1839d678395365492a345ef6b332d403ab5136c7' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\types\\form\\auto_complete_options.tpl',
      1 => 1453207834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '160645c5a2ecb3b58d5-89644345',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a2ecb4422f9_36030453',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2ecb4422f9_36030453')) {function content_5c5a2ecb4422f9_36030453($_smarty_tpl) {?><option value="0">Нет</option>
<option <?php if ($_smarty_tpl->tpl_vars['value']->value==@constant('TIME_HOUR')) {?>selected=""<?php }?> value="<?php echo @constant('TIME_HOUR');?>
">Час</option>
<option <?php if ($_smarty_tpl->tpl_vars['value']->value==@constant('TIME_HOUR')*3) {?>selected=""<?php }?> value="<?php echo @constant('TIME_HOUR')*3;?>
">3 часа</option>
<option <?php if ($_smarty_tpl->tpl_vars['value']->value==@constant('TIME_HOUR')*6) {?>selected=""<?php }?> value="<?php echo @constant('TIME_HOUR')*6;?>
">6 часов</option>
<option <?php if ($_smarty_tpl->tpl_vars['value']->value==@constant('TIME_HOUR')*12) {?>selected=""<?php }?> value="<?php echo @constant('TIME_HOUR')*12;?>
">12 часов</option>

<option <?php if ($_smarty_tpl->tpl_vars['value']->value==@constant('TIME_DAY')) {?>selected=""<?php }?> value="<?php echo @constant('TIME_DAY');?>
">Сутки</option>
<option <?php if ($_smarty_tpl->tpl_vars['value']->value==@constant('TIME_HOUR')*36) {?>selected=""<?php }?> value="<?php echo @constant('TIME_HOUR')*36;?>
">36 часов</option>
<option <?php if ($_smarty_tpl->tpl_vars['value']->value==@constant('TIME_DAY')*2) {?>selected=""<?php }?> value="<?php echo @constant('TIME_DAY')*2;?>
">Два дня</option>
<option <?php if ($_smarty_tpl->tpl_vars['value']->value==@constant('TIME_WEEK')) {?>selected=""<?php }?> value="<?php echo @constant('TIME_WEEK');?>
">Неделя</option>
<option <?php if ($_smarty_tpl->tpl_vars['value']->value==@constant('TIME_WEEK')*2) {?>selected=""<?php }?> value="<?php echo @constant('TIME_WEEK')*2;?>
">Две недели</option>
<option <?php if ($_smarty_tpl->tpl_vars['value']->value==@constant('TIME_MONTH')) {?>selected=""<?php }?> value="<?php echo @constant('TIME_MONTH');?>
">Месяц</option>
<?php }} ?>
