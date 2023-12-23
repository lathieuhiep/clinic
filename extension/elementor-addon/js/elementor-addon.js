(function ($) {
    /* Start Carousel slider */
    let ElementCarouselSlider = function ($scope, $) {
        let element_slides = $scope.find('.custom-owl-carousel')

        $(document).general_owlCarousel_custom(element_slides)
    };

    const ElementDoctorSlider = function ($scope, $) {
        const elementDoctorSlider = $scope.find('.element-doctor-slider__gallery')

        if ( elementDoctorSlider.length ) {
            elementDoctorSlider.each(function () {
                const thisSlider = $(this)

                const slider = thisSlider.lightSlider({
                    gallery: true,
                    item: 1,
                    loop: true,
                    auto: false,
                    speed: 800,
                    thumbItem: 5,
                    thumbMargin: 6,
                    controls: false,
                    currentPagerPosition: 'left'
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

    $(window).on('elementor/frontend/init', function () {
        /* Element slider */
        elementorFrontend.hooks.addAction('frontend/element_ready/clinic-slides.default', ElementCarouselSlider);

        /* Element post carousel */
        elementorFrontend.hooks.addAction('frontend/element_ready/clinic-post-carousel.default', ElementCarouselSlider);

        /* Element testimonial slider */
        elementorFrontend.hooks.addAction('frontend/element_ready/clinic-testimonial-slider.default', ElementCarouselSlider);

        /* Element carousel images */
        elementorFrontend.hooks.addAction('frontend/element_ready/clinic-carousel-multiple-rows.default', ElementCarouselSlider);

        /* Element doctor slider */
        elementorFrontend.hooks.addAction('frontend/element_ready/clinic-doctor-slider.default', ElementDoctorSlider);
    });

})(jQuery);