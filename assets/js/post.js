( function( $ ) {
    "use strict";

    $( document ).ready( function () {
        // handle slider main
        sliderMain()

        // handle sticky sidebar
        handleStickySidebar()
    })

    // handle slider main
    const sliderMain = () => {
      const slider = $('.slider-main__warp');

      if (slider.length) {
          slider.owlCarousel({
              items: 1,
              nav: true,
              loop: true,
              smartSpeed: 800,
              autoplaySpeed: 800,
              navSpeed: 800,
              dotsSpeed: 800,
              dragEndSpeed: 800,
              autoHeight:true,
              navText: ['<i class="icon-angle-left" aria-hidden="true"></i>','<i class="icon-angle-right" aria-hidden="true"></i>'],
          })
      }
    }
    
    // handle sticky sidebar
    const handleStickySidebar = () => {
        $('.site-sidebar').stickySidebar({
            containerSelector: '.post-row',
            innerWrapperSelector: '.site-sidebar__inner',
            resizeSensor: true,
            topSpacing: 20,
            bottomSpacing: 20
        })
    }
    
} )( jQuery );