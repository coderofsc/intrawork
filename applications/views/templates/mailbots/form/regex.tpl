<div class="form-group">
    <label for="mb_data_regex" class="col-sm-3 control-label">Очистка писем</label>
    <div class="col-sm-9">

        {function name=regex data=[] index=0}
            <div class="input-group input-regex">
                <span class="input-group-addon">/</span>
                <input type="text" class="form-control" name="mb_data[regex][{$index}][expr]" value="{$data.expr}">
                <span class="input-group-addon">/</span>
                <input type="text" class="form-control" name="mb_data[regex][{$index}][modifier]" value="{$data.modifier}" placeholder="gmixXsuUAJ">
                <span class="input-group-btn">
                    <button class="btn btn-default btn-{if $index}delete{else}add{/if}" type="button"><i class="fa fa-{if $index}minus{else}plus{/if}"></i></button>
                </span>
            </div>
        {/function}

        <div id="list-regex">
        {foreach from=$mb_data.regex item=regex}
            {regex data=$regex index=$regex@index}
        {foreachelse}
            {regex data=[] index=0}
        {/foreach}
        </div>

        <div class="help-block">
            Перечислите регулярные выражения (каждое на отдельной строке), для фильтрации содержимого письма.<br/>
            Все вхождения, удовлетворяющие указанным условиям, будут удалены из тела писем.
        </div>
    </div>
</div>

<script>
    var $list_regex = $("#list-regex");
    function regex_reindex() {
        $list_regex.find(".input-group").each(function(index) {
            $(this).find("input").each(function() {
                var name = $(this).attr("name");
                $(this).attr("name", name.replace(/\[(\d+)\]/, '['+(index)+']'));
            });
        });
    }

    $list_regex.delegate(".btn-add", "click", function() {
        var $clone = $(this).closest(".input-group").clone();
        $clone.find(".btn-add").toggleClass("btn-add btn-delete").find(".fa-plus").toggleClass("fa-plus fa-minus");
        $clone.find("input").val("");
        $list_regex.append($clone);
        regex_reindex();
    });

    $list_regex.delegate(".btn-delete", "click", function() {
        $(this).closest(".input-group").remove();
        regex_reindex();
    });
</script>