<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-09 13:04:55
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\files\folders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:35815a042847566ab4-57566247%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6969c2ec4cec31cf1073896267a25a5976e75468' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\files\\folders.tpl',
      1 => 1454591234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35815a042847566ab4-57566247',
  'function' => 
  array (
    'folder_level' => 
    array (
      'parameter' => 
      array (
        'nested' => 0,
        'ar_tree' => 
        array (
        ),
        'open' => false,
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'nested' => 0,
    'ar_tree' => 0,
    'folder' => 0,
    'folder_id' => 0,
    'public' => 0,
    'cuser_data' => 0,
    'ar_tree_folders' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5a042847685bb7_34754316',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a042847685bb7_34754316')) {function content_5a042847685bb7_34754316($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_access')) include 'Z:\home\intrawork.loc\demo\classes\smarty\plugins\modifier.access.php';
?><?php if (!function_exists('smarty_template_function_folder_level')) {
    function smarty_template_function_folder_level($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['folder_level']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <ol class="dd-list">
        <?php if (!$_smarty_tpl->tpl_vars['nested']->value) {?>
            <li class="dd-item dd-nodrag" data-id="0">
                <a data-id="0" class="dd-content c-hand">
                    <span class="title">Ваши файлы</span>
                </a>
            </li>
        <?php }?>
        <?php  $_smarty_tpl->tpl_vars['folder'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['folder']->_loop = false;
 $_smarty_tpl->tpl_vars['folder_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ar_tree']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['folder']->key => $_smarty_tpl->tpl_vars['folder']->value) {
$_smarty_tpl->tpl_vars['folder']->_loop = true;
 $_smarty_tpl->tpl_vars['folder_id']->value = $_smarty_tpl->tpl_vars['folder']->key;
?>
            <?php if (!$_smarty_tpl->tpl_vars['folder']->value['id']) {
continue 1;
}?>

            <?php if ($_smarty_tpl->tpl_vars['folder_id']->value==@constant('FILE_PUBLIC')) {?>
                <?php $_smarty_tpl->tpl_vars["public"] = new Smarty_variable(true, null, 0);?>
            <?php } else { ?>
                <?php $_smarty_tpl->tpl_vars["public"] = new Smarty_variable(false, null, 0);?>
            <?php }?>

            <li class="dd-item <?php if ($_smarty_tpl->tpl_vars['public']->value) {?>dd-nodrag public-folder<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['folder_id']->value;?>
">
                <?php if (!$_smarty_tpl->tpl_vars['public']->value) {?>
                    <button class="btn btn-default btn-sm dd-handle"><i class="fa fa-arrows-alt"></i></button>
                <?php }?>
                <a data-id="<?php echo $_smarty_tpl->tpl_vars['folder_id']->value;?>
" class="dd-content c-hand <?php if ($_smarty_tpl->tpl_vars['public']->value) {?>dd-handle<?php }?>">
                    <span class="title text-ellipsis"><?php echo $_smarty_tpl->tpl_vars['folder']->value['name'];?>
</span>
                    <div class="clearfix"></div>
                </a>
                <?php if (!$_smarty_tpl->tpl_vars['public']->value&&($_smarty_tpl->tpl_vars['folder']->value['user_id']==$_smarty_tpl->tpl_vars['cuser_data']->value['id']||(smarty_modifier_access(cls_modules::MODULE_FILES,m_roles::CRUD_U)||smarty_modifier_access(cls_modules::MODULE_FILES,m_roles::CRUD_D)))) {?>
                <div class="dd-extra">
                    <div class="pull-right">
                        <div class="btn-group btn-group-sm btn-group-actions">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Меню с переключением</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right dropdown-menu-wauto" role="menu">
                                <?php if ($_smarty_tpl->tpl_vars['folder']->value['user_id']==$_smarty_tpl->tpl_vars['cuser_data']->value['id']||smarty_modifier_access(cls_modules::MODULE_FILES,m_roles::CRUD_U)) {?>
                                    <li><a href="#" class="folder-edit"><i class="fa fa-pencil fa-fw"></i> <?php echo L::actions_edit;?>
</a></li>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['folder']->value['user_id']==$_smarty_tpl->tpl_vars['cuser_data']->value['id']||smarty_modifier_access(cls_modules::MODULE_FILES,m_roles::CRUD_D)) {?>
                                    <li><a href="#" class="text-danger folder-delete"><i class="fa fa-trash-o fa-fw"></i> <?php echo L::actions_delete;?>
</a></li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['folder']->value['children']) {?>
                    <?php smarty_template_function_folder_level($_smarty_tpl,array('nested'=>$_smarty_tpl->tpl_vars['nested']->value+1,'ar_tree'=>$_smarty_tpl->tpl_vars['folder']->value['children']));?>

                <?php }?>
            </li>
        <?php } ?>
    </ol>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>



<div class="dd folder-list" id="folders-nestable">
    <?php smarty_template_function_folder_level($_smarty_tpl,array('nested'=>0,'ar_tree'=>$_smarty_tpl->tpl_vars['ar_tree_folders']->value));?>

</div>

<div class="space space-sm"></div>
<button class="btn btn-default btn-block folder-create"><i class="fa fa-folder-open"></i> Создать папку</button><?php }} ?>
