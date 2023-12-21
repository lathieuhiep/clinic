<?php

use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Clinic_Elementor_Image_Box_Content_List extends Widget_Base
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
		return 'clinic-image-box-content-list';
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
		return esc_html__('Image Box Content List', 'clinic');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-gallery-grid';
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
		return ['image', 'list', 'box', 'content' ];
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
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'clinic' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Danh sách', 'textdomain' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'list_title',
						'label' => esc_html__( 'Title', 'textdomain' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( 'List Title' , 'textdomain' ),
						'label_block' => true,
					],
					[
						'name' => 'list_image',
						'label' => esc_html__( 'Image', 'textdomain' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					],
					[
						'name' => 'list_content',
						'label' => esc_html__( 'Content', 'textdomain' ),
						'type' => Controls_Manager::WYSIWYG,
						'default' => esc_html__( 'List Content' , 'textdomain' ),
						'label_block' => true,
					],
				],
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'textdomain' ),
					],
					[
						'list_title' => esc_html__( 'Title #2', 'textdomain' ),
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
		?>
		<div class="element-image-box-content-list text-justify">
			<div class="element-image-box-content-list__grid">
				<?php foreach ( $settings['list'] as $item ) : ?>
					<div class="item elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
						<div class="item__thumbnail">
							<?php echo wp_get_attachment_image( $item['list_image']['id'], 'large' ); ?>
						</div>

						<div class="item__content">
							<h3 class="title f-family-body">
								<?php echo esc_html( $item['list_title'] ); ?>
							</h3>

							<div class="desc fs-16 color-white">
								<?php echo wpautop( $item['list_content'] ); ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php
	}
}