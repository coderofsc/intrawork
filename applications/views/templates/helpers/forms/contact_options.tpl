{if $empty}
    <option value="0"></option>
{/if}

{assign var="old_legal" value="0"}
{foreach from=$ar_contacts item=item key=key}

    {if $old_legal != $item.legal}
        {if !$item@first}</optgroup>{/if}
        <optgroup label="{if $item.legal==$smarty.const.NATURAL_PERSON}Частные{else}Юридические{/if} лица">
        {assign var="old_legal" value=$item.legal}
    {/if}

    {if $item.legal == $smarty.const.NATURAL_PERSON}
        <option value="{$item.id}" {if $value == $item.id}selected=""{/if}>
            {$item.face_short_fio}
        </option>
    {else}
        <option value="{$item.id}" {if $only && ((is_array($only) && !in_array($item.id, $only)) || (!is_array($only) && $only != $item.id))}disabled{/if} {if (is_array($value) && in_array($item.id, $value)) || $value == $item.id}selected=""{/if} data-subtext="{$item.face_short_fio}">
            {$item.company_full_name}
        </option>
    {/if}
{/foreach}
</optgroup>