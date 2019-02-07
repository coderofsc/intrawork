<ul class="pager clamped list-inline {*pull-right*}" id="prev-next-nav" style="font-size:13px;">
    <li class="previous disabled"><a href="#">&larr; Назад</a></li>
    <li class="hidden-xs">
        {$controller_info.module.morph.0|mb_ucfirst}
    </li>
    <li>
        <span class="rownum">0</span> из <a href="{$controller_info.module.alias}/{if $conditions}?{/if}{$conditions|http_build_query:"cnd"}{if $conditions}&{else}?{/if}{$sort|http_build_query:"sort"}"><span class="total">0</span></a>
        {*<i class="fa text-muted fa-question" data-container="body" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-title="Порядковый номер" data-content="Порядковый номер {$controller_info.module.morph.1} в списке расчитывается исходя из условий отбора и сортировки данных."></i>*}
    </li>
    <li class="next disabled"><a href="#">Вперед &rarr;</a></li>
</ul>
<div class="clearfix"></div>

{if $np_calc}
<script>

    $("#prev-next-nav").on("click", ".previous.disabled a, .next.disabled a", function() { return false; });

    function np_calc(id) {
        $("#prev-next-nav").find(".rownum").html('<i class="fa fa-spinner fa-spin"></i>');
        $("#prev-next-nav").find(".total").html('<i class="fa fa-spinner fa-spin"></i>');
        $("#prev-next-nav").find(".previous").addClass("disabled");
        $("#prev-next-nav").find(".next").addClass("disabled");

        var query = "{if $conditions}?{/if}{$conditions|http_build_query:"cnd"}{if $conditions}&{else}?{/if}{$sort|http_build_query:"sort"}&{$group|http_build_query:"group"}";
        $.ajax({
            url: "/{$controller_info.module.alias}/view/"+id+"/get_next_prev_id/",
            dataType: 'json',
            method: 'get',
            data: "{$conditions|http_build_query:"cnd"}{if $conditions}&{/if}{$sort|http_build_query:"sort"}&{$group|http_build_query:"group"}",
            success: function (response) {
                if (response.status == 200) {

                    if (response.data.prev) {
                        $("#prev-next-nav").find(".previous").removeClass("disabled").children("a").attr("href", "{$controller_info.module.alias}/view/"+response.data.prev+"/"+query);
                    }

                    if (response.data.next) {
                        $("#prev-next-nav").find(".next").removeClass("disabled").children("a").attr("href", "{$controller_info.module.alias}/view/"+response.data.next+"/"+query);
                    }

                    $("#prev-next-nav").find(".rownum").html(response.data.rownum);
                    $("#prev-next-nav").find(".total").html(response.data.total);

                } else {
                    toastr.error("Ошибка получения позиции компании в списке", "Позиция");

                }
            }
        });
    }

    {if $id}
    $(document).ready(function() {
        np_calc({$id});
    });
    {/if}

</script>
{/if}
