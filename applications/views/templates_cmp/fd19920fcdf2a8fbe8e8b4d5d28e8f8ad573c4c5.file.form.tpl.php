<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:42:22
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\todo\form\form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:293605991b6cecc0f90-44062990%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd19920fcdf2a8fbe8e8b4d5d28e8f8ad573c4c5' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\todo\\form\\form.tpl',
      1 => 1449430378,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '293605991b6cecc0f90-44062990',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5991b6cecc2ca0_84119942',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991b6cecc2ca0_84119942')) {function content_5991b6cecc2ca0_84119942($_smarty_tpl) {?><p>Добавляйте пункты с помощью кнопки «Добавить» или просто нажимая клавишу Enter.</p>

<div id="todo-list-form" class="input-group">
    <input type="text" class="form-control" placeholder="Название пункта чек-листа...">
    <span class="input-group-btn">
        <button class="btn btn-default" type="button">Добавить</button>
    </span>
</div>
<?php }} ?>
