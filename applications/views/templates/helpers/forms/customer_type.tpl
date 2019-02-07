{if $read}

{else}
    {*<option {if $only && ((is_array($only) && !in_array($status_id, $only)) || (!is_array($only) && $only != $status_id))}disabled{/if} data-icon="text-{$status.color} fa-{$status.icon} fa-fw" {if (is_array($value) && in_array($status_id, $value)) || $value == $status_id}selected=""{/if} value="{$status_id}">{$status.name}</option>*}
    {assign var="cu_type" value=1}
    <option {if $only && ((is_array($only) && !in_array($cu_type, $only)) || (!is_array($only) && $only != $cu_type))}disabled{/if} {if (is_array($value) && in_array($cu_type, $value)) || $value == $cu_type}selected=""{/if} value="{$cu_type}">Внутренний пользователь</option>
    {assign var="cu_type" value=2}
    <option {if $only && ((is_array($only) && !in_array($cu_type, $only)) || (!is_array($only) && $only != $cu_type))}disabled{/if} {if (is_array($value) && in_array($cu_type, $value)) || $value == $cu_type}selected=""{/if} value="{$cu_type}">Внешний пользователь</option>
{/if}