var decode_entities = (function() {
    // Remove HTML Entities
    var element = document.createElement('div');

    function decode_HTML_entities (str) {

        if(str && typeof str === 'string') {

            // Escape HTML before decoding for HTML Entities
            str = escape(str).replace(/%26/g,'&').replace(/%23/g,'#').replace(/%3B/g,';');

            element.innerHTML = str;
            if(element.innerText){
                str = element.innerText;
                element.innerText = '';
            }else{
                // Firefox support
                str = element.textContent;
                element.textContent = '';
            }
        }
        return unescape(str);
    }
    return decode_HTML_entities;
})();

(function($, window, document){
    'use strict';

    if( !screenfull ) return;

    var Selector = '[data-toggle="fullscreen"]';

    $(document).on('click', Selector, function (e) {
        e.preventDefault();

        if (screenfull.enabled) {
            screenfull.toggle();

            if(screenfull.isFullscreen) {
                $(this).children('em').removeClass('fa-expand').addClass('fa-compress');
            } else {
                $(this).children('em').removeClass('fa-compress').addClass('fa-expand');
            }

        } else {
            /*Ignore or do something else*/
        }

    });

}(jQuery, window, document));

function human_filesize(bytes, si) {
    var thresh = si ? 1000 : 1024;
    if(bytes < thresh) return bytes + ' B';
    var units = si ? ['kB','MB','GB','TB','PB','EB','ZB','YB'] : ['KiB','MiB','GiB','TiB','PiB','EiB','ZiB','YiB'];
    var u = -1;
    do {
        bytes /= thresh;
        ++u;
    } while(bytes >= thresh);
    return bytes.toFixed(1)+' '+units[u];
}

function word_declension(number, morph) {
    var i = 0;
    if(number >= 100) number%=100;
    if(number >= 20)  number%=10;

    if (number == 1) i = 0;
    else if (number == 2 || number == 3 || number == 4) i = 1;
    else i = 2;

    return morph[i];
}
