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

(function($) {
    "use strict"; 
	
    /* Navbar Scripts */
    // jQuery to collapse the navbar on scroll
    $(window).on("scroll", function () {
		if ($(".navbar").offset().top > 100) {
			$(".fixed-top").addClass("top-nav-collapse").addClass("shadow-lg");
		} else {
			$(".fixed-top").removeClass("top-nav-collapse").removeClass("shadow-lg");
		}
    });

    // close menu on click in small viewport
    $('[data-toggle="offcanvas"]').on('click', function() {
        $('.offcanvas-collapse').toggleClass('open')
    })

})(jQuery);