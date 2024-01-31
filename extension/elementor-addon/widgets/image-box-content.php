<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Clinic_Elementor_Image_Box_Content extends Widget_Base
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
		return 'clinic-image-box-content';
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
		return esc_html__('Image Box Content', 'clinic');
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
		return 'eicon-image-box';
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
		return ['image', 'box', 'content' ];
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
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'heading',
			[
				'label'       => esc_html__( 'Heading', 'clinic' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Heading', 'clinic' ),
				'label_block' => true
			]
		);

        $this->add_control(
            'sub_heading',
            [
                'label'       => esc_html__( 'Sub Heading', 'clinic' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'Sub Heading', 'clinic' ),
                'label_block' => true
            ]
        );

		$this->add_control(
			'desc',
			[
				'label'     =>  esc_html__( 'Description', 'clinic' ),
				'type'      =>  Controls_Manager::WYSIWYG,
				'default'   =>  esc_html__( 'Default description', 'clinic' ),
			]
		);

		$this->end_controls_section();

        // Tab style heading
		$this->start_controls_section(
			'style_heading_section',
			[
				'label' => esc_html__( 'Heading', 'clinic' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_color',
			[
				'label'     =>  esc_html__( 'Color', 'clinic' ),
				'type'      =>  Controls_Manager::COLOR,
				'selectors' =>  [
					'{{WRAPPER}} .element-image-box-content__warp .item-content__heading' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .element-image-box-content__warp .item-content__heading',
            ]
        );

        $this->end_controls_section();

        // Tab style sub heading
        $this->start_controls_section(
            'style_sub_heading_section',
            [
                'label' => esc_html__( 'Sub Heading', 'clinic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sub_heading_color',
            [
                'label'     =>  esc_html__( 'Color', 'clinic' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-image-box-content__warp .item-content .sub-heading .txt' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_heading_typography',
                'selector' => '{{WRAPPER}} .element-image-box-content__warp .item-content .sub-heading .txt',
            ]
        );

        $this->add_control(
            'sub_heading_line_color',
            [
                'label'     =>  esc_html__( 'Color Line', 'clinic' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-image-box-content__warp .item-content .sub-heading .line' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        // Tab style desc
        $this->start_controls_section(
            'style_desc_section',
            [
                'label' => esc_html__( 'Desc', 'clinic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'desc_color',
			[
				'label'     =>  esc_html__( 'Color', 'clinic' ),
				'type'      =>  Controls_Manager::COLOR,
				'selectors' =>  [
					'{{WRAPPER}} .element-image-box-content__warp .item-content__desc' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typography',
                'selector' => '{{WRAPPER}} .element-image-box-content__warp .item-content__desc',
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
		<div class="element-image-box-content text-justify">
			<div class="element-image-box-content__warp">
				<div class="item item-image">
					<?php echo wp_get_attachment_image( $settings['image']['id'], 'large' ); ?>
				</div>

				<div class="item item-content">
					<h2 class="item-content__heading">
						<?php echo esc_html($settings['heading']) ?>
					</h2>

                    <div class="sub-heading">
                        <span class="line"></span>
                        <span class="txt"><?php echo esc_html($settings['sub_heading']) ?></span>
                        <span class="line"></span>
                    </div>

					<div class="item-content__desc">
						<?php echo wpautop($settings['desc']); ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}