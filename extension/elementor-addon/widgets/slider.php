<?php

use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Clinic_Elementor_Addon_Slider extends Widget_Base {
    public function get_categories(): array {
        return array( 'my-theme' );
    }

    public function get_name(): string {
        return 'clinic-slider';
    }

    public function get_title(): string {
        return esc_html__( 'Slider', 'clinic' );
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
        return ['slider', 'image' ];
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
            'list_title', [
                'label' => esc_html__( 'Title', 'clinic' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Slider #' , 'clinic' ),
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

        $this->add_control(
            'list',
            [
                'label' => esc_html__( 'List', 'clinic' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__( 'Slider #1', 'clinic' ),
                    ],
                    [
                        'list_title' => esc_html__( 'Slider #2', 'clinic' ),
                    ],
                    [
                        'list_title' => esc_html__( 'Slider #3', 'clinic' ),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );

        $this->end_controls_section();

    }

    protected function render(): void {
        $settings = $this->get_settings_for_display();
    ?>

        <div class="element-slider">
            <div class="element-slider__warp owl-carousel owl-theme">
                <?php
                foreach ( $settings['list'] as $item ) :
                    $imageId = $item['list_image']['id'];
                ?>

                    <div class="item elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
                        <figure class="image">
                            <?php echo wp_get_attachment_image( $imageId, 'full' ); ?>
                        </figure>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>

    <?php
    }
}