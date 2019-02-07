{*<h3>Связанные заявки</h3>*}

<link rel="stylesheet" href="resources/js/jquery/plugin/nestable/css/nestable.css">
<script src="resources/js/jquery/plugin/nestable/js/jquery.nestable.js"></script>

<form class="form-horizontal">
    <div class="dd" id="branch-nestable">
        {include file="demands/view/branch/nestable.tpl" ar_tree=$ar_branch_tree}
    </div>

    <div class="form-actions form-group">
        <div class="col-sm-12">
            <button class="btn btn-default" name="save" type="submit" id="update-order-branch">Сохранить порядок</button>
        </div>
    </div>
</form>




<script>
    $(document).ready(function(){
        $('#branch-nestable').nestable({
        }).on('change', function() {
            $("#demand-branch .form-actions .btn").removeClass("btn-default").addClass("btn-primary");
        });
    });

    $("#update-order-branch").on("click", function() {

        var json = $('#branch-nestable').nestable('serialize');
        var btn = $(this);

        {literal}
        $.ajax({
            method: 'post',
            url: 'demands/branch_update_orders/{/literal}{$demand_data.branch}{literal}/',
            data: {json: json},
            dataType: 'json',
            success: function(response) {
                toastr.success('{/literal}{L::toastr_update_order_message}{literal}', '{/literal}{L::toastr_update_order_title}{literal}');
                btn.button("reset");
                $("#demand-branch .form-actions .btn").removeClass("btn-primary").addClass("btn-default");
            }
        });
        {/literal}

        return false;
    });

</script>
