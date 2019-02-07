<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 04:04:07
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\contacts\form\block_contacts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120205c5a3287de1ec4-57077442%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ffd9a1b9e55a3a55caf3112e77a12055aa1b4f4f' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\contacts\\form\\block_contacts.tpl',
      1 => 1449698800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120205c5a3287de1ec4-57077442',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contact_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a3287e0ce41_73415529',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a3287e0ce41_73415529')) {function content_5c5a3287e0ce41_73415529($_smarty_tpl) {?><div class="form-group">
    <label for="contact_data_email" class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_email;?>
</label>
    <div class="col-sm-6 col-xs-9">
        <input type="text" class="form-control" name="contact_data[email]" id="contact_data_email" value="<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['email'];?>
">
    </div>
</div>

<div class="form-group">
    <label for="contact_data_phone" class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_phone;?>
</label>
    <div class="col-sm-6 col-xs-9">
        <div class="input-group">
            <input type="text" class="form-control mask-phone" name="contact_data[phone]" id="contact_data_phone" value="<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['phone'];?>
">
            <span class="input-group-addon"><i class="fa fa-asterisk" title="<?php echo L::forms_labels_phone_ext;?>
"></i></span>
            <input type="text" class="form-control" name="contact_data[phone_ext]" id="contact_data_phone_ext" value="<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['phone_ext'];?>
" placeholder="<?php echo L::forms_labels_phone_ext;?>
">
        </div>

    </div>
</div>

<div class="form-group">
    <label for="contact_data_phone_mobile" class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_phone_mobile;?>
</label>
    <div class="col-sm-6 col-xs-9">
        <input type="email" class="form-control mask-phone" name="contact_data[phone_mobile]" id="contact_data_phone_mobile" value="<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['phone_mobile'];?>
">
    </div>
</div>

<div class="clearfix"></div>

<div class="form-group">
    <label for="contact_data_icq" class="col-sm-2 col-xs-3 control-label">ICQ</label>
    <div class="col-sm-6 col-xs-9">
        <input type="email" class="form-control" name="contact_data[icq]" id="contact_data_icq" value="<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['icq'];?>
">
    </div>
</div>

<div class="form-group">
    <label for="contact_data_skype" class="col-sm-2 col-xs-3 control-label">Skype</label>
    <div class="col-sm-6 col-xs-9">
        <input type="email" class="form-control" name="contact_data[skype]" id="contact_data_skype" value="<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['skype'];?>
">
    </div>
</div>

<div class="form-group">
    <label for="contact_data_address" class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_fact_address;?>
</label>
    <div class="col-sm-6 col-xs-9">
        <textarea class="form-control" rows="2" name="contact_data[address]" id="contact_data_address"><?php echo $_smarty_tpl->tpl_vars['contact_data']->value['address'];?>
</textarea>
    </div>
</div>



<?php }} ?>
