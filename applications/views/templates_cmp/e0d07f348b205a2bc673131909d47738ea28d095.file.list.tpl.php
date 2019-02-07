<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:27:06
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\comments\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171605c5a29da2dd500-70068822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0d07f348b205a2bc673131909d47738ea28d095' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\comments\\list.tpl',
      1 => 1455701258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171605c5a29da2dd500-70068822',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_comments' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a29da2f0d93_87855533',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a29da2f0d93_87855533')) {function content_5c5a29da2f0d93_87855533($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ar_comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
    <?php echo $_smarty_tpl->getSubTemplate ("./item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }
if (!$_smarty_tpl->tpl_vars['comment']->_loop) {
?>
        <div class="alert alert-default">Нет комментариев</div>
<?php } ?><?php }} ?>
