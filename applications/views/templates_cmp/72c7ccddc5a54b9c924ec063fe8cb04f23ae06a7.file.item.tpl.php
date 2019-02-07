<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-14 17:42:22
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\demands\view\messages\item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:138925991b6ceb1be73-31233838%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72c7ccddc5a54b9c924ec063fe8cb04f23ae06a7' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\view\\messages\\item.tpl',
      1 => 1459510672,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138925991b6ceb1be73-31233838',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message' => 0,
    'copy' => 0,
    'attach' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5991b6cec24306_38252298',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991b6cec24306_38252298')) {function content_5991b6cec24306_38252298($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_ts2text')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.ts2text.php';
if (!is_callable('smarty_modifier_filesize')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.filesize.php';
?><div class="container-fluid clamped-margin-bottom well well-sm <?php if ($_smarty_tpl->tpl_vars['message']->value['style']) {?>well-<?php echo $_smarty_tpl->tpl_vars['message']->value['style'];
} else { ?>bg-white<?php }?>">

    <div class="media">
        <div class="pull-left i-checks" style="padding-top:5px">
            <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['message']->value['status']) {?>checked=""<?php }?> class="message-status">
            
        </div>

        <?php if ($_smarty_tpl->tpl_vars['message']->value['user_from_id']) {?>
        <a data-toggle="modal" href="#modal-remote" data-remote="users/view/<?php echo $_smarty_tpl->tpl_vars['message']->value['user_from_id'];?>
/" class="pull-left">
            <?php echo $_smarty_tpl->getSubTemplate ("helpers/avatar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('hash'=>$_smarty_tpl->tpl_vars['message']->value['user_from_avatar_storage_hash'],'dir'=>@constant('STORAGE_DIR_AVATARS_USERS')), 0);?>

        </a>
        <?php } else { ?>
            <div class="pull-left">
            <?php echo $_smarty_tpl->getSubTemplate ("helpers/avatar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('hash'=>false,'dir'=>@constant('STORAGE_DIR_AVATARS_USERS')), 0);?>

            </div>
        <?php }?>
        <div class="media-body">
            <div class="media-heading">
                <table style="width:100%">
                    <colgroup>
                        <col width="50"/>
                        <col width="*"/>
                    </colgroup>
                    <tr>
                        <td>От:</td>
                        <td>
                            <div class="pull-left">
                                <?php if ($_smarty_tpl->tpl_vars['message']->value['user_from_id']) {?><a data-toggle="modal" href="#modal-remote" data-remote="users/view/<?php echo $_smarty_tpl->tpl_vars['message']->value['user_from_id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['message']->value['user_from_fi'];?>
</a><?php } else {
echo $_smarty_tpl->tpl_vars['message']->value['user_from_email'];
}?>
                            </div>
                            <div class="pull-right <?php if (!$_smarty_tpl->tpl_vars['message']->value['first']) {?>text-muted<?php }?>">
                                <span class="label label-tag">
                                <i class="fa fa-clock-o"></i> <?php echo smarty_modifier_ts2text($_smarty_tpl->tpl_vars['message']->value['unix_create_date']);?>

                                    </span>
                            </div>
                        </td>
                    </tr>
                    <tr class="message-details ">
                        <td>Кому:</td>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['message']->value['to_eid']) {?>
                                <?php if ($_smarty_tpl->tpl_vars['message']->value['user_to_id']) {?><a data-toggle="modal" href="#modal-remote" data-remote="users/view/<?php echo $_smarty_tpl->tpl_vars['message']->value['user_to_id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['message']->value['user_to_fi'];?>
</a><?php } else {
echo $_smarty_tpl->tpl_vars['message']->value['user_to_email'];
}?>
                            <?php } else { ?>
                                <span class="text-muted">&mdash;</span>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['message']->value['ar_copies']) {?>
                                Копия:
                                <?php  $_smarty_tpl->tpl_vars['copy'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['copy']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['message']->value['ar_copies']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['copy']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['copy']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['copy']->key => $_smarty_tpl->tpl_vars['copy']->value) {
$_smarty_tpl->tpl_vars['copy']->_loop = true;
 $_smarty_tpl->tpl_vars['copy']->iteration++;
 $_smarty_tpl->tpl_vars['copy']->last = $_smarty_tpl->tpl_vars['copy']->iteration === $_smarty_tpl->tpl_vars['copy']->total;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['copy']->value['user_id']) {?><a data-toggle="modal" href="#modal-remote" data-remote="users/view/<?php echo $_smarty_tpl->tpl_vars['copy']->value['user_id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['copy']->value['user_fi'];?>
</a><?php } else {
echo $_smarty_tpl->tpl_vars['copy']->value['user_email'];
}
if (!$_smarty_tpl->tpl_vars['copy']->last) {?>, <?php }?>
                                <?php } ?>
                            <?php }?>

                        </td>
                    </tr>
                    
                </table>
            </div>


            
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="container-fluid well well-sm bg-white" style="border-top:0">

    

    <?php if ($_smarty_tpl->tpl_vars['message']->value['ar_attach']) {?>
    <ul class="list-inline">
        <?php  $_smarty_tpl->tpl_vars['attach'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['attach']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['message']->value['ar_attach']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['attach']->key => $_smarty_tpl->tpl_vars['attach']->value) {
$_smarty_tpl->tpl_vars['attach']->_loop = true;
?>
            <li>
                <a target="_blank" class="label-group <?php if ((substr($_smarty_tpl->tpl_vars['attach']->value['mimetype'],0,5))=="image") {?>fancybox<?php }?>" rel="attach-<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
" href="<?php echo $_smarty_tpl->getSubTemplate ("helpers/storage_url.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('hash'=>$_smarty_tpl->tpl_vars['attach']->value['hash'],'dir'=>@constant('STORAGE_DIR_DEMANDS'),'name'=>$_smarty_tpl->tpl_vars['attach']->value['name'],'ext'=>$_smarty_tpl->tpl_vars['attach']->value['ext']), 0);?>
">
                   <span class="label label-tag"><i class="fa fa-files-o"></i> <?php echo $_smarty_tpl->tpl_vars['attach']->value['name'];?>
.<?php echo $_smarty_tpl->tpl_vars['attach']->value['ext'];?>
</span><span class="label label-default">(<?php echo smarty_modifier_filesize($_smarty_tpl->tpl_vars['attach']->value['size']);?>
)</span>
                </a>
            </li>
        <?php } ?>
        </ul>
    <?php }?>

    <div style="overflow-x: auto">
        <?php if ($_smarty_tpl->tpl_vars['message']->value['message']) {?>
            <?php echo $_smarty_tpl->tpl_vars['message']->value['message'];?>

        <?php } else { ?>
            <p class="text-muted">
                Пустое сообщение
            </p>
        <?php }?>
    </div>
</div>


<?php }} ?>
