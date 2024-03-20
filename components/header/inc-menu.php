<?php
$logo = clinic_get_option( 'opt_general_logo' );
?>
<nav class="navbar-main d-none d-lg-block">
    <div class="container">
        <div class="grid-layout h-100">
            <div class="logo">
                <div class="logo__image d-flex align-items-end">
                    <a class="d-block" href="<?php echo esc_url( get_home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
                        <?php
                        if ( ! empty( $logo['id'] ) ) :
                            echo wp_get_attachment_image( $logo['id'], 'full' );
                        else :
                            ?>

                            <img class="logo-default" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/logo.png' ) ) ?>" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" width="64" height="64"/>

                        <?php endif; ?>
                    </a>
                </div>

                <div class="logo__text text-uppercase d-flex flex-column justify-content-center">
                    <p class="name f-family-heading">
                        <?php esc_html_e( 'Bác sĩ', 'clinic' ); ?>

                        <strong><?php esc_html_e( 'Cao Xuân Trọng', 'clinic' ); ?></strong>
                    </p>

                    <p class="position f-family-heading fw-bold">
                        <?php esc_html_e( 'Nguyên pgđ bệnh viện giao thông vận tải', 'clinic' ); ?>
                    </p>
                </div>
            </div>

            <div id="primary-menu" class="primary-menu">
                <?php
                if ( has_nav_menu( 'primary' ) ) :
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_class' => 'd-lg-flex reset-list',
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
        </div>
    </div>
</nav>