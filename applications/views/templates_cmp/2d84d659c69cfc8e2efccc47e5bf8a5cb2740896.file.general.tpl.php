<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:26:03
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\mailbots\form\general.tpl" */ ?>
<?php /*%%SmartyHeaderCode:123805c5a299b528d52-74347440%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d84d659c69cfc8e2efccc47e5bf8a5cb2740896' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\mailbots\\form\\general.tpl',
      1 => 1451468302,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123805c5a299b528d52-74347440',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_errors_form' => 0,
    'mb_data' => 0,
    'cuser_data' => 0,
    'global_ar_demands_types' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a299b5bd481_40072809',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a299b5bd481_40072809')) {function content_5c5a299b5bd481_40072809($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_mb_ucfirst')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
?><div class="form-group form-group-general <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['name']) {?>has-error<?php }?>">
    <label for="mb_data_name" class="col-sm-3 control-label"><?php echo L::forms_labels_name;?>
</label>
    <div class="col-sm-6">
        <input data-rule-required="true" type="text" class="form-control" name="mb_data[name]" id="mb_data_name" placeholder="<?php echo $_smarty_tpl->tpl_vars['mb_data']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['mb_data']->value['name'];?>
">
    </div>
</div>

<div class="form-group">
    <label for="mb_data_status" class="col-sm-3 control-label"><?php echo L::forms_labels_mailbots_status;?>
</label>
    <div class="col-sm-6">
        <select name="mb_data[status]" id="mb_data_status" class="form-control selectpicker">
            <option <?php if (!$_smarty_tpl->tpl_vars['mb_data']->value['status']) {?>selected<?php }?> value="0" data-icon="fa fa-toggle-off">Выключен</option>
            <option <?php if (!$_smarty_tpl->tpl_vars['mb_data']->value||$_smarty_tpl->tpl_vars['mb_data']->value['status']==1) {?>selected<?php }?> value="1" data-icon="fa fa-toggle-on">Включен</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="mb_data_cat_id" class="col-sm-3 control-label"><?php echo smarty_modifier_mb_ucfirst(L::modules_categories_morph_one);?>
</label>
    <div class="col-sm-6">
        <select class="form-control selectpicker" name="mb_data[cat_id]" id="mb_data_parent_id" data-live-search="true">
            <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/cat_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tree'=>$_smarty_tpl->tpl_vars['cuser_data']->value['ar_access_tree_categories'],'selected'=>$_smarty_tpl->tpl_vars['mb_data']->value['cat_id']), 0);?>

        </select>
        <div class="help-block"><?php echo L::forms_help_blocks_mailbots_category;?>
</div>
    </div>
</div>

<div class="form-group">
    <label for="mb_data_demand_type_id" class="col-sm-3 control-label"><?php echo smarty_modifier_mb_ucfirst(L::modules_demands_types_morph_one);?>
</label>
    <div class="col-sm-6">
        <select name="mb_data[demand_type_id]" id="mb_data_type_id" class="form-control selectpicker" data-live-search="true">
            <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['global_ar_demands_types']->value,'selected'=>$_smarty_tpl->tpl_vars['mb_data']->value['demand_type_id']), 0);?>

        </select>
        <div class="help-block">Заявкам, собранным с данного почтового ящика, будут присвоен указанный тип</div>
    </div>
</div>


<div class="form-group">
    <label for="mb_data_confirm" class="col-sm-3 control-label clamped-padding-top"><?php echo L::forms_labels_mailbots_confirm;?>
</label>
    <div class="col-sm-8">
        <input data-size="small" data-toggle="toggle" data-on="<?php echo L::text_yes;?>
" data-off="<?php echo L::text_no;?>
" type="checkbox" <?php if (!$_smarty_tpl->tpl_vars['mb_data']->value['id']||$_smarty_tpl->tpl_vars['mb_data']->value['confirm']) {?>checked<?php }?> name="mb_data[confirm]" id="mb_data_confirm" value="1">
        <div class="help-block"><?php echo L::forms_help_blocks_mailbots_confirm;?>
</div>
    </div>
</div>

<div class="form-group">
    <label for="mb_data_from_unknown" class="col-sm-3 control-label"><?php echo L::forms_labels_mailbots_from_unknown;?>
</label>
    <div class="col-sm-8">
        <input data-size="small" data-toggle="toggle" data-on="<?php echo L::text_yes;?>
" data-off="<?php echo L::text_no;?>
" <?php if (!$_smarty_tpl->tpl_vars['config']->value->limit->accept_mail_from_unknow_users) {?>disabled<?php }?> type="checkbox" <?php if ((!$_smarty_tpl->tpl_vars['mb_data']->value['id']||$_smarty_tpl->tpl_vars['mb_data']->value['from_unknown'])&&$_smarty_tpl->tpl_vars['config']->value->limit->accept_mail_from_unknow_users) {?>checked<?php }?> name="mb_data[from_unknown]" id="mb_data_from_unknown" value="1">
        <?php if (!$_smarty_tpl->tpl_vars['config']->value->limit->accept_mail_from_unknow_users) {?>
            <div class="help-block text-danger"><?php echo L::forms_help_blocks_mailbots_from_unknown_prohibit;?>
</div>
        <?php } else { ?>
            <div class="help-block"><?php echo L::forms_help_blocks_mailbots_from_unknown;?>
</div>
        <?php }?>
    </div>
</div>

<div class="form-group">
    <label for="mb_data_footer" class="col-sm-3 control-label">Подвал в письмах</label>
    <div class="col-sm-8">
        <input data-size="small" data-toggle="toggle" data-on="<?php echo L::text_yes;?>
" data-off="<?php echo L::text_no;?>
" <?php if (!$_smarty_tpl->tpl_vars['config']->value->limit->accept_mail_from_unknow_users) {?>disabled<?php }?> type="checkbox" <?php if (!$_smarty_tpl->tpl_vars['mb_data']->value['id']||$_smarty_tpl->tpl_vars['mb_data']->value['footer']) {?>checked<?php }?> name="mb_data[footer]" id="mb_data_footer" value="1">
        <div class="help-block">Отображать информационный блок Интраворка внизу шаблона писем</div>
    </div>
</div>

<div class="form-group">
    <label for="mb_data_descr" class="col-sm-3 control-label"><?php echo L::forms_labels_descr;?>
</label>
    <div class="col-sm-9">
        <textarea class="form-control" rows="2" name="mb_data[descr]" id="mb_data_descr"><?php echo $_smarty_tpl->tpl_vars['mb_data']->value['descr'];?>
</textarea>
    </div>
</div>
<?php }} ?>
