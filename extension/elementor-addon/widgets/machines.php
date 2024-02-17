<?php

use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Clinic_Elementor_Addon_Machines extends Widget_Base {
    public function get_categories(): array {
        return array( 'my-theme' );
    }

    public function get_name(): string {
        return 'clinic-machines';
    }

    public function get_title(): string {
        return esc_html__( 'Machines', 'clinic' );
    }

    public function get_icon(): string {
        return 'eicon-slider-device';
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
        return ['slider', 'machines' ];
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

        $this->add_control(
            'gallery',
            [
                'label' => esc_html__( 'Add Images', 'clinic' ),
                'type' => Controls_Manager::GALLERY,
                'show_label' => false,
                'default' => [],
            ]
        );

        $this->end_controls_section();

        // options
        $this->start_controls_section(
            'option_section',
            [
                'label' => esc_html__( 'Options', 'clinic' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'loop',
            [
                'type' => Controls_Manager::SWITCHER,
                'label' => esc_html__('Loop Slider?', 'clinic'),
                'label_off' => esc_html__('No', 'clinic'),
                'label_on' => esc_html__('Yes', 'clinic'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => esc_html__('Autoplay?', 'clinic'),
                'type' => Controls_Manager::SWITCHER,
                'label_off' => esc_html__('No', 'clinic'),
                'label_on' => esc_html__('Yes', 'clinic'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'show_nav',
            [
                'label' => esc_html__( 'Show Nav', 'clinic' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'clinic' ),
                'label_off' => esc_html__( 'Hide', 'clinic' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_arrow',
            [
                'label' => esc_html__( 'Show Arrow', 'clinic' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'clinic' ),
                'label_off' => esc_html__( 'Hide', 'clinic' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'margin_item',
            [
                'label'   => esc_html__( 'Space Between Item', 'clinic' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 20,
                'min'     => 0,
                'max'     => 100,
                'step'    => 1,
            ]
        );

        $this->add_control(
            'min_width_1200',
            [
                'label'     => esc_html__( 'Min Width 1200px', 'clinic' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'min_width_1200_items',
            [
                'label'   => esc_html__( 'Number of Item', 'clinic' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 3,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );

        $this->add_control(
            'min_width_992',
            [
                'label'     => esc_html__( 'Min Width 992px', 'clinic' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'min_width_992_items',
            [
                'label'   => esc_html__( 'Number of Item', 'clinic' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 2,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );

        $this->add_control(
            'min_width_768',
            [
                'label'     => esc_html__( 'Min Width 768px', 'clinic' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'min_width_768_items',
            [
                'label'   => esc_html__( 'Number of Item', 'clinic' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 2,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );

        $this->add_control(
            'min_width_768_space',
            [
                'label'   => esc_html__( 'Space Between Item', 'clinic' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 12,
                'min'     => 0,
                'max'     => 100,
                'step'    => 1,
            ]
        );

        $this->add_control(
            'min_width_576',
            [
                'label'     => esc_html__( 'Min Width 568px', 'clinic' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'min_width_576_items',
            [
                'label'   => esc_html__( 'Number of Item', 'clinic' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 2,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );

        $this->add_control(
            'min_width_576_space',
            [
                'label'   => esc_html__( 'Space Between Item', 'clinic' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 12,
                'min'     => 0,
                'max'     => 100,
                'step'    => 1,
            ]
        );

        $this->add_control(
            'max_width_575',
            [
                'label'     => esc_html__( 'Max Width 567px', 'clinic' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'max_width_575_items',
            [
                'label'   => esc_html__( 'Number of Item', 'clinic' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 1,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );

        $this->add_control(
            'max_width_575_space',
            [
                'label'   => esc_html__( 'Space Between Item', 'clinic' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 0,
                'min'     => 0,
                'max'     => 100,
                'step'    => 1,
            ]
        );

        $this->end_controls_section();

    }

    protected function render(): void {
        $settings = $this->get_settings_for_display();
        $owl_options = [
            'items' => 1,
            'loop' => ('yes' === $settings['loop']),
            'autoplay' => ('yes' === $settings['autoplay']),
            'nav' => ('yes' === $settings['show_nav']),
            'dots' => ('yes' === $settings['show_arrow']),
            'margin' => $settings['margin_item'],
            'responsive' => [
                '0' => array(
                    'items'  => $settings['max_width_575_items'],
                    'margin' => $settings['max_width_575_space']
                ),
                '576' => array(
                    'items'  => $settings['min_width_576_items'],
                    'margin' => $settings['min_width_576_space']
                ),
                '768' => array(
                    'items' => $settings['min_width_768_items'],
                    'margin' => $settings['min_width_768_space']
                ),
                '992' => array(
                    'items' => $settings['min_width_992_items']
                ),
                '1200' => array(
                    'items' => $settings['min_width_1200_items']
                ),
            ],
        ];
        ?>

        <div class="element-slider-machines">
            <div class="element-slider-machines__warp owl-carousel owl-theme" data-owl-options='<?php echo wp_json_encode( $owl_options ); ?>'>
                <?php foreach ( $settings['gallery'] as $item ) :?>
                    <div class="item">
                        <figure class="image">
                            <?php echo wp_get_attachment_image( $item['id'], 'full' ); ?>
                        </figure>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <?php
    }
}