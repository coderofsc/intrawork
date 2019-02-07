<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 19:15:47
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\projects\versions\form\wrap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:61975c5b0833707001-01015270%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e59442de55bf0a5b05eebafd2dda330ea1ad4c67' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\projects\\versions\\form\\wrap.tpl',
      1 => 1451776474,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61975c5b0833707001-01015270',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pv_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5b083372a291_50025734',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5b083372a291_50025734')) {function content_5c5b083372a291_50025734($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.date_format.php';
?><form class="form-horizontal"  role="form" method="post" id="pv-form">

    <div class="form-group form-group-general">
        <label for="pv_data_name" class="col-sm-2 col-xs-4 control-label">Название версии</label>
        <div class="col-sm-4 col-xs-6 ">
            <input type="text" class="form-control" name="pv_data[name]" id="pv_data_name" placeholder="<?php echo $_smarty_tpl->tpl_vars['pv_data']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['pv_data']->value['name'];?>
">
        </div>
    </div>

    <div class="form-group">
        <label for="pv_data_date" class="col-sm-2 col-xs-4 control-label"><?php echo L::forms_labels_date;?>
</label>
        <div class="col-sm-4 col-xs-6">
            <div class="input-group date form_datetime" data-link-field="pv_data_date_lf">
                <input class="form-control" id="pv_data_date" size="16" type="text" value="<?php echo smarty_modifier_date_format(time(),"%d/%m/%Y %H:%M");?>
" readonly required="true">
                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                <span class="input-group-addon"><span class="fa fa-times"></span></span>
            </div>
            <input type="hidden" id="pv_data_date_lf" name="pv_data[date]" value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d %H:%M:%S");?>
" />
        </div>
    </div>

    <div class="form-group">
        <label for="pv_data_descr" class="col-sm-2 col-xs-4 control-label"><?php echo L::forms_labels_descr;?>
</label>
        <div class="col-sm-10 col-xs-8">
            <textarea rows="2" class="form-control" name="pv_data[descr]" id="pv_data_descr"><?php echo $_smarty_tpl->tpl_vars['pv_data']->value['descr'];?>
</textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="pv_data_descr" class="col-sm-2 col-xs-4 control-label"></label>
        <div class="col-sm-10 col-xs-8">
            <button type="submit" class="btn btn-success">Добавить</button>
        </div>
    </div>

</form>
<?php }} ?>
