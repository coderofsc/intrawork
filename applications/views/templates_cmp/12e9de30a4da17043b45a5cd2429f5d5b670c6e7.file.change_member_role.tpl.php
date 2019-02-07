<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:50:56
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\mailman\letters\demands\change_member_role.tpl" */ ?>
<?php /*%%SmartyHeaderCode:143315c5a2f70c6ddb6-09431844%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12e9de30a4da17043b45a5cd2429f5d5b670c6e7' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\mailman\\letters\\demands\\change_member_role.tpl',
      1 => 1452770040,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143315c5a2f70c6ddb6-09431844',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cuser_data' => 0,
    'action' => 0,
    'role' => 0,
    'demand_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a2f70d06368_24017421',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2f70d06368_24017421')) {function content_5c5a2f70d06368_24017421($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_mb_ucfirst')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
?><p><?php if ($_smarty_tpl->tpl_vars['cuser_data']->value) {
echo smarty_modifier_mb_ucfirst(L::modules_users_morph_one);?>
 <a href="<?php echo @constant('HOST_ROOT');?>
users/view/<?php echo $_smarty_tpl->tpl_vars['cuser_data']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['cuser_data']->value['short_fio'];?>
</a><?php } else {
echo L::intrawork;
}?> <?php if ($_smarty_tpl->tpl_vars['action']->value) {?>назначил вас на роль<?php } else { ?>снял вас с роли<?php }?> <?php if ($_smarty_tpl->tpl_vars['role']->value==@constant('ROLE_EXECUTOR')) {?>исполнителя<?php } else { ?>ответственного<?php }?> заявки &mdash; «<a href="<?php echo @constant('HOST_ROOT');?>
demands/view/<?php echo $_smarty_tpl->tpl_vars['demand_data']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['demand_data']->value['title'];?>
</a>»
<br/>
<?php echo $_smarty_tpl->getSubTemplate ("./detail.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('demand_id'=>$_smarty_tpl->tpl_vars['demand_data']->value['id'],'cat_id'=>$_smarty_tpl->tpl_vars['demand_data']->value['cat_id']), 0);?>

<?php }} ?>
