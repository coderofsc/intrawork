<div class="container-fluid">
    <form class="form-horizontal form-valid" role="form" method="post" id="mroom_reservations_form" action="mrooms/reservations/{if $mrr_data.id}edit/{$mrr_data.id}{else}create{/if}/">

        <div class="form-group form-group-general {if $ar_errors_form.mroom_id}has-error{/if}">
            <label for="mrr_data_mroom_id" class="col-sm-2 col-xs-3 control-label">{L::modules_mrooms_morph_one|mb_ucfirst}</label>
            <div class="col-sm-7 col-xs-9">
                <select data-rule-required="true" data-rule-min="1" class="form-control selectpicker" name="mrr_data[mroom_id]" id="mrr_data_mroom_id" >
                    <option value=""></option>
                    {foreach from=$ar_mrooms item=mroom}
                        <option data-content="<div style='height:16px; width:16px; display:inline-block; background-color: {$mroom.bgcolor}'></div> {$mroom.name}" {if $mrr_data.mroom_id == $mroom.id}selected=""{/if} value="{$mroom.id}">{$mroom.name}</option>
                    {/foreach}
                </select>
            </div>
        </div>

        <div class="form-group {if $ar_errors_form.start}has-error{/if}">
            <label for="mrr_data_start" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_mroomsres_start}</label>
            <div class="col-sm-5 col-xs-7">
                <div class="input-group date form_datetime start_datetime" data-link-field="mrr_data_start_lf">
                    <input data-rule-required="true" class="form-control" id="mrr_data_start" size="16" type="text" value="{$mrr_data.start|date_format:"%d/%m/%Y %H:%M"}" readonly >
                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                    <span class="input-group-addon"><span class="fa fa-times"></span></span>
                </div>
                <input type="hidden" id="mrr_data_start_lf" name="mrr_data[start]" value="{$mrr_data.start|date_format:"%Y-%m-%d %H:%M"}" />
            </div>
        </div>
        <div class="form-group {if $ar_errors_form.end}has-error{/if}">
            <label for="mrr_data_end" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_mroomsres_end}</label>
            <div class="col-sm-5 col-xs-7">
                <div class="input-group date form_datetime end_datetime" {*data-date="1979-09-16T05:25:07Z"*} {*data-date-format="dd MM yyyy - HH:ii p"*} data-link-field="mrr_data_end_lf">
                    <input data-rule-required="true" class="form-control" size="16" id="mrr_data_end" type="text" value="{$mrr_data.end|date_format:"%d/%m/%Y %H:%M"}" readonly >
                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                    <span class="input-group-addon"><span class="fa fa-times"></span></span>
                </div>
                <input type="hidden" id="mrr_data_end_lf" name="mrr_data[end]" value="{$mrr_data.end|date_format:"%Y-%m-%d %H:%M"}" />
            </div>
        </div>

        <div class="form-group">
            <label for="mrr_data_descr" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_descr}</label>
            <div class="col-sm-10 col-xs-9">
                <textarea class="form-control" rows="5" name="mrr_data[descr]" id="mrr_data_descr">{$mrr_data.descr}</textarea>
            </div>
        </div>

        {include file="helpers/forms/actions.tpl" update=isset($mrr_data.id)}
    </form>
</div>

<script>
    $("#mroom_reservations_form").find("select[name='mrr_data[mroom_id]']").on('change', function() {
        current_mroom_id = $(this).val();
        $("#reservations-calendar").fullCalendar('refetchEvents');
    });
</script>
