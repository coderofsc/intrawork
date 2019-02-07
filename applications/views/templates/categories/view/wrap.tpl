<div class="form-horizontal form-clamped">
    {if $cat_data.descr}
        <div class="form-group">
            <label class="col-sm-2 col-xs-4 control-label">{L::forms_labels_descr}</label>
            <div class="col-sm-10 col-xs-8">
                <p >{$cat_data.descr}</p>
            </div>
        </div>
    {/if}
</div>

{if cls_modules::MODULE_ROLES|access:m_roles::CRUD_R}
    <div class="h3">{L::modules_categories_text_assigned_to} <a href="roles/?cnd[cat_id]={$cat_data.id}" class="badge badge-info">{$ar_crud_category|sizeof}</a> {$ar_crud_category|sizeof|declension:(L::modules_roles_morph_for_one|cat:";"|cat:L::modules_roles_morph_for_two|cat:";"|cat:L::modules_roles_morph_for_five)}</div>
    {include file="roles/form/table_crud.tpl" ar_destinations=$ar_roles name="roles" readonly=true exists=true ar_crud=$ar_crud_category}
{/if}

<div class="alert alert-default">
    {L::modules_categories_text_available_to} <a class="alert-link" href="users/?cnd[cat_id]={$cat_data.id}">{$cat_data.users_count} {$cat_data.users_count|declension:(L::modules_users_morph_for_one|cat:";"|cat:L::modules_users_morph_for_two|cat:";"|cat:L::modules_users_morph_for_five)}</a>
</div>

<div class="h3">{L::modules_categories_text_headers_last_demands}</div>
{include file="demands/list.tpl" ar_demands=$ar_demands module_id=cls_modules::MODULE_DEMANDS denied_delete=true collapsed=true}
