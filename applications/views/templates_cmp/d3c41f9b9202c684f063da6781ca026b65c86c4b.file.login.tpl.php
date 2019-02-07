<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-21 16:53:54
         compiled from "Z:\home\intrawork.loc\demo\applications\views\templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9968599ae5f2e0f4f7-76410673%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3c41f9b9202c684f063da6781ca026b65c86c4b' => 
    array (
      0 => 'Z:\\home\\intrawork.loc\\demo\\applications\\views\\templates\\login.tpl',
      1 => 1439259832,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9968599ae5f2e0f4f7-76410673',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_599ae5f318a717_04759056',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599ae5f318a717_04759056')) {function content_599ae5f318a717_04759056($_smarty_tpl) {?><form role="form" method="post">
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
