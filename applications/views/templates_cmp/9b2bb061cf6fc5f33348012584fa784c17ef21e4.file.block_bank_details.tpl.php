<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 04:04:07
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\contacts\form\block_bank_details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104395c5a3287d9f835-41225895%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b2bb061cf6fc5f33348012584fa784c17ef21e4' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\contacts\\form\\block_bank_details.tpl',
      1 => 1449698800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104395c5a3287d9f835-41225895',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contact_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a3287dce638_06961333',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a3287dce638_06961333')) {function content_5c5a3287dce638_06961333($_smarty_tpl) {?><div class="form-group">
    <label for="contact_data_bank_account" class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_contacts_bank_account;?>
</label>
    <div class="col-sm-6 col-xs-9">
        <input type="text" data-mask="999-99-999-9999-9" class="form-control" name="contact_data[bank_account]" id="contact_data_bank_account" value="<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['bank_account'];?>
">
    </div>
</div>

<div class="form-group">
    <label for="contact_data_bank_offset_account" class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_contacts_bank_offset_account;?>
</label>
    <div class="col-sm-6 col-xs-9">
        <input type="text" class="form-control" name="contact_data[bank_offset_account]" id="contact_data_bank_offset_account" value="<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['bank_offset_account'];?>
">
    </div>
</div>

<div class="clearfix"></div>

<div class="form-group">
    <label for="contact_data_bank_name" class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_contacts_bank_name;?>
</label>
    <div class="col-sm-6 col-xs-9">
        <input type="text" class="form-control" name="contact_data[bank_name]" id="contact_data_bank_name" value="<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['bank_name'];?>
">
    </div>
</div>

<div class="form-group">
    <label for="contact_data_bank_inn" class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_contacts_bank_inn;?>
</label>
    <div class="col-sm-6 col-xs-9">
        <input type="text" class="form-control" name="contact_data[bank_inn]" id="contact_data_bank_inn" value="<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['bank_inn'];?>
">
    </div>
</div>

<div class="form-group">
    <label for="contact_data_bank_kpp" class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_contacts_bank_kpp;?>
</label>
    <div class="col-sm-6 col-xs-9">
        <input type="text" class="form-control" name="contact_data[bank_kpp]" id="contact_data_bank_kpp" value="<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['bank_kpp'];?>
">
    </div>
</div>

<div class="form-group">
    <label for="contact_data_bank_bik" class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_contacts_bank_bik;?>
</label>
    <div class="col-sm-6 col-xs-9">
        <input type="text" data-mask="999999999" class="form-control" name="contact_data[bank_bik]" id="contact_data_bank_bik" value="<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['bank_bik'];?>
">
    </div>
</div>

<div class="form-group">
    <label for="contact_data_legal_address" class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_contacts_legal_address;?>
</label>
    <div class="col-xs-9 col-sm-6">
        <textarea class="form-control" rows="2" name="contact_data[legal_address]" id="contact_data_legal_address"><?php echo $_smarty_tpl->tpl_vars['contact_data']->value['legal_address'];?>
</textarea>
    </div>
</div>

<?php }} ?>
