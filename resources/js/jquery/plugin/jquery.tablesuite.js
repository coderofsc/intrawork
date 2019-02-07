(function($) {

    $.jtablesuite = {
        defaults: {
            source      : false,
            id_tpl      : '%DATA%',
            wrap        : false,
            container   : 'table',
            items       : 'tbody tr',
            muted       : false,

            callback_add    : false,
            callback_delete : false
        }
    };

    // Constructor
    var jTablesuite = function($e, options) {

        var _data = $e.data('jtablesuite');
        $e.data('jtablesuite', $.extend({}, _data, {initialized: true}));

        var _options = $.extend({}, $.jtablesuite.defaults, options || {});

        $e.addClass("table-suite");

        $e.find('> thead button.btn-add').on("click", function () {
            var $original = $(this).closest("tr");

            // Клонируем форму атрибута
            var $cloned = $original.clone().removeProp("id");

            //$cloned.find("select").selectpicker('refresh');

            // Копируем все select
            var $original_selects = $original.find('select');
            $cloned.find('select').each(function(index, item) {

                $(item).parent().find(".bootstrap-select").remove();
                $(item).val($original_selects.eq(index).val()).show();

                $(item).selectpicker();
            });

            // Копируем все textarea
            var $original_textareas = $original.find('textarea');
            $cloned.find('textarea').each(function(index, item) {
                $(item).val($original_textareas.eq(index).val());
            });

            // Добавляем в тело тадблицы клона
            $cloned.appendTo($e.find("> tbody"));

            // Меняем кнопку на удаление и вешаем обработчк
            $cloned.find("button.btn-add").on("click", function() {
                $(this).closest('tr').remove();

                if (_options.callback_delete !== false) {
                    _options.callback_delete();
                }

            }).toggleClass("btn-add btn-delete btn-default btn-danger").find("i.fa").toggleClass("fa-plus fa-times");

            // Очищаем форму
            $original.find("input.form-control").val('');
            $original.find("select.form-control").prop('selectedIndex', 0).selectpicker('refresh');

            if (_options.callback_add !== false) {
                _options.callback_add($cloned);
            }

            return false;
        });

        return $e;
    };

    $.fn.jtablesuite = function(options) {

        return this.each(function() {
            var $this = $(this), data = $this.data('jtablesuite');

            if (data && data.initialized) {
                return;
            }

            var jtablesuite = new jTablesuite($this, options);

        });
    };
})(jQuery);