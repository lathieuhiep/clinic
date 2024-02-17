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
        const options = slider.data('owl-options')

        if (slider.length) {
            slider.each(function () {
                const thisSlider = $(this)

                thisSlider.owlCarousel(owlCarouselElementorOptions(options))
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
                    responsive:{
                        0:{
                            items: 1
                        },
                        576:{
                            items: 2,
                            margin: 12
                        },
                        992:{
                            items: 3,
                            margin: 12
                        },
                        1200: {
                            margin: 24,
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

    // element slider machines
    const elementSliderMachines = ($scope, $) => {
        const slider = $scope.find('.element-slider-machines__warp')
        const options = slider.data('owl-options')

        if (slider.length) {
            slider.each(function () {
                const thisSlider = $(this)

                thisSlider.owlCarousel(owlCarouselElementorOptions(options))
            })
        }
    }

    // element number counter
    const elementNumberCounter = ($scope, $) => {
        const numberCounter = $scope.find('.element-number-counter')
        let start = 0

        $( window ).scroll(function () {
            if ( numberCounter.length) {
                numberCounter.each(function () {

                    const thisNumberCounter = $(this)

                    const oTop = thisNumberCounter.find('.element-number-counter__warp').offset().top - window.innerHeight;

                    if ( start === 0 && $(window).scrollTop() > oTop ) {
                        const itemNumberCounter = thisNumberCounter.find('.content .number')

                        itemNumberCounter.each(function () {
                            const thisItemNumber = $(this)
                            const countTo = thisItemNumber.attr('data-number');

                            $({ countNum: thisItemNumber.text() }).animate(
                                {
                                    countNum: countTo
                                },
                                {
                                    duration: 850,
                                    easing: "swing",
                                    step: function () {
                                        thisItemNumber.text(
                                            Math.ceil(this.countNum)
                                        );
                                    },
                                    complete: function () {
                                        thisItemNumber.text(
                                            Math.ceil(this.countNum)
                                        );
                                    }
                                }
                            )
                        })

                        start = 1;
                    }
                })
            }
        })
    }

    $(window).on('elementor/frontend/init', function () {
        /* Element slider */
        elementorFrontend.hooks.addAction('frontend/element_ready/clinic-slider.default', elementSlider);

        /* Element doctor slider */
        elementorFrontend.hooks.addAction('frontend/element_ready/clinic-doctor-slider.default', elementDoctorSlider);

        /* Element testimonial slider */
        elementorFrontend.hooks.addAction('frontend/element_ready/clinic-testimonial-slider.default', elementTestimonialSlider);

        /* Element machines slider */
        elementorFrontend.hooks.addAction('frontend/element_ready/clinic-machines.default', elementSliderMachines);

        /* Element number count */
        elementorFrontend.hooks.addAction('frontend/element_ready/clinic-number-counter.default', elementNumberCounter);
    });
})(jQuery);