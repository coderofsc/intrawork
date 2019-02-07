{if !isset($selected)}
    {assign var=selected value=-999}
{/if}


{if !$text}
    {assign var="text" value="name"}
{/if}

{if !$value_src}
    {assign var="value_src" value="value"}
{/if}

{if !$value && $value_src != "key"}
    {assign var="value" value="id"}
{/if}

{if $empty}
    <option value="0"></option>
{/if}

{assign var="old_group" value=-1}

{foreach from=$data item=item key=key}
    {if $group && $old_group != $item.$group}
        {if !$item@first}</optgroup>{/if}
        <optgroup label="{$item.$group|default:'Без группы'}">
        {assign var="old_group" value=$item.$group}
    {/if}

    {if $value_src == "key"}
        {assign var="current_value" value=$key}
        {else}
        {assign var="current_value" value=$item.$value}
    {/if}


    <option {if $only && ((is_array($only) && !in_array($current_value, $only)) || (!is_array($only) && $only != $current_value))}disabled{/if} {if $subtext}data-subtext="{$item.$subtext}"{/if} value="{$current_value}" {if $selected == $current_value || (is_array($selected) && in_array($current_value, $selected))}selected=""{/if}>
        {$item.$text}
    </option>
{/foreach}

{if $data}
    </optgroup>
{/if}
