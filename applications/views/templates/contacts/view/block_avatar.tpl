{if $contact_data.avatar_storage_hash}
    <img width="320px" class="img-thumbnail" src="{include file="helpers/storage_url.tpl" hash=$contact_data.avatar_storage_hash dir=$smarty.const.STORAGE_DIR_AVATARS_CONTACTS ext="jpg" thumb="md"}" alt="Avatar">
{else}
    <img width="320px" class="img-thumbnail" src="{$smarty.const.STORAGE_DIR}{$smarty.const.STORAGE_DIR_AVATARS_CONTACTS}default_md.jpg" alt="Avatar">
{/if}


