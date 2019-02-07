{extends file="helpers/abstracts/preview_layout_nestable.tpl"}
{*

<link rel="stylesheet" href="resources/js/jquery/plugin/nestable/css/nestable.css">
<script src="resources/js/jquery/plugin/nestable/js/jquery.nestable.js"></script>

<div class="ui-layout-center animated fadeInDown">
    {include file="main/title.tpl"}

    <form class="form-horizontal" role="form" method="post">

        <div class="dd" id="departments-nestable">
            {assign var="nested" value=0}
            {include file="departments/nestable.tpl" nested=$nested ar_tree=$ar_tree_departments}
        </div>

        <div class="container-fluid">
            <div class="form-actions form-group">
                <div class="col-sm-12">
                    <button id="update-order-departments" type="submit" name="save" class="btn btn-primary">Сохранить порядок</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="ui-layout-east layout-preview bg-muted" id="dprt-view-pane">
    <div class="preview-container cm-container"></div>
</div>

<script>
	$("#departments-nestable").jcatcher({
		//source		: 'users/?render={$smarty.const.RENDER_JSON}&pane=0&cnd[dprt_id]=%DATA_ID%',
        source	    : 'departments/view/%DATA_ID%/?render={$smarty.const.RENDER_JSON}',
		wrap		: 'dprt-view-pane',
		container	: '.dd',
		items		: '.dd-list .dd-content',
        empty       : '{$controller_info.module.name} не выбраны',
        morph   : ['{$controller_info.module.morph|implode:"','"}'],

		callback_end: function(data_id, response, e) {
			document.title = e.find(".title").html();
		}
	});

	$(document).ready(function(){
		$('#departments-nestable').nestable({
		}).on('change', function() {
			// флаг изменения
		}).change();
	});

    $("#update-order-departments").on("click", function() {

        var json = $('#departments-nestable').nestable('serialize');
        var btn = $(this);

        {literal}
        $.ajax({
            method: 'post',
            url: "departments/update_order/",
            data: {json: json},
            dataType: 'json',
            success: function(response) {
                toastr.success('Порядок и вложенность подразделений обновлены!', 'Порядок обновлен');
                btn.button("reset");
            }
        });
        {/literal}

        return false;
    });

</script>
*}