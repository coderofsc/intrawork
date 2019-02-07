<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 02:55:43
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\users\form\block_avatar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:194895c5a227fd3ee27-93069252%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93ddb02fdbc3392db03e4b679a91fb75d3443671' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\users\\form\\block_avatar.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194895c5a227fd3ee27-93069252',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a227fd69da5_56685301',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a227fd69da5_56685301')) {function content_5c5a227fd69da5_56685301($_smarty_tpl) {?><link href="resources/js/jquery/plugin/cropper/css/cropper.min.css" rel="stylesheet" type="text/css" />
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
