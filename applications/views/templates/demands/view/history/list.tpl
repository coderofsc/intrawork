{if $ar_history}

{function name=decode_value value=0 old_value=0 muted=false}
    {if $muted}<span class="text-muted">{/if}

    {if $column == 'status'}
        {include file="helpers/forms/demand_status.tpl" value=$value read=true clear=$muted}
    {elseif $column == 'priority'}
        {include file="helpers/forms/demand_priority.tpl" value=$value read=true clear=$muted}
    {elseif $column == 'criticality'}
        {include file="helpers/forms/demand_criticality.tpl" value=$value read=true clear=$muted}
    {elseif $column == 'eu_eid' || $column == 'ru_eid'}
        {if $value}{$value_decode}{else}<span class="text-muted">{L::text_not_specified|mb_ucfirst}</span>{/if}
    {elseif $column == 'cat_id'}
        {if $value_decode}{include file="helpers/catpath.tpl" id=$value_decode}{else}{L::text_inbox}{/if}
    {elseif $column == 'type_id'}
        {$global_ar_demands_types.$value.name}
    {elseif $column == 'deadline_date'}
        {if $value}{$value|ts2text}{else}<span class="text-muted">{L::text_not_specified|mb_ucfirst}</span>{/if}
    {elseif $column == 'percent_complete'}
        {$value}%
    {elseif $column == 'required_time'}
        {if $value}
            {$value_decode|ts2hours}
            {if $old_value}
            <div class="text-muted">

                {if $value > $old_value}
                    {assign var="diff_time" value=$value-$old_value}
                    +{$diff_time|ts2hours}
                {else}
                    {assign var="diff_time" value=$old_value-$value}
                    -{$diff_time|ts2hours}
                {/if}
            </div>
            {/if}
        {else}
            <span class="text-muted">{L::text_not_specified|mb_ucfirst}</span>
        {/if}

    {/if}

    {if $muted}</span>{/if}
{/function}

{/if}

<table id="history-table" class="table table-condensed table-hover table-valign-middle">
    <colgroup>
        <col width="50px"/>
        <col width="20%"/>
        <col width="20%"/>
        <col width="20%"/>
        <col width="20%"/>
        <col width="1%"/>
        <col width="20%"/>
    </colgroup>
    <thead>
    <tr>
        <th></th>
        <th>{L::forms_labels_fio}</th>
        <th>{L::forms_labels_date} <i class="fa fa-sort-amount-desc"></i> </th>
        <th>{L::forms_labels_property}</th>
        <th>{L::forms_labels_history_old_value}</th>
        <th>&nbsp;</th>
        <th>{L::forms_labels_history_new_value}</th>
    </tr>
    </thead>
    <tbody>
    {foreach from=$ar_history item=history key=history_id}
        {include file="demands/view/history/item.tpl"}
        {foreachelse}
        <tr>
            <td colspan="10" class="text-center">
                {L::text_demand_history_empty}
            </td>
        </tr>

    {/foreach}
    </tbody>
</table>


