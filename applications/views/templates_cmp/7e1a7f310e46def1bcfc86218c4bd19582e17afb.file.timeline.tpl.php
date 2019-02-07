<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 05:05:04
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\events\timeline.tpl" */ ?>
<?php /*%%SmartyHeaderCode:150905c5a40d0752cb8-46793925%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e1a7f310e46def1bcfc86218c4bd19582e17afb' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\events\\timeline.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150905c5a40d0752cb8-46793925',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_events' => 0,
    'event' => 0,
    'module_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a40d0873e09_19191145',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a40d0873e09_19191145')) {function content_5c5a40d0873e09_19191145($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_ts2text')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.ts2text.php';
if (!is_callable('smarty_modifier_pass_time')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.pass_time.php';
if (!is_callable('smarty_modifier_mb_ucfirst')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
?><div class="container-fluid">
<?php  $_smarty_tpl->tpl_vars['event'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['event']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ar_events']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['event']->key => $_smarty_tpl->tpl_vars['event']->value) {
$_smarty_tpl->tpl_vars['event']->_loop = true;
?>
    <?php if ($_smarty_tpl->tpl_vars['event']->value['owner']==m_roles::CRUD_OWNER_MODULE) {?>
        <?php $_smarty_tpl->tpl_vars["module_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['event']->value['owner_id'], null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars["module_id"] = new Smarty_variable(cls_modules::MODULE_DEMANDS, null, 0);?>
    <?php }?>

    <div class="timeline-item">
        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-2 date">
                <i class="fa fa-fw fa-<?php if ($_smarty_tpl->tpl_vars['event']->value['crud']==m_roles::CRUD_C) {?>plus bg-primary<?php } elseif ($_smarty_tpl->tpl_vars['event']->value['crud']==m_roles::CRUD_U) {?>pencil bg-warning<?php } elseif ($_smarty_tpl->tpl_vars['event']->value['crud']==m_roles::CRUD_D) {?>trash bg-danger<?php }?>"></i>
                <?php echo smarty_modifier_ts2text($_smarty_tpl->tpl_vars['event']->value['unix_create_date']);?>

                <br>
                <small class="text-navy">
                    <?php echo smarty_modifier_pass_time($_smarty_tpl->tpl_vars['event']->value['unix_create_date'],false,true);?>
 <?php echo L::text_ago;?>

                </small>
            </div>
            <div class="col-xs-9 col-sm-9 col-md-10 content">
                <p class="m-b-xs">
                    <strong><?php echo smarty_modifier_mb_ucfirst(cls_modules::$ar_modules[$_smarty_tpl->tpl_vars['module_id']->value]['morph'][0]);?>
</strong>
                </p>

                <p>
                    <?php if ($_smarty_tpl->tpl_vars['event']->value['user_id']) {?>
                        <?php echo smarty_modifier_mb_ucfirst(L::modules_users_morph_one);?>
 <a href="users/view/<?php echo $_smarty_tpl->tpl_vars['event']->value['user_id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['event']->value['user_short_fio'];?>
</a>
                    <?php } else { ?>
                        <?php echo smarty_modifier_mb_ucfirst(L::text_iw_auto_action);?>

                    <?php }?>
                     <?php if ($_smarty_tpl->tpl_vars['event']->value['crud']==m_roles::CRUD_C) {
echo L::modules_events_crud_create;
} elseif ($_smarty_tpl->tpl_vars['event']->value['crud']==m_roles::CRUD_U) {
echo L::modules_events_crud_update;
} elseif ($_smarty_tpl->tpl_vars['event']->value['crud']==m_roles::CRUD_D) {
echo L::modules_events_crud_delete;
}?> <?php echo L::text_object_morph_one;?>
 &mdash; <?php echo cls_modules::$ar_modules[$_smarty_tpl->tpl_vars['module_id']->value]['morph'][0];?>

                    <?php if ($_smarty_tpl->tpl_vars['event']->value['crud']==m_roles::CRUD_D) {?>
                        «<?php echo $_smarty_tpl->tpl_vars['event']->value['object_name'];?>
»
                    <?php } else { ?>
                        «<a href="<?php echo cls_modules::$ar_modules[$_smarty_tpl->tpl_vars['module_id']->value]['alias'];?>
/view/<?php echo $_smarty_tpl->tpl_vars['event']->value['object_id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['event']->value['object_name'];?>
</a>»
                    <?php }?>
                </p>

                <?php if ($_smarty_tpl->tpl_vars['module_id']->value==cls_modules::MODULE_DEMANDS) {?>
                    <div class="text-muted"><?php if ($_smarty_tpl->tpl_vars['event']->value['owner_id']) {
echo $_smarty_tpl->getSubTemplate ("helpers/catpath.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>$_smarty_tpl->tpl_vars['event']->value['owner_id']), 0);
} else {
echo L::text_inbox;
}?></div>
                <?php }?>

            </div>
        </div>
    </div>
<?php } ?>
</div><?php }} ?>
