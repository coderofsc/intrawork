{if $user_data.avatar_storage_hash}
    <a href="{include file="helpers/storage_url.tpl" hash=$user_data.avatar_storage_hash dir=$smarty.const.STORAGE_DIR_AVATARS_USERS ext=$user_data.avatar_storage_ext}" class="fancybox">
    <img width="320px" height="320px" class="img-thumbnail" src="{include file="helpers/storage_url.tpl" hash=$user_data.avatar_storage_hash dir=$smarty.const.STORAGE_DIR_AVATARS_USERS ext="jpg" thumb="md"}" alt="Avatar">
    </a>
{else}
    <img width="320px" height="320px" class="img-thumbnail" src="{$smarty.const.STORAGE_DIR}{$smarty.const.STORAGE_DIR_AVATARS_USERS}default_md.jpg" alt="Avatar">
{/if}


