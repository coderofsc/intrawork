{include file="main/title.tpl"}

<div class="container-fluid">

    <form class="form-horizontal form-valid form-control-changes" role="form" method="post">

        <div class="form-group form-group-general {if $ar_errors_form.name}has-error{/if}" >
            <label for="cat_data_name" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_name}</label>
            <div class="col-sm-5 col-xs-9">
                <input data-rule-required="true" type="text" class="form-control" name="cat_data[name]" id="cat_data_name" placeholder="{$cat_data.name}" value="{$cat_data.name}">
            </div>
        </div>


        <div class="form-group {if $ar_errors_form.icon}has-error{/if}">
            <label for="cat_data_icon" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_categories_icon}</label>
            <div class="col-sm-3 col-xs-4">
                <input type="hidden" name="cat_data[icon]" id="cat_data_icon" value="{$cat_data.icon}">
                <button id="cat_data_icon_btn" data-placement="right" data-arrow-prev-icon-class="fa fa-chevron-left" data-arrow-next-icon-class="fa fa-chevron-right" {literal}data-label-header="{0} - {1} стр." data-label-footer="{0} - {1} из {2} иконок"{/literal} data-search="true" data-search-text="Поиск..." class="btn btn-default" data-iconset="fontawesome" data-icon="{$cat_data.icon}" role="iconpicker"></button>
            </div>
        </div>

        {*
        <div class="form-group {if $ar_errors_form.bgcolor}has-error{/if}">
            <label for="cat_data_bgcolor" class="col-sm-2 col-xs-3 control-label">Цвет</label>
            <div class="col-sm-3 col-xs-4">
                <div class="input-group colorselect">
                    <input type="text" value="{if $cat_data.bgcolor}{$cat_data.bgcolor}{else}{$rand_color}{/if}" class="form-control" name="cat_data[bgcolor]" id="cat_data_bgcolor"/>
                    <span class="input-group-addon"><i></i></span>
                </div>
            </div>
        </div>
        *}

        <div class="form-group">
            <label for="cat_data_parent_id" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_categories_parent_id}</label>
            <div class="col-sm-5 col-xs-9">
                {if $cat_data.id}
                    <select class="form-control selectpicker" name="cat_data[parent_id]" id="cat_data_parent_id" data-live-search="true">
                        {include file="helpers/forms/cat_options.tpl" tree=$ar_tree_categories selected=$cat_data.parent_id root=true}
                    </select>
                {else}
                    <div class="input-group">
                        <select class="form-control selectpicker" name="cat_data[parent_id]" id="cat_data_parent_id" data-live-search="true">
                            {include file="helpers/forms/cat_options.tpl" tree=$ar_tree_categories selected=$cat_data.parent_id root=true}
                        </select>
                        <span class="input-group-addon">
                            <input type="checkbox" class="storage-data" name="storage_field[]" value="parent_id" {if in_array("parent_id", $storage_field)}checked=""{/if}>
                        </span>
                    </div>
                {/if}

            </div>
        </div>


        <div class="form-group">
            <label for="cat_data_descr" class="col-sm-2 col-xs-3 control-label">{L::forms_labels_descr}</label>
            <div class="col-sm-10 col-xs-9">
                <textarea class="form-control" rows="5" name="cat_data[descr]" id="cat_data_descr">{$cat_data.descr}</textarea>
            </div>
        </div>

        <legend>{L::forms_labels_categories_access_role}</legend>

        <div class="form-group">
            <label class="col-sm-2 col-xs-3 control-label">{L::forms_labels_categories_access_role}</label>
            <div class="col-sm-10 col-xs-9">
                {include file="roles/form/table_crud.tpl" ar_destinations=$ar_roles name="roles" ar_crud=$ar_crud_category}
            </div>
        </div>

        {include file="helpers/forms/actions.tpl" update=isset($cat_data.id)}
    </form>


</div>

<link rel="stylesheet" href="resources/bootstrap/iconpicker/css/bootstrap-iconpicker.min.css"/>
<script type="text/javascript" src="resources/bootstrap/iconpicker/js/iconset/iconset-fontawesome-4.2.0.min.js"></script>
<script type="text/javascript" src="resources/bootstrap/iconpicker/js/bootstrap-iconpicker.min.js"></script>


<script>
    $('#cat_data_icon_btn').on('change', function(e) {
        $("#cat_data_icon").val(e.icon);
    });
</script>



{*
<link type="text/css" rel="stylesheet" href="resources/bootstrap/iconpicker/css/fontawesome-iconpicker.min.css"/>
<script type="text/javascript" src="resources/bootstrap/iconpicker/js/fontawesome-iconpicker.min.js"></script>

<script type="text/javascript">
    $('.icp-dd').iconpicker({
        fullClassFormatter: function(val) {
            return 'fa-fw fa ' + val;
        }
    }).on("iconpickerSelected", function(e) {
        $("#cat_data_icon").val(e.iconpickerValue);
        //e.iconpickerInstance;
    });
</script>
*}




















