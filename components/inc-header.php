<?php
$sticky_menu = clinic_get_option( 'opt_menu_sticky', '1' );

get_template_part('components/header/inc','top-nav');
?>


<header class="global-header <?php echo esc_attr( $sticky_menu == '1' ? 'active-sticky-nav' : '' ); ?>">
    <?php get_template_part('components/header/inc','contact-mobile'); ?>
</header>