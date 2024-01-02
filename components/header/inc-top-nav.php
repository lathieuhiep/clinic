<?php
$logo = clinic_get_option( 'opt_general_logo' );
$hotline = clinic_get_option('opt_general_hotline_mobile');
?>

<div class="top-nav">
    <div class="navbar-top-grid">
        <div class="logo">
            <a class="d-block" href="<?php echo esc_url( get_home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
                <?php
                if ( ! empty( $logo['id'] ) ) :
                    echo wp_get_attachment_image( $logo['id'], 'medium_large' );
                else :
                    ?>
                    <img class="logo-default" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/logo.png' ) ) ?>" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" width="64" height="64"/>
                <?php endif; ?>
            </a>
        </div>

        <nav class="navbar-main">
            <div id="primary-menu" class="navbar-main__menu collapse navbar-collapse d-lg-block">
                <?php
                if ( has_nav_menu( 'primary' ) ) :
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_class' => 'd-lg-flex justify-content-lg-center reset-list',
                        'container' => false,
                    ) );
                else:
                    ?>
                    <ul class="main-menu">
                        <li>
                            <a href="<?php echo get_admin_url() . '/nav-menus.php'; ?>">
                                <?php esc_html_e( 'ADD TO MENU', 'clinic' ); ?>
                            </a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </nav>

        <?php if ( $hotline ) : ?>
            <div class="phone">
                <a class="d-block" href="tel:<?php echo esc_attr(clinic_preg_replace_ony_number($hotline)); ?>">
                    <i class="fa-solid fa-phone-volume alo-circle-anim"></i>
                    <span><?php echo esc_html( $hotline ); ?></span>
                </a>
            </div>
        <?php endif; ?>

    </div>
</div>