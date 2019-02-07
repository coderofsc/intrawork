{if $module_id}
    {assign var="module_alias" value=cls_modules::$ar_modules[$module_id].alias}
{/if}
{if $ar_data.offset+$ar_data.data|@sizeof < $ar_data.total && $ar_data.limit}
    <ul class="pager">
        <li><a href="{$module_alias}/?render={$smarty.const.RENDER_JSON}&offset={$ar_data.offset+$ar_data.limit}&continue=true{if $ar_data.conditions}&{$ar_data.conditions|http_build_query:"cnd"}{/if}">{L::text_load_more}</a></li>
    </ul>
{elseif $ar_data.data|@sizeof < $ar_data.total && !$ar_data.limit}
    <ul class="pager">
        <li><a href="{$module_alias}/{if $ar_data.conditions}?{$ar_data.conditions|http_build_query:"cnd"}{/if}">{L::text_show_more} <span class="badge badge-white">{$ar_data.total}</span> </a></li>
    </ul>
{/if}
