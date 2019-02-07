{extends file="helpers/abstracts/preview_layout.tpl"}

{block name="layout_east"}
    <div class="ui-layout-east" >
        {include file="demands/view/layout.tpl" readonly=false}
    </div>
    <script>
        $("#btn-message-form-pane-toggler").hide();
    </script>
{/block}

{block name="blocks"}
    <div class="pull-right text-center" style="width:60px">
        <input id="demands-table-locked" data-size="small" data-toggle="toggle" data-on="<i class='fa fa-lock'></i>" data-off="<i class='fa fa-unlock-alt'></i>" type="checkbox" {if $role_data.filter}checked{/if} value="1">
    </div>
{/block}


{block name="callback_empty"}

    DemandIW.set_demand_id(0);
    DemandIW.stop_observer();

    if (typeof CoreIW === "undefined") return;

    var demands_layout = pageLayout.center.children.super_middle_layout.center.children.middle_layout.east.children.demands_layout;
    $("#btn-message-form-pane-toggler").slideUp();
    demands_layout.hide('south');
    demands_layout.hide('north');
{/block}

{block name="callback_end"}

    DemandIW.set_demand_id(response.demand.id);
    DemandIW.start_observer();

    $("#demands-view-pane:not(.bg-light-muted)").addClass("bg-light-muted");

    if (!response.readonly) {
        $("#demands-navbar-pane").html(response.navbar_actions);
        var demands_layout = pageLayout.center.children.super_middle_layout.center.children.middle_layout.east.children.demands_layout;
        demands_layout.open('north');
    }

    DemandIW.get_member_options();
    $("#btn-message-form-pane-toggler").slideDown();

    /*$('#modal-remote').on('show.bs.modal', function () {
    console.log($(this).find("button:submit"), $(this));
    });*/

    //get_member_options();


{/block}

{block name="callback_begin"}
    var demands_layout = pageLayout.center.children.super_middle_layout.center.children.middle_layout.east.children.demands_layout;
    $("#btn-message-form-pane-toggler").slideUp();
    demands_layout.hide('south');
    demands_layout.hide('north');
{/block}

{block name="after_append"}
    CoreIW.init_donuts(args.context);
{/block}

{block name="script"}
    $(document).on("click", "#demand-tuning-form button:submit", function() {
        DemandIW.save($("#demand-tuning-form"), $(this), function() {
            $('#modal-remote').modal("hide");
        });
        return false;
    });

    function catch_member_demands() {
        $("#sidebar-block-demands-member").find("a.dmd-item").on("click", function() {
            DemandIW.find($(this).data("id"), "{$conditions|http_build_query:"cnd"}{if $conditions}&{/if}{$sort|http_build_query:"sort"}", $(this).attr('href'));
            return false;
        });
    }

    $("body").on("reload_member.sidebar", function() { catch_member_demands(); });
    $("body").on("init.layout", function() { catch_member_demands(); });

{/block}