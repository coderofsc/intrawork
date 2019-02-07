<div class="modal-header">
	{*<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>*}

	<div class="action-block">
		{if $controller_info.actions}
			{foreach from=$controller_info.actions item=action}
				<a {if $action.delete}data-confirm-title="{L::crud_delete} {if $controller_info.module}{$controller_info.module.morph.1}{else}{L::text_object_morph_two}{/if}" data-confirm="{L::confirm_delete_message}"{/if} href="{$action.href}" class="{if $action.delete}confirmcall{/if} btn btn-{if $action.type}{$action.type}{else}default{/if} btn-sm">
                    {if $action.icon}<i class="fa fa-{$action.icon}"></i> {/if}{$action.name}
                </a>
			{/foreach}
		{/if}
		<button type="button" data-dismiss="modal" class="btn btn-default btn-sm" aria-hidden="true">&times;</button>
	</div>

	<h4 class="modal-title">{if $controller_info.title}{$controller_info.title}{else}{L::text_unknown_controller}!{/if}</h4>
	{include file="main/breadcrumb.tpl"}
</div>
<div class="modal-body">
	{if $query_log_result}{$query_log_result}{/if}
	{include file="helpers/alerts.tpl"}
	{$controller_data}
</div>
