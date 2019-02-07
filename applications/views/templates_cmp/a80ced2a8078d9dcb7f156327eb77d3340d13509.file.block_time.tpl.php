<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:12:21
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\demands\form\block_time.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20165c5a2665645f26-85991976%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a80ced2a8078d9dcb7f156327eb77d3340d13509' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\form\\block_time.tpl',
      1 => 1452678560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20165c5a2665645f26-85991976',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cuser_data' => 0,
    'demand_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a266567ca36_98325387',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a266567ca36_98325387')) {function content_5c5a266567ca36_98325387($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.date_format.php';
?><legend class="legend-sm"><?php echo L::forms_legends_demands_time;?>
</legend>
<div class="form-group">
    <label for="demand_data_required_time" class="col-sm-4 control-label"><?php echo L::forms_labels_demands_required_time;?>
</label>
    <div class="col-sm-8">
        <?php echo $_smarty_tpl->getSubTemplate ("demands/form/hours_picker.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
</div>

<?php if (!$_smarty_tpl->tpl_vars['cuser_data']->value['access_data']['limited_setting']) {?>
<div class="form-group">
    <label for="demand_data_deadline_date" class="col-sm-4 control-label">Дедлайн</label>
    <div class="col-sm-8">
        <div class="input-group date form_date start_date" data-position="bottom" data-link-field="demand_data_deadline_date_lf">
            <input class="form-control" id="demand_data_deadline_date" size="16" type="text" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['demand_data']->value['deadline_date'],"%d/%m/%Y");?>
" readonly>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
            <span class="input-group-addon"><span class="fa fa-times"></span></span>
        </div>
        <input type="hidden" id="demand_data_deadline_date_lf" name="demand_data[deadline_date]" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['demand_data']->value['deadline_date'],"%Y-%m-%d");?>
" />
    </div>
</div>

<div class="form-group">
    <label for="demand_data_percent_complete" class="col-sm-4 control-label">Выполнено</label>
    <div class="col-sm-8">
        <p class="form-control-static">0%</p>
        
    </div>
</div>
<?php }?>

<?php }} ?>
