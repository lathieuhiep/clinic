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
        <div class="info-company-widget">
            <?php if ( $instance['address'] ) : ?>
                <div class="item">
                    <div class="item__icon">
                        <i class="icon-house-light"></i>

                        <strong><?php esc_html_e( 'Địa chỉ', 'clinic' ); ?></strong>
                    </div>

                    <div class="item__content">
                        <?php echo esc_html( $instance['address'] ); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( $instance['working_time'] ) : ?>
                <div class="item">
                    <div class="item__icon">
                        <i class="icon-clock"></i>

                        <strong><?php esc_html_e( 'Thời gian làm việc', 'clinic' ); ?></strong>
                    </div>

                    <div class="item__content">
			            <?php echo esc_html( $instance['working_time'] ); ?>
                    </div>
                </div>
            <?php endif; ?>
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
            'title' => esc_html__('thông tin liên hệ:', 'clinic'),
            'address' => esc_html__('115 Yên Lãng, Thịnh Quang, Đống Đa, Hà Nội', 'clinic'),
            'working_time' => esc_html__('Phòng khám làm việc 7h30  đến 20h mỗi ngày', 'clinic'),
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
            <label for="<?php echo $this->get_field_id( 'working_time' ); ?>">
				<?php esc_html_e( 'Thời gian làm việc:', 'clinic' ); ?>
            </label>

            <input class="widefat" id="<?php echo $this->get_field_id( 'working_time' ); ?>" name="<?php echo $this->get_field_name( 'working_time' ); ?>" value="<?php echo $instance['working_time']; ?>" />
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
        $instance['working_time'] = strip_tags( $new_instance['working_time'] );

        return $instance;
    }
}

// Register widget
function clinic_info_company_widget_register(): void {
    register_widget( 'clinic_info_company_widget' );
}

add_action( 'widgets_init', 'clinic_info_company_widget_register' );