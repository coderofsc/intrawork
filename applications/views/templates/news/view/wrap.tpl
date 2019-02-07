<p class="text-muted">{$news_data.unix_publish_date|ts2text}</p>
<div class="clearfix"></div>
{$news_data.news}
<div class="clearfix"></div>
<div class="space"></div>
{if $news_data.user_id}
    <div class="pull-left right-space">
        {include file="helpers/avatar.tpl" hash=$news_data.user_avatar_storage_hash dir=$smarty.const.STORAGE_DIR_AVATARS_USERS}
    </div>
    <div class="pull-left">
        <div>
            <a data-toggle="modal" href="#modal-remote" data-remote="users/view/{$news_data.user_id}/">
                {$news_data.user_fio}
            </a>
        </div>
        <div>
            {if $news_data.user_post_id}<span class="text-muted">{$news_data.user_post_name}</span>{/if}
            {if $news_data.user_dprt_id}<span class="text-muted">{$news_data.user_dprt_name}</span>{/if}
        </div>
    </div>
{else}
    <div class="pull-left right-space">
        <img width="32px" src="{$smarty.const.STORAGE_DIR}{$smarty.const.STORAGE_DIR_AVATARS}intrawork_xs.jpg" alt="" class="img-avatar img-circle">
    </div>
    <div class="pull-left">
        <div>{L::intrawork}</div>
        <div class="text-muted small">{L::meta_title|mb_ucfirst}</div>
    </div>
{/if}

<div class="clearfix"></div>
<div class="space"></div>
