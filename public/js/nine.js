$(document).ready(function () {
    'use strict';

    $(window).on('scroll', function () {
        var menu_area = $('.nav-area');
        if ($(window).scrollTop() > 240) {
            menu_area.addClass('sticky_navigation');
            menu_area.addClass('z-depth-1');
        } else {
            menu_area.removeClass('sticky_navigation');
            menu_area.removeClass('z-depth-1');
        }
    });

    //********* typed js

    var element = $(".text-affect");

    $(function(){
        element.typed({
            strings: ["Product Owner", "Développeur back PHP", "Auvergne &amp; Randos"],
            loop: true,
            typeSpeed: 120
        });
    });
});