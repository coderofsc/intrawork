<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 16:13:02
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\users\form\block_avatar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:73675c5add5e2d8b33-41621599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '926dea6ac603a9e1e9a697e126e452910be6ca56' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\users\\form\\block_avatar.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73675c5add5e2d8b33-41621599',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5add5e31f044_16175821',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5add5e31f044_16175821')) {function content_5c5add5e31f044_16175821($_smarty_tpl) {?><link href="resources/js/jquery/plugin/cropper/css/cropper.min.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 src="resources/js/jquery/plugin/cropper/js/cropper.min.js"><?php echo '</script'; ?>
>

<div id="crop-avatar">
    <!-- Current avatar -->
    <div data-target="user" class="avatar-view img-thumbnail" title="Сменить фотографию">
        <?php if ($_smarty_tpl->tpl_vars['user_data']->value['avatar_storage_hash']) {?>
            <img data-original-src="<?php echo $_smarty_tpl->getSubTemplate ("helpers/storage_url.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('hash'=>$_smarty_tpl->tpl_vars['user_data']->value['avatar_storage_hash'],'dir'=>@constant('STORAGE_DIR_AVATARS_USERS'),'ext'=>$_smarty_tpl->tpl_vars['user_data']->value['avatar_storage_ext']), 0);?>
" src="<?php echo $_smarty_tpl->getSubTemplate ("helpers/storage_url.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('hash'=>$_smarty_tpl->tpl_vars['user_data']->value['avatar_storage_hash'],'dir'=>@constant('STORAGE_DIR_AVATARS_USERS'),'ext'=>"jpg",'thumb'=>"md"), 0);?>
" alt="Avatar">
        <?php } else { ?>
            <img src="<?php echo @constant('STORAGE_DIR');
echo @constant('STORAGE_DIR_AVATARS_USERS');?>
default_md.jpg" alt="Avatar">
        <?php }?>
    </div>
    <input name="user_data[avatar_storage_hash]" class="avatar-storage-hash" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['user_data']->value['avatar_storage_hash'];?>
" />
</div>

<link href="resources/js/jquery/plugin/cropper/css/avatar.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 src="resources/js/jquery/plugin/cropper/js/avatar.js"><?php echo '</script'; ?>
>
<?php }} ?>
