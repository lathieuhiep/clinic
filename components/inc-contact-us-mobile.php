<?php
$phone = clinic_get_opt_hotline();
$link_chat = clinic_get_opt_link_chat_doctor();
?>

<div class="contact-us-mobile d-lg-none">
    <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/footer-contact-us.gif' ) ) ?>" alt="">

    <a class="item zalo" href="https://zalo.me/4019565536704794124" target="_blank"></a>

    <?php if ( $phone ) : ?>
        <a class="item phone" href="tel:<?php echo esc_attr(clinic_preg_replace_ony_number($phone)); ?>"></a>
    <?php endif; ?>

    <?php if ( $link_chat ) : ?>
        <a class="item chat" href="<?php echo esc_url( $link_chat ); ?>" target="_blank"></a>
    <?php endif; ?>
</div>