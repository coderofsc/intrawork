<div class="file-box file-type-{if !$file.group}all{else}{$file.group}{/if} mix">

    <div class="file" data-id="{$file.id}">
        {if $file.user_eid == $cuser_data.eid || cls_modules::MODULE_FILES|access:m_roles::CRUD_D}
            <a href="#" class="file-delete"><i class="fa text-danger fa-times"></i></a>
        {/if}
        <a {if $file.group == "image"}class="fancybox" rel="fm-images[]"{/if} href="{include file="helpers/storage_url.tpl" name=$file.name hash=$file.hash dir=$smarty.const.STORAGE_DIR_FILES ext=$file.ext}">
            <span class="corner"></span>

            {if $file.group == "image"}
                <div class="image">
                    <img src="{include file="helpers/storage_url.tpl" hash=$file.hash dir=$smarty.const.STORAGE_DIR_FILES ext=$file.ext thumb="md"}" class="img-responsive" alt="image">
                </div>
            {elseif $file.group == "audio"}
                <div class="icon">
                    <i class="fa fa-music"></i>
                </div>
            {elseif $file.group == "video"}
                <div class="icon">
                    <i class="fa fa-file-video-o"></i>
                </div>
            {elseif $file.group == "doc"}
                <div class="icon">
                    <i class="fa fa-file-text-o"></i>
                </div>
            {else}
                <div class="icon">
                    <i class="fa fa-file"></i>
                </div>
            {/if}
            <div class="file-name">
                <div class="title text-ellipsis">{$file.name}.{$file.ext}</div>
                <div class="space space-xs"></div>
                <div class="small">{$file.user_short_fio}</div>
                <div class="small">{$file.create_date_unix|ts2text}<div class="pull-right">{$file.size|filesize}</div></div>
            </div>
        </a>
    </div>
</div>
