//https://github.com/pklauzinski/jscroll/blob/master/jquery.jscroll.js


(function($) {

    $.jscroll = {
        defaults: {
            //debug: false,
            autoTrigger: true,
            autoTriggerUntil: false,
            //loadingHtml: '<small>Loading...</small>',
            padding: 0,
            nextSelector: 'ul.pager a',
            //contentSelector: '',
            $paging: false,
            page_url_template: '',
            callback: false,
            replace: false
        }
    };

    // Constructor
    var jScroll = function($e, _options) {

        var data        = $e.data('jscroll'),
            options     = $.extend({}, $.jscroll.defaults, _options, data || {}),
            $next       = $e.find(options.nextSelector),
            waiting     = false,
            nextHref    = $next.attr('href'),
            current_page = 1;

        var wrap_inner_content = function() {
            if (!$e.find('.jscroll-inner').length) {
                $e.contents().wrapAll('<div class="jscroll-inner" />');
            }
        };

        var append_wrap = function(wrap) {

            var $inner_container = $e.find('.jscroll-inner');
            var $new_next = $('<div>'+wrap+'</div>').find(options.nextSelector);
            var $table = $e.find('table:not(.page-heading-table)');
            var $tbody = $table.find("tbody");


            /*
            // Дурдом!
            if (!$(wrap).find("tbody").length) {
                $table.hide().before(wrap);
                wrap = '<table><tbody><tr><td colspan="10"></td></tr></tbody></table>';
            } else {
                $e.find(".alert").remove();
                $table.show();
            }*/

            if (wrap) {
                //var buffer_page = "<tr class='warning'><td colspan='10' class='text-center'>Страница "+(current_page)+"</td></tr>";
                var buffer_page = "";

                if (options.$paging) {
                    $(options.$paging).find(".current-page").val(current_page);
                }

                if (options.replace) {
                } else {
                    $tbody.append(buffer_page);
                }

                $e.trigger('jscroll_before_append', {context: wrap});

                if (options.replace) {
                    $tbody = $(wrap).find('tbody').replaceAll($tbody);
                    $tbody.prepend(buffer_page);
                } else {
                    $(wrap).find('tbody tr').appendTo($tbody);
                }
                $e.trigger('jscroll-after-append', {context: $tbody});
                $e.find('table.footable tbody').trigger('footable_redraw');

                var $scrollto = $e.find('table tr.warning').last().prev();
                if (options.replace) {
                    $scrollto = $e.find('table.jcatcher');
                    //console.log($e);
                }

                $e.scrollTo($scrollto, 500, {onAfter: function() { waiting = false; }});
            }

            if ($new_next.length) {
                if ($next == null) {
                    $inner_container.append('<ul class="pager"><li>'+$new_next.get(0).outerHTML+"</li></ul>");
                } else {
                    $next.replaceWith($new_next);
                }

                $next   = $inner_container.find(options.nextSelector);
                //console.log($next);
                $next.parent().removeClass("disabled");

                observe_next();

            } else {
                //$e.append('<div class="space"></div><div class="text-center text-muted">Конец списка</div>');
                if ($next != null) {
                    $next.closest("ul").remove();
                    $next = null;
                }
            }

        };

        var check_next = function() {

            if ($next && $next.attr("href")) {
                nextHref = $next.attr("href");
                return true;
            } else {
                //destroy();
                return false;
            }
        };

        var load = function(callback) {

            if ($next != null) {
                $next.html('<i class="fa fa-spinner fa-spin"></i> Загружаю...').parent().addClass('disabled');
            }
            waiting = true;

            //location.hash='page:'+current_page;

            $.ajax({
                url: nextHref,
                dataType: 'json',
                success: function(response) {
                    // Здесь делать установку значений по страницам,
                    // проверку на пустой список
                    append_wrap(response.data);

                    current_page = parseInt(response.offset)/parseInt(response.limit)+1;
                    var total_page = Math.ceil(parseInt(response.total)/parseInt(response.limit));

                    $(options.$paging).find(".current-page").val(current_page);
                    $(options.$paging).find(".max-page").html(total_page);

                    check_next();
                    if (callback != undefined) {
                        callback();
                    }
                }
            });
        };

        var observe_next = function() {
            $next.on("click.jscroll", function() {
                if(!waiting) {
                    current_page++;
                    load();
                }
                return false;
            });

        };


        var observe = function() {
            var $inner_container = $e.find('.jscroll-inner');

            $e.on('scroll.jscroll', function() { // clamped у таблицы!

                if($next && !waiting && $e.scrollTop() >= $inner_container.height()-$e.height()-30) {
                    current_page++;
                    load();
                }
            });

            observe_next();
        };

        var go_page = function (page, callback) {
            current_page = page;
            nextHref = options.page_url_template.replace('%PAGE%', (page-1));
            load(callback);
        };

        var reload = function (callback) {
            nextHref = options.page_url_template.replace('%PAGE%', current_page-1);
            load(callback);
        };

        var get_page = function() {
            return current_page;
        };

        var set_bindings = function () {
            var $next = $e.find(options.nextSelector).first();

            if (options.$paging) {
                options.$paging.find(".btn-page-next").on("click", function() {
                    var max_page    = parseInt($(options.$paging).find(".max-page").html());
                    if (current_page < max_page) {
                        go_page(current_page+1);
                    }
                });
                //options.$paging.find(".btn-page-last").on("click", function() { });
                //options.$paging.find(".btn-page-first").on("click", function() { });
                options.$paging.find(".btn-page-prev").on("click", function() {
                    if (current_page > 1) {
                        go_page(current_page-1);
                    }
                });

                options.$paging.find(".btn-page-search").on("click", function() {
                    var input_page  = parseInt($(options.$paging).find(".current-page").val());
                    var max_page    = parseInt($(options.$paging).find(".max-page").html());

                    if (!isNaN(input_page) && input_page > 0 && input_page <= max_page) {
                        go_page(input_page);
                    }
                });

                $($(options.$paging).find(".current-page")).on('keyup', function(e) {
                    if (e.which == 13) {
                        options.$paging.find(".btn-page-search").click();
                    }
                });
            }

            if (options.autoTrigger && (options.autoTriggerUntil === false || options.autoTriggerUntil > 0)) {

                observe();

//                    $e.unbind('.jscroll').bind('scroll.jscroll', function() {
//                        return observe();
//                    });

                if (options.autoTriggerUntil > 0) {
                    options.autoTriggerUntil--;
                }

            } else {
                $e.unbind('.jscroll');
                observe_next();
            }
        };

        var destroy = function() {

            //alert("destroy");

            $e.unbind('.jscroll').off('scroll.jscroll')
                .removeData('jscroll')
                .find('.jscroll-inner').children().unwrap();

            return $e;
        };


        // Инициализация

        if ($next.length) {
            $e.data('jscroll', $.extend({}, data, {initialized: true, waiting: false, nextHref: nextHref}));

            wrap_inner_content();
            set_bindings();

        } else {
            destroy();
        }

        $.extend($e.jscroll, {
            destroy: destroy,
            check_next: check_next,
            load: load,
            go_page: go_page,
            reload: reload,
            get_page: get_page
        });

        return $e;
    };

    $.fn.jscroll = function(m) {
        return this.each(function() {

            var $this = $(this),
                data = $this.data('jscroll');

            if (data && data.initialized) return;

            var jscroll = new jScroll($this, m);
        });
    };
})(jQuery);