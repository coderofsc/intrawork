<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-09-22 14:39:02
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\demands\types\form\auto_prolong_options.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1188859c4f6568b5f04-49877391%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c846dd59ea361ad77c51da457313ca2b4beb400' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\types\\form\\auto_prolong_options.tpl',
      1 => 1453203126,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1188859c4f6568b5f04-49877391',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dt_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59c4f6568eed90_10385151',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c4f6568eed90_10385151')) {function content_59c4f6568eed90_10385151($_smarty_tpl) {?><option value="0">Нет</option>
<option <?php if ($_smarty_tpl->tpl_vars['dt_data']->value['auto_prolong']==@constant('TIME_HOUR')/2) {?>selected=""<?php }?> value="<?php echo @constant('TIME_HOUR')/2;?>
">30 минут</option>
<option <?php if ($_smarty_tpl->tpl_vars['dt_data']->value['auto_prolong']==@constant('TIME_HOUR')) {?>selected=""<?php }?> value="<?php echo @constant('TIME_HOUR');?>
">Час</option>
<option <?php if ($_smarty_tpl->tpl_vars['dt_data']->value['auto_prolong']==@constant('TIME_HOUR')*3) {?>selected=""<?php }?> value="<?php echo @constant('TIME_HOUR')*3;?>
">Три часа</option>
<option <?php if ($_smarty_tpl->tpl_vars['dt_data']->value['auto_prolong']==@constant('TIME_HOUR')*6) {?>selected=""<?php }?> value="<?php echo @constant('TIME_HOUR')*6;?>
">Шесть часов</option>
<option <?php if ($_smarty_tpl->tpl_vars['dt_data']->value['auto_prolong']==@constant('TIME_DAY')) {?>selected=""<?php }?> value="<?php echo @constant('TIME_DAY');?>
">Сутки</option>
<?php }} ?>
