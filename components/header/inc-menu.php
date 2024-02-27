<?php
$sticky_menu = clinic_get_option( 'opt_menu_sticky', '1' );
?>

<nav class="navbar-main d-none d-lg-block <?php echo esc_attr( $sticky_menu == '1' ? 'active-sticky-nav' : '' ); ?>">
    <div class="container">
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
    </div>
</nav>