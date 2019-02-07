{extends file="helpers/abstracts/preview_layout.tpl"}

{*

<div class="ui-layout-center jscroll animated fadeInDown">
    {include file="main/title.tpl"}
	{include file="mrooms/reservations/list.tpl"}
</div>

<div class="ui-layout-east layout-preview bg-muted jscroll" id="mrooms-reservations-view-pane">
    <div class="preview-container cm-container"></div>
</div>

<script>
	$("#mrooms-reservations-table").jcatcher({
		source	: 'mrooms/reservations/view/%DATA_ID%/?render={$smarty.const.RENDER_JSON}',
		wrap	: 'mrooms-reservations-view-pane',
        empty   : '{$controller_info.module.name} не выбраны',
        morph   : ['{$controller_info.module.morph|implode:"','"}'],

		callback_end: function(data_id, response, e) {
			document.title = e.find(".title").html();
		}
	});
</script>
*}