jQuery(function ($) {
    "use strict";
    //  Style Switcher
    (function ($) {
        "use strict";
        $(document).ready(function () {
            $('.style-switch-button').click(function () {
                $('.style-switch-wrapper').toggleClass('active');
            });
            $('a.close-styler').click(function () {
                $('.style-switch-wrapper').removeClass('active');
            });
        });
    })(jQuery);

    //  Fixed header
    $(window).on('scroll', function () {
        if ($(window).scrollTop() > 100) {
            $('.header').addClass('header-solid animated fadeInDown');
        } else {
            $('.header').removeClass('header-solid animated fadeInDown');
        }
    });
    $(window).on('scroll', function () {
        if ($(window).scrollTop() > 200) {
            $('.header2').addClass('header-bgnone animated fadeInDown');
        } else {
            $('.header2').removeClass('header-bgnone animated fadeInDown');
        }
    });

    //  Main slideshow
    /* Home 2 */
    $('.flexSlideshow').flexslider({
        slideshowSpeed: 5000,
        animationSpeed: 600,
    });
    /* Home 3 and 4 */
    $('#main-slide').carousel({
        pause: true,
        interval: 7000,
    });

    //Testimonial
    $("#testimonial-carousel").owlCarousel({
        navigation: false, // Show next and prev buttons
        slideSpeed: 600,
        pagination: true,
        singleItem: true
    });

    // Custom Navigation Events
    var owl = $("#testimonial-carousel");
    $(".next").click(function () {
        owl.trigger('owl.next');
    })
    $(".prev").click(function () {
        owl.trigger('owl.prev');
    })
    $(".play").click(function () {
        owl.trigger('owl.play', 1000); //owl.play event accept autoPlay speed as second parameter
    })
    $(".stop").click(function () {
        owl.trigger('owl.stop');
    })

    //Clients
    $("#client-carousel").owlCarousel({
        navigation: false, // Show next and prev buttons
        slideSpeed: 400,
        pagination: false,
        items: 5,
        rewindNav: true,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 3],
        stopOnHover: true,
        autoPlay: true
    });

    //App gallery
    $("#app-gallery-carousel").owlCarousel({
        navigation: false, // Show next and prev buttons
        slideSpeed: 400,
        pagination: true,
        items: 4,
        rewindNav: true,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 3],
        stopOnHover: true
    });

    // Flex slider
    //Second item slider
    $(window).load(function () {
        $('.flexSlideshow').flexslider({
            animation: "fade",
            controlNav: false,
            directionNav: true,
            slideshowSpeed: 8000
        });
    });
    //Portfolio item slider
    $(window).load(function () {
        $('.flexportfolio').flexslider({
            animation: "fade",
            controlNav: false,
            directionNav: true,
            slideshowSpeed: 8000
        });
    });

     //  Animation
    //Wow
    new WOW().init();

    //  Back to top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
    // scroll body to 0px on click
    $('#back-to-top').click(function () {
        $('#back-to-top').tooltip('hide');
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
    $('#back-to-top').tooltip('hide');
});