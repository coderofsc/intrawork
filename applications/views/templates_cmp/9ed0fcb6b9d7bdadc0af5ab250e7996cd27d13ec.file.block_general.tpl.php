<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 03:27:06
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\contacts\view\block_general.tpl" */ ?>
<?php /*%%SmartyHeaderCode:125725c5a29da156ab7-06424134%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ed0fcb6b9d7bdadc0af5ab250e7996cd27d13ec' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\contacts\\view\\block_general.tpl',
      1 => 1450950446,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125725c5a29da156ab7-06424134',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contact_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a29da1eb1d1_57780840',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a29da1eb1d1_57780840')) {function content_5c5a29da1eb1d1_57780840($_smarty_tpl) {?><div class="form-horizontal form-clamped">
    <div class="form-group">
        <label class="col-sm-5 col-xs-5 control-label"><?php echo L::forms_labels_contacts_legal;?>
</label>
        <div class="col-xs-7 col-sm-7 ">
            <p class="form-control-static">
                <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['legal']==@constant('LEGAL_PERSON')) {?>
                    Юридическое лицо
                <?php } else { ?>
                    Физическое лицо
                <?php }?>
            </p>
        </div>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['legal']==@constant('LEGAL_PERSON')) {?>
        <div class="form-group">
            <label class="col-sm-5 col-xs-5 control-label"><?php echo L::forms_legends_spokesman;?>
</label>
            <div class="col-xs-7 col-sm-7 ">
                <p class="form-control-static">
                    <?php echo $_smarty_tpl->tpl_vars['contact_data']->value['face_full_fio'];?>

                </p>
            </div>
        </div>
    <?php }?>

    <div class="form-group">
        <label class="col-sm-5 col-xs-5 control-label"><?php echo L::forms_labels_phone;?>
</label>
        <div class="col-xs-7 col-sm-7 ">
            <p class="form-control-static">
                <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['phone']||$_smarty_tpl->tpl_vars['contact_data']->value['phone_mobile']) {?>
                    <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['phone']) {?><span><?php echo $_smarty_tpl->tpl_vars['contact_data']->value['phone'];
if ($_smarty_tpl->tpl_vars['contact_data']->value['phone_ext']) {?>*<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['phone_ext'];
}?></span><br/><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['phone_mobile']) {?><span><?php echo $_smarty_tpl->tpl_vars['contact_data']->value['phone_mobile'];?>
</span><?php }?>
                <?php } else { ?>
                    <span class="text-muted"><?php echo L::text_not_specified;?>
</span>
                <?php }?>
            </p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-5 col-xs-5 control-label"><?php echo L::forms_labels_email;?>
</label>
        <div class="col-xs-7 col-sm-7 ">
            <p class="form-control-static">
                <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['email']) {?>
                    <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['email'];?>
"><?php echo $_smarty_tpl->tpl_vars['contact_data']->value['email'];?>
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
                <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['icq']) {?>
                    <?php echo $_smarty_tpl->tpl_vars['contact_data']->value['icq'];?>

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
                <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['skype']) {?>
                    <a href="skype:<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['skype'];?>
"><?php echo $_smarty_tpl->tpl_vars['contact_data']->value['skype'];?>
</a>
                <?php } else { ?>
                    <span class="text-muted"><?php echo L::text_not_specified;?>
</span>
                <?php }?>
            </p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-5 col-xs-5 control-label">Сайт</label>
        <div class="col-xs-7 col-sm-7 ">
            <p class="form-control-static">
                <?php if ($_smarty_tpl->tpl_vars['contact_data']->value['site']) {?>
                    <a href="http://<?php echo $_smarty_tpl->tpl_vars['contact_data']->value['site'];?>
"><?php echo $_smarty_tpl->tpl_vars['contact_data']->value['site'];?>
</a>
                <?php } else { ?>
                    <span class="text-muted"><?php echo L::text_not_specified;?>
</span>
                <?php }?>
            </p>
        </div>
    </div>

</div><?php }} ?>
