<?php
$phone = clinic_get_option('opt_general_hotline_mobile');
$medical_appointment_form = clinic_get_option('opt_general_medical_appointment_form');
$link_chat = clinic_get_option('opt_general_chat_doctor');
$link_map = clinic_get_option('opt_general_link_map');
?>

<div class="contact-us-group">
    <div class="container">
        <div class="grid-layout text-uppercase">
	        <?php if ( $phone ) : ?>
                <div class="item phone">
                    <a class="item__content" href="tel:<?php echo esc_attr(clinic_preg_replace_ony_number($phone)); ?>">
                        <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icon-phone-circle.png' ) ) ?>" alt="phone" width="90" height="90">

                        <span><?php echo esc_html($phone); ?></span>
                    </a>
                </div>
	        <?php
            endif;

            if ( $link_chat && $link_chat['url'] ) :
            ?>
                <div class="item chat">
                    <a class="item__content" href="<?php echo esc_url( $link_chat['url'] ); ?>" target="<?php echo esc_attr($link_chat['target']) ?>">
                        <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icon-chat-doctor.png' ) ) ?>" alt="chat" width="90" height="90">

                        <span><?php esc_html_e('Chat với bác sĩ', 'clinic'); ?></span>
                    </a>
                </div>
            <?php
            endif;

	        if ( $medical_appointment_form ) :
            ?>
                <div class="item booking">
                    <a class="item__content" href="#" data-bs-toggle="modal" data-bs-target="#modal-appointment-form">
                        <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icon-calender.png' ) ) ?>" alt="calender" width="90" height="90">

                        <span><?php esc_html_e('Đặt lịch hẹn', 'clinic'); ?></span>
                    </a>
                </div>
            <?php
            endif;

            if ( $link_map ) :
            ?>
                <div class="item map">
                    <a class="item__content" href="<?php echo esc_url( $link_map ); ?>" target="_blank">
                        <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icon-location.png' ) ) ?>" alt="location" width="90" height="90">

                        <span><?php esc_html_e('Chỉ đường', 'clinic'); ?></span>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php if ( $medical_appointment_form ) : ?>

<!-- Modal medical appointment -->
<div class="modal fade" id="modal-appointment-form" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">
                    <?php esc_html_e('Đặt hẹn khám', 'clinic'); ?>
                </h3>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <?php echo do_shortcode('[contact-form-7 id="' . $medical_appointment_form . '" ]'); ?>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>