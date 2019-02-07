{extends file="helpers/abstracts/list.tpl"}
{block name="colgroup"}
    <colgroup>
        <col width="30px"/>
        <col width="*"/>
        <col width="30px"/>
        <col width="30px"/>
        <col width="30px"/>
        <col width="30px"/>
        <col width="30px"/>
        <col width="50px"/>
    </colgroup>
{/block}
{block name="thead"}
    <thead>
    <tr>
        <th></th>
        <th></th>
        <th title="{L::forms_labels_mrooms_projector}" class="text-center"><i class="fa fa-play"></i></th>
        <th title="{L::forms_labels_mrooms_loudspeaker}" class="text-center"><i class="fa fa-volume-up"></i></th>
        <th title="{L::forms_labels_mrooms_microphone}" class="text-center"><i class="fa fa-microphone"></i></th>
        <th title="{L::forms_labels_mrooms_whiteboard}" class="text-center"><i class="fa fa-pencil"></i></th>
        <th title="{L::forms_labels_mrooms_conference}" class="text-center"><i class="fa fa-users"></i></th>
        <th></th>
    </tr>
    </thead>
{/block}
{block name="trow"}
    <tr data-id="{$item_id}">
        <td>
            <div style="height:24px; width:24px; background-color: {$item.bgcolor}"></div>
        </td>
        <td>
            {$item.name}
        </td>
        {if $item.rflags & $smarty.const.RM_PROJECTOR}<td class="text-center text-success"><i class="fa fa-check"></i></td>{else}<td class="text-center text-muted"><i class="fa fa-times"></i></td>{/if}
        {if $item.rflags & $smarty.const.RM_LOUDSPEAKER}<td class="text-center text-success"><i class="fa fa-check"></i></td>{else}<td class="text-center text-muted"><i class="fa fa-times"></i></td>{/if}
        {if $item.rflags & $smarty.const.RM_MICROPHONE}<td class="text-center text-success"><i class="fa fa-check"></i></td>{else}<td class="text-center text-muted"><i class="fa fa-times"></i></td>{/if}
        {if $item.rflags & $smarty.const.RM_WHITEBOARD}<td class="text-center text-success"><i class="fa fa-check"></i></td>{else}<td class="text-center text-muted"><i class="fa fa-times"></i></td>{/if}
        {if $item.rflags & $smarty.const.RM_CONFERENCE}<td class="text-center text-success"><i class="fa fa-check"></i></td>{else}<td class="text-center text-muted"><i class="fa fa-times"></i></td>{/if}
        <td class="text-right">
            {include file="helpers/lists/actions.tpl" module_id=$module_id id=$item_id}
        </td>
    </tr>
{/block}

{*
{if !$module_id && $controller_info.module_id}
    {assign var="module_id" value=$controller_info.module_id}
{/if}

{if $ar_mrooms.data}
<table id="mrooms-table" class="table table-valign-middle table-condensed table-hover">
    <colgroup>
        <col width="30px"/>
        <col width="*"/>
        <col width="30px"/>
        <col width="30px"/>
        <col width="30px"/>
        <col width="30px"/>
        <col width="30px"/>
        <col width="50px"/>
    </colgroup>

    <thead>
    <tr>
        <th></th>
        <th></th>
        <th title="{L::forms_labels_mrooms_projector}" class="text-center"><i class="fa fa-play"></i></th>
        <th title="{L::forms_labels_mrooms_loudspeaker}" class="text-center"><i class="fa fa-volume-up"></i></th>
        <th title="{L::forms_labels_mrooms_microphone}" class="text-center"><i class="fa fa-microphone"></i></th>
        <th title="{L::forms_labels_mrooms_whiteboard}" class="text-center"><i class="fa fa-pencil"></i></th>
        <th title="{L::forms_labels_mrooms_conference}" class="text-center"><i class="fa fa-users"></i></th>
        <th></th>

    </tr>
    </thead>
	{foreach from=$ar_mrooms.data item=mroom key=mroom_id}
		<tr data-id="{$mroom_id}">
			<td>
				<div style="height:24px; width:24px; background-color: {$mroom.bgcolor}"></div>
			</td>
			<td>
				{$mroom.name}
			</td>
            {if $mroom.rflags & $smarty.const.RM_PROJECTOR}<td class="text-center text-success"><i class="fa fa-check"></i></td>{else}<td class="text-center text-muted"><i class="fa fa-times"></i></td>{/if}
            {if $mroom.rflags & $smarty.const.RM_LOUDSPEAKER}<td class="text-center text-success"><i class="fa fa-check"></i></td>{else}<td class="text-center text-muted"><i class="fa fa-times"></i></td>{/if}
            {if $mroom.rflags & $smarty.const.RM_MICROPHONE}<td class="text-center text-success"><i class="fa fa-check"></i></td>{else}<td class="text-center text-muted"><i class="fa fa-times"></i></td>{/if}
            {if $mroom.rflags & $smarty.const.RM_WHITEBOARD}<td class="text-center text-success"><i class="fa fa-check"></i></td>{else}<td class="text-center text-muted"><i class="fa fa-times"></i></td>{/if}
            {if $mroom.rflags & $smarty.const.RM_CONFERENCE}<td class="text-center text-success"><i class="fa fa-check"></i></td>{else}<td class="text-center text-muted"><i class="fa fa-times"></i></td>{/if}
            <td class="text-right">
                {include file="helpers/lists/actions.tpl" module_id=$module_id id=$mroom_id}
            </td>
		</tr>
        {foreachelse}
        <tr class="info">
            <td colspan="10" class="text-center">
                {if $module_id}
                    {cls_modules::$ar_modules[$module_id].name} не найдены
                {else}
                    {L::text_nothing_found}
                {/if}
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
    {include file="helpers/lists/more.tpl" ar_data=$ar_mrooms module_id=$module_id}
{/if}
*}