var commentsIW = {
    module_id: 0,
    owner_id: 0,
    module_alias: '',

    $fm_container: $("#fm-container"),
    current_folder_id: 0,

    set_owner: function(owner_id) {
        this.owner_id = owner_id;
    },

    append_comment: function (comment_item) {
        var $container = $("#comments-container");
        var $item = $(comment_item).hide().addClass("animated fadeInUp").appendTo("#comments-container");
        $container.closest('.ui-layout-content,.ui-layout-pane').scrollTo($item.show(), 500);
        $container.find(".alert").remove();
    },

    hide_toggler: function() {
        $("#btn-comment-pane-toggler").slideUp();
    },

    show_toggler: function() {
        $("#btn-comment-pane-toggler").slideDown();
    },

    init_pane_toggler: function() {

        var $toggler = $("#btn-comment-pane-toggler");

        $('body').bind('init.layout', function(event) {
            if ($('#comment-form-pane').is(":visible")) {
                $toggler.hide();
            } else {
                $toggler.show();
            }
        });

        $(".btn-comment-pane-toggler").on("click", function() {

            $('#comment-form-pane').trigger('layoutpanetoggle');

            $toggler.slideToggle('slow');
            return false;
        });

    },

    init_form: function() {
        $(document).ready(function () {

            var $message_form = $("#comment-form");

            //onEnter
            // http://summernote.org/#/deep-dive

            $message_form.find("textarea[name='comment_data[text]']").summernote({
                lang: 'ru-RU',
                toolbar: [
                    ['misc', ['undo', 'redo']],
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['picture', 'link']]
                    //['fullscreen', ['fullscreen']]

                    //['height', ['height']]
                ],

                oninit: function () {
                    $message_form.find('div.note-editable').css({
                        position: 'absolute',
                        top: 40,
                        right: 0,
                        bottom: 0,
                        left: 0
                    });
                    $message_form.find('div.note-editor').css({
                        position: 'absolute',
                        top: 0,
                        right: 15,
                        bottom: 0,
                        left: 15
                    })
                },

                onenter: function (e) {
                    console.log('Enter/Return key pressed');
                }
            }).on('summernote.keydown', function (customEvent, nativeEvent) {
                console.log('Key is pressed:', nativeEvent.keyCode);
            });
        });
    },


    init_submit: function() {
        $("#comment-form").on("submit", function() {
            var $btn = $(this).find("button[type=submit]");
            var $form = $(this);

            var $el_message = $form.find("textarea[name='comment_data[text]']");
            var message = $el_message.code();

            if (!message) {
                toastr.error('Сообщение не может быть пустым!', 'Сообщение не отправлено');
                return false;
            }

            $btn.button('loading');

            var attached = $("#attach_files").find("input").serialize();
            $el_message.val(message);

            var comment_data = $("#comment-form").serialize();
            //var message = encodeURIComponent($form.find("textarea[name='comment_data[message]']").code());
            //var to = $form.find("select[name='comment_data[to]']").val();
            //var copy = $form.find("select[name='comment_data[copy][]']").find("option:selected").serialize();

            $.ajax({
                method: 'post',
                url: commentsIW.module_alias+"/view/"+commentsIW.owner_id+"/add_comment/",
                data: comment_data+'&'+attached,
                dataType: 'json',
                success: function(response) {
                    $btn.button("reset");
                    $form.find("textarea").code('');
                    $("#attach_files").addClass("hidden").find("tr").remove();
                    $form.find(".btn-comment-pane-toggler").click();

                    setTimeout(function() {
                        toastr.success('Сообщение успешно добавлено!', 'Сообщение отправлено');
                        commentsIW.append_comment(response.data);
                    }, 50);


                }
            });

            return false;
        });
    },

    init: function(module_alias, module_id, owner_id) {
        this.module_alias = module_alias;
        this.module_id = module_id;
        this.set_owner(owner_id);
        this.init_pane_toggler();
        this.init_form();
        this.init_submit();
    }
};
