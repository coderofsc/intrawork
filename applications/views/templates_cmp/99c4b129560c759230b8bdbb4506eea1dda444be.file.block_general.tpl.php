<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 02:55:43
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\users\form\block_general.tpl" */ ?>
<?php /*%%SmartyHeaderCode:78025c5a227fa0e6e3-20359158%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99c4b129560c759230b8bdbb4506eea1dda444be' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\users\\form\\block_general.tpl',
      1 => 1450367770,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78025c5a227fa0e6e3-20359158',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ar_errors_form' => 0,
    'user_data' => 0,
    'ar_posts' => 0,
    'storage_field' => 0,
    'ar_tree_departments' => 0,
    'ar_roles' => 0,
    'role_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a227fb7da30_49407218',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a227fb7da30_49407218')) {function content_5c5a227fb7da30_49407218($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_mb_ucfirst')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.mb_ucfirst.php';
if (!is_callable('smarty_modifier_access')) include 'c:\\WebServers\\home\\intrawork.loc\\app\\classes\\smarty\\plugins\\modifier.access.php';
?><div class="row">
    <div class="col-sm-8 col-xs-12">
        <div class="form-group form-group-general <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['surname']) {?>has-error<?php }?>">
            <label for="user_data_surname" class="col-sm-3 col-xs-3 control-label"><?php echo L::forms_labels_face_surname;?>
</label>
            <div class="col-sm-7 col-xs-9">
                <input type="text" data-rule-required="true" class="form-control" name="user_data[surname]" id="user_data_surname" placeholder="<?php echo $_smarty_tpl->tpl_vars['user_data']->value['surname'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['user_data']->value['surname'];?>
">
            </div>
        </div>

        <div class="form-group form-group-general <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['name']) {?>has-error<?php }?>">
            <label for="user_data_name" class="col-sm-3 col-xs-3 control-label"><?php echo L::forms_labels_face_name;?>
</label>
            <div class="col-sm-7 col-xs-9">
                <input type="text" data-rule-required="true" class="form-control" name="user_data[name]" id="user_data_name" placeholder="<?php echo $_smarty_tpl->tpl_vars['user_data']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['user_data']->value['name'];?>
">
            </div>
        </div>

        <div class="form-group form-group-general">
            <label for="user_data_patronymic" class="col-sm-3 col-xs-3 control-label"><?php echo L::forms_labels_face_patronymic;?>
</label>
            <div class="col-sm-7 col-xs-9">
                <input type="text" class="form-control" name="user_data[patronymic]" id="user_data_patronymic" placeholder="<?php echo $_smarty_tpl->tpl_vars['user_data']->value['patronymic'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['user_data']->value['patronymic'];?>
">
            </div>
        </div>

        <div class="form-group <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['email']) {?>has-error<?php }?>">
            <label for="user_data_email" class="col-sm-3 col-xs-3 control-label"><?php echo L::forms_labels_email;?>
</label>
            <div class="col-sm-7 col-xs-9">
                <input type="text" data-rule-required="true" class="form-control" name="user_data[email]" autocomplete="off" id="user_data_email" value="<?php echo $_smarty_tpl->tpl_vars['user_data']->value['email'];?>
">
                <!-- disables autocomplete --><input type="text" style="display:none">
            </div>
        </div>

        <div class="form-group-pwd" <?php if ($_smarty_tpl->tpl_vars['user_data']->value['id']) {?>style="display: none"<?php }?>>
            <div class="form-group <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['password']) {?>has-error<?php }?>">
                <label for="user_data_password" class="col-sm-3 col-xs-3 control-label"><?php echo L::forms_labels_password;?>
</label>
                <div class="col-sm-7 col-xs-9">
                    <div class="input-group">
                        <input type="password" class="form-control not-valid" name="user_data[password]" id="user_data_password" placeholder="Пароль" data-rule-required="true" data-rule-minlength="6" data-rule-maxlength="24" autocomplete="off">
                        <span class="input-group-btn">
                            <button class="btn btn-default visibility-password-switch" type="button"><i class="fa fa-eye-slash"></i></button>
                        </span>
                    </div>
                </div>
            </div>

            <div class="form-group <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['password']) {?>has-error<?php }?>">
                <label for="user_data_password_confirm" class="col-sm-3 col-xs-3 control-label"><?php echo L::forms_labels_password_confirm;?>
</label>
                <div class="col-sm-7 col-xs-9">
                    <div class="input-group">
                        <input type="password" class="form-control not-valid" name="user_data[password_confirm]" id="user_data_password_confirm" placeholder="Пароль" data-rule-required="true" data-rule-equalTo="#user_data_password"/>
                        <span class="input-group-btn">
                            <button class="btn btn-default visibility-password-switch" type="button"><i class="fa fa-eye-slash"></i></button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($_smarty_tpl->tpl_vars['user_data']->value['id']) {?>
            <div class="form-group">
                <label for="user_data_change_password" class="col-sm-3 col-xs-3 control-label"><?php echo L::forms_labels_password;?>
</label>
                <div class="col-sm-7 col-xs-9">
                    <button id="user_data_change_password" class="btn btn-link"><?php echo L::forms_labels_users_change_password;?>
</button>
                    <input type="checkbox" class="hidden" name="user_data[change_pwd]" />
                </div>
            </div>
        <?php }?>

        <div class="form-group">
            <label for="user_data_post_id" class="col-sm-3 col-xs-3 control-label"><?php echo smarty_modifier_mb_ucfirst(L::modules_posts_morph_one);?>
</label>
            <div class="col-sm-9">

                <?php if (smarty_modifier_access(cls_modules::MODULE_USERS,m_roles::CRUD_U)) {?>
                    <?php if ($_smarty_tpl->tpl_vars['user_data']->value['id']) {?>
                        <select name="user_data[post_id]" id="user_data_post_id" class="form-control selectpicker" data-live-search="true">
                            <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('empty'=>true,'data'=>$_smarty_tpl->tpl_vars['ar_posts']->value,'text'=>"name",'value'=>"id",'selected'=>$_smarty_tpl->tpl_vars['user_data']->value['post_id']), 0);?>

                        </select>
                    <?php } else { ?>
                        <div class="input-group">
                            <select name="user_data[post_id]" id="user_data_post_id" class="form-control selectpicker" data-live-search="true">
                                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('empty'=>true,'data'=>$_smarty_tpl->tpl_vars['ar_posts']->value,'text'=>"name",'value'=>"id",'selected'=>$_smarty_tpl->tpl_vars['user_data']->value['post_id']), 0);?>

                            </select>
                            <span class="input-group-addon">
                                <input type="checkbox" class="storage-data" name="storage_field[]" value="post_id" <?php if (in_array("post_id",$_smarty_tpl->tpl_vars['storage_field']->value)) {?>checked=""<?php }?>>
                            </span>
                        </div>
                    <?php }?>

                <?php } else { ?>
                    <input type="hidden" name="user_data[post_id]" value="<?php echo $_smarty_tpl->tpl_vars['user_data']->value['post_id'];?>
"/>
                    <p class="form-control-static">
                        <?php if ($_smarty_tpl->tpl_vars['user_data']->value['post_id']) {?>
                            <?php echo $_smarty_tpl->tpl_vars['user_data']->value['post_name'];?>

                        <?php } else { ?>
                            <span class="text-muted"><?php echo L::text_not_specified;?>
</span>
                        <?php }?>
                    </p>
                <?php }?>


            </div>
        </div>

        <div class="form-group">
            <label for="user_data_dprt_id" class="col-sm-3 col-xs-3 control-label"><?php echo smarty_modifier_mb_ucfirst(L::modules_departments_morph_one);?>
</label>
            <div class="col-sm-9">
                <?php if (smarty_modifier_access(cls_modules::MODULE_USERS,m_roles::CRUD_U)) {?>

                    <?php if ($_smarty_tpl->tpl_vars['user_data']->value['id']) {?>
                        <select name="user_data[dprt_id]" id="user_data_dprt_id" class="form-control selectpicker" data-live-search="true">
                            <?php echo $_smarty_tpl->getSubTemplate ("helpers/abstracts/tree_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tree'=>$_smarty_tpl->tpl_vars['ar_tree_departments']->value,'selected'=>$_smarty_tpl->tpl_vars['user_data']->value['dprt_id'],'empty'=>true), 0);?>

                        </select>
                    <?php } else { ?>
                        <div class="input-group">
                            <select name="user_data[dprt_id]" id="user_data_dprt_id" class="form-control selectpicker" data-live-search="true">
                                <?php echo $_smarty_tpl->getSubTemplate ("helpers/abstracts/tree_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tree'=>$_smarty_tpl->tpl_vars['ar_tree_departments']->value,'selected'=>$_smarty_tpl->tpl_vars['user_data']->value['dprt_id'],'empty'=>true), 0);?>

                            </select>
                            <span class="input-group-addon">
                                <input type="checkbox" class="storage-data" name="storage_field[]" value="dprt_id" <?php if (in_array("dprt_id",$_smarty_tpl->tpl_vars['storage_field']->value)) {?>checked=""<?php }?>>
                            </span>
                        </div>
                    <?php }?>

                <?php } else { ?>
                    <input type="hidden" name="user_data[post_id]" value="<?php echo $_smarty_tpl->tpl_vars['user_data']->value['dprt_id'];?>
"/>
                    <p class="form-control-static">
                        <?php if ($_smarty_tpl->tpl_vars['user_data']->value['dprt_id']) {?>
                            <?php echo $_smarty_tpl->tpl_vars['user_data']->value['dprt_name'];?>

                        <?php } else { ?>
                            <span class="text-muted"><?php echo L::text_not_specified;?>
</span>
                        <?php }?>
                    </p>
                <?php }?>
            </div>
        </div>

        <div class="form-group <?php if ($_smarty_tpl->tpl_vars['ar_errors_form']->value['role_id']) {?>has-error<?php }?>">
            <label for="user_data_roles" class="col-sm-3 col-xs-3 control-label"><?php echo smarty_modifier_mb_ucfirst(L::modules_roles_morph_one);?>
</label>
            <div class="col-sm-9">
                <?php if (smarty_modifier_access(cls_modules::MODULE_USERS,m_roles::CRUD_U)) {?>
                    <?php if ($_smarty_tpl->tpl_vars['user_data']->value['id']) {?>
                        <select name="user_data[role_id][]" id="user_data_roles" multiple class="form-control selectpicker" data-live-search="true">
                            <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['ar_roles']->value,'text'=>"name",'value'=>"id",'selected'=>$_smarty_tpl->tpl_vars['user_data']->value['role_id']), 0);?>

                        </select>
                    <?php } else { ?>
                        <div class="input-group">
                            <select name="user_data[role_id][]" id="user_data_roles" multiple class="form-control selectpicker" data-live-search="true">
                                <?php echo $_smarty_tpl->getSubTemplate ("helpers/forms/options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data'=>$_smarty_tpl->tpl_vars['ar_roles']->value,'text'=>"name",'value'=>"id",'selected'=>$_smarty_tpl->tpl_vars['user_data']->value['role_id']), 0);?>

                            </select>
                            <span class="input-group-addon">
                                <input type="checkbox" class="storage-data" name="storage_field[]" value="role_id" <?php if (in_array("role_id",$_smarty_tpl->tpl_vars['storage_field']->value)) {?>checked=""<?php }?>>
                            </span>
                        </div>
                    <?php }?>

                <?php } else { ?>
                    <p class="form-control-static">
                        <?php  $_smarty_tpl->tpl_vars['role_id'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['role_id']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user_data']->value['role_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['role_id']->key => $_smarty_tpl->tpl_vars['role_id']->value) {
$_smarty_tpl->tpl_vars['role_id']->_loop = true;
?>
                            <input type="hidden" name="user_data[role_id][]" value="<?php echo $_smarty_tpl->tpl_vars['role_id']->value;?>
"/>
                            <?php echo $_smarty_tpl->tpl_vars['ar_roles']->value[$_smarty_tpl->tpl_vars['role_id']->value]['name'];
if (!$_smarty_tpl->tpl_vars['role']->last) {?>, <?php }?>
                        <?php }
if (!$_smarty_tpl->tpl_vars['role_id']->_loop) {
?>
                            <span class="text-muted"><?php echo L::text_not_specified;?>
</span>
                        <?php } ?>
                    </p>
                <?php }?>
            </div>
        </div>

        <?php if (!$_smarty_tpl->tpl_vars['user_data']->value['id']) {?>
        <div class="form-group">
            <label for="user_data_send_invitation" class="col-sm-3 col-xs-3 control-label clamped-padding-top">
                Отправить приглашение
            </label>
            <div class="col-xs-9">
                <input name="send_invitation" data-size="small" <?php if (!$_smarty_tpl->tpl_vars['user_data']->value['id']||$_smarty_tpl->tpl_vars['user_data']->value['send_invitation']) {?>checked=""<?php }?> id="user_data_send_invitation" type="checkbox" data-toggle="toggle" data-on="<?php echo L::text_yes;?>
" data-off="<?php echo L::text_no;?>
" />
                <div class="help-block">
                    На указанный почтовый адрес будет отправлено письмо с реквизитами доступа к системе.
                </div>
            </div>
        </div>

            <div class="form-group" id="invitation_container" <?php if ($_smarty_tpl->tpl_vars['user_data']->value['send_invitation']) {?>style="display:none"<?php }?>>
                <label for="user_data_send_invitation" class="col-sm-3 col-xs-3 control-label clamped-padding-top">
                    Сопроводительный текст приглашения
                </label>
                <div class="col-xs-9">
                    <textarea name="text_invitation" class="form-control"></textarea>
                </div>
            </div>


            <?php echo '<script'; ?>
>
                $(function() {
                    $('#user_data_send_invitation').change(function() {
                        $("#invitation_container").slideToggle();
                    })
                })
            <?php echo '</script'; ?>
>



        <?php }?>

    </div>
    <div class="col-sm-4 col-xs-9 col-sm-offset-0 col-xs-offset-3" style="z-index: 1">
        <?php echo $_smarty_tpl->getSubTemplate ("users/form/block_avatar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div class="clearfix"></div>
        <div class="space"></div>
    </div>
</div>

<?php echo '<script'; ?>
>
    $("#user_data_change_password").on("click", function() {
        var state = $(".form-group-pwd").is(":visible");
        $(".form-group-pwd").slideToggle();

        $(".form-group-pwd").find(".form-control").toggleClass("not-valid");
        $(this).closest(".form-group").find("label").toggleClass("fade");
        $(this).text(state ? "Изменить пароль": "Не менять пароль");
        $(this).next().prop("checked", (!state));

        return false;
    });
<?php echo '</script'; ?>
>
<?php }} ?>
