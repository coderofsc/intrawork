<legend class="legend-sm">{L::forms_legends_demands_time}</legend>
<div class="form-group">
    <label for="demand_data_required_time" class="col-sm-4 control-label">{L::forms_labels_demands_required_time}</label>
    <div class="col-sm-8">
        {include file="demands/form/hours_picker.tpl"}
    </div>
</div>

{if !$cuser_data.access_data.limited_setting}
<div class="form-group">
    <label for="demand_data_deadline_date" class="col-sm-4 control-label">Дедлайн</label>
    <div class="col-sm-8">
        <div class="input-group date form_date start_date" data-position="bottom" data-link-field="demand_data_deadline_date_lf">
            <input class="form-control" id="demand_data_deadline_date" size="16" type="text" value="{$demand_data.deadline_date|date_format:"%d/%m/%Y"}" readonly>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
            <span class="input-group-addon"><span class="fa fa-times"></span></span>
        </div>
        <input type="hidden" id="demand_data_deadline_date_lf" name="demand_data[deadline_date]" value="{$demand_data.deadline_date|date_format:"%Y-%m-%d"}" />
    </div>
</div>

<div class="form-group">
    <label for="demand_data_percent_complete" class="col-sm-4 control-label">Выполнено</label>
    <div class="col-sm-8">
        <p class="form-control-static">0%</p>
        {*<select name="demand_data[percent_complete]" class="form-control selectpicker">
            {section name=percent start=0 loop=110 step=10}
                <option {if $demand_data.percent_complete == $smarty.section.percent.index}selected=""{/if} value="{$smarty.section.percent.index}">{$smarty.section.percent.index}%</option>
            {/section}
        </select>*}
    </div>
</div>
{/if}

