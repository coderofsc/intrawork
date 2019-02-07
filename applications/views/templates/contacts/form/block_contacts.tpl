<div class="form-group">
    <label for="contact_data_email" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_email}</label>
    <div class="col-sm-6 col-xs-9">
        <input type="text" class="form-control" name="contact_data[email]" id="contact_data_email" value="{$contact_data.email}">
    </div>
</div>

<div class="form-group">
    <label for="contact_data_phone" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_phone}</label>
    <div class="col-sm-6 col-xs-9">
        <div class="input-group">
            <input type="text" class="form-control mask-phone" name="contact_data[phone]" id="contact_data_phone" value="{$contact_data.phone}">
            <span class="input-group-addon"><i class="fa fa-asterisk" title="{L::forms_labels_phone_ext}"></i></span>
            <input type="text" class="form-control" name="contact_data[phone_ext]" id="contact_data_phone_ext" value="{$contact_data.phone_ext}" placeholder="{L::forms_labels_phone_ext}">
        </div>

    </div>
</div>

<div class="form-group">
    <label for="contact_data_phone_mobile" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_phone_mobile}</label>
    <div class="col-sm-6 col-xs-9">
        <input type="email" class="form-control mask-phone" name="contact_data[phone_mobile]" id="contact_data_phone_mobile" value="{$contact_data.phone_mobile}">
    </div>
</div>

<div class="clearfix"></div>

<div class="form-group">
    <label for="contact_data_icq" class="col-sm-2 col-xs-3 control-label">ICQ</label>
    <div class="col-sm-6 col-xs-9">
        <input type="email" class="form-control" name="contact_data[icq]" id="contact_data_icq" value="{$contact_data.icq}">
    </div>
</div>

<div class="form-group">
    <label for="contact_data_skype" class="col-sm-2 col-xs-3 control-label">Skype</label>
    <div class="col-sm-6 col-xs-9">
        <input type="email" class="form-control" name="contact_data[skype]" id="contact_data_skype" value="{$contact_data.skype}">
    </div>
</div>

<div class="form-group">
    <label for="contact_data_address" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_fact_address}</label>
    <div class="col-sm-6 col-xs-9">
        <textarea class="form-control" rows="2" name="contact_data[address]" id="contact_data_address">{$contact_data.address}</textarea>
    </div>
</div>



