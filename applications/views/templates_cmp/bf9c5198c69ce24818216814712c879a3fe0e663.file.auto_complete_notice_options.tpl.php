<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-09-22 14:39:02
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\demands\types\form\auto_complete_notice_options.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1861159c4f65680e240-76118822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf9c5198c69ce24818216814712c879a3fe0e663' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\types\\form\\auto_complete_notice_options.tpl',
      1 => 1453203520,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1861159c4f65680e240-76118822',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dt_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59c4f656849f70_69813094',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c4f656849f70_69813094')) {function content_59c4f656849f70_69813094($_smarty_tpl) {?><option value="0">Нет</option>
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
