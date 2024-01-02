<?php

use Elementor\Group_Control_Typography;
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
                'label' => esc_html__( 'Query', 'clinic' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'limit',
            [
                'label'     =>  esc_html__( 'Number of Posts', 'clinic' ),
                'type'      =>  Controls_Manager::NUMBER,
                'default'   =>  12,
                'min'       =>  1,
                'max'       =>  100,
                'step'      =>  1,
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label'     =>  esc_html__( 'Order By', 'clinic' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  'id',
                'options'   =>  [
                    'id'    =>  esc_html__( 'ID', 'clinic' ),
                    'title' =>  esc_html__( 'Title', 'clinic' ),
                    'date'  =>  esc_html__( 'Date', 'clinic' ),
                    'rand'  =>  esc_html__( 'Random', 'clinic' ),
                ],
            ]
        );

        $this->add_control(
            'order',
            [
                'label'     =>  esc_html__( 'Order', 'clinic' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'   =>  'DESC',
                'options'   =>  [
                    'ASC'   =>  esc_html__( 'Ascending', 'clinic' ),
                    'DESC'  =>  esc_html__( 'Descending', 'clinic' ),
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render(): void {
        $settings = $this->get_settings_for_display();
	    $medical_appointment_form = clinic_get_option('opt_general_medical_appointment_form');

        $limit_post     =   $settings['limit'];
        $order_by_post  =   $settings['order_by'];
        $order_post     =   $settings['order'];

        // Query
	    $args = array(
		    'post_type'           => 'clinic_doctor',
		    'posts_per_page'      => $limit_post,
		    'orderby'             => $order_by_post,
		    'order'               => $order_post,
		    'ignore_sticky_posts' => 1,
	    );

        $query = new WP_Query( $args );

        if ( $query->have_posts() ) :

    ?>
        <div class="element-doctor-slider">
            <div class="element-doctor-slider__gallery">
                <?php
                while ( $query->have_posts() ):
                    $query->the_post();
                ?>

                    <div class="item">
                        <div class="item__grid">
                            <div class="thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </div>

                            <div class="info">
                                <div class="info__top">
                                    <p class="position text-center">
		                                <?php echo esc_html( get_post_meta(get_the_ID(), 'clinic_cmb_doctor_position', true) ); ?>
                                    </p>

                                    <h3 class="name text-center text-uppercase">
		                                <?php the_title(); ?>
                                    </h3>

                                    <div class="specialist">
		                                <?php the_content(); ?>
                                    </div>
                                </div>

                                <?php if ( $medical_appointment_form ) : ?>
                                <div class="action-box text-center">
                                    <a class="action-box__booking" href="#" data-bs-toggle="modal" data-bs-target="#modal-appointment-form">
                                        <?php esc_html_e('ĐẶT LỊCH HẸN', 'clinic') ?>
                                    </a>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                <?php endwhile; wp_reset_postdata(); ?>
            </div>

            <button type="button" class="btn doctor-slider-button-prev">
                <i class="fa-solid fa-chevron-left"></i>
            </button>

            <button type="button" class="btn doctor-slider-button-next">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    <?php

        endif;
    }

}