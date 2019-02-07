<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-06 05:29:36
         compiled from "W:\home\intrawork.loc\app\applications\views\templates\demands\view\message_form_pane.tpl" */ ?>
<?php /*%%SmartyHeaderCode:61065c5a4690bb0cd2-74786063%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20bd3715bfdaa14b9ed353b98bf0d59569715526' => 
    array (
      0 => 'W:\\home\\intrawork.loc\\app\\applications\\views\\templates\\demands\\view\\message_form_pane.tpl',
      1 => 1459510500,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61065c5a4690bb0cd2-74786063',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'demand_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c5a4690bcc262_76669452',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5a4690bcc262_76669452')) {function content_5c5a4690bcc262_76669452($_smarty_tpl) {?><input type="hidden" name="message_data[demand_id]" value="<?php echo intval($_smarty_tpl->tpl_vars['demand_data']->value['id']);?>
" />

<div class="container-fluid">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#form" data-toggle="tab"><?php echo L::tabs_message;?>
</a></li>
        <li><a href="#attach" data-toggle="tab"><?php echo L::tabs_files;?>
</a></li>
        <li class="pull-right">
            <button class="btn btn-default btn-message-form-pane-toggler pull-right">
                <i class="fa fa-times"></i><span class="hidden-xs"> <?php echo L::text_close;?>
</span>
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
                <?php echo $_smarty_tpl->getSubTemplate ("demands/view/messages/form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <div class="tab-pane" id="attach">
                <?php echo $_smarty_tpl->getSubTemplate ("helpers/attached_table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="space space-xs"></div>

    <div class="form-inline row">
        <div class="form-group col-sm-5">
            <label title="Кому отправить" for="message_data_to_eid"><span class="hidden-xs">Кому:</span><span class="visible-xs"><i class="fa fa-user"></i></span></label>
            <select class="selectpicker members-select col-sm-10" id="message_data_to_eid" name="message_data[to_eid]" data-style="btn-default" data-show-subtext="true" >
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

    
</div>




    <?php echo '<script'; ?>
>
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

    <?php echo '</script'; ?>
>


<?php }} ?>
