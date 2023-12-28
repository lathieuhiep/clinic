<?php
//
add_filter("use_block_editor_for_post_type", "disable_gutenberg_editor");
function disable_gutenberg_editor()
{
	return false;
}

// get version theme
function clinic_get_version_theme(): string {
	return wp_get_theme()->get( 'Version' );
}

// check is blog
function clinic_is_blog (): bool {
	return ( is_archive() || is_category() || is_tag() || is_author() || is_home() );
}

// Callback Comment List
function clinic_comments( $clinic_comment, $clinic_comment_args, $clinic_comment_depth ) {
	if ( $clinic_comment_args['style'] == 'div' ) :
		$clinic_comment_tag       = 'div';
		$clinic_comment_add_below = 'comment';
	else :
		$clinic_comment_tag       = 'li';
		$clinic_comment_add_below = 'div-comment';
	endif;

?>
	<<?php echo $clinic_comment_tag ?> <?php comment_class( empty( $clinic_comment_args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

        <?php if ( 'div' != $clinic_comment_args['style'] ) : ?>

		<div id="div-comment-<?php comment_ID() ?>" class="comment__body">

        <?php endif; ?>
            <div class="author vcard">
                <div class="author__avatar">
	                <?php if ( $clinic_comment_args['avatar_size'] != 0 ) {
		                echo get_avatar( $clinic_comment, $clinic_comment_args['avatar_size'] );
	                } ?>
                </div>

                <div class="author__info">
                    <span class="name"><?php comment_author_link(); ?></span>

                    <span class="date"><?php comment_date(); ?></span>
                </div>
            </div>

            <?php if ( $clinic_comment->comment_approved == '0' ) : ?>
                <div class="awaiting">
                    <?php esc_html_e( 'Your comment is awaiting moderation.', 'clinic' ); ?>
                </div>
            <?php endif; ?>

            <div class="content">
	            <?php comment_text(); ?>
            </div>

            <div class="action">
	            <?php edit_comment_link( esc_html__( 'Edit ', 'clinic' ) ); ?>

	            <?php comment_reply_link( array_merge( $clinic_comment_args, array(
		            'add_below' => $clinic_comment_add_below,
		            'depth'     => $clinic_comment_depth,
		            'max_depth' => $clinic_comment_args['max_depth']
	            ) ) ); ?>
            </div>

	    <?php if ( $clinic_comment_args['style'] != 'div' ) : ?>

		</div>

    <?php
        endif;
}

// Content Nav
function clinic_comment_nav(): void {
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
?>
	<nav class="navigation comment-navigation">
		<h2 class="screen-reader-text">
			<?php esc_html_e( 'Comment navigation', 'clinic' ); ?>
		</h2>

		<div class="nav-links">
			<?php
			if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'clinic' ) ) ) :
				printf( '<div class="nav-previous">%s</div>', $prev_link );
			endif;

			if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'clinic' ) ) ) :
				printf( '<div class="nav-next">%s</div>', $next_link );
			endif;
			?>
		</div>
	</nav>
<?php
	endif;
}

// Pagination
function clinic_pagination(): void {
	the_posts_pagination( array(
		'type'               => 'list',
		'mid_size'           => 2,
		'prev_text'          => '<<',
		'next_text'          => '>>',
		'screen_reader_text' => '&nbsp;',
	) );
}

// Pagination Nav Query
function clinic_paging_nav_query( $query ): void {

	$args = array(
		'prev_text' => esc_html__( ' Previous', 'clinic' ),
		'next_text' => esc_html__( 'Next', 'clinic' ),
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'total'     => $query->max_num_pages,
		'type'      => 'list',
	);

	$paginate_links = paginate_links( $args );

	if ( $paginate_links ) :

		?>
		<nav class="pagination">
			<?php echo $paginate_links; ?>
		</nav>

	<?php

	endif;
}

// Get col global
function clinic_col_use_sidebar( $option_sidebar, $active_sidebar ): string
{
	if ( $option_sidebar != 'hide' && is_active_sidebar( $active_sidebar ) ):

		if ( $option_sidebar == 'left' ) :
			$class_position_sidebar = ' order-1 order-md-2';
		else:
			$class_position_sidebar = ' order-1';
		endif;

		$class_col_content = 'col-12 col-md-8' . $class_position_sidebar;
	else:
		$class_col_content = 'col-md-12';
	endif;

	return $class_col_content;
}

function clinic_col_sidebar(): string
{
	return 'col-12 col-md-4';
}

// Post Meta
function clinic_post_meta(): void {
	?>

	<div class="post-meta">
        <div class="post-meta__item">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <rect x="2.5" y="5" width="15" height="12.5" rx="2" stroke="#969C9F" stroke-width="2"/>
                    <path d="M3.3335 9.16669H16.6668" stroke="#969C9F" stroke-width="2" stroke-linecap="round"/>
                    <path d="M7.5 13.3333H12.5" stroke="#969C9F" stroke-width="2" stroke-linecap="round"/>
                    <path d="M6.6665 2.5L6.6665 5.83333" stroke="#969C9F" stroke-width="2" stroke-linecap="round"/>
                    <path d="M13.3335 2.5L13.3335 5.83333" stroke="#969C9F" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>

            <div class="content">
	            <?php esc_html_e( 'Ngày đăng: ', 'clinic' ); the_date(); ?>
            </div>
        </div>

        <div class="post-meta__item">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M16.4397 17.0392C16.0598 15.9761 15.2229 15.0366 14.0586 14.3665C12.8943 13.6965 11.4677 13.3333 10.0002 13.3333C8.5326 13.3333 7.10605 13.6965 5.94175 14.3665C4.77746 15.0366 3.94049 15.976 3.56066 17.0392" stroke="#969C9F" stroke-width="2" stroke-linecap="round"/>
                    <circle cx="9.99984" cy="6.66665" r="3.33333" stroke="#969C9F" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>

            <div class="content">
	            <?php esc_html_e( 'Tác giả:', 'clinic' ); ?>

                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
		            <?php the_author(); ?>
                </a>
            </div>
        </div>
	</div>

	<?php
}

// Link Pages
function clinic_link_page(): void {

	wp_link_pages( array(
		'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'clinic' ),
		'after'       => '</div>',
		'link_before' => '<span class="page-number">',
		'link_after'  => '</span>',
	) );

}

// Get Category Check Box
function clinic_check_get_cat( $type_taxonomy ): array
{
	$cat_check = array();
	$category  = get_terms(
		array(
			'taxonomy'   => $type_taxonomy,
			'hide_empty' => false
		)
	);

	if ( isset( $category ) && ! empty( $category ) ):
		foreach ( $category as $item ) {
			$cat_check[ $item->term_id ] = $item->name;
		}
	endif;

	return $cat_check;
}

// Get Contact Form 7
function clinic_get_form_cf7(): array {
	$options = array();

	if ( function_exists('wpcf7') ) {

		$wpcf7_form_list = get_posts( array(
			'post_type' => 'wpcf7_contact_form',
			'numberposts' => -1,
		) );

		$options[0] = esc_html__('Select a Contact Form', 'clinic');

		if ( !empty($wpcf7_form_list) && !is_wp_error($wpcf7_form_list) ) :
			foreach ( $wpcf7_form_list as $item ) :
				$options[$item->ID] = $item->post_title;
			endforeach;
		else :
			$options[0] = esc_html__('Create a Form First', 'clinic');
		endif;

	}

	return $options;
}

// Social Network
function clinic_get_social_url(): void {
	$opt_social_networks = clinic_get_option('opt_social_network', '');

    if ( !empty( $opt_social_networks ) ) :
	    foreach ( $opt_social_networks as $item ) :
        ?>
            <div class="social-network-item">
                <a href="<?php echo esc_url( $item['url'] ); ?>" target="_blank">
                    <i class="<?php echo $item['icon']; ?>"></i>
                </a>
            </div>
        <?php

        endforeach;
    endif;
}

function clinic_preg_replace_ony_number($string): string|null
{
    $number = '';

    if (!empty( $string )) {
        $number = preg_replace('/[^0-9]/', '', strip_tags( $string ) );
    }

    return $number;
}