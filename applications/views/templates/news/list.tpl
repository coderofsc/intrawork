{extends file="helpers/abstracts/list.tpl"}
{block name="colgroup"}
    <colgroup>
        <col width="40px"/>
        <col width="18px"/>
        <col width="18px"/>
        <col width="*"/>
        <col width="180px"/>
        <col width="50px"/>
    </colgroup>
{/block}
{block name="thead"}
    <thead>
    <tr>
        <th></th>
        <th data-toggle="true"></th>
        <th></th>
        <th>{L::forms_labels_title}</th>
        <th data-hide="phone" data-name="{L::forms_labels_news_publish_date}">{L::forms_labels_news_publish_date}</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
{/block}
{block name="trow"}
    <tr data-id="{$item_id}">
        <td>
            {if $item.user_id}
                {include file="helpers/avatar.tpl" hash=$item.user_avatar_storage_hash dir=$smarty.const.STORAGE_DIR_AVATARS_USERS}
            {else}
                <img width="32px" src="{$smarty.const.STORAGE_DIR}{$smarty.const.STORAGE_DIR_AVATARS}intrawork_xs.jpg" alt="Avatar" class="img-avatar img-circle">
            {/if}
        </td>
        <td></td>
        <td>
            <i class="fa fa-toggle-{if $item.publish}on text-info{else}off text-muted{/if}"></i>
        </td>
        <td>
            <a class="title" href="news/view/{$item_id}/">{$item.title}</a>
            <div class="small text-muted hidden-xs">
                {if $item.news|trim}
                    {$item.news|trim|strip_tags|truncate}
                {else}
                    Нет текста новости
                {/if}
            </div>
        </td>
        <td>
            <i class="fa fa-clock-o text-muted"></i> {$item.unix_publish_date|ts2text}
        </td>
        <td class="text-right">
            {if $item.user_id}
                {include file="helpers/lists/actions.tpl" module_id=$module_id module_id=$controller_info.module_id id=$item_id}
            {/if}
        </td>
    </tr>
{/block}

{*
{if !$module_id && $controller_info.module_id}
    {assign var="module_id" value=$controller_info.module_id}
{/if}

{if $ar_news.data}
<table id="news-table" class="table table-valign-middle table-condensed table-hover clamped table-sticky-head footable" >
    <colgroup>
        <col width="40px"/>
        <col width="18px"/>
        <col width="18px"/>
        <col width="*"/>
        <col width="180px"/>
        <col width="50px"/>
    </colgroup>
    <thead>
    <tr>
        <th></th>
        <th data-toggle="true"></th>
        <th></th>
        <th>{L::forms_labels_title}</th>
        <th data-hide="phone" data-name="{L::forms_labels_news_publish_date}">{L::forms_labels_news_publish_date}</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    {foreach from=$ar_news.data item=news key=news_id}
		<tr data-id="{$news_id}">
            <td>
                {if $news.user_id}
                    {include file="helpers/avatar.tpl" hash=$news.user_avatar_storage_hash dir=$smarty.const.STORAGE_DIR_AVATARS_USERS}
                {else}
                    <img width="32px" src="{$smarty.const.STORAGE_DIR}{$smarty.const.STORAGE_DIR_AVATARS}intrawork_xs.jpg" alt="Avatar" class="img-avatar">
                {/if}
            </td>
            <td></td>
            <td>
                <i class="fa fa-toggle-{if $news.publish}on text-info{else}off text-muted{/if}"></i>
            </td>
			<td>
				<a class="title" href="news/view/{$news_id}/">{$news.title}</a>
				<div class="small text-muted hidden-xs">
					{if $news.news|trim}
						{$news.news|trim|strip_tags|truncate}
					{else}
						Нет текста новости
					{/if}
				</div>
			</td>
			<td>
                <i class="fa fa-clock-o text-muted"></i> {$news.unix_publish_date|ts2text}
			</td>
            <td class="text-right">
                {if $news.user_id}
                {include file="helpers/lists/actions.tpl" module_id=$module_id module_id=$controller_info.module_id id=$news_id}
                {/if}
            </td>
		</tr>
	{/foreach}
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
    {include file="helpers/lists/more.tpl" ar_data=$ar_news module_id=$module_id}
{/if}
*}