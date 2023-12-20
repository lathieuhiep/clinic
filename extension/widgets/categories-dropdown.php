<?php
/**
 * Widget Name: Info Company Widget
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class clinic_categories_dropdown_widget extends WP_Widget {
	/* Widget setup */
    public function __construct() {
        $clinic_categories_dropdown_widget_ops = array(
            'classname'     =>  'categories-dropdown-widget',
            'description'   =>  esc_html__( 'A widget that displays', 'clinic' ),
        );

        parent::__construct( 'categories-dropdown-widget', 'My Theme: Danh mục bài viết', $clinic_categories_dropdown_widget_ops );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
	function widget( $args, $instance ): void {
        echo $args['before_widget'];

        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
    ?>
        <ul class="widget-warp">
            <?php wp_list_categories(array(
                    'title_li' => ''
            )); ?>
        </ul>
    <?php

        echo $args['after_widget'];
	}

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
	function form( $instance ): void {
		$defaults = array(
            'title' => esc_html__('Hạng mục điều trị', 'clinic')
        );

		$instance = wp_parse_args( (array) $instance, $defaults );
        ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
                <?php esc_html_e( 'Tiêu đề:', 'clinic' ); ?>
            </label>

			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
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
    function update( $new_instance, $old_instance ): array {
        $instance = array();

        $instance['title'] = strip_tags( $new_instance['title'] );

        return $instance;
    }
}

// Register widget
function clinic_categories_dropdown_widget_register(): void {
    register_widget( 'clinic_categories_dropdown_widget' );
}

add_action( 'widgets_init', 'clinic_categories_dropdown_widget_register' );