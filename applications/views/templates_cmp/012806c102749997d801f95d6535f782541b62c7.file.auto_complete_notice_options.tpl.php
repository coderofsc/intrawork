<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 17:27:57
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\demands\types\form\auto_complete_notice_options.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27195c5aeeedded2f7-47128545%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '012806c102749997d801f95d6535f782541b62c7' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\demands\\types\\form\\auto_complete_notice_options.tpl',
      1 => 1453203520,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27195c5aeeedded2f7-47128545',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dt_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5aeeede66490_33711358',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5aeeede66490_33711358')) {function content_5c5aeeede66490_33711358($_smarty_tpl) {?><option value="0">Нет</option>
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
