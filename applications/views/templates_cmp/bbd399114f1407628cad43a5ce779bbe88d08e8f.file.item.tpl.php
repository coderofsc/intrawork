<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 19:15:47
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\comments\item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:94185c5b0833768aa5-24591375%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bbd399114f1407628cad43a5ce779bbe88d08e8f' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\comments\\item.tpl',
      1 => 1454923570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94185c5b0833768aa5-24591375',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'comment' => 0,
    'attach' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5b08337c66b4_08042058',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5b08337c66b4_08042058')) {function content_5c5b08337c66b4_08042058($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_ts2text')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.ts2text.php';
if (!is_callable('smarty_modifier_filesize')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.filesize.php';
?><div class="media">
    <a data-toggle="modal" href="#modal-remote" data-remote="users/view/<?php echo $_smarty_tpl->tpl_vars['comment']->value['user_id'];?>
/" class="forum-avatar">
        <?php echo $_smarty_tpl->getSubTemplate ("helpers/avatar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('hash'=>$_smarty_tpl->tpl_vars['comment']->value['user_avatar_storage_hash'],'dir'=>@constant('STORAGE_DIR_AVATARS_USERS'),'responsive'=>false,'size'=>"sm"), 0);?>

        <div class="author-info">
            <strong><?php echo $_smarty_tpl->tpl_vars['comment']->value['user_short_fio'];?>
</strong><br/>
            <?php echo $_smarty_tpl->tpl_vars['comment']->value['user_dprt_name'];?>
<br/>
            <?php echo $_smarty_tpl->tpl_vars['comment']->value['user_post_name'];?>
<br/>
        </div>
    </a>
    <div class="media-body">
        <div class="text-muted">
            <?php echo smarty_modifier_ts2text($_smarty_tpl->tpl_vars['comment']->value['create_date_unix']);?>

        </div>
        <ul class="list-inline">
            <?php  $_smarty_tpl->tpl_vars['attach'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['attach']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comment']->value['ar_attach']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['attach']->key => $_smarty_tpl->tpl_vars['attach']->value) {
$_smarty_tpl->tpl_vars['attach']->_loop = true;
?>
                <li>
                    <a target="_blank" class="label-group <?php if ((substr($_smarty_tpl->tpl_vars['attach']->value['mimetype'],0,5))=="image") {?>fancybox<?php }?>" rel="attach-<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
" href="<?php echo $_smarty_tpl->getSubTemplate ("helpers/storage_url.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('hash'=>$_smarty_tpl->tpl_vars['attach']->value['hash'],'dir'=>$_smarty_tpl->tpl_vars['attach']->value['root'],'name'=>$_smarty_tpl->tpl_vars['attach']->value['name'],'ext'=>$_smarty_tpl->tpl_vars['attach']->value['ext']), 0);?>
">
                        <span class="label label-tag"><i class="fa fa-files-o"></i> <?php echo $_smarty_tpl->tpl_vars['attach']->value['name'];?>
.<?php echo $_smarty_tpl->tpl_vars['attach']->value['ext'];?>
</span><span class="label label-default">(<?php echo smarty_modifier_filesize($_smarty_tpl->tpl_vars['attach']->value['size']);?>
)</span>
                    </a>
                </li>
            <?php } ?>
        </ul>

        <?php echo nl2br($_smarty_tpl->tpl_vars['comment']->value['text']);?>

    </div>
</div><?php }} ?>
