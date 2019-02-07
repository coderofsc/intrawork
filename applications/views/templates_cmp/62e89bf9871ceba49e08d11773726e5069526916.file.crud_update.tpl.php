<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 17:38:15
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\mailman\letters\notification\crud_update.tpl" */ ?>
<?php /*%%SmartyHeaderCode:231045c5af157dee8b9-74050025%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62e89bf9871ceba49e08d11773726e5069526916' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\mailman\\letters\\notification\\crud_update.tpl',
      1 => 1452772620,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '231045c5af157dee8b9-74050025',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cuser_data' => 0,
    'object_name' => 0,
    'module_info' => 0,
    'object_id' => 0,
    'item_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5af157e7b2d6_84523072',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5af157e7b2d6_84523072')) {function content_5c5af157e7b2d6_84523072($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_mb_ucfirst')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
?><p><?php if ($_smarty_tpl->tpl_vars['cuser_data']->value) {
echo smarty_modifier_mb_ucfirst(L::modules_users_morph_one);?>
 <a href="<?php echo @constant('HOST_ROOT');?>
users/view/<?php echo $_smarty_tpl->tpl_vars['cuser_data']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['cuser_data']->value['short_fio'];?>
</a><?php } else {
echo L::intrawork;
}?> <?php echo L::modules_events_crud_update;?>
 <?php echo L::text_object_morph_one;?>
 &mdash; <?php echo $_smarty_tpl->tpl_vars['object_name']->value;?>
 «<a href="<?php echo @constant('HOST_ROOT');
echo $_smarty_tpl->tpl_vars['module_info']->value['alias'];?>
/view/<?php echo $_smarty_tpl->tpl_vars['object_id']->value;?>
/"><?php echo $_smarty_tpl->tpl_vars['item_name']->value;?>
</a>»
<br/><br/>

<?php echo $_smarty_tpl->getSubTemplate ("./record_table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('previous'=>true), 0);?>



<?php }} ?>
