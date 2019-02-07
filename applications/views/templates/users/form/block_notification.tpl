<div class="form-group">
    <label for="user_data_exec_notice" class="col-sm-2 control-label clamped-padding-top">
        {L::forms_labels_users_exec_notice}
    </label>
    <div class="col-xs-9 col-sm-6 col-md-4">
        <input name="user_data[exec_notice]" data-size="small" {if !$user_data.id || $user_data.exec_notice}checked=""{/if} id="user_data_exec_notice" type="checkbox" data-toggle="toggle" data-on="{L::text_yes}" data-off="{L::text_no}" />
    </div>
</div>


<div class="form-group exec_notice" {if $user_data.id && !$user_data.exec_notice}style="display:none"{/if}>
    <label class="col-sm-2 control-label">{L::forms_labels_users_exec_notice_weekdays}</label>
    <div class="col-xs-8">
        {if !isset($user_data.exec_notice_weekdays)}
            {assign var="exec_notice_weekdays" value=array(1,2,3,4,5)}
        {else}
            {assign var="exec_notice_weekdays" value=$user_data.exec_notice_weekdays}
        {/if}
        {include file="helpers/forms/select_weekdays.tpl" ar_days=$exec_notice_weekdays name="user_data[exec_notice_weekdays]"}
    </div>
</div>

<div class="form-group exec_notice" {if $user_data.id && !$user_data.exec_notice}style="display:none"{/if}>
    <label for="user_data_exec_notice_time" class="col-sm-2 control-label">{L::forms_labels_users_notice_time}</label>
    <div class="col-xs-9 col-sm-3 col-md-2">
        <select class="selectpicker" name="user_data[exec_notice_time]" id="user_data_exec_notice_time">
            {section name=hours start=0 loop=24 step=1}
                <option {if $smarty.section.hours.index == $user_data.exec_notice_time}selected=""{/if} value="{$smarty.section.hours.index}">{$smarty.section.hours.index|string_format:'%02d'|cat:':00'}</option>
            {/section}
        </select>
        {*<div class="input-group date form_time reg_start_date">
            <input class="form-control" name="user_data[exec_notice_time]" id="user_data_exec_notice_time" size="16" type="text" value="{$user_data.exec_notice_time|date_format:"%H:%M"}" readonly required="true">
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>*}
    </div>
</div>

<script>
    $("#user_data_exec_notice").on("change", function() {
        $(".form-group.exec_notice").slideToggle();
    });
</script>

{*
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Фоновая проверка</label>
    <div class="col-xs-9 col-sm-6 col-md-4">
        <select name="" class="form-control selectpicker"></select>
    </div>
</div>
*}

<legend>{L::forms_legends_users_events_notification}</legend>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">{L::forms_labels_users_events_notification}</label>
    <div class="col-xs-9 col-sm-10 col-md-10">

        <link type="text/css" rel="stylesheet" href="min/{$smarty.const.RESOURCE_VERSION}/?g=treetablecss" />
        <script src="min/{$smarty.const.RESOURCE_VERSION}/?g=treetablejs"></script>

        <ul class="nav nav-tabs" id="notification-tabs">
            <li class="active"><a href="#notification-modules" data-remote="users/edit/{$user_data.id}/get_notification_modules/" data-callback="load_notification_modules" data-toggle="tab">{L::tabs_modules}</a></li>
            <li><a href="#notification-categories" data-callback="load_notification_categories" data-remote="users/edit/{$user_data.id}/get_notification_categories/" data-callback="load_notification_form" data-toggle="tab">{L::tabs_demands}</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="notification-modules">
            </div>
            <div class="tab-pane" id="notification-categories">
            </div>
        </div>


    </div>
</div>


<script>
    function load_notification_modules($e) {
        var $container   = $($e.attr('href'));
        $container.append('<input type="hidden" name="crud_notification_module_update" value="true" />');
    }

    function load_notification_categories($e) {
        $("#table-crud-categories").treetable({
            indent: 34,
            expandable: true,
            expanderTemplate: "<a class='btn btn-sm btn-default' href='#'><i class='fa'></a>"
        });

        var $container   = $($e.attr('href'));
        $container.append('<input type="hidden" name="crud_notification_categories_update" value="true" />');
    }


    $("#notification-tabs").find("a[data-toggle='tab']").on("show.bs.tab", function() {

        var container   = $(this).attr('href');
        var $pane       = $(container);
        //var remote = 'users/{if $user_data.id}edit/{$user_data.id}/{else}edit/0/{/if}';
        var remote = 'users/edit/{$user_data.id|intval}/';

        if (container == '#notification-categories') {
            remote+='get_notification_categories/'
        } else {
            remote+='get_notification_modules/'
        }

        //var ar_roles    = $("#user_data_roles").val();
        var ar_roles    = $("#general [name='user_data[role_id][]']").val();
        remote+='?ar_roles='+ar_roles;

        var data        = $pane.find('input:checkbox[name^=crud_]').serialize();
        if (data) {
            remote+='&'+data;
        }

        $(this).data("remote", remote);
    });



    $("#user-form-tabs").find('a[href="#notification"]').on("show.bs.tab", function() {
        $("#notification-tabs").find("li.active a").trigger('show.bs.tab').trigger('shown.bs.tab');
    });


</script>







