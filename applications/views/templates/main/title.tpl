{*
<h1 class="page-header">
{if $controller_info.title}
    {$controller_info.title}
    {if $controller_info.sub_title}
        <small>{$controller_info.sub_title}</small>
    {/if}
{else}
    Неизвестный компонент!
{/if}
</h1>*}


{if $smarty.const.RENDER_MODE != $smarty.const.RENDER_MODAL}
	<div class="container-fluid">
		<div class="page-heading">
            <table class="page-heading-table" width="100%">
                <colgroup>
                    <col width="*" />
                </colgroup>
                <tr>
                    <td>
                        <div class="title">
                            {if $controller_info.title}{$controller_info.title}{else}{L::text_unknown_controller}!{/if}
                        </div>
                        {if $controller_info.total}
                            {assign var="object_morph" value=$controller_info.module.morph|implode:";"}

                            <div class="small">
                                {if $conditions}{L::text_found_total_conditions}{else}{L::text_found_total}{/if} &mdash; {$controller_info.total} {$controller_info.total|declension:$object_morph}
                            </div>
                        {/if}
                    </td>
                    <td class="text-right" nowrap="true" valign="top">
                        {if $controller_info.actions}
                            <div class="action-block">
                                {foreach from=$controller_info.actions item=action}
                                    <a {if $action.data}{foreach from=$action.data item=value key=name}data-{$name}="{$value}"{/foreach}{/if} {if $action.modal}{if !$action.inline}href="#modal-remote" data-remote="{$action.href}"{else}href="{$action.href}"{/if} data-toggle="modal"{else}href="{$action.href}" {if $action.delete}data-callback="deleted_record" data-confirm-title="{L::crud_delete} {if $controller_info.module}{$controller_info.module.morph.1}{else}{L::text_object_morph_two}{/if}" data-confirm="{L::confirm_delete_message}"{/if}{/if} class="btn btn-{if $action.type}{$action.type}{else}default{/if} btn-sm{if $action.class} {$action.class}{/if}{if $action.delete} ajaxcall delete-record{/if}" title="{$action.name|strip_tags}">{if $action.icon}<i class="fa fa-{$action.icon}"></i> {/if}{$action.name}</a>
                                {/foreach}
                            </div>
                        {/if}
                    </td>
                </tr>
            </table>
    		<div class="clearfix"></div>
		</div>
	</div>

    {if $controller_info.module_id}
    <script>
        var module_alias = '{$controller_info.module.alias}';
        function deleted_record() {
            location.href = module_alias+'/';
        }
    </script>
    {/if}

	{if $breadcrumb !== false}
        <div class="pull-left">{include file="main/breadcrumb.tpl"}</div>
	{/if}

    {include file="helpers/lists/sortgroup.tpl" ar_sort=$controller_info.ar_sort ar_group=$controller_info.ar_group}

    {*{if $controller_info.ar_sort}
        <div class="pull-right">{include file="helpers/lists/sortgroup.tpl" ar_sort=$controller_info.ar_sort ar_group=$controller_info.ar_group}</div>
    {/if}
    {if $controller_info.ar_group}
        <div class="pull-right">{include file="helpers/lists/sortgroup.tpl" ar_sort=$controller_info.ar_group sort=$group}</div>
    {/if}*}


    <div class="clearfix"></div>
{/if}

{if $system_alerts}
    <div class="container-fluid">
        {include file="helpers/alerts.tpl"}
    </div>
    <div class="space"></div>
{/if}
