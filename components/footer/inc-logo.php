<?php $logo_footer = clinic_get_option( 'opt_general_logo_footer' ); ?>

<div class="logo-footer">
    <div class="container text-center">
        <a class="d-inline-block" href="<?php echo esc_url( get_home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
            <?php
            if ( ! empty( $logo_footer['id'] ) ) :
                echo wp_get_attachment_image( $logo_footer['id'], 'full' );
            else :
                ?>
                <img class="logo-default" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/logo.png' ) ) ?>" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" />
            <?php endif; ?>
        </a>
    </div>
</div>