var DemandIW = {
    demand_id: 0,
    check_timeout: 10000,
    check_last_time: 0,
    check_state: 0,
    check_tid: 0,
    nr_message_count: 0,
    el_navbar_pane: "#demands-navbar-pane",
    el_view_pane:   "#demands-view-pane",
    el_message_form:"#message-form",
    el_toggle_check_message: "#main-sidebar .navbar li.check-message a",

    $demand_table: null,

    append_message: function (message_item) {
        var $item = $(message_item).hide().addClass("animated fadeInUp").appendTo("#messages-container");
        //$item.css({backgroundColor: '#000'});
        $("#messages-container").closest('.ui-layout-content,.ui-layout-pane').scrollTo($item.show(), 500);
        CoreIW.init_icheck($item);
    },

    reload_list: function() {
        if (!DemandIW.$demand_table) {
            return;
        }

        //DemandIW.find(DemandIW.demand_id, '', '');
        DemandIW.$demand_table.jscroll.reload(function() {
            var $current = DemandIW.$demand_table.find("tr[data-id="+DemandIW.demand_id+"]");
            //console.log($current);
            if ($current.length) {
                $current.click();
            } else {
                DemandIW.$demand_table.jcatcher.reload();
                // Возможно, она находится на другой странице! Но это не повод переходить на нее, наверное.
                toastr.warning('Заявка убрана из списка, т.к. новые данные не соответствуют параметрам отбора.');
                //alert("Элемент не найден в списке");
            }
        });
    },

    change_message_status: function(message_id, status) {
        $.ajax({
            method: 'post',
            url: "demands/view/"+DemandIW.demand_id+"/status_message/",
            //data: 'message='+message+'&to='+to+'&copy='+copy+'&'+attached,
            data: {message_id: message_id, status: status},
            dataType: 'json',
            success: function(response) {
                toastr.success('Статус сообщения сохранен!', 'Статус сообщения');
            }
        });
    },

    change_status_observer: function() {

        $(document).on("click", DemandIW.el_navbar_pane+" .navbar-statuses li a", function() {
            var status  = $(this).data('status');
            var $self   = $(this);
            var $li     = $(this).parent();

            if ($li.hasClass('active')) { return false; }
            if ($self.hasClass("tuning")) { return true; }

            var $icon = $self.find('i.fa');
            if ($icon.length) {
                $icon.data('restore-class', $icon.prop('class'));
                $icon.prop("class", "fa fa-fw fa-spinner fa-spin");
            }

            $.ajax({
                url: 'demands/tuning/'+DemandIW.demand_id+'/change_status/?status='+status,
                dataType: 'json',
                success: function(response) {

                    SidebarIW.reload_demands_member();
                    SidebarIW.reload_cat_dmd_counts();

                    if (!DemandIW.$demand_table || $("#demands-table-locked").is(":checked")) {

                        if (!DemandIW.$demand_table) {
                            $(DemandIW.el_view_pane).find('.demand-block').fadeOut('fast', function() {
                                 $(this).html(response.data.demand_block).fadeIn();
                             });

                             $(DemandIW.el_navbar_pane).find(".navbar > .container-fluid").fadeOut('fast', function() {
                                $(DemandIW.el_navbar_pane).html(response.data.navbar_actions).fadeIn();
                             });

                             $self.closest('ul').find('li').removeClass("active");
                             $li.addClass('active');

                             if ($icon.length) {
                                $icon.prop('class', $icon.data('restore-class'));
                             }

                        } else {
                            $("#demands-table").jcatcher.reload();
                        }

                    } else {
                        DemandIW.reload_list();
                    }

                    //$("tr[data-id="+DemandIW.demand_id+"]").find(".icon-ds").attr("class", "icon-ds dd-icon text-"+$self.data("color")).find("i").attr("class", $icon.data('restore-class'));

                    toastr.success('Установлен новый статус!', 'Статус изменен');
                }
            });

            return false;
        });
    },

    invite_user: function(eid) {

        var data = $("#member-invite-form").serialize();

        $.ajax({
            url: "demands/view/"+DemandIW.demand_id+"/add_member/",
            dataType: 'json',
            data: data,
            success: function(response) {

                if (response.status == 200) {

                    // Перезагружаем участников
                    toastr.success('Пользователи ('+response.count+') успешно добавлены к участникам заявки', 'Приглашение пользователей');
                    $('#demand-tabs a[href="#demand-members"]').trigger("shown.bs.tab");
                    DemandIW.get_member_options();

                } else {
                    toastr.error('Ошибка приглашения пользователей', 'Приглашение пользователей');
                }

            }
        });

    },

    message_form_pane_toggler: function() {
        $(".btn-message-form-pane-toggler").on("click", function() {

            function scroll_to_last_message() {
                $(DemandIW.el_view_pane).find(".scroll-to-down").click();
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
                //DemandIW.get_member_options();
            }

            $toggler.slideToggle('slow');
            return false;
        });

    },

    message_form: function() {
        $(document).ready(function() {

            var $message_form = $(DemandIW.el_message_form);

            //onEnter
            // http://summernote.org/#/deep-dive

            $message_form.find("textarea[name='message_data[message]']").summernote({
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

                onenter: function(e) {
                    //alert(1);
                    console.log('Enter/Return key pressed');
                }
            }).on('summernote.keydown', function(customEvent, nativeEvent) {
                console.log('Key is pressed:', nativeEvent.keyCode);
            });
        });
    },

    message_form_submit: function() {
        $(DemandIW.el_message_form).on("submit", function() {
            var $btn = $(this).find("button[type=submit]");
            var $form = $(this);
            var demand_id = $form.find("input[name='message_data[demand_id]']").val();
            var $o_message = $form.find("textarea[name='message_data[message]']");

            var message = $o_message.code();

            if (!message) {
                toastr.error('Сообщение не может быть пустым!', 'Сообщение не отправлено');
                return false;
            }

            $btn.button('loading');

            var attached = $("#attach_files").find("input").serialize();
            $o_message.val(message);

            var message_data = $("#message-form").serialize();
            //var message = encodeURIComponent($form.find("textarea[name='message_data[message]']").code());
            //var to = $form.find("select[name='message_data[to]']").val();
            //var copy = $form.find("select[name='message_data[copy][]']").find("option:selected").serialize();

            $.ajax({
                method: 'post',
                url: "demands/view/"+demand_id+"/add_message/",
                //data: 'message='+message+'&to='+to+'&copy='+copy+'&'+attached,
                data: message_data+'&'+attached,
                dataType: 'json',
                success: function(response) {

                    $btn.button("reset");
                    $form.find("textarea").code('');
                    $("#attach_files").addClass("hidden").find("tr").remove();
                    $form.find(".btn-message-form-pane-toggler").click();

                    setTimeout(function() {
                        toastr.success('Сообщение успешно добавлено к заявке!', 'Сообщение отправлено');
                        //$('#demand-tabs').find('a[href="#demand-messages"]').tab('show');
                        DemandIW.append_message(response.data);
                        //$("#messages-container").closest('.ui-layout-pane').scrollTo($(response.data).hide().addClass("animated fadeInUp").appendTo("#messages-container").show(), 500);
                    }, 50);

                    SidebarIW.reload_demands_member();

                }
            });

            return false;
        });
    },

    get_member_options: function() {

        $(document).ready(function() {
            var $form       = $(DemandIW.el_message_form);
            var $o_selects  = $form.find("select.members-select");
            var $btn        = $form.find("button[type=submit]");
            var demand_id   = $form.find("input[name='message_data[demand_id]']").val();

            $o_selects.find("option[value!=0]").remove();
            $o_selects.append("<option selected>Загрузка участников...</option>").prop('disabled',true).selectpicker("refresh");
            $btn.prop('disabled', true);

            $.ajax({
                method: 'post',
                url: "demands/view/"+demand_id+"/get_members_option/",
                dataType: 'json',
                success: function(response) {
                    $o_selects.find("option[value!=0]").remove();
                    $o_selects.append(response.data).prop('disabled',false);

                    var $o_member_to = $o_selects.filter("select[name='message_data[to_eid]']");
                    if (!$o_member_to.val()) {
                        $o_member_to.find("optgroup[data-group*=1] option").prop("selected", true);
                    }
                    $o_member_to.change();

                    $o_selects.selectpicker("refresh");
                    $btn.prop('disabled', false);
                }
            });
        });
    },

    to_copy_member: function() {
        var $form   = $(DemandIW.el_message_form);
        var $to      = $form.find("select[name='message_data[to_eid]']");
        var $copy    = $form.find("select[name='message_data[copy_eid][]']");

        $to.on("change", function() {
            var eid = $(this).val();

            if (eid == 0) {
                $copy.prop("disabled", true).closest(".form-group").addClass("hidden");
            } else {
                $copy.prop("disabled", false).closest(".form-group").removeClass("hidden");
                $copy.find("option:disabled").prop("disabled",false);
                $copy.find("option[value="+eid+"]").prop("disabled",true).prop("selected", false);
                $copy.selectpicker("refresh");
            }
        });

    },

    set_demand_id: function(demand_id) {
        this.demand_id = demand_id;
        $(DemandIW.el_message_form).find("input[name='message_data[demand_id]']").val(this.demand_id);

        if (demand_id) {
            $(this.el_toggle_check_message).removeClass("hidden");
        } else {
            $(this.el_toggle_check_message).addClass("hidden");
        }

    },

    toggle_check_message: function() {
        $(this.el_toggle_check_message).on("click", function() {
            if (!DemandIW.check_state) {
                DemandIW.check_new_message();
            }
            return false;
        });

    },

    check_new_message: function() {

        if (DemandIW.check_tid) {
            clearTimeout(DemandIW.check_tid);
        }

        if (!this.demand_id) {
            return;
        }

        $(this.el_toggle_check_message).find("i.fa").addClass("text-warning");
        DemandIW.check_state = 1;

        Pace.ignore(function() {
            $.ajax({
                url: 'demands/view/' + DemandIW.demand_id + '/get_new_message/?time=' + DemandIW.check_last_time,
                dataType: 'json',
                success: function (response) {
                    DemandIW.check_state = 0;

                    if (response.status == 200) {
                        DemandIW.check_last_time = response.time;

                        $(response.data).each(function (i, message) {
                            DemandIW.append_message(message.html);
                            toastr.success('<strong>' + message.from + '</strong><br/>' + message.text, 'Новое сообщение в заявке');

                            if (Visibility.hidden()) {
                                Tinycon.setBubble(++DemandIW.nr_message_count);
                            }
                        });

                        $(DemandIW.el_toggle_check_message).find("i.fa").removeClass("text-warning");

                        DemandIW.check_tid = setTimeout(function () {
                            DemandIW.check_new_message(DemandIW.check_last_time);
                        }, DemandIW.check_timeout);
                    }
                }
            });
        });

    },

    save: function($form, $e, callback) {

        var $icon = $e.find('i.fa');

        if ($icon.length) {
            $icon.data('restore-class', $icon.prop('class'));
            $icon.prop("class", "fa fa-spinner fa-spin");
        }

        $e.attr("disabled", "disabled");

        $.ajax({
            url: "/demands/edit/"+DemandIW.demand_id+"/save/",
            dataType: 'json',
            method: 'POST',
            data: $form.serialize(),
            success: function(response) {

                if ($icon.length) {
                    $icon.prop('class', $icon.data('restore-class'));
                }

                $e.removeAttr("disabled", "disabled");

                if (response.status == 200) {
                    toastr.success('Заявка успешно сохранена', "Сохранение изменений");

                    SidebarIW.reload_demands_member();
                    SidebarIW.reload_cat_dmd_counts();

                    //if $("#demands-table-locked").is(":checked")
                    //$("#demands-table").jcatcher.reload();
                    if (!DemandIW.$demand_table || $("#demands-table-locked").is(":checked")) {
                        $("#demands-table").jcatcher.reload();
                    } else {
                        DemandIW.reload_list();
                    }


                    if (callback != undefined) {
                        if (typeof(callback) === "function") {
                            callback($e, response);
                        } else {
                            window[callback]($e, response);
                        }
                    }

                } else {
                    $(response.ar_errors).each(function(i, text) {
                        toastr.error(text, "Ошибка сохранения");

                    });

                }

            }
        });

        /*$("#demands-table").jcatcher.reload(function() {
            callback();
            toastr.info('Заявка успешно обновлена');
        });*/
    },

    find: function(id, data, href) {
        $.ajax({
            url: "/demands/view/"+id+"/get_next_prev_id/",
            dataType: 'json',
            method: 'get',
            data: data,
            success: function (response) {
                if (response.status == 200) {
                    if (response.data.page != 0) {
                        DemandIW.$demand_table.jscroll.go_page(response.data.page, function() {
                            var $cur = (DemandIW.$demand_table).find("tr[data-id="+id+"]").click();
                            $(DemandIW.$demand_table).closest(".jscroll-pager").scrollTo($cur, 300, {offset:{top:-35}});
                        });
                    } else if (href != null) {
                        location.href=href;
                    }

                    //response.data.prev
                }
            }
        });
    },


    start_observer: function() {
        var self = this;
        self.check_new_message();
    },

    stop_observer: function() {
        //clearInterval(this.iid);
    },

    init: function() {

        Visibility.change(function (e, state) {
            if ( !Visibility.hidden() ) {
                DemandIW.check_timeout = 5000;
                DemandIW.nr_message_count = 0;
                Tinycon.setBubble(0);
            } else {
                DemandIW.check_timeout = 15000;
            }
        });

        this.$demand_table = $("#demands-table");
        if (!this.$demand_table.length) {
            this.$demand_table = null;
        }

        this.toggle_check_message();
        this.change_status_observer();
        this.message_form_pane_toggler();
        this.message_form();
        this.to_copy_member();
        this.message_form_submit();
    }
};



