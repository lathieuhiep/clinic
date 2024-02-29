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
                    autoHeight: true,
                    margin: 12,
                    responsive:{
                        0:{
                            items: 1
                        },
                        376:{
                            items: 2,
                            margin: 12
                        },
                        576:{
                            items: 3,
                            margin: 12
                        },
                        768: {
                            items: 4
                        }
                    }
                }))
            })
        }
    }

    const elementDoctorDetail = ($scope, $) => {
        const detailDoctor = $scope.find('.view-detail-doctor')

        detailDoctor.on('click', function (e) {
            e.preventDefault();

            const id = $(this).data('id')
            const parentDoctorSlider = $(this).closest('.element-doctor-slider')

            $.ajax({
                url: clinic_elementor_detail_doctor.url,
                type: 'POST',
                data: ({
                    action: 'clinic_get_detail_doctor',
                    id: id
                }),

                success: function (data) {
                    if (data) {
                        parentDoctorSlider.find('.element-doctor-slider__modal').empty().append(data)
                    }
                },

                complete: function(){
                    const modalDoctorSlider = parentDoctorSlider.find('#modal-doctor-slider')
                    const myModal = new bootstrap.Modal(modalDoctorSlider, {
                        keyboard: false
                    })

                    console.log(modalDoctorSlider)
                },
            })

            return false
        })
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
        elementorFrontend.hooks.addAction('frontend/element_ready/clinic-doctor-slider.default', elementDoctorDetail);

        /* Element testimonial slider */
        elementorFrontend.hooks.addAction('frontend/element_ready/clinic-testimonial-slider.default', elementTestimonialSlider);

        /* Element machines slider */
        elementorFrontend.hooks.addAction('frontend/element_ready/clinic-machines.default', elementSliderMachines);

        /* Element number count */
        elementorFrontend.hooks.addAction('frontend/element_ready/clinic-number-counter.default', elementNumberCounter);
    });
})(jQuery);