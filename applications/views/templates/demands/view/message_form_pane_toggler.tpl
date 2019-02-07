<button id="btn-message-form-pane-toggler" class="btn btn-success btn-xs btn-message-form-pane-toggler">Добавить сообщение</button>

<style>
    #btn-message-form-pane-toggler {
        position: absolute; z-index:5; left:50%;
        margin-left:-75px;
        width:150px;
        bottom:0;
        /*-webkit-border-radius: 4px 4px 0 0;
        -moz-border-radius: 4px 4px 0 0;
        border-radius: 4px 4px 0 0;*/
        border-radius: 0;
    }
</style>
{*
<script>
    $(".btn-message-form-pane-toggler").on("click", function() {

        function scroll_to_last_message() {
            $("#demands-view-pane").find(".scroll-to-down").click();
        }

        var $toggler = $("#btn-message-form-pane-toggler");

        $('#message-form-pane').trigger('layoutpanetoggle');

        if ($toggler.is(":visible")) {
            // Переключаемся на вкладку сообщений, если находимся не на ней
            if ($('#demand-messages').is(':hidden')) {
                $('#demand-tabs').find('a[href="#demand-messages"]').one('shown.bs.tab', function (e) {
                    scroll_to_last_message();
                }).tab('show');
            } else {
                scroll_to_last_message();
            }

            // Загружаем участников заявки
            get_member_options();
        }

        $toggler.slideToggle('slow');
        return false;
    });
</script>
*}