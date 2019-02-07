<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 17:27:57
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\demands\types\form\auto_complete_options.tpl" */ ?>
<?php /*%%SmartyHeaderCode:195185c5aeeedcf32c2-56676304%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d9a3f46c816efe627ca2a2f573804afe1e7e61f' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\demands\\types\\form\\auto_complete_options.tpl',
      1 => 1453207834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195185c5aeeedcf32c2-56676304',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5aeeeddc61f3_74125823',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5aeeeddc61f3_74125823')) {function content_5c5aeeeddc61f3_74125823($_smarty_tpl) {?><option value="0">Нет</option>
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
