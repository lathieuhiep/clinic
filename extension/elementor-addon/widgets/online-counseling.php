<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Clinic_Elementor_Online_Counseling extends Widget_Base {
	public function get_categories(): array {
		return array( 'my-theme' );
	}

	public function get_name(): string {
		return 'clinic-online-counseling';
	}

	public function get_title(): string {
		return esc_html__( 'Tư vấn trực tuyến', 'clinic' );
	}

	public function get_icon(): string {
		return 'eicon-mail';
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the oEmbed widget belongs to.
	 *
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords(): array
	{
		return ['mail' ];
	}

	protected function register_controls(): void {

		// Content testimonial
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'clinic' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'more_options',
			[
				'label' => esc_html__( 'Sử dụng form tư vấn của trang single post', 'clinic' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->end_controls_section();
	}

	protected function render(): void {
		$settings = $this->get_settings_for_display();

		$phone     = clinic_get_opt_hotline();
		$link_chat = clinic_get_opt_link_chat_doctor();
		$contact_form = clinic_get_option( 'opt_post_single_contact_form' );
	?>

		<div class="element-online-counseling">
			<div class="element-online-counseling__warp">
				<div class="grid">
					<div class="grid__item">
						<h4 class="title title-support text-uppercase text-center">
							<?php esc_html_e('Tư vấn trực tuyến', 'clinic'); ?>
						</h4>

						<div class="list-support">
							<div class="list-support__item">
								<div class="thumbnail">
									<img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icon-phone.png' ) ) ?>" alt="" width="65" height="64">
								</div>

								<a class="link-phone" href="tel:<?php echo esc_attr(clinic_preg_replace_ony_number($phone)); ?>">
									<?php echo esc_html($phone); ?>
								</a>
							</div>

							<div class="list-support__item">
								<div class="thumbnail">
									<img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icon-chat.png' ) ) ?>" alt="" width="66" height="60">
								</div>

								<a class="link-chat" href="<?php echo esc_url( $link_chat ); ?>" target="_blank">
									<?php esc_html_e('Chat với bác sĩ', 'clinic'); ?>
								</a>
							</div>
						</div>
					</div>

					<div class="grid__item">
						<div class="box-form">
							<h4 class="title title-form text-uppercase text-center">
								<?php esc_html_e('Đăng ký khám', 'clinic'); ?>
							</h4>

							<?php
							if ( $contact_form ) :
								echo do_shortcode('[contact-form-7 id="' . $contact_form . '" ]');
							endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
	}
}