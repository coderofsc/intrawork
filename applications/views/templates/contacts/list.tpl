{extends file="helpers/abstracts/list.tpl"}
{block name="colgroup"}
    <colgroup>
        <col width="40px"/>
        <col width="18px"/>
        <col width="*"/>
        <col width="160px"/>
        <col width="160px"/>
        <col width="160px"/>
        <col width="50px"/>
        <col width="50px"/>
    </colgroup>
{/block}
{block name="thead"}
    <thead>
    <tr>
        <th>&nbsp;</th>
        <th data-toggle="true">&nbsp;</th>
        <th>{L::forms_labels_face_name}</th>
        <th data-hide="phone">{L::modules_contacts_types_morph_one|mb_ucfirst}</th>
        <th data-hide="phone,tablet">{L::forms_labels_email}</th>
        <th data-hide="phone,tablet">{L::forms_labels_phone}</th>
        <th class="text-center"><i class="fa fa-tasks"></i></th>
        <th>&nbsp;</th>
    </tr>
    </thead>
{/block}
{block name="trow"}
    <tr data-id="{$item_id}">
        <td>
            {include file="helpers/avatar.tpl" hash=$item.avatar_storage_hash dir=$smarty.const.STORAGE_DIR_AVATARS_CONTACTS}
        </td>
        <td></td>
        <td>
            {if $item.legal == $smarty.const.LEGAL_PERSON}
                <a class="title" href="contacts/view/{$item.id}/">
                    {if $item.opf}{$item.opf} {/if}{$item.company}
                </a>
                <div class="small text-muted">{$item.face_full_fio}</div>
            {else}
                <a class="title" href="contacts/view/{$item.id}/">
                    {$item.face_full_fio}
                </a>
            {/if}
        </td>
        <td>
            {if $item.type_name}{$item.type_name}{else}<span class="text-muted">&mdash;</span>{/if}
        </td>
        <td>
            {if $item.email}<a href="mailto: {$item.email}">{$item.email}</a>{else}<span class="text-muted">&mdash;</span>{/if}
        </td>
        <td>
            {if $item.phone}{$item.phone}{else}<span class="text-muted">&mdash;</span>{/if}
        </td>
        <td class="text-center valign-middle">
            <a href="users/?cnd[contact_id]={$item_id}" class="badge badge-white">
                {$item.demands_count}
            </a>
        </td>

        <td class="text-right">
            {include file="helpers/lists/actions.tpl" module_id=$module_id id=$item_id}
        </td>
    </tr>
{/block}

{*

{if !$module_id && $controller_info.module_id}
    {assign var="module_id" value=$controller_info.module_id}
{/if}

{if $ar_contacts.data}
<table id="contacts-table" class="table table-valign-middle table-condensed table-hover clamped table-sticky-head footable" >
    <colgroup>
        <col width="40px"/>
        <col width="18px"/>
        <col width="*"/>
        <col width="160px"/>
        <col width="160px"/>
        <col width="160px"/>
        <col width="50px"/>
        <col width="50px"/>
    </colgroup>
    <thead>
    <tr>
        <th>&nbsp;</th>
        <th data-toggle="true">&nbsp;</th>
        <th>{L::forms_labels_face_name}</th>
        <th data-hide="phone">{L::modules_contacts_types_morph_one|mb_ucfirst}</th>
        <th data-hide="phone,tablet">{L::forms_labels_email}</th>
        <th data-hide="phone,tablet">{L::forms_labels_phone}</th>
        <th class="text-center"><i class="fa fa-tasks"></i></th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    {foreach from=$ar_contacts.data item=contact key=contact_id}
		<tr data-id="{$contact_id}">
            <td>
                {include file="helpers/avatar.tpl" hash=$contact.avatar_storage_hash dir=$smarty.const.STORAGE_DIR_AVATARS_CONTACTS}
            </td>
            <td></td>
			<td>
                {if $contact.legal == $smarty.const.LEGAL_PERSON}
                    <a class="title" href="contacts/view/{$contact.id}/">
                    {if $contact.opf}{$contact.opf} {/if}{$contact.company}
                    </a>
                     <div class="small text-muted">{$contact.face_full_fio}</div>
                {else}
                    <a class="title" href="contacts/view/{$contact.id}/">
                        {$contact.face_full_fio}
                    </a>
                {/if}
			</td>
            <td>
                {if $contact.type_name}{$contact.type_name}{else}<span class="text-muted">&mdash;</span>{/if}
            </td>
            <td>
                {if $contact.email}<a href="mailto: {$contact.email}">{$contact.email}</a>{else}<span class="text-muted">&mdash;</span>{/if}
            </td>
            <td>
                {if $contact.phone}{$contact.phone}{else}<span class="text-muted">&mdash;</span>{/if}
            </td>
            <td class="text-center valign-middle">
                <a href="users/?cnd[contact_id]={$contact_id}" class="badge badge-white">
                    {$contact.demands_count}
                </a>
            </td>

            <td class="text-right">
                {include file="helpers/lists/actions.tpl" module_id=$module_id id=$contact_id}
            </td>
		</tr>
	{/foreach}
</table>
{else}
    <div class="alert alert-default">
    {if $module_id}
        {cls_modules::$ar_modules[$module_id].name} не найдены
    {else}
        {L::text_nothing_found}
    {/if}
    </div>
{/if}

{if $module_id}
    {include file="helpers/lists/more.tpl" ar_data=$ar_contacts module_id=$module_id}
{/if}
*}