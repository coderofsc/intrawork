<?php
/**
 * Groups configuration for default Minify implementation
 * @package Minify
 */

/** 
 * You may wish to use the Minify URI Builder app to suggest
 * changes. http://yourdomain/min/builder/
 *
 * See http://code.google.com/p/minify/wiki/CustomSource for other ideas
 **/


return array(

    "tourcss"=>array(
        "//resources/bootstrap/tour/css/bootstrap-tour.min.css",
    ),
    "tourjs"=>array(
        "//resources/bootstrap/tour/js/bootstrap-tour.min.js",
        "//resources/js/intrawork.tour.js",
    ),

    // Шапка CSS общие
    "headcss"=>array(
        "//resources/bootstrap/core/css/bootstrap.min.css",
        "//resources/bootstrap/core/css/bootstrap.grid.css",
        "//resources/bootstrap/font-awesome/css/font-awesome.min.css",
        "//resources/css/layout-default.css",
        "//resources/css/sidebar.css",
        //"//resources/css/animate.css",
        "//resources/js/jquery/plugin/jcatcher/css/jquery.jcatcher.css",
        "//resources/css/intrawork.css"
    ),

    // Шапка JS общие
    "headjs"=>array(
        "//resources/js/jquery/jquery-1.11.2.min.js",
        "//resources/js/jquery/jquery.cookie.js",
        "//resources/js/native/visibility.min.js",
        "//resources/js/native/tinycon.min.js",
        "//resources/js/jquery/jquery-ui-latest.min.js",
        "//resources/js/jquery/jquery.layout-latest.min.js",
        "//resources/js/jquery/jquery.mousewheel-3.0.6.pack.js",
        "//resources/js/jquery/plugin/jcatcher/js/jquery.jcatcher.js",
        "//resources/bootstrap/jasny-bootstrap/js/jasny-bootstrap.min.js",
        "//resources/js/jquery/plugin/moment.min.js",
        "//resources/js/native/yepnope.1.5.4-min.js",
    ),


    // Футер JS общие
    "footjs"=>array(
        "//resources/bootstrap/core/js/bootstrap.min.js",
        "//resources/bootstrap/summernote/js/summernote.min.js",
        "//resources/bootstrap/summernote/js/lang/summernote-ru-RU.js",
        "//resources/bootstrap/toggle/js/bootstrap-toggle.min.js",

        "//resources/bootstrap/typeahead/typeahead.bundle.min.js",
        //"//resources/bootstrap/summernote/js/plugin/summernote-ext-video.js",
        "//resources/bootstrap/tabdrop/js/bootstrap-tabdrop.js",
        //"//resources/bootstrap/dropdowns_enhancement/js/dropdowns-enhancement.js",



        "//resources/bootstrap/selectpicker/js/bootstrap-select.min.js",
        //"//resources/bootstrap/selectpicker/js/defaults-ru-ru.js",
        /*"//resources/bootstrap/selectpicker/js/defaults-en-us.js",*/
        "//resources/js/jquery/plugin/icheck/js/icheck.min.js",
        "//resources/bootstrap/colorpicker/js/bootstrap-colorpicker.min.js",
        "//resources/bootstrap/datetimepicker/js/bootstrap-datetimepicker.min.js",
        "//resources/js/jquery/plugin/jquery.jscroll.js",
        "//resources/js/jquery/plugin/jquery.stickytableheaders.min.js",
        "//resources/js/native/screenfull.min.js",
        "//resources/js/jquery/plugin/toaster/js/toastr.min.js",
        "//resources/js/jquery/plugin/charts/jquery.peity.min.js",
        "//resources/js/jquery/plugin/m_p/jquery.m_p_observer.js",
        "//resources/js/jquery/plugin/footable/js/footable.min.js",
        "//resources/js/jquery/plugin/jquery.scrollto.min.js",
        //"//resources/js/jquery/plugin/poshytip/jquery.poshytip.js",
        "//resources/js/jquery/plugin/validate/jquery.validate.min.js",
        "//resources/js/jquery/plugin/validate/localization/messages_ru.js",
        "//resources/js/jquery/plugin/jquery.validform.js",
        //"//resources/js/jquery/plugin/jquery.navmore.js",
       // "//resources/js/jquery/plugin/nanoscroller/jquery.nanoscroller.min.js",
        "//resources/bootstrap/bootbox/js/bootbox.min.js",
        "//resources/bootstrap/touchspin/js/jquery.bootstrap-touchspin.min.js",
        "//resources/js/jquery/plugin/ion.range/js/ion.rangeSlider.min.js",
        "//resources/js/intrawork.common.js",
        "//resources/js/intrawork.core.js",
        "//resources/js/intrawork.sidebar.js"
    ),

    // Футер CSS общие
    "footcss"=>array(
        "//resources/bootstrap/summernote/css/summernote.css",
        "//resources/bootstrap/selectpicker/css/bootstrap-select.min.css",
        "//resources/bootstrap/typeahead/typeahead.css",
        "//resources/bootstrap/tabdrop/css/tabdrop.css",
        //"//resources/bootstrap/dropdowns_enhancement/css/dropdowns-enhancement.min.css",
        "//resources/bootstrap/toggle/css/bootstrap-toggle.min.css",
        "//resources/js/jquery/plugin/icheck/css/square/blue.css",
        "//resources/js/jquery/plugin/icheck/css/square/red.css",
        "//resources/bootstrap/colorpicker/css/bootstrap-colorpicker.min.css",
        "//resources/bootstrap/datetimepicker/css/bootstrap-datetimepicker.min.css",
        "//resources/js/jquery/plugin/toaster/css/toastr.css",
        "//resources/js/jquery/plugin/footable/css/footable.core.css",
        //"//resources/js/jquery/plugin/poshytip/tip-green/tip-green.css",
        "//resources/bootstrap/touchspin/css/jquery.bootstrap-touchspin.min.css",
        "//resources/js/jquery/plugin/ion.range/css/ion.rangeSlider.css",
        "//resources/js/jquery/plugin/ion.range/css/ion.rangeSlider.skinModern.css",

        //"//resources/js/jquery/plugin/nanoscroller/nanoscroller.css",
        //"//resources/js/jquery/plugin/poshytip/tip-twitter/tip-twitter.css",
    ),

    "treetablecss"=>array(
        "//resources/js/jquery/plugin/treetable/css/jquery.treetable.theme.bootstrap.css"
    ),

    "treetablejs"=>array(
        "//resources/js/jquery/plugin/treetable/js/jquery.treetable.js"
    ),

    "fileuploadjs"=>array(
        "//resources/js/jquery/plugin/fileupload/js/vendor/jquery.ui.widget.js",
        "//resources/js/jquery/plugin/fileupload/js/jquery.iframe-transport.js",
        "//resources/js/jquery/plugin/fileupload/js/jquery.fileupload.js",
    ),

    "fileuploadcss"=>array(
        "//resources/js/jquery/plugin/fileupload/css/jquery.fileupload.css"
    ),

    "fancyboxcss"=>array(
        "//resources/js/jquery/plugin/fancybox/css/jquery.fancybox.css",
        "//resources/js/jquery/plugin/fancybox/js/helpers/jquery.fancybox-buttons.css",
    ),
    "fancyboxjs"=>array(
        "//resources/js/jquery/plugin/fancybox/js/jquery.fancybox.pack.js",
        "//resources/js/jquery/plugin/fancybox/js/helpers/jquery.fancybox-buttons.js",
        "//resources/js/jquery/plugin/fancybox/js/helpers/jquery.fancybox-media.js",
    ),

    "fullcalendarcss"=>array(
        "//resources/js/jquery/plugin/fullcalendar/css/fullcalendar.min.css",
    ),

    "fullcalendarjs"=>array(
        "//resources/js/jquery/plugin/fullcalendar/js/fullcalendar.min.js"
    ),

    "highchartsjs"=>array(
        "//resources/js/jquery/plugin/highcharts/highcharts.js"
    )
);