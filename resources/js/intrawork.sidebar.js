/*var coreIw = (function () {
    return {
        init: function() {
            alert("init");
        }
    }

})();*/

var SidebarIW = {
    reload_demands_member: function() {
        var $block = $("#sidebar-block-demands-member");
        var $badge = $block.find(".sidebar-block > li > a .badge");
        $badge.html('<i class="fa fa-spinner fa-spin"></i>');

        $.ajax({
            url: 'dashboard/reload_demands_member/',
            dataType: 'json',
            success: function (response) {
                $block.html(response.data);
                $('body').trigger('reload_member.sidebar');
            }
        });
    },

    reload_cat_dmd_counts: function() {
        var $block = $("#sidebar-block-categories");
        var $badge = $block.find("a.cat-dmd-count .badge");

        $badge.parent().removeClass("hidden");
        $badge.html('<i class="fa fa-spinner fa-spin"></i>');

        $.ajax({
            url: 'categories/calc_demands/',
            dataType: 'json',
            success: function (response) {
                $badge.parent().addClass("hidden");
                $.each(response, function(cat_id, count) {
                    var $current = $block.find("a.cat-dmd-count[data-id="+cat_id+"] .badge");
                    //console.log("a.cat-dmd-count[data-id="+cat_id+"] .badge", $current);
                    if (count) {
                        $current.parent().removeClass("hidden");
                    }
                    $current.html(count);
                });
                //$block.html(response.data);
                //$('body').trigger('reload_member.sidebar');
            }
        });
    },


    init_demand_member: function() {
        function deleted_dm_record($e) {
            $e.find("i[class*=fa-toggle]").toggleClass("fa-toggle-on fa-toggle-off");

            SidebarIW.reload_demands_member();
            toastr.success(LangIW.toastr.deleted_dm_record.message, LangIW.toastr.deleted_dm_record.message);
        }

        $(document).on("click", "#sidebar-block-demands-member a.dm-toggle, #demand-members a.dm-toggle", function() {
            CoreIW.ajaxcall($(this), LangIW.confirms.deleted_dm_record.message, LangIW.confirms.deleted_dm_record.title, function($e) { deleted_dm_record($e); });
            return false;
        });
    },

    init_filters: function() {
        function deleted_filter_record(e) {

            var $li         = $(e).closest("li");
            var $badge      = $li.parent().prev().find(".badge");
            var remain      = parseInt(parseInt($badge.html())-1);
            var $remove_e   = $li;

            if (remain == 0) {
                $remove_e = $(e).closest(".sidebar-block");
            }

            $badge.html(remain);

            $remove_e.fadeOut(function() {
                $(this).remove();
            });
        }

        $("#sidebar-block-filter").find("a.delete").on("click", function() {
            CoreIW.ajaxcall($(this), LangIW.confirms.deleted_filter.message, LangIW.confirms.deleted_filter.title, function($e) { deleted_filter_record($e); });
            return false;
        });
    },

    timeout_id: 0,

    init_cats: function() {
        $("#sidebar-block-categories").find(".cat-item:not(.cat-readonly)").hover(function() {
            var $icon = $(this).find("i");
            $icon.data("icon", $icon.attr("class"));

            SidebarIW.timeout_id = setTimeout(function() {
                $icon.stop().slideUp('fast', function () {
                    $(this).attr("class", "fa fa-fw fa-plus").slideDown('fast');
                });
            }, 500);

        }, function() {
            clearTimeout(SidebarIW.timeout_id);
            var $icon = $(this).find("i");
            if (!$icon.hasClass("fa-spin")) {
                $icon.stop().attr("class", $icon.data("icon"));
            }
        });

        $("#sidebar-block-categories").delegate(".cat-item i.fa-plus", "click", function() {

            $("#sidebar-block-categories").find("i.fa-spin").each(function() {
                $(this).attr("class", $(this).data("icon"));
            });

            $(this).attr("class", "fa fa-fw fa-spinner fa-spin");
            location.href = 'demands/create/?demand_data[cat_id]='+$(this).closest("li").data("id");
            return false;
        });


    },

    init: function() {
        this.init_demand_member();
        this.init_cats();
        this.init_filters();
    }

};


SidebarIW.init();