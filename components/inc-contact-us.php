<?php
$phone = clinic_get_opt_hotline();
$link_chat = clinic_get_opt_link_chat_doctor();
?>

<div class="contact-us-group d-md-none">
    <img class="thumbnail" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/gif/contact.gif' ) ) ?>" alt="contact">

    <?php if ( $phone ) : ?>
        <a class="phone" href="tel:<?php echo esc_attr(clinic_preg_replace_ony_number($phone)); ?>"></a>
    <?php endif; ?>

    <?php if ( $link_chat ) : ?>
        <a class="chat" href="<?php echo esc_url( $link_chat ); ?>" target="_blank"></a>
    <?php endif; ?>
</div>