
<form method="post" class="form-valid"  >
    <h3 class="clamped-margin-top">Смена пароля</h3>

    <div class="form-group">
        {*<label class="control-label" for="inputPassword">Новый пароль:</label>*}
            <div class="input-group ">
                <input type="password" id="new_password" class="form-control" name="chpass_data[new_password]" placeholder="Новый пароль" data-rule-required="true" data-rule-minlength="6" data-rule-maxlength="24">
            <span class="input-group-btn">
                <button class="btn btn-default visibility-password-switch" type="button"><i class="fa fa-eye-slash"></i></button>
            </span>
            </div>
            {*<span class="help-block">6—24 символа.<span>*}

    </div>
    <div class="form-group">
        {*<label class="control-label" for="inputPassword">Повторите:</label>*}
            <div class="input-group ">
                <input type="password" id="new_password_confirm" class="form-control" name="chpass_data[new_password_confirm]" placeholder="Повторите пароль"  data-rule-required="true" data-rule-equalTo="#new_password">
        <span class="input-group-btn">
            <button class="btn btn-default visibility-password-switch" type="button"><i class="fa fa-eye-slash"></i></button>
        </span>
            </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <input type="submit"  name="send" value="Сменить" class="btn btn-primary block full-width"/>
            </div>
            <div class="col-md-6">
                <a href="{$smarty.const.HOST_ROOT}" class="btn  btn-default block full-width">Отмена</a>
            </div>
        </div>

    </div>
</form>


{*
<div class="alert alert-info">
    <p>Старайтесь периодически менять пароли на своих сервисах, а также в случаях, когда один из ваших паролей взломали, так как велика вероятность, что злоумышленники могут получить доступ и к другим.</p>
    <p>И, главное, не используйте один и тот же пароль везде — это ставит под угрозу одновременно все аккаунты, которыми вы пользуетесь.</p>
</div>
*}