{extends file="helpers/abstracts/preview_layout.tpl"}

{*
<div class="ui-layout-center animated fadeInDown">
    {include file="main/title.tpl" light=true}
    {include file="roles/list.tpl" light=true}
</div>

<div class="ui-layout-east layout-preview bg-muted" id="role-view-pane">
    <div class="preview-container cm-container"></div>
</div>

<script>
	$("#roles-table").jcatcher({
		source	: 'roles/view/%DATA_ID%/?render={$smarty.const.RENDER_JSON}',
		wrap	: 'role-view-pane',
        empty   : '{$controller_info.module.name} не выбраны',
        morph   : ['{$controller_info.module.morph|implode:"','"}'],

		callback_end: function(data_id, response, e) {
			document.title = response.role.name;
		},

		callback_begin: function() {
			document.title = 'Загрузка...';
		}
	});
</script>
*}