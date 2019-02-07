<form role="form" method="post">
    <div class="form-group">
        <input name="login_data[email]" type="email" class="form-control input-lg" placeholder="{L::forms_labels_email}" required="">
    </div>
    <div class="form-group">
        <div class="input-group">
            <input type="password" class="form-control input-lg" name="login_data[password]"  placeholder="{L::forms_labels_password}"/>
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-lg visibility-password-switch" type="button"><i class="fa fa-eye-slash"></i></button>
                                </span>
        </div>
    </div>
    <button type="submit" name="login" class="btn btn-primary block full-width">{L::actions_enter}</button>

    <div class="space"></div>

    <p class="text-center small">
        <a href="{$smarty.const.HOST_ROOT}forgotpass/">
            {L::modules_login_text_forgot_password}?
        </a>
    </p>
</form>