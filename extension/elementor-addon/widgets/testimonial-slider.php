<?php

use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Clinic_Elementor_Testimonial_Slider extends Widget_Base {
    public function get_categories(): array {
        return array( 'my-theme' );
    }

    public function get_name(): string {
        return 'clinic-testimonial-slider';
    }

    public function get_title(): string {
        return esc_html__( 'Testimonial Slider', 'clinic' );
    }

    public function get_icon(): string {
        return 'eicon-user-circle-o';
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

        $repeater = new Repeater();

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
            'list_title', [
                'label' => esc_html__( 'Name', 'clinic' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'B.H.A 22 tuổi' , 'clinic' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_info',
            [
                'label'         =>  esc_html__( 'Info', 'clinic' ),
                'type'          =>  Controls_Manager::TEXT,
                'default'       =>  esc_html__('Nhân viên kinh doanh'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_description',
            [
                'label' => esc_html__( 'Description', 'clinic' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'GEMs are robotics algorithm for modules that built & optimized for NVIDIA AGX Data should underlie every business decision. Data should underlie every business Yet too often some very down the certain routes.', 'clinic' ),
                'placeholder' => esc_html__( 'Type your description here', 'clinic' ),
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
                        'list_title' => esc_html__( 'Title #1', 'clinic' ),
                    ],
                    [
                        'list_title' => esc_html__( 'Title #2', 'clinic' ),
                    ],
                    [
                        'list_title' => esc_html__( 'Title #3', 'clinic' ),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );

        $this->end_controls_section();

        // Content additional options
        $this->start_controls_section(
            'additional_options_section',
            [
                'label' => esc_html__( 'Additional Options', 'basictheme' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'loop',
            [
                'type'          =>  Controls_Manager::SWITCHER,
                'label'         =>  esc_html__('Loop Slider?', 'basictheme'),
                'label_off'     =>  esc_html__('No', 'basictheme'),
                'label_on'      =>  esc_html__('Yes', 'basictheme'),
                'return_value'  =>  'yes',
                'default'       =>  'yes',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label'         =>  esc_html__('Autoplay?', 'basictheme'),
                'type'          =>  Controls_Manager::SWITCHER,
                'label_off'     =>  esc_html__('No', 'basictheme'),
                'label_on'      =>  esc_html__('Yes', 'basictheme'),
                'return_value'  =>  'yes',
                'default'       =>  'no',
            ]
        );

        $this->add_control(
            'nav',
            [
                'label'         =>  esc_html__('Nav Slider', 'basictheme'),
                'type'          =>  Controls_Manager::SWITCHER,
                'label_on'      =>  esc_html__('Yes', 'basictheme'),
                'label_off'     =>  esc_html__('No', 'basictheme'),
                'return_value'  =>  'yes',
                'default'       =>  'yes',
            ]
        );

        $this->add_control(
            'dots',
            [
                'label'         =>  esc_html__('Dots Slider', 'basictheme'),
                'type'          =>  Controls_Manager::SWITCHER,
                'label_on'      =>  esc_html__('Yes', 'basictheme'),
                'label_off'     =>  esc_html__('No', 'basictheme'),
                'return_value'  =>  'yes',
                'default'       =>  'yes',
            ]
        );

        $this->add_control(
            'margin_item',
            [
                'label'     =>  esc_html__( 'Space Between Item', 'basictheme' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  30,
                'min'       =>  0,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'min_width_1200',
            [
                'label'     =>  esc_html__( 'Min Width 1200px', 'basictheme' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'item',
            [
                'label'     =>  esc_html__( 'Number of Item', 'basictheme' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  3,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'min_width_992',
            [
                'label'     =>  esc_html__( 'Min Width 992px', 'basictheme' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'item_992',
            [
                'label'     =>  esc_html__( 'Number of Item', 'basictheme' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  2,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'min_width_768',
            [
                'label'     =>  esc_html__( 'Min Width 768px', 'basictheme' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'item_768',
            [
                'label'     =>  esc_html__( 'Number of Item', 'basictheme' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  2,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'min_width_568',
            [
                'label'     =>  esc_html__( 'Min Width 568px', 'basictheme' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'item_568',
            [
                'label'     =>  esc_html__( 'Number of Item', 'basictheme' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  2,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'margin_item_568',
            [
                'label'     =>  esc_html__( 'Space Between Item', 'basictheme' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  15,
                'min'       =>  0,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'max_width_567',
            [
                'label'     =>  esc_html__( 'Max Width 567px', 'basictheme' ),
                'type'      =>  Controls_Manager::HEADING,
                'separator' =>  'before',
            ]
        );

        $this->add_control(
            'item_567',
            [
                'label'     =>  esc_html__( 'Number of Item', 'basictheme' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  1,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'margin_item_567',
            [
                'label'     =>  esc_html__( 'Space Between Item', 'basictheme' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  0,
                'min'       =>  0,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->end_controls_section();

	    // tab style name
	    $this->start_controls_section(
		    'style_name',
		    [
			    'label' => esc_html__( 'Name', 'clinic' ),
			    'tab' => Controls_Manager::TAB_STYLE,
		    ]
	    );

	    $this->add_control(
		    'name_color',
		    [
			    'label'     =>  esc_html__( 'Color', 'clinic' ),
			    'type'      =>  Controls_Manager::COLOR,
			    'selectors' =>  [
				    '{{WRAPPER}} .element-testimonial-slider .item__warp .name' => 'color: {{VALUE}}',
			    ],
		    ]
	    );

	    $this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
			    'name' => 'name_typography',
			    'label' => esc_html__( 'Typography', 'clinic' ),
			    'selector' => '{{WRAPPER}} .element-testimonial-slider .item__warp .name',
		    ]
	    );

	    $this->end_controls_section();

        // tab style info
	    $this->start_controls_section(
		    'style_info',
		    [
			    'label' => esc_html__( 'Info', 'clinic' ),
			    'tab' => Controls_Manager::TAB_STYLE,
		    ]
	    );

	    $this->add_control(
		    'info_color',
		    [
			    'label'     =>  esc_html__( 'Color', 'clinic' ),
			    'type'      =>  Controls_Manager::COLOR,
			    'selectors' =>  [
				    '{{WRAPPER}} .element-testimonial-slider .item__warp .info' => 'color: {{VALUE}}',
			    ],
		    ]
	    );

	    $this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
			    'name' => 'info_typography',
			    'label' => esc_html__( 'Typography', 'clinic' ),
			    'selector' => '{{WRAPPER}} .element-testimonial-slider .item__warp .info',
		    ]
	    );

	    $this->end_controls_section();

        // tab style description
        $this->start_controls_section(
            'style_description',
            [
                'label' => esc_html__( 'Description', 'clinic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

	    $this->add_control(
		    'desc_color',
		    [
			    'label'     =>  esc_html__( 'Color', 'clinic' ),
			    'type'      =>  Controls_Manager::COLOR,
			    'selectors' =>  [
				    '{{WRAPPER}} .element-testimonial-slider .item__desc' => 'color: {{VALUE}}',
			    ],
		    ]
	    );

	    $this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
			    'name' => 'desc_typography',
			    'label' => esc_html__( 'Typography', 'clinic' ),
			    'selector' => '{{WRAPPER}} .element-testimonial-slider .item__desc',
		    ]
	    );

        $this->add_control(
            'desc_background_color',
            [
                'label'     =>  esc_html__( 'Background Color', 'clinic' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-testimonial-slider .item__desc' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .element-testimonial-slider .item__desc:after' => 'border-top-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render(): void {
        $settings = $this->get_settings_for_display();

        $data_owl_options = [
            'loop' => ('yes' === $settings['loop']),
            'nav' => ('yes' === $settings['nav']),
            'dots' => ('yes' === $settings['dots']),
            'margin' => $settings['margin_item'],
            'autoplay' => ('yes' === $settings['autoplay']),
            'responsive' => [
                '0' => array(
                    'items' => $settings['item_567'],
                    'margin' => $settings['margin_item_567']
                ),

                '576' => array(
                    'items' => $settings['item_568'],
                    'margin' => $settings['margin_item_568']
                ),

                '768' => array(
                    'items' => $settings['item_768']
                ),

                '992' => array(
                    'items' => $settings['item_992']
                ),

                '1200' => array(
                    'items' => $settings['item']
                ),
            ],
        ];
    ?>

        <div class="element-testimonial-slider">
            <div class="element-testimonial-slider__warp owl-carousel owl-theme custom-equal-height-owl" data-owl-options='<?php echo wp_json_encode( $data_owl_options ) ; ?>'>
                <?php
                foreach ( $settings['list'] as $item ) :
                    $imageId = $item['list_image']['id'];
                ?>

                    <div class="item elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
                        <div class="item__desc">
                            <?php echo esc_html( $item['list_description'] ) ?>
                        </div>

                        <div class="item__warp">
                            <div class="image">
		                        <?php
		                        if ( $imageId ) :
			                        echo wp_get_attachment_image( $item['list_image']['id'], 'full' );
		                        else:
                                ?>
                                    <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/user-avatar.png' ) ) ?>" alt="<?php echo esc_attr( $item['list_title'] ); ?>" />
		                        <?php endif; ?>
                            </div>

                            <div class="content text-start">
                                <h4 class="name">
                                    <?php echo esc_html( $item['list_title'] ); ?>
                                </h4>

                                <p class="info">
                                    <?php echo esc_html( $item['list_info'] ); ?>
                                </p>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>

    <?php
    }
}