(function ($) {
    "use strict";
    
    /*-----------------
        Menu Stick
    -----------------*/
    var header = $('.sticky-bar');
    var win = $(window);
    win.on('scroll', function () {
        var scroll = win.scrollTop();
        if (scroll < 40) {
            header.removeClass('stick');
        } else {
            header.addClass('stick');
        }
    });
})(jQuery);