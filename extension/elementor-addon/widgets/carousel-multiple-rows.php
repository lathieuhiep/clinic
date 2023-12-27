<?php

use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Clinic_Elementor_Carousel_Multiple_Rows extends Widget_Base {

	public function get_categories(): array {
		return array( 'my-theme' );
	}

	public function get_name(): string {
		return 'clinic-carousel-multiple-rows';
	}

	public function get_title(): string {
		return esc_html__( 'Carousel Multiple Rows', 'clinic' );
	}

	public function get_icon(): string {
		return 'eicon-slider-album';
	}

	public function get_keywords(): array
	{
		return ['image', 'list', 'content', 'rows' ];
	}

	protected function _register_controls(): void {

		// Section carousel images
		$this->start_controls_section(
			'section_carousel_images',
			[
				'label' => __( 'Carousel Multiple Rows', 'clinic' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => esc_html__( 'Title', 'clinic' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title #1' , 'clinic' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_image',
			[
				'label' => esc_html__( 'Choose Image', 'clinic' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'list_content',
			[
				'label' => esc_html__( 'Content', 'clinic' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'List Content' , 'clinic' ),
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
						'list_title' => __( 'Title #1', 'clinic' ),
					],
					[
						'list_title' => __( 'Title #2', 'clinic' ),
					],
                    [
                        'list_title' => __( 'Title #3', 'clinic' ),
                    ],
                    [
                        'list_title' => __( 'Title #4', 'clinic' ),
                    ],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();

		// Content additional options
		$this->start_controls_section(
			'content_additional_options',
			[
				'label' => __( 'Options', 'clinic' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'loop',
			[
				'type'          =>  Controls_Manager::SWITCHER,
				'label'         =>  esc_html__('Loop Slider ?', 'clinic'),
				'label_off'     =>  esc_html__('No', 'clinic'),
				'label_on'      =>  esc_html__('Yes', 'clinic'),
				'return_value'  =>  'yes',
				'default'       =>  'yes',
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label'         =>  esc_html__('Autoplay?', 'clinic'),
				'type'          =>  Controls_Manager::SWITCHER,
				'label_off'     =>  esc_html__('No', 'clinic'),
				'label_on'      =>  esc_html__('Yes', 'clinic'),
				'return_value'  =>  'yes',
				'default'       =>  'no',
			]
		);

		$this->add_control(
			'nav',
			[
				'label'         =>  esc_html__('Nav Slider', 'clinic'),
				'type'          =>  Controls_Manager::SWITCHER,
				'label_on'      =>  esc_html__('Yes', 'clinic'),
				'label_off'     =>  esc_html__('No', 'clinic'),
				'return_value'  =>  'yes',
				'default'       =>  'yes',
			]
		);

		$this->add_control(
			'dots',
			[
				'label'         =>  esc_html__('Dots Slider', 'clinic'),
				'type'          =>  Controls_Manager::SWITCHER,
				'label_on'      =>  esc_html__('Yes', 'clinic'),
				'label_off'     =>  esc_html__('No', 'clinic'),
				'return_value'  =>  'yes',
				'default'       =>  'yes',
			]
		);

		$this->end_controls_section();

		// Content additional options
		$this->start_controls_section(
			'content_additional_options',
			[
				'label' => esc_html__( 'Additional Options', 'clinic' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'loop',
			[
				'type'         => Controls_Manager::SWITCHER,
				'label'        => esc_html__( 'Loop Slider ?', 'clinic' ),
				'label_off'    => esc_html__( 'No', 'clinic' ),
				'label_on'     => esc_html__( 'Yes', 'clinic' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label'        => esc_html__( 'Autoplay?', 'clinic' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_off'    => esc_html__( 'No', 'clinic' ),
				'label_on'     => esc_html__( 'Yes', 'clinic' ),
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);

		$this->add_control(
			'nav',
			[
				'label'        => esc_html__( 'Nav Slider', 'clinic' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'clinic' ),
				'label_off'    => esc_html__( 'No', 'clinic' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'dots',
			[
				'label'        => esc_html__( 'Dots Slider', 'clinic' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'clinic' ),
				'label_off'    => esc_html__( 'No', 'clinic' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->end_controls_section();

		// Section title style
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Title', 'clinic' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'clinic' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element-carousel-multiple-rows .col-box .item__content .title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .element-carousel-multiple-rows .col-box .item__content .title',
			]
		);

		$this->end_controls_section();

		// Section content style
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => __( 'Content', 'clinic' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'clinic' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element-carousel-multiple-rows .col-box .item__content .desc' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .element-carousel-multiple-rows .col-box .item__content .desc',
			]
		);

		$this->end_controls_section();

		// Section style
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'clinic' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'dots_color',
			[
				'label' => esc_html__( 'Dots Color', 'clinic' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element-carousel-multiple-rows .owl-carousel .owl-dots .owl-dot span' => 'background-color: {{VALUE}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'dots',
							'value' => 'yes',
						],
					],
				],
			]
		);

		$this->add_control(
			'dots_color_hover',
			[
				'label' => esc_html__( 'Dots Color Hover', 'clinic' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .element-carousel-multiple-rows .owl-carousel .owl-dots .owl-dot.active span, {{WRAPPER}} .element-carousel-multiple-rows .owl-carousel .owl-dots .owl-dot:hover span' => 'background-color: {{VALUE}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => 'dots',
							'value' => 'yes',
						],
					],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$data_settings_owl = [
			'loop'     => ( 'yes' === $settings['loop'] ),
			'nav'      => ( 'yes' === $settings['nav'] ),
			'dots'     => ( 'yes' === $settings['dots'] ),
			'autoplay' => ( 'yes' === $settings['autoplay'] ),
			'items'    => 1
		];
		?>

        <div class="element-carousel-multiple-rows">
            <div class="custom-owl-carousel owl-carousel owl-theme" data-settings-owl='<?php echo wp_json_encode( $data_settings_owl ) ; ?>'>
				<?php
                $i = 1;
				$totalList = count($settings['list']);
				$rows = 2;

                foreach ( $settings['list'] as $item ) :
					$image_id = $item['list_image']['id'];

                    if ( $i == 1 || $i % $rows == 1 ) :
                ?>
                    <div class="col-box">
                <?php endif; ?>

                    <div class="item elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
                        <div class="item__content">
                            <h3 class="title">
                                <?php echo esc_html($item['list_title']); ?>
                            </h3>

                            <div class="desc text-justify">
	                            <?php echo wpautop($item['list_content']); ?>
                            </div>
                        </div>

                        <div class="item__thumbnail">
                            <?php echo wp_get_attachment_image( $image_id, 'full' ); ?>
                        </div>
                    </div>

                <?php if ( $i == $totalList ||  $i % $rows == 0 ) : ?>
                    </div>
				<?php
				    endif;

	                $i++;
				endforeach;
                ?>
            </div>
        </div>

		<?php
	}
}