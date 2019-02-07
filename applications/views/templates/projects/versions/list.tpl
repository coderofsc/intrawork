<table class="table table-valign-middle table-condensed table-hover clamped-margin-bottom" id="pv-list">
    <colgroup>
        <col width="120"/>
        <col width="120"/>
        <col width="*"/>
        <col width="50"/>
        {if cls_modules::MODULE_PROJECTS|access:m_roles::CRUD_U}
        <col width="50"/>
        {/if}
    </colgroup>
    <thead>
    <tr>
        <th>Версия</th>
        <th>Дата</th>
        <th>Описание</th>
        <th>Заявки</th>
        {if cls_modules::MODULE_PROJECTS|access:m_roles::CRUD_U}
        <th>&nbsp;</th>
        {/if}
    </tr>
    </thead>
    <tbody>
    <tr class="success">
        <td colspan="3">
            Заявки проекта, ожидающие присвоения версии{* <i class="fa text-muted fa-question" data-content="Заявки созданные позднее даты последней версии" data-title="Ожидание версии" data-trigger="hover" data-placement="right" data-toggle="popover" data-container="body"></i>*}
        </td>
        <td class="valign-middle text-center">
            <a href="demands/?cnd[project_id]={$project_id}&cnd[version_id]=0" class="badge badge-white">{$pending_demands_count}</a>
        </td>
        {if cls_modules::MODULE_PROJECTS|access:m_roles::CRUD_U}
        <td>&nbsp;</td>
        {/if}
    </tr>
    {foreach from=$ar_versions item=version}
        <tr data-id="{$version.id}">
            <td class="valign-middle">{$version.name}</td>
            <td class="valign-middle">{$version.unix_version_date|ts2text}<br/>{$version.low_version_date}</td>
            <td class="valign-middle">{$version.descr}</td>
            <td class="valign-middle text-center">
                <a href="demands/?cnd[project_id]={$project_id}&cnd[version_id]={$version.id}" class="badge badge-white">{$version.demands_count}</a>
            </td>
            {if cls_modules::MODULE_PROJECTS|access:m_roles::CRUD_U}
            <td><button class="btn btn-danger btn-delete btn-sm"><i class="fa fa-times"></i></button></td>
            {/if}
        </tr>
        {foreachelse}
        <tr>
            <td class="text-center" colspan="5">Версии проекта не найдены</td>
        </tr>
    {/foreach}
    </tbody>
</table>
