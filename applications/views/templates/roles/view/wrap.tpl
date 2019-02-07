{if !$role_data.users_count}
    <div class="alert alert-warning">
        Роль не установлена ни для одного пользователя
    </div>
{else}
    <div class="alert alert-success">
        {L::modules_roles_text_set_for} <a class="alert-link" href="users/?cnd[role_id]={$role_data.id}">{$role_data.users_count} {$role_data.users_count|declension:(L::modules_users_morph_for_one|cat:";"|cat:L::modules_users_morph_for_two|cat:";"|cat:L::modules_users_morph_for_five)}</a>
    </div>
{/if}

<h3>Параметры фильтрации заявок</h3>

{if $role_data.filter && $filter_decode}
    <div class="well well-sm">
    {foreach from=$filter_decode item=filter}
        <div class="row">
            <div class="col-sm-5"><span class="nav-label">{$filter.name}</span></div>
            <div class="col-sm-6">
                {if is_array($filter.decode)}
                    {foreach from=$filter.decode item=value }
                        <span class="nav-label text-ellipsis">{$value}</span>
                    {/foreach}
                {else}
                    <span class="nav-label text-ellipsis">{$filter.decode}</span>
                {/if}
            </div>
        </div>
    {/foreach}
    </div>
{else}
    <div class="alert alert-default">
        <p>Условия фильтрации не указаны &mdash; будут показаны все заявки (согласно доступа к категориям).</p>
    </div>
{/if}


<div class="h3">{L::modules_roles_text_headers_module_access}</div>
{if $crud_module}
    {include file="roles/form/table_crud.tpl" ar_destinations=cls_modules::$ar_modules name="module" readonly=true ar_crud=$crud_module exists=true}
{else}
    <div class="alert alert-default">Нет доступа к модулям</div>
{/if}

<div class="h3">{L::modules_roles_text_headers_categories_access}</div>
{if $crud_categories}
    <link type="text/css" rel="stylesheet" href="min/{$smarty.const.RESOURCE_VERSION}/?g=treetablecss" />
    <script src="min/{$smarty.const.RESOURCE_VERSION}/?g=treetablejs"></script>
    {include file="roles/form/table_crud.tpl" ar_destinations=$ar_tree_categories name="categories" nested=true readonly=true ar_crud=$crud_categories}
{else}
    <div class="alert alert-default">Нет доступа к категориям</div>
{/if}
