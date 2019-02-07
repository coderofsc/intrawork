$(document).ready(function () {
    function get_background(callback) {
        $.ajax({
            type: 'GET',
            url: 'http://intrawork.ru/get_login_bkgd/',
            dataType: 'json',
            data: {

            }, success: function (data) {
                if ($.isFunction(callback)) callback(data);
            }, error: function () {
                if ($.isFunction(callback)) callback(false);
            }});
    }

    function preload_img(url, callback) {
        var pImg = new Image();
        pImg.onload = function () {
            if ($.isFunction(callback)) callback(true);
        };
        pImg.src = url;
    }

    $("body").prepend('<div id="content-overlay"></div>');

    get_background(function(result) {
        if (result !== false) {
            preload_img(result.background_image, function() {
                $("body").css({"background-image":"url(" + result.background_image + ")"}).addClass("show");
                $("#content-overlay").fadeTo(500, .5, function() {
                });
            });
        }
    });
});
