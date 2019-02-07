<div class="media">
    <a data-toggle="modal" href="#modal-remote" data-remote="users/view/{$comment.user_id}/" class="forum-avatar">
        {include file="helpers/avatar.tpl" hash=$comment.user_avatar_storage_hash dir=$smarty.const.STORAGE_DIR_AVATARS_USERS responsive=false size="sm"}
        <div class="author-info">
            <strong>{$comment.user_short_fio}</strong><br/>
            {$comment.user_dprt_name}<br/>
            {$comment.user_post_name}<br/>
        </div>
    </a>
    <div class="media-body">
        <div class="text-muted">
            {$comment.create_date_unix|ts2text}
        </div>
        <ul class="list-inline">
            {foreach from=$comment.ar_attach item=attach}
                <li>
                    <a target="_blank" class="label-group {if ($attach.mimetype|substr:0:5)=="image"}fancybox{/if}" rel="attach-{$message.id}" href="{include file="helpers/storage_url.tpl" hash=$attach.hash dir=$attach.root name=$attach.name ext=$attach.ext}">
                        <span class="label label-tag"><i class="fa fa-files-o"></i> {$attach.name}.{$attach.ext}</span><span class="label label-default">({$attach.size|filesize})</span>
                    </a>
                </li>
            {/foreach}
        </ul>

        {$comment.text|nl2br}
    </div>
</div>