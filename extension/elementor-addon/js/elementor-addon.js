(function ($) {
    // element slider
    const elementSlider = ($scope, $) => {
        const slider = $scope.find('.element-slider__warp')

        if (slider.length) {
            slider.each(function () {
                $(this).lightSlider({
                    item: 1,
                    loop: true,
                    pager: false,
                    speed: 800,
                    currentPagerPosition: 'left'
                })
            })
        }
    }

    // element testimonial slider
    const elementTestimonialSlider = ($scope, $) => {
        const slider = $scope.find('.element-testimonial-slider__warp')

        if (slider.length) {
            slider.each(function () {
                $(this).lightSlider({
                    item: 1,
                    loop: true,
                    pager: false,
                    speed: 800,
                    currentPagerPosition: 'left'
                })
            })
        }
    }

    // element doctor slider
    const elementDoctorSlider = function ($scope, $) {
        const elementDoctorSlider = $scope.find('.element-doctor-slider__gallery')

        if ( elementDoctorSlider.length ) {
            elementDoctorSlider.each(function () {
                const thisSlider = $(this)

                const slider = thisSlider.lightSlider({
                    item: 3,
                    loop: true,
                    pager: false,
                    controls: false,
                    speed: 800,
                    slideMargin: 20,
                    currentPagerPosition: 'left',
                    responsive : [
                        {
                            breakpoint: 575,
                            settings: {
                                thumbItem: 3
                            }
                        },
                        {
                            breakpoint: 375,
                            settings: {
                                thumbItem: 2
                            }
                        }
                    ]
                })

                $('.doctor-slider-button-prev').click(function () {
                    slider.goToPrevSlide();
                })

                $('.doctor-slider-button-next').click(function () {
                    slider.goToNextSlide();
                })
            })
        }
    }

    // element multiple rows slider
    const elementMultipleRowsSlider = function ($scope, $) {
        const slider = $scope.find('.element-carousel-multiple-rows__warp')

        if (slider.length) {
            slider.each(function () {
                $(this).lightSlider({
                    item: 1,
                    loop: true,
                    controls: false,
                    speed: 800,
                    currentPagerPosition: 'left'
                })
            })
        }
    }

    // element image slider
    const elementGallerySlider = function ($scope, $) {
        const slider = $scope.find('.element-image-slider__warp')

        if ( slider.length ) {
            slider.each(function () {
                const thisSlider = $(this)

                thisSlider.lightSlider({
                    item: 3,
                    loop: true,
                    pager: false,
                    controls: true,
                    speed: 800,
                    slideMargin: 20,
                    currentPagerPosition: 'left',
                    responsive : [
                        {
                            breakpoint: 575,
                            settings: {
                                thumbItem: 3
                            }
                        },
                        {
                            breakpoint: 375,
                            settings: {
                                thumbItem: 2
                            }
                        }
                    ]
                })
            })
        }
    }

    $(window).on('elementor/frontend/init', function () {
        /* Element slider */
        elementorFrontend.hooks.addAction('frontend/element_ready/clinic-slider.default', elementSlider);

        /* Element testimonial slider */
        elementorFrontend.hooks.addAction('frontend/element_ready/clinic-testimonial-slider.default', elementTestimonialSlider);

        /* Element carousel images */
        elementorFrontend.hooks.addAction('frontend/element_ready/clinic-carousel-multiple-rows.default', elementMultipleRowsSlider);

        /* Element doctor slider */
        elementorFrontend.hooks.addAction('frontend/element_ready/clinic-doctor-slider.default', elementDoctorSlider);

        /* Element image slider */
        elementorFrontend.hooks.addAction('frontend/element_ready/clinic-image-slider.default', elementGallerySlider);
    });
})(jQuery);