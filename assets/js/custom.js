/**
 * Custom js v1.0.0
 * Copyright 2017-2020
 * Licensed under  ()
 */

( function( $ ) {

    "use strict";

    let timer_clear;

    $( document ).ready( function () {

        // handle click back to top
        $('#back-top').on( 'click', function (e) {
            e.preventDefault()
            $('html').scrollTop(0)
        } )

        // handle click show submenu on mobile
        handleClickShowSubmenuOnMobile()

        // handle dropdown category widget
        handleDropdownCategoryWidget()

        // handle dropdown category widget
        handleAddCategoryImageContentPost()
    })

    // loading
    $( window ).on( "load", function() {
        // handle remove loading page after loaded successfully
        handleRemoveLoadingPage()
    })

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

    })

    /*
    ** Function
    * */

    // handle remove loading page after loaded successfully
    const handleRemoveLoadingPage = () => {
        const siteLoading = $( '#site-loading' )

        if ( siteLoading.length ) {
            siteLoading.remove()
        }
    }

    // handle click show submenu on mobile
    const handleClickShowSubmenuOnMobile = () => {
        const subMenuToggle = $('.sub-menu-toggle')

        if ( subMenuToggle.length ) {
            subMenuToggle.each(function () {
                $(this).on( 'click', function () {
                    const widthScreen = $(window).width()

                    if ( widthScreen < 992 ) {
                        $(this).toggleClass('active')
                        $(this).closest( '.menu-item-has-children' ).siblings().find( subMenuToggle ).removeClass( 'active' )
                        $(this).parent().children( '.sub-menu' ).slideToggle()
                        $(this).parents( '.menu-item-has-children' ).siblings().find( '.sub-menu' ).slideUp()
                    }
                } )
            })
        }
    }

    // handle dropdown category widget
    const handleDropdownCategoryWidget = () => {
        // handle show cate current
        const cateItemLink = $('.categories-dropdown-widget .cat-item__link')
        if ( cateItemLink.length ) {
            cateItemLink.each(function () {
                const hasClassCurrent = $(this).hasClass('current-cate')

                if ( hasClassCurrent ) {
                    const catItemParent = $(this).closest('.cat-item-parent')

                    catItemParent.children('.cate-link-has-child').addClass('active')
                    catItemParent.children( '.children' ).slideDown()
                }
            })
        }

        // handle slideToggle
        const cateLinkHasChildWidget = $('.categories-dropdown-widget .cate-link-has-child')
        if ( cateLinkHasChildWidget.length ) {
            cateLinkHasChildWidget.each(function () {
                $(this).on('click', function (e) {
                    e.preventDefault()

                    $(this).toggleClass('active')
                    $(this).closest( '.cat-item' ).siblings().find(cateLinkHasChildWidget).removeClass( 'active' )
                    $(this).parent().children( '.children' ).slideToggle()
                    $(this).parents( '.cat-item-has-child' ).siblings().find('.children').slideUp();
                })
            })
        }
    }

    // handle add category image content post
    const handleAddCategoryImageContentPost = () => {
        const singlePostContentDetail = $('.single-post-content__detail')

        if ( singlePostContentDetail.length ) {
            const urlImageCate = singlePostContentDetail.data('url-image-cate')

            // insert before image cate
            $(`<div class="image-cate-box text-center mb-4"><img src="${urlImageCate}" alt=""></div>`).insertBefore(".title-has-icon:first");
        }
    }

} )( jQuery );