{include file="main/title.tpl"}
<div class="container-fluid">
    <form id="massedit-form" class="form-horizontal" method="post" action="demands/massedit/?{$conditions|http_build_query:"cnd"}{if $sort}&{$sort|http_build_query:"sort"}{/if}">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label for="massedit_data_range" class="col-sm-3 control-label">Диапозон</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon">От</span>
                            <input name="massedit_data[range_from]" type="text" class="form-control" value="{$massedit_data.range_from|intval}">
                            <span class="input-group-addon">До</span>
                            <input name="massedit_data[range_to]" type="text" class="form-control" value="{$massedit_data.range_to|intval}">
                        </div>

                    </div>
                </div>

                <hr/>

                <div class="form-group">
                    <label for="massedit_data_demand_type_id" class="col-sm-3 control-label">{L::modules_demands_types_morph_one|mb_ucfirst}</label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-toggle">
                            <span class="input-group-addon">
                                <input type="checkbox">
                            </span>
                            <select disabled name="massedit_data[type_id]" id="massedit_data_demand_type_id" class="form-control selectpicker" data-live-search="true">
                                {include file="helpers/forms/options.tpl" data=$global_ar_demands_types selected=$massedit_data.type_id}
                            </select>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="massedit_data_demand_project_id" class="col-sm-3 control-label">{L::modules_projects_morph_one|mb_ucfirst}</label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-toggle">
                            <span class="input-group-addon">
                                <input type="checkbox">
                            </span>
                            <select disabled name="massedit_data[project_id]" id="massedit_data_demand_project_id" class="form-control selectpicker" data-live-search="true">
                                {include file="helpers/forms/options.tpl" data=$ar_projects empty=true selected=$massedit_data.project_id}
                            </select>
                        </div>
                    </div>
                </div>
                


                <div class="form-group">
                    <label for="massedit_data_demand_eu_eid" class="col-sm-3 control-label">{L::members_executor}</label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-toggle">
                            <span class="input-group-addon">
                                <input type="checkbox">
                            </span>
                            <select disabled name="massedit_data[eu_eid]" class="selectpicker form-control" id="massedit_data_demand_eu_eid">
                                {include file="helpers/forms/options.tpl" empty=true data=$ar_users text="fio" value="eid" selected=$massedit_data.eu_eid group="dprt_name"}
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="massedit_data_demand_ru_eid" class="col-sm-3 control-label">{L::members_responsible}</label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-toggle">
                            <span class="input-group-addon">
                                <input type="checkbox">
                            </span>
                            <select disabled name="massedit_data[ru_eid]" class="selectpicker form-control" id="massedit_data_demand_ru_eid">
                                {include file="helpers/forms/options.tpl" empty=true data=$ar_users text="fio" value="eid" selected=$massedit_data.ru_eid group="dprt_name"}
                            </select>
                        </div>
                    </div>
                </div>
                
                
                <div class="form-group">
                <label for="massedit_data_demand_status" class="col-sm-3 control-label">{L::forms_labels_demands_status}</label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-toggle">
                            <span class="input-group-addon">
                                <input type="checkbox">
                            </span>
                            <select disabled name="massedit_data[status]" class="selectpicker form-control" id="massedit_data_demand_status">
                                {include file="helpers/forms/demand_status.tpl" value=$massedit_data.status}
                            </select>
                            <script>
                                $("#massedit_data_demand_status").find("option[value={m_demands::STATUS_WORK}]").attr("disabled", "disabled");
                            </script>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="massedit_data_demand_criticality" class="col-sm-3 control-label">{L::forms_labels_demands_criticality}</label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-toggle">
                            <span class="input-group-addon">
                                <input type="checkbox">
                            </span>
                            <select disabled name="massedit_data[criticality]" class="selectpicker form-control" id="massedit_data_demand_criticality">
                                {include file="helpers/forms/demand_criticality.tpl" value=$massedit_data.criticality}
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="massedit_data_cat_id" class="col-sm-3 control-label">{L::modules_categories_morph_one|mb_ucfirst}</label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-toggle">
                            <span class="input-group-addon">
                                <input type="checkbox">
                            </span>
                            <select disabled name="massedit_data[cat_id]" id="massedit_data_cat_id" class="form-control selectpicker " data-live-search="true" data-selected-text-format="count>3">
                                {include file="helpers/forms/cat_options.tpl" tree=$cuser_data.ar_access_tree_categories selected=$massedit_data.cat_id crud=true}
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="massedit_data_contact_id" class="col-sm-3 control-label">{L::modules_contacts_morph_one|mb_ucfirst}</label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-toggle">
                            <span class="input-group-addon">
                                <input type="checkbox">
                            </span>
                            <select disabled name="massedit_data[contact_id]" id="massedit_data_contact_id" class="form-control selectpicker " data-live-search="true" data-selected-text-format="count>3">
                                {include file="helpers/forms/contact_options.tpl" empty=true value=$massedit_data.contact_id}
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="massedit_data_mb_id" class="col-sm-3 control-label">{L::modules_mailbots_morph_one|mb_ucfirst}</label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-toggle">
                            <span class="input-group-addon">
                                <input type="checkbox">
                            </span>
                            <select disabled name="massedit_data[mb_id]" id="massedit_data_mb_id" class="form-control selectpicker " data-live-search="true" data-selected-text-format="count>3">
                                <option value="0">Автоматический выбор</option>
                                {include file="helpers/forms/options.tpl" empty=false data=$ar_mb subtext="address" selected=$massedit_data.mb_id}
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <legend>Параметры отбора</legend>

                {if $conditions_decode && $conditions}
                    {foreach from=$conditions_decode item=conditions}
                        <div class="row">
                            <div class="col-sm-5"><span class="nav-label">{$conditions.name}</span></div>
                            <div class="col-sm-6">
                                {if is_array($conditions.decode)}
                                    {foreach from=$conditions.decode item=value }
                                        <span class="nav-label text-ellipsis">{$value}</span>
                                    {/foreach}
                                {else}
                                    <span class="nav-label text-ellipsis">{$conditions.decode}</span>
                                {/if}
                            </div>
                        </div>
                    {/foreach}
                {else}
                    <div class="alert alert-default">
                        <p>Условия отбора не указаны &mdash; выбраны все заявки.</p>
                    </div>
                {/if}

                <a data-toggle="modal" href="demands/search/?{$conditions|http_build_query:"conditions"}" data-remote="demands/search/">Изменить условия отбора</a>

                <div class="space"></div>
                <div class="alert alert-warning clamped-margin-bottom">
                    При большом объеме данных, процедура изменения данных может занять продолжительное время.
                </div>

            </div>
        </div>


        <div class="form-actions form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="form-inline">
                    <div class="form-group">
                        <div class="btn-group">
                            <input type="hidden" name="massedit" value="1"/>
                            <button type="submit" name="massedit" class="btn btn-primary">Внести изменения</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
</div>


<script>
    $(".input-group-toggle .input-group-addon input:checkbox").on("click", function() {
        var $e = $(this).closest(".input-group").find("> select.form-control, > input:text.form-control");

        $e.prop("disabled", !$(this).is(":checked"));

        if ($e.get(0).tagName == "SELECT") {
            $e.selectpicker("refresh");
        }
    });

    $("#massedit-form").on("submit", function() {
        var $form = $(this);
        bootbox.confirm({
            message: "<p><strong class='text-danger'>Будте внимательны!</strong> Перед внесением изменений, пожалуйста, убедитесь в правильности списка заявок, в который вносятся изменения, а также в изменяемые параметры.</p><p>Вы уверены, что хотите внести указанные изменения?</p>",
            title: "Внесение изменений",
            callback: function(r) {
                if (r) {
                    $form.off("submit");
                    $form.submit();
                }
            }
        });

        return false;
    });
</script>