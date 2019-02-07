<ul class="nav nav-tabs">
    <li class="active"><a href="#access-modules" data-toggle="tab">{L::tabs_modules}</a></li>
    <li><a href="#access-categories" data-toggle="tab">{L::tabs_categories}</a></li>
</ul>


<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active clamped" id="access-modules">
        {if $crud_module}
            {include file="roles/form/table_crud.tpl" ar_destinations=cls_modules::$ar_modules name="module" readonly=true ar_crud=$crud_module exists=true}
        {else}
            <div class="alert alert-default">Нет доступа к модулям</div>
        {/if}
    </div>
    <div class="tab-pane clamped" id="access-categories">
        {if $crud_categories}
            <link type="text/css" rel="stylesheet" href="min/{$smarty.const.RESOURCE_VERSION}/?g=treetablecss" />
            <script src="min/{$smarty.const.RESOURCE_VERSION}/?g=treetablejs"></script>

            {include file="roles/form/table_crud.tpl" ar_destinations=$ar_tree_categories name="categories" nested=true readonly=true ar_crud=$crud_categories}

            {*
            <button class="btn btn-link" id="btn-table-crud-categories-expand"><i class="fa fa-expand"></i> Развернуть все</button>
            <button class="btn btn-link" id="btn-table-crud-categories-collapse"><i class="fa fa-compress"></i> Свернуть все</button>

            <script>
                $("#table-crud-categories").treetable({
                    indent: 34,
                    expandable: true,
                    expanderTemplate: "<a class='btn btn-sm btn-default' href='#'><i class='fa'></a>"
                });

                $("#btn-table-crud-categories-expand").on("click", function() {
                    $('#table-crud-categories').treetable('expandAll');
                });

                $("#btn-table-crud-categories-collapse").on("click", function() {
                    $('#table-crud-categories').treetable('collapseAll');
                });


            </script>
        *}



        {else}
            <div class="alert alert-default">Нет доступа к категориям</div>
        {/if}
    </div>

</div>

