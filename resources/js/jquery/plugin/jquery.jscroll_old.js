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
            //pagingSelector: '',
            callback: false
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
            var $table = $e.find('table:not(.page-heading-table) tbody');

            if (wrap) {
                $table.append("<tr class='warning'><td colspan='10' class='text-center'>Страница "+(++current_page)+"</td></tr>");

                $e.trigger('jscroll_before_append', {context: wrap});
                $(wrap).find('tbody tr').appendTo($table);
                $e.trigger('jscroll-after-append', {context: $table});

                $e.find('table.footable tbody').trigger('footable_redraw');

                $e.scrollTo($e.find('table tr.warning').last().prev(), 500, {onAfter: function() { waiting = false; }});
            }

            if ($new_next.length) {
                $next.replaceWith($new_next);
                $next   = $inner_container.find(options.nextSelector);
                $next.parent().removeClass("disabled");
            } else {
                $e.append('<div class="space"></div><div class="text-center text-muted">Конец списка</div>');
                $next.closest("ul").remove();
                $next = null;
            }

        };

        var check_next = function() {

            if ($next && $next.attr("href")) {
                nextHref = $next.attr("href");
                return true;
            } else {
                destroy();
                return false;
            }
        };

        var load = function() {
            $next.html('<i class="fa fa-spinner fa-spin"></i> Загружаю...').parent().addClass('disabled');
            waiting = true;

            $.ajax({
                url: nextHref,
                dataType: 'json',
                success: function(response) {
                    append_wrap(response.data);
                    check_next();
                }
            });
        };

        var observe = function() {
            var $inner_container = $e.find('.jscroll-inner');

            $e.on('scroll.jscroll', function() { // clamped у таблицы!

                //console.log($e.scrollTop(),$inner_container.height()-$e.height()-30);

                if(!waiting && $e.scrollTop() >= $inner_container.height()-$e.height()-30) {
                    load();
                }
            });

            $next.on("click.jscroll", function() {
                if(!waiting) {
                    load();
                }
                return false;
            });
        };

        var set_bindings = function () {
            var $next = $e.find(options.nextSelector).first();

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
                $next.bind('click.jscroll', function() {
                    load();
                    return false;
                });
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
            destroy: destroy
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