<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 02:52:07
         compiled from "W:\home\intrawork.loc\demo\applications\views\templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:168335c5a21a7628e58-70962928%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bec461a3f882a2e77116033343bbab9ea3f8ae36' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\login.tpl',
      1 => 1439259832,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168335c5a21a7628e58-70962928',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a21a7682be7_12199878',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a21a7682be7_12199878')) {function content_5c5a21a7682be7_12199878($_smarty_tpl) {?><form role="form" method="post">
    <div class="form-group">
        <input name="login_data[email]" type="email" class="form-control input-lg" placeholder="<?php echo L::forms_labels_email;?>
" required="">
    </div>
    <div class="form-group">
        <div class="input-group">
            <input type="password" class="form-control input-lg" name="login_data[password]"  placeholder="<?php echo L::forms_labels_password;?>
"/>
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-lg visibility-password-switch" type="button"><i class="fa fa-eye-slash"></i></button>
                                </span>
        </div>
    </div>
    <button type="submit" name="login" class="btn btn-primary block full-width"><?php echo L::actions_enter;?>
</button>

    <div class="space"></div>

    <p class="text-center small">
        <a href="<?php echo @constant('HOST_ROOT');?>
forgotpass/">
            <?php echo L::modules_login_text_forgot_password;?>
?
        </a>
    </p>
</form><?php }} ?>
