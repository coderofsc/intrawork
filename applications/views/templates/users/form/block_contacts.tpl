<div class="form-group">
    <label for="user_data_contact_id" class="col-sm-2 col-xs-3 control-label">{L::modules_contacts_morph_one|mb_ucfirst}</label>
    <div class="col-sm-6 col-xs-9">
        {if $user_data.id}
            <select name="user_data[contact_id]" id="user_data_contact_id" class="form-control selectpicker" data-live-search="true" data-show-subtext="true">
                {include file="helpers/forms/contact_options.tpl" empty=true value=$user_data.contact_id}
            </select>
        {else}
            <div class="input-group">
                <select name="user_data[contact_id]" id="user_data_contact_id" class="form-control selectpicker" data-live-search="true" data-show-subtext="true">
                    {include file="helpers/forms/contact_options.tpl" empty=true value=$user_data.contact_id}
                </select>

            <span class="input-group-addon">
                <input type="checkbox" class="storage-data" name="storage_field[]" value="contact_id" {if in_array("contact_id", $storage_field)}checked=""{/if}>
            </span>
            </div>
        {/if}
    </div>
</div>


<div class="form-group">
    <label for="user_data_phone" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_phone}</label>
    <div class="col-sm-6 col-xs-9">
        <div class="input-group">
            <input type="text" class="form-control mask-phone" name="user_data[phone]" id="user_data_phone" value="{$user_data.phone}">
            <span class="input-group-addon"><i class="fa fa-asterisk" title="{L::forms_labels_phone_ext}"></i></span>
            <input type="text" class="form-control" name="user_data[phone_ext]" id="user_data_phone_ext" value="{$user_data.phone_ext}" placeholder="{L::forms_labels_phone_ext}">
        </div>
    </div>
</div>

<div class="form-group">
    <label for="user_data_phone_mobile" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_phone_mobile}</label>
    <div class="col-sm-6 col-xs-9">
        <input type="text" class="form-control mask-phone" name="user_data[phone_mobile]" id="user_data_phone_mobile" value="{$user_data.phone_mobile}">
    </div>
</div>

<div class="clearfix"></div>

<div class="form-group">
    <label for="user_data_room" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_users_room}</label>
    <div class="col-sm-6 col-xs-9">
        <input type="text" class="form-control" name="user_data[room]" id="user_data_room" value="{$user_data.room}">
    </div>
</div>

<div class="form-group">
    <label for="user_data_icq" class="col-sm-2 col-xs-3 control-label">ICQ</label>
    <div class="col-sm-6 col-xs-9">
        <input type="text" class="form-control" name="user_data[icq]" id="user_data_icq" value="{$user_data.icq}">
    </div>
</div>
<div class="form-group">
    <label for="user_data_skype" class="col-sm-2 col-xs-3 control-label">Skype</label>
    <div class="col-sm-6 col-xs-9">
        <input type="text" class="form-control" name="user_data[skype]" id="user_data_skype" value="{$user_data.skype}">
    </div>
</div>



