<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 16:13:02
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\users\form\block_contacts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:48525c5add5e346145-97783072%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cea71822ed7d4d1c9861ed5584bc15ebc57cdff3' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\users\\form\\block_contacts.tpl',
      1 => 1450362482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48525c5add5e346145-97783072',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_data' => 0,
    'storage_field' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5add5e39c057_04865435',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5add5e39c057_04865435')) {function content_5c5add5e39c057_04865435($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_mb_ucfirst')) include 'W:\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
?><div class="form-group">
    <label for="user_data_contact_id" class="col-sm-2 col-xs-3 control-label"><?php echo smarty_modifier_mb_ucfirst(L::modules_contacts_morph_one);?>
</label>
    <div class="col-sm-6 col-xs-9">
        <?php if ($_smarty_tpl->tpl_vars['user_data']->value['id']) {?>
            <select name="user_data[contact_id]" id="user_data_contact_id" class="form-control selectpicker" data-live-search="true" data-show-subtext="true">
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/contact_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('empty'=>true,'value'=>$_smarty_tpl->tpl_vars['user_data']->value['contact_id']), 0);?>

            </select>
        <?php } else { ?>
            <div class="input-group">
                <select name="user_data[contact_id]" id="user_data_contact_id" class="form-control selectpicker" data-live-search="true" data-show-subtext="true">
                    <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/contact_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('empty'=>true,'value'=>$_smarty_tpl->tpl_vars['user_data']->value['contact_id']), 0);?>

                </select>

            <span class="input-group-addon">
                <input type="checkbox" class="storage-data" name="storage_field[]" value="contact_id" <?php if (in_array("contact_id",$_smarty_tpl->tpl_vars['storage_field']->value)) {?>checked=""<?php }?>>
            </span>
            </div>
        <?php }?>
    </div>
</div>


<div class="form-group">
    <label for="user_data_phone" class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_phone;?>
</label>
    <div class="col-sm-6 col-xs-9">
        <div class="input-group">
            <input type="text" class="form-control mask-phone" name="user_data[phone]" id="user_data_phone" value="<?php echo $_smarty_tpl->tpl_vars['user_data']->value['phone'];?>
">
            <span class="input-group-addon"><i class="fa fa-asterisk" title="<?php echo L::forms_labels_phone_ext;?>
"></i></span>
            <input type="text" class="form-control" name="user_data[phone_ext]" id="user_data_phone_ext" value="<?php echo $_smarty_tpl->tpl_vars['user_data']->value['phone_ext'];?>
" placeholder="<?php echo L::forms_labels_phone_ext;?>
">
        </div>
    </div>
</div>

<div class="form-group">
    <label for="user_data_phone_mobile" class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_phone_mobile;?>
</label>
    <div class="col-sm-6 col-xs-9">
        <input type="text" class="form-control mask-phone" name="user_data[phone_mobile]" id="user_data_phone_mobile" value="<?php echo $_smarty_tpl->tpl_vars['user_data']->value['phone_mobile'];?>
">
    </div>
</div>

<div class="clearfix"></div>

<div class="form-group">
    <label for="user_data_room" class="col-sm-2 col-xs-3 control-label"><?php echo L::forms_labels_users_room;?>
</label>
    <div class="col-sm-6 col-xs-9">
        <input type="text" class="form-control" name="user_data[room]" id="user_data_room" value="<?php echo $_smarty_tpl->tpl_vars['user_data']->value['room'];?>
">
    </div>
</div>

<div class="form-group">
    <label for="user_data_icq" class="col-sm-2 col-xs-3 control-label">ICQ</label>
    <div class="col-sm-6 col-xs-9">
        <input type="text" class="form-control" name="user_data[icq]" id="user_data_icq" value="<?php echo $_smarty_tpl->tpl_vars['user_data']->value['icq'];?>
">
    </div>
</div>
<div class="form-group">
    <label for="user_data_skype" class="col-sm-2 col-xs-3 control-label">Skype</label>
    <div class="col-sm-6 col-xs-9">
        <input type="text" class="form-control" name="user_data[skype]" id="user_data_skype" value="<?php echo $_smarty_tpl->tpl_vars['user_data']->value['skype'];?>
">
    </div>
</div>



<?php }} ?>
