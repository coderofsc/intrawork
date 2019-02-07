{if !$config->dev_mode}
	<script type="text/javascript" src="min/{$smarty.const.RESOURCE_VERSION|sha1}/?g={foreach from=$ar_resource name=r_js item=file}{$file}{if !$smarty.foreach.r_js.last},{/if}{/foreach}"></script>
{else}
{foreach from=$ar_resource name=r_js item=file}
	<script type="text/javascript" src="{$file}?v={$smarty.const.RESOURCE_VERSION|sha1}"></script>
{/foreach}
{/if}
