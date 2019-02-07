<input type="hidden" name="message_data[demand_id]" value="{$demand_data.id|intval}" />

<div class="container-fluid">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#form" data-toggle="tab">{L::tabs_message}</a></li>
        <li><a href="#attach" data-toggle="tab">{L::tabs_files}</a></li>
        <li class="pull-right">
            <button class="btn btn-default btn-message-form-pane-toggler pull-right">
                <i class="fa fa-times"></i><span class="hidden-xs"> {L::text_close}</span>
            </button>
        </li>
        <li class="pull-right">
            &nbsp;
        </li>
        <li class="pull-right">
            <select class="selectpicker" name="message_data[style]" data-width="auto">
                <option value="" data-content="<span class='label alert-default'>Без стиля</span>">Без стиля</option>
                <option value="info" data-content="<span class='label alert-info'>Info</span>">Info</option>
                <option value="success" data-content="<span class='label alert-success'>Success</span>">Success</option>
                <option value="warning" data-content="<span class='label alert-warning'>Warning</span>">Warning</option>
                <option value="danger" data-content="<span class='label alert-danger'>Danger</span>">Danger</option>
            </select>
        </li>
    </ul>
</div>

<div class="ui-layout-content">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="tab-pane active" id="form">
                {include file="demands/view/messages/form.tpl"}
            </div>
            <div class="tab-pane" id="attach">
                {include file="helpers/attached_table.tpl"}
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="space space-xs"></div>

    <div class="form-inline row">
        <div class="form-group col-sm-5">
            <label title="Кому отправить" for="message_data_to_eid"><span class="hidden-xs">Кому:</span><span class="visible-xs"><i class="fa fa-user"></i></span></label>
            <select class="selectpicker members-select col-sm-10" id="message_data_to_eid" name="message_data[to_eid]" data-style="btn-default" data-show-subtext="true" {*data-width="100%"*}>
                <option value="0">Никому</option>
            </select>
        </div>

        <div class="form-group col-sm-5">
            <label title="Поставить в копию" for="message_data_copy_eid"><span class="hidden-xs">Копия:</span><span class="visible-xs"><i class="fa fa-users"></i></span></label>
            <select id="message_data_copy_eid" class="selectpicker members-select col-sm-10" multiple name="message_data[copy_eid][]" data-selected-text-format="count" data-style="btn-default" data-show-subtext="true" data-live-search="true">
            </select>
        </div>

        <div class="form-group pull-right text-right col-sm-2">
            <button type="submit" class="btn btn-primary" data-loading-text="Отправка, ждите..."><i class="fa fa-send"></i><span class="hidden-xs"> Отправить</span></button>
        </div>

    </div>

    {*

    <div>
        <div class="pull-left">
            <button type="submit" class="btn btn-primary" data-loading-text="Отправка, ждите...">Отправить</button>
        </div>
        <div class="pull-right">
        </div>
        <div class="clearfix"></div>
    </div>
*}
</div>


{literal}

    <script>
        /*$("#message-form").on("submit", function() {

            var $btn = $(this).find("button[type=submit]");
            var $form = $(this);
            var demand_id = $form.find("input[name='message_data[demand_id]']").val();

            $btn.button('loading');

            var message = encodeURIComponent($form.find("textarea[name='message_data[message]']").code());

            $.ajax({
                method: 'post',
                url: "demands/view/"+demand_id+"/add_message/",
                data: 'message='+message+'&'+$("#attach_files").find("input").serialize(),
                dataType: 'json',
                success: function(response) {

                    $btn.button("reset");
                    $form.find("textarea").code('');
                    $form.find(".btn-message-form-pane-toggler").click();

                    setTimeout(function() {
                        toastr.success('Сообщение успешно добавлено к заявке!', 'Сообщение отправлено');
                        //$('#demand-tabs').find('a[href="#demand-messages"]').tab('show');
                        $("#messages-container").closest('.ui-layout-pane').scrollTo($(response.data).hide().addClass("animated fadeInUp").appendTo("#messages-container").show(), 500);
                    }, 250);

                }
            });

            return false;
        });*/

/*
        function get_member_options() {
            var $form       = $("#message-form");
            var $to         = $form.find("select.members-select");
            var $btn        = $form.find("button[type=submit]");
            var demand_id   = $form.find("input[name='message_data[demand_id]']").val();

            $to.html("<option>Загрузка участников...</option>").prop('disabled',true).selectpicker("refresh");
            $btn.prop('disabled', true);

            $.ajax({
                method: 'post',
                url: "demands/view/"+demand_id+"/get_members_option/",
                dataType: 'json',
                success: function(response) {
                    $to.html(response.data).prop('disabled',false).selectpicker("refresh");
                    $btn.prop('disabled', false);
                }
            });
        }
            */

        /*
        $(document).ready(function(){
            var demand_id   = $("#message-form").find("input[name='message_data[demand_id]']").val();
            if (demand_id) {
                get_member_options();
            }
        });*/

    </script>

{/literal}
