<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 18:47:37
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\categories\form\layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:293605c5b01993a8581-73638608%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8767b60136aa80f83d0885abfd7438a79e7e5cfb' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\categories\\form\\layout.tpl',
      1 => 1452981510,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '293605c5b01993a8581-73638608',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_errors_form' => 0,
    'cat_data' => 0,
    'ar_tree_categories' => 0,
    'storage_field' => 0,
    'ar_roles' => 0,
    'ar_crud_category' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5b019945ff31_20360902',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5b019945ff31_20360902')) {function content_5c5b019945ff31_20360902($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("main/title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container-fluid">

    <form class="form-horizontal form-valid form-control-changes" role="form" method="post">

        <div class="form-group form-group-general <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['name']) {?>has-error<?php }?>" >
            <label for="cat_data_name" class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_name;?>
</label>
            <div class="col-sm-5 col-xs-9">
                <input data-rule-required="true" type="text" class="form-control" name="cat_data[name]" id="cat_data_name" placeholder="<?php echo $_smarty_tpl->tpl_vars['cat_data']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['cat_data']->value['name'];?>
">
            </div>
        </div>


        <div class="form-group <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['icon']) {?>has-error<?php }?>">
            <label for="cat_data_icon" class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_categories_icon;?>
</label>
            <div class="col-sm-3 col-xs-4">
                <input type="hidden" name="cat_data[icon]" id="cat_data_icon" value="<?php echo $_smarty_tpl->tpl_vars['cat_data']->value['icon'];?>
">
                <button id="cat_data_icon_btn" data-placement="right" data-arrow-prev-icon-class="fa fa-chevron-left" data-arrow-next-icon-class="fa fa-chevron-right" data-label-header="{0} - {1} стр." data-label-footer="{0} - {1} из {2} иконок" data-search="true" data-search-text="Поиск..." class="btn btn-default" data-iconset="fontawesome" data-icon="<?php echo $_smarty_tpl->tpl_vars['cat_data']->value['icon'];?>
" role="iconpicker"></button>
            </div>
        </div>

        

        <div class="form-group">
            <label for="cat_data_parent_id" class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_categories_parent_id;?>
</label>
            <div class="col-sm-5 col-xs-9">
                <?php if ($_smarty_tpl->tpl_vars['cat_data']->value['id']) {?>
                    <select class="form-control selectpicker" name="cat_data[parent_id]" id="cat_data_parent_id" data-live-search="true">
                        <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/cat_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tree'=>$_smarty_tpl->tpl_vars['ar_tree_categories']->value,'selected'=>$_smarty_tpl->tpl_vars['cat_data']->value['parent_id'],'root'=>true), 0);?>

                    </select>
                <?php } else { ?>
                    <div class="input-group">
                        <select class="form-control selectpicker" name="cat_data[parent_id]" id="cat_data_parent_id" data-live-search="true">
                            <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/cat_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tree'=>$_smarty_tpl->tpl_vars['ar_tree_categories']->value,'selected'=>$_smarty_tpl->tpl_vars['cat_data']->value['parent_id'],'root'=>true), 0);?>

                        </select>
                        <span class="input-group-addon">
                            <input type="checkbox" class="storage-data" name="storage_field[]" value="parent_id" <?php if (in_array("parent_id",$_smarty_tpl->tpl_vars['storage_field']->value)) {?>checked=""<?php }?>>
                        </span>
                    </div>
                <?php }?>

            </div>
        </div>


        <div class="form-group">
            <label for="cat_data_descr" class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_descr;?>
</label>
            <div class="col-sm-10 col-xs-9">
                <textarea class="form-control" rows="5" name="cat_data[descr]" id="cat_data_descr"><?php echo $_smarty_tpl->tpl_vars['cat_data']->value['descr'];?>
</textarea>
            </div>
        </div>

        <legend><?php echo L::forms_labels_categories_access_role;?>
</legend>

        <div class="form-group">
            <label class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_categories_access_role;?>
</label>
            <div class="col-sm-10 col-xs-9">
                <?php echo $_smarty_tpl->getSubTemplate ("roles/form/table_crud.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('ar_destinations'=>$_smarty_tpl->tpl_vars['ar_roles']->value,'name'=>"roles",'ar_crud'=>$_smarty_tpl->tpl_vars['ar_crud_category']->value), 0);?>

            </div>
        </div>

        <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/actions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('update'=>isset($_smarty_tpl->tpl_vars['cat_data']->value['id'])), 0);?>

    </form>


</div>

<link rel="stylesheet" href="resources/bootstrap/iconpicker/css/bootstrap-iconpicker.min.css"/>
<?php echo '<script'; ?>
 type="text/javascript" src="resources/bootstrap/iconpicker/js/iconset/iconset-fontawesome-4.2.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="resources/bootstrap/iconpicker/js/bootstrap-iconpicker.min.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
>
    $('#cat_data_icon_btn').on('change', function(e) {
        $("#cat_data_icon").val(e.icon);
    });
<?php echo '</script'; ?>
>
























<?php }} ?>
