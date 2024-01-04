<?php
$logo_mobile = clinic_get_option( 'opt_general_logo_mobile' );
$hotline_mobile = clinic_get_opt_hotline();
$image_contact_mobile = clinic_get_option('opt_general_image_contact_mobile');
?>
<div class="top-nav-mobile d-lg-none">
    <div class="container h-100">
        <div class="grid-warp h-100">
            <div class="item hamburger">
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>

            <div class="item logo text-center">
                <a class="logo__image" href="<?php echo esc_url( get_home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
                    <?php
                    if ( !empty( $logo_mobile['id'] ) ) :
                        echo wp_get_attachment_image( $logo_mobile['id'], 'full' );
                    else :
                    ?>
                        <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/logo.png' ) ) ?>" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" width="64" height="64"/>
                    <?php endif; ?>
                </a>
            </div>

            <div class="item hotline">
                <?php if ( $hotline_mobile && !empty(  $image_contact_mobile['id'] ) ) : ?>
                    <a href="tel:<?php echo esc_attr( clinic_preg_replace_ony_number($hotline_mobile) ); ?>">
                        <?php echo wp_get_attachment_image( $image_contact_mobile['id'], 'medium_large' ); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>