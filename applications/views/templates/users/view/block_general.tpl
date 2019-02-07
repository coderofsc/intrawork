<div class="form-horizontal form-clamped">
    <div class="form-group">
        <label class="col-sm-5 col-xs-5 control-label">{L::forms_labels_users_network_status}</label>
        <div class="col-xs-7 col-sm-7 ">
            <p class="form-control-static">
                <i class="fa fa-toggle-{if $user_data.inside}on text-success{else}off text-muted{/if}"></i>
                {if !$user_data.inside && $user_data.unix_activity_date}<span class="text-muted"> был {$user_data.unix_activity_date|ts2text}</span>{/if}
            </p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-5 col-xs-5 control-label">{L::forms_labels_phone}</label>
        <div class="col-xs-7 col-sm-7 ">
            <p class="form-control-static">
                {if $user_data.phone || $user_data.phone_mobile}
                    {if $user_data.phone}<span>{$user_data.phone}{if $user_data.phone_ext}*{$user_data.phone_ext}{/if}</span><br/>{/if}
                    {if $user_data.phone_mobile}<span>{$user_data.phone_mobile}</span>{/if}
                {else}
                    <span class="text-muted">{L::text_not_specified}</span>
                {/if}
            </p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-5 col-xs-5 control-label">{L::modules_posts_morph_one|mb_ucfirst}</label>
        <div class="col-xs-7 col-sm-7 ">
            <p class="form-control-static">
                {if $user_data.post_id}
                    {$user_data.post_name}
                {else}
                    <span class="text-muted">{L::text_not_specified}</span>
                {/if}
            </p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-5 col-xs-5 control-label">{L::modules_departments_morph_one|mb_ucfirst}</label>
        <div class="col-xs-7 col-sm-7 ">
            <p class="form-control-static">
                {if $user_data.dprt_id}
                    {$user_data.dprt_name}
                {else}
                    <span class="text-muted">{L::text_not_specified}</span>
                {/if}
            </p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-5 col-xs-5 control-label">{L::modules_roles_morph_one|mb_ucfirst}</label>
        <div class="col-xs-7 col-sm-7 ">
            {if $ar_roles}
                <ul class="list-unstyled">
                    {foreach from=$ar_roles item=role}
                        <li>{$role.name}</li>
                    {/foreach}
                </ul>
            {else}
                <p class="form-control-static"><span class="text-muted">{L::text_not_specified}</span></p>
            {/if}
        </div>
    </div>





    <div class="form-group">
        <label class="col-sm-5 col-xs-5 control-label">{L::forms_labels_email}</label>
        <div class="col-xs-7 col-sm-7 ">
            <p class="form-control-static">
                {if $user_data.email}
                    <a href="mailto:{$user_data.email}">{$user_data.email}</a>
                {else}
                    <span class="text-muted">{L::text_not_specified}</span>
                {/if}
            </p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-5 col-xs-5 control-label">ICQ</label>
        <div class="col-xs-7 col-sm-7 ">
            <p class="form-control-static">
                {if $user_data.icq}
                    {$user_data.icq}
                {else}
                    <span class="text-muted">{L::text_not_specified}</span>
                {/if}
            </p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-5 col-xs-5 control-label">Skype</label>
        <div class="col-xs-7 col-sm-7 ">
            <p class="form-control-static">
                {if $user_data.skype}
                    <a href="skype:{$user_data.skype}">{$user_data.skype}</a>
                {else}
                    <span class="text-muted">{L::text_not_specified}</span>
                {/if}
            </p>
        </div>
    </div>

</div>