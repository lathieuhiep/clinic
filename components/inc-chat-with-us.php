<?php
$call_phone = clinic_get_option('opt_chat_with_us_phone');
?>

<div class="chat-with-us d-lg-none">
    <?php if ( $call_phone ) : ?>
        <a class="chat-with-us__link chat-with-us__phone" href="tel:<?php echo esc_attr(clinic_preg_replace_ony_number($call_phone)); ?>">
            <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/dien-thoai-icon.png' ) ) ?>" alt="phone">
        </a>
	<?php endif; ?>
</div>