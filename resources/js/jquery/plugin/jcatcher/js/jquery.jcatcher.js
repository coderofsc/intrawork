(function($) {

    $.jcatcher = {
        defaults: {
            source      : false,
            id_tpl      : '%DATA%',
            wrap        : false,
            container   : 'table',
            items       : 'tbody tr',
            muted       : false,
            empty       : 'Ничего не выбрано',
            error       : 'Во время загрузки произошла ошибка',
            morph       : ['объект', 'объекта', 'объектов'],
            $paging     : false,
            conditions  : '',

            callback_begin     : function(selected_id, selected_e) { document.title = 'Загрузка...'; },
            callback_end       : false,
            callback_complete  : false,
            callback_empty     : false
        }
    };

    // Constructor
    var jCatcher = function($e, options) {

        var _data = $e.data('jcatcher');
        $e.data('jcatcher', $.extend({}, _data, {initialized: true}));

        var _options = $.extend({}, $.jcatcher.defaults, options || {});

        //console.log(_options);

        var selected_e, selected_id = null;
        var multiselect_mode = false;
        var selected_count = 0;

        var xhr     = null;

        $e.addClass("jcatcher");
        //var $pane = $e.closest(".ui-layout-center");
        var $pane = $e.closest(".jscroll-pager");
        var wrap    = $('#'+_options.wrap);
        var wrap_container = wrap.find(".preview-container");

        $('#main-backdrop').appendTo($pane);

        $(wrap).on("layoutpaneopen", function() {
            if ($e.hasClass("footable")) {
                 $pane.css({'overflow': 'hidden'});
                 $('#main-backdrop').css({top:$pane.scrollTop()}).show();
                 $e.one("footable_resized", function() {  $('#main-backdrop').hide().remove(); $pane.css({'overflow': 'auto'}); pageLayout.resizeAll(); });
             }
        });

        $e.on("click",_options.items+'[data-id]', function(e) {

            if ($(e.target).hasClass("footable-toggle") || $(e.target).is("a, a > *, button, button > *")) {
                return true;
            }

            $(wrap).filter(":hidden").trigger("layoutpaneopen");
            pageLayout.center.children.super_middle_layout.center.children.middle_layout.open("east");
            //console.log($(wrap).filter(":hidden"));

            /*return;*/

            selected_e = $(this);

            //if (e.ctrlKey != true) {
            deselected_all();
            //}

            selected_e.toggleClass("selected");
            selected_count = $e.find(".selected").length;

            if (selected_count > 1) {
                multiselect();
            } else if (selected_count == 0) {
                empty_wrap();
            } else {
                multiselect_mode = false;
                selected_id = $(this).data('id');
                //$.removeCookie('jcatcher-selected');
                //$.cookie('jcatcher-selected', selected_id, { expires: 7, path: location.pathname+location.search });

                if (_options.$paging) {
                    $(_options.$paging).find(".current-cmp").val($(this).data('rownum'));
                }

                //
                //location.hash='page:'+selected_e.closest(_options.container).jscroll.get_page()+';selected='+selected_id;
                begin();
            }

        });

        wrap_container.on("click", ".deselected-all", function() {
            multiselect_mode = false;
            deselected_all();
            empty_wrap();
            //selected_e.click();
        });

        var deselected_all = function() {
            selected_e.closest(_options.container).find(_options.items+".selected").not(selected_e).toggleClass("selected");
        };

        var build_multiselect_container = function() {
            var buffer = '<h3>Выделено <span class="selected-count">'+selected_count+' '+word_declension(selected_count, _options.morph)+'</span></h3>';

            buffer+='<div class="space"></div>';

            buffer+='<div class="btn-group-vertical">';
            buffer+='<button class="btn btn-default">Удалить</button>';
            buffer+='<button class="btn btn-default">Переместить</button>';
            buffer+='</div>';

            buffer+='<div class="space"></div>';
            buffer+='<div><button class="btn btn-link deselected-all">Снять выделение</a></button>';

            return buffer;
        };

        var multiselect = function() {

            if (!multiselect_mode) {
                wrap_container.empty().addClass("cm-container").hide(0,function() {
                    // wrap.addClass("bg-muted");
                    $(this)//.addClass("cm-container")
                        .html('<div>'+build_multiselect_container()+'</div>')
                        .show();

                });
            } else {
                wrap_container.find(".selected-count").html(selected_count+' '+word_declension(selected_count, _options.morph));
            }

            multiselect_mode = true;
        };

        var empty_wrap = function() {
            wrap_container.empty().addClass("cm-container").hide(0,function() {
                wrap.addClass("bg-muted");
                $(this)//.addClass("cm-container")
                    .html('<div><h3>'+_options.empty+'</h3></div>')
                    .show();
            });

            if (_options.callback_empty != false) {
                _options.callback_empty();
            }

        };

        var error_wrap = function(textStatus) {
            wrap_container.empty().addClass("cm-container").hide(0,function() {
                // wrap.addClass("bg-muted");
                $(this)//.addClass("cm-container")
                    .html('<div><h3 class="text-danger"><i class="fa fa-warning"></i> '+_options.error+'</h3><small>'+textStatus+'</small></div>')
                    .show();
            });
        };

        var begin = function() {
            wrap_container.empty().addClass("cm-container").hide(0,function() {
                if (_options.callback_begin != false) {
                    _options.callback_begin(selected_id, selected_e);
                }

                $(this)//.addClass("cm-container")
                    .html('<div><h3>Загрузка, ожидайте... <i class="fa fa-spinner fa-spin"></i></h3></div>')
                    .show();

                load_data();
            });
        };

        var load_data = function() {

            if (xhr != null) {
                xhr.abort();
            }

            var src_url = _options.source.replace('%DATA_ID%', selected_id);

            xhr = $.getJSON(src_url, function(response) {

                if (_options.callback_end != false) {
                    _options.callback_end(selected_id, response, selected_e);
                }

                wrap_container.empty();
                //.hide('fast', function() {

                if (wrap.hasClass('jscroll')) {
                    //console.log(wrap.jscroll);
                    wrap.jscroll.destroy();
                }

                //$(this).empty();

                if (!_options.muted) {
                    wrap.removeClass("bg-muted");
                }

                wrap_container.removeClass('cm-container')
                    .html(response.data)
                    .show().css({display: ''});

                if (_options.callback_complete != false) {
                    _options.callback_complete(selected_id, response, selected_e);
                }

                $('body').trigger('refresh.content', {context: wrap_container.parent()});

                $(wrap).trigger("layoutpanesizecontent");

                xhr = null;
            }).error(function(jqXHR, textStatus, errorThrown) {
                error_wrap(textStatus);
                xhr = null;
            });
        };

        var unselect = function(id) {
            $($e).find(_options.items+'[data-id='+id+']').click();
        };

        var next = function() {
            var $next = $($e).find(_options.items+'[data-id='+selected_id+']').next();
            //if ($next.hasClass("warning")) {
            if (!$next.is("[data-id]")) {
                $next = $next.next();
            }

            var go = function() {
                if ($pane.height() < $next.offset().top) { /*console.log($pane);*/ $pane.scrollTo($next, 100, {offset: {top:-$pane.height()+$next.height()}}); }
                $next.click();
            };

            if ($next.length == 0 && _options.$paging && $pane.jscroll.check_next()) {
                _options.$paging.find(".btn-page-next").click();
                //$pane.jscroll.load();

                $("body").one("jscroll-after-append", function() {
                    //$next = $($e).find(_options.items+'[data-id='+selected_id+']').next().next();
                    $next = $($e).find(_options.items+'[data-id]').first();
                    go();
                });

                return true;
            }

            if ($next.length != 0) {
                go();
                return true;
            }

            return false;
        };

        var prev = function() {
            var $prev = $($e).find(_options.items+'[data-id='+selected_id+']').prev();
            //if ($prev.hasClass("warning")) {
            if (!$prev.is("[data-id]")) {
                $prev = $prev.prev();
            }

            var go = function() {
                if ($prev.offset().top < 85) { $pane.scrollTo($prev, 100/*, {offset:{top:-35}}*/); }
                $prev.click();
            };

            if ($prev.length == 0 && _options.$paging) {
                _options.$paging.find(".btn-page-prev").click();
                //$pane.jscroll.load();

                $("body").one("jscroll-after-append", function() {
                    //$next = $($e).find(_options.items+'[data-id='+selected_id+']').next().next();
                    $prev = $($e).find(_options.items+'[data-id]').last();
                    go();
                });

                return true;
            }


            if ($prev.length != 0) {
                go();
                return true;
            }

            return false;
        };

        var reload = function() {
            begin();
        };

        var set_bindings = function () {

            if (_options.$paging) {
                _options.$paging.find(".btn-cmp-next").on("click", function() {
                    next();
                });
                _options.$paging.find(".btn-cmp-prev").on("click", function() {
                    prev();
                });

                _options.$paging.find(".btn-cmp-search").on("click", function() {
                    var input_num  = parseInt($(_options.$paging).find(".current-cmp").val());

                    if (!isNaN(input_num) && input_num > 0 ) {
                        CompanyIW.find_rownum(input_num, _options.conditions, function(data) {
                            CompanyIW.find(data.id,  _options.conditions, null);
                        });
                    }
                });

                $($(_options.$paging).find(".current-cmp")).on('keyup', function(e) {
                    if (e.which == 13) {
                        _options.$paging.find(".btn-cmp-search").click();
                    }
                });
            }
        };


        empty_wrap();

        set_bindings();

        $.extend($e.jcatcher, {
            unselect: unselect,
            next: next,
            prev: prev,
            reload: reload

        });

        return $e;
    };

    $.fn.jcatcher = function(options) {

        return this.each(function() {
            var $this = $(this), data = $this.data('jcatcher');

            if (data && data.initialized) {
                return;
            }

            var jcatcher = new jCatcher($this, options);

        });
    };
})(jQuery);