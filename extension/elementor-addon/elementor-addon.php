<?php
// Register Category Elementor Addon
use Elementor\Plugin;

// create category
add_action( 'elementor/elements/categories_registered', 'clinic_add_elementor_widget_categories' );
function clinic_add_elementor_widget_categories( $elements_manager ): void {
	$elements_manager->add_category(
		'my-theme',
		[
			'title' => esc_html__( 'My Theme', 'clinic' ),
			'icon'  => 'icon-goes-here',
		]
	);
}

// Register widgets
add_action( 'elementor/widgets/register', 'clinic_register_widget_elementor_addon' );
function clinic_register_widget_elementor_addon( $widgets_manager ): void {
	// include add on
	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/slider.php' );
    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/image-box-content.php' );
    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/doctor-slider.php' );

//    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/number-counter.php' );
//    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/heading-line-under.php' );
//    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/category-list.php' );
//    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/gallery-grid-box.php' );
//    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/gallery-grid.php' );
//    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/machines.php' );

//    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/step-image-box.php' );
//    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/work-time.php' );
//    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/post-grid.php' );
//    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/testimonial-slider.php' );
//    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/contact-form-7.php' );
//    require get_parent_theme_file_path( '/extension/elementor-addon/widgets/contact-us.php' );

//  require get_parent_theme_file_path( '/extension/elementor-addon/widgets/appointment-consultation.php' );
//	require get_parent_theme_file_path( '/extension/elementor-addon/widgets/specialist.php' );
//  require get_parent_theme_file_path( '/extension/elementor-addon/widgets/image-slider.php' );
//  require get_parent_theme_file_path( '/extension/elementor-addon/widgets/circle-box-image.php' );

	// register add on
	$widgets_manager->register( new \Clinic_Elementor_Slider() );
    $widgets_manager->register( new \Clinic_Elementor_Image_Box_Content() );
    $widgets_manager->register( new \Clinic_Elementor_Doctor_Slider() );

//    $widgets_manager->register( new \Clinic_Elementor_Number_Counter() );
//    $widgets_manager->register( new \Clinic_Elementor_Heading_Line_Under() );
//    $widgets_manager->register( new \Clinic_Elementor_Category_List() );
//    $widgets_manager->register( new \Clinic_Elementor_Gallery_Grid_Box() );
//    $widgets_manager->register( new \Clinic_Elementor_Gallery_Grid() );
//    $widgets_manager->register( new \Clinic_Elementor_Addon_Machines() );

//    $widgets_manager->register( new \Clinic_Elementor_Step_Image_Box() );
//    $widgets_manager->register( new \Clinic_Elementor_Work_Time() );
//    $widgets_manager->register( new \Clinic_Elementor_Post_Grid() );
//    $widgets_manager->register( new \Clinic_Elementor_Testimonial_Slider() );
//    $widgets_manager->register( new \Clinic_Elementor_Contact_Form_7() );
//    $widgets_manager->register( new \Clinic_Elementor_Contact_Us() );


//    $widgets_manager->register( new \Clinic_Elementor_Circle_Box_Image() );
//    $widgets_manager->register( new \Clinic_Elementor_Appointment_Consultation() );
//    $widgets_manager->register( new \Clinic_Elementor_Image_Slider() );
}

// Register scripts
add_action( 'wp_enqueue_scripts', 'clinic_elementor_scripts', 11 );
function clinic_elementor_scripts(): void {
	$clinic_check_elementor = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );

	if ( $clinic_check_elementor == 'builder' ) {
		// style
        wp_enqueue_style( 'clinic-elementor-style', get_theme_file_uri( '/extension/elementor-addon/css/elementor-addon.min.css' ), array(), clinic_get_version_theme() );

		// script
		wp_enqueue_script( 'clinic-elementor-script', get_theme_file_uri( '/extension/elementor-addon/js/elementor-addon.js' ), array( 'jquery' ), '1.0.0', true );
	}
}