<table id="members-table" class="table table-condensed table-hover table-valign-middle">
    <colgroup>
        <col width="50px"/>
        <col width="*"/>
        <col width="150px"/>
        <col width="50px"/>
        <col width="75px"/>
        <col width="125px"/>
        <col width="25px"/>
    </colgroup>
    <thead>
    <tr>
        <th></th>
        <th>{L::forms_labels_fio}</th>
        <th>{L::forms_labels_reports_time_in_work}</th>
        <th>Стоимость</th>
        <th class="text-center"><i class="fa fa-comments-o"></i></th>
        <th>{L::modules_roles_morph_one|mb_ucfirst}</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    {foreach from=$ar_members item=member key=member_id}
        {include file="demands/view/members/item.tpl"}
        {foreachelse}
        <tr>
            <td colspan="10" class="text-center">
                Пользователи учавствующие в заявке не найдены
            </td>
        </tr>
    {/foreach}
    </tbody>
</table>

<button class="btn btn-default" onclick="$(this).hide(); $('#member-invite-form').slideToggle(function() { $(this).closest('.ui-layout-content').scrollTo('100%', 500);}); ">Пригласить пользователя</button>

<form method="post" class="form-horizontal" id="member-invite-form" style="display: none">
    <input type="hidden" id="invite_data_demand_id" name="invite_data[demand_id]" value="{$demand_data.id}">
    <legend>Пригласить пользователя</legend>
    <div class="form-group">
        <label for="invite_data_user_eid" class="col-xs-4 col-sm-4 col-md-2 control-label">{L::modules_users_morph_one|mb_ucfirst}</label>
        <div class="col-xs-8 col-sm-8 col-md-5">
            <select name="invite_data[user_eid][]" multiple id="invite_data_user_eid" class="form-control selectpicker" data-align-right="true" data-live-search="true">
                {include file="helpers/forms/options.tpl" data=$ar_users text="fio" value="eid" selected=$invite_data.user_eid group="dprt_name"}
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-4 col-sm-4 col-md-2 control-label">&nbsp;</label>
        <div class="col-xs-8 col-sm-8 col-md-5">
            <button onclick="invite_user(); return false;" class="btn btn-default">Пригласить</button>
        </div>
    </div>
</form>

<script>
    function invite_user() {
        if ($("#invite_data_user_eid").find("option:selected").length > 0) {
            DemandIW.invite_user();
        } else {
            toastr.warning('Укажите пользователя!', 'Приглашение пользователя');
        }

    }
</script>
