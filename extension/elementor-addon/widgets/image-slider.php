<?php

use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Clinic_Elementor_Image_Slider extends Widget_Base {
    public function get_categories(): array {
        return array( 'my-theme' );
    }

    public function get_name(): string {
        return 'clinic-image-slider';
    }

    public function get_title(): string {
        return esc_html__( 'Image Slider', 'clinic' );
    }

    public function get_icon(): string {
        return 'eicon-slider-album';
    }

    protected function register_controls(): void {

        // Content testimonial
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Gallery', 'clinic' ),
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

    }

    protected function render(): void {
        $settings = $this->get_settings_for_display();
    ?>

        <div class="element-image-slider lSSlideCustom">
            <div class="element-image-slider__warp">
                <?php foreach ($settings['gallery'] as $image ) : ?>
                    <div class="item">
                        <?php echo wp_get_attachment_image( $image['id'], 'medium_large' ); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    <?php
    }
}