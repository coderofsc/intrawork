<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 17:48:52
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\news\view\wrap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:283525c5af3d4a71a80-03218432%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a280eda826579e204d9d65816302b759e9b91230' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\news\\view\\wrap.tpl',
      1 => 1455710268,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '283525c5af3d4a71a80-03218432',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'news_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5af3d4ad3521_87882032',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5af3d4ad3521_87882032')) {function content_5c5af3d4ad3521_87882032($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_ts2text')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.ts2text.php';
if (!is_callable('smarty_modifier_mb_ucfirst')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
?><p class="text-muted"><?php echo smarty_modifier_ts2text($_smarty_tpl->tpl_vars['news_data']->value['unix_publish_date']);?>
</p>
<div class="clearfix"></div>
<?php echo $_smarty_tpl->tpl_vars['news_data']->value['news'];?>

<div class="clearfix"></div>
<div class="space"></div>
<?php if ($_smarty_tpl->tpl_vars['news_data']->value['user_id']) {?>
    <div class="pull-left right-space">
        <?php echo $_smarty_tpl->getSubTemplate ("helpers/avatar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('hash'=>$_smarty_tpl->tpl_vars['news_data']->value['user_avatar_storage_hash'],'dir'=>@constant('STORAGE_DIR_AVATARS_USERS')), 0);?>

    </div>
    <div class="pull-left">
        <div>
            <a data-toggle="modal" href="#modal-remote" data-remote="users/view/<?php echo $_smarty_tpl->tpl_vars['news_data']->value['user_id'];?>
/">
                <?php echo $_smarty_tpl->tpl_vars['news_data']->value['user_fio'];?>

            </a>
        </div>
        <div>
            <?php if ($_smarty_tpl->tpl_vars['news_data']->value['user_post_id']) {?><span class="text-muted"><?php echo $_smarty_tpl->tpl_vars['news_data']->value['user_post_name'];?>
</span><?php }?>
            <?php if ($_smarty_tpl->tpl_vars['news_data']->value['user_dprt_id']) {?><span class="text-muted"><?php echo $_smarty_tpl->tpl_vars['news_data']->value['user_dprt_name'];?>
</span><?php }?>
        </div>
    </div>
<?php } else { ?>
    <div class="pull-left right-space">
        <img width="32px" src="<?php echo @constant('STORAGE_DIR');
echo @constant('STORAGE_DIR_AVATARS');?>
intrawork_xs.jpg" alt="" class="img-avatar img-circle">
    </div>
    <div class="pull-left">
        <div><?php echo L::intrawork;?>
</div>
        <div class="text-muted small"><?php echo smarty_modifier_mb_ucfirst(L::meta_title);?>
</div>
    </div>
<?php }?>

<div class="clearfix"></div>
<div class="space"></div>
<?php }} ?>
