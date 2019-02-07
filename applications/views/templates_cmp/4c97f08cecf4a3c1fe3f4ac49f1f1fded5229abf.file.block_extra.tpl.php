<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:12:21
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\demands\form\block_extra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:250595c5a266559a0f5-38837485%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c97f08cecf4a3c1fe3f4ac49f1f1fded5229abf' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\form\\block_extra.tpl',
      1 => 1451689754,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '250595c5a266559a0f5-38837485',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'demand_data' => 0,
    'storage_field' => 0,
    'ar_projects' => 0,
    'ar_users' => 0,
    'empty' => 0,
    'ar_mb' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a2665626b16_19935852',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a2665626b16_19935852')) {function content_5c5a2665626b16_19935852($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_mb_ucfirst')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
?>

<div class="form-group">
    <label for="demand_data_contact_id" class=" col-sm-4 control-label"><?php echo smarty_modifier_mb_ucfirst(L::modules_contacts_morph_one);?>
</label>
    <div class="col-sm-8">
        <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['id']) {?>
            <select name="demand_data[contact_id]" id="demand_data_contact_id" class="form-control selectpicker" data-live-search="true" data-show-subtext="true">
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/contact_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('empty'=>true,'value'=>$_smarty_tpl->tpl_vars['demand_data']->value['contact_id']), 0);?>

            </select>
        <?php } else { ?>
            <div class="input-group">
                <select name="demand_data[contact_id]" id="demand_data_contact_id" class="form-control selectpicker" data-live-search="true" data-show-subtext="true">
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/contact_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('empty'=>true,'value'=>$_smarty_tpl->tpl_vars['demand_data']->value['contact_id']), 0);?>

                </select>

            <span class="input-group-addon">
                <input type="checkbox" class="storage-data" name="storage_field[]" value="contact_id" <?php if (in_array("contact_id",$_smarty_tpl->tpl_vars['storage_field']->value)) {?>checked=""<?php }?>>
            </span>
            </div>
        <?php }?>
    </div>
</div>

<div class="form-group">
    <label for="demand_data_project_id" class=" col-sm-4 control-label"><?php echo smarty_modifier_mb_ucfirst(L::modules_projects_morph_one);?>
</label>
    <div class="col-sm-8">
        <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['id']) {?>
            <select name="demand_data[project_id]" id="demand_data_project_id" class="form-control selectpicker" data-live-search="true" data-show-subtext="true">
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('empty'=>true,'data'=>$_smarty_tpl->tpl_vars['ar_projects']->value,'selected'=>$_smarty_tpl->tpl_vars['demand_data']->value['project_id']), 0);?>

            </select>
        <?php } else { ?>
            <div class="input-group">
                <select name="demand_data[project_id]" id="demand_data_project_id" class="form-control selectpicker" data-live-search="true" data-show-subtext="true">
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('empty'=>true,'data'=>$_smarty_tpl->tpl_vars['ar_projects']->value,'selected'=>$_smarty_tpl->tpl_vars['demand_data']->value['project_id']), 0);?>

                </select>
                <span class="input-group-addon">
                    <input type="checkbox" class="storage-data" name="storage_field[]" value="project_id" <?php if (in_array("project_id",$_smarty_tpl->tpl_vars['storage_field']->value)) {?>checked=""<?php }?>>
                </span>
            </div>
        <?php }?>
    </div>
</div>


<?php if (!$_smarty_tpl->tpl_vars['demand_data']->value['id']) {?>
<div class="form-group">
    <label for="demand_data_title" class=" col-sm-4 control-label"><?php echo L::forms_labels_demands_members;?>
</label>
    <div class="col-sm-8">
        <select name="demand_data[members_eid][]" multiple id="demand_data_members_eid" class="form-control selectpicker" data-live-search="true" data-selected-text-format="count">
            <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['ar_users']->value,'text'=>"fio",'selected'=>$_smarty_tpl->tpl_vars['demand_data']->value['members_eid'],'value'=>"eid",'group'=>"dprt_name"), 0);?>

        </select>
    </div>
</div>
<?php }?>



<div class="form-group">
    <label for="demand_data_title" class=" col-sm-4 control-label"><?php echo smarty_modifier_mb_ucfirst(L::modules_mailbots_morph_one);?>
</label>
    <div class="col-sm-8">
        <select name="demand_data[mb_id]" id="demand_data_mb_id" class="form-control selectpicker" data-live-search="true" data-show-subtext="true">
            <?php if (!$_smarty_tpl->tpl_vars['demand_data']->value) {?>
                <option value="0">Автоматический выбор</option>
                <?php $_smarty_tpl->tpl_vars["empty"] = new Smarty_variable(false, null, 0);?>
            <?php } else { ?>
                <?php $_smarty_tpl->tpl_vars["empty"] = new Smarty_variable(true, null, 0);?>
            <?php }?>
            <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('empty'=>$_smarty_tpl->tpl_vars['empty']->value,'data'=>$_smarty_tpl->tpl_vars['ar_mb']->value,'subtext'=>"address",'selected'=>$_smarty_tpl->tpl_vars['demand_data']->value['mb_id']), 0);?>

        </select>
    </div>
</div>




<?php }} ?>
