<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:12:21
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\todo\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:97465c5a266554fd60-75097760%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eedd272e9ce038519e385000bcb9466fc06db3ca' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\todo\\list.tpl',
      1 => 1449484764,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97465c5a266554fd60-75097760',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_todo' => 0,
    'todo' => 0,
    'todo_id' => 0,
    'readonly' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a26655829f3_76010168',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a26655829f3_76010168')) {function content_5c5a26655829f3_76010168($_smarty_tpl) {?><ul id="todo-list" class="ui-sortable">
    <?php  $_smarty_tpl->tpl_vars['todo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['todo']->_loop = false;
 $_smarty_tpl->tpl_vars['todo_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ar_todo']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['todo']->key => $_smarty_tpl->tpl_vars['todo']->value) {
$_smarty_tpl->tpl_vars['todo']->_loop = true;
 $_smarty_tpl->tpl_vars['todo_id']->value = $_smarty_tpl->tpl_vars['todo']->key;
?>
        <li class="list-primary <?php if ($_smarty_tpl->tpl_vars['todo']->value['status']) {?>todo-done<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['todo_id']->value;?>
">
            <?php if (!$_smarty_tpl->tpl_vars['readonly']->value) {?>
                <i class=" fa fa-ellipsis-v"></i>
            <?php }?>
        <div class="todo-toggle i-checks">
            <input name="todo[<?php echo $_smarty_tpl->tpl_vars['todo_id']->value;?>
][status]" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['todo']->value['status']) {?>checked=""<?php }?> value="1"/>
        </div>
        <div class="todo-title">
            <input name="todo[<?php echo $_smarty_tpl->tpl_vars['todo_id']->value;?>
][title]" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['todo']->value['title'];?>
"/>
            <span class="todo-title-sp"><?php echo $_smarty_tpl->tpl_vars['todo']->value['title'];?>
</span>
            <?php if (!$_smarty_tpl->tpl_vars['readonly']->value) {?>
            <div class="pull-right todo-actions">
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-default btn-sm fa fa-pencil"></button>
                    <button class="btn btn-danger btn-sm fa fa-trash-o"></button>
                </div>
            </div>
        </div>
            <?php }?>
        </li>
    <?php } ?>
</ul><?php }} ?>
