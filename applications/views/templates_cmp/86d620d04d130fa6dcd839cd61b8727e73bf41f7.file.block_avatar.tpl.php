<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:23:43
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\users\view\block_avatar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:280535c5a290f2273b5-11332409%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86d620d04d130fa6dcd839cd61b8727e73bf41f7' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\users\\view\\block_avatar.tpl',
      1 => 1452779804,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '280535c5a290f2273b5-11332409',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a290f252332_94181238',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a290f252332_94181238')) {function content_5c5a290f252332_94181238($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_data']->value['avatar_storage_hash']) {?>
    <a href="<?php echo $_smarty_tpl->getSubTemplate ("helpers/storage_url.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('hash'=>$_smarty_tpl->tpl_vars['user_data']->value['avatar_storage_hash'],'dir'=>@constant('STORAGE_DIR_AVATARS_USERS'),'ext'=>$_smarty_tpl->tpl_vars['user_data']->value['avatar_storage_ext']), 0);?>
" class="fancybox">
    <img width="320px" height="320px" class="img-thumbnail" src="<?php echo $_smarty_tpl->getSubTemplate ("helpers/storage_url.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('hash'=>$_smarty_tpl->tpl_vars['user_data']->value['avatar_storage_hash'],'dir'=>@constant('STORAGE_DIR_AVATARS_USERS'),'ext'=>"jpg",'thumb'=>"md"), 0);?>
" alt="Avatar">
    </a>
<?php } else { ?>
    <img width="320px" height="320px" class="img-thumbnail" src="<?php echo @constant('STORAGE_DIR');
echo @constant('STORAGE_DIR_AVATARS_USERS');?>
default_md.jpg" alt="Avatar">
<?php }?>


<?php }} ?>
