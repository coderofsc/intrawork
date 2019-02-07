{if $read}
    {if $clear}
        {m_demands::$ar_criticality[$read].name}
    {else}
        <span class="label label-{m_demands::$ar_criticality[$value].color}">
            <i class="fa fa-{m_demands::$ar_criticality[$value].icon}" title="{m_demands::$ar_criticality[$value].name}"></i> {m_demands::$ar_criticality[$value].name}
        </span>
    {/if}
{else}
    {foreach from=m_demands::$ar_criticality key=criticality_id item=criticality}
        <option {if $only && ((is_array($only) && !in_array($criticality_id, $only)) || (!is_array($only) && $only != $criticality_id))}disabled{/if} {if (is_array($value) && in_array($criticality_id, $value)) || $value == $criticality_id}selected=""{/if}  data-icon="text-{$criticality.color} fa-{$criticality.icon} fa-fw" value="{$criticality_id}">{$criticality.name}</option>
    {/foreach}
{/if}
