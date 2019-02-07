<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-09 13:04:31
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\users\view\block_access.tpl" */ ?>
<?php /*%%SmartyHeaderCode:312435a04282f07af41-57983131%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4f3d0e30113831bb9439ecd6dd088a5d936923a' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\users\\view\\block_access.tpl',
      1 => 1449753480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '312435a04282f07af41-57983131',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'crud_module' => 0,
    'crud_categories' => 0,
    'ar_tree_categories' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5a04282f0b7512_26616088',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a04282f0b7512_26616088')) {function content_5a04282f0b7512_26616088($_smarty_tpl) {?><ul class="nav nav-tabs">
    <li class="active"><a href="#access-modules" data-toggle="tab"><?php echo L::tabs_modules;?>
</a></li>
    <li><a href="#access-categories" data-toggle="tab"><?php echo L::tabs_categories;?>
</a></li>
</ul>


<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active clamped" id="access-modules">
        <?php if ($_smarty_tpl->tpl_vars['crud_module']->value) {?>
            <?php echo $_smarty_tpl->getSubTemplate ("roles/form/table_crud.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ar_destinations'=>cls_modules::$ar_modules,'name'=>"module",'readonly'=>true,'ar_crud'=>$_smarty_tpl->tpl_vars['crud_module']->value,'exists'=>true), 0);?>

        <?php } else { ?>
            <div class="alert alert-default">Нет доступа к модулям</div>
        <?php }?>
    </div>
    <div class="tab-pane clamped" id="access-categories">
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
    </div>

</div>

<?php }} ?>
