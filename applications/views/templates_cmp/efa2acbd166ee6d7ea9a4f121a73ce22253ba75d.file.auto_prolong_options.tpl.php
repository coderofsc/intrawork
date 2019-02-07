<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:48:11
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\demands\types\form\auto_prolong_options.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213105c5a2ecb4de729-02944810%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'efa2acbd166ee6d7ea9a4f121a73ce22253ba75d' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\types\\form\\auto_prolong_options.tpl',
      1 => 1453203126,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213105c5a2ecb4de729-02944810',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dt_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a2ecb5307b9_41948074',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2ecb5307b9_41948074')) {function content_5c5a2ecb5307b9_41948074($_smarty_tpl) {?><option value="0">Нет</option>
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
