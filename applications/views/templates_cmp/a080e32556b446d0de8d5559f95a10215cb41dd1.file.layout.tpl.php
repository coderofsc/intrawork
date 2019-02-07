<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-09 13:04:55
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\files\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77825a042847400145-23738107%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a080e32556b446d0de8d5559f95a10215cb41dd1' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\files\\layout.tpl',
      1 => 1454591376,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77825a042847400145-23738107',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5a04284744fe41_40485053',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a04284744fe41_40485053')) {function content_5a04284744fe41_40485053($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_access')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.access.php';
?><link rel="stylesheet" type="text/css" href="resources/css/fm.css" />
<?php echo '<script'; ?>
 type="text/javascript" src="resources/js/jquery/plugin/jquery.mixitup.min.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" type="text/css" href="resources/js/jquery/plugin/nestable/css/nestable.css" />
<?php echo '<script'; ?>
 type="text/javascript" src="resources/js/jquery/plugin/nestable/js/jquery.nestable.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" type="text/css" href="min/?g=fileuploadcss" />
<?php echo '<script'; ?>
 type="text/javascript" src="min/?g=fileuploadjs"><?php echo '</script'; ?>
>

<div class="ui-layout-west">
    <div class="container-fluid">
        <div class="file-manager">
            <h5>Фильтр</h5>
            <?php echo $_smarty_tpl->getSubTemplate ("./filter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


            <div class="hr-line-dashed"></div>
            <?php echo $_smarty_tpl->getSubTemplate ("./upload.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <div class="hr-line-dashed"></div>

            <h5>Структура <i class="fa fa-spinner fa-fw fa-spin hidden" id="folder-loading"></i> </h5>
            <div id="fm-folders">
                <?php echo $_smarty_tpl->getSubTemplate ("./folders.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>

            <div class="space space-sm"></div>

            <?php if (smarty_modifier_access(cls_modules::MODULE_FILES,m_roles::CRUD_R)) {?>
            <div class="alert alert-info">
                Перенесите файл или папку в секцию "Общие файлы", чтобы сделать их видимыми для других пользователей.
            </div>
            <?php }?>

            
        </div>
    </div>
</div>

<div class="ui-layout-center jscroll ">
    <?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="empty-folder" class="alert alert-default" style="display: none">Файлы не найдены</div>
    <?php echo $_smarty_tpl->getSubTemplate ("./list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>

<?php echo '<script'; ?>
 src="resources/js/intrawork.fm.js"><?php echo '</script'; ?>
><?php }} ?>
