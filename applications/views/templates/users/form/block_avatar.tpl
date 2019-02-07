<link href="resources/js/jquery/plugin/cropper/css/cropper.min.css" rel="stylesheet" type="text/css" />
<script src="resources/js/jquery/plugin/cropper/js/cropper.min.js"></script>

<div id="crop-avatar">
    <!-- Current avatar -->
    <div data-target="user" class="avatar-view img-thumbnail" title="Сменить фотографию">
        {if $user_data.avatar_storage_hash}
            <img data-original-src="{include file="helpers/storage_url.tpl" hash=$user_data.avatar_storage_hash dir=$smarty.const.STORAGE_DIR_AVATARS_USERS ext=$user_data.avatar_storage_ext}" src="{include file="helpers/storage_url.tpl" hash=$user_data.avatar_storage_hash dir=$smarty.const.STORAGE_DIR_AVATARS_USERS ext="jpg" thumb="md"}" alt="Avatar">
        {else}
            <img src="{$smarty.const.STORAGE_DIR}{$smarty.const.STORAGE_DIR_AVATARS_USERS}default_md.jpg" alt="Avatar">
        {/if}
    </div>
    <input name="user_data[avatar_storage_hash]" class="avatar-storage-hash" type="hidden" value="{$user_data.avatar_storage_hash}" />
</div>

<link href="resources/js/jquery/plugin/cropper/css/avatar.css" rel="stylesheet" type="text/css" />
<script src="resources/js/jquery/plugin/cropper/js/avatar.js"></script>
