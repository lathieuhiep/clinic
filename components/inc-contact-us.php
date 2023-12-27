<?php
$phone = clinic_get_option('opt_general_hotline_mobile');
$medical_appointment_form = clinic_get_option('opt_general_medical_appointment_form');
$link_chat = clinic_get_option('opt_general_chat_doctor');
?>

<div class="contact-us-group">
    <div class="container-md">
        <div class="grid-layout text-uppercase">
	        <?php if ( $phone ) : ?>

            <div class="item phone">
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

	        <?php
            endif;

            if ( $medical_appointment_form ) :
            ?>

            <div class="item booking">
                <div class="item__icon">
                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="33" height="32" fill="url(#icon-calendar)"/>
                        <defs>
                            <pattern id="icon-calendar" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_186_71" transform="matrix(0.025641 0 0 0.0264423 0 -0.00240385)"/>
                            </pattern>
                            <image id="image0_186_71" width="39" height="38" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACcAAAAmCAYAAABH/4KQAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFyGlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDggNzkuMTY0MDM2LCAyMDE5LzA4LzEzLTAxOjA2OjU3ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdEV2dD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlRXZlbnQjIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgMjEuMCAoV2luZG93cykiIHhtcDpDcmVhdGVEYXRlPSIyMDIzLTEyLTExVDE2OjM2OjE0KzA3OjAwIiB4bXA6TWV0YWRhdGFEYXRlPSIyMDIzLTEyLTExVDE2OjM2OjE0KzA3OjAwIiB4bXA6TW9kaWZ5RGF0ZT0iMjAyMy0xMi0xMVQxNjozNjoxNCswNzowMCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpiYzkxY2IwNC1kZDkwLTZmNDItOGNhMC1jZTVhZWVjNjY0NmEiIHhtcE1NOkRvY3VtZW50SUQ9ImFkb2JlOmRvY2lkOnBob3Rvc2hvcDozOTk3ZDNkNC02MTk0LTRjNGUtYWJjMC1i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"/>
                        </defs>
                    </svg>
                </div>

                <div class="item__content">
                    <!-- Button trigger modal -->
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
					    <?php esc_html_e('Hẹn Khám', 'clinic'); ?>
                    </a>
                </div>
            </div>

            <?php
            endif;

	        if ( $link_chat && $link_chat['url'] ) :
            ?>

            <div class="item chat">
                <div class="item__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="29" viewBox="0 0 31 29" fill="none">
                        <path d="M15.5 0C6.93935 0 0 6.42661 0 14.3547C0 16.1806 0.406091 18.031 1.11444 19.6932L2.325 21.9799C3.09225 23.457 2.82256 24.8495 1.79181 26.5562C1.22296 27.5008 1.93285 28.6391 3.1 28.6649C4.67635 28.698 7.29585 28.2329 9.3 27.5438C11.1507 28.3348 13.4354 28.7094 15.5 28.7094C24.0606 28.7094 31 22.2828 31 14.3547C31 6.42661 24.0606 0 15.5 0ZM15.5 2.87094C22.3479 2.87094 27.9 8.01281 27.9 14.3547C27.9 20.6966 22.3479 25.8385 15.5 25.8385C13.7175 25.8385 11.4777 25.4136 10.075 24.7174C9.6596 24.5107 9.1512 24.4562 8.71875 24.627C7.72985 25.0189 6.73164 25.3131 5.57069 25.5241C6.03569 24.0155 5.89776 22.2886 5.08556 20.7254L3.92306 18.5262C3.40691 17.3032 3.1 15.8189 3.1 14.3547C3.1 8.01281 8.6521 2.87094 15.5 2.87094ZM9.3 12.9193C8.4444 12.9193 7.75 13.5623 7.75 14.3547C7.75 15.1471 8.4444 15.7902 9.3 15.7902C10.1556 15.7902 10.85 15.1471 10.85 14.3547C10.85 13.5623 10.1556 12.9193 9.3 12.9193ZM15.5 12.9193C14.6444 12.9193 13.95 13.5623 13.95 14.3547C13.95 15.1471 14.6444 15.7902 15.5 15.7902C16.3556 15.7902 17.05 15.1471 17.05 14.3547C17.05 13.5623 16.3556 12.9193 15.5 12.9193ZM21.7 12.9193C20.8444 12.9193 20.15 13.5623 20.15 14.3547C20.15 15.1471 20.8444 15.7902 21.7 15.7902C22.5556 15.7902 23.25 15.1471 23.25 14.3547C23.25 13.5623 22.5556 12.9193 21.7 12.9193Z" fill="white"/>
                    </svg>
                </div>

                <div class="item__content">
                    <a href="<?php echo esc_url( $link_chat['url'] ); ?>" target="<?php echo esc_attr($link_chat['target']) ?>">
					    <?php esc_html_e('Gặp Bác Sĩ', 'clinic'); ?>
                    </a>
                </div>
            </div>

            <?php endif; ?>
        </div>
    </div>
</div>

<?php if ( $medical_appointment_form ) : ?>

<!-- Modal medical appointment -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">
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