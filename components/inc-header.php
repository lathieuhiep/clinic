<?php
$banner_header = clinic_get_opt_banner_header();
$sticky_menu = clinic_get_option( 'opt_menu_sticky', '1' );

if ( !empty( $banner_header ) && !empty( $banner_header['pc']['id'] ) ) :
?>

<div class="banner-header">
    <?php echo wp_get_attachment_image($banner_header['pc']['id'], 'full', '', array( "class" => "d-none d-lg-block" )); ?>
    <?php echo wp_get_attachment_image($banner_header['mobile']['id'], 'full', '', array( "class" => "d-lg-none w-100" )); ?>
</div>

<?php endif; ?>

<header class="global-header <?php echo esc_attr( $sticky_menu == '1' ? 'active-sticky-nav' : '' ); ?>">
    <?php
    get_template_part('components/header/inc','top-nav');

    get_template_part('components/header/inc','contact-mobile');
    ?>
</header>