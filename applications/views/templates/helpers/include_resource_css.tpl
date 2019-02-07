{if !$config->dev_mode}
	<link type="text/css" rel="stylesheet" href="min/{$smarty.const.RESOURCE_VERSION|sha1}/?g={foreach from=$ar_resource name=r_css item=file}{$file}{if !$smarty.foreach.r_css.last},{/if}{/foreach}" />
{else}
{foreach from=$ar_resource name=r_css item=file}
	<link type="text/css" rel="stylesheet" href="{$file}?v={$smarty.const.RESOURCE_VERSION|sha1}"/>
{/foreach}
{/if}
