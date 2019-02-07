<div class="form-group">
    <label for="demand_data_cu_eid" class="col-sm-4 control-label">{L::members_customer}</label>
    <div class="col-sm-8">
        <p class="form-control-static">
        {if $demand_data.id}
            {if $demand_data.cu_eid}
                <strong>{$demand_data.cu_short_fio}</strong>
            {/if}
            <span class="text-muted">&lt;{$demand_data.cu_email}&gt;</span>
        {else}
            {$cuser_data.short_fio}
        {/if}
        </p>

        {*
        <select name="demand_data[cu_eid]" id="demand_data_cu_eid" class="form-control selectpicker-r" data-live-search="true">
            {include file="helpers/forms/options.tpl" empty=true data=$ar_users text="fio" value="id" selected=$demand_data.cu_eid}
        </select>
        *}
    </div>
</div>

<div class="form-group">
    <label for="demand_data_eu_eid" class="col-sm-4 control-label">{L::members_executor}</label>
    <div class="col-sm-8">

        {if $cuser_data.access_data.limited_setting}
        <p class="form-control-static">
            {if $demand_data.id && $demand_data.eu_eid}
                <strong>{$demand_data.eu_short_fio}</strong>
                <span class="text-muted">&lt;{$demand_data.eu_email}&gt;</span>
            {else}
                <span class="text-muted">{L::text_unknown|mb_ucfirst}</span>
            {/if}
        </p>
        {else}
            <div class="input-group">
                <select name="demand_data[eu_eid]" id="demand_data_eu_eid" class="form-control selectpicker" data-align-right="true" data-live-search="true">
                    {include file="helpers/forms/options.tpl" empty=true data=$ar_users text="fio" value="eid" selected=$demand_data.eu_eid group="dprt_name"}
                </select>
                <span class="input-group-btn">
                    <button class="btn btn-default btn-find-option" data-for="#demand_data_eu_eid" data-value="{$cuser_data.eid}" type="button">Я</button>
                </span>
                {if !$demand_data.id}
                <span class="input-group-addon">
                    <input type="checkbox" class="storage-data" name="storage_field[]" value="eu_eid" {if in_array("eu_eid", $storage_field)}checked=""{/if}>
                </span>
                {/if}
            </div>
        {/if}
        
    </div>
</div>

<div class="form-group">
    <label for="demand_data_ru_eid" class="col-sm-4 control-label">{L::members_responsible}</label>
    <div class="col-sm-8">
        {if $cuser_data.access_data.limited_setting}
            <p class="form-control-static">
                {if $demand_data.id && $demand_data.ru_eid}
                    <strong>{$demand_data.ru_short_fio}</strong>
                    <span class="text-muted">&lt;{$demand_data.ru_email}&gt;</span>
                {else}
                    <span class="text-muted">{L::text_unknown|mb_ucfirst}</span>
                {/if}
            </p>
        {else}
            <div class="input-group">
                <select name="demand_data[ru_eid]" id="demand_data_ru_eid" class="form-control selectpicker" data-align-right="true" data-live-search="true">
                    {include file="helpers/forms/options.tpl" empty=true data=$ar_users text="fio" value="eid" selected=$demand_data.ru_eid group="dprt_name"}
                </select>
                <span class="input-group-btn">
                    <button class="btn btn-default btn-find-option" data-for="#demand_data_ru_eid" data-value="{$cuser_data.eid}" type="button">Я</button>
                </span>
                {if !$demand_data.id}
                <span class="input-group-addon">
                    <input type="checkbox" class="storage-data" name="storage_field[]" value="ru_eid" {if in_array("ru_eid", $storage_field)}checked=""{/if} />
                </span>
                {/if}
            </div>
        {/if}
    </div>
</div>
