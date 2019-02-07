{if !$data_name}
    {assign var="data_name" value="cnd"}
{/if}

<div class="form-group">
    <label for="cnd_create_date_start" class="col-sm-2 control-label">{L::forms_labels_create_start}</label>
    <div class="col-sm-4">
        <div class="input-group date form_date start_date" data-link-field="cnd_create_date_start_lf">
            <span class="input-group-addon">От</span>
            <input class="form-control" id="cnd_create_date_start" size="16" type="text" value="{$conditions.create_date_start|date_format:"%d/%m/%Y"}" readonly required="true">
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
            <span class="input-group-addon"><span class="fa fa-times"></span></span>
        </div>
        <input type="hidden" id="cnd_create_date_start_lf" name="{$data_name}[create_date_start]" value="{$conditions.create_date_start|date_format:"%Y-%m-%d"}" />

    </div>
    <label for="inputEmail3" class="col-sm-2 control-label">{L::forms_labels_create_end}</label>
    <div class="col-sm-4">
        <div class="input-group date form_date end_date" data-link-field="cnd_create_date_end_lf">
            <span class="input-group-addon">До</span>
            <input class="form-control" size="16" id="cnd_create_date_end" type="text" value="{$conditions.create_date_end|date_format:"%d/%m/%Y"}" readonly required="true">
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
            <span class="input-group-addon"><span class="fa fa-times"></span></span>
        </div>
        <input type="hidden" id="cnd_create_date_end_lf" name="{$data_name}[create_date_end]" value="{$conditions.create_date_end|date_format:"%Y-%m-%d"}" />
    </div>

</div>
