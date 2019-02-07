{include file="main/title.tpl"}

<div class="container-fluid{* pane-content*}">

    <form class="form-horizontal form-valid form-control-changes" method="post" role="form" action="{$current_url_path}" id="demand-tuning-form" autocomplete="off">

        {if $demand_data.id}
            <div class="row">
                <div class="col-sm-12">
                    {include file="demands/form/block_general.tpl"}
                </div>
            </div>


            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    {if $cuser_data.access_data.limited_setting}
                        <legend class="legend-sm">{L::forms_legends_demands_members}</legend>
                        {include file="demands/form/block_members.tpl"}
                    {else}
                    <div class="row">
                        <div class="col-sm-offset-4 col-sm-8">
                            <ul class="nav nav-tabs col">
                                <li class="active"><a href="#members" data-toggle="tab">{L::tabs_members}</a></li>
                                <li><a href="#extra" data-toggle="tab">{L::tabs_extra}</a></li>
                            </ul>
                        </div>
                    </div>

                        <div class="tab-content">
                            <div class="tab-pane clamped active" id="members">
                                {include file="demands/form/block_members.tpl"}
                            </div>
                            <div class="tab-pane clamped" id="extra">
                                {include file="demands/form/block_extra.tpl"}
                            </div>
                        </div>

                    {/if}

                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <legend class="legend-sm">{L::forms_legends_demands_statuses}</legend>
                    {include file="demands/form/block_statuses.tpl"}
                </div>
            </div>
        {else}
            <div class="row">
                <div class="col-md-7 col-sm-6 col-xs-12">
                    {if !$cuser_data.access_data.limited_setting}
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#general" data-toggle="tab">{L::tabs_general}</a></li>
                        <li><a href="#checklist" data-toggle="tab">Чек-лист</a></li>
                        {*<li><a href="#attached" data-toggle="tab">{L::tabs_files}</a></li>*}
                        <li><a href="#extra" data-toggle="tab">{L::tabs_extra}</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane clamped active" id="general">
                            {include file="demands/form/block_general.tpl"}
                            {include file="demands/form/block_message.tpl"}
                            {include file="demands/form/block_attached.tpl"}
                        </div>
                        <div class="tab-pane clamped" id="checklist">
                            {include file="demands/form/block_checklist.tpl"}
                        </div>
                        {*<div class="tab-pane" id="attached">
                            {include file="demands/form/block_attached.tpl"}
                        </div>*}
                        <div class="tab-pane clamped" id="extra">
                            {include file="demands/form/block_extra.tpl"}
                        </div>
                    </div>
                    {else}
                        {include file="demands/form/block_general.tpl"}
                        {include file="demands/form/block_message.tpl"}
                        {include file="demands/form/block_attached.tpl"}
                    {/if}
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12 {if $cuser_data.access_data.limited_setting}form-clamped{/if}">
                    {include file="demands/form/block_time.tpl"}
                    <legend class="legend-sm">{L::forms_legends_demands_members}</legend>
                    {include file="demands/form/block_members.tpl"}
                    <legend class="legend-sm">{L::forms_legends_demands_statuses}</legend>
                    {include file="demands/form/block_statuses.tpl"}
                    {if $cuser_data.access_data.limited_setting}
                        <div class="space space-sm"></div>
                        <div class="alert alert-default">
                            Все необходимые настройки установит специалист при обработке заявки.
                        </div>
                    {/if}
                </div>
            </div>
        {/if}

        {if $smarty.const.RENDER_MODE == $smarty.const.RENDER_MODAL}
            {include file="helpers/forms/actions.tpl" update=isset($demand_data.id) next=false}
            <input type="hidden" name="next_redirect"  value="{$smarty.const.FORM_NA_VIEW}" />
        {else}
            {include file="helpers/forms/actions.tpl" update=isset($demand_data.id)}
        {/if}


    </form>
</div>

{if !$cuser_data.access_data.limited_setting}
<script>
    $("#demand_data_cat_id").on("change", function() {
        var cat_id = $(this).val();
        var $eu_o = $("#demand_data_eu_eid");

        $eu_o.attr("disabled", "disabled").selectpicker("refresh");
        $.ajax({
            url: 'categories/view/'+cat_id+'/get_users/',
            dataType: 'json',
            success: function(response) {

                $eu_o.find("option[value!=0]").attr("disabled", "disabled");

                $(response.data).each(function(i, eid) {
                    $eu_o.find("option[value="+eid+"]").removeAttr("disabled");
                });

                $eu_o.removeAttr("disabled").selectpicker("refresh");

                $eu_o.change();

            }
        });
    });

    $("#demand_data_eu_eid").on("change", function() {
        var value = $(this).val();
        var $o_status = $("#demand_data_status");

        var ar_control_status = [{m_demands::STATUS_WORK},{m_demands::STATUS_COMPLETE},{m_demands::STATUS_PAUSE}];

        if (value != 0 && !$(this).find("option:selected").is(":disabled")) {
            $(ar_control_status).each(function(i,status) {
                $o_status.find("option[value="+status+"]").removeAttr("disabled");
            });
        } else {
            $(ar_control_status).each(function(i,status) {
                $o_status.find("option[value="+status+"]").attr("disabled", "disabled");
            });
        }

        $o_status.change();

        if ($(this).find("option:selected").is(":disabled")) {
            $(this).selectpicker('setStyle', 'btn-danger');
        } else {
            $(this).selectpicker('setStyle', 'btn-danger', 'remove');
        }

        $(this).selectpicker("refresh");

    });

    $("#demand_data_status").on("change", function() {

        if ($(this).find("option:selected").is(":disabled")) {
            $(this).selectpicker('setStyle', 'btn-danger');
        } else {
            $(this).selectpicker('setStyle', 'btn-danger', 'remove');
        }

        $(this).selectpicker("refresh");
    });


    $(document).ready(function() {
        $('body').on('init.core', function() {
            $("#demand_data_cat_id").change();
        });
    });


</script>
{/if}