/*var coreIw = (function () {
    return {
        init: function() {
            alert("init");
        }
    }

})();*/

var CoreIW = {

    layout_init: false,
    language: 'ru',

    reload_counters: function() {
        var $block = $("#navbar-top");
        var $badge = $block.find("a .badge[data-counter]");

        $badge.html('<i class="fa fa-spinner fa-spin"></i>');

        $.ajax({
            url: 'get_counters/',
            dataType: 'json',
            success: function (response) {
                $.each(response, function(counter_name, count) {
                    var $current = $block.find("a .badge[data-counter="+counter_name+"]");
                    if (count) {
                        $current.html(count);
                    } else {
                        $current.empty();
                    }

                });
            }
        });
    },


    // Инициализации

    init_stickyhead: function(context) {

        /*$('.table.table-sticky-head', context).each(function() {
            $(this).stickyTableHeaders({scrollableArea: $(this).closest(".ui-layout-pane")[0], "fixedOffset": 0});
        });*/

        /*$('.table.table-sticky-head', context).each(function() {

            var scrollableArea = null;;

            if ($(this).closest(".ui-layout-content").length) {
                scrollableArea = $(this).closest(".ui-layout-content")[0];
            } else {
                scrollableArea = $(this).closest(".ui-layout-pane")[0];
            }

            $(this).stickyTableHeaders({scrollableArea: scrollableArea, "fixedOffset": 0});
        });*/

    },

    init_navmore: function () {
        // $(".navbar.navbar-more").navmore();
    },

    init_summernote: function() {
        $('.summernote').summernote({
            /*height: 50,*/
            minHeight:50,
            maxHeight:100,
            lang: 'ru-RU'
        });


    },

    init_fancybox: function() {
        $(".fancybox").fancybox({

            padding:3,

            openEffect	: 'elastic',
            closeEffect	: 'elastic',

            closeBtn		: false,

            helpers : {
                title: {
                    type: 'over'
                },
                overlay: {
                    locked: false
                },
                buttons	: {position: 'bottom'}
            }

            /*'transitionIn'		: 'none',
             'transitionOut'		: 'none',
             'titlePosition' 	: 'over',
             'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
             return '<span id="fancybox-title-over">Image ' +  (currentIndex + 1) + ' / ' + currentArray.length + ' ' + title + '</span>';
             }*/

        });

    },

    init_datetimepicker: function(context) {

        $('.form_datetime', context).datetimepicker({
            format: 'dd/mm/yyyy hh:ii',
            linkFormat: "yyyy-mm-dd hh:ii",
            language:  'ru',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            fontAwesome: true,
            startView: 2,
            forceParse: 0,
            showMeridian: 1,
            pickerPosition: 'bottom-left'
        });
        $('.form_date', context).datetimepicker({
            format: 'dd/mm/yyyy',
            linkFormat: "yyyy-mm-dd",
            language:  'ru',
            weekStart: 1,
            todayBtn:  1,
            fontAwesome: true,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0,
            pickerPosition: 'bottom-left'
        });

        /*$('.form_date', context).each(function() {
            var position = $(this).data('picker-position')?$(this).data('picker-position'):'bottom-left';
            $(this).datetimepicker({
                format: 'dd/mm/yyyy',
                linkFormat: "yyyy-mm-dd",
                fontAwesome: true,
                language:  'ru',
                weekStart: 1,
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                minView: 2,
                forceParse: 0,
                pickerPosition: position
            });
        });*/

        $('.form_time', context).datetimepicker({
            format: 'hh:ii',
            language:  'ru',
            weekStart: 1,
            autoclose: 1,
            fontAwesome: true,
            startView: 1,
            minView: 0,
            maxView: 1,
            forceParse: 0,
            minuteStep:15,
            pickerPosition: 'bottom-left'
        });
    },

    init_selectpicker: function(context) {

        $('select.select-reset', context).each(function () {
            if (!$(this).parent().hasClass("input-group")) {
                $(this).wrap("<div class='input-group'>");
            }
            $(this).parent().append("<span class='input-group-btn reset-addon'><button class='btn btn-default btn-select-reset' type='button'>&times;</button></span>");
        });

        $(".btn-select-reset", context).on("click", function() {
            $(this).closest(".input-group").find("select").selectpicker('deselectAll');
        });

        $("select.selectpicker", context).each(function() {
            var option = {iconBase: 'fa', tickIcon: 'fa-check'};

            if (context == undefined) {
                option.container = 'body';
            }

            if ($(this).data("align-right") !=undefined) {
                option.dropdownAlignRight = true;
            }

            $(this).selectpicker(option);
        });

        $(".btn-find-option[data-for][data-value]").on("click", function() {
            var $e = $($(this).data("for"));
            var value = $(this).data("value");

            $e.selectpicker('deselectAll');
            $e.selectpicker('val', value);

            return false;
        });


    },

    init_donuts: function(context) {
        $('.donut', context).peity('donut', { colours: ["#C6D9FD", "#4D89F9"], radius: 6 });
    },

    init_touchspin: function(context) {
        $('.touch-spin', context).TouchSpin({max: 10000});
    },

    init_icheck: function(context) {
        $('.i-checks', context).iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%'
        });

        $('.i-checks-red', context).iCheck({
            checkboxClass: 'icheckbox_square-red',
            radioClass: 'iradio_square-red',
            increaseArea: '20%'
        });

    },


    init_colorpicker: function(context) {
        $('.colorselect', context).colorpicker({format:'hex',component: '.input-group-addon:first'});
    },

    init_jscroll: function(context) {
        //$('.jscroll', context).jscroll();
        //console.log(context);
        $('.jscroll').jscroll();
    },

    init_footable: function(context) {
        $('.footable', context).footable({
            delay: 0,
            breakpoints: {
                phone: 480,
                tablet: 1024
            },
            addRowToggle: true,
            toggleSelector: ' > tbody > tr:not(.footable-row-detail) td .footable-toggle',
            debug: true,
            log: function(message, type) {
                //console.log(message, type);
            }

        }).on("footable_toggle_row", function(event) {
            console.log($(event));
        });
    },

    init_popover: function() {
        $('[data-toggle="popover"]').popover();
    },

    init_modal: function() {
        $('#modal-remote').on('show.bs.modal', function(e) {

            //console.log(e.namespace);

            // fix datetime picker trigger show
            if (e.namespace == undefined || e.namespace != 'bs.modal') {
                return false;
            }

            var fullsize = $(e.relatedTarget).data('fullsize');

            if (fullsize != undefined) {
                $(this).find(".modal-dialog:not(.modal-fullsize)").toggleClass("modal-lg modal-fullsize");
            } else {
                $(this).find(".modal-dialog:not(.modal-lg)").toggleClass("modal-fullsize modal-lg");
            }

            $(this).find(".modal-body").prepend('<div id="modal-remote-loading" class="alert alert-default clamped-margin-bottom">Ждите, идет загрузка данных... <i class="fa fa-spinner fa-spin"></i></div>');

        }).on('loaded.bs.modal', function(e) {
            $("#modal-remote-loading").remove();
            $('body').trigger('refresh.content', {context: $(this), wait_animation: false});

        }).on('hidden.bs.modal', function() {
            $(this).removeData('bs.modal').find(".modal-header h4").html("Быстрый просмотр");
            $(this).find(".modal-body").empty();
        });

        $('.modal:not(#modal-remote)').on('show.bs.modal', function(e) {
            $('body').trigger('refresh.content', {context: $(this)});
        });

        //$('.modal').appendTo("body");
    },

    init_forms_actions: function() {
        this.animation_end( function() {

            $('form.form-horizontal .form-actions').each(function() {

                var $self = $(this),
                    $pane = $self.closest('.ui-layout-pane'),
                    form_action_top     = $(this).position().top + $pane.scrollTop(),
                    form_action_width   = $(this).width();

                $pane.on('scroll', function() {
                    var scroll_bottom = $(this).scrollTop() + $(this).height();
                    //console.log(scroll_bottom, form_action_top);
                    if (scroll_bottom >= form_action_top+20) {
                        if ($self.hasClass('form-actions-fixed')) {
                            $self.css({width: 'auto'}).removeClass('form-actions-fixed').closest('form').removeClass('form-actions-fixed');
                        }
                    } else {
                        if (!$self.hasClass('form-actions-fixed')) {
                            $self.css({width: form_action_width}).addClass('form-actions-fixed').closest('form').addClass('form-actions-fixed');
                        }
                    }
                }).scroll();
            });
        });

    },

    //form_changed: false,

    init_forms: function() {

        this.init_forms_actions();

        /*$('form.form-horizontal.form-actions-fixed a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            CoreIW.init_forms_actions();
        });*/

        $('form.form-horizontal .form-actions button[name=save]').data("loading-text", 'Ждите... <i class="fa fa-spinner fa-spin"></i>').on('click', function() {
            var w = $(this).css("width");
            $(this).button("loading").css({width: w});
            Pace.restart();
        });

        $(document).find("form .form-group-general:first input:first").focus();

        $("form .form-actions button.btn-form-reset").on("click", function() {
            this.form.reset();
            $(this.form).find("input:checkbox").iCheck('update');
            $(this.form).find("select.selectpicker").selectpicker('refresh');
            toastr.success('Данные формы возвращены в первоначальные значения', 'Форма сброшена');
            return false;
        });

        function set_titles($e) {
            var general_value = [];

            $e.closest("form").find(".form-group-general").find("input:text.form-control, select.form-control").each(function(i) {

                var value = ($(this).get(0).tagName == "SELECT")?$(this).find(":selected").text():$(this).val();

                if (value) {
                    general_value.push(value);
                }
            });

            var title = general_value.join(' ');
            if (title != '') { title = '«'+title+'»'; }

            $(".page-heading .title .rec-title").text(title);
            var ar_doc_title = document.title.split(' :: ');
            ar_doc_title[0] = $(".page-heading .title").text();
            document.title = ar_doc_title.join(' :: ');
        }

        $("form .form-group-general input:text.form-control").on("keyup", function() {
            set_titles($(this));
        });

        $("form .form-group-general select.form-control").on("change", function() {
            set_titles($(this));
        });

    },

    init_dropdown_nav: function() {
        $('ul.nav li.dropdown > a.dropdown-toggle').on('click', function() {

            var href = $(this).attr('href');
            if (href != '#') {
                window.location.href = $(this).attr('href');
            }
            return false;

        }).parent().hover(function() {
            $(this).find('.dropdown-menu').stop(true, true).fadeIn('fast').parent().addClass('open');
        }, function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut('fast').parent().removeClass('open');
        });
    },

    init_confirmcall_links: function() {
        $(document).on("click", "a.confirmcall[data-confirm]", function() {

            var $self = $(this);
            var confirm_message = $self.data("confirm");
            var confirm_title   = $self.data("confirm-title");

            bootbox.confirm({message: confirm_message, title: confirm_title, callback: function(r) { if (r) {
                location.href = $self.prop("href");
            } }});

            return false;

        });
    },

    ajaxcall: function($e, confirm_message, confirm_title, callback) {
        var ajax_request = function() {

            var $icon = $e.find('i.fa');

            if ($icon.length) {
                $icon.data('restore-class', $icon.prop('class'));
                $icon.prop("class", "fa fa-spinner fa-spin");
            }

            $.ajax({
                url: $e.prop("href"),
                dataType: 'json',
                success: function(response) {

                    if ($icon.length) {
                        $icon.prop('class', $icon.data('restore-class'));
                    }

                    if (callback != undefined) {
                        if (typeof(callback) === "function") {
                            callback($e, response);
                        } else {
                            window[callback]($e, response);
                        }

                    }
                }
            });
        };

        if (confirm_message != undefined) {
            bootbox.confirm({message: confirm_message, title: confirm_title, callback: function(r) { if (r) { ajax_request(); } }});
        } else {
            ajax_request();
        }

    },

    init_ajaxcall_links: function() {
        $(document).on("click", "a.ajaxcall", function() {

            var $self = $(this);

            var confirm_message = $self.data("confirm");
            var confirm_title   = $self.data("confirm-title");
            var callback        = $self.data("callback");

            CoreIW.ajaxcall($self, confirm_message, confirm_title, callback);

            return false;
        });
    },

    init_ajaxcall_tabs: function() {

        //$('a[data-toggle="tab"][data-remote]').on('shown.bs.tab', function (e) {
        $(document).on('shown.bs.tab', 'a[data-toggle="tab"][data-remote]', function (e) {

            var $self = $(this);
            var $pane = $($self.attr("href"));

            $pane.removeClass("bg-white").html('<div class="alert alert-default clamped-margin-bottom">Ждите, идет загрузка данных...</div>');

            var ajax_request = function() {

                var $icon = $self.find('i.fa');

                if ($icon.length) {
                    $icon.data('restore-class', $icon.prop('class'));
                    $icon.prop("class", "fa fa-fw fa-spinner fa-spin");
                }

                $.ajax({
                    url: $self.data("remote"),
                    dataType: 'json',
                    success: function(response) {

                        if ($icon.length) {
                            $icon.prop('class', $icon.data('restore-class'));
                        }

                        if (response.status != 0) {
                            $pane.addClass("bg-white").html(response.data);

                            var callback = $self.data("callback");
                            if (callback != undefined) {
                                window[callback]($self, response);
                            }

                            $('body').trigger('refresh.content', {context: $pane, wait_animation: false});
                        }
                    }
                });
            };

            ajax_request();
        });
    },

    init_password_input_group: function() {
        $(".visibility-password-switch").on("click", function() {
            $("i", this).toggleClass("fa-eye-slash").toggleClass("fa-eye");

            var input = $(this).closest(".input-group").find("input");

            if (input.prop("type") == "text") {
                input.prop("type", "password");
            }
            else {
                input.prop("type", "text");
            }
        });
    },

    init_tabs_hash: function() {
        var prefix = "tab-";
        var hash = document.location.hash;
        if (hash) {
            $('.nav-tabs a[href='+hash.replace(prefix,"")+']').tab('show');
        }

        $('.nav-tabs a').on('shown.bs.tab', function(e) {
            window.location.hash = e.target.hash.replace("#", "#" + prefix);
        })
    },

    init_tabsdrop: function(context) {
        $('.nav-tabs', context).tabdrop({text: '<i class="fa fa-bars"></i>'});
    },

    init_scroll_down: function() {
        $(document).on("click", ".scroll-to-down", function() {

            var scrollableArea;
            if ($(this).closest(".ui-layout-content").length) {
                scrollableArea = $(this).closest(".ui-layout-content")[0];
            } else {
                scrollableArea = $(this).closest(".ui-layout-pane")[0];
            }

            $(scrollableArea).scrollTo('100%', 500);
            return false;
        });
    },

    init_favorites: function() {
        $(document).on("click", ".btn-favorite", function() {
            var id = $(this).data("id");
            var $self = $(this);

            CoreIW.ajaxcall($self, undefined, undefined, function() {
                if ($self.hasClass("active")) {
                    toastr.success('Объект удален из избранного', 'Избранное');
                    $self.removeClass("active").attr("href", $self.attr("href").replace("delete", "add"));

                } else {
                    toastr.success('Объект добавлен в избранное', 'Избранное');
                    $self.addClass("active").attr("href", $self.attr("href").replace("add", "delete"));
                }
            });

            return false;
        });
    },


    init_inputmasks: function() {
        $("input.mask-phone").inputmask({mask: '+7 (999) 9999-9999'});
    },

    animation_end: function(callback, el, alltime) {

        var object = (el!=undefined)?el:document;
        /*var events = 'animationend MSAnimationend oanimationend webkitAnimationEnd';

        if (alltime == undefined) {
            $(object).one(events, function(e) { callback(e.target); });
        } else {
            $(object).on(events, function(e) { callback(e.target); });
        }*/
        callback(object);

    },

    binding: function() {

        var self = this;

        $('body').bind('init.layout', function(event){
            self.layout_init = true;

            $(window).resize();
            self.init_forms();
            self.init_jscroll();
            self.init_footable();

        }).bind('layout_resize_end', function(event){
            setTimeout(function() {
                $(window).resize();

                // Обновляем закрепленные головы таблиц
                //$('.table.table-sticky-head').trigger('resize.stickyTableHeaders');

            }, 50);


        }).bind('refresh.content', function(event, args) {

            console.log('refresh');
            //console.log(args);

            self.init_selectpicker(args.context);
            console.log('refresh');
            self.init_icheck(args.context);
            self.init_donuts(args.context);
            self.init_footable(args.context);
            //self.init_ajaxcall_links(args.context);

            if (args.wait_animation == undefined || args.wait_animation == true) {
                self.animation_end(function() {
                    console.log('animation_end');
                    self.init_jscroll(args.context);
                    self.init_stickyhead(args.context);
                    self.init_datetimepicker(args.context);
                    self.init_tabsdrop(args.context);
                });
            } else {
                self.init_jscroll(args.context);
                self.init_stickyhead(args.context);
                self.init_datetimepicker(args.context);
            }

            //$(window).resize();
        });
    },

    beforeunload: function() {
        $(window).on("beforeunload", function (e) {

            var form_changed = false;

            $('form.form-control-changes').each(function() {
                if ($(this).data('serialize') != undefined && $(this).serialize() != $(this).data('serialize')) {
                    $(this).find(".form-actions button[name=save]").button("reset");
                    form_changed = true;
                    return true;
                }
            });

            if (!form_changed) {
                return;
            }

            var e = e || window.event;
            var myMessage= "Вы действительно хотите покинуть страницу, не сохранив данные?";
            if (e) {
                e.returnValue = myMessage;
            }
            return myMessage;
        });
    },

    // https://github.com/snikch/jquery.dirtyforms
    control_changes: function() {
        $('form.form-control-changes').each(function() {
            $(this).data('serialize',$(this).serialize());
        }).on("submit", function(event){
            $(window).off('beforeunload');
        });

        this.beforeunload();

    },

    init: function(lang) {
        this.language = lang;
        var self = this;

        this.animation_end(function(el) { $(el).removeClass("animated fadeInDown"); }, undefined, true);

        /*jQuery(document).ajaxError(function(){
            toastr.error('При загрузке данных обнаружена ошибка. Сообщите администратору системы.', 'Внутренняя ошибка!');
        });*/

        $.ajaxSetup({cache:false});

        $().ready( function() {

            self.init_popover();
            self.init_modal();
            self.init_dropdown_nav();
            self.init_navmore();
            self.init_ajaxcall_links();
            self.init_ajaxcall_tabs();
            self.init_confirmcall_links();
            self.init_inputmasks();

            self.animation_end(function() {
                self.init_stickyhead();
                console.log('animationend');
            });

            self.init_donuts();
            self.init_touchspin();
            self.init_selectpicker();
            self.init_icheck();
            self.init_colorpicker();
            self.init_datetimepicker();
            self.init_summernote();
            self.init_scroll_down();
            self.init_favorites();
            self.init_password_input_group();
            self.init_tabs_hash();
            self.init_fancybox();
            self.init_tabsdrop();
            $('body').trigger('init.core');

        });

        this.binding();

        this.control_changes();


    }
};


$(window).resize(function() {

    // Ждем полного перерасчета холстов и устанавливаем соответствующий класс их ширины
    setTimeout(function() {

        $('.ui-layout-pane').each(function() {
            var pane_width = $(this).width();
            //console.log($(this), pane_width);

            $(this).removeClass("ui-layout-lg ui-layout-md ui-layout-sm ui-layout-xs");

            if (pane_width >= 1200) {
                $(this).addClass("ui-layout-lg");
            } else if (pane_width >= 992) {
                $(this).addClass("ui-layout-md");
            } else if (pane_width >= 768) {
                $(this).addClass("ui-layout-sm");
            } else {
                $(this).addClass("ui-layout-xs");
            }
        });
    }, 100);

});



