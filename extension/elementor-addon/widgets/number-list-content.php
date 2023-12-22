<?php

use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Clinic_Elementor_Number_List_Content extends Widget_Base
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
		return 'clinic-number-list-content';
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
		return esc_html__('Number List Content', 'clinic');
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
		return 'eicon-editor-list-ol';
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
		return ['image', 'list', 'content', 'number' ];
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
						'name' => 'list_content',
						'label' => esc_html__( 'Content', 'clinic' ),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__( 'List Content' , 'clinic' ),
						'label_block' => true,
					],
					[
						'name' => 'list_background_color',
						'label' => esc_html__( 'Background Color Number', 'clinic' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} {{CURRENT_ITEM}}.item' => 'border-color: {{VALUE}};',
							'{{WRAPPER}} {{CURRENT_ITEM}} .item__number' => 'background-color: {{VALUE}};',
						],
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
		<div class="element-number-list-content text-justify">
			<div class="element-number-list-content__grid">
				<?php
                $sttNumber = 1;
                foreach ( $settings['list'] as $item ) :
				?>
					<div class="item elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
						<div class="item__number d-flex align-items-center justify-content-center">
							<?php echo esc_html( $this->addZeroBeforeNumber($sttNumber) ); ?>
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
				<?php
	                $sttNumber++;
                endforeach;
                ?>
			</div>
		</div>
		<?php
	}

    protected function addZeroBeforeNumber(int $number): int|string {
	    if ( $number < 10 ) {
            return '0' . $number;
	    }

        return $number;
    }
}