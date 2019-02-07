{extends file="helpers/abstracts/preview_layout.tpl"}

{*
<div class="ui-layout-center jscroll animated fadeInDown">
    {include file="main/title.tpl"}
    {include file="news/list.tpl"}
</div>

<div class="ui-layout-east layout-preview bg-muted" id="news-view-pane">
    <div class="preview-container cm-container"></div>
</div>


<script>
	$("#news-table").jcatcher({
		source	: 'news/view/%DATA_ID%/?render={$smarty.const.RENDER_JSON}',
		wrap	: 'news-view-pane',
        empty   : '{$controller_info.module.name} не выбраны',
        morph   : ['{$controller_info.module.morph|implode:"','"}'],

		callback_end: function(data_id, response, e) {
			document.title = response.news.title.replace(/"&quot;"/g, "\"");
		}
	});
</script>
*}