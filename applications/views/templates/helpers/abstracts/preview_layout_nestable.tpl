{assign var="layout_name" value=$controller_info.module.alias|replace:"/":"-"}
{assign var="layout_path" value=$controller_info.module.alias}

{if $ar_tree}
<link rel="stylesheet" href="resources/js/jquery/plugin/nestable/css/nestable.css">
<script src="resources/js/jquery/plugin/nestable/js/jquery.nestable.js"></script>
{/if}

<div class="ui-layout-center animated fadeInDown">
    {include file="main/title.tpl"}

    <form class="form-horizontal" role="form" method="post">
        <div class="dd {if $readonly}dd-readonly{/if}" id="{$layout_name}-nestable">
            {assign var="nested" value=0}
            {include file="{$layout_path}/nestable.tpl" nested=$nested ar_tree=$ar_tree}
        </div>

        {if $ar_tree && !$readonly}
            <div class="container-fluid">
                <div class="form-actions form-group">
                    <div class="col-sm-12">
                        <button id="update-order-{$layout_name}" type="submit" name="save" class="btn btn-primary">Сохранить порядок</button>
                    </div>
                </div>
            </div>
        {/if}
    </form>
</div>

<div class="ui-layout-east layout-preview bg-muted {*jscroll*}" id="{$layout_name}-view-pane">
    <div class="preview-container cm-container"></div>
</div>

{if $ar_tree}
<script>
    $("#{$layout_name}-nestable").jcatcher({
        source	    : "{$layout_path}/view/%DATA_ID%/?render={$smarty.const.RENDER_JSON}",
        wrap		: "{$layout_name}-view-pane",
        container	: ".dd",
        items		: ".dd-list .dd-content",
        empty       : "{$controller_info.module.name} не выбраны",
        morph       : ["{$controller_info.module.morph|implode:'","'}"],

        callback_complete: function(selected_id, response, selected_e) {
            document.title = $("#{$layout_name}-view-pane").find(".title").html();
            {block name=callback_complete}
            $("#{$layout_name}-view-pane").find(".page-heading .delete-record").on("click", function(e) {
                e.stopPropagation();
                $(selected_e).find(".btn-group a.delete-record").click();
                return false;
            });
            {/block}
        }
    });

    $(document).ready(function(){
        $('#{$layout_name}-nestable').nestable({
        }).on('change', function() {
            // флаг изменения
        }).change();
    });

    $("#update-order-{$layout_name}").on("click", function() {

        var json = $('#{$layout_name}-nestable').nestable('serialize');
        var btn = $(this);

        {literal}
        $.ajax({
            method: 'post',
            url: '{/literal}{$layout_path}{literal}/update_order/',
            data: {json: json},
            dataType: 'json',
            success: function(response) {
                toastr.success('{/literal}{L::toastr_update_order_message}{literal}', '{/literal}{L::toastr_update_order_title}{literal}');
                btn.button("reset");
            }
        });
        {/literal}

        return false;
    });
</script>
{/if}
