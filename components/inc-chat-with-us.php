<?php
$chat_zalo = clinic_get_option('opt_chat_with_us_zalo');
$chat_message = clinic_get_option('opt_chat_with_us_message');
$call_phone = clinic_get_option('opt_chat_with_us_phone');
?>

<div class="chat-with-us">
	<?php if ( $chat_zalo ) : ?>
		<a class="chat-with-us__link chat-with-us__zalo" href="https://zalo.me/<?php echo esc_attr( $chat_zalo ); ?>" target="_blank">
			<img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/zalo-icon.png' ) ) ?>" alt="zalo">
		</a>
	<?php endif; ?>

	<?php if ( $chat_message ) : ?>
        <a class="chat-with-us__link chat-with-us__mess" href="<?php echo esc_url( $chat_message ); ?>" target="_blank">
            <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/mess-icon.png' ) ) ?>" alt="mess">
        </a>
	<?php endif; ?>

	<?php if ( $call_phone ) : ?>
        <a class="chat-with-us__link chat-with-us__phone" href="tel:<?php echo esc_attr(clinic_preg_replace_ony_number($call_phone)); ?>">
            <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/dien-thoai-icon.png' ) ) ?>" alt="phone">
        </a>
	<?php endif; ?>
</div>