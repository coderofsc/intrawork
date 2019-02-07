<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:48:11
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\demands\types\form\auto_complete_notice_options.tpl" */ ?>
<?php /*%%SmartyHeaderCode:266175c5a2ecb469407-78694490%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfb901169e2b89923774380e097dc8fd3cc89783' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\types\\form\\auto_complete_notice_options.tpl',
      1 => 1453203520,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '266175c5a2ecb469407-78694490',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dt_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a2ecb4c7016_04541189',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2ecb4c7016_04541189')) {function content_5c5a2ecb4c7016_04541189($_smarty_tpl) {?><option value="0">Нет</option>
<option <?php if ($_smarty_tpl->tpl_vars['dt_data']->value['auto_complete_notice']==@constant('TIME_HOUR')) {?>selected=""<?php }?> value="<?php echo @constant('TIME_HOUR');?>
">Час</option>
<option <?php if ($_smarty_tpl->tpl_vars['dt_data']->value['auto_complete_notice']==@constant('TIME_HOUR')*3) {?>selected=""<?php }?> value="<?php echo @constant('TIME_HOUR')*3;?>
">3 часа</option>
<option <?php if ($_smarty_tpl->tpl_vars['dt_data']->value['auto_complete_notice']==@constant('TIME_HOUR')*6) {?>selected=""<?php }?> value="<?php echo @constant('TIME_HOUR')*6;?>
">6 часов</option>
<option <?php if ($_smarty_tpl->tpl_vars['dt_data']->value['auto_complete_notice']==@constant('TIME_HOUR')*12) {?>selected=""<?php }?> value="<?php echo @constant('TIME_HOUR')*12;?>
">12 часов</option>
<option <?php if ($_smarty_tpl->tpl_vars['dt_data']->value['auto_complete_notice']==@constant('TIME_DAY')) {?>selected=""<?php }?> value="<?php echo @constant('TIME_DAY');?>
">Сутки</option>
<option <?php if ($_smarty_tpl->tpl_vars['dt_data']->value['auto_complete_notice']==@constant('TIME_HOUR')*36) {?>selected=""<?php }?> value="<?php echo @constant('TIME_HOUR')*36;?>
">36 часов</option>
<?php }} ?>
