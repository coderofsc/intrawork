<div class="form-horizontal form-clamped">
    <div class="form-group">
        <label class="col-sm-5 col-xs-5 control-label">{L::forms_labels_contacts_legal}</label>
        <div class="col-xs-7 col-sm-7 ">
            <p class="form-control-static">
                {if $contact_data.legal == $smarty.const.LEGAL_PERSON}
                    Юридическое лицо
                {else}
                    Физическое лицо
                {/if}
            </p>
        </div>
    </div>

    {if $contact_data.legal == $smarty.const.LEGAL_PERSON}
        <div class="form-group">
            <label class="col-sm-5 col-xs-5 control-label">{L::forms_legends_spokesman}</label>
            <div class="col-xs-7 col-sm-7 ">
                <p class="form-control-static">
                    {$contact_data.face_full_fio}
                </p>
            </div>
        </div>
    {/if}

    <div class="form-group">
        <label class="col-sm-5 col-xs-5 control-label">{L::forms_labels_phone}</label>
        <div class="col-xs-7 col-sm-7 ">
            <p class="form-control-static">
                {if $contact_data.phone || $contact_data.phone_mobile}
                    {if $contact_data.phone}<span>{$contact_data.phone}{if $contact_data.phone_ext}*{$contact_data.phone_ext}{/if}</span><br/>{/if}
                    {if $contact_data.phone_mobile}<span>{$contact_data.phone_mobile}</span>{/if}
                {else}
                    <span class="text-muted">{L::text_not_specified}</span>
                {/if}
            </p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-5 col-xs-5 control-label">{L::forms_labels_email}</label>
        <div class="col-xs-7 col-sm-7 ">
            <p class="form-control-static">
                {if $contact_data.email}
                    <a href="mailto:{$contact_data.email}">{$contact_data.email}</a>
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
                {if $contact_data.icq}
                    {$contact_data.icq}
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
                {if $contact_data.skype}
                    <a href="skype:{$contact_data.skype}">{$contact_data.skype}</a>
                {else}
                    <span class="text-muted">{L::text_not_specified}</span>
                {/if}
            </p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-5 col-xs-5 control-label">Сайт</label>
        <div class="col-xs-7 col-sm-7 ">
            <p class="form-control-static">
                {if $contact_data.site}
                    <a href="http://{$contact_data.site}">{$contact_data.site}</a>
                {else}
                    <span class="text-muted">{L::text_not_specified}</span>
                {/if}
            </p>
        </div>
    </div>

</div>