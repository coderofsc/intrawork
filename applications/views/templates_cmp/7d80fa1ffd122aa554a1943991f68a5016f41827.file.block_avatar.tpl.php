<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-09-22 14:37:52
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\contacts\form\block_avatar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:81359c4f610ba8090-67142460%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d80fa1ffd122aa554a1943991f68a5016f41827' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\contacts\\form\\block_avatar.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81359c4f610ba8090-67142460',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contact_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59c4f610bd65d7_15566763',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c4f610bd65d7_15566763')) {function content_59c4f610bd65d7_15566763($_smarty_tpl) {?><link href="resources/js/jquery/plugin/cropper/css/cropper.min.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 src="resources/js/jquery/plugin/cropper/js/cropper.min.js"><?php echo '</script'; ?>
>

<div id="crop-avatar">
    <!-- Current avatar -->
    <div data-target="user" class="avatar-view img-thumbnail" title="Сменить фотографию">
        <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['avatar_storage_hash']) {?>
            <img data-original-src="<?php echo $_smarty_tpl->getSubTemplate ("helpers/storage_url.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('hash'=>$_smarty_tpl->tpl_vars['contact_data']->value['avatar_storage_hash'],'dir'=>@constant('STORAGE_DIR_AVATARS_CONTACTS'),'ext'=>$_smarty_tpl->tpl_vars['contact_data']->value['avatar_storage_ext']), 0);?>
" src="<?php echo $_smarty_tpl->getSubTemplate ("helpers/storage_url.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('hash'=>$_smarty_tpl->tpl_vars['contact_data']->value['avatar_storage_hash'],'dir'=>@constant('STORAGE_DIR_AVATARS_CONTACTS'),'ext'=>"jpg",'thumb'=>"md"), 0);?>
" alt="Avatar">
        <?php } else { ?>
            <img src="<?php echo @constant('STORAGE_DIR');
echo @constant('STORAGE_DIR_AVATARS_CONTACTS');?>
default_md.jpg" alt="Avatar">
        <?php }?>
    </div>
    <input name="contact_data[avatar_storage_hash]" class="avatar-storage-hash" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['avatar_storage_hash'];?>
" />
</div>

<link href="resources/js/jquery/plugin/cropper/css/avatar.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 src="resources/js/jquery/plugin/cropper/js/avatar.js"><?php echo '</script'; ?>
>
<?php }} ?>
