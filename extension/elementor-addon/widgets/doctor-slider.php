<?php

use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Clinic_Elementor_Doctor_Slider extends Widget_Base {

    public function get_categories(): array {
        return array( 'my-theme' );
    }

    public function get_name(): string {
        return 'clinic-doctor-slider';
    }

    public function get_title(): string {
        return esc_html__( 'Doctor Slider', 'clinic' );
    }

    public function get_icon(): string {
        return 'eicon-slider-push';
    }

    protected function register_controls(): void {

        // Content section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'clinic' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'list_title', [
                'label' => esc_html__( 'Title', 'clinic' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'List Title' , 'clinic' ),
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
            'list_position', [
                'label' => esc_html__( 'Chứ vụ', 'clinic' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Cố vấn chuyên môn' , 'clinic' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_content', [
                'label' => esc_html__( 'Content', 'clinic' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'List Content' , 'clinic' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__( 'Danh sách bác sĩ', 'clinic' ),
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

        // Content section
        $this->start_controls_section(
            'action_section',
            [
                'label' => esc_html__( 'Action', 'clinic' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'website_link',
            [
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
        );

        $this->end_controls_section();
    }

    protected function render(): void {
        $settings = $this->get_settings_for_display();

        if ( ! empty( $settings['website_link']['url'] ) ) {
            $this->add_link_attributes( 'website_link', $settings['website_link'] );
        }
    ?>
        <div class="element-doctor-slider">
            <div class="element-doctor-slider__warp owl-carousel owl-theme">
                <?php foreach ( $settings['list'] as $item ) : ?>
                    <div class="item">
                        <div class="item__thumbnail">
                            <div class="image-box m-auto">
                                <?php echo wp_get_attachment_image( $item['list_image']['id'], 'medium_large' ); ?>
                            </div>
                        </div>

                        <div class="item__content">
                            <p class="position text-center text-uppercase">
                                <?php echo esc_html( $item['list_position'] ); ?>
                            </p>

                            <h3 class="title text-center text-uppercase">
                                <?php echo esc_html( $item['list_title'] ); ?>
                            </h3>

                            <div class="desc text-center">
                                <?php echo wpautop( $item['list_content'] ); ?>
                            </div>

                            <div class="action-box text-center">
                                <a class="btn-booking text-center text-uppercase" href="#" data-bs-toggle="modal" data-bs-target="#modal-appointment-form">
                                    <?php esc_html_e('ĐĂNG KÝ KHÁM', 'clinic'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}