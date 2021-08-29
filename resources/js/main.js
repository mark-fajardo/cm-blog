jQuery(document).on('ready', function ($) {
    "use strict";

    /*--------------------------------
        DROPDOWN MOBILE MENU
    ----------------------------------*/
    function doneResizing() {
        if (Modernizr.mq('screen and (max-width:991px)')) {
            $('.at-drop-down').on('click', function (e) {
                e.preventDefault();
                $(this).next($('.sub-menu')).slideToggle();
            });
        }
    }
    var id;
    $(window).resize(function () {
        clearTimeout(id);
        id = setTimeout(doneResizing, 0);
    });
    doneResizing();


    /*---------------------------
        SMOOTH SCROLL
    -----------------------------*/
    $('a.scrolltotop, .slider-area h3 a, .navbar-header a, ul#nav a').on('click', function (event) {
        var id = $(this).attr("href");
        var offset = 40;
        var target = $(id).offset().top - offset;
        $('html, body').animate({
            scrollTop: target
        }, 1500, "easeInOutExpo");
        event.preventDefault();
    });


    /*----------------------------
        SCROLL TO TOP
    ------------------------------*/
    $(window).on("scroll",function () {
        var totalHeight = $(window).scrollTop();
        if (totalHeight > 300) {
            $(".scrolltotop").fadeIn();
        } else {
            $(".scrolltotop").fadeOut();
        }
    });

    /*--------------------------
        ACTIVE WOW JS
    ----------------------------*/
    new WOW().init();


    /*----------------------------
        INSTAGRAM FEED ACTIVE
    -----------------------------*/
    // jQuery.fn.spectragram.accessData = {
    //     accessToken: 'IGQVJYLV9HOUhxUXdiUXV1bXRVVWdJb0ZAuWXU4ek9HYnB5RG50ZADA2UTd1VjlyZAk52amE4TDJyVnRXVmZABZA2lJaGdGcHVBcGxyWFloN0o2aW9nSGZA5M0NVSlRyY3ZA2XzU5Ni1Ja3loR1dOV1NQR2ttMgZDZD',
    //     clientID: '298091052068601'
    // }
    //
    // $('.instagram-feed').spectragram('getUserFeed', {
    //     query: 'chef_morrisdanzen',
    //     size: 'big',
    //     max: 5
    // });
    // $('.blog-instagram-feed-widget').spectragram('getUserFeed', {
    //     query: 'chef_morrisdanzen',
    //     size: 'small',
    //     max: 6
    // });
    // /*----------------------------
    //     INSTAGRAM FEED ACTIVE
    // -----------------------------*/
    // jQuery.fn.spectragram.accessData = {
    //     accessToken: process.env.MIX_INSTAGRAM_ACCESS_TOKEN,
    //     clientID: process.env.MIX_INSTAGRAM_CLIENT_ID
    // }
    //
    // $('.instagram-feed').spectragram('getUserFeed', {
    //     query: process.env.MIX_INSTAGRAM_USERNAME,
    //     size: 'big',
    //     max: 5
    // });
    // $('.blog-instagram-feed-widget').spectragram('getUserFeed', {
    //     query: process.env.MIX_INSTAGRAM_USERNAME,
    //     size: 'small',
    //     max: 6
    // });

}(jQuery));

export const jQueryMixin = {
    method: {
        async init() {
            Promise.all([
                this.loadScrollSpy(),
                await this.loadSlider(),
                this.loadSticky(),
                this.loadClockPicker(),
                this.loadOwlCarousel(),
                this.loadSearch()
            ]).then(() => {
                this.removeLoader();
            });
        },
        loadScrollSpy() {
            $('body').scrollspy({
                target: '.bs-example-js-navbar-scrollspy',
                offset: 50
            });
        },
        loadSticky() {
            $("#mainmenu-area").sticky({
                topSpacing: 0
            });
        },
        loadClockPicker() {
            /*------------------------------
                TIME PICKER ACTIVE
            -------------------------------*/
            var input = $('#time,#reservation_time').clockpicker({
                placement: 'bottom',
                align: 'left',
                autoclose: true,
                'default': 'now'
            });
        },
        magnificPopUp() {
            /*------------------------------
                ABOUT VIDEO POPUP
            --------------------------------*/
            $('.about-video-button,.blog-video-button').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 320,
                preloader: false
            });

            /*------------------------------
                MENU IMAGE POPUP
            -------------------------------*/
            $('.menu-popup').magnificPopup({
                type: 'image',
                removalDelay: 500, //delay removal by X to allow out-animation
                callbacks: {
                    beforeOpen: function () {
                        // just a hack that adds mfp-anim class to markup
                        this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                        this.st.mainClass = this.st.el.attr('data-effect');
                    }
                },
                closeOnContentClick: true,
                midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
            });
        },
        loadMixItUp() {
            /*---------------------------
                MENU LIST MIXITUP FILTERING
            ----------------------------*/
            $('.food-menu-list').mixItUp();
        },
        destroyMixItUp() {
            /*---------------------------
                MENU LIST MIXITUP FILTERING
            ----------------------------*/
            $('.food-menu-list').mixItUp('destroy');
        },
        loadOwlCarousel() {
            /*---------------------------
                SCREENSHOT SLIDER
            -----------------------------*/
            $('.team-slider').owlCarousel({
                merge: true,
                video: true,
                items: 1,
                smartSpeed: 1000,
                loop: true,
                nav: false,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                autoplay: false,
                autoplayTimeout: 2000,
                margin: 15,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            });

            /*---------------------------
                TESTMONIAL SLIDER
            -----------------------------*/
            $('.testmonial-slider').owlCarousel({
                merge: true,
                video: true,
                items: 1,
                smartSpeed: 1000,
                loop: true,
                nav: true,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                autoplay: false,
                autoplayTimeout: 2000,
                margin: 15,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });

            /*---------------------------
                BLOG POST IMAGE SLIDER
            -----------------------------*/
            $('.blog-image-sldie').owlCarousel({
                merge: true,
                video: true,
                items: 1,
                smartSpeed: 1000,
                loop: true,
                animateIn: 'fadeIn',
                animateOut: 'fadeOut',
                nav: true,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                autoplay: false,
                autoplayTimeout: 2000,
                margin: 15,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });

            /*---------------------------
                MENU DISCOUNT SLIDER
            -----------------------------*/
            $('.menu-discount-offer').owlCarousel({
                merge: true,
                video: true,
                items: 1,
                smartSpeed: 1000,
                loop: true,
                nav: false,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                autoplay: true,
                autoplayTimeout: 2500,
                margin: 15,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });
        },
        loadSlider() {
            var mySlider = $('.pogoSlider').pogoSlider({
                pauseOnHover: false
            }).data('plugin_pogoSlider')
        },
        removeLoader() {
            setTimeout(() => {
                $(".preeloader").fadeOut(700);
            }, 1000);
        },
        loadSearch() {
            /*----------------------------
                OPEN SEARCH FORM
            ----------------------------*/
            var $searchForm = $('.search-form');
            var $searchFormTrigger = $('.search-form-trigger');
            var $formOverlay = $('.search-form-overlay');
            $searchFormTrigger.on('click', function (event) {
                event.preventDefault();
                toggleSearch();
            });

            function toggleSearch(type) {
                if (type === "close") {
                    //close serach
                    $searchForm.removeClass('is-visible');
                    $searchFormTrigger.removeClass('search-is-visible');
                } else {
                    //toggle search visibility
                    $searchForm.toggleClass('is-visible');
                    $searchFormTrigger.toggleClass('search-is-visible');
                    if ($searchForm.hasClass('is-visible')) $searchForm.find('input[type="search"]').focus();
                    $searchForm.hasClass('is-visible') ? $formOverlay.addClass('is-visible') : $formOverlay.removeClass('is-visible');
                }
            }
        }
    }
}

jQuery(window).on('load', function () {
});
