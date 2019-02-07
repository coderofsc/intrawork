jQuery.validator.setDefaults({
    //ignore: ':not(select:hidden, input:visible, textarea)',
    ignore: ':not(.tab-pane:hidden input, select:hidden, input:visible, textarea),.not-valid',

    submitHandler: function(form) { $(form).removeClass("invalid-form"); form.submit(); },

    errorPlacement: function (error, element) {

        if ($(element).is('select.selectpicker')) {
            element = element.next();
        }

        // Если текстовая область элемент summernote
        if (element.is("textarea:hidden") && $(element).next().is(".note-editor")) {
            element = $(element).next();
        }

        // Если элемент находится в input-group
        if ($(element).parent().hasClass("input-group")) {
            element = element.parent();
        }

        var message = error.html();

        //if (element.is(":visible")) {

        if (message) {

            // Если встречаем вкладку (tab) переключаемся на нее
            if (element.closest(".tab-pane:hidden").length) {
                var tab_id = element.closest(".tab-pane:hidden").attr("id");
                $('.nav-tabs a[href="#'+tab_id+'"]').tab('show');
            }

            if (!element.data("bs.tooltip")) {
                element.tooltip({trigger: 'manual', title: message, container: element.closest(".form-group"), placement: ((element.data('tooltip-placement'))?element.data('tooltip-placement'):'auto right')});
                element.tooltip("show");
            } else {
                element.attr('title', message).tooltip('fixTitle');
                $('#'+(element.attr('aria-describedby'))).find(".tooltip-inner").html(message);
            }

            $(element).closest(".form-group").addClass("has-error");
        } else {
            $(element).tooltip('destroy').closest(".form-group").removeClass("has-error");
        }


        //}
    },

    success: function (label) {
        label.closest(".form-group").removeClass("has-error").addClass("has-success");
    },

    highlight: function (element, errorClass) {
        $(element).closest(".form-group").addClass("has-error");
    },

    errorElement: 'div',
    errorClass: 'help-inline'
});


function init_validator() {

    $.validator.addMethod("alphanumeric", function (value, element) { return this.optional(element) || /^[a-z0-9\-_.]+$/i.test(value); }, "Допускаются только латинские буквы, цифры, точка, знак подчёркивания (_) и дефис (-)");
    $.validator.addMethod("sn_od", function (value, element) { return this.optional(element) || /^http[s]*:\/\/[www.]*(odnoklassniki|ok)+\.ru\/.*$/i.test(value); }, "Допускаются только ссылки с сайта http://odnoklassniki.ru или http://ok.ru");
    $.validator.addMethod("sn_vk", function (value, element) { return this.optional(element) || /^http[s]*:\/\/[www.]*vk\.com\/.*$/i.test(value); }, "Допускаются только ссылки с сайта http://vk.com");
    $.validator.addMethod("sn_fb", function (value, element) { return this.optional(element) || /^http[s]*:\/\/[www.]*facebook\.com\/.*$/i.test(value); }, "Допускаются только ссылки с сайта http://facebook.com");
    $.validator.addMethod("sn_ig", function (value, element) { return this.optional(element) || /^http[s]*:\/\/[www.]*instagram\.com\/.*$/i.test(value); }, "Допускаются только ссылки с сайта http://instagram.com");
    $.validator.addMethod("phone", function (value, element) { return this.optional(element) || /^\(?\([\d]{3}\) [\d]{3}-[\d]{2}-[\d]{2}$/i.test(value); }, "Неверный формат телефона. Например: (123) 456-78-90");


    $("form.form-valid:not([novalidate]):visible").each(function() {

        var validator =  $(this).bind("invalid-form.validate", function() {
            //alert(validator.numberOfInvalids());
            $(this).find(".form-actions button[name=save]").button("reset");
            $(this).addClass("invalid-form");
            CoreIW.beforeunload(); // Заного установить, так как снимается при сабмите
        }).validate();

        /*for ( var i = 0, elements = (validator.currentElements = validator.elements()); elements[i]; i++ ) {

            if ($(elements[i]).hasClass("selectpicker")) {
                elements[i] = $(elements[i]).next();
            }

        }*/
    });
}

$(function() {
    $('input[data-rule-required], select[data-rule-required], textarea[data-rule-required][data-summernote!=true]').each(function () {
        if (!$(this).parent().hasClass("input-group")) {
            $(this).wrap("<div class='input-group'>");
        }
        $(this).parent().prepend("<span class='input-group-addon required-addon'><i class='fa fa-fw fa-asterisk required-asterisk'></i></span>")
    });

    CoreIW.animation_end(function() {
        init_validator();
    });
});




