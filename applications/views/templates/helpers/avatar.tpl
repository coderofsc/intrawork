{if !$size}
    {assign var="size" value="xs"}
{/if}

{if $size=="xs"}
    {assign var="size_px" value="32px"}
{elseif $size=="sm"}
    {assign var="size_px" value="128px"}
{else}
    {assign var="size_px" value="256px"}
{/if}


{if $hash}
    <img width="{$size_px}" src="{include file="helpers/storage_url.tpl" hash=$hash dir=$dir ext="jpg" thumb=$size}" alt="Avatar" class="img-avatar img-circle{if $responsive} img-responsive{/if}" {if $id}data-user-id="{$id}"{/if}>
{else}
    <img width="{$size_px}" src="{$smarty.const.STORAGE_DIR}{$dir}default_{$size}.jpg" alt="Avatar" class="img-avatar img-circle {if $responsive} img-responsive{/if}" {if $id}data-user-id="{$id}"{/if}>
{/if}
