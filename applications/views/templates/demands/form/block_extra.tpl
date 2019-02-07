{*<legend class="legend-sm">Заявка</legend>*}

<div class="form-group">
    <label for="demand_data_contact_id" class=" col-sm-4 control-label">{L::modules_contacts_morph_one|mb_ucfirst}</label>
    <div class="col-sm-8">
        {if $demand_data.id}
            <select name="demand_data[contact_id]" id="demand_data_contact_id" class="form-control selectpicker" data-live-search="true" data-show-subtext="true">
                {include file="helpers/forms/contact_options.tpl" empty=true value=$demand_data.contact_id}
            </select>
        {else}
            <div class="input-group">
                <select name="demand_data[contact_id]" id="demand_data_contact_id" class="form-control selectpicker" data-live-search="true" data-show-subtext="true">
                    {include file="helpers/forms/contact_options.tpl" empty=true value=$demand_data.contact_id}
                </select>

            <span class="input-group-addon">
                <input type="checkbox" class="storage-data" name="storage_field[]" value="contact_id" {if in_array("contact_id", $storage_field)}checked=""{/if}>
            </span>
            </div>
        {/if}
    </div>
</div>

<div class="form-group">
    <label for="demand_data_project_id" class=" col-sm-4 control-label">{L::modules_projects_morph_one|mb_ucfirst}</label>
    <div class="col-sm-8">
        {if $demand_data.id}
            <select name="demand_data[project_id]" id="demand_data_project_id" class="form-control selectpicker" data-live-search="true" data-show-subtext="true">
                {include file="helpers/forms/options.tpl" empty=true data=$ar_projects selected=$demand_data.project_id}
            </select>
        {else}
            <div class="input-group">
                <select name="demand_data[project_id]" id="demand_data_project_id" class="form-control selectpicker" data-live-search="true" data-show-subtext="true">
                    {include file="helpers/forms/options.tpl" empty=true data=$ar_projects selected=$demand_data.project_id}
                </select>
                <span class="input-group-addon">
                    <input type="checkbox" class="storage-data" name="storage_field[]" value="project_id" {if in_array("project_id", $storage_field)}checked=""{/if}>
                </span>
            </div>
        {/if}
    </div>
</div>


{if !$demand_data.id}
<div class="form-group">
    <label for="demand_data_title" class=" col-sm-4 control-label">{L::forms_labels_demands_members}</label>
    <div class="col-sm-8">
        <select name="demand_data[members_eid][]" multiple id="demand_data_members_eid" class="form-control selectpicker" data-live-search="true" data-selected-text-format="count">
            {include file="helpers/forms/options.tpl" data=$ar_users text="fio" selected=$demand_data.members_eid value="eid" group="dprt_name"}
        </select>
    </div>
</div>
{/if}



<div class="form-group">
    <label for="demand_data_title" class=" col-sm-4 control-label">{L::modules_mailbots_morph_one|mb_ucfirst}</label>
    <div class="col-sm-8">
        <select name="demand_data[mb_id]" id="demand_data_mb_id" class="form-control selectpicker" data-live-search="true" data-show-subtext="true">
            {if !$demand_data}
                <option value="0">Автоматический выбор</option>
                {assign var="empty" value=false}
            {else}
                {assign var="empty" value=true}
            {/if}
            {include file="helpers/forms/options.tpl" empty=$empty data=$ar_mb subtext="address" selected=$demand_data.mb_id}
        </select>
    </div>
</div>




