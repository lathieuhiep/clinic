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

        $link_chat = clinic_get_opt_link_chat_doctor();
        $limit_post = $settings['limit'];
        $order_by_post = $settings['order_by'];
        $order_post = $settings['order'];

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
           <div class="element-doctor-slider__warp owl-carousel owl-theme custom-equal-height-owl">
               <?php
               while ( $query->have_posts() ) :
                   $query->the_post();
               ?>

                   <div class="item">
                       <div class="item__thumbnail">
                           <?php the_post_thumbnail('large'); ?>
                       </div>

                       <div class="item__body text-center">
                           <h3 class="title">
                               <?php the_title(); ?>
                           </h3>

                           <p class="position">
                               <?php echo esc_html( get_post_meta(get_the_ID(), 'clinic_cmb_doctor_position', true) ); ?>
                           </p>
                       </div>

                       <div class="item__action">
                           <?php if ( !empty($link_chat) ) : ?>
                               <a class="link-chat" href="<?php echo esc_url( $link_chat ); ?>" target="_blank">
                                   <?php esc_html_e('Tư vấn', 'clinic'); ?>
                               </a>
                           <?php endif; ?>

                           <a class="view-detail-doctor" href="#" data-id="<?php echo esc_attr( get_the_ID() ); ?>">
                               <?php esc_html_e('Xem thêm', 'clinic'); ?>
                           </a>
                       </div>
                   </div>

               <?php
               endwhile;
               wp_reset_postdata();
               ?>
           </div>

            <div class="element-doctor-slider__modal"></div>
        </div>
    <?php
        endif;
    }
}