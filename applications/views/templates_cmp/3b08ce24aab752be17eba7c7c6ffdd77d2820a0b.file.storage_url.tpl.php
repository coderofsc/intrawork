<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:42:22
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\helpers\storage_url.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8135991b6cec35504-34260335%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b08ce24aab752be17eba7c7c6ffdd77d2820a0b' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\helpers\\storage_url.tpl',
      1 => 1454590132,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8135991b6cec35504-34260335',
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
  'unifunc' => 'content_5991b6cec6f400_90378888',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991b6cec6f400_90378888')) {function content_5991b6cec6f400_90378888($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_storage_path')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.storage_path.php';
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
