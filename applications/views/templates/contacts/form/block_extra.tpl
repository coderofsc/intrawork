<div class="form-group">
    <label for="contact_data_site" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_site}</label>
    <div class="col-sm-6 col-xs-9">
        <input type="text" class="form-control" name="contact_data[site]" id="contact_data_site" value="{$contact_data.site}">
    </div>
</div>

<div class="form-group">
    <label for="contact_data_descr" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_descr}</label>
    <div class="col-sm-10 col-xs-9">
        <textarea class="form-control" rows="7" name="contact_data[descr]" id="contact_data_descr">{$contact_data.descr}</textarea>
    </div>
</div>
