<ul class="sidebar-block">
    <li class="open">
        <a class="row header" href="demands/{if $cuser_data.ar_demands_member.conditions}?{$cuser_data.ar_demands_member.conditions|http_build_query:"cnd"}{/if}{if $cuser_data.ar_demands_member.sort}{if $cuser_data.ar_demands_member.conditions}&{else}?{/if}{$cuser_data.ar_demands_member.sort|http_build_query:"sort"}{/if}">
            <div class="col-sm-9">
                <i class="fa fa-fw fa-group text-white"></i>
                <span class="nav-label">{L::sidebar_your_participation}</span>
            </div>
            <div class="col-sm-2 text-center">
                <span class="badge badge-count">{$cuser_data.ar_demands_member.total}</span>
            </div>
            <div class="col-sm-1 btn-toggle">
                <i class="fa fa-fw fa-caret-down"></i>
            </div>
        </a>

        {if $cuser_data.ar_demands_member.total}
        <ul>
        {foreach from=$cuser_data.ar_demands_member.data item=demand name="demands_member"}
            {if $demand.required_time}
                {assign var="percent_exec" value=ceil($demand.exec_time/$demand.required_time*100)}
            {else}
                {assign var="percent_exec" value=0}
            {/if}

            {if $smarty.foreach.demands_member.first && ($demand.eu_eid != $cuser_data.eid || $demand.status != m_demands::STATUS_WORK)}
                <li class="row">
                    <div class="col-sm-12 text-white">
                        <i class="fa fa-fw fa-warning text-yellow"></i> <strong>Внимание</strong> &mdash; вы не работаете.
                    </div>
                </li>
                {assign var="exist_work" value=false}
            {else}
                {assign var="exist_work" value=true}
            {/if}

            <li class="row">
                <a class="text-ellipsis col-sm-9 dmd-item" data-id="{$demand.id}" href="demands/view/{$demand.id}/{if $cuser_data.ar_demands_member.conditions}?{$cuser_data.ar_demands_member.conditions|http_build_query:"cnd"}{/if}{if $cuser_data.ar_demands_member.sort}{if $cuser_data.ar_demands_member.conditions}&{else}?{/if}{$cuser_data.ar_demands_member.sort|http_build_query:"sort"}{/if}">
                    <i class="{if $smarty.foreach.demands_member.first && $exist_work}text-yellow{/if} fa fa-fw fa-{m_demands::$ar_status[$demand.status].icon}" title="{m_demands::$ar_status[$demand.status].name}"></i>
                    {*<i class="fa fa-fw text-{m_demands::$ar_criticality[$demand.criticality].color} fa-{m_demands::$ar_criticality[$demand.criticality].icon}" title="Критичность: {m_demands::$ar_criticality[$demand.criticality].name}"></i>{/if}*}
                    <span class="nav-label {if $demand.criticality > m_demands::CRITICALITY_MID}text-danger{/if}">
                        {$demand.title}
                    </span>

                </a>
                <div class="col-sm-2 text-center" title="{$percent_exec}% выполнено">
                    <span class="badge badge-count">{$demand.count_messages}</span>
                    {*
                    <span class="btn btn-block btn-xs">
                        <span class="donut" {if $demand.exec_time>$demand.required_time}{literal}data-peity='{"fill":["red", "#eeeeee"]}'{/literal}{/if} title="{$percent_exec}% выполнено" style="line-height: 1">{$demand.exec_time}/{$demand.required_time}</span>
                    </span>
                    *}
                </div>
                <a href="demands/view/{$demand.id}/toggle_tracking/" class="col-sm-1 text-right dm-toggle">
                    <i class="fa-fw fa fa-times text-danger"></i>
                </a>
            </li>
        {/foreach}
            {if $cuser_data.ar_demands_member.total > $cuser_data.ar_demands_member.data|@sizeof}
            <div class="space space-xs"></div>
            <li class="row">
                <div class="col-sm-12">
                    <a href="demands/{if $cuser_data.ar_demands_member.conditions}?{$cuser_data.ar_demands_member.conditions|http_build_query:"cnd"}{/if}"><span class="text-muted">Показать все</span></a>
                </div>
            </li>
            {/if}
        </ul>
        {/if}
    </li>
</ul>

<script>
</script>