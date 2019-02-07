{if !$owner_id && $controller_info.owner_id}
    {assign var="owner_id" value=$controller_info.owner_id}
{/if}

{if $ar_events.data}
    <table id="events-table" class="table table-valign-middle table-condensed table-hover clamped table-sticky-head footable" >
        <colgroup>
            <col width="40px"/>
            <col width="150px"/>
            <col width="40px"/>
            <col width="120px"/>
            <col width="100px"/>
            <col width="50px"/>
            <col width="*"/>
            <col width="150px"/>
        </colgroup>
        <thead>
        <tr>
            <th></th>
            <th data-toggle="true">{L::modules_users_morph_one|mb_ucfirst}</th>
            <th></th>
            <th class="text-center">{L::modules_events_text_action}</th>
            <th>{L::forms_labels_events_type_object}</th>
            <th>{L::forms_labels_code}</th>
            <th>{L::forms_labels_face_name}</th>
            <th data-hide="phone">{L::forms_labels_date}</th>
        </tr>
        </thead>
        {foreach from=$ar_events.data item=event key=events_id}
            {if $event.owner == m_roles::CRUD_OWNER_MODULE}
                {assign var="module_id" value=$event.owner_id}
            {else}
                {assign var="module_id" value=cls_modules::MODULE_DEMANDS}
            {/if}

            <tr data-id="{$events_id}">
                <td>
                    {if $event.user_id}
                        {include file="helpers/avatar.tpl" hash=$event.user_avatar_storage_hash dir=$smarty.const.STORAGE_DIR_AVATARS_USERS}
                    {else}
                        <img width="32px" src="{$smarty.const.STORAGE_DIR}{$smarty.const.STORAGE_DIR_AVATARS}intrawork_xs.jpg" alt="Avatar" class="img-avatar">
                    {/if}

                </td>
                <td>
                    {if $event.user_id}
                    <div><a data-toggle="modal" href="#modal-remote" data-remote="users/view/{$event.user_id}/">{$event.user_short_fio}</a></div>
                    {if $event.user_post_id}<span class="small text-muted">{$event.user_post_name}</span>{/if}
                    {if $event.user_dprt_id}<span class="small text-muted">{$event.user_dprt_name}</span>{/if}
                    {else}
                        <div class="text-muted">{L::intrawork}</div>
                    {/if}
                </td>
                <td class="text-center">
                    <i style="width:24px; padding:5px;" class="fa fa-fw fa-{if $event.crud == m_roles::CRUD_C}plus bg-primary{elseif $event.crud == m_roles::CRUD_U}pencil bg-warning{elseif $event.crud == m_roles::CRUD_D}trash bg-danger{/if}"></i>
                </td>
                <td class="text-center">
                    {if $event.crud == m_roles::CRUD_C}{L::crud_create}{elseif $event.crud == m_roles::CRUD_U}{L::crud_update}{elseif $event.crud == m_roles::CRUD_D}{L::crud_delete}{/if}
                </td>
                <td>
                    {cls_modules::$ar_modules[$module_id].morph.0|mb_ucfirst}
                </td>
                <td>
                    {$event.object_id}
                </td>
                <td>
                    <a href="{cls_modules::$ar_modules[$module_id].alias}/view/{$event.object_id}/">{$event.object_name}</a>
                    {if $module_id == cls_modules::MODULE_DEMANDS}
                        <div class="text-muted">{if $event.owner_id}{include file="helpers/catpath.tpl" id=$event.owner_id}{*{$mb.cat_name}*}{else}{L::text_inbox}{/if}</div>
                    {/if}
                </td>
                <td>
                    {$event.unix_create_date|ts2text}
                    <br>
                    <small class="text-muted">
                        {$event.unix_create_date|pass_time:false:true} {L::text_ago}
                    </small>
                </td>
            </tr>
        {/foreach}
    </table>
{else}
    <div class="alert alert-default">
        {L::text_nothing_found}
    </div>
{/if}

{include file="helpers/lists/more.tpl" ar_data=$ar_events module_alias="events" module_id=false}
