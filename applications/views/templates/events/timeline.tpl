<div class="container-fluid">
{foreach from=$ar_events.data item=event}
    {if $event.owner == m_roles::CRUD_OWNER_MODULE}
        {assign var="module_id" value=$event.owner_id}
    {else}
        {assign var="module_id" value=cls_modules::MODULE_DEMANDS}
    {/if}

    <div class="timeline-item">
        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-2 date">
                <i class="fa fa-fw fa-{if $event.crud == m_roles::CRUD_C}plus bg-primary{elseif $event.crud == m_roles::CRUD_U}pencil bg-warning{elseif $event.crud == m_roles::CRUD_D}trash bg-danger{/if}"></i>
                {$event.unix_create_date|ts2text}
                <br>
                <small class="text-navy">
                    {$event.unix_create_date|pass_time:false:true} {L::text_ago}
                </small>
            </div>
            <div class="col-xs-9 col-sm-9 col-md-10 content">
                <p class="m-b-xs">
                    <strong>{cls_modules::$ar_modules[$module_id].morph.0|mb_ucfirst}</strong>
                </p>

                <p>
                    {if $event.user_id}
                        {L::modules_users_morph_one|mb_ucfirst} <a href="users/view/{$event.user_id}/">{$event.user_short_fio}</a>
                    {else}
                        {L::text_iw_auto_action|mb_ucfirst}
                    {/if}
                     {if $event.crud == m_roles::CRUD_C}{L::modules_events_crud_create}{elseif $event.crud == m_roles::CRUD_U}{L::modules_events_crud_update}{elseif $event.crud == m_roles::CRUD_D}{L::modules_events_crud_delete}{/if} {L::text_object_morph_one} &mdash; {cls_modules::$ar_modules[$module_id].morph.0}{* ({$event.object_id})*}
                    {if $event.crud == m_roles::CRUD_D}
                        «{$event.object_name}»
                    {else}
                        «<a href="{cls_modules::$ar_modules[$module_id].alias}/view/{$event.object_id}/">{$event.object_name}</a>»
                    {/if}
                </p>

                {if $module_id == cls_modules::MODULE_DEMANDS}
                    <div class="text-muted">{if $event.owner_id}{include file="helpers/catpath.tpl" id=$event.owner_id}{*{$mb.cat_name}*}{else}{L::text_inbox}{/if}</div>
                {/if}

            </div>
        </div>
    </div>
{/foreach}
</div>