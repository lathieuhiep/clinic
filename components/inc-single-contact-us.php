<?php
$phone     = clinic_get_option( 'opt_footer_contact_phone' );
$link_book = clinic_get_option( 'opt_footer_contact_book' );
$link_chat = clinic_get_option( 'opt_footer_contact_chat' );
?>
<div class="single-contact-us <?php echo esc_attr( $args['class'] ?? '' ); ?>">
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