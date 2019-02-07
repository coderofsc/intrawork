{if $read}
    {*{m_demands::$ar_status[$read].name}*}
    {*<i class="fa text-{m_demands::$ar_status[$value].color} fa-{m_demands::$ar_status[$value].icon} fa-lg" title="{m_demands::$ar_status[$value].name}"></i>*}
    {if $clear}
        {m_demands::$ar_status[$value].name}
    {else}
        <span class="label label-{if $monochrome}tag{else}{m_demands::$ar_status[$value].color}{/if}"><i class="fa fa-{m_demands::$ar_status[$value].icon}"></i>&nbsp;{m_demands::$ar_status[$value].name}</span>
    {/if}

{else}
    {foreach from=m_demands::$ar_status key=status_id item=status}
        <option {*{if $disabled}disabled{/if}*}{if $only && ((is_array($only) && !in_array($status_id, $only)) || (!is_array($only) && $only != $status_id))}disabled{/if} data-icon="text-{$status.color} fa-{$status.icon} fa-fw" {if (is_array($value) && in_array($status_id, $value)) || $value == $status_id}selected=""{/if} value="{$status_id}">{$status.name}</option>
    {/foreach}
{/if}