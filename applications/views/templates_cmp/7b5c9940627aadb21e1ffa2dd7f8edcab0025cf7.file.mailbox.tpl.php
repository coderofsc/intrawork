<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:26:03
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\mailbots\form\mailbox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203255c5a299b5f3f84-67360008%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b5c9940627aadb21e1ffa2dd7f8edcab0025cf7' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\mailbots\\form\\mailbox.tpl',
      1 => 1451472340,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203255c5a299b5f3f84-67360008',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_errors_form' => 0,
    'mb_data' => 0,
    'mailbot_master' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a299b6809b9_54227235',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a299b6809b9_54227235')) {function content_5c5a299b6809b9_54227235($_smarty_tpl) {?><div class="form-group <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['address']) {?>has-error<?php }?>">
    <label for="mb_data_address" class="col-sm-3 control-label"><?php echo L::forms_labels_mailbots_address;?>
</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="mb_data[address]" id="mb_data_address" value="<?php echo $_smarty_tpl->tpl_vars['mb_data']->value['address'];?>
">
    </div>
</div>

<div class="form-group">
    <label for="mb_data_master" class="col-sm-3 control-label"><?php echo L::forms_labels_mailbots_master;?>
</label>
    <div class="col-sm-9">
        <input data-size="small" data-toggle="toggle" data-on="<?php echo L::text_yes;?>
" data-off="<?php echo L::text_no;?>
" type="checkbox" <?php if ((!$_smarty_tpl->tpl_vars['mb_data']->value['id']&&!$_smarty_tpl->tpl_vars['mailbot_master']->value)||$_smarty_tpl->tpl_vars['mb_data']->value['master']) {?>checked<?php }?> name="mb_data[master]" value="1">
        <div class="help-block"><?php echo L::forms_help_blocks_mailbots_master;?>
</div>
    </div>
</div>


<div class="form-group">
    <label for="mb_data_protocol" class="col-sm-3 control-label"><?php echo L::forms_labels_mailbots_protocol;?>
</label>
    <div class="col-sm-6">
        <select name="mb_data[protocol]" id="mb_data_protocol" class="form-control selectpicker" data-width="75px">
            <option <?php if (!$_smarty_tpl->tpl_vars['mb_data']->value['protocol']) {?>selected<?php }?> value="<?php echo @constant('MB_POP3');?>
">POP3</option>
            <option <?php if ($_smarty_tpl->tpl_vars['mb_data']->value['protocol']==@constant('MB_IMAP')) {?>selected<?php }?> value="<?php echo @constant('MB_IMAP');?>
">IMAP</option>
            <option <?php if ($_smarty_tpl->tpl_vars['mb_data']->value['protocol']==@constant('MB_NNTP')) {?>selected<?php }?> value="<?php echo @constant('MB_NNTP');?>
">NNTP</option>
        </select>
    </div>
</div>

<div class="form-group <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['server']) {?>has-error<?php }?>">
    <label for="mb_data_server" class="col-sm-3 control-label"><?php echo L::forms_labels_mailbots_server;?>
</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="mb_data[server]" id="mb_data_server" value="<?php echo $_smarty_tpl->tpl_vars['mb_data']->value['server'];?>
">
    </div>
</div>

<div class="form-group <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['port']) {?>has-error<?php }?>">
    <label for="mb_data_port" class="col-sm-3 control-label"><?php echo L::forms_labels_mailbots_port;?>
</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="mb_data[port]" id="mb_data_port" value="<?php if (!isset($_smarty_tpl->tpl_vars['mb_data']->value['port'])) {?>995<?php } else {
echo $_smarty_tpl->tpl_vars['mb_data']->value['port'];
}?>">
    </div>
</div>

<div class="form-group <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['login']) {?>has-error<?php }?>">
    <label for="mb_data_login" class="col-sm-3 control-label"><?php echo L::forms_labels_mailbots_login;?>
</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="mb_data[login]" id="mb_data_login" value="<?php echo $_smarty_tpl->tpl_vars['mb_data']->value['login'];?>
">
    </div>
</div>

<div class="form-group <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['password']) {?>has-error<?php }?>">
    <label for="mb_data_password" class="col-sm-3 control-label"><?php echo L::forms_labels_password;?>
</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="mb_data[password]" id="mb_data_password" value="<?php echo $_smarty_tpl->tpl_vars['mb_data']->value['password'];?>
">
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("./regex.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
