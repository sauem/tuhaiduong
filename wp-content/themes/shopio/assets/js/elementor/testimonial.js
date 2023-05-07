(function ($) {
    "use strict";
    $(window).on('elementor/frontend/init', () => {
        elementorFrontend.hooks.addAction('frontend/element_ready/shopio-testimonials.default', ($scope) => {
            let $carousel = $('.shopio-carousel', $scope);
            if ($carousel.length > 0) {

                if($carousel.hasClass('layout-3')){
                    let $nav = $('.testimonial-image-style',$scope);
                    $carousel.slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                        fade: true,
                        asNavFor: $nav
                    });
                    $nav.slick({
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        asNavFor: $carousel,
                        dots: false,
                        centerMode: true,
                        centerPadding: '0',
                        focusOnSelect: true
                    });
                }else {
                    let data = $carousel.data('settings');
                    $carousel.slick(
                        {
                            dots: data.navigation == 'both' || data.navigation == 'dots' ? true : false,
                            arrows: data.navigation == 'both' || data.navigation == 'arrows' ? true : false,
                            infinite: data.loop,
                            speed: 300,
                            slidesToShow: parseInt(data.items),
                            autoplay: data.autoplay,
                            autoplaySpeed: data.autoplaySpeed,
                            slidesToScroll: 1,
                            lazyLoad: 'ondemand',
                            rtl: data.rtl,
                            responsive: [
                                {
                                    breakpoint: parseInt(data.breakpoint_laptop),
                                    settings: {
                                        slidesToShow: parseInt(data.items_laptop),
                                    }
                                },
                                {
                                    breakpoint: parseInt(data.breakpoint_tablet_extra),
                                    settings: {
                                        slidesToShow: parseInt(data.items_tablet_extra),
                                    }
                                },
                                {
                                    breakpoint: parseInt(data.breakpoint_tablet),
                                    settings: {
                                        slidesToShow: parseInt(data.items_tablet),
                                    }
                                },
                                {
                                    breakpoint: parseInt(data.breakpoint_mobile_extra),
                                    settings: {
                                        slidesToShow: parseInt(data.items_mobile_extra),
                                    }
                                },
                                {
                                    breakpoint: parseInt(data.breakpoint_mobile),
                                    settings: {
                                        slidesToShow: parseInt(data.items_mobile),
                                    }
                                }
                            ]
                        }
                    );
                }
            }
        });
    });

})(jQuery);
