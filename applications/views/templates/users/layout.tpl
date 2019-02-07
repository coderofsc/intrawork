{extends file="helpers/abstracts/preview_layout.tpl"}

{*{if $controller_info.pane}
	<div class="ui-layout-center jscroll animated fadeInDown">
		{include file="main/title.tpl"}
		{include file="users/list.tpl" light=true}
	</div>

	<div class="ui-layout-east layout-preview bg-muted" id="user-view-pane">
		<div class="preview-container cm-container"></div>
	</div>

    <script>
        $("#users-table").jcatcher({
            source	: 'users/view/%DATA_ID%/?render={$smarty.const.RENDER_JSON}',
            wrap	: 'user-view-pane',
            empty   : '{$controller_info.module.name} не выбраны',
            morph   : ['{$controller_info.module.morph|implode:"','"}'],

            callback_end: function(data_id, response, e) {
                document.title = response.user.surname + ' ' +response.user.name + ' ' + response.user.patronymic;
            }
        });
    </script>

{else}
	{include file="main/title.tpl"}
    {include file="users/list.tpl" light=true}
{/if}
*}

