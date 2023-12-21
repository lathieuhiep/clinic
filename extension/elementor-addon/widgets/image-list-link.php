<?php

use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Clinic_Elementor_Image_List_Link extends Widget_Base
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
		return 'clinic-image-list-link';
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
		return esc_html__('Image List Link', 'clinic');
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
		return ['image', 'list', 'link' ];
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
				'label' => esc_html__( 'Danh sách', 'clinic' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'list_title',
						'label' => esc_html__( 'Title', 'clinic' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( 'List Title' , 'clinic' ),
						'label_block' => true,
					],
					[
						'name' => 'list_image',
						'label' => esc_html__( 'Image', 'clinic' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					],
					[
						'name' => 'list_link',
						'label' => esc_html__( 'Link', 'clinic' ),
						'type' => Controls_Manager::URL,
						'options' => [ 'url', 'is_external', 'nofollow' ],
						'default' => [
							'url' => '',
							'is_external' => true,
							'nofollow' => true,
						],
						'label_block' => true,
					]
				],
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'clinic' ),
					],
					[
						'list_title' => esc_html__( 'Title #2', 'clinic' ),
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
		<div class="element-image-list-link">
			<div class="element-image-list-link__grid">
				<?php
                foreach ( $settings['list'] as $index => $item ) :
	                $image_id = $item['list_image']['id'];
	                $url = $item['list_link']['url'];
				?>
					<div class="item elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
						<?php
						echo wp_get_attachment_image( $image_id, 'full' );

						if ( $url ) :
							$link_key = 'link_' . $index;
							$this->add_link_attributes( $link_key, $item['list_link'] );
						?>

                            <a class="item__link" <?php echo $this->get_render_attribute_string( $link_key ); ?>></a>

						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php
	}
}