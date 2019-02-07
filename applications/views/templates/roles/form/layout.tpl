{include file="main/title.tpl"}

<link type="text/css" rel="stylesheet" href="min/{$smarty.const.RESOURCE_VERSION}/?g=treetablecss" />
<script src="min/{$smarty.const.RESOURCE_VERSION}/?g=treetablejs"></script>

<div class="container-fluid">

    <form class="form-horizontal form-valid form-control-changes" role="form" method="post">

        <div class="form-group form-group-general {if $ar_errors_form.name}has-error{/if}">
            <label for="role_data_name" class="col-lg-2 col-sm-2 control-label">{L::forms_labels_name}</label>
            <div class="col-lg-5 col-sm-5">
                <input type="text" data-rule-required="true" class="form-control" name="role_data[name]" id="role_data_name" placeholder="{$role_data.name}" value="{$role_data.name}">
            </div>
        </div>

        <div class="form-group">
            <label for="role_data_descr" class="col-sm-2 control-label">{L::forms_labels_descr}</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" name="role_data[descr]" id="role_data_descr">{$role_data.descr}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Ограниченное управление заявками</label>
            <div class="col-sm-10">
                <input id="role_data_limited_setting" data-size="small" data-toggle="toggle" data-on="{L::text_yes}" data-off="{L::text_no}" type="checkbox" {if $role_data.limited_setting}checked{/if} name="role_data[limited_setting]" value="1">
                <div class="help-block">Включите этот режим, если хотите ограничить настройку заявки полями: заголовок, категория и описание. Остальные параметры (участники, статус, приоритет и тд.) будут доступны только для чтения.</div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Проекты только с участием</label>
            <div class="col-sm-10">
                <input id="role_data_project_member" data-size="small" data-toggle="toggle" data-on="{L::text_yes}" data-off="{L::text_no}" type="checkbox" {if $role_data.project_member}checked{/if} name="role_data[project_member]" value="1">
                <div class="help-block">Включите этот режим, если хотите ограничить список проектов условием участия пользователя.</div>
            </div>
        </div>

        <div class="form-group">
            <label {*for="role_data_filter"*} class="col-sm-2 control-label">Фильтр заявок</label>
            <div class="col-sm-10">
                <input id="role_data_filter" data-size="small" data-toggle="toggle" data-on="{L::text_yes}" data-off="{L::text_no}" type="checkbox" {if $role_data.filter}checked{/if} name="role_data[filter]" value="1">
                <div class="help-block">Включите этот режим, если хотите показывать пользователю только заявки с определенными критериями.</div>
            </div>
        </div>
        
        <script>
            $(function() {
                $('#role_data_filter').change(function() {
                    $("#filter_container").slideToggle();
                })
            })
        </script>

        <div id="filter_container" class="well" {if !$role_data.filter}style="display: none;"{/if}>
            {include file="demands/search/general.tpl" data_name="role_data[filter_data]" conditions=$role_data.filter_data}
        </div>

		<legend>
            {L::forms_legends_roles_access}
		</legend>

        <div class="form-group {if $ar_errors_form.crud}has-error{/if}">
            <label for="inputEmail3" class="col-lg-2 col-sm-2 control-label">{L::forms_labels_roles_modules}</label>
            <div class="col-lg-10 col-sm-10">
                {include file="roles/form/table_crud.tpl" ar_destinations=cls_modules::$ar_modules name="module" ar_crud=$crud_module}
            </div>
        </div>

        <div class="form-group {if $ar_errors_form.crud}has-error{/if}">
            <label for="inputEmail3" class="col-lg-2 col-sm-2 control-label">{L::forms_labels_roles_categories}</label>
            <div class="col-lg-10 col-sm-10">
                {include file="roles/form/table_crud.tpl" ar_destinations=$ar_tree_categories name="categories" nested=true ar_crud=$crud_categories}
                {*{include file="roles/form/categories_access.tpl"}*}
            </div>
        </div>

        {include file="helpers/forms/actions.tpl" update=isset($role_data.id)}
    </form>
</div>




{*
<script>
    $(function() {
        $("#table-crud-categories").treetable({
            indent: 34,
            expandable: true,
			expanderTemplate: "<a class='btn btn-sm btn-default' href='#'><i class='fa'></a>"
        });
    });
</script>
*}