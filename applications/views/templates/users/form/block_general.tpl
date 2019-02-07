<div class="row">
    <div class="col-sm-8 col-xs-12">
        <div class="form-group form-group-general {if $ar_errors_form.surname}has-error{/if}">
            <label for="user_data_surname" class="col-sm-3 col-xs-3 control-label">{L::forms_labels_face_surname}</label>
            <div class="col-sm-7 col-xs-9">
                <input type="text" data-rule-required="true" class="form-control" name="user_data[surname]" id="user_data_surname" placeholder="{$user_data.surname}" value="{$user_data.surname}">
            </div>
        </div>

        <div class="form-group form-group-general {if $ar_errors_form.name}has-error{/if}">
            <label for="user_data_name" class="col-sm-3 col-xs-3 control-label">{L::forms_labels_face_name}</label>
            <div class="col-sm-7 col-xs-9">
                <input type="text" data-rule-required="true" class="form-control" name="user_data[name]" id="user_data_name" placeholder="{$user_data.name}" value="{$user_data.name}">
            </div>
        </div>

        <div class="form-group form-group-general">
            <label for="user_data_patronymic" class="col-sm-3 col-xs-3 control-label">{L::forms_labels_face_patronymic}</label>
            <div class="col-sm-7 col-xs-9">
                <input type="text" class="form-control" name="user_data[patronymic]" id="user_data_patronymic" placeholder="{$user_data.patronymic}" value="{$user_data.patronymic}">
            </div>
        </div>

        <div class="form-group {if $ar_errors_form.email}has-error{/if}">
            <label for="user_data_email" class="col-sm-3 col-xs-3 control-label">{L::forms_labels_email}</label>
            <div class="col-sm-7 col-xs-9">
                <input type="text" data-rule-required="true" class="form-control" name="user_data[email]" autocomplete="off" id="user_data_email" value="{$user_data.email}">
                <!-- disables autocomplete --><input type="text" style="display:none">
            </div>
        </div>

        <div class="form-group-pwd" {if $user_data.id}style="display: none"{/if}>
            <div class="form-group {if $ar_errors_form.password}has-error{/if}">
                <label for="user_data_password" class="col-sm-3 col-xs-3 control-label">{L::forms_labels_password}</label>
                <div class="col-sm-7 col-xs-9">
                    <div class="input-group">
                        <input type="password" class="form-control not-valid" name="user_data[password]" id="user_data_password" placeholder="Пароль" data-rule-required="true" data-rule-minlength="6" data-rule-maxlength="24" autocomplete="off">
                        <span class="input-group-btn">
                            <button class="btn btn-default visibility-password-switch" type="button"><i class="fa fa-eye-slash"></i></button>
                        </span>
                    </div>
                </div>
            </div>

            <div class="form-group {if $ar_errors_form.password}has-error{/if}">
                <label for="user_data_password_confirm" class="col-sm-3 col-xs-3 control-label">{L::forms_labels_password_confirm}</label>
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

        {if $user_data.id}
            <div class="form-group">
                <label for="user_data_change_password" class="col-sm-3 col-xs-3 control-label">{L::forms_labels_password}</label>
                <div class="col-sm-7 col-xs-9">
                    <button id="user_data_change_password" class="btn btn-link">{L::forms_labels_users_change_password}</button>
                    <input type="checkbox" class="hidden" name="user_data[change_pwd]" />
                </div>
            </div>
        {/if}

        <div class="form-group">
            <label for="user_data_post_id" class="col-sm-3 col-xs-3 control-label">{L::modules_posts_morph_one|mb_ucfirst}</label>
            <div class="col-sm-9">

                {if cls_modules::MODULE_USERS|access:m_roles::CRUD_U}
                    {if $user_data.id}
                        <select name="user_data[post_id]" id="user_data_post_id" class="form-control selectpicker" data-live-search="true">
                            {include file="helpers/forms/options.tpl" empty=true data=$ar_posts text="name" value="id" selected=$user_data.post_id}
                        </select>
                    {else}
                        <div class="input-group">
                            <select name="user_data[post_id]" id="user_data_post_id" class="form-control selectpicker" data-live-search="true">
                                {include file="helpers/forms/options.tpl" empty=true data=$ar_posts text="name" value="id" selected=$user_data.post_id}
                            </select>
                            <span class="input-group-addon">
                                <input type="checkbox" class="storage-data" name="storage_field[]" value="post_id" {if in_array("post_id", $storage_field)}checked=""{/if}>
                            </span>
                        </div>
                    {/if}

                {else}
                    <input type="hidden" name="user_data[post_id]" value="{$user_data.post_id}"/>
                    <p class="form-control-static">
                        {if $user_data.post_id}
                            {$user_data.post_name}
                        {else}
                            <span class="text-muted">{L::text_not_specified}</span>
                        {/if}
                    </p>
                {/if}


            </div>
        </div>

        <div class="form-group">
            <label for="user_data_dprt_id" class="col-sm-3 col-xs-3 control-label">{L::modules_departments_morph_one|mb_ucfirst}</label>
            <div class="col-sm-9">
                {if cls_modules::MODULE_USERS|access:m_roles::CRUD_U}

                    {if $user_data.id}
                        <select name="user_data[dprt_id]" id="user_data_dprt_id" class="form-control selectpicker" data-live-search="true">
                            {include file="helpers/abstracts/tree_options.tpl" tree=$ar_tree_departments selected=$user_data.dprt_id empty=true}
                        </select>
                    {else}
                        <div class="input-group">
                            <select name="user_data[dprt_id]" id="user_data_dprt_id" class="form-control selectpicker" data-live-search="true">
                                {include file="helpers/abstracts/tree_options.tpl" tree=$ar_tree_departments selected=$user_data.dprt_id empty=true}
                            </select>
                            <span class="input-group-addon">
                                <input type="checkbox" class="storage-data" name="storage_field[]" value="dprt_id" {if in_array("dprt_id", $storage_field)}checked=""{/if}>
                            </span>
                        </div>
                    {/if}

                {else}
                    <input type="hidden" name="user_data[post_id]" value="{$user_data.dprt_id}"/>
                    <p class="form-control-static">
                        {if $user_data.dprt_id}
                            {$user_data.dprt_name}
                        {else}
                            <span class="text-muted">{L::text_not_specified}</span>
                        {/if}
                    </p>
                {/if}
            </div>
        </div>

        <div class="form-group {if $ar_errors_form.role_id}has-error{/if}">
            <label for="user_data_roles" class="col-sm-3 col-xs-3 control-label">{L::modules_roles_morph_one|mb_ucfirst}</label>
            <div class="col-sm-9">
                {if cls_modules::MODULE_USERS|access:m_roles::CRUD_U}
                    {if $user_data.id}
                        <select name="user_data[role_id][]" id="user_data_roles" multiple class="form-control selectpicker" data-live-search="true">
                            {include file="helpers/forms/options.tpl" data=$ar_roles text="name" value="id" selected=$user_data.role_id}
                        </select>
                    {else}
                        <div class="input-group">
                            <select name="user_data[role_id][]" id="user_data_roles" multiple class="form-control selectpicker" data-live-search="true">
                                {include file="helpers/forms/options.tpl" data=$ar_roles text="name" value="id" selected=$user_data.role_id}
                            </select>
                            <span class="input-group-addon">
                                <input type="checkbox" class="storage-data" name="storage_field[]" value="role_id" {if in_array("role_id", $storage_field)}checked=""{/if}>
                            </span>
                        </div>
                    {/if}

                {else}
                    <p class="form-control-static">
                        {foreach from=$user_data.role_id item=role_id}
                            <input type="hidden" name="user_data[role_id][]" value="{$role_id}"/>
                            {$ar_roles.$role_id.name}{if !$role@last}, {/if}
                        {foreachelse}
                            <span class="text-muted">{L::text_not_specified}</span>
                        {/foreach}
                    </p>
                {/if}
            </div>
        </div>

        {if !$user_data.id}
        <div class="form-group">
            <label for="user_data_send_invitation" class="col-sm-3 col-xs-3 control-label clamped-padding-top">
                Отправить приглашение
            </label>
            <div class="col-xs-9">
                <input name="send_invitation" data-size="small" {if !$user_data.id || $user_data.send_invitation}checked=""{/if} id="user_data_send_invitation" type="checkbox" data-toggle="toggle" data-on="{L::text_yes}" data-off="{L::text_no}" />
                <div class="help-block">
                    На указанный почтовый адрес будет отправлено письмо с реквизитами доступа к системе.
                </div>
            </div>
        </div>

            <div class="form-group" id="invitation_container" {if $user_data.send_invitation}style="display:none"{/if}>
                <label for="user_data_send_invitation" class="col-sm-3 col-xs-3 control-label clamped-padding-top">
                    Сопроводительный текст приглашения
                </label>
                <div class="col-xs-9">
                    <textarea name="text_invitation" class="form-control"></textarea>
                </div>
            </div>


            <script>
                $(function() {
                    $('#user_data_send_invitation').change(function() {
                        $("#invitation_container").slideToggle();
                    })
                })
            </script>



        {/if}

    </div>
    <div class="col-sm-4 col-xs-9 col-sm-offset-0 col-xs-offset-3{* text-center*}" style="z-index: 1">
        {include file="users/form/block_avatar.tpl"}
        <div class="clearfix"></div>
        <div class="space"></div>
    </div>
</div>

<script>
    $("#user_data_change_password").on("click", function() {
        var state = $(".form-group-pwd").is(":visible");
        $(".form-group-pwd").slideToggle();

        $(".form-group-pwd").find(".form-control").toggleClass("not-valid");
        $(this).closest(".form-group").find("label").toggleClass("fade");
        $(this).text(state ? "Изменить пароль": "Не менять пароль");
        $(this).next().prop("checked", (!state));

        return false;
    });
</script>
