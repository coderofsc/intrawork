
{if !$module_id}
    {assign var="module_id" value=$controller_info.module_id}
{/if}

{assign var="module_alias" value=$controller_info.module.alias|replace:"/":"-"}

{if ($module_id|access:m_roles::CRUD_U && !$denied_update) || ($module_id|access:m_roles::CRUD_D && !$denied_delete)}
    <!-- Split button -->
    <div class="btn-group btn-group-sm btn-group-actions">

        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">Меню с переключением</span>
        </button>

        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-wauto" role="menu">
            {if $module_id|access:m_roles::CRUD_U && !$denied_update}
                <li><a href="{cls_modules::$ar_modules[$module_id].alias}/edit/{$id}/"><i class="fa fa-pencil fa-fw"></i> {L::actions_edit}</a></li>
            {/if}

            {if $module_id|access:m_roles::CRUD_D && !$denied_delete}
                <li><a href="{cls_modules::$ar_modules[$module_id].alias}/delete/{$id}/" class="text-danger delete-record"><i class="fa fa-trash-o fa-fw"></i> {L::actions_delete}</a></li>
            {/if}
        </ul>
    </div>

    {if !$delete_func && $module_id|access:m_roles::CRUD_D && !$denied_delete}
        <script>
            function deleted_list_record(target, response) {

                $(target).closest(".btn-group.open .dropdown-menu").dropdown('toggle');
                $(target).closest("{if $tree}li.dd-item{else}tr{/if}").fadeOut('slow', function() {
                    if ($(this).hasClass("selected")) {
                        $(this).closest("{if $tree}.dd{else}table{/if}.jcatcher").jcatcher.unselect($(this).data("id"));
                    }

                    {if $tree}
                        if ($(this).closest("ol.dd-list").children("li").length == 1) {
                            $(this).closest("ol.dd-list").parent().find("button[data-action=collapse]").hide();
                            $(this).closest("ol.dd-list").remove();
                        }
                    {/if}

                    $(this).remove();

                });

                toastr.success('{if $module_id}{cls_modules::$ar_modules[$module_id].morph.0|mb_ucfirst}{else}{L::text_object_morph_one|mb_ucfirst}{/if} успешно удалена', 'Удалено');
            }

            $(document).on("click", "#{$module_alias}-{if $tree}nes{/if}table .btn-group-actions .delete-record", function() {
           // $("#{cls_modules::$ar_modules[$module_id].alias}-table").find(".btn-group-actions .delete-record").on("click", function() {
                CoreIW.ajaxcall($(this), "{L::confirm_delete_message}", "{L::crud_delete} {if $module_id}{cls_modules::$ar_modules[$module_id].morph.1}{else}{L::text_object_morph_two}{/if}", function($e) { deleted_list_record($e); });
                return false;
            });

        </script>

        {assign var="delete_func" value=true scope=parent}
    {/if}
{/if}

