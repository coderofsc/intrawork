{include file="main/title.tpl"}

<div class="container-fluid">

    <form class="form-horizontal form-valid form-control-changes" role="form" method="post">

        <div class="form-group form-group-general {if $ar_errors_form.name}has-error{/if}">
            <label for="dprt_data_name" class="col-sm-2 control-label">{L::forms_labels_name}</label>
            <div class="col-sm-5">
                <input type="text" data-rule-required="true" class="form-control" name="dprt_data[name]" id="dprt_data_name" placeholder="{$dprt_data.name}" value="{$dprt_data.name}">
            </div>
        </div>

        <div class="form-group">
            <label for="dprt_data_parent_id" class="col-sm-2 control-label">{L::forms_labels_dprt_parent_id}</label>
            <div class="col-sm-5">
                <select class="form-control selectpicker" name="dprt_data[parent_id]" id="dprt_data_parent_id">
                    {include file="helpers/abstracts/tree_options.tpl" tree=$ar_tree_departments selected=$dprt_data.parent_id empty=true}
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="dprt_data_descr" class="col-sm-2 control-label">{L::forms_labels_descr}</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" name="dprt_data[descr]" id="dprt_data_descr">{$dprt_data.descr}</textarea>
            </div>
        </div>

        {include file="helpers/forms/actions.tpl" update=isset($dprt_data.id)}
    </form>


</div>