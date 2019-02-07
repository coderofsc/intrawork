<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 17:27:57
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\demands\types\form\auto_prolong_options.tpl" */ ?>
<?php /*%%SmartyHeaderCode:102205c5aeeede858a3-43730572%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0727ad5abd21edaf767a9f1641181d6ca847bda' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\demands\\types\\form\\auto_prolong_options.tpl',
      1 => 1453203126,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102205c5aeeede858a3-43730572',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dt_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5aeeeded7933_59349718',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5aeeeded7933_59349718')) {function content_5c5aeeeded7933_59349718($_smarty_tpl) {?><option value="0">Нет</option>
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
