<style>
    .search-result .extra {
        width:64px; height:64px;
        text-align: center;
        margin-right:15px;
        float:left;
    }
</style>

{if $search_data.result}
<table class="table table-search clamped-margin-bottom">
    {assign var="old_type" value=0}
    {foreach from=$search_data.result item=object}
        {if $old_type != $object.object_type}
            <tr>
                <td>
                    <h4>
                        {if $object.object_type == $smarty.const.OWNER_USER}
                            {L::modules_users_name}
                        {elseif $object.object_type == $smarty.const.OWNER_CONTACT}
                            {L::modules_contacts_name}
                        {elseif $object.object_type == $smarty.const.OWNER_DEMAND}
                            {L::modules_demands_name}
                        {elseif $object.object_type == $smarty.const.OWNER_NEWS}
                            {L::modules_news_name}
                        {/if}
                    </h4>
                </td>
            </tr>
            {assign var="old_type" value=$object.object_type}
        {/if}
        <tr>
            <td>
                <div class="search-result media">
                {if $object.object_type == $smarty.const.OWNER_USER}
                        <a class="extra" href="{$smarty.const.HOST_ROOT}{$object.link}">
                            {include file="helpers/avatar.tpl" hash=$object.extra_data dir=$smarty.const.STORAGE_DIR_AVATARS_USERS size="sm" responsive=true}
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="{$smarty.const.HOST_ROOT}{$object.link}">{$object.title}</a></h4>
                            <a href="{$smarty.const.HOST_ROOT}{$object.link}" class="text-muted search-link">{$smarty.const.HOST_ROOT}{$object.link}</a>
                            <p>{$object.description|trim}</p>
                        </div>
                {elseif $object.object_type == $smarty.const.OWNER_CONTACT}
                    <a class="extra" href="{$smarty.const.HOST_ROOT}{$object.link}">
                        {include file="helpers/avatar.tpl" hash=$object.extra_data dir=$smarty.const.STORAGE_DIR_AVATARS_CONTACTS size="sm" responsive=true}
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="{$smarty.const.HOST_ROOT}{$object.link}">{$object.title}</a></h4>
                        <a href="{$smarty.const.HOST_ROOT}{$object.link}" class="text-muted search-link">{$smarty.const.HOST_ROOT}{$object.link}</a>
                        <p>{$object.description|trim}</p>
                    </div>

                {elseif $object.object_type == $smarty.const.OWNER_DEMAND}
                    <div class="extra">
                        <i class="fa fa-lg text-{m_demands::$ar_status[$object.extra_data].color} fa-{m_demands::$ar_status[$object.extra_data].icon}" title="{m_demands::$ar_status[$object.extra_data].name}"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="{$smarty.const.HOST_ROOT}{$object.link}">{$object.title}</a></h4>
                        <a href="{$smarty.const.HOST_ROOT}{$object.link}" class="text-muted search-link">{$smarty.const.HOST_ROOT}{$object.link}</a>
                        <p>{$object.description|trim}</p>
                    </div>
                {elseif $object.object_type == $smarty.const.OWNER_NEWS}
                    <a class="extra" href="{$smarty.const.HOST_ROOT}{$object.link}">
                        {include file="helpers/avatar.tpl" hash=$object.extra_data dir=$smarty.const.STORAGE_DIR_AVATARS_CONTACTS size="sm" responsive=true}
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="{$smarty.const.HOST_ROOT}{$object.link}">{$object.title}</a></h4>
                        <a href="{$smarty.const.HOST_ROOT}{$object.link}" class="text-muted search-link">{$smarty.const.HOST_ROOT}{$object.link}</a>
                        <p>{$object.description|trim}</p>
                    </div>

                {/if}
                </div>
            </td>
        </tr>

    {/foreach}
</table>

<ul class="pager">
    <li><a href="search/?render={$smarty.const.RENDER_JSON}&offset={$offset+$limit}&continue=true&text={$search_data.text}&{$conditions|http_build_query:"cnd"}">{L::text_load_more}</a></li>
</ul>
{/if}