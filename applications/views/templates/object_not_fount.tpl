{include file="main/title.tpl"}
<div class="container-fluid">
    <div class="alert alert-danger">
        <h4>Объект &laquo;{$controller_info.module.morph.0}&raquo; не найден</h4>
        <p>{$controller_info.module.morph.0|mb_ucfirst} с идентификатором <strong>{$id}</strong> не найдена.</p>
        <p>
            {if $delete_event}
                <strong>Внимание!</strong> В журнале {$delete_event.unix_create_date|ts2text} зафиксировано событие удаления требуемой записи "{$delete_event.object_name}" пользователем {$delete_event.user_short_fio}
            {else}
                В журнале событий не зафиксировано удаления этой записи, возможно, вы ошиблись с номером запрашиваемого {$controller_info.module.morph.1}.
            {/if}
        </p>

    </div>
</div>