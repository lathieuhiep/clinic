<?php
$logo = clinic_get_option( 'opt_general_logo' );
$hotline = clinic_get_opt_hotline();
?>

<div class="top-nav d-none d-lg-block">
    <div class="navbar-top-grid">
        <div class="logo">
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
                <a class="d-flex align-items-center" href="tel:<?php echo esc_attr(clinic_preg_replace_ony_number($hotline)); ?>">
                    <img class="icon-phone alo-circle-anim" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/call.png' ) ) ?>" alt="" width="32" height="32"/>

                    <span class="box">
                        <span class="box__top"><?php esc_html_e('Điện thoại tư vấn', 'clinic'); ?></span>

                        <span class="box__under"><?php echo esc_html( $hotline ); ?></span>
                    </span>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>