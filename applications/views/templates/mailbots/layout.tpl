{extends file="helpers/abstracts/preview_layout.tpl"}

{*
<div class="ui-layout-center jscroll animated fadeInDown">
    {include file="main/title.tpl"}
	{include file="mailbots/list.tpl"}
</div>

<div class="ui-layout-east layout-preview bg-muted jscroll" id="mailbot-view-pane">
    <div class="preview-container cm-container"></div>
</div>

<script>
	$("#mailbots-table").jcatcher({
		source	: 'mailbots/view/%DATA_ID%/?render={$smarty.const.RENDER_JSON}',
		wrap	: 'mailbot-view-pane',
        empty   : '{$controller_info.module.name} не выбраны',
        morph   : ['{$controller_info.module.morph|implode:"','"}'],

		callback_end: function(data_id, response, e) {
			document.title = e.find(".title").html();
		}
	});
</script>
*}