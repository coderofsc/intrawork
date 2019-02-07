<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:42:22
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\todo\wrap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:301955991b6cec9c980-18014898%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8328a07c232f7bb7d19cc0e7f2fdcb0c0dfdb3de' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\todo\\wrap.tpl',
      1 => 1449484060,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '301955991b6cec9c980-18014898',
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
  'unifunc' => 'content_5991b6cecb6141_73477501',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991b6cecb6141_73477501')) {function content_5991b6cecb6141_73477501($_smarty_tpl) {?><link rel="stylesheet" href="resources/js/jquery/plugin/todolist/jquery.todolist.css" />
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
