<div class="form-horizontal form-clamped">
    <div class="form-group">
        <label class="col-sm-4 col-xs-4 control-label">{L::forms_labels_categories_auto_complete}</label>
        <div class="col-sm-8 col-xs-8">
            <p >{if $dt_data.auto_complete}{$dt_data.auto_complete|ts2hours}{else}Нет{/if}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 col-xs-4 control-label">{L::forms_labels_categories_auto_prolong}</label>
        <div class="col-sm-8 col-xs-8">
            <p >{if $dt_data.auto_prolong}{$dt_data.auto_prolong|ts2hours}{else}Нет{/if}</p>
        </div>
    </div>

    {if $dt_data.descr}
        <div class="form-group">
            <label class="col-sm-4 col-xs-4 control-label">{L::forms_labels_descr}</label>
            <div class="col-sm-8 col-xs-8">
                <p >{$dt_data.descr}</p>
            </div>
        </div>
    {/if}
</div>

<div class="h3">Правила перехода между статусами</div>
<div style="overflow-x: auto">
{include file="../form/transition_statuses_ro.tpl" ts=$dt_data.ts readonly=true}
</div>

<div class="h3">{L::modules_demands_name} этого типа</div>
{include file="demands/list.tpl" ar_demands=$ar_demands module_id=cls_modules::MODULE_DEMANDS denied_delete=true collapsed=true}
