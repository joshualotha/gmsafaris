(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner(0);
    
    
    // Initiate the wowjs
    new WOW().init();
    
    
   // Back to top button
   $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
        $('.back-to-top').fadeIn('slow');
    } else {
        $('.back-to-top').fadeOut('slow');
    }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });

    // Hero Carousel
    $(document).ready(function() {
        try {
            $(".hero-carousel").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 7000,
                autoplayHoverPause: true,
                dots: true,
                nav: true,
                navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                smartSpeed: 1000,
                onInitialized: function() {
                    console.log('Hero carousel initialized');
                },
                onTranslated: function() {
                    console.log('Hero carousel translated');
                },
                onChanged: function() {
                    console.log('Hero carousel changed');
                },
                onResize: function() {
                    console.log('Hero carousel resized');
                },
                rewind: true,
                mouseDrag: true,
                touchDrag: true,
                pullDrag: true,
                freeDrag: false,
                margin: 0,
                stagePadding: 0,
                merge: false,
                mergeFit: true,
                autoWidth: false,
                startPosition: 0,
                rtl: false,
                slideBy: 1,
                fallbackEasing: 'swing',
                info: function() {
                    console.log('Hero carousel info');
                },
                nestedItemSelector: false,
                itemElement: 'div',
                stageElement: 'div',
                refreshClass: 'owl-refresh',
                loadedClass: 'owl-loaded',
                loadingClass: 'owl-loading',
                rtlClass: 'owl-rtl',
                responsiveClass: 'owl-responsive',
                dragClass: 'owl-drag',
                itemClass: 'owl-item',
                stageClass: 'owl-stage',
                stageOuterClass: 'owl-stage-outer',
                grabClass: 'owl-grab'
            });
        } catch (error) {
            console.error('Error initializing hero carousel:', error);
        }
    });

    // Modal Video
    $(document).ready(function () {
        var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Testimonial carousel
    $(".testimonial-carousel-1").owlCarousel({
        loop: true,
        dots: false,
        margin: 25,
        autoplay: true,
        slideTransition: 'linear',
        autoplayTimeout: 0,
        autoplaySpeed: 10000,
        autoplayHoverPause: false,
        responsive: {
            0:{
                items:1
            },
            575:{
                items:1
            },
            767:{
                items:2
            },
            991:{
                items:3
            }
        }
    });

    $(".testimonial-carousel-2").owlCarousel({
        loop: true,
        dots: false,
        rtl: true,
        margin: 25,
        autoplay: true,
        slideTransition: 'linear',
        autoplayTimeout: 0,
        autoplaySpeed: 10000,
        autoplayHoverPause: false,
        responsive: {
            0:{
                items:1
            },
            575:{
                items:1
            },
            767:{
                items:2
            },
            991:{
                items:3
            }
        }
    });

})(jQuery);

