
{*http://demo.thedevelovers.com/dashboard/kingadmin-v1.3/*}

{assign var="nested" value=0}

<nav id="sidebar-nav">

    <div class="nav-header">
        <div class="dropdown profile-element">

            <div>
                <a href="users/view/{$cuser_data.id}/">
                {include file="helpers/avatar.tpl" size="sm" hash=$cuser_data.avatar_storage_hash dir=$smarty.const.STORAGE_DIR_AVATARS_USERS id=$cuser_data.id}
                </a>
            </div>
            <div class="space space-xs"></div>


            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <span class="block"> <strong>{$cuser_data.fi}</strong> <b class="caret"></b></span>
                {if $cuser_data.post_id || $cuser_data.dprt_id}<span class="text-muted block small text-ellipsis">{if $cuser_data.dprt_name}{$cuser_data.dprt_name}{/if}{if $cuser_data.post_name && $cuser_data.dprt_name}&nbsp;/&nbsp;{/if}{$cuser_data.post_name}</span>{/if}
            </a>
            <ul class="dropdown-menu bullet pull-center">
                <li>
                    <a href="users/view/{$cuser_data.id}/">
                        {L::navbar_profile_dd_profile}
                    </a>
                </li>
                <li>
                    <a href="users/edit/{$cuser_data.id}/">
                        {L::navbar_profile_dd_edit_profile}
                    </a>
                </li>
                {*{if $cuser_data.super_admin}
                    <li>
                        <a href="toggle_superadmin/">
                            {if $cuser_data.super_admin_mode}{L::navbar_profile_dd_super_admin_mode_on}{else}{L::navbar_profile_dd_super_admin_mode_off}{/if}
                        </a>
                    </li>
                {/if}*}
                <li role="presentation" class="divider"></li>
                <li>
                    <a href="logout/">
                        <i class="fa fa-sign-out fa-fw"></i> {L::navbar_profile_dd_exit}
                    </a>
                </li>
            </ul>
        </div>
    </div>

    {if $conditions_decode && $conditions}
        <div id="sidebar-block-conditions">
        {include file="main/sidebar/block_conditions.tpl"}
        </div>
    {/if}

    {if $ar_quick_filters}
        <div id="sidebar-block-quick-filters">
            {include file="main/sidebar/block_quick_filters.tpl"}
        </div>
    {/if}

    <div id="sidebar-block-demands-member">
        {include file="main/sidebar/block_demands_member.tpl"}
    </div>

    {if $cuser_data.ar_filters}
    <div id="sidebar-block-filter">
        {include file="main/sidebar/block_demands_filters.tpl"}
    </div>
    {/if}

    {if $cuser_data.ar_favorite}
    {include file="main/sidebar/block_demands_favorite.tpl"}
    {/if}

    {*<div class="separate-block" data-content="Категории заявк"></div>*}

    <div id="sidebar-block-categories">
        {include file="main/sidebar/block_categories.tpl"}
    </div>

</nav>

{literal}
	<script>
		$('#sidebar-nav').find('.btn-toggle').click(function (e) {
            e.preventDefault();
            var $li = $(this).closest('li');
            var $fa = $(this).find('i.fa');


            if ($li.hasClass('open')) {

                $fa.toggleClass("open");
                $li.children('ul').slideToggle(300, function() {
                    $li.removeClass('open');
                    save_node_state($li);
                    //$fa.removeClass('fa-caret-up').addClass('fa-caret-down');

                });
            } else {
                $li.addClass('open');
                $fa.toggleClass("open");
                save_node_state($li);
                $li.children('ul').hide().slideToggle(300, function() {
                    //$fa.removeClass('fa-caret-down').addClass('fa-caret-up');
                });
            }

            function save_node_state($li) {
                if ($li.data("id")) {
                    var sidebarBlockOpen = $.cookie("sidebarBlockOpen");
                    var nodes = (sidebarBlockOpen)?sidebarBlockOpen.split(","):[];

                    if ($li.hasClass('open')) {
                        nodes.push($li.data("id"));
                    } else {
                        nodes.splice( $.inArray($li.data("id"), nodes), 1 );
                        console.log($.inArray($li.data("id"), nodes), $li.data("id"), nodes);
                    }

                    if (nodes.length > 0) {
                        $.cookie("sidebarBlockOpen", nodes.join(","), { path: '/' });
                    } else {
                        $.removeCookie("sidebarBlockOpen", { path: '/' });
                    }
                }
            }

            return false;
		});
	</script>

{/literal}

