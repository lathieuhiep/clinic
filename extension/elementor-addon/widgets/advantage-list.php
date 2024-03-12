<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Clinic_Elementor_Advantage_List extends Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name(): string
	{
		return 'clinic-advantage-list';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title(): string
	{
		return esc_html__('Ưu điểm', 'clinic');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon(): string {
		return 'eicon-text';
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
		return ['image', 'text', 'list'];
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories(): array
	{
		return ['my-theme'];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @access protected
	 */
	protected function register_controls(): void
	{
		// image
		$this->start_controls_section(
			'image_section',
			[
				'label' => esc_html__( 'Image', 'clinic' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Image', 'textdomain' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();

		// list
		$this->start_controls_section(
			'list_section',
			[
				'label' => esc_html__( 'Danh sách', 'clinic' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => esc_html__( 'Tiêu đề', 'clinic' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Tiêu đề' , 'clinic' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_image', [
				'label' => esc_html__( 'Image', 'clinic' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'list_content', [
				'label' => esc_html__( 'Nội dung', 'clinic' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Nội dung' , 'clinic' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'List', 'clinic' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Tiêu đề #1', 'clinic' ),
					],
					[
						'list_title' => __( 'Tiêu đề #2', 'clinic' ),
					],
					[
						'list_title' => __( 'Tiêu đề #3', 'clinic' ),
					],
					[
						'list_title' => __( 'Tiêu đề #4', 'clinic' ),
					],
					[
						'list_title' => __( 'Tiêu đề #5', 'clinic' ),
					],
					[
						'list_title' => __( 'Tiêu đề #6', 'clinic' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render(): void
	{
		$settings = $this->get_settings_for_display();
		$medical_appointment_form = clinic_get_opt_medical_appointment();
		$link_chat = clinic_get_opt_link_chat_doctor();
		$list = $settings['list'];

		$listFirst = $listLast = [];
		if ( !empty( $list ) ) {
			$size = ceil(count($list) / 2);
			$listChuck = array_chunk($list, $size, true);

			$listFirst = $listChuck[0];
			$listLast = $listChuck[1] ?? [];
		}
		?>
		<div class="element-advantage-list">
			<div class="element-advantage-list__warp">
				<?php $this->listContent($listFirst, 'item-left'); ?>

				<div class="item item-thumbnail">
					<?php echo wp_get_attachment_image( $settings['image']['id'], 'large' ); ?>

					<div class="action-box">
						<?php if ( $link_chat ) : ?>
							<a class="btn-link" href="<?php echo esc_url( $link_chat ); ?>" target="_blank">
								<?php esc_html_e('TƯ VẤN ONLINE', 'clinic'); ?>
							</a>
						<?php endif; ?>

						<?php if ( $medical_appointment_form ) : ?>
							<a class="btn-booking" href="#" data-bs-toggle="modal" data-bs-target="#modal-appointment-form">
								<?php esc_html_e('ĐẶT LỊCH HẸN', 'clinic'); ?>
							</a>
						<?php endif; ?>
					</div>
				</div>

				<?php $this->listContent($listLast, 'item-right'); ?>
			</div>
		</div>
		<?php
	}

	protected function listContent($list, $class): void {
		?>
		<div class="item item-group <?php echo esc_attr( $class ); ?>">
			<?php
			if ( $list ) :
				foreach ( $list as $item):
					?>
					<div class="repeater-item text-end-lg elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
						<div class="thumbnail">
							<?php echo wp_get_attachment_image( $item['list_image']['id'], 'full' ); ?>
						</div>

						<div class="content-box text-justify">
							<?php echo wpautop( $item['list_content'] ); ?>
						</div>
					</div>
				<?php
				endforeach;
			endif;
			?>
		</div>
		<?php
	}
}