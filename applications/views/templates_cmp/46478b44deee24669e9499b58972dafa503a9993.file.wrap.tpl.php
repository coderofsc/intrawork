<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-09-22 14:36:01
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\roles\view\wrap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:568759c4f5a1737982-82537901%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46478b44deee24669e9499b58972dafa503a9993' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\roles\\view\\wrap.tpl',
      1 => 1450880866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '568759c4f5a1737982-82537901',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'role_data' => 0,
    'filter_decode' => 0,
    'filter' => 0,
    'value' => 0,
    'crud_module' => 0,
    'crud_categories' => 0,
    'ar_tree_categories' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59c4f5a17bec16_70148167',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c4f5a17bec16_70148167')) {function content_59c4f5a17bec16_70148167($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_declension')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.declension.php';
?><?php if (!$_smarty_tpl->tpl_vars['role_data']->value['users_count']) {?>
    <div class="alert alert-warning">
        Роль не установлена ни для одного пользователя
    </div>
<?php } else { ?>
    <div class="alert alert-success">
        <?php echo L::modules_roles_text_set_for;?>
 <a class="alert-link" href="users/?cnd[role_id]=<?php echo $_smarty_tpl->tpl_vars['role_data']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['role_data']->value['users_count'];?>
 <?php echo smarty_modifier_declension($_smarty_tpl->tpl_vars['role_data']->value['users_count'],(((((L::modules_users_morph_for_one).(";")).(L::modules_users_morph_for_two)).(";")).(L::modules_users_morph_for_five)));?>
</a>
    </div>
<?php }?>

<h3>Параметры фильтрации заявок</h3>

<?php if ($_smarty_tpl->tpl_vars['role_data']->value['filter']&&$_smarty_tpl->tpl_vars['filter_decode']->value) {?>
    <div class="well well-sm">
    <?php  $_smarty_tpl->tpl_vars['filter'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['filter']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['filter_decode']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['filter']->key => $_smarty_tpl->tpl_vars['filter']->value) {
$_smarty_tpl->tpl_vars['filter']->_loop = true;
?>
        <div class="row">
            <div class="col-sm-5"><span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['filter']->value['name'];?>
</span></div>
            <div class="col-sm-6">
                <?php if (is_array($_smarty_tpl->tpl_vars['filter']->value['decode'])) {?>
                    <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['filter']->value['decode']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
                        <span class="nav-label text-ellipsis"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</span>
                    <?php } ?>
                <?php } else { ?>
                    <span class="nav-label text-ellipsis"><?php echo $_smarty_tpl->tpl_vars['filter']->value['decode'];?>
</span>
                <?php }?>
            </div>
        </div>
    <?php } ?>
    </div>
<?php } else { ?>
    <div class="alert alert-default">
        <p>Условия фильтрации не указаны &mdash; будут показаны все заявки (согласно доступа к категориям).</p>
    </div>
<?php }?>


<div class="h3"><?php echo L::modules_roles_text_headers_module_access;?>
</div>
<?php if ($_smarty_tpl->tpl_vars['crud_module']->value) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("roles/form/table_crud.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ar_destinations'=>cls_modules::$ar_modules,'name'=>"module",'readonly'=>true,'ar_crud'=>$_smarty_tpl->tpl_vars['crud_module']->value,'exists'=>true), 0);?>

<?php } else { ?>
    <div class="alert alert-default">Нет доступа к модулям</div>
<?php }?>

<div class="h3"><?php echo L::modules_roles_text_headers_categories_access;?>
</div>
<?php if ($_smarty_tpl->tpl_vars['crud_categories']->value) {?>
    <link type="text/css" rel="stylesheet" href="min/<?php echo @constant('RESOURCE_VERSION');?>
/?g=treetablecss" />
    <?php echo '<script'; ?>
 src="min/<?php echo @constant('RESOURCE_VERSION');?>
/?g=treetablejs"><?php echo '</script'; ?>
>
    <?php echo $_smarty_tpl->getSubTemplate ("roles/form/table_crud.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ar_destinations'=>$_smarty_tpl->tpl_vars['ar_tree_categories']->value,'name'=>"categories",'nested'=>true,'readonly'=>true,'ar_crud'=>$_smarty_tpl->tpl_vars['crud_categories']->value), 0);?>

<?php } else { ?>
    <div class="alert alert-default">Нет доступа к категориям</div>
<?php }?>
<?php }} ?>
