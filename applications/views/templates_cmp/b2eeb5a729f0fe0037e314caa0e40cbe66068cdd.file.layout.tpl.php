<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:12:41
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\roles\form\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27735c5a267973c9d3-22374748%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2eeb5a729f0fe0037e314caa0e40cbe66068cdd' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\roles\\form\\layout.tpl',
      1 => 1451785594,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27735c5a267973c9d3-22374748',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_errors_form' => 0,
    'role_data' => 0,
    'crud_module' => 0,
    'ar_tree_categories' => 0,
    'crud_categories' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a267981f315_63402539',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a267981f315_63402539')) {function content_5c5a267981f315_63402539($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<link type="text/css" rel="stylesheet" href="min/<?php echo @constant('RESOURCE_VERSION');?>
/?g=treetablecss" />
<?php echo '<script'; ?>
 src="min/<?php echo @constant('RESOURCE_VERSION');?>
/?g=treetablejs"><?php echo '</script'; ?>
>

<div class="container-fluid">

    <form class="form-horizontal form-valid form-control-changes" role="form" method="post">

        <div class="form-group form-group-general <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['name']) {?>has-error<?php }?>">
            <label for="role_data_name" class="col-lg-2 col-sm-2 control-label"><?php echo L::forms_labels_name;?>
</label>
            <div class="col-lg-5 col-sm-5">
                <input type="text" data-rule-required="true" class="form-control" name="role_data[name]" id="role_data_name" placeholder="<?php echo $_smarty_tpl->tpl_vars['role_data']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['role_data']->value['name'];?>
">
            </div>
        </div>

        <div class="form-group">
            <label for="role_data_descr" class="col-sm-2 control-label"><?php echo L::forms_labels_descr;?>
</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" name="role_data[descr]" id="role_data_descr"><?php echo $_smarty_tpl->tpl_vars['role_data']->value['descr'];?>
</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Ограниченное управление заявками</label>
            <div class="col-sm-10">
                <input id="role_data_limited_setting" data-size="small" data-toggle="toggle" data-on="<?php echo L::text_yes;?>
" data-off="<?php echo L::text_no;?>
" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['role_data']->value['limited_setting']) {?>checked<?php }?> name="role_data[limited_setting]" value="1">
                <div class="help-block">Включите этот режим, если хотите ограничить настройку заявки полями: заголовок, категория и описание. Остальные параметры (участники, статус, приоритет и тд.) будут доступны только для чтения.</div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Проекты только с участием</label>
            <div class="col-sm-10">
                <input id="role_data_project_member" data-size="small" data-toggle="toggle" data-on="<?php echo L::text_yes;?>
" data-off="<?php echo L::text_no;?>
" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['role_data']->value['project_member']) {?>checked<?php }?> name="role_data[project_member]" value="1">
                <div class="help-block">Включите этот режим, если хотите ограничить список проектов условием участия пользователя.</div>
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">Фильтр заявок</label>
            <div class="col-sm-10">
                <input id="role_data_filter" data-size="small" data-toggle="toggle" data-on="<?php echo L::text_yes;?>
" data-off="<?php echo L::text_no;?>
" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['role_data']->value['filter']) {?>checked<?php }?> name="role_data[filter]" value="1">
                <div class="help-block">Включите этот режим, если хотите показывать пользователю только заявки с определенными критериями.</div>
            </div>
        </div>
        
        <?php echo '<script'; ?>
>
            $(function() {
                $('#role_data_filter').change(function() {
                    $("#filter_container").slideToggle();
                })
            })
        <?php echo '</script'; ?>
>

        <div id="filter_container" class="well" <?php if (!$_smarty_tpl->tpl_vars['role_data']->value['filter']) {?>style="display: none;"<?php }?>>
            <?php echo $_smarty_tpl->getSubTemplate ("demands/search/general.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data_name'=>"role_data[filter_data]",'conditions'=>$_smarty_tpl->tpl_vars['role_data']->value['filter_data']), 0);?>

        </div>

		<legend>
            <?php echo L::forms_legends_roles_access;?>

		</legend>

        <div class="form-group <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['crud']) {?>has-error<?php }?>">
            <label for="inputEmail3" class="col-lg-2 col-sm-2 control-label"><?php echo L::forms_labels_roles_modules;?>
</label>
            <div class="col-lg-10 col-sm-10">
                <?php echo $_smarty_tpl->getSubTemplate ("roles/form/table_crud.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ar_destinations'=>cls_modules::$ar_modules,'name'=>"module",'ar_crud'=>$_smarty_tpl->tpl_vars['crud_module']->value), 0);?>

            </div>
        </div>

        <div class="form-group <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['crud']) {?>has-error<?php }?>">
            <label for="inputEmail3" class="col-lg-2 col-sm-2 control-label"><?php echo L::forms_labels_roles_categories;?>
</label>
            <div class="col-lg-10 col-sm-10">
                <?php echo $_smarty_tpl->getSubTemplate ("roles/form/table_crud.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ar_destinations'=>$_smarty_tpl->tpl_vars['ar_tree_categories']->value,'name'=>"categories",'nested'=>true,'ar_crud'=>$_smarty_tpl->tpl_vars['crud_categories']->value), 0);?>

                
            </div>
        </div>

        <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/actions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('update'=>isset($_smarty_tpl->tpl_vars['role_data']->value['id'])), 0);?>

    </form>
</div>




<?php }} ?>
