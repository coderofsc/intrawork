{include file="main/title.tpl"}


<div class="container-fluid">

    <form class="form-horizontal form-valid form-control-changes" autocomplete="off" role="form" method="post">

        <div class="form-group form-group-general {if $ar_errors_form.name}has-error{/if}">
            <label for="dt_data_name" class="col-sm-2 control-label">{L::forms_labels_name}</label>
            <div class="col-sm-5">
                <input data-rule-required="true" type="text" class="form-control" name="dt_data[name]" id="dt_data_name" placeholder="{$dt_data.name}" value="{$dt_data.name}">
            </div>
        </div>

        <div class="form-group">
            <label for="dt_data_name" class="col-sm-2 control-label">{L::forms_labels_style}</label>
            <div class="col-sm-10 ct-type-list">
                {foreach from=$ar_type_types item=type}
                    <div class="radio">
                        <label>
                            <input {if ($type@index==0 && !$dt_data.type) || $dt_data.type == $type}checked{/if} type="radio" value="{$type}" name="dt_data[type]">
                            <span class="label {if !$dt_data.name}ct-label-empty{/if} label-{$type}" >{if $dt_data.name}{$dt_data.name}{else}&nbsp;{/if}</span>
                        </label>
                    </div>
                    {if $type@iteration%3==0}
                        <div class="clearfix"></div>
                    {/if}
                {/foreach}
            </div>
        </div>

        <legend>Автоматическое завершение</legend>

        <div class="form-group">
            <label for="dt_data_auto_complete" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_categories_auto_complete}</label>
            <div class="col-sm-10 col-xs-3">
                {if $dt_data.id}
                    <select class="form-control selectpicker" name="dt_data[auto_complete]" id="dt_data_auto_complete" data-width="150px">
                        {include file="./auto_complete_options.tpl" value=$dt_data.auto_complete}
                    </select>
                {else}
                    <div class="input-group" style="width:150px">
                        <select class="form-control selectpicker" name="dt_data[auto_complete]" id="dt_data_auto_complete">
                            {include file="./auto_complete_options.tpl"}
                        </select>
                        <span class="input-group-addon">
                            <input type="checkbox" class="storage-data" name="storage_field[]" value="auto_complete" {if in_array("auto_complete", $storage_field)}checked=""{/if}>
                        </span>
                    </div>
                {/if}

                <div class="help-block">
                    {capture assign="status_complete"}
                        {include file="helpers/forms/demand_status.tpl" monochrome=true value=m_demands::STATUS_COMPLETE read=true}
                    {/capture}
                    {L::forms_help_blocks_categories_auto_complete|sprintf:$status_complete}
                </div>

            </div>
        </div>

        <div id="auto_complete_setup" {if !$dt_data.auto_complete}style="display: none"{/if}>

            <div class="form-group">
                <label for="dt_data_auto_complete_status" class="col-sm-2 col-xs-3 control-label">Только для статуса</label>
                <div class="col-sm-10 col-xs-3">
                    {if $dt_data.id}
                        <select class="form-control selectpicker" name="dt_data[auto_complete_status]" id="dt_data_auto_complete_status" data-width="150px">
                            {include file="helpers/forms/demand_status.tpl" value=$dt_data.auto_complete_status}
                        </select>
                    {else}
                        <div class="input-group" style="width:150px">
                            <select class="form-control selectpicker" name="dt_data[auto_complete_status]" id="dt_data_auto_complete_status">
                                {include file="helpers/forms/demand_status.tpl" value=m_demands::STATUS_PAUSE}
                            </select>
                            <span class="input-group-addon">
                                <input type="checkbox" class="storage-data" name="storage_field[]" value="auto_complete_status" {if in_array("auto_complete_status", $storage_field)}checked=""{/if}>
                            </span>
                        </div>
                    {/if}
                </div>
            </div>

            <div class="form-group">
                <label for="dt_data_auto_complete_notice" class="col-sm-2 col-xs-3 control-label">Оповестить заказчика за</label>
                <div class="col-sm-10 col-xs-3">
                    {if $dt_data.id}
                        <select class="form-control selectpicker" name="dt_data[auto_complete_notice]" id="dt_data_auto_complete_notice" data-width="150px">
                            {include file="./auto_complete_notice_options.tpl" value=$dt_data.auto_complete_notice}
                        </select>
                    {else}
                        <div class="input-group" style="width:150px">
                            <select class="form-control selectpicker" name="dt_data[auto_complete_notice]" id="dt_data_auto_complete_notice">
                                {include file="./auto_complete_notice_options.tpl" value=($smarty.const.TIME_HOUR*6)}
                            </select>
                            <span class="input-group-addon">
                                <input type="checkbox" class="storage-data" name="storage_field[]" value="auto_complete_notice" {if in_array("auto_complete_notice", $storage_field)}checked=""{/if}>
                            </span>
                        </div>
                    {/if}
                </div>
            </div>

        </div>

        <script>
            $("#dt_data_auto_complete").on("change", function() {
                var auto_complete = parseInt($(this).val());

                if (auto_complete > 0) {
                    $("#auto_complete_setup").slideDown();

                    var $auto_complete_notice = $("#dt_data_auto_complete_notice");

                    $auto_complete_notice.find("option").each(function() {

                        if (parseInt($(this).val()) >= auto_complete) {
                            $(this).prop("disabled", true);
                        } else {
                            $(this).prop("disabled", null);
                        }
                    });

                    $auto_complete_notice.find("option:disabled:selected").prop("selected", null).parent().find("option:not(:disabled)").last().prop("selected", true);
                    $auto_complete_notice.selectpicker("refresh");

                } else {
                    $("#auto_complete_setup").slideUp();
                }
            }).change();
        </script>

        <legend>Автоматическое продление</legend>

        <div class="form-group">
            <label for="dt_data_auto_prolong" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_categories_auto_prolong}</label>
            <div class="col-sm-10 col-xs-9">

                {if $dt_data.id}
                    <select class="form-control selectpicker" name="dt_data[auto_prolong]" id="dt_data_auto_prolong" data-width="150px">
                        {include file="./auto_prolong_options.tpl"}
                    </select>
                {else}
                    <div class="input-group" style="width:150px">
                        <select class="form-control selectpicker" name="dt_data[auto_prolong]" id="dt_data_auto_prolong">
                            {include file="./auto_prolong_options.tpl"}
                        </select>
                        <span class="input-group-addon">
                            <input type="checkbox" class="storage-data" name="storage_field[]" value="auto_prolong" {if in_array("auto_prolong", $storage_field)}checked=""{/if}>
                        </span>
                    </div>
                {/if}

                <p class="help-block">
                    {capture assign="status_work"}
                        {include file="helpers/forms/demand_status.tpl" monochrome=true value=m_demands::STATUS_WORK read=true}
                    {/capture}
                    {L::forms_help_blocks_categories_auto_prolong|sprintf:$status_work}
                </p>
            </div>
        </div>

        <legend>Правила перехода между статусами</legend>

        <div class="form-group">
            <label for="dt_data_descr" class="col-sm-2 control-label">Правила перехода между статусами</label>
            <div class="col-sm-10">
                {include file="./transition_statuses.tpl" ts=$dt_data.ts}
                <p class="help-block">
                    Для каждого статуса из списка (по вертикали) надо указать галочками в какие статусы (по горизонтали) из него разрешено переходить.
                </p>
            </div>
        </div>

        <div class="form-group">
            <label for="dt_data_descr" class="col-sm-2 control-label">{L::forms_labels_descr}</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="3" name="dt_data[descr]" id="dt_data_descr">{$dt_data.descr}</textarea>
            </div>
        </div>
        {include file="helpers/forms/actions.tpl" update=isset($dt_data.id)}
    </form>


</div>

{literal}
    <style>
        .ct-label-empty {
            display: inline-block;
            width:50px;
        }

        .ct-type-list .radio {
            padding-bottom:0;
            padding-left:5px;
            float: left;
        }
    </style>
<script>
    $(document).ready(function () {

        $("#dt_data_name").on("keyup", function() {
            var name = $(this).val();
            if (!name.length) {
                $(".ct-type-list .label").addClass("ct-label-empty").html("&nbsp;");
            } else {
                $(".ct-type-list .label").removeClass("ct-label-empty").html(name);
            }
        });

    });
</script>
{/literal}