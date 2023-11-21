import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/_helpers.css';
import './styles/_main.scss';

(function ($) {
    "use strict";

    const nav = $('nav');
    let navHeight = nav.outerHeight();

    $('.navbar-toggler').on('click', function () {
        const mainNav = $('#mainNav');
        if (!mainNav.hasClass('navbar-reduce')) {
            mainNav.addClass('navbar-reduce');
        }
    });

    $("#full-menu-1").on("click", function () {
        $(this).toggleClass("active");
        $(".nav-holder").toggleClass("active");
        $("body").toggleClass("overflow-hidden");
    })
    $(".nav-holder.main,.fullnav-close").on("click", function () {
        $("#full-menu-1.active").removeClass("active");
        $(".nav-holder").removeClass("active");
        $("body").removeClass("overflow-hidden");
    })
    $(".nav-holder.alt").on("click", function (e) {
        if(!$(e.target).hasClass('link')){
            $("#full-menu-1.active").removeClass("active");
            $(".nav-holder").removeClass("active");
            $("body").removeClass("overflow-hidden");
        }
    });

    // START PRELOADED
    $(window).on('load', function () {
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });

    // Navbar Menu Reduce
    $(window).trigger('scroll');
    $(window).on('scroll', function () {
        let pixels = 100;
        let top = 1200;
        const homeNavbar = $('#home > .navbar-expand-md')
        if ($(window).scrollTop() > pixels) {
            homeNavbar.addClass('navbar-reduce');
            homeNavbar.removeClass('navbar-trans');
        } else {
            homeNavbar.addClass('navbar-trans');
            homeNavbar.removeClass('navbar-reduce');
        }
        if ($(window).scrollTop() > top) {
            $('.scrolltop-mf').fadeIn(1000, "easeInOutExpo");
        } else {
            $('.scrolltop-mf').fadeOut(1000, "easeInOutExpo");
        }
    });

    // Back to top button
    $(window).on("scroll", function () {
        if ($(window).scrollTop() > 50) {
            $('.back-to-top').addClass('open');
        } else {
            $('.back-to-top').removeClass('open');
        }
    });

    if ($('.back-to-top').length) {
        $(".back-to-top").on('click', function () {
            let target = $(this).attr('data-targets');
            // animate
            $('html, body').animate({
                scrollTop: $(target).offset().top
            }, 800);

        });
    }

    //  Star ScrollTop
    $('.scrolltop-mf').on("click", function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
    });

    //  Star Scrolling nav
    $('a.js-scroll[href*="#"]:not([href="#"])').on("click", function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            let target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: (target.offset().top - navHeight + 30)
                }, 1000, "easeInOutExpo");
                return false;
            }
        }
    });

    $('.select-single').on('click', function () {
        let target = $(this).attr('data-target');
        const selectSingle = $('.select-single')
        if (selectSingle.hasClass('active')) {
            selectSingle.removeClass('active');
        }
        $('.choose-content').children().removeClass('active').removeClass('show').addClass('inactive');
        $(this).addClass('active');
        $('#'+target).removeClass('inactive').addClass('show');
    });

    $('#v-pills-tab a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
    })

    let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl, {
            customClass: 'nine-tooltip'
        })
    })
})(jQuery);

$(document).ready(function(){
    $(".progress").each(function() {
        let value = $(this).attr('data-value');
        let left = $(this).find('.progress-left .progress-bar');
        let right = $(this).find('.progress-right .progress-bar');

        if (value > 0) {
            if (value <= 50) {
                right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
            } else {
                right.css('transform', 'rotate(180deg)')
                left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
            }
        }
    })

    function percentageToDegrees(percentage) {
        return percentage / 100 * 360
    }
});