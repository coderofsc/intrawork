{assign var="layout_name" value=$controller_info.module.alias|replace:"/":"-"}
{assign var="layout_path" value=$controller_info.module.alias}

{if $controller_info.pane}

    <div class="ui-layout-center animated fadeInDown">

        <div class="ui-layout-content jscroll-pager">
            {include file="main/title.tpl"}
            {block name=prepend}{/block}
            {include file="{$layout_path}/list.tpl"}
        </div>

        <div class="{*row2 *}ui-pane-footer" id="{$layout_name}-pager" style="padding:5px; background-color: #f2f1ef">
                <div class="pull-left" style="width:220px;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-sm btn-page-prev"> <i class="fa fa-angle-double-left"></i> </button>
                        </span>
                        <span class="input-group-addon">Стр.</span>
                        <input type="text" class="form-control text-center input-sm current-page" value="1"  />
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-page-search" type="button"><i class="fa fa-search"></i></button>
                        </span>
                        <span class="input-group-addon">из <span class="max-page">{ceil($controller_info.total/30)}</span></span>
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-sm btn-page-next"> <i class="fa fa-angle-double-right"></i> </button>
                        </span>
                   </div>
                </div>
                <div class="pull-right text-center" style="width:60px">
                    <div class="btn-group">
                        <button class="btn btn-default btn-sm btn-cmp-prev"> <i class="fa fa-angle-left"></i> </button>
                        <button class="btn btn-default btn-sm btn-cmp-next"> <i class="fa fa-angle-right"></i> </button>
                    </div>
                </div>

                {block name="blocks"}
                {/block}

            <div class="clearfix"></div>
            </div>

    </div>

    {block name="layout_east"}
        {capture name=content}
            <div class="ui-pane-header ui-pane-header-pager" style="display: none">{include file="helpers/lists/next_prev.tpl" np_calc=true}</div>
            <div class="ui-layout-content preview-container cm-container"></div>
        {/capture}

        {if $controller_info.module.comments}
            <div class="ui-layout-east">
                <div class="ui-layout-center layout-preview bg-muted" id="{$layout_name}-view-pane">
                    {$smarty.capture.content}
                </div>

                {include file="comments/pane.tpl"}
            </div>
        {else}
            <div class="ui-layout-east layout-preview bg-muted" id="{$layout_name}-view-pane">
                {$smarty.capture.content}
            </div>
        {/if}

    {/block}

    <script>
        $("#{$layout_name}-table").jcatcher({
            source	: "{$layout_path}/view/%DATA_ID%/?render={$smarty.const.RENDER_JSON}&pane=0{if $conditions}&{$conditions|http_build_query:"cnd"}{if $conditions}&{/if}{$sort|http_build_query:"sort"}&{$group|http_build_query:"group"}{/if}",
            wrap	: "{$layout_name}-view-pane",
            empty   : "{$controller_info.module.name} {L::text_not_selected_plural}",
            morph   : ["{$controller_info.module.morph|implode:'","'}"],

            $paging: $("#{$layout_name}-pager"),
            conditions: '{$conditions|http_build_query:"cnd"}{if $conditions}&{/if}{$sort|http_build_query:"sort"}&{$group|http_build_query:"group"}',


            callback_begin     : function(selected_id, selected_e) {
                document.title = 'Загрузка...';
                $("#{$layout_name}-view-pane").find(".ui-pane-header-pager:visible").hide();

                {if $controller_info.module.comments}
                    commentsIW.hide_toggler();
                {/if}

                {block name=callback_begin}
                {/block}
            },

            callback_end: function(data_id, response, e) {

                $("#{$layout_name}-view-pane").find(".ui-pane-header-pager:hidden").show();
                // В next_prev.tpl
                if(typeof np_calc == 'function') {
                    np_calc(data_id);
                }

                {if $controller_info.module.comments}
                    commentsIW.set_owner(data_id);
                    commentsIW.show_toggler();
                {/if}

                {block name=callback_end}
                {/block}
            },

            callback_empty: function() {
                $("#{$layout_name}-view-pane").find(".ui-pane-header-pager:visible").hide();
                {if $controller_info.module.comments}
                    commentsIW.hide_toggler();
                {/if}

                {block name=callback_empty}
                {/block}
            },

            callback_complete: function(selected_id, response, selected_e) {
                document.title = decode_entities($("#{$layout_name}-view-pane").find(".title").html().replace(/<[^>]+>/g,''));
                $("#{$layout_name}-view-pane").find(".page-heading .delete-record").on("click", function(e) {
                    e.stopPropagation();
                    $(selected_e).find(".btn-group a.delete-record").click();
                    return false;
                });

                $("body").trigger("previewLoaded.content");
                $("#{$layout_name}-view-pane").find(".ui-layout-content").scrollTo(0, 800);
                {block name=callback_complete}
                {/block}
            }
        });
    </script>
{else}
    {include file="main/title.tpl"}
    {include file="{$layout_name}/list.tpl"}
{/if}

<script>

    {block name="script"}
    {/block}

    $('body').bind('init.layout', function(event){
        $('.jscroll-pager').jscroll({
            autoTrigger: false,
            $paging: $("#{$layout_name}-pager"),
            replace: true,
            page_url_template: '{$layout_path}/?render=4&page=%PAGE%&continue=true&{$conditions|http_build_query:"cnd"}{if $sort}&{/if}{$sort|http_build_query:"sort"}'
        });

        /*var selected = $.cookie('jcatcher-selected');
        if (selected != undefined) {
            DemandIW.find(selected, "{$conditions|http_build_query:"cnd"}{if $conditions}&{/if}{$sort|http_build_query:"sort"}", null);
        }*/
    });


    $("#prev-next-nav").find(".previous:not(:disabled)").on("click", function(){
        if (!$("#{$layout_name}-table").jcatcher.prev()) {
            $(this).addClass("disabled");
            toastr.info('Достигнуто начало списка', 'Переход на предыдущую запись');
        }
        return false;
    });

    $("#prev-next-nav").find(".next:not(:disabled)").on("click", function(){
        if (!$("#{$layout_name}-table").jcatcher.next()) {
            $(this).addClass("disabled");
            toastr.info('Достигнут конец списка', 'Переход на следующую запись');
        }
        return false;
    });

    $("#{$layout_name}-table").closest(".jscroll-pager").on("jscroll-after-append", function(event, args) {
        {block name="after_append"}
        {/block}
    });
</script>


