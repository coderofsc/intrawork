<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-09-22 14:37:52
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\contacts\form\block_contacts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3019559c4f610d07905-24065065%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca55c9121f1a9845b2f9a8822ce62cf5c206ba90' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\contacts\\form\\block_contacts.tpl',
      1 => 1449698800,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3019559c4f610d07905-24065065',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contact_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59c4f610d2bfc7_50693427',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c4f610d2bfc7_50693427')) {function content_59c4f610d2bfc7_50693427($_smarty_tpl) {?><div class="form-group">
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
