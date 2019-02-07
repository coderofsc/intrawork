<div class="container-fluid clamped-margin-bottom well well-sm {if $message.style}well-{$message.style}{else}bg-white{/if}">

    <div class="media{* border-bottom*}">
        <div class="pull-left i-checks" style="padding-top:5px">
            <input type="checkbox" value="{$message.id}" {if $message.status}checked=""{/if} class="message-status">
            {*
            <!-- Single button -->
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                </ul>
            </div>
            *}
        </div>

        {if $message.user_from_id}
        <a data-toggle="modal" href="#modal-remote" data-remote="users/view/{$message.user_from_id}/" class="pull-left">
            {include file="helpers/avatar.tpl" hash=$message.user_from_avatar_storage_hash dir=$smarty.const.STORAGE_DIR_AVATARS_USERS}
        </a>
        {else}
            <div class="pull-left">
            {include file="helpers/avatar.tpl" hash=false dir=$smarty.const.STORAGE_DIR_AVATARS_USERS}
            </div>
        {/if}
        <div class="media-body">
            <div class="media-heading">
                <table style="width:100%">
                    <colgroup>
                        <col width="50"/>
                        <col width="*"/>
                    </colgroup>
                    <tr>
                        <td>От:</td>
                        <td>
                            <div class="pull-left">
                                {if $message.user_from_id}<a data-toggle="modal" href="#modal-remote" data-remote="users/view/{$message.user_from_id}/">{$message.user_from_fi}</a>{else}{$message.user_from_email}{/if}
                            </div>
                            <div class="pull-right {if !$message.first}text-muted{/if}">
                                <span class="label label-tag">
                                <i class="fa fa-clock-o"></i> {$message.unix_create_date|ts2text}
                                    </span>
                            </div>
                        </td>
                    </tr>
                    <tr class="message-details {*hidden*}">
                        <td>Кому:</td>
                        <td>
                            {if $message.to_eid}
                                {if $message.user_to_id}<a data-toggle="modal" href="#modal-remote" data-remote="users/view/{$message.user_to_id}/">{$message.user_to_fi}</a>{else}{$message.user_to_email}{/if}
                            {else}
                                <span class="text-muted">&mdash;</span>
                            {/if}
                            {if $message.ar_copies}
                                Копия:
                                {foreach from=$message.ar_copies item=copy}
                                    {if $copy.user_id}<a data-toggle="modal" href="#modal-remote" data-remote="users/view/{$copy.user_id}/">{$copy.user_fi}</a>{else}{$copy.user_email}{/if}{if !$copy@last}, {/if}
                                {/foreach}
                            {/if}

                        </td>
                    </tr>
                    {*
                    <tr>
                        <td colspan="2">
                            <a href="#" class="text-muted show-details">Показать детали</a>
                        </td>
                    </tr>
                    *}
                </table>
            </div>


            {*<div class="media-bottom text-muted"></div>*}
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="container-fluid well well-sm bg-white" style="border-top:0">

    {*<div class="space space-xs"></div>*}

    {if $message.ar_attach}
    <ul class="list-inline">
        {foreach from=$message.ar_attach item=attach}
            <li>
                <a target="_blank" class="label-group {if ($attach.mimetype|substr:0:5)=="image"}fancybox{/if}" rel="attach-{$message.id}" href="{include file="helpers/storage_url.tpl" hash=$attach.hash dir=$smarty.const.STORAGE_DIR_DEMANDS name=$attach.name ext=$attach.ext}">
                   <span class="label label-tag"><i class="fa fa-files-o"></i> {$attach.name}.{$attach.ext}</span><span class="label label-default">({$attach.size|filesize})</span>
                </a>
            </li>
        {/foreach}
        </ul>
    {/if}

    <div style="overflow-x: auto">
        {if $message.message}
            {$message.message}
        {else}
            <p class="text-muted">
                Пустое сообщение
            </p>
        {/if}
    </div>
</div>


