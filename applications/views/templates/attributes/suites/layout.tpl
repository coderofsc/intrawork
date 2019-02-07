{*<div class="ui-layout-center" data-src="ajax_points/attributes.php?action=view&attribute_id=%DATA_ID%" data-wrap="attribute-view-pane">*}
<div class="ui-layout-center animated fadeInDown">
    {include file="main/title.tpl" light=true}
    {include file="attributes/suites/list.tpl" light=true}
</div>

<div class="ui-layout-east layout-preview bg-muted" id="attribute-suite-view-pane">
    <div class="preview-container cm-container"></div>
</div>

<script>
	$("#attribute-suite-table").jcatcher({
		source	: 'attributes_suites_view/?render={$smarty.const.RENDER_JSON}&suite_id=%DATA_ID%',
		wrap	: 'attribute-suite-view-pane',
        empty   : '{$controller_info.module.name} не выбраны',
        morph   : ['{$controller_info.module.morph|implode:"','"}'],

		callback_end: function(data_id, response, e) {
			document.title = response.suite.name;
		},

		callback_begin: function() {
			document.title = 'Загрузка...';
		}
	});
</script>
