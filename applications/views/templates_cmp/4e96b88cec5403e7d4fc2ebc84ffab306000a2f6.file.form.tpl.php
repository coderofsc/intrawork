<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:12:21
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\todo\form\form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:127015c5a26655347e9-04257581%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e96b88cec5403e7d4fc2ebc84ffab306000a2f6' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\todo\\form\\form.tpl',
      1 => 1449430378,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '127015c5a26655347e9-04257581',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a2665538665_90618086',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2665538665_90618086')) {function content_5c5a2665538665_90618086($_smarty_tpl) {?><p>Добавляйте пункты с помощью кнопки «Добавить» или просто нажимая клавишу Enter.</p>

<div id="todo-list-form" class="input-group">
    <input type="text" class="form-control" placeholder="Название пункта чек-листа...">
    <span class="input-group-btn">
        <button class="btn btn-default" type="button">Добавить</button>
    </span>
</div>
<?php }} ?>
