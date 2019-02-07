<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:23:43
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\users\view\block_general.tpl" */ ?>
<?php /*%%SmartyHeaderCode:109075c5a290f298844-80174575%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a491719b17b0ec2bce8d9cc2a1d695ed61a33fa' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\users\\view\\block_general.tpl',
      1 => 1450451796,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109075c5a290f298844-80174575',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_data' => 0,
    'ar_roles' => 0,
    'role' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a290f3678f2_46480711',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a290f3678f2_46480711')) {function content_5c5a290f3678f2_46480711($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_ts2text')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.ts2text.php';
if (!is_callable('smarty_modifier_mb_ucfirst')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
?><div class="form-horizontal form-clamped">
    <div class="form-group">
        <label class="col-sm-5 col-xs-5 control-label"><?php echo L::forms_labels_users_network_status;?>
</label>
        <div class="col-xs-7 col-sm-7 ">
            <p class="form-control-static">
                <i class="fa fa-toggle-<?php if ($_smarty_tpl->tpl_vars['user_data']->value['inside']) {?>on text-success<?php } else { ?>off text-muted<?php }?>"></i>
                <?php if (!$_smarty_tpl->tpl_vars['user_data']->value['inside']&&$_smarty_tpl->tpl_vars['user_data']->value['unix_activity_date']) {?><span class="text-muted"> был <?php echo smarty_modifier_ts2text($_smarty_tpl->tpl_vars['user_data']->value['unix_activity_date']);?>
</span><?php }?>
            </p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-5 col-xs-5 control-label"><?php echo L::forms_labels_phone;?>
</label>
        <div class="col-xs-7 col-sm-7 ">
            <p class="form-control-static">
                <?php if ($_smarty_tpl->tpl_vars['user_data']->value['phone']||$_smarty_tpl->tpl_vars['user_data']->value['phone_mobile']) {?>
                    <?php if ($_smarty_tpl->tpl_vars['user_data']->value['phone']) {?><span><?php echo $_smarty_tpl->tpl_vars['user_data']->value['phone'];
if ($_smarty_tpl->tpl_vars['user_data']->value['phone_ext']) {?>*<?php echo $_smarty_tpl->tpl_vars['user_data']->value['phone_ext'];
}?></span><br/><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['user_data']->value['phone_mobile']) {?><span><?php echo $_smarty_tpl->tpl_vars['user_data']->value['phone_mobile'];?>
</span><?php }?>
                <?php } else { ?>
                    <span class="text-muted"><?php echo L::text_not_specified;?>
</span>
                <?php }?>
            </p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-5 col-xs-5 control-label"><?php echo smarty_modifier_mb_ucfirst(L::modules_posts_morph_one);?>
</label>
        <div class="col-xs-7 col-sm-7 ">
            <p class="form-control-static">
                <?php if ($_smarty_tpl->tpl_vars['user_data']->value['post_id']) {?>
                    <?php echo $_smarty_tpl->tpl_vars['user_data']->value['post_name'];?>

                <?php } else { ?>
                    <span class="text-muted"><?php echo L::text_not_specified;?>
</span>
                <?php }?>
            </p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-xs-5 control-label"><?php echo smarty_modifier_mb_ucfirst(L::modules_departments_morph_one);?>
</label>
        <div class="col-xs-7 col-sm-7 ">
            <p class="form-control-static">
                <?php if ($_smarty_tpl->tpl_vars['user_data']->value['dprt_id']) {?>
                    <?php echo $_smarty_tpl->tpl_vars['user_data']->value['dprt_name'];?>

                <?php } else { ?>
                    <span class="text-muted"><?php echo L::text_not_specified;?>
</span>
                <?php }?>
            </p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-5 col-xs-5 control-label"><?php echo smarty_modifier_mb_ucfirst(L::modules_roles_morph_one);?>
</label>
        <div class="col-xs-7 col-sm-7 ">
            <?php if ($_smarty_tpl->tpl_vars['ar_roles']->value) {?>
                <ul class="list-unstyled">
                    <?php  $_smarty_tpl->tpl_vars['role'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['role']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ar_roles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['role']->key => $_smarty_tpl->tpl_vars['role']->value) {
$_smarty_tpl->tpl_vars['role']->_loop = true;
?>
                        <li><?php echo $_smarty_tpl->tpl_vars['role']->value['name'];?>
</li>
                    <?php } ?>
                </ul>
            <?php } else { ?>
                <p class="form-control-static"><span class="text-muted"><?php echo L::text_not_specified;?>
</span></p>
            <?php }?>
        </div>
    </div>





    <div class="form-group">
        <label class="col-sm-5 col-xs-5 control-label"><?php echo L::forms_labels_email;?>
</label>
        <div class="col-xs-7 col-sm-7 ">
            <p class="form-control-static">
                <?php if ($_smarty_tpl->tpl_vars['user_data']->value['email']) {?>
                    <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['user_data']->value['email'];?>
"><?php echo $_smarty_tpl->tpl_vars['user_data']->value['email'];?>
</a>
                <?php } else { ?>
                    <span class="text-muted"><?php echo L::text_not_specified;?>
</span>
                <?php }?>
            </p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-5 col-xs-5 control-label">ICQ</label>
        <div class="col-xs-7 col-sm-7 ">
            <p class="form-control-static">
                <?php if ($_smarty_tpl->tpl_vars['user_data']->value['icq']) {?>
                    <?php echo $_smarty_tpl->tpl_vars['user_data']->value['icq'];?>

                <?php } else { ?>
                    <span class="text-muted"><?php echo L::text_not_specified;?>
</span>
                <?php }?>
            </p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-5 col-xs-5 control-label">Skype</label>
        <div class="col-xs-7 col-sm-7 ">
            <p class="form-control-static">
                <?php if ($_smarty_tpl->tpl_vars['user_data']->value['skype']) {?>
                    <a href="skype:<?php echo $_smarty_tpl->tpl_vars['user_data']->value['skype'];?>
"><?php echo $_smarty_tpl->tpl_vars['user_data']->value['skype'];?>
</a>
                <?php } else { ?>
                    <span class="text-muted"><?php echo L::text_not_specified;?>
</span>
                <?php }?>
            </p>
        </div>
    </div>

</div><?php }} ?>
