<?php

use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Clinic_Elementor_Specialist extends Widget_Base
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
		return 'clinic-specialist';
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
		return esc_html__('Specialist', 'clinic');
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
		return 'eicon-post-list';
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
		return ['specialist', 'category' ];
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
						'name' => 'list_category',
						'label' => esc_html__( 'Danh mục', 'textdomain' ),
						'type' => Controls_Manager::SELECT,
						'options' => clinic_check_get_cat('category')
					]
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

		// style content
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__('Style', 'clinic'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Title Color', 'clinic'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element-specialist__grid .item .item__title' => 'color: {{VALUE}};'
				],
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
		<div class="element-specialist">
			<?php if ( $settings['list'] ) : ?>
				<div class="element-specialist__grid">
					<?php
					foreach ( $settings['list'] as $item) :
						$category_link = get_category_link( $item['list_category'] );

						if ( $category_link ) :
					?>
					<div class="item">
						<a class="item__link" href="<?php echo esc_url( $category_link ); ?>"></a>

						<div class="item__image">
							<?php echo wp_get_attachment_image( $item['list_image']['id'], 'large' ); ?>
						</div>

						<h4 class="item__title">
							<?php echo esc_html( $item['list_title'] ) ?>
						</h4>
					</div>
					<?php
						endif;
					endforeach;
					?>
				</div>
			<?php endif; ?>
		</div>
		<?php
	}
}