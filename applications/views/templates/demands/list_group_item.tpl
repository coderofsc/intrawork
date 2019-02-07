<tr class="table-list-group-item info">
    <td colspan="10">

        {if $column == 'status'}
            {include file="helpers/forms/demand_status.tpl" value=$value read=true clear=$muted}
        {elseif $column == 'priority'}
            {include file="helpers/forms/demand_priority.tpl" value=$value read=true clear=$muted}
        {elseif $column == 'criticality'}
            {include file="helpers/forms/demand_criticality.tpl" value=$value read=true clear=$muted}
        {elseif $column == 'cu_surname'}
            {$data.cu_short_fio|default:"Не указан"}
        {elseif $column == 'eu_surname'}
            {$data.eu_short_fio|default:"Не указан"}
        {elseif $column == 'ru_surname'}
            {$data.ru_short_fio|default:"Не указан"}
        {elseif $column == 'create_dd'}
            {$value|ts2text:false:false:false}
        {elseif $column == 'cat_id'}
            {if $data.cat_id}{include file="helpers/catpath.tpl" id=$data.cat_id}{else}{L::text_inbox}{/if}
        {else}
            {$value}
        {/if}

    </td>
</tr>
