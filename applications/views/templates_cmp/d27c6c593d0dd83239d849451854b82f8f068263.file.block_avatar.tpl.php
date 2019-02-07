<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:27:06
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\contacts\view\block_avatar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15185c5a29da0e1792-00253658%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd27c6c593d0dd83239d849451854b82f8f068263' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\contacts\\view\\block_avatar.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15185c5a29da0e1792-00253658',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contact_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a29da108895_75811620',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a29da108895_75811620')) {function content_5c5a29da108895_75811620($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['contact_data']->value['avatar_storage_hash']) {?>
    <img width="320px" class="img-thumbnail" src="<?php echo $_smarty_tpl->getSubTemplate ("helpers/storage_url.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('hash'=>$_smarty_tpl->tpl_vars['contact_data']->value['avatar_storage_hash'],'dir'=>@constant('STORAGE_DIR_AVATARS_CONTACTS'),'ext'=>"jpg",'thumb'=>"md"), 0);?>
" alt="Avatar">
<?php } else { ?>
    <img width="320px" class="img-thumbnail" src="<?php echo @constant('STORAGE_DIR');
echo @constant('STORAGE_DIR_AVATARS_CONTACTS');?>
default_md.jpg" alt="Avatar">
<?php }?>


<?php }} ?>
