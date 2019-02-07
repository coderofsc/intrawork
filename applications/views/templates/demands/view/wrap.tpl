
<div class="container-fluid animated fadeInDown">
    <div class="row">
        <div class="col-md-3">
            <span class="label label-tag">
            <i class="fa fa-plus fa-fw text-muted"></i> <span class="hidden-xs">Создана: </span>{$demand_data.unix_create_date|ts2text}
                </span>
        </div>
        <div class="col-md-3 text-center">
            <span class="label label-tag">
            <i class="fa fa-user text-muted"></i> {if $demand_data.cu_id}{$demand_data.cu_short_fio}{elseif $demand_data.cu_eid}{$demand_data.cu_email}{else}<span class="text-muted">{L::text_unknown|mb_ucfirst}</span>{/if}
                </span>
        </div>
        <div class="col-md-3 text-center">
            <span class="label label-tag">
                <i class="fa fa-pencil fa-fw text-muted"></i> <span class="hidden-xs">Изменена: </span>{if $demand_data.unix_activity_date}{$demand_data.unix_activity_date|ts2text}{else}<span class="text-muted">{L::text_unknown|mb_ucfirst}</span>{/if}
            </span>
        </div>
        <div class="col-md-3 text-right">
            <span class="label label-tag">
            <i class="fa fa-user text-muted"></i> {if $demand_data.activity_eid}{$demand_data.activity_user_short_fio}{else}<span class="text-muted">{L::text_unknown|mb_ucfirst}</span>{/if}
                </span>
        </div>
    </div>
    <div class="space space-xs"></div>

    <div class="well well-sm bg-white demand-block" {*style="background-color:#f5f5f5;box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2) inset; border: none"*}>
    {include file="demands/view/block_demand.tpl"}
    </div>
</div>

<div class="clearfix"></div>
<div class="space"></div>

<div class="container-fluid">
    <ul class="nav nav-tabs clamped" id="demand-tabs">
        <li class="active"><a href="#demand-messages" data-toggle="tab"><i class="fa fa-comments-o"></i> {L::tabs_messages}</a></li>
        <li><a href="#demand-checklist" data-toggle="tab"><i class="fa fa-fw fa-check"></i> Чек-лист {if $ar_todo.total}<span class="badge badge-info">{$ar_todo.complete}/{$ar_todo.total}</span>{/if}</a></li>
        <li><a href="#demand-members" data-remote="demands/view/{$demand_data.id}/get_members/" data-toggle="tab"><i class="fa fa-fw fa-users"></i> {L::tabs_members}</a></li>
        {if $branch_size > 1}
        <li><a href="#demand-branch" {*data-remote="demands/view/{$demand_data.id}/get_members/"*} data-toggle="tab"><i class="fa fa-fw fa-object-group"></i> {L::tabs_joins} <span class="badge badge-info">{$branch_complete}/{$branch_size}</span></a></li>
        {/if}

        <li><a href="#demand-history" data-remote="demands/view/{$demand_data.id}/get_history/" data-toggle="tab"><i class="fa fa-fw fa-history"></i> {L::tabs_history}</a></li>

    </ul>

    <div class="tab-content">
        <div class="tab-pane active clamped" id="demand-messages">
            {include file="demands/view/block_messages.tpl"}
        </div>
        <div class="tab-pane container-fluid bg-white" id="demand-checklist">
            {include file="demands/view/block_checklist.tpl"}
        </div>
        <div class="tab-pane container-fluid bg-white" id="demand-members">
        </div>
        {if $branch_size > 1}
        <div class="tab-pane clamped-margin-bottom clamped-padding-bottom container-fluid bg-white" id="demand-branch">
            {include file="demands/view/branch/wrap.tpl"}
        </div>
        {/if}
        <div class="tab-pane container-fluid bg-white" id="demand-history">
        </div>

    </div>

</div>

{*
<script>
    $('#demand-tabs a[href="#history"]').on('show.bs.tab', function (e) {
        // e.target // activated tab
        // e.relatedTarget // previous tab

        console.log(e.target, e.relatedTarget);
    })

</script>
*}