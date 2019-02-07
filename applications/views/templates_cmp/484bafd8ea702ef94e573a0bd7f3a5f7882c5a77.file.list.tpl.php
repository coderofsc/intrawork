<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 17:48:52
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\comments\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8305c5af3d4b19a35-57491338%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '484bafd8ea702ef94e573a0bd7f3a5f7882c5a77' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\comments\\list.tpl',
      1 => 1455701258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8305c5af3d4b19a35-57491338',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_comments' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5af3d4b31139_93103775',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5af3d4b31139_93103775')) {function content_5c5af3d4b31139_93103775($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
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
