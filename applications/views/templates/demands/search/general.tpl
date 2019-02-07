{if !$data_name}
    {assign var="data_name" value="cnd"}
{/if}

{if $filter && $cuser_data.access_data.filter}
    {foreach from=$cuser_data.access_data.filter_data item=fvalue key=fname}
        {assign var="filter_$fname" value=$fvalue}
    {/foreach}
{/if}


<div class="form-group">
    <label for="cnd_text" class="col-sm-2 control-label {if $filter_text}text-warning role-set{/if}">{L::forms_labels_text}</label>
    <div class="col-sm-10">
        <input {if $filter && $cuser_data.access_data.filter && $cuser_data.access_data.filter_data.text}disabled{/if} type="text" id="cnd_text" class="form-control" name="{$data_name}[text]" value="{$conditions.text}">
    </div>
</div>

<div class="form-group">
    <label for="cnd_cat_id" class="col-sm-2 control-label {if $filter_cat_id}text-warning role-set{/if}">{L::modules_categories_morph_one|mb_ucfirst}</label>
    <div class="col-sm-4">
        <select name="{$data_name}[cat_id][]" data-selected-text-format="count" id="cnd_cat_id" multiple class="select-reset form-control selectpicker" data-align-right="true" data-live-search="true">
            {if $filter_cat_id}
                {include file="helpers/forms/cat_options.tpl" tree=$cuser_data.ar_access_tree_categories selected=$conditions.cat_id only=$filter_cat_id}
            {else}
                {include file="helpers/forms/cat_options.tpl" tree=$cuser_data.ar_access_tree_categories selected=$conditions.cat_id}
            {/if}
        </select>
    </div>
    <label for="cnd_demand_type_id" class="col-sm-2 control-label">{L::modules_demands_types_morph_one|mb_ucfirst}</label>
    <div class="col-sm-4">
        <select name="{$data_name}[type_id][]" multiple id="cnd_type_id" class="form-control selectpicker" data-live-search="true">
            {include file="helpers/forms/options.tpl" data=$global_ar_demands_types selected=$conditions.demand_type_id}
        </select>
    </div>
</div>



<div class="form-group">
    <label for="cnd_project_id" class="col-sm-2 control-label {if $filter_project_id}text-warning role-set{/if}">{L::modules_projects_morph_one|mb_ucfirst}</label>
    <div class="col-sm-4">
        <select name="{$data_name}[project_id]" id="cnd_project_id" class="form-control selectpicker" data-live-search="true">
            <option value="0"></option>
            {*{include file="helpers/forms/select_empty_option.tpl" value=$conditions.project_id}*}
            {if $filter_project_id}
                {include file="helpers/forms/options.tpl" data=$ar_projects selected=$conditions.project_id only=$filter_project_id}
            {else}
                {include file="helpers/forms/options.tpl" data=$ar_projects selected=$conditions.project_id}
            {/if}
        </select>
    </div>
    <div id="project_version_id" style="display: none">
        <label for="cnd_demand_version_id" class="col-sm-2 control-label">Версия</label>
        <div class="col-sm-4">
            <select name="{$data_name}[version_id]" id="cnd_version_id" class="form-control selectpicker" data-live-search="true">
            </select>
        </div>
    </div>
</div>

<script>
    var version_id = {$conditions.version_id|intval};
    $("#cnd_project_id").on("change", function() {
        var project_id = $(this).val();

        var $version_select = $("#cnd_version_id");

        $version_select.empty().attr("disabled", "disabled").selectpicker("refresh");

        if (project_id != 0) {
            $.getJSON( "projects/view/"+project_id+"/get_versions/", function( data ) {
                $version_select.append('<option value="0"></option>');
                $.each( data, function( id, item ) {
                    $version_select.append('<option value="'+id+'" '+((version_id==id)?'selected':'')+'>'+item.name+' ('+item.demands_count+')</option>');
                });

                $version_select.removeAttr("disabled").selectpicker("refresh");
            });

            $("#project_version_id").fadeIn();
        } else {
            $("#project_version_id").fadeOut();
        }
    }).change();
</script>



<div class="form-group">
    <label for="cnd_cu_type" class="col-sm-2 control-label {if $filter_cu_type}text-warning role-set{/if}">Тип заказчика</label>
    <div class="col-sm-4">

            <select name="{$data_name}[cu_type]" id="cnd_cu_type" class="form-control selectpicker">
                <option value="0"></option>
                {if $filter_cu_type}
                    {include file="helpers/forms/customer_type.tpl" value=$conditions.cu_type only=$filter_cu_type}
                {else}
                    {include file="helpers/forms/customer_type.tpl" value=$conditions.cu_type}
                {/if}

            </select>

    </div>

    <label for="cnd_mb_id" class="col-sm-2 control-label {if $filter_mb_id}text-warning role-set{/if}">{L::modules_mailbots_morph_one|mb_ucfirst}</label>
    <div class="col-sm-4">
        <select name="{$data_name}[mb_id][]" multiple id="cnd_mb_id" class="form-control selectpicker select-reset" data-live-search="true" data-selected-text-format="count">
            {include file="helpers/forms/select_empty_option.tpl" value=$conditions.mb_id}
            {if $filter_mb_id}
                {include file="helpers/forms/options.tpl" data=$ar_mb selected=$conditions.mb_id only=$filter_mb_id}
            {else}
                {include file="helpers/forms/options.tpl" data=$ar_mb selected=$conditions.mb_id}
            {/if}
        </select>
        
    </div>
</div>



<div class="form-group">
    <label for="cnd_cu_eid" class="col-sm-2 control-label {if $filter_cu_eid}text-warning role-set{/if}">{L::members_customer}</label>
    <div class="col-sm-4">

        <div class="input-group">
            <select name="{$data_name}[cu_eid][]" multiple id="cnd_cu_eid" class="form-control selectpicker select-reset" data-live-search="true" data-selected-text-format="count">
                {if !$filter}
                    <option value="{$smarty.const.SESSION_USER_EID_VALUE}" {if $conditions.cu_eid && in_array($smarty.const.SESSION_USER_EID_VALUE, $conditions.cu_eid)}selected=""{/if}>Пользователь сессии</option>
                    {*<option data-divider="true"></option>*}
                {/if}
                {include file="helpers/forms/select_empty_option.tpl" value=$conditions.cu_eid}
                {if $filter_cu_eid}
                    {include file="helpers/forms/options.tpl" data=$ar_users text="fio" value="eid" selected=$conditions.cu_eid group="dprt_name" only=$filter_cu_eid}
                {else}
                    {include file="helpers/forms/options.tpl" data=$ar_users text="fio" value="eid" selected=$conditions.cu_eid group="dprt_name"}
                {/if}
            </select>
            <span class="input-group-btn">
                <button class="btn btn-default btn-find-option" data-for="#cnd_cu_eid" data-value="{$cuser_data.eid}" type="button">Я</button>
            </span>
        </div>

    </div>
    <label for="cnd_status" class="col-sm-2 control-label {if $filter_status}text-warning role-set{/if}">{L::forms_labels_demands_status}</label>
    <div class="col-sm-4">
        <select name="{$data_name}[status][]" multiple id="cnd_status" class="form-control selectpicker" data-selected-text-format="count">
            {if $filter_status}
                {include file="helpers/forms/demand_status.tpl" value=$conditions.status only=$filter_status}
                {else}
                {include file="helpers/forms/demand_status.tpl" value=$conditions.status}
            {/if}

        </select>
    </div>
</div>
<div class="form-group">
    <label for="cnd_eu_eid" class="col-sm-2 control-label {if $filter_eu_eid}text-warning role-set{/if}">{L::members_executor}</label>
    <div class="col-sm-4">

        <div class="input-group">
            <select name="{$data_name}[eu_eid][]" multiple id="cnd_eu_eid" class="select-reset form-control selectpicker" data-live-search="true" data-selected-text-format="count">
                {if !$filter}
                    <option value="{$smarty.const.SESSION_USER_EID_VALUE}" {if $conditions.eu_eid && in_array($smarty.const.SESSION_USER_EID_VALUE, $conditions.eu_eid)}selected=""{/if}>Пользователь сессии</option>
                    {*<option data-divider="true"></option>*}
                {/if}
                {include file="helpers/forms/select_empty_option.tpl" value=$conditions.eu_eid}
                {if $filter_eu_eid}
                    {include file="helpers/forms/options.tpl" data=$ar_users text="fio" value="eid" selected=$conditions.eu_eid group="dprt_name" only=$filter_eu_eid}
                {else}
                    {include file="helpers/forms/options.tpl" data=$ar_users text="fio" value="eid" selected=$conditions.eu_eid group="dprt_name"}
                {/if}
            </select>
            <span class="input-group-btn">
                <button class="btn btn-default btn-find-option" data-for="#cnd_eu_eid" data-value="{$cuser_data.eid}" type="button">Я</button>
            </span>
        </div>

    </div>
    <label for="cnd_priority" class="col-sm-2 control-label {if $filter_priority}text-warning role-set{/if}">{L::forms_labels_demands_priority}</label>
    <div class="col-sm-4">
        <select name="{$data_name}[priority][]" multiple id="cnd_priority" class="form-control selectpicker" data-selected-text-format="count">
            {if $filter_priority}
                {include file="helpers/forms/demand_priority.tpl" value=$conditions.priority options=true only=$filter_priority}
            {else}
                {include file="helpers/forms/demand_priority.tpl" value=$conditions.priority options=true}
            {/if}
        </select>
    </div>
</div>
<div class="form-group">
    <label for="cnd_ru_eid" class="col-sm-2 control-label {if $filter_ru_eid}text-warning role-set{/if}">{L::members_responsible}</label>
    <div class="col-sm-4">

        <div class="input-group">
            <select name="{$data_name}[ru_eid][]" multiple id="cnd_ru_eid" class="select-reset form-control selectpicker" data-live-search="true" data-selected-text-format="count">
                {if !$filter}
                    <option value="{$smarty.const.SESSION_USER_EID_VALUE}" {if $conditions.ru_eid && in_array($smarty.const.SESSION_USER_EID_VALUE, $conditions.ru_eid)}selected=""{/if}>Пользователь сессии</option>
                    {*<option data-divider="true"></option>*}
                {/if}
                {include file="helpers/forms/select_empty_option.tpl" value=$conditions.ru_eid}
                {if $filter_ru_eid}
                    {include file="helpers/forms/options.tpl" data=$ar_users text="fio" value="eid" selected=$conditions.ru_eid group="dprt_name" only=$filter_ru_eid}
                {else}
                    {include file="helpers/forms/options.tpl" data=$ar_users text="fio" value="eid" selected=$conditions.ru_eid group="dprt_name"}
                {/if}
            </select>
            <span class="input-group-btn">
                <button class="btn btn-default btn-find-option" data-for="#cnd_ru_eid" data-value="{$cuser_data.eid}" type="button">Я</button>
            </span>
        </div>

    </div>
    <label for="cnd_criticality" class="col-sm-2 control-label {if $filter_criticality}text-warning role-set{/if}">{L::forms_labels_demands_criticality}</label>
    <div class="col-sm-4">
        <select name="{$data_name}[criticality][]" multiple id="cnd_criticality" class="form-control selectpicker" data-selected-text-format="count">
            {if $filter_criticality}
                {include file="helpers/forms/demand_criticality.tpl" value=$conditions.criticality only=$filter_criticality}
            {else}
                {include file="helpers/forms/demand_criticality.tpl" value=$conditions.criticality}
            {/if}
        </select>
    </div>
</div>

<div class="form-group">
    <label for="cnd_mu_eid" class="col-sm-2 control-label {if $filter_mu_eid}text-warning role-set{/if}">{L::members_member}</label>
    <div class="col-sm-4">

        <div class="input-group">
            <select name="{$data_name}[mu_eid][]" multiple id="cnd_mu_eid" class="select-reset form-control selectpicker" data-live-search="true" data-selected-text-format="count">
                {if !$filter}
                    <option value="{$smarty.const.SESSION_USER_EID_VALUE}" {if $conditions.mu_eid && in_array($smarty.const.SESSION_USER_EID_VALUE, $conditions.mu_eid)}selected=""{/if}>Пользователь сессии</option>
                    {*<option data-divider="true"></option>*}
                {/if}
                {include file="helpers/forms/select_empty_option.tpl" value=$conditions.mu_eid}
                {if $filter_mu_eid}
                    {include file="helpers/forms/options.tpl" data=$ar_users text="fio" value="eid" selected=$conditions.mu_eid group="dprt_name" only=$filter_mu_eid}
                {else}
                    {include file="helpers/forms/options.tpl" data=$ar_users text="fio" value="eid" selected=$conditions.mu_eid group="dprt_name"}
                {/if}
            </select>
            <span class="input-group-btn">
                <button class="btn btn-default btn-find-option" data-for="#cnd_mu_eid" data-value="{$cuser_data.eid}" type="button">Я</button>
            </span>
        </div>

    </div>
    <label for="cnd_contact_id" class="col-sm-2 control-label {if $filter_contact_id}text-warning role-set{/if}">{L::modules_contacts_morph_one|mb_ucfirst}</label>
    <div class="col-sm-4">
        <select name="{$data_name}[contact_id][]" multiple id="cnd_contact_id" class="select-reset form-control selectpicker" data-align-right="true" data-selected-text-format="count" data-show-subtext="true">
            {include file="helpers/forms/select_empty_option.tpl" value=$conditions.contact_id}
            {if $filter_contact_id}
                {include file="helpers/forms/contact_options.tpl" empty=false value=$conditions.contact_id only=$filter_contact_id}
            {else}
                {include file="helpers/forms/contact_options.tpl" empty=false value=$conditions.contact_id}
            {/if}
        </select>
    </div>
</div>

{if $filter && $cuser_data.access_data.filter}
<script>
    $(document).ready(function() {

        $('label.role-set').each(function() {
            var name = $(this).html();
            $(this).popover({
                content: "Значение установлено фильтром вашей роли и не может быть изменено вне указанных условий",
                title: "Установлен фильтр: "+name,
                trigger: "hover"
            });
        });
    });
</script>
{/if}