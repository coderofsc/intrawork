{if !isset($selected)}
    {assign var=selected value=-999}
{/if}

{if $root}
    <option value="0">Верхний уровень</option>
    <option data-divider="true"></option>
{elseif $empty}
    <option value="0"></option>
{/if}

{function name=menu nested=0 selected=0 parent_label=''}
    {foreach from=$tree item=item key=key}

        {capture name='label'}
            <span class='dropdown-only'>
            {section name=foo start=0 loop=$nested step=1}
                &nbsp;&nbsp;&nbsp;
            {/section}
             </span>
            {$item.name}
        {/capture}

        {block name="option"}
            <option data-content="{if $item.bgcolor}<i class='fa fa-circle sp-icon' style='color: {$item.bgcolor}'></i> {/if}{$smarty.capture.label|htmlspecialchars}{if $nested} <small class='text-muted select-only'>{$parent_label|htmlspecialchars}</small>{/if}" value="{$key}" {if $selected == $key || (is_array($selected) && in_array($key, $selected))}selected=""{/if}>
                {$smarty.capture.label}
            </option>
        {/block}

        {if $item.children}
            {capture name='parent_label'}{if $parent_label}{$parent_label}&nbsp;/&nbsp;{/if}{$item.name}{/capture}
            {menu tree=$item.children nested=$nested+1 selected=$selected parent_label=$smarty.capture.parent_label}
        {/if}
    {/foreach}
{/function}

{menu tree=$tree nested=0 selected=$selected}
