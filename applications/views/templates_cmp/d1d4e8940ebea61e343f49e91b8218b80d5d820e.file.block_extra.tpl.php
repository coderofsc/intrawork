<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 04:04:07
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\contacts\form\block_extra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15655c5a3287e24545-78575520%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1d4e8940ebea61e343f49e91b8218b80d5d820e' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\contacts\\form\\block_extra.tpl',
      1 => 1449698800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15655c5a3287e24545-78575520',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contact_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a3287e37dd1_09622804',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a3287e37dd1_09622804')) {function content_5c5a3287e37dd1_09622804($_smarty_tpl) {?><div class="form-group">
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
