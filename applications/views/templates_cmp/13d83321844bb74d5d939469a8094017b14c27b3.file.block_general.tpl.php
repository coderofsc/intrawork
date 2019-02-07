<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-09-22 14:34:49
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\demands\form\block_general.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21159c4f559632793-29581748%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13d83321844bb74d5d939469a8094017b14c27b3' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\demands\\form\\block_general.tpl',
      1 => 1452677336,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21159c4f559632793-29581748',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'demand_data' => 0,
    'cuser_data' => 0,
    'global_ar_demands_types' => 0,
    'storage_field' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59c4f5596d0317_71664078',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c4f5596d0317_71664078')) {function content_59c4f5596d0317_71664078($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_mb_ucfirst')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
if (!is_callable('smarty_modifier_date_format')) include 'Z:\\home\\intrawork.loc\\demo\\classes\\smarty\\plugins\\modifier.date_format.php';
?>

<?php if ($_smarty_tpl->tpl_vars['demand_data']->value['id']) {?>
    <div class="form-group form-group-general">
        <label for="demand_data_title" class=" col-sm-2 control-label"><?php echo L::forms_labels_title;?>
</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" data-rule-required="true" name="demand_data[title]" id="demand_data_title" value="<?php echo $_smarty_tpl->tpl_vars['demand_data']->value['title'];?>
">
        </div>
    </div>

    <div class="form-group">
        <label for="demand_data_cat_id" class="col-sm-2 control-label"><?php echo smarty_modifier_mb_ucfirst(L::modules_categories_morph_one);?>
</label>
        <div class="col-sm-4">
            <select name="demand_data[cat_id]" id="demand_data_cat_id" class="form-control selectpicker" data-live-search="true" data-header="Выберите категорию заявки">
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/cat_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tree'=>$_smarty_tpl->tpl_vars['cuser_data']->value['ar_access_tree_categories'],'selected'=>$_smarty_tpl->tpl_vars['demand_data']->value['cat_id'],'crud'=>true), 0);?>

            </select>
        </div>
        <label for="demand_data_type_id" class="col-sm-2 control-label"><?php echo smarty_modifier_mb_ucfirst(L::modules_demands_types_morph_one);?>
</label>
        <div class="col-sm-4">
            <select name="demand_data[type_id]" id="demand_data_type_id" class="form-control selectpicker" data-live-search="true" data-header="Выберите тип заявки">
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['global_ar_demands_types']->value,'selected'=>$_smarty_tpl->tpl_vars['demand_data']->value['type_id']), 0);?>

            </select>
        </div>

    </div>
    <div class="form-group">
        <label for="demand_data_required_time" class="col-sm-2 control-label"><?php echo L::forms_labels_demands_required_time;?>
</label>
        <div class="col-sm-4">
            <?php echo $_smarty_tpl->getSubTemplate ("demands/form/hours_picker.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
        <label for="demand_data_deadline_date" class="col-sm-2 control-label">Дедлайн</label>
        <div class="col-sm-4">
            <div class="input-group date form_date start_date" data-link-field="demand_data_deadline_date_lf">
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
        <label for="demand_data_percent_complete" class="col-sm-2 control-label">Выполнено</label>
        <div class="col-sm-4">

            <div class="input-group">
                <select id="demand_data_percent_complete" name="demand_data[percent_complete]" class="form-control selectpicker">
                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['percent'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['percent']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['name'] = 'percent';
$_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['start'] = (int) 0;
$_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['loop'] = is_array($_loop=110) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['step'] = ((int) 10) == 0 ? 1 : (int) 10;
$_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['percent']['total']);
?>
                        <option <?php if ($_smarty_tpl->tpl_vars['demand_data']->value['percent_complete']==$_smarty_tpl->getVariable('smarty')->value['section']['percent']['index']) {?>selected=""<?php }?> value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['percent']['index'];?>
"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['percent']['index'];?>
%</option>
                    <?php endfor; endif; ?>
                </select>
                <span class="input-group-btn">
                    <button class="btn btn-default btn-find-option" data-for="#demand_data_percent_complete" data-value="30" type="button">30%</button>
                </span>
                <span class="input-group-btn">
                    <button class="btn btn-default btn-find-option" data-for="#demand_data_percent_complete" data-value="70" type="button">70%</button>
                </span>
                <span class="input-group-btn">
                    <button class="btn btn-default btn-find-option" data-for="#demand_data_percent_complete" data-value="100" type="button">100%</button>
                </span>
            </div>

            
        </div>
    </div>

<?php } else { ?>
    <div class="form-group form-group-general">
        
        <div class="col-sm-12">
            <input type="text" placeholder="<?php echo L::forms_labels_title;?>
" class="form-control" data-rule-required="true" name="demand_data[title]" id="demand_data_title" value="<?php echo $_smarty_tpl->tpl_vars['demand_data']->value['title'];?>
">
        </div>
    </div>

    <div class="form-group">
        
        <div class="col-sm-12">
            <div class="input-group">
                <select name="demand_data[cat_id]" id="demand_data_cat_id" class="form-control selectpicker" data-live-search="true" data-header="Выберите категорию заявки">
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/cat_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tree'=>$_smarty_tpl->tpl_vars['cuser_data']->value['ar_access_tree_categories'],'selected'=>$_smarty_tpl->tpl_vars['demand_data']->value['cat_id'],'crud'=>true), 0);?>

                </select>
                <span class="input-group-addon">
                    <input type="checkbox" class="storage-data" name="storage_field[]" value="cat_id" <?php if (in_array("cat_id",$_smarty_tpl->tpl_vars['storage_field']->value)) {?>checked=""<?php }?>>
                </span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            <div class="input-group">
                <select name="demand_data[type_id]" id="demand_data_type_id" class="form-control selectpicker" data-live-search="true" data-header="Выберите тип заявки">
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['global_ar_demands_types']->value,'selected'=>$_smarty_tpl->tpl_vars['demand_data']->value['type_id']), 0);?>

                </select>
                <span class="input-group-addon">
                    <input type="checkbox" class="storage-data" name="storage_field[]" value="type_id" <?php if (in_array("type_id",$_smarty_tpl->tpl_vars['storage_field']->value)) {?>checked=""<?php }?> />
                </span>
            </div>
        </div>
    </div>
    
<?php }?>
<?php }} ?>
