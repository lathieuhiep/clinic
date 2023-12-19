<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class clinic_Elementor_Addon_Contact_Form_7 extends Widget_Base {

	public function get_categories() {
		return array( 'my-theme' );
	}

	public function get_name() {
		return 'clinic-contact-form-7';
	}

	public function get_title() {
		return esc_html__( 'Contact Form 7', 'clinic' );
	}

	public function get_icon() {
		return 'eicon-form-horizontal';
	}

	protected function register_controls() {

		// Content section
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Contact Form', 'clinic' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'contact_form_list',
			[
				'label' => esc_html__('Select Form', 'clinic'),
				'type' => Controls_Manager::SELECT,
				'label_block' => true,
				'options' => clinic_get_form_cf7(),
				'default' => '0',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( !empty( $settings['contact_form_list'] ) ) :
	?>

		<div class="element-contact-form-7">
			<?php echo do_shortcode('[contact-form-7 id="' . $settings['contact_form_list'] . '" ]'); ?>
		</div>

	<?php
		endif;
	}

}