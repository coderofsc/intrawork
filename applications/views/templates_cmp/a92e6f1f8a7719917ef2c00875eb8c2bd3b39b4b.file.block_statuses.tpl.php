<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:12:21
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\demands\form\block_statuses.tpl" */ ?>
<?php /*%%SmartyHeaderCode:146555c5a26657e4088-69071054%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a92e6f1f8a7719917ef2c00875eb8c2bd3b39b4b' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\form\\block_statuses.tpl',
      1 => 1450445540,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146555c5a26657e4088-69071054',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'demand_data' => 0,
    'cuser_data' => 0,
    'storage_field' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a266588c020_22690021',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a266588c020_22690021')) {function content_5c5a266588c020_22690021($_smarty_tpl) {?><div class="form-group">
    <label for="demand_data_status" class="col-sm-4 control-label"><?php echo L::forms_labels_demands_status;?>
</label>
    <div class="col-sm-8">

        <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['id']) {?>
            <?php if ($_smarty_tpl->tpl_vars['cuser_data']->value['access_data']['limited_setting']) {?>
                <p class="form-control-static">
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_status.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['demand_data']->value['status'],'read'=>true), 0);?>

                </p>
            <?php } else { ?>
                <select name="demand_data[status]" id="demand_data_status" class="form-control selectpicker">
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_status.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['demand_data']->value['status']), 0);?>

                </select>
            <?php }?>
        <?php } else { ?>
            <p class="form-control-static">
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_status.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>m_demands::STATUS_NEW,'read'=>true), 0);?>

            </p>
        <?php }?>
    </div>
</div>

<div class="form-group">
    <label for="demand_data_priority" class="col-sm-4 control-label"><?php echo L::forms_labels_demands_priority;?>
</label>
    <div class="col-sm-8">
        <?php if ($_smarty_tpl->tpl_vars['cuser_data']->value['access_data']['limited_setting']) {?>
            <p class="form-control-static">
                <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['id']) {?>
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_priority.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>intval($_smarty_tpl->tpl_vars['demand_data']->value['priority']),'read'=>true), 0);?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_priority.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>100,'read'=>true), 0);?>

                <?php }?>
            </p>
        <?php } elseif (!$_smarty_tpl->tpl_vars['demand_data']->value['id']) {?>
            <div class="input-group">
                <div class="form-control">
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_priority.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['demand_data']->value['priority']), 0);?>

                </div>
                <span class="input-group-addon">
                    <input type="checkbox" class="storage-data" name="storage_field[]" value="priority" <?php if (in_array("priority",$_smarty_tpl->tpl_vars['storage_field']->value)) {?>checked=""<?php }?>>
                </span>
            </div>
        <?php } else { ?>
            <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_priority.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['demand_data']->value['priority']), 0);?>

        <?php }?>
    </div>

</div>
<div class="form-group">
    <label for="demand_data_criticality" class="col-sm-4 control-label"><?php echo L::forms_labels_demands_criticality;?>
</label>
    <div class="col-sm-8">

        <?php if ($_smarty_tpl->tpl_vars['cuser_data']->value['access_data']['limited_setting']) {?>
            <p class="form-control-static">
                <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['id']) {?>
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_criticality.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>intval($_smarty_tpl->tpl_vars['demand_data']->value['criticality']),'read'=>true), 0);?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_criticality.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>m_demands::CRITICALITY_LOW,'read'=>true), 0);?>

                <?php }?>
            </p>
        <?php } elseif ($_smarty_tpl->tpl_vars['demand_data']->value['id']) {?>
            <select name="demand_data[criticality]" id="demand_data_criticality" class="form-control selectpicker">
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_criticality.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['demand_data']->value['criticality']), 0);?>

            </select>
        <?php } else { ?>
            <div class="input-group">
                <select name="demand_data[criticality]" id="demand_data_criticality" class="form-control selectpicker">
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/demand_criticality.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('value'=>$_smarty_tpl->tpl_vars['demand_data']->value['criticality']), 0);?>

                </select>
                <span class="input-group-addon">
                    <input type="checkbox" class="storage-data" name="storage_field[]" value="criticality" <?php if (in_array("criticality",$_smarty_tpl->tpl_vars['storage_field']->value)) {?>checked=""<?php }?>>
                </span>
            </div>
        <?php }?>

    </div>
</div>

<?php }} ?>
