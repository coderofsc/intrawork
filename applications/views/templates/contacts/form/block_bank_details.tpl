<div class="form-group">
    <label for="contact_data_bank_account" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_contacts_bank_account}</label>
    <div class="col-sm-6 col-xs-9">
        <input type="text" data-mask="999-99-999-9999-9" class="form-control" name="contact_data[bank_account]" id="contact_data_bank_account" value="{$contact_data.bank_account}">
    </div>
</div>

<div class="form-group">
    <label for="contact_data_bank_offset_account" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_contacts_bank_offset_account}</label>
    <div class="col-sm-6 col-xs-9">
        <input type="text" class="form-control" name="contact_data[bank_offset_account]" id="contact_data_bank_offset_account" value="{$contact_data.bank_offset_account}">
    </div>
</div>

<div class="clearfix"></div>

<div class="form-group">
    <label for="contact_data_bank_name" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_contacts_bank_name}</label>
    <div class="col-sm-6 col-xs-9">
        <input type="text" class="form-control" name="contact_data[bank_name]" id="contact_data_bank_name" value="{$contact_data.bank_name}">
    </div>
</div>

<div class="form-group">
    <label for="contact_data_bank_inn" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_contacts_bank_inn}</label>
    <div class="col-sm-6 col-xs-9">
        <input type="text" class="form-control" name="contact_data[bank_inn]" id="contact_data_bank_inn" value="{$contact_data.bank_inn}">
    </div>
</div>

<div class="form-group">
    <label for="contact_data_bank_kpp" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_contacts_bank_kpp}</label>
    <div class="col-sm-6 col-xs-9">
        <input type="text" class="form-control" name="contact_data[bank_kpp]" id="contact_data_bank_kpp" value="{$contact_data.bank_kpp}">
    </div>
</div>

<div class="form-group">
    <label for="contact_data_bank_bik" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_contacts_bank_bik}</label>
    <div class="col-sm-6 col-xs-9">
        <input type="text" data-mask="999999999" class="form-control" name="contact_data[bank_bik]" id="contact_data_bank_bik" value="{$contact_data.bank_bik}">
    </div>
</div>

<div class="form-group">
    <label for="contact_data_legal_address" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_contacts_legal_address}</label>
    <div class="col-xs-9 col-sm-6">
        <textarea class="form-control" rows="2" name="contact_data[legal_address]" id="contact_data_legal_address">{$contact_data.legal_address}</textarea>
    </div>
</div>

