<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:12:21
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\todo\wrap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:226445c5a26655059d5-56337433%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '043bdb17c95519a3b430e5f81cf9e344e21b7be3' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\todo\\wrap.tpl',
      1 => 1449484060,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '226445c5a26655059d5-56337433',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'demand_id' => 0,
    'lazy_writing' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a2665520f69_72196571',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2665520f69_72196571')) {function content_5c5a2665520f69_72196571($_smarty_tpl) {?><link rel="stylesheet" href="resources/js/jquery/plugin/todolist/jquery.todolist.css" />
<?php echo '<script'; ?>
 type="text/javascript" src="resources/js/jquery/plugin/todolist/jquery.todolist.js"><?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->getSubTemplate ("./form/form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="space"></div>
<?php echo $_smarty_tpl->getSubTemplate ("./list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo '<script'; ?>
>
    $(document).ready(function() {
        TodoListIW.init(<?php echo (($tmp = @$_smarty_tpl->tpl_vars['demand_id']->value)===null||$tmp==='' ? 0 : $tmp);?>
, <?php if ($_smarty_tpl->tpl_vars['lazy_writing']->value) {?>true<?php } else { ?>false<?php }?>);
    });
<?php echo '</script'; ?>
><?php }} ?>
