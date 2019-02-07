{extends file="helpers/abstracts/tree_options.tpl"}
{block name="option"}
{*<option data-icon="fa fa-plus" {if $item.visible_only || ($crud && !($cuser_data.crud_categories.$key & m_roles::CRUD_C))  }disabled=""{/if} data-content="{if $item.icon}<i class='fa {if $item.icon}{$item.icon}{else}fa-circle{/if} sp-icon' style='color: {$item.bgcolor}'></i> {/if}{$smarty.capture.label}{if $nested} <small class='text-muted select-only'>{$parent_label}</small>{/if}" value="{$key}" {if intval($selected) === intval($key) || (is_array($selected) && in_array($key, $selected))}selected=""{/if}>*}
    {*intval в IF был*}
    {*{$selected == $key} тождество было*}
<option {if $item.visible_only || ($crud && !($cuser_data.crud_categories.$key & m_roles::CRUD_C))  }disabled=""{/if} data-content="<i class='fa sp-icon fa-fw {if $item.icon}{$item.icon}{else}fa-circle{/if}' style='color: {if $item.bgcolor}{$item.bgcolor}{elseif $item.icon}#a7b1c2{else}#e7e7e7{/if}'></i>{$smarty.capture.label|htmlspecialchars}{if $nested} <small class='text-muted select-only'>{$parent_label|htmlspecialchars}</small>{/if}" value="{$key}" {if $only && ((is_array($only) && !in_array($key, $only)) || (!is_array($only) && $only != $key))}disabled{/if} {if $selected == $key || (is_array($selected) && in_array($key, $selected))}selected=""{/if}>
    {$smarty.capture.label}
</option>
{if $key == 0}<option data-divider="true"></option>{/if}
{/block}