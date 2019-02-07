<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 16:13:02
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\helpers\forms\select_weekdays.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159715c5add5e643bf7-29191057%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2b27de6ad2c5a37e7fff5d56b6dd007a1522ce4' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\helpers\\forms\\select_weekdays.tpl',
      1 => 1437615934,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159715c5add5e643bf7-29191057',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_days' => 0,
    'name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5add5e6ad393_90531511',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5add5e6ad393_90531511')) {function content_5c5add5e6ad393_90531511($_smarty_tpl) {?><div class="row i-checks">
    <div class="col-sm-4">
        <label for="weekdays_1"><input <?php if ($_smarty_tpl->tpl_vars['ar_days']->value&&in_array(1,$_smarty_tpl->tpl_vars['ar_days']->value)) {?>checked=""<?php }?> name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
[]" value="1" type="checkbox" id="weekdays_1" /> Понедельник</label>
    </div>
    <div class="col-sm-4">
        <label for="weekdays_2"><input <?php if ($_smarty_tpl->tpl_vars['ar_days']->value&&in_array(2,$_smarty_tpl->tpl_vars['ar_days']->value)) {?>checked=""<?php }?> name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
[]" value="2" type="checkbox" id="weekdays_2" /> Вторник</label>
    </div>
    <div class="col-sm-4">
        <label for="weekdays_3"><input <?php if ($_smarty_tpl->tpl_vars['ar_days']->value&&in_array(3,$_smarty_tpl->tpl_vars['ar_days']->value)) {?>checked=""<?php }?> name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
[]" value="3" type="checkbox" id="weekdays_3" /> Среда</label>
    </div>
    <div class="col-sm-4">
        <label for="weekdays_4"><input <?php if ($_smarty_tpl->tpl_vars['ar_days']->value&&in_array(4,$_smarty_tpl->tpl_vars['ar_days']->value)) {?>checked=""<?php }?> name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
[]" value="4" type="checkbox" id="weekdays_4" /> Четверг</label>
    </div>
    <div class="col-sm-4">
        <label for="weekdays_5"><input <?php if ($_smarty_tpl->tpl_vars['ar_days']->value&&in_array(5,$_smarty_tpl->tpl_vars['ar_days']->value)) {?>checked=""<?php }?> name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
[]" value="5" type="checkbox" id="weekdays_5" /> Пятница</label>
    </div>
    <div class="col-sm-4">
        <label for="weekdays_6"><input <?php if ($_smarty_tpl->tpl_vars['ar_days']->value&&in_array(6,$_smarty_tpl->tpl_vars['ar_days']->value)) {?>checked=""<?php }?> name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
[]" value="6" type="checkbox" id="weekdays_6" /> Суббота</label>
    </div>
    <div class="col-sm-4">
        <label for="weekdays_7"><input <?php if ($_smarty_tpl->tpl_vars['ar_days']->value&&in_array(7,$_smarty_tpl->tpl_vars['ar_days']->value)) {?>checked=""<?php }?> name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
[]" value="7" type="checkbox" id="weekdays_7" /> Воскресенье</label>
    </div>
</div>
<?php }} ?>
