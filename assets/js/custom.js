/**
 * Custom js v1.0.0
 * Copyright 2017-2020
 * Licensed under  ()
 */

( function( $ ) {

    "use strict";

    let timer_clear;

    $( document ).ready( function () {

        /* Start back top */
        $('#back-top').on( 'click', function (e) {
            e.preventDefault();
            $('html').scrollTop(0);
        } );
        /* End back top */

        /* btn mobile Start*/
        let subMenuToggle  =   $('.sub-menu-toggle');

        if ( subMenuToggle.length ) {

            subMenuToggle.each(function () {
                $(this).on( 'click', function () {
                    const widthScreen = $(window).width();

                    if ( widthScreen < 992 ) {
                        $(this).toggleClass('active');
                        $(this).closest( '.menu-item-has-children' ).siblings().find( subMenuToggle ).removeClass( 'active' );
                        $(this).parent().children( '.sub-menu' ).slideToggle();
                        $(this).parents( '.menu-item-has-children' ).siblings().find( '.sub-menu' ).slideUp();
                    }

                } )
            })

        }
        /* btn mobile End */

        /* Start Gallery Single */
        $( document ).general_owlCarousel_custom( '.site-post-slides' )
        /* End Gallery Single */

        // dropdown category widget
        const cateLinkHasChildWidget = $('.categories-dropdown-widget .cate-link-has-child')

        if ( cateLinkHasChildWidget.length ) {
            cateLinkHasChildWidget.each(function () {
                $(this).on('click', function (e) {
                    e.preventDefault()

                    $(this).toggleClass('active')
                    $(this).closest( '.cat-item' ).siblings().find(cateLinkHasChildWidget).removeClass( 'active' )
                    $(this).parent().children( '.children' ).slideToggle();
                    $(this).parents( '.cat-item-has-child' ).siblings().find('.children').slideUp();
                })
            })
        }

        //
        const singlePostContentDetail = $('.single-post-content__detail')

        if ( singlePostContentDetail.length ) {
            const urlImageCate = singlePostContentDetail.data('url-image-cate')

            // insert before image cate
            $(`<div class="image-cate-box text-center mb-4"><img src="${urlImageCate}" alt=""></div>`).insertBefore(".title-has-icon:first");
        }
    });

    // loading
    $( window ).on( "load", function() {

        $( '#site-loadding' ).remove()

    });

    // scroll event
    $( window ).scroll( function() {

        if ( timer_clear ) clearTimeout(timer_clear)

        timer_clear = setTimeout( function() {

            /* Start scroll back top */
            const $scrollTop = $(this).scrollTop();

            if ( $scrollTop > 200 ) {
                $('#back-top').addClass('active_top')
            } else {
                $('#back-top').removeClass('active_top')
            }
            /* End scroll back top */

            // scroll show or hide phone header on mobile
            const topNavMobile = $('.top-nav-mobile')

            if ( topNavMobile.length ) {
                const heightHeaderOnMobile = topNavMobile.closest('.global-header').innerHeight()

                if ( $scrollTop >= heightHeaderOnMobile ) {
                    topNavMobile.find('.item .logo__image').addClass('scroll-hidden-logo')
                    topNavMobile.find('.item .hotline-on-mobile').addClass('scroll-show-phone')
                } else {
                    topNavMobile.find('.item .logo__image').removeClass('scroll-hidden-logo')
                    topNavMobile.find('.item .hotline-on-mobile').removeClass('scroll-show-phone')
                }
            }

        }, 100 );

    });

    // function call owlCarousel
    $.fn.general_owlCarousel_custom = function ( class_item ) {
        const class_item_owlCarousel = $( class_item )

        if ( class_item_owlCarousel.length ) {
            class_item_owlCarousel.each( function () {
                let slider = $(this);

                if ( !slider.hasClass('owl-carousel-init') ) {
                    let defaults = {
                        autoplaySpeed: 800,
                        navSpeed: 800,
                        dotsSpeed: 800,
                        autoHeight: false
                    };

                    let config = $.extend( defaults, slider.data( 'settings-owl') );

                    slider.owlCarousel( config ).addClass( 'owl-carousel-init' );
                }
            } )
        }
    }

} )( jQuery );