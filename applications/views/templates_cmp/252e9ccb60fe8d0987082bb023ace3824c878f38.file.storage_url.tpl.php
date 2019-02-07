<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 02:55:44
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\helpers\storage_url.tpl" */ ?>
<?php /*%%SmartyHeaderCode:82195c5a2280490523-56536540%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '252e9ccb60fe8d0987082bb023ace3824c878f38' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\storage_url.tpl',
      1 => 1454590132,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82195c5a2280490523-56536540',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hash' => 0,
    'dir' => 0,
    'thumb' => 0,
    'name' => 0,
    'ext' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a22804b37b9_61392457',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a22804b37b9_61392457')) {function content_5c5a22804b37b9_61392457($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_storage_path')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.storage_path.php';
?><?php echo smarty_modifier_storage_path($_smarty_tpl->tpl_vars['hash']->value,$_smarty_tpl->tpl_vars['dir']->value);
if ($_smarty_tpl->tpl_vars['thumb']->value) {?>thumbs/<?php echo $_smarty_tpl->tpl_vars['hash']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['thumb']->value;
} else {
echo $_smarty_tpl->tpl_vars['hash']->value;
if ($_smarty_tpl->tpl_vars['name']->value) {?>/<?php echo $_smarty_tpl->tpl_vars['name']->value;
}
}?>.<?php if ($_smarty_tpl->tpl_vars['thumb']->value) {?>jpg<?php } else {
echo $_smarty_tpl->tpl_vars['ext']->value;
}?><?php }} ?>
