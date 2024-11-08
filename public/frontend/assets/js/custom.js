jQuery(document).ready(function ($) {
    // Sticky header
    $(window).scroll(function () {
        var sticky = $(".fast-header"),
        scroll = $(window).scrollTop();

        if (scroll >= 100) sticky.addClass("fixed-navbar");
        else sticky.removeClass("fixed-navbar");
    });

    // Customers slider
    if($('.customers-carousel').length) {
        $('.customers-carousel').owlCarousel({
            loop:true,
            nav:false,
            dots:true,
            margin:20,
            smartSpeed:450,
            mouseDrag:true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:4
                }
            }
        })
    }

    // Partners slider
    if($('.partners-carousel').length) {
        $('.partners-carousel').owlCarousel({
            loop:true,
            nav:false,
            dots:true,
            margin:20,
            smartSpeed:450,
            mouseDrag:true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    }

    // Blog slider
    if($('.blog-carousel').length) {
        $('.blog-carousel').owlCarousel({
            loop:true,
            nav:true,
            dots:false,
            margin:20,
            // smartSpeed:450,
            mouseDrag:true,
            // autoplay: true,
            // autoplayTimeout: 5000,
            // autoplayHoverPause: true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        })
    }
});