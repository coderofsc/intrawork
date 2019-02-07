<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 05:29:36
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\todo\form\form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:130525c5a4690b530c3-85186110%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b74f6bceb3abd15809fac7dfe9392cf8669a650' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\todo\\form\\form.tpl',
      1 => 1449430378,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130525c5a4690b530c3-85186110',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a4690b56f44_55053653',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a4690b56f44_55053653')) {function content_5c5a4690b56f44_55053653($_smarty_tpl) {?><p>Добавляйте пункты с помощью кнопки «Добавить» или просто нажимая клавишу Enter.</p>

<div id="todo-list-form" class="input-group">
    <input type="text" class="form-control" placeholder="Название пункта чек-листа...">
    <span class="input-group-btn">
        <button class="btn btn-default" type="button">Добавить</button>
    </span>
</div>
<?php }} ?>
