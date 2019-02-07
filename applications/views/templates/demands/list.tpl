{extends file="helpers/abstracts/list.tpl"}

{block name="colgroup"}
    <colgroup>
        <col width="40px"/>
        <col width="18px"/>
        <col width="18px"/>
        <col width="*"/>
        <col width="30px"/>
        <col width="30px"/>
        <col width="120px"/>
        <col width="80px"/>
        <col width="120px"/>
        <col width="120px"/>
    </colgroup>
{/block}

{block name="thead"}
    <thead>
    <tr>
        <th></th>
        <th data-toggle="true"></th>
        <th></th>
        <th>{L::forms_labels_title}</th>
        <th class="text-center" data-name="{L::forms_labels_demands_implement_percent}">%</th>
        <th class="text-center" data-name="{L::forms_labels_demands_messages}"><i class="fa fa-comments-o"></i></th>
        <th class="text-center" data-hide="{if $collapsed}all{else}phone{/if}">{L::forms_labels_created_date}</th>
        <th class="text-center" data-hide="{if $collapsed}all{else}phone{/if}">{L::forms_labels_demands_remain_time}</th>
        <th data-hide="{if $collapsed}all{else}phone,tablet{/if}">{L::members_customer}</th>
        <th data-hide="{if $collapsed}all{else}phone,tablet{/if}">{L::members_executor}</th>
    </tr>
    </thead>
{/block}

{block name="trow"}
    <tr data-id="{$item_id}" data-rownum="{$item@iteration+$ar_demands.offset}" class="{if $item.unix_deadline_date && $item.unix_deadline_date<$smarty.now}danger{elseif $item.eu_eid == $cuser_data.eid && $item.status == m_demands::STATUS_WORK}warning{elseif $item.status == m_demands::STATUS_SPAM}muted{/if}">
        <td>
            {include file="helpers/avatar.tpl" hash=$item.eu_avatar_storage_hash dir=$smarty.const.STORAGE_DIR_AVATARS_USERS}
        </td>
        <td></td>
        <td class="text-center">
            {if $item.attach_count}<span class="dd-icon text-muted"><i title="Есть вложения" class="fa fa-fw fa-files-o"></i></span> {/if}
            {if $item.parent_id}<span class="dd-icon text-muted"><i title="{L::modules_demands_text_joined}" class="fa fa-fw fa-share-alt"></i></span> {/if}
            <span class="dd-icon icon-ds text-{m_demands::$ar_status[$item.status].color}"><i class="fa fa-fw fa-{m_demands::$ar_status[$item.status].icon}" title="Статус заявки: {m_demands::$ar_status[$item.status].name}"></i></span>
            <span class="dd-icon icon-cr text-{m_demands::$ar_criticality[$item.criticality].color}"><i class="fa fa-fw fa-{m_demands::$ar_criticality[$item.criticality].icon}" title="Критичность: {m_demands::$ar_criticality[$item.criticality].name}"></i></span>
        </td>
        <td>
            {if $item.type_id}<label class="label label-{$item.type_type}">{$item.type_name}</label> {/if}
            <a class="title" href="demands/view/{$item.id}/{if $conditions}?{/if}{$conditions|http_build_query:"cnd"}{if $conditions}&{else}?{/if}{$sort|http_build_query:"sort"}">
                {$item.title}
            </a>
            <div class="small">{if !isset($ar_demands.conditions.cat_id)}{include file="helpers/catpath.tpl" link=true id=$item.cat_id nosmall=true}{/if}</div>
            <div class="small text-muted ww-bw">
                {if $item.message|strip_tags|trim}
                    {$item.message|strip_tags|trim|truncate|wordwrap:36:"\n":1}
                {/if}
            </div>
        </td>
        <td class="text-center">
            {*<span class="donut" {if $item.exec_time>$item.required_time}{literal}data-peity='{"fill":["red", "#eeeeee"]}'{/literal}{/if} title="{$percent_exec}% выполнено" style="line-height: 1">{$item.exec_time}/{$item.required_time}</span>*}
            <span class="donut" title="{$item.percent_complete}% выполнено" style="line-height: 1">{$item.percent_complete}/100</span>
        </td>
        <td class="text-center">
            <span class="badge badge-white">{$item.count_messages}</span>
        </td>
        <td class="text-center">
            {$item.unix_create_date|ts2text}
        </td>

        <td class="text-center">
            {if $item.required_time}
                {if $item.required_time>$item.exec_time}
                    <i class="fa fa-clock-o text-muted"></i> {($item.required_time-$item.exec_time)|ts2hours:false:true}
                {else}
                    <div class="text-danger">
                        <i class="fa fa-clock-o"></i> -{($item.exec_time-$item.required_time)|ts2hours:false:true}
                    </div>

                {/if}
            {else}
                <span class="text-muted">&mdash;</span>
            {/if}
        </td>
        <td>{if $item.cu_id}{$item.cu_short_fio}{else}{$item.cu_email}{/if}</td>
        <td>{if $item.eu_eid}{$item.eu_short_fio}{else}<span class="text-muted">Не указан</span>{/if}</td>
    </tr>

{/block}

{*{if !$module_id && $controller_info.module_id}
    {assign var="module_id" value=$controller_info.module_id}
{/if}

{if $ar_demands.data}
    <table id="demands-table" class="table table-valign-middle table-condensed table-hover clamped-margin-bottom table-sticky-head footable">
        <colgroup>
            <col width="40px"/>
            <col width="18px"/>
            <col width="18px"/>
            <col width="*"/>
            <col width="30px"/>
            <col width="30px"/>
            <col width="80px"/>
            <col width="80px"/>
            <col width="120px"/>
            <col width="120px"/>
        </colgroup>
        <thead>
        <tr>
            <th></th>
            <th data-toggle="true"></th>
            <th></th>
            <th>{L::forms_labels_title}</th>
            <th class="text-center" data-name="{L::forms_labels_demands_implement_percent}">%</th>
            <th class="text-center" data-name="{L::forms_labels_demands_messages}"><i class="fa fa-comments-o"></i></th>
            <th class="text-center" data-hide="{if $collapsed}all{else}phone{/if}">{L::forms_labels_created_date}</th>
            <th class="text-center" data-hide="{if $collapsed}all{else}phone{/if}">{L::forms_labels_demands_remain_time}</th>
            <th data-hide="{if $collapsed}all{else}phone,tablet{/if}">{L::members_customer}</th>
            <th data-hide="{if $collapsed}all{else}phone,tablet{/if}">{L::members_executor}</th>
        </tr>
        </thead>
        <tbody>
        <tr class="warning"><td colspan="10" class="text-center">Страница {intval($ar_demands.offset/$ar_demands.limit)+1} из {ceil($ar_demands.total/$ar_demands.limit)}</td></tr>
        {assign var="prev_group_value" value="-1"}
        {foreach from=$ar_demands.data item=demand key=demand_id}
            {if $ar_demands.group.by && $ar_demands.group.by != "none" && $prev_group_value!=$demand[$ar_demands.group.by]}
                {include file="./list_group_item.tpl" column=$ar_demands.group.by value=$demand[$ar_demands.group.by] data=$demand}
                {assign var="prev_group_value" value=$demand[$ar_demands.group.by]}
            {/if}

            <tr data-id="{$demand_id}" data-rownum="{$demand@iteration+$ar_demands.offset}" class="{if $demand.eu_eid == $cuser_data.eid && $demand.status == m_demands::STATUS_WORK}warning{elseif $demand.status == m_demands::STATUS_SPAM}muted{/if}">
                <td>
                    {include file="helpers/avatar.tpl" hash=$demand.eu_avatar_storage_hash dir=$smarty.const.STORAGE_DIR_AVATARS_USERS}
                </td>
                <td></td>
                <td class="text-center">
                    {if $demand.parent_id}<span class="dd-icon text-muted"><i title="{L::modules_demands_text_joined}" class="fa fa-share-alt"></i></span> {/if}
                    <span class="dd-icon icon-ds text-{m_demands::$ar_status[$demand.status].color}"><i class="fa fa-fw fa-{m_demands::$ar_status[$demand.status].icon}" title="Статус заявки: {m_demands::$ar_status[$demand.status].name}"></i></span>
                    <span class="dd-icon icon-cr text-{m_demands::$ar_criticality[$demand.criticality].color}"><i class="fa fa-fw fa-{m_demands::$ar_criticality[$demand.criticality].icon}" title="Критичность: {m_demands::$ar_criticality[$demand.criticality].name}"></i></span>
                </td>
                <td>
                    <a class="title" href="demands/view/{$demand.id}/{if $conditions}?{/if}{$conditions|http_build_query:"cnd"}{if $conditions}&{else}?{/if}{$sort|http_build_query:"sort"}">{$demand.title}</a>
                    <div class="small">{if !isset($ar_demands.conditions.cat_id)}{include file="helpers/catpath.tpl" link=true id=$demand.cat_id nosmall=true}{/if}</div>
                    <div class="small text-muted ww-bw">
                        {if $demand.message|strip_tags|trim}
                            {$demand.message|strip_tags|trim|truncate|wordwrap:36:"\n":1}
                        {/if}
                    </div>
                </td>
                <td class="text-center">
                    <span class="donut" {if $demand.exec_time>$demand.required_time}{literal}data-peity='{"fill":["red", "#eeeeee"]}'{/literal}{/if} title="{$percent_exec}% выполнено" style="line-height: 1">{$demand.exec_time}/{$demand.required_time}</span>
                </td>
                <td class="text-center">
                    <span class="badge badge-white">{$demand.count_messages}</span>
                </td>
                <td class="text-center">
                    {$demand.unix_create_date|ts2text}
                </td>

                <td class="text-center">
                    {if $demand.required_time}
                        {if $demand.required_time>$demand.exec_time}
                            <i class="fa fa-clock-o text-muted"></i> {($demand.required_time-$demand.exec_time)|ts2hours:false:true}
                        {else}
                            <div class="text-danger">
                                <i class="fa fa-clock-o"></i> -{($demand.exec_time-$demand.required_time)|ts2hours:false:true}
                            </div>

                        {/if}
                    {else}
                        <span class="text-muted">&mdash;</span>
                    {/if}
                </td>
                <td>
                    {if $demand.cu_id}
                        {$demand.cu_short_fio}
                    {else}
                        {$demand.cu_email}
                    {/if}
                </td>
                <td>{if $demand.eu_eid}{$demand.eu_short_fio}{else}<span class="text-muted">Не указан</span>{/if}</td>
            </tr>
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
    {include file="helpers/lists/more.tpl" ar_data=$ar_demands module_id=$module_id}
{/if}
*}