<div class="form-group form-group-general {if $ar_errors_form.name}has-error{/if}">
    <label for="mb_data_name" class="col-sm-3 control-label">{L::forms_labels_name}</label>
    <div class="col-sm-6">
        <input data-rule-required="true" type="text" class="form-control" name="mb_data[name]" id="mb_data_name" placeholder="{$mb_data.name}" value="{$mb_data.name}">
    </div>
</div>

<div class="form-group">
    <label for="mb_data_status" class="col-sm-3 control-label">{L::forms_labels_mailbots_status}</label>
    <div class="col-sm-6">
        <select name="mb_data[status]" id="mb_data_status" class="form-control selectpicker">
            <option {if !$mb_data.status}selected{/if} value="0" data-icon="fa fa-toggle-off">Выключен</option>
            <option {if !$mb_data || $mb_data.status == 1}selected{/if} value="1" data-icon="fa fa-toggle-on">Включен</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="mb_data_cat_id" class="col-sm-3 control-label">{L::modules_categories_morph_one|mb_ucfirst}</label>
    <div class="col-sm-6">
        <select class="form-control selectpicker" name="mb_data[cat_id]" id="mb_data_parent_id" data-live-search="true">
            {include file="helpers/forms/cat_options.tpl" tree=$cuser_data.ar_access_tree_categories selected=$mb_data.cat_id}
        </select>
        <div class="help-block">{L::forms_help_blocks_mailbots_category}</div>
    </div>
</div>

<div class="form-group">
    <label for="mb_data_demand_type_id" class="col-sm-3 control-label">{L::modules_demands_types_morph_one|mb_ucfirst}</label>
    <div class="col-sm-6">
        <select name="mb_data[demand_type_id]" id="mb_data_type_id" class="form-control selectpicker" data-live-search="true">
            {include file="helpers/forms/options.tpl" data=$global_ar_demands_types selected=$mb_data.demand_type_id}
        </select>
        <div class="help-block">Заявкам, собранным с данного почтового ящика, будут присвоен указанный тип</div>
    </div>
</div>


<div class="form-group">
    <label for="mb_data_confirm" class="col-sm-3 control-label clamped-padding-top">{L::forms_labels_mailbots_confirm}</label>
    <div class="col-sm-8">
        <input data-size="small" data-toggle="toggle" data-on="{L::text_yes}" data-off="{L::text_no}" type="checkbox" {if !$mb_data.id || $mb_data.confirm}checked{/if} name="mb_data[confirm]" id="mb_data_confirm" value="1">
        <div class="help-block">{L::forms_help_blocks_mailbots_confirm}</div>
    </div>
</div>

<div class="form-group">
    <label for="mb_data_from_unknown" class="col-sm-3 control-label">{L::forms_labels_mailbots_from_unknown}</label>
    <div class="col-sm-8">
        <input data-size="small" data-toggle="toggle" data-on="{L::text_yes}" data-off="{L::text_no}" {if !$config->limit->accept_mail_from_unknow_users}disabled{/if} type="checkbox" {if (!$mb_data.id || $mb_data.from_unknown) && $config->limit->accept_mail_from_unknow_users}checked{/if} name="mb_data[from_unknown]" id="mb_data_from_unknown" value="1">
        {if !$config->limit->accept_mail_from_unknow_users}
            <div class="help-block text-danger">{L::forms_help_blocks_mailbots_from_unknown_prohibit}</div>
        {else}
            <div class="help-block">{L::forms_help_blocks_mailbots_from_unknown}</div>
        {/if}
    </div>
</div>

<div class="form-group">
    <label for="mb_data_footer" class="col-sm-3 control-label">Подвал в письмах</label>
    <div class="col-sm-8">
        <input data-size="small" data-toggle="toggle" data-on="{L::text_yes}" data-off="{L::text_no}" {if !$config->limit->accept_mail_from_unknow_users}disabled{/if} type="checkbox" {if !$mb_data.id || $mb_data.footer}checked{/if} name="mb_data[footer]" id="mb_data_footer" value="1">
        <div class="help-block">Отображать информационный блок Интраворка внизу шаблона писем</div>
    </div>
</div>

<div class="form-group">
    <label for="mb_data_descr" class="col-sm-3 control-label">{L::forms_labels_descr}</label>
    <div class="col-sm-9">
        <textarea class="form-control" rows="2" name="mb_data[descr]" id="mb_data_descr">{$mb_data.descr}</textarea>
    </div>
</div>
