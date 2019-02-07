<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-09-22 14:37:52
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\contacts\form\block_extra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2936059c4f610dab6c6-98459001%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de93fe3b770e7d201080b3bcb9e4e1e349b0e2ba' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\contacts\\form\\block_extra.tpl',
      1 => 1449698800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2936059c4f610dab6c6-98459001',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contact_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59c4f610dc0013_21801714',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c4f610dc0013_21801714')) {function content_59c4f610dc0013_21801714($_smarty_tpl) {?><div class="form-group">
    <label for="contact_data_site" class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_site;?>
</label>
    <div class="col-sm-6 col-xs-9">
        <input type="text" class="form-control" name="contact_data[site]" id="contact_data_site" value="<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['site'];?>
">
    </div>
</div>

<div class="form-group">
    <label for="contact_data_descr" class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_descr;?>
</label>
    <div class="col-sm-10 col-xs-9">
        <textarea class="form-control" rows="7" name="contact_data[descr]" id="contact_data_descr"><?php echo $_smarty_tpl->tpl_vars['contact_data']->value['descr'];?>
</textarea>
    </div>
</div>
<?php }} ?>
