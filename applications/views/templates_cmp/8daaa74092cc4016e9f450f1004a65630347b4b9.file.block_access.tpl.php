<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 16:16:35
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\users\view\block_access.tpl" */ ?>
<?php /*%%SmartyHeaderCode:119465c5ade33ad8681-04257720%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8daaa74092cc4016e9f450f1004a65630347b4b9' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\users\\view\\block_access.tpl',
      1 => 1449753480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '119465c5ade33ad8681-04257720',
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
  'unifunc' => 'content_5c5ade33b16e81_06010329',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5ade33b16e81_06010329')) {function content_5c5ade33b16e81_06010329($_smarty_tpl) {?><ul class="nav nav-tabs">
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
