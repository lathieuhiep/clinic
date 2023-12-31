<?php
// Remove gutenberg widgets
add_filter('use_widgets_block_editor', '__return_false');

/* Better way to add multiple widgets areas */
function clinic_widget_registration($name, $id, $description = ''): void {
	register_sidebar( array(
		'name' => $name,
		'id' => $id,
		'description' => $description,
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	));
}

function clinic_multiple_widget_init(): void {
	clinic_widget_registration( esc_html__('Sidebar Main', 'clinic'), 'sidebar-main' );
	clinic_widget_registration( esc_html__('Sidebar Post', 'clinic'), 'sidebar-post', esc_html__('Display sidebar on post.', 'clinic') );

	clinic_widget_registration( esc_html__('Sidebar Footer Column 1', 'clinic'), 'sidebar-footer-column-1' );
	clinic_widget_registration( esc_html__('Sidebar Footer Column 2', 'clinic'), 'sidebar-footer-column-2' );
	clinic_widget_registration( esc_html__('Sidebar Footer Column 3', 'clinic'), 'sidebar-footer-column-3' );
	clinic_widget_registration( esc_html__('Sidebar Footer Column 4', 'clinic'), 'sidebar-footer-column-4' );
}

add_action('widgets_init', 'clinic_multiple_widget_init');