<?php
$logo = clinic_get_opt_logo();
$hotline = clinic_get_opt_hotline();
$address = clinic_get_opt_address();
?>

<div class="top-nav d-none d-lg-block">
    <div class="top-nav__grid container">
        <div class="logo d-flex align-items-center">
            <a class="d-block" href="<?php echo esc_url( get_home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
                <?php
                if ( ! empty( $logo['id'] ) ) :
                    echo wp_get_attachment_image( $logo['id'], 'medium_large', '', ['class' => 'logo__default'] );
                else :
                    ?>
                    <img class="logo__default" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/logo.png' ) ) ?>" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" width="64" height="64"/>
                <?php endif; ?>
            </a>
        </div>

        <div class="contact">
            <div class="contact__item">
                <div class="icon">
                    <i class="icon-phone-volume"></i>
                </div>

                <div class="content">
                    <p class="txt-phone"><?php esc_html_e('Điện thoại tư vấn'); ?></p>

                    <a class="tel d-inline-block" href="tel:<?php echo esc_attr(clinic_preg_replace_ony_number($hotline)); ?>">
                        <?php echo esc_html( $hotline ); ?>
                    </a>
                </div>
            </div>

            <div class="contact__item">
                <div class="icon">
                    <i class="icon-location-dot"></i>
                </div>

                <div class="content">
                    <p class="txt-address"><?php echo esc_html($address); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>