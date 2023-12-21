<?php
$show_related = clinic_get_option('opt_post_single_related', '1');
$phone     = clinic_get_option( 'opt_footer_contact_phone' );
$link_book = clinic_get_option( 'opt_footer_contact_book' );
$link_chat = clinic_get_option( 'opt_footer_contact_chat' );

?>

<div id="post-<?php the_ID() ?>" class="single-post-content">
    <h1 class="single-post-content__title f-family-body">
		<?php the_title(); ?>
    </h1>

	<?php clinic_post_meta(); ?>

    <div class="single-post-content__detail">
		<?php
		the_content();

		clinic_link_page();
		?>
    </div>
</div>

<div class="single-contact-us">
    <a class="item" href="tel:<?php echo esc_attr(clinic_preg_replace_ony_number($phone)); ?>">
        <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/phone-us.png' ) ) ?>" alt="">
    </a>

    <a class="item" href="<?php echo esc_url( $link_book['url'] ); ?>" target="<?php echo esc_attr($link_book['target']) ?>">
        <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/dang-ki-kham.png' ) ) ?>" alt="">
    </a>

    <a class="item" href="<?php echo esc_url( $link_chat['url'] ); ?>" target="<?php echo esc_attr($link_chat['target']) ?>">
        <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/tro-chuyen-voi-bac-si.png' ) ) ?>" alt="">
    </a>
</div>

<?php
get_template_part( 'components/inc','comment-form' );

if ( $show_related == '1' ) :
    get_template_part( 'template-parts/post/inc','related-post' );
endif;