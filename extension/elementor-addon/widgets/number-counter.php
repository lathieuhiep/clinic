<?php

use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Clinic_Elementor_Number_Counter extends Widget_Base {
    public function get_categories(): array {
        return array( 'my-theme' );
    }

    public function get_name(): string {
        return 'clinic-number-counter';
    }

    public function get_title(): string {
        return esc_html__( 'Number Counter', 'clinic' );
    }

    public function get_icon(): string {
        return 'eicon-number-field';
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
                'label' => esc_html__( 'Title', 'clinic' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'ĐANG ONLINE' , 'clinic' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_number',
            [
                'label' => esc_html__( 'Number', 'textdomain' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'step' => 1,
                'default' => 1532,
                'label_block' => true
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
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );

        $this->end_controls_section();

        // tab style name
        $this->start_controls_section(
            'style_title',
            [
                'label' => esc_html__( 'Title', 'clinic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     =>  esc_html__( 'Color', 'clinic' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-number-counter__warp .item .content__title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Typography', 'clinic' ),
                'selector' => '{{WRAPPER}} .element-number-counter__warp .item .content__title',
            ]
        );

        $this->end_controls_section();

        // tab style number
        $this->start_controls_section(
            'style_number',
            [
                'label' => esc_html__( 'Number', 'clinic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'number_color',
            [
                'label'     =>  esc_html__( 'Color', 'clinic' ),
                'type'      =>  Controls_Manager::COLOR,
                'selectors' =>  [
                    '{{WRAPPER}} .element-number-counter__warp .item .content__left' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'number_typography',
                'label' => esc_html__( 'Typography', 'clinic' ),
                'selector' => '{{WRAPPER}} .element-number-counter__warp .item .content__left',
            ]
        );

        $this->end_controls_section();
    }

    protected function render(): void {
        $settings = $this->get_settings_for_display();
        ?>

        <div class="element-number-counter">
            <div class="element-number-counter__warp">
                <?php
                foreach ( $settings['list'] as $item ) :
                    $imageId = $item['list_image']['id'];
                ?>

                    <div class="item elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
                        <div class="image">
                            <?php echo wp_get_attachment_image( $imageId, 'medium_large' ); ?>
                        </div>

                        <div class="content">
                            <h4 class="content__left">
                                <span class="number" data-number="<?php echo esc_attr( $item['list_number'] ); ?>"></span>
                                <span class="plus">+</span>
                            </h4>

                            <strong class="content__title">
                                <?php echo esc_html( $item['list_title'] ) ?>
                            </strong>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>

        <?php
    }
}