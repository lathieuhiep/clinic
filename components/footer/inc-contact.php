<?php
$phone = clinic_get_option('opt_footer_contact_phone');
$link_book = clinic_get_option('opt_footer_contact_book');
$link_chat = clinic_get_option('opt_footer_contact_chat');
?>

<div class="global-footer__contact d-none d-lg-block">
    <div class="container">
        <div class="grid-layout">
            <div class="item">
                <div class="item__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="37" height="37" viewBox="0 0 37 37" fill="none">
                        <path d="M18.4983 2.98047C9.98368 2.98047 3.08163 9.81233 3.08163 18.2397C3.08163 20.4279 3.57495 22.6072 4.5277 24.6295C3.26353 31.0918 3.12944 31.6869 3.12944 31.6869C2.92285 32.7453 3.84166 33.6517 4.91312 33.4513C4.91312 33.4513 5.49742 33.3512 12.0911 32.1161C14.0814 33.0524 16.2876 33.4989 18.4983 33.4989C27.0129 33.4989 33.915 26.6671 33.915 18.2397C33.915 9.81233 27.0129 2.98047 18.4983 2.98047ZM18.4983 6.03231C25.3094 6.03231 30.8316 11.4977 30.8316 18.2397C30.8316 24.9817 25.3094 30.4471 18.4983 30.4471C16.5604 30.4471 14.6996 29.9966 13.0069 29.1595C12.7047 29.0106 12.3733 28.9544 12.0418 29.0165C6.5689 30.0419 7.00363 29.9807 6.55038 30.0656C6.6398 29.6115 6.5627 30.0828 7.61103 24.7249C7.67578 24.3931 7.61875 24.0252 7.46613 23.7236C6.60588 22.0363 6.16497 20.1739 6.16497 18.2397C6.16497 11.4977 11.6872 6.03231 18.4983 6.03231ZM14.1631 10.6101C12.717 10.6101 10.79 12.5175 10.79 13.948C10.79 15.7917 12.7171 19.1934 14.6441 21.1008C14.8523 21.306 15.3996 21.8493 15.6077 22.0545C17.5348 23.9619 20.9712 25.8693 22.8335 25.8693C24.2796 25.8693 26.2066 23.9619 26.2066 22.5313C26.2066 21.1008 24.2796 19.1934 22.8335 19.1934C22.3525 19.1934 20.6088 20.1799 20.4254 20.1471C18.8899 19.8727 16.8919 17.8472 16.5712 16.3323C16.5265 16.1208 17.5348 14.4249 17.5348 13.948C17.5348 12.5175 15.6077 10.6101 14.1631 10.6101Z" fill="white"/>
                    </svg>
                </div>

                <div class="item__content">
                    <a href="tel:<?php echo esc_attr(clinic_preg_replace_ony_number($phone)); ?>">
                        <?php esc_html_e('Hotline', 'clinic'); ?>: <?php echo esc_html($phone); ?>
                    </a>
                </div>
            </div>

            <div class="item">
                <div class="item__icon">
                    <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icon-calendar.png' ) ) ?>" width="33" height="33" alt="">
                </div>

                <div class="item__content">
                    <a href="<?php echo esc_url( $link_book['url'] ); ?>" target="<?php echo esc_attr($link_book['target']) ?>">
				        <?php esc_html_e('Đặt hẹn khám bệnh', 'clinic'); ?>
                    </a>
                </div>
            </div>

            <div class="item">
                <div class="item__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="29" viewBox="0 0 31 29" fill="none">
                        <path d="M15.5 0C6.93935 0 0 6.42661 0 14.3547C0 16.1806 0.406091 18.031 1.11444 19.6932L2.325 21.9799C3.09225 23.457 2.82256 24.8495 1.79181 26.5562C1.22296 27.5008 1.93285 28.6391 3.1 28.6649C4.67635 28.698 7.29585 28.2329 9.3 27.5438C11.1507 28.3348 13.4354 28.7094 15.5 28.7094C24.0606 28.7094 31 22.2828 31 14.3547C31 6.42661 24.0606 0 15.5 0ZM15.5 2.87094C22.3479 2.87094 27.9 8.01281 27.9 14.3547C27.9 20.6966 22.3479 25.8385 15.5 25.8385C13.7175 25.8385 11.4777 25.4136 10.075 24.7174C9.6596 24.5107 9.1512 24.4562 8.71875 24.627C7.72985 25.0189 6.73164 25.3131 5.57069 25.5241C6.03569 24.0155 5.89776 22.2886 5.08556 20.7254L3.92306 18.5262C3.40691 17.3032 3.1 15.8189 3.1 14.3547C3.1 8.01281 8.6521 2.87094 15.5 2.87094ZM9.3 12.9193C8.4444 12.9193 7.75 13.5623 7.75 14.3547C7.75 15.1471 8.4444 15.7902 9.3 15.7902C10.1556 15.7902 10.85 15.1471 10.85 14.3547C10.85 13.5623 10.1556 12.9193 9.3 12.9193ZM15.5 12.9193C14.6444 12.9193 13.95 13.5623 13.95 14.3547C13.95 15.1471 14.6444 15.7902 15.5 15.7902C16.3556 15.7902 17.05 15.1471 17.05 14.3547C17.05 13.5623 16.3556 12.9193 15.5 12.9193ZM21.7 12.9193C20.8444 12.9193 20.15 13.5623 20.15 14.3547C20.15 15.1471 20.8444 15.7902 21.7 15.7902C22.5556 15.7902 23.25 15.1471 23.25 14.3547C23.25 13.5623 22.5556 12.9193 21.7 12.9193Z" fill="white"/>
                    </svg>
                </div>

                <div class="item__content">
                    <a href="<?php echo esc_url( $link_chat['url'] ); ?>" target="<?php echo esc_attr($link_chat['target']) ?>">
				        <?php esc_html_e('chat với bác sĩ', 'clinic'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>