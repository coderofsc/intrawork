<div class="form-group">
    <label for="demand_data_status" class="col-sm-4 control-label">{L::forms_labels_demands_status}</label>
    <div class="col-sm-8">

        {if $demand_data.id}
            {if $cuser_data.access_data.limited_setting}
                <p class="form-control-static">
                    {include file="helpers/forms/demand_status.tpl" value=$demand_data.status read=true}
                </p>
            {else}
                <select name="demand_data[status]" id="demand_data_status" class="form-control selectpicker">
                    {include file="helpers/forms/demand_status.tpl" value=$demand_data.status}
                </select>
            {/if}
        {else}
            <p class="form-control-static">
                {include file="helpers/forms/demand_status.tpl" value=m_demands::STATUS_NEW read=true}
            </p>
        {/if}
    </div>
</div>

<div class="form-group">
    <label for="demand_data_priority" class="col-sm-4 control-label">{L::forms_labels_demands_priority}</label>
    <div class="col-sm-8">
        {if $cuser_data.access_data.limited_setting}
            <p class="form-control-static">
                {if $demand_data.id}
                    {include file="helpers/forms/demand_priority.tpl" value=intval($demand_data.priority) read=true}
                {else}
                    {include file="helpers/forms/demand_priority.tpl" value=100 read=true}
                {/if}
            </p>
        {elseif !$demand_data.id}
            <div class="input-group">
                <div class="form-control">
                    {include file="helpers/forms/demand_priority.tpl" value=$demand_data.priority}
                </div>
                <span class="input-group-addon">
                    <input type="checkbox" class="storage-data" name="storage_field[]" value="priority" {if in_array("priority", $storage_field)}checked=""{/if}>
                </span>
            </div>
        {else}
            {include file="helpers/forms/demand_priority.tpl" value=$demand_data.priority}
        {/if}
    </div>

</div>
<div class="form-group">
    <label for="demand_data_criticality" class="col-sm-4 control-label">{L::forms_labels_demands_criticality}</label>
    <div class="col-sm-8">

        {if $cuser_data.access_data.limited_setting}
            <p class="form-control-static">
                {if $demand_data.id}
                    {include file="helpers/forms/demand_criticality.tpl" value=intval($demand_data.criticality) read=true}
                {else}
                    {include file="helpers/forms/demand_criticality.tpl" value=m_demands::CRITICALITY_LOW read=true}
                {/if}
            </p>
        {elseif $demand_data.id}
            <select name="demand_data[criticality]" id="demand_data_criticality" class="form-control selectpicker">
                {include file="helpers/forms/demand_criticality.tpl" value=$demand_data.criticality}
            </select>
        {else}
            <div class="input-group">
                <select name="demand_data[criticality]" id="demand_data_criticality" class="form-control selectpicker">
                    {include file="helpers/forms/demand_criticality.tpl" value=$demand_data.criticality}
                </select>
                <span class="input-group-addon">
                    <input type="checkbox" class="storage-data" name="storage_field[]" value="criticality" {if in_array("criticality", $storage_field)}checked=""{/if}>
                </span>
            </div>
        {/if}

    </div>
</div>

