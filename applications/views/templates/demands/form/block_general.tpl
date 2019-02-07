{*<legend class="legend-sm">Заявка</legend>*}

{if $demand_data.id}
    <div class="form-group form-group-general">
        <label for="demand_data_title" class=" col-sm-2 control-label">{L::forms_labels_title}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" data-rule-required="true" name="demand_data[title]" id="demand_data_title" value="{$demand_data.title}">
        </div>
    </div>

    <div class="form-group">
        <label for="demand_data_cat_id" class="col-sm-2 control-label">{L::modules_categories_morph_one|mb_ucfirst}</label>
        <div class="col-sm-4">
            <select name="demand_data[cat_id]" id="demand_data_cat_id" class="form-control selectpicker" data-live-search="true" data-header="Выберите категорию заявки">
                {include file="helpers/forms/cat_options.tpl" tree=$cuser_data.ar_access_tree_categories selected=$demand_data.cat_id crud=true}
            </select>
        </div>
        <label for="demand_data_type_id" class="col-sm-2 control-label">{L::modules_demands_types_morph_one|mb_ucfirst}</label>
        <div class="col-sm-4">
            <select name="demand_data[type_id]" id="demand_data_type_id" class="form-control selectpicker" data-live-search="true" data-header="Выберите тип заявки">
                {include file="helpers/forms/options.tpl" data=$global_ar_demands_types selected=$demand_data.type_id}
            </select>
        </div>

    </div>
    <div class="form-group">
        <label for="demand_data_required_time" class="col-sm-2 control-label">{L::forms_labels_demands_required_time}</label>
        <div class="col-sm-4">
            {include file="demands/form/hours_picker.tpl"}
        </div>
        <label for="demand_data_deadline_date" class="col-sm-2 control-label">Дедлайн</label>
        <div class="col-sm-4">
            <div class="input-group date form_date start_date" data-link-field="demand_data_deadline_date_lf">
                <input class="form-control" id="demand_data_deadline_date" size="16" type="text" value="{$demand_data.deadline_date|date_format:"%d/%m/%Y"}" readonly>
                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                <span class="input-group-addon"><span class="fa fa-times"></span></span>
            </div>
            <input type="hidden" id="demand_data_deadline_date_lf" name="demand_data[deadline_date]" value="{$demand_data.deadline_date|date_format:"%Y-%m-%d"}" />
        </div>
    </div>

    <div class="form-group">
        <label for="demand_data_percent_complete" class="col-sm-2 control-label">Выполнено</label>
        <div class="col-sm-4">

            <div class="input-group">
                <select id="demand_data_percent_complete" name="demand_data[percent_complete]" class="form-control selectpicker">
                    {section name=percent start=0 loop=110 step=10}
                        <option {if $demand_data.percent_complete == $smarty.section.percent.index}selected=""{/if} value="{$smarty.section.percent.index}">{$smarty.section.percent.index}%</option>
                    {/section}
                </select>
                <span class="input-group-btn">
                    <button class="btn btn-default btn-find-option" data-for="#demand_data_percent_complete" data-value="30" type="button">30%</button>
                </span>
                <span class="input-group-btn">
                    <button class="btn btn-default btn-find-option" data-for="#demand_data_percent_complete" data-value="70" type="button">70%</button>
                </span>
                <span class="input-group-btn">
                    <button class="btn btn-default btn-find-option" data-for="#demand_data_percent_complete" data-value="100" type="button">100%</button>
                </span>
            </div>

            {*
            <select name="demand_data[percent_complete]" class="form-control selectpicker">
                {section name=percent start=0 loop=110 step=10}
                    <option {if $demand_data.percent_complete == $smarty.section.percent.index}selected=""{/if} value="{$smarty.section.percent.index}">{$smarty.section.percent.index}%</option>
                {/section}
            </select>
            *}
        </div>
    </div>

{else}
    <div class="form-group form-group-general">
        {*<label for="demand_data_title" class=" col-sm-2 control-label">{L::forms_labels_title}</label>*}
        <div class="col-sm-12">
            <input type="text" placeholder="{L::forms_labels_title}" class="form-control" data-rule-required="true" name="demand_data[title]" id="demand_data_title" value="{$demand_data.title}">
        </div>
    </div>

    <div class="form-group">
        {*<label for="demand_data_cat_id" class="col-sm-2 control-label">{L::modules_categories_morph_one|mb_ucfirst}</label>*}
        <div class="col-sm-12">
            <div class="input-group">
                <select name="demand_data[cat_id]" id="demand_data_cat_id" class="form-control selectpicker" data-live-search="true" data-header="Выберите категорию заявки">
                    {include file="helpers/forms/cat_options.tpl" tree=$cuser_data.ar_access_tree_categories selected=$demand_data.cat_id crud=true}
                </select>
                <span class="input-group-addon">
                    <input type="checkbox" class="storage-data" name="storage_field[]" value="cat_id" {if in_array("cat_id", $storage_field)}checked=""{/if}>
                </span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            <div class="input-group">
                <select name="demand_data[type_id]" id="demand_data_type_id" class="form-control selectpicker" data-live-search="true" data-header="Выберите тип заявки">
                    {include file="helpers/forms/options.tpl" data=$global_ar_demands_types selected=$demand_data.type_id}
                </select>
                <span class="input-group-addon">
                    <input type="checkbox" class="storage-data" name="storage_field[]" value="type_id" {if in_array("type_id", $storage_field)}checked=""{/if} />
                </span>
            </div>
        </div>
    </div>
    
{/if}
