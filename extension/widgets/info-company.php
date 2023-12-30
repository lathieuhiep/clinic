<?php
/**
 * Widget Name: Info Company Widget
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class clinic_info_company_widget extends WP_Widget {
	/* Widget setup */
    public function __construct() {
        $clinic_info_company_widget_ops = array(
            'classname'     =>  'info-company-widget',
            'description'   =>  esc_html__( 'A widget that displays your info company', 'clinic' ),
        );

        parent::__construct( 'info-company-widget', 'My Theme: Thông tin công ty', $clinic_info_company_widget_ops );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
	function widget( $args, $instance ) {
        echo $args['before_widget'];

        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
    ?>
        <div class="info-company-widget__warp">
            <div class="item">
                <i class="fa-solid fa-location-dot"></i>

                <p class="item__content">
                    <?php echo esc_html( $instance['address'] ); ?>
                </p>
            </div>

            <div class="item">
                <i class="fa-solid fa-phone"></i>

                <a class="item__content" href="tel:<?php echo esc_attr( clinic_preg_replace_ony_number($instance['hotline']) ); ?>">
                    <?php echo esc_html( $instance['hotline'] ); ?>
                </a>
            </div>

            <div class="item">
                <i class="fa-solid fa-globe"></i>

                <a class="item__content" href="<?php echo esc_url( $instance['website'] ); ?>">
                    <?php echo esc_html( $instance['website'] ); ?>
                </a>
            </div>

            <div class="item">
                <i class="fa-solid fa-envelope"></i>

                <a class="item__content" href="mailto:<?php echo esc_attr( $instance['mail'] ); ?>">
                    <?php echo esc_html( $instance['mail'] ); ?>
                </a>
            </div>
        </div>
    <?php

        echo $args['after_widget'];
	}

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
	function form( $instance ) {
		$defaults = array(
            'title' => '',
            'address' => '',
            'hotline' => '',
            'website' => '',
            'mail' => '',
        );

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
                <?php esc_html_e( 'Tiêu đề:', 'clinic' ); ?>
            </label>

			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
            <label for="<?php echo $this->get_field_id( 'address' ); ?>">
				<?php esc_html_e( 'Địa chỉ:', 'clinic' ); ?>
            </label>

            <input class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" value="<?php echo $instance['address']; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'mail' ); ?>">
                <?php esc_html_e( 'Mail:', 'clinic' ); ?>
            </label>

            <input class="widefat" id="<?php echo $this->get_field_id( 'mail' ); ?>" name="<?php echo $this->get_field_name( 'mail' ); ?>" value="<?php echo $instance['mail']; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'hotline' ); ?>">
				<?php esc_html_e( 'Hotline:', 'clinic' ); ?>
            </label>

            <input class="widefat" id="<?php echo $this->get_field_id( 'hotline' ); ?>" name="<?php echo $this->get_field_name( 'hotline' ); ?>" value="<?php echo $instance['hotline']; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'website' ); ?>">
				<?php esc_html_e( 'Website:', 'clinic' ); ?>
            </label>

            <input class="widefat" id="<?php echo $this->get_field_id( 'website' ); ?>" name="<?php echo $this->get_field_name( 'website' ); ?>" value="<?php echo $instance['website']; ?>" />
        </p>
	<?php

	}

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    function update( $new_instance, $old_instance ) {
        $instance = array();

        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['address'] = strip_tags( $new_instance['address'] );
        $instance['mail'] = strip_tags( $new_instance['mail'] );
        $instance['hotline'] = strip_tags( $new_instance['hotline'] );
        $instance['website'] = strip_tags( $new_instance['website'] );

        return $instance;
    }
}

// Register widget
function clinic_info_company_widget_register(): void {
    register_widget( 'clinic_info_company_widget' );
}

add_action( 'widgets_init', 'clinic_info_company_widget_register' );