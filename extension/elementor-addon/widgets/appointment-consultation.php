<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;
use Elementor\Repeater;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Clinic_Elementor_Appointment_Consultation extends Widget_Base
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
        return 'clinic-contact-us';
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
        return esc_html__('Tư vấn và đặt hẹn', 'clinic');
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
        return 'eicon-mail';
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
        return ['contact', 'appointment', 'consultation' ];
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
            'heading',
            [
                'label'       => esc_html__( 'Heading', 'clinic' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'TƯ VẤN VÀ ĐẶT HẸN TRỰC TUYẾN', 'clinic' ),
                'label_block' => true
            ]
        );

        $this->add_control(
            'select_form',
            [
                'label'       => esc_html__( 'Select Form', 'clinic' ),
                'type'        => Controls_Manager::SELECT2,
                'label_block' => true,
                'options'     => clinic_get_form_cf7(),
                'default'     => '0',
            ]
        );

        $this->end_controls_section();

        // style heading
        $this->start_controls_section(
            'style_heading',
            [
                'label' => esc_html__( 'Heading', 'clinic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => esc_html__( 'color', 'clinic' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .element-appointment-consultation__warp .heading__txt' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'label' => esc_html__( 'Typography', 'clinic' ),
                'selector' => '{{WRAPPER}} .element-appointment-consultation__warp .heading__txt',
            ]
        );

        $this->end_controls_section();

        // style form
        $this->start_controls_section(
            'style_form',
            [
                'label' => esc_html__( 'Form', 'clinic' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'background_color_input',
            [
                'label' => esc_html__( 'background input', 'clinic' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .element-appointment-consultation__warp .form .wpcf7-form .wpcf7-form-control:not(.wpcf7-submit)' => 'background-color: {{VALUE}}',
                ],
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
        <div class="element-appointment-consultation">
            <div class="element-appointment-consultation__warp">
                <div class="thumbnail d-none d-lg-block">
                    <img src="<?php echo esc_url( get_theme_file_uri( '/extension/elementor-addon/images/tu-van-dat-hen.png' ) ) ?>" alt="" width="100" height="97" />
                </div>

                <div class="heading">
                    <h2 class="heading__txt m-0">
                        <?php echo esc_html( $settings['heading'] ); ?>
                    </h2>
                </div>

                <div class="form">
                    <?php
                    if ( $settings['select_form'] ) {
                        echo do_shortcode( '[contact-form-7 id="' . $settings['select_form'] . '" ]' );
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php
    }
}