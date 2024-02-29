<?php
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
        $clinic_addon_elementor_url = admin_url( 'admin-ajax.php' );
        $clinic_addon_elementor_ajax = array( 'url' => $clinic_addon_elementor_url );

		// style
        wp_enqueue_style( 'clinic-elementor-style', get_theme_file_uri( '/extension/elementor-addon/css/elementor-addon.min.css' ), array(), clinic_get_version_theme() );

		// script
		wp_enqueue_script( 'clinic-elementor-script', get_theme_file_uri( '/extension/elementor-addon/js/elementor-addon.min.js' ), array( 'jquery' ), '1.0.0', true );
        wp_localize_script( 'clinic-elementor-script', 'clinic_elementor_detail_doctor', $clinic_addon_elementor_ajax );
	}
}

// call ajax doctor single
add_action( 'wp_ajax_nopriv_clinic_get_detail_doctor', 'clinic_get_detail_doctor' );
add_action( 'wp_ajax_clinic_get_detail_doctor', 'clinic_get_detail_doctor' );

function clinic_get_detail_doctor()
{
    $id = $_POST['id'];

    $args = array(
        'post_type' => 'clinic_doctor',
        'post__in' => array( $id )
    );

    $query = new WP_Query( $args );
?>
    <!-- Modal -->
    <div class="modal fade modal-doctor-slider" id="modal-doctor-slider" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <?php
                if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) : $query->the_post();
                        $specialist = get_post_meta(get_the_ID(), 'clinic_cmb_doctor_specialist', true);
                        $story = get_post_meta(get_the_ID(), 'clinic_cmb_doctor_story', true);
                ?>
                    <div class="modal-header">
                        <h2 class="modal-title fs-5">
                            <?php the_title(); ?>
                        </h2>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="list">
                            <div class="list__header">
                                <div class="list__thumbnail">
                                    <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icons/icon-doctor.png' ) ) ?>" alt="">
                                </div>

                                <p class="txt">
                                    <?php esc_html_e('Giới thiệu', 'clinic'); ?>
                                </p>
                            </div>

                            <div class="list__content">
                                <?php the_content(); ?>
                            </div>
                        </div>

                        <div class="list">
                            <div class="list__header">
                                <div class="list__thumbnail">
                                    <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icons/icon-doctor-suitcase.png' ) ) ?>" alt="">
                                </div>

                                <p class="txt">
                                    <?php esc_html_e('Chuyên khoa', 'clinic'); ?>
                                </p>
                            </div>

                            <div class="list__content">
                                <?php echo wpautop($specialist); ?>
                            </div>
                        </div>

                        <div class="list">
                            <div class="list__header">
                                <div class="list__thumbnail">
                                    <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icons/icon-ear-piece.png' ) ) ?>" alt="">
                                </div>

                                <p class="txt">
                                    <?php esc_html_e('Khám và điều trị các bệnh ', 'clinic'); ?>
                                </p>
                            </div>

                            <div class="list__content">
                                <?php echo wpautop($story); ?>
                            </div>
                        </div>
                    </div>
                <?php
                    endwhile; wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </div>
<?php
    wp_die();
}