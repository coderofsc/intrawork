{if $ar_destinations}
<table class="table table-hover table-sticky-head table-crud" id="table-crud{if $name}-{$name}{/if}">
    <colgroup>
        <col width="*" />
        {if !$hide_read}<col width="10%" />{/if}
        {if !$readonly}<col width="10%" />{/if}
        <col width="10%" />
        <col width="10%" />
        <col width="10%" />
    </colgroup>

    <thead>
    <tr>
        <th>
            {if $name == "module"}Модуль
            {elseif $name == "categories"}{L::modules_categories_morph_one|mb_ucfirst}
            {elseif $name == "roles"}{L::modules_roles_morph_one|mb_ucfirst}
            {else}{$name}
            {/if}
        </th>
        {if !$readonly}<th class="text-center">Все</th>{/if}
        {if !$hide_read}<th class="text-center">{L::crud_read}</th>{/if}
        <th class="text-center">{L::crud_update}</th>
        <th class="text-center">{L::crud_create}</th>
        <th class="text-center">{L::crud_delete}</th>
    </tr>
    </thead>
    <tbody>
	{if !$readonly}
    <tr data-tt-id="0">
        <td>&nbsp;</td>
        {if !$hide_read}<td class="text-center"><input type="checkbox" class="i-checks-red" /></td>{/if}
        <td class="text-center"><input type="checkbox" class="i-checks-red" /></td>
        <td class="text-center"><input type="checkbox" class="i-checks-red" /></td>
        <td class="text-center"><input type="checkbox" class="i-checks-red" /></td>
        <td class="text-center"><input type="checkbox" class="i-checks-red" /></td>
    </tr>
	{/if}

    {function name=crud_level ar_destinations=array() nested=0}

        {foreach name=access_destinations from=$ar_destinations item=dest key=dest_id}
            {if $exists && !$ar_crud.$dest_id}{continue}{/if}
            <tr data-tt-id="{$dest_id}" {if $dest.parent_id}data-tt-parent-id="{$dest.parent_id}"{/if} class="{if $dest_id == 0}zero-item{/if} {if $dest.children && $dest.visible_only}expand{/if}">
                <td>
                    {if $dest.children && $dest.visible_only}
                        <span class="text-muted">{$dest.name}</span>
                    {else}
                        {$dest.name}
                    {/if}

                </td>

                {if $readonly}
                    {if !$hide_read}
                    <td class="text-center">
                        <i class="fa fa-{if $ar_crud.$dest_id && $ar_crud.$dest_id&m_roles::CRUD_R}check text-success{else}times text-muted{/if}"></i>
                    </td>
                    {/if}
                    <td class="text-center">
                        <i class="fa fa-{if $ar_crud.$dest_id && $ar_crud.$dest_id&m_roles::CRUD_U}check text-success{else}times text-muted{/if}"></i>
                    </td>
                    <td class="text-center">
                        <i class="fa fa-{if $ar_crud.$dest_id && $ar_crud.$dest_id&m_roles::CRUD_C}check text-success{else}times text-muted{/if}"></i>
                    </td>
                    <td class="text-center">
                        <i class="fa fa-{if $ar_crud.$dest_id && $ar_crud.$dest_id&m_roles::CRUD_D}check text-success{else}times text-muted{/if}"></i>
                    </td>
                {else}
                    <td class="text-center">
                        <input type="checkbox" class="i-checks-red" name="cat[]" value="{$item.bit}" />
                    </td>
                    {if !$hide_read}
                    <td class="text-center">
                        <input type="checkbox" {if $dest.possible_access_mode && !in_array(m_roles::CRUD_R,$dest.possible_access_mode)}checked disabled{elseif $ar_crud.$dest_id && $ar_crud.$dest_id&m_roles::CRUD_R}checked=""{/if} class="i-checks" name="crud{if $name}_{$name}{/if}[{$dest_id}][]"   value="{m_roles::CRUD_R}" />
                    </td>
                    {/if}
                    <td class="text-center">
                        <input type="checkbox" {if $ar_crud.$dest_id && $ar_crud.$dest_id&m_roles::CRUD_U}checked=""{/if} class="i-checks" name="crud{if $name}_{$name}{/if}[{$dest_id}][]" value="{m_roles::CRUD_U}" />
                    </td>
                    <td class="text-center">
                        <input type="checkbox" {if $ar_crud.$dest_id && $ar_crud.$dest_id&m_roles::CRUD_C}checked=""{/if} class="i-checks" name="crud{if $name}_{$name}{/if}[{$dest_id}][]" value="{m_roles::CRUD_C}" />
                    </td>
                    <td class="text-center">
                        <input type="checkbox" {if $ar_crud.$dest_id && $ar_crud.$dest_id&m_roles::CRUD_D}checked=""{/if} class="i-checks" name="crud{if $name}_{$name}{/if}[{$dest_id}][]" value="{m_roles::CRUD_D}" />
                    </td>
                {/if}
            </tr>
            {if $dest.children}
                {crud_level ar_destinations=$dest.children nested=$nested+1}
            {/if}

        {/foreach}
    {/function}

    {crud_level ar_destinations=$ar_destinations nested=0}

    </tbody>
</table>

    {if $nested}
        <button class="btn btn-link" id="btn-table-crud-categories-expand"><i class="fa fa-expand"></i> {L::text_expand_all}</button>
        <button class="btn btn-link" id="btn-table-crud-categories-collapse"><i class="fa fa-compress"></i> {L::text_collapse_all}</button>

        <script>
            var $e_treetable = $("#table-crud-categories");
            $e_treetable.treetable({
                indent: 34,
                expandable: true,
                expanderTemplate: "<a class='btn btn-sm btn-default' href='#'><i class='fa'></a>"
            });

            function expand() {
                $e_treetable.find("tr.expand").each(function () {
                    var ttId = $(this).data('tt-id') || 0;
                    $e_treetable.treetable("expandNode", ttId);
                });
            }

            $().ready( function() {
                if (CoreIW.layout_init) {
                    expand();
                } else {
                    $('body').bind('init.layout', function(){
                        expand();
                    }).bind('previewLoaded.content', function(){
                        expand();
                    });
                }
            });


            //Expanded

            $("#btn-table-crud-categories-expand").on("click", function() {
                $('#table-crud-categories').treetable('expandAll');
                return false;
            });

            $("#btn-table-crud-categories-collapse").on("click", function() {
                $('#table-crud-categories').treetable('collapseAll');
                return false;
            });


        </script>
    {/if}


<script>

    {if !$crud_func}

        function table_crud_init($el, tree) {
            $el.find("tbody tr input:checkbox").on('ifChanged', function(event){
                var $tr = $(this).closest("tr");

                if ($tr.hasClass('zero-item')) {
                    return true;
                }

                var col_index       = $(this).closest("td").index();
                var is_checked      = $(this).is(":checked");
                var icheck_status   = (is_checked)?'check':'uncheck';
                var ttId = $tr.data('tt-id') || 0;

                if (tree) {
                    $el.treetable("expandNode", ttId);
                }

                $(this).closest('table').find('tbody '+((ttId)?'tr[data-tt-parent-id='+ttId+']':'tr:not([data-tt-parent-id])')).find('td:eq('+col_index+') input:checkbox:enabled').iCheck(icheck_status);
            });

            $el.find('tbody tr').find('td:eq(1) input:checkbox:enabled').on('ifChanged', function(event){
                var is_checked      = $(this).is(":checked");
                var icheck_status   = (is_checked)?'check':'uncheck';

                $(this).closest('tr').find('input:checkbox:enabled').iCheck(icheck_status);
            });
        }
        {assign var="crud_func" value=true scope=parent}
    {/if}

    table_crud_init($("#table-crud{if $name}-{$name}{/if}"), {$nested|intval});

</script>
{else}
    <div class="alert alert-default">
        Нет доступных
        {if $name == "module"}модулей
        {elseif $name == "categories"}категорий
        {elseif $name == "roles"}ролей
        {else}{$name}
        {/if}

    </div>
{/if}