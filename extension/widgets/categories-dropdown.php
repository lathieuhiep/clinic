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

		$parent_categories = get_categories( array( 'parent' => 0 ) );
    ?>
        <ul class="widget-warp">
            <?php
            foreach ($parent_categories as $parent_category) :
                $this->get_child_categories( $parent_category );
             endforeach;
             ?>
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

    function get_child_categories($parent_category): void {
	    $parent_category_id = $parent_category->term_id;
	    $child_categories = get_categories( array( 'parent' => $parent_category_id ) );

    if ( $child_categories ) :
    ?>
        <li class="cat-item cat-item-has-child">
            <a class="cat-item__link cate-link-has-child" href="<?php echo esc_url( get_category_link( $parent_category_id ) ); ?>">
		        <?php echo esc_html( $parent_category->name ); ?>
            </a>

            <div class="icon-has-child-cate">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="8" viewBox="0 0 10 8" fill="none">
                    <path d="M5 8L0.669873 0.499999L9.33013 0.5L5 8Z" fill="white"/>
                </svg>
            </div>

            <ul class="children">
		        <?php foreach ($child_categories as $child_category) : ?>
                    <li class="cat-item">
                        <a href="<?php echo esc_url( get_category_link( $child_category->term_id ) ); ?>">
					        <?php echo esc_html( $child_category->name ); ?>
                        </a>

				        <?php $this->get_child_categories($child_category); ?>
                    </li>
		        <?php endforeach; ?>
            </ul>
        </li>

    <?php else: ?>
        <li class="cat-item">
            <a class="cat-item__link" href="<?php echo esc_url( get_category_link( $parent_category_id ) ); ?>">
		        <?php echo esc_html( $parent_category->name ); ?>
            </a>
        </li>
    <?php
        endif;
    }
}

// Register widget
function clinic_categories_dropdown_widget_register(): void {
    register_widget( 'clinic_categories_dropdown_widget' );
}

add_action( 'widgets_init', 'clinic_categories_dropdown_widget_register' );