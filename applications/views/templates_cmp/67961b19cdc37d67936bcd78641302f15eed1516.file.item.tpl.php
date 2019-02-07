<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:27:41
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\files\item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77075c5a29fd25c687-81923499%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67961b19cdc37d67936bcd78641302f15eed1516' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\files\\item.tpl',
      1 => 1450427540,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77075c5a29fd25c687-81923499',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'file' => 0,
    'cuser_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a29fd3278b6_57492066',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a29fd3278b6_57492066')) {function content_5c5a29fd3278b6_57492066($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_access')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.access.php';
if (!is_callable('smarty_modifier_ts2text')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.ts2text.php';
if (!is_callable('smarty_modifier_filesize')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.filesize.php';
?><div class="file-box file-type-<?php if (!$_smarty_tpl->tpl_vars['file']->value['group']) {?>all<?php } else {
echo $_smarty_tpl->tpl_vars['file']->value['group'];
}?> mix">

    <div class="file" data-id="<?php echo $_smarty_tpl->tpl_vars['file']->value['id'];?>
">
        <?php if ($_smarty_tpl->tpl_vars['file']->value['user_eid']==$_smarty_tpl->tpl_vars['cuser_data']->value['eid']||smarty_modifier_access(cls_modules::MODULE_FILES,m_roles::CRUD_D)) {?>
            <a href="#" class="file-delete"><i class="fa text-danger fa-times"></i></a>
        <?php }?>
        <a <?php if ($_smarty_tpl->tpl_vars['file']->value['group']=="image") {?>class="fancybox" rel="fm-images[]"<?php }?> href="<?php echo $_smarty_tpl->getSubTemplate ("helpers/storage_url.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('name'=>$_smarty_tpl->tpl_vars['file']->value['name'],'hash'=>$_smarty_tpl->tpl_vars['file']->value['hash'],'dir'=>@constant('STORAGE_DIR_FILES'),'ext'=>$_smarty_tpl->tpl_vars['file']->value['ext']), 0);?>
">
            <span class="corner"></span>

            <?php if ($_smarty_tpl->tpl_vars['file']->value['group']=="image") {?>
                <div class="image">
                    <img src="<?php echo $_smarty_tpl->getSubTemplate ("helpers/storage_url.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('hash'=>$_smarty_tpl->tpl_vars['file']->value['hash'],'dir'=>@constant('STORAGE_DIR_FILES'),'ext'=>$_smarty_tpl->tpl_vars['file']->value['ext'],'thumb'=>"md"), 0);?>
" class="img-responsive" alt="image">
                </div>
            <?php } elseif ($_smarty_tpl->tpl_vars['file']->value['group']=="audio") {?>
                <div class="icon">
                    <i class="fa fa-music"></i>
                </div>
            <?php } elseif ($_smarty_tpl->tpl_vars['file']->value['group']=="video") {?>
                <div class="icon">
                    <i class="fa fa-file-video-o"></i>
                </div>
            <?php } elseif ($_smarty_tpl->tpl_vars['file']->value['group']=="doc") {?>
                <div class="icon">
                    <i class="fa fa-file-text-o"></i>
                </div>
            <?php } else { ?>
                <div class="icon">
                    <i class="fa fa-file"></i>
                </div>
            <?php }?>
            <div class="file-name">
                <div class="title text-ellipsis"><?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
.<?php echo $_smarty_tpl->tpl_vars['file']->value['ext'];?>
</div>
                <div class="space space-xs"></div>
                <div class="small"><?php echo $_smarty_tpl->tpl_vars['file']->value['user_short_fio'];?>
</div>
                <div class="small"><?php echo smarty_modifier_ts2text($_smarty_tpl->tpl_vars['file']->value['create_date_unix']);?>
<div class="pull-right"><?php echo smarty_modifier_filesize($_smarty_tpl->tpl_vars['file']->value['size']);?>
</div></div>
            </div>
        </a>
    </div>
</div>
<?php }} ?>
