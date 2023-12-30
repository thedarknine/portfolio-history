import './bootstrap.js';
import { Tooltip } from 'flowbite';

/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
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

/*
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

*/
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
    });

    const timeLine = gsap.timeline({
        defaults: {duration: 2},
        onStart: function() {
            $('nav').removeClass('hidden');
        }
    })
    timeLine.fromTo('nav', {y:-100, opacity:0}, {y:0, opacity:1});

    gsap.registerPlugin(ScrollTrigger);

    const toAnimate = document.querySelectorAll('.nine-animate');
    toAnimate.forEach(element => {
            gsap.fromTo(element.children, {y: '+=100', opacity: 0}, {y: 0, opacity: 1, stagger: 0.2, duration: 1, ease: 'easeInOut', scrollTrigger: {
            trigger: element,
            start: 'top 40%',
        }});  
    }); 
    
    const fadeElements = document.querySelectorAll(".fade-in");
    fadeElements.forEach((element) => {
        let classesArray = Array.from(element.classList);
        let matchingClass = classesArray.find(className => className.startsWith("fade-in-delay-"));
        let delayValue = 0;
        if (matchingClass) {
            delayValue = matchingClass.slice("fade-in-delay-".length);
        }
        gsap.set(element, { opacity: 0, y: 100, duration: 1, }); // Set initial opacity to 0
        gsap.to(element, {
            opacity: 1,
            y: 0,
            duration: 1,
            delay: delayValue,
            scrollTrigger: {
                trigger: element,
                start: "top 90%",
                end: "bottom 80%",
                toggleActions: "play none none reverse",
            },
        });
    });
    const slideRightElements = document.querySelectorAll(".slide-in-right");
    slideRightElements.forEach((element) => {
        let classesArray = Array.from(element.classList);
        let matchingClass = classesArray.find(className => className.startsWith("slide-in-right-delay-"));
        let delayValue = 0;
        if (matchingClass) {
            delayValue = matchingClass.slice("slide-in-right-delay-".length);
        }
        gsap.set(element, { opacity: 0, x: 100, duration: 1, }); // Set initial opacity to 0
        gsap.to(element, {
            opacity: 1,
            x: 0,
            duration: 1,
            delay: delayValue,
            scrollTrigger: {
                trigger: element,
                start: "top 90%",
                end: "bottom 80%",
                toggleActions: "play none none reverse",
            },
        });
    });
    const slideLeftElements = document.querySelectorAll(".slide-in-left");
    slideLeftElements.forEach((element) => {
        let classesArray = Array.from(element.classList);
        let matchingClass = classesArray.find(className => className.startsWith("slide-in-left-delay-"));
        let delayValue = 0;
        if (matchingClass) {
            delayValue = matchingClass.slice("slide-in-left-delay-".length);
        }
        gsap.set(element, { opacity: 0, x: -100, duration: 1, }); // Set initial opacity to 0
        gsap.to(element, {
            opacity: 1,
            x: 0,
            duration: 1,
            delay: delayValue,
            scrollTrigger: {
                trigger: element,
                start: "top 90%",
                end: "bottom 80%",
                toggleActions: "play none none reverse",
            },
        });
    });
      

    /*gsap.to("#about img", {
        scrollTrigger: "#about img", // start the animation when ".box" enters the viewport (once)
        x: 500,
      });*/
    
    /*timeLine.to('#about img', {
        scrollTrigger: {
            trigger: '#about img',
            toggleClass: {targets: $('nav#main'), className: 'nine-navbar'},
            toogleActions: function() {$('nav#main').removeClass('home-navbar')}
            }
    });*/

    function percentageToDegrees(percentage) {
        return percentage / 100 * 360
    }
});



