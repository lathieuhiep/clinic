<?php
$show = clinic_get_option('opt_general_popup_show');
$cf7 = clinic_get_option('opt_general_popup_cf');
$time = clinic_get_option('opt_general_popup_time');

if ( $show == 1 && !empty( $cf7 ) ) :
?>

<div class="popup-modal-contact modal fade" id="popup-modal-contact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-time="<?php echo esc_attr( $time ); ?>">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
                <div class="info d-lg-none">
                    <div class="avatar">
                        <div class="thumbnail">
                            <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/avatar-bs-trong.png' ) ) ?>" alt="">
                        </div>
                    </div>

                    <div class="content">
                        <h4 class="name text-start text-uppercase">
                            <?php esc_html_e('Bác sĩ', 'clinic'); ?> <span><?php esc_html_e('Cao Xuân Trọng', 'clinic'); ?></span>
                        </h4>

                        <p class="position text-start text-uppercase">
                            <?php esc_html_e('Nguyên PGĐ bệnh viên giao thông vận tải Đà Nẵng', 'clinic'); ?>
                        </p>
                    </div>
                </div>

				<button type="button" class="btn-close-modal border-0 p-0" data-bs-dismiss="modal" aria-label="Close">
                    <i class="icon-close"></i>
                </button>
			</div>

			<div class="modal-body">
                <div class="modal-body__warp">
                    <h2 class="title text-uppercase">
		                <?php esc_html_e( 'Vấn đề bạn đang gặp là ?', 'clinic' ); ?>
                    </h2>

	                <?php echo do_shortcode('[contact-form-7 id="' . $cf7 . '" ]'); ?>
                </div>
			</div>
		</div>
	</div>
</div>

<?php
endif;
