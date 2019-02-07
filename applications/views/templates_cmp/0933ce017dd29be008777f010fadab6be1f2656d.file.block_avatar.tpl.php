<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-09 13:04:30
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\users\view\block_avatar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:273425a04282ebf6421-55290172%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0933ce017dd29be008777f010fadab6be1f2656d' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\users\\view\\block_avatar.tpl',
      1 => 1452779804,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '273425a04282ebf6421-55290172',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5a04282ec1e7c6_62754032',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a04282ec1e7c6_62754032')) {function content_5a04282ec1e7c6_62754032($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_data']->value['avatar_storage_hash']) {?>
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
