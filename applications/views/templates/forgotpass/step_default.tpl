<form method="post" class="valid">
    <h3 class="clamped-margin-top">Восстановление пароля</h3>

    <p>Введите почту, указанную при регистрации и мы вам вышлем инструкцию для смены пароля.</p>

    <div class="form-group">
            <input type="text" id="forgotpass_email" class="input-lg form-control" {*required*} name="forgotpass[email]" value="{$forgotpass.email}" placeholder="Электронная почта" data-rule-required="true" data-rule-email="true">
    </div>
    <div class="form-group">
        <div class="input-group input-group-captcha input-group">
            <span class="input-group-addon"><img src="captcha/code.php" width="50" height="25" alt="Код" border="0" class="img-captcha" /></span>
            <input id="forgotpass_captcha" name="forgotpass[captcha]" type="text" maxlength="4" class="numeric input-lg form-control form-control-captcha" data-rule-required="true" data-rule-remote="ajax_points/check_captcha.php" placeholder="Защитный код" />
        </div>
    </div>
    <div class="form-group">
            <input type="submit" name="send" value="Отправить" class="btn btn-primary block full-width"/>
    </div>
</form>


