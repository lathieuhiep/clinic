<?php
$phone = clinic_get_opt_hotline();
$link_chat = clinic_get_opt_link_chat_doctor();
$chat_zalo = clinic_get_opt_chat_zalo();
?>

<div class="contact-us-mobile d-lg-none">
    <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/gif/lien-he.gif' ) ) ?>" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>">

    <?php if ( $phone ) : ?>
        <a class="item phone" href="tel:<?php echo esc_attr(clinic_preg_replace_ony_number($phone)); ?>"></a>
    <?php endif; ?>

    <?php if ( $link_chat ) : ?>
        <a class="item chat" href="<?php echo esc_url( $link_chat ); ?>" target="_blank"></a>
    <?php endif; ?>

    <?php
    if ( $chat_zalo ) :
        $zalo_phone = $chat_zalo['phone'];
        $zalo_qr_code = $chat_zalo['qr_code'];
        ?>
        <a class="item zalo chat-with-us__zalo" href="#" data-phone="<?php echo esc_attr($zalo_phone); ?>" data-qr-code="<?php echo esc_attr($zalo_qr_code); ?>"></a>
    <?php endif; ?>
</div>