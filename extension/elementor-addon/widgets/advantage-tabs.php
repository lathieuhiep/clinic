<?php

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Clinic_Elementor_Advantage_Tabs extends Widget_Base
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
        return 'clinic-advantage-tabs';
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
        return esc_html__('Tab Ưu điểm', 'clinic');
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
        return 'eicon-tabs';
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
        return ['tabs', 'list'];
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
        // list
        $this->start_controls_section(
            'list_section',
            [
                'label' => esc_html__( 'Danh sách', 'clinic' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'list_tab_title', [
                'label' => esc_html__( 'Tiêu đề tab', 'clinic' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Tiêu đề tab' , 'clinic' ),
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
            'list_title', [
                'label' => esc_html__( 'Tiêu đề', 'clinic' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Tiêu đề' , 'clinic' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_content', [
                'label' => esc_html__( 'Nội dung', 'clinic' ),
                'type' => Controls_Manager::WYSIWYG,
                'default' => esc_html__( 'Nội dung' , 'clinic' ),
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
                        'list_tab_title' => esc_html__( 'Tiêu đề tab', 'clinic' ),
                    ],
                    [
                        'list_tab_title' => esc_html__( 'Tiêu đề tab', 'clinic' ),
                    ],
                ],
                'title_field' => '{{{ list_tab_title }}}',
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
        $list = $settings['list'];

        $medical_appointment_form = clinic_get_opt_medical_appointment();
        $link_chat = clinic_get_opt_link_chat_doctor();
    ?>
        <div class="element-advantage-tabs">
            <?php if ( !empty( $list ) ) : ?>
                <ul class="nav nav-pills">
                    <?php foreach ( $list as $key => $item ) : ?>
                        <li class="nav-item elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
                            <button class="nav-link<?php echo esc_attr( $key == 0 ? ' active' : '' );?>" data-bs-toggle="pill" data-bs-target="#pills-<?php echo esc_attr( $item['_id'] ); ?>" type="button">
                                <?php echo esc_html( $item['list_tab_title'] ); ?>
                            </button>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="tab-content">
                    <?php foreach ( $list as $key => $item ) : ?>
                        <div class="tab-pane fade elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); echo esc_attr( $key == 0 ? ' show active' : '' );?>" id="pills-<?php echo esc_attr( $item['_id'] ); ?>">
                            <div class="grid">
                                <div class="item">
                                    <?php echo wp_get_attachment_image( $item['list_image']['id'], 'full' ); ?>
                                </div>

                                <div class="item">
                                    <h4 class="title">
                                        <?php echo esc_html( $item['list_title'] ); ?>
                                    </h4>

                                    <div class="content">
                                        <?php echo wpautop( $item['list_content'] ); ?>
                                    </div>

                                    <div class="action-box d-flex">
                                        <?php if ( $medical_appointment_form ) : ?>
                                            <a class="btn-booking" href="#" data-bs-toggle="modal" data-bs-target="#modal-appointment-form">
                                                <img src="<?php echo esc_url( get_theme_file_uri( '/extension/elementor-addon/images/btn-hen-kham.png' ) ) ?>" alt="">
                                            </a>
                                        <?php endif; ?>

                                        <?php if ( $link_chat ) : ?>
                                            <a class="btn-link" href="<?php echo esc_url( $link_chat ); ?>" target="_blank">
                                                <img src="<?php echo esc_url( get_theme_file_uri( '/extension/elementor-addon/images/btn-bs-tu-van.png' ) ) ?>" alt="">
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php
    }
}