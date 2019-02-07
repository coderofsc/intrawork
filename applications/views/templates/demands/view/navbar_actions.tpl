<nav class="navbar navbar-more navbar-inside clamped border-bottom bg-{m_demands::$ar_status[$demand_data.status].color}" role="navigation">
	<div class="container-fluid ">
		<div>
			<ul class="nav navbar-nav navbar-left navbar-statuses">
                {*
                {foreach from=m_demands::$ar_status key=status_id item=status}
                    {if $demand_data.status == $status_id || in_array($status_id, m_demands::$ar_status_mode[$demand_data.status])}
                        <li {if $demand_data.status == $status_id}class="active bg-{m_demands::$ar_status[$status_id].color}"{/if}>
                            <a data-color="{$status.color}" {if ($status_id==m_demands::STATUS_WORK || $status_id==m_demands::STATUS_COMPLETE) && !$demand_data.required_time}class="tuning" data-remote="demands/tuning/{$demand_data.id}/?demand_data[status]={$status_id}{if !$demand_data.eu_eid}&demand_data[eu_eid]={$cuser_data.eid}{/if}" href="#modal-remote" data-toggle="modal" class="tuning"{else}href="#"{/if} data-status="{$status_id}" >
                                <i class="fa fa-fw fa-{$status.icon}"></i> <span>{$status.name}</span>
                            </a>
                        </li>
                    {/if}
                {/foreach}
                *}
                {foreach from=$ar_type_current_ts key=status_id item=status}
                    <li {if $demand_data.status == $status_id}class="active bg-{m_demands::$ar_status[$status_id].color}"{/if}>
                        {*<a data-color="{$status.color}" {if ($status_id==m_demands::STATUS_WORK || $status_id==m_demands::STATUS_COMPLETE) && !$demand_data.required_time}class="tuning" data-remote="demands/tuning/{$demand_data.id}/?demand_data[status]={$status_id}{if !$demand_data.eu_eid}&demand_data[eu_eid]={$cuser_data.eid}{/if}" href="#modal-remote" data-toggle="modal" class="tuning"{else}href="#"{/if} data-status="{$status_id}" >*}
                        <a data-color="{$status.color}" {if ($status_id==m_demands::STATUS_WORK) && !$demand_data.required_time}class="tuning" data-remote="demands/tuning/{$demand_data.id}/?demand_data[status]={$status_id}{if !$demand_data.eu_eid}&demand_data[eu_eid]={$cuser_data.eid}{/if}" href="#modal-remote" data-toggle="modal" class="tuning"{else}href="#"{/if} data-status="{$status_id}" >
                            <i class="fa fa-fw fa-{$status.icon}"></i> <span>{$status.name}</span>
                        </a>
                    </li>
                {/foreach}

			</ul>
            {*
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false"><i class="fa fa-bars fa-md"></i></a>
                    <ul role="menu" class="dropdown-menu dropdown-menu-right dropdown-menu-wauto">
                        <li><a href="demands/view/?action=change_status&status=8" data-callback="change_demand_status" class="ajaxcall"><i class="fa fa-pause"></i> Приостановлена</a></li>
                    </ul>
                </li>
            </ul>
            *}
		</div>
	</div>
</nav>


{*
<script>

    $("#demands-navbar-pane").find(".navbar-statuses li a").on("click", function() {
        var status  = $(this).data('status');
        var $self   = $(this);
        var $li     = $(this).parent();

        if ($li.hasClass('active')) {
            return false;
        }

        /*
        if (status == {m_demands::STATUS_WORK} && {$demand_data.eu_eid} != {$cuser_data.eid} ) {

            $('#modal-remote').modal({
               remote: 'demands/tuning/{$demand_data.id}/?demand_data[status]='+{m_demands::STATUS_WORK}+'&demand_data[eu_eid]='+{$cuser_data.eid}
            });


            return false;
        }*/

        var $icon = $self.find('i.fa');

        if ($icon.length) {
            $icon.data('restore-class', $icon.prop('class'));
            $icon.prop("class", "fa fa-fw fa-spinner fa-spin");
        }

        $.ajax({
            url: 'demands/tuning/{$demand_data.id}/change_status/?status='+status,
            dataType: 'json',
            success: function(response) {

                $("#demands-view-pane").find('.demand-block').fadeOut('fast', function() {
                    $(this).html(response.data.demand_block).fadeIn();
                });

                //$("#demands-navbar-pane").trigger("layoutpanehide");
                //$("#demands-navbar-pane").trigger("layoutpaneopen");
                $("#demands-navbar-pane").find(".navbar > .container-fluid").fadeOut('fast', function() {
                    $("#demands-navbar-pane").html(response.data.navbar_actions).fadeIn();
                });

                $self.closest('ul').find('li').removeClass("active");
                $li.addClass('active');

                if ($icon.length) {
                    $icon.prop('class', $icon.data('restore-class'));
                }

                SidebarIW.reload_demands_member();

                toastr.success('Установлен новый статус!', 'Статус изменен');
            }
        });

        //alert(status);

        return false;
    });

</script>
*}