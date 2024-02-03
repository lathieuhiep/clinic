<?php
$logo = clinic_get_opt_logo();
$hotline = clinic_get_opt_hotline();
$support = clinic_get_opt_link_chat_doctor();
$link_map = clinic_get_opt_link_map();
$medical_appointment_form = clinic_get_opt_medical_appointment();
?>

<div class="top-nav d-none d-lg-block">
    <div class="top-nav__grid container">
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

        <div class="contact">
            <div class="contact__left text-start d-flex flex-column justify-content-center">
                <a class="tel d-inline-block" href="tel:<?php echo esc_attr(clinic_preg_replace_ony_number($hotline)); ?>">
                    <?php esc_html_e('Hotline', 'clinic'); echo ': ' . esc_html( $hotline ); ?>
                </a>

                <p class="text">
                    <i class="icon-hours-support"></i>
                    <span><?php esc_html_e('Từ 8h-20h tất cả các ngày trong tuần', 'clinic'); ?></span>
                </p>
            </div>

            <div class="contact__right">
                <a href="<?php echo esc_url( $support ); ?>" target="_blank">
                    <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icons/icon-chat-group.png' ) ); ?>" alt="chat">
                </a>

                <a href="<?php echo esc_url( $link_map ); ?>" target="_blank">
                    <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icons/icon-map.png' ) ); ?>" alt="map">
                </a>

                <?php if ( $medical_appointment_form ) : ?>
                    <a class="item__content" href="#" data-bs-toggle="modal" data-bs-target="#modal-appointment-form">
                        <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icons/icon-calendar-time.png' ) ); ?>" alt="calendar">
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <nav class="navbar-main">
        <div class="container h-100">
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
</div>