(function ($) {
    // setting owlCarousel
    const owlCarouselElementorOptions = (options) => {
        let defaults = {
            loop: true,
            smartSpeed: 800,
            autoplaySpeed: 800,
            navSpeed: 800,
            dotsSpeed: 800,
            dragEndSpeed: 800,
            navText: ['<i class="icon-angle-left" aria-hidden="true"></i>','<i class="icon-angle-right" aria-hidden="true"></i>'],
        }

        // extend options
        return $.extend(defaults, options)
    }
    
    // element slider
    const elementSlider = ($scope, $) => {
        const slider = $scope.find('.element-slider__warp')

        if (slider.length) {
            slider.each(function () {
                const thisSlider = $(this)

                thisSlider.owlCarousel(owlCarouselElementorOptions({
                    items: 1,
                    nav: true
                }))
            })
        }
    }

    // element doctor slider
    const elementDoctorSlider = ($scope, $) => {
        const slider = $scope.find('.element-doctor-slider__warp')

        if ( slider.length ) {
            slider.each(function () {
                const thisSlider = $(this)

                thisSlider.owlCarousel(owlCarouselElementorOptions({
                    margin: 24,
                    responsive:{
                        0:{
                            items: 1,
                            margin: 0
                        },
                        576:{
                            items: 2
                        },
                        768:{
                            items: 3
                        }
                    }
                }))
            })
        }
    }

    // element testimonial slider
    const elementTestimonialSlider = ($scope, $) => {
        const slider = $scope.find('.element-testimonial-slider__warp')

        if ( slider.length ) {
            slider.each(function () {
                const thisSlider = $(this)
                const options = thisSlider.data('owl-options')

                thisSlider.owlCarousel(owlCarouselElementorOptions(options))
            })
        }
    }

    $(window).on('elementor/frontend/init', function () {
        /* Element slider */
        elementorFrontend.hooks.addAction('frontend/element_ready/clinic-slider.default', elementSlider);

        /* Element doctor slider */
        elementorFrontend.hooks.addAction('frontend/element_ready/clinic-doctor-slider.default', elementDoctorSlider);

        /* Element testimonial slider */
        elementorFrontend.hooks.addAction('frontend/element_ready/clinic-testimonial-slider.default', elementTestimonialSlider);
    });
})(jQuery);