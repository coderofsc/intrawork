{*
{extends file="helpers/abstracts/list.tpl"}
{block name="colgroup"}

{/block}
{block name="thead"}

{/block}
{block name="trow"}

{/block}
*}

{if !$module_id && $controller_info.module_id}
    {assign var="module_id" value=$controller_info.module_id}
{/if}

{assign var="module_name" value=cls_modules::$ar_modules[$module_id].alias|replace:"/":"-"}
{assign var="module_path" value=cls_modules::$ar_modules[$module_id].alias}
{assign var="ar_data" value=$ar_{$module_name|replace:"-":"_"}}

{if $ar_data.data}
    <table id="{$module_name}-table" class="table table-valign-middle table-condensed table-hover clamped-margin-bottom {block name="tclass"}table-sticky-head footable{/block}">
        {block name="colgroup"}
        <colgroup>
            <col width="*"/>
        </colgroup>
        {/block}

        {block name="thead"}
        <thead>
        <tr>
            <th>ID</th>
        </tr>
        </thead>
        {/block}

        <tbody>
        {block name="page_header"}
            {if isset($ar_data.limit)}
            <tr class="warning">
                <td colspan="20" class="text-center">
                    Страница {intval($ar_data.offset/$ar_data.limit)+1} из {ceil($ar_data.total/$ar_data.limit)}
                </td>
            </tr>
            {/if}
        {/block}

        {assign var="prev_group_value" value="-1"}
        {foreach from=$ar_data.data item=item key=item_id}

            {* Разделитель группированных данных *}
            {if $ar_data.group.by && $ar_data.group.by != "none" && $prev_group_value!=$item[$ar_data.group.by]}
                {include file="./list_group_item.tpl" column=$ar_data.group.by value=$item[$ar_data.group.by] data=$item}
                {assign var="prev_group_value" value=$item[$ar_data.group.by]}
            {/if}

            {block name="trow"}
            <tr data-id="{$item_id}" data-rownum="{$item@iteration+$ar_data.offset}">
                <td>
                    {$item.id}
                </td>
            </tr>
            {/block}

        {/foreach}
        </tbody>
    </table>
{else}
    <div class="alert alert-default">
        {if $module_id}
            {cls_modules::$ar_modules[$module_id].name} не найдены
        {else}
            {L::text_nothing_found}
        {/if}
    </div>
{/if}

{if $module_id}
    {include file="helpers/lists/more.tpl" ar_data=$ar_data module_id=$module_id}
{/if}
