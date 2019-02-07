{*{assign var="path_size" value=$controller_info.path|sizeof}
{if $path_size > 3}{/if}*}
<ul class="breadcrumb">
	<li><a href="{$smarty.const.HOST_ROOT}">{L::intrawork}</a></li>
	{if $controller_info.path}
		{foreach from=$controller_info.path item=crump}
            {if $crump@total > 4 && $crump@index==2}
                <li><a href="#" onclick="$(this).closest('ul').find('li.hidden').removeClass('hidden'); $(this).parent().remove(); return false;">...</a></li>
            {/if}

			<li {if $crump@total > 4 && $crump@index>1 && $crump@index<$crump@total-1}class="hidden"{/if}>
                {if $crump.icon}<i class="fa text-muted {$crump.icon}"></i>&nbsp;{/if}<a {if $crump.muted}class="text-muted"{/if} href="{$crump.url}">{$crump.title}</a>
            </li>
		{/foreach}
	{/if}

	<li>{$controller_info.title}</li>
</ul>
