<form class="form-horizontal"  role="form" method="post" id="pv-form">

    <div class="form-group form-group-general">
        <label for="pv_data_name" class="col-sm-2 col-xs-4 control-label">Название версии</label>
        <div class="col-sm-4 col-xs-6 ">
            <input type="text" class="form-control" name="pv_data[name]" id="pv_data_name" placeholder="{$pv_data.name}" value="{$pv_data.name}">
        </div>
    </div>

    <div class="form-group">
        <label for="pv_data_date" class="col-sm-2 col-xs-4 control-label">{L::forms_labels_date}</label>
        <div class="col-sm-4 col-xs-6">
            <div class="input-group date form_datetime" data-link-field="pv_data_date_lf">
                <input class="form-control" id="pv_data_date" size="16" type="text" value="{$smarty.now|date_format:"%d/%m/%Y %H:%M"}" readonly required="true">
                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                <span class="input-group-addon"><span class="fa fa-times"></span></span>
            </div>
            <input type="hidden" id="pv_data_date_lf" name="pv_data[date]" value="{$smarty.now|date_format:"%Y-%m-%d %H:%M:%S"}" />
        </div>
    </div>

    <div class="form-group">
        <label for="pv_data_descr" class="col-sm-2 col-xs-4 control-label">{L::forms_labels_descr}</label>
        <div class="col-sm-10 col-xs-8">
            <textarea rows="2" class="form-control" name="pv_data[descr]" id="pv_data_descr">{$pv_data.descr}</textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="pv_data_descr" class="col-sm-2 col-xs-4 control-label"></label>
        <div class="col-sm-10 col-xs-8">
            <button type="submit" class="btn btn-success">Добавить</button>
        </div>
    </div>

</form>
