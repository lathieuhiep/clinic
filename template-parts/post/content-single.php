<?php
$show_related = clinic_get_option('opt_post_single_related', '1');

// get image category
$category = get_the_category();
$category_parent_id = $category[0]->category_parent;

if ( $category_parent_id != 0 ) {
	$term_id = $category_parent_id;
} else {
	$term_id = $category[0]->term_id;
}

$urlImageCate = '';
if ( function_exists('z_taxonomy_image') && $term_id ) {
    $urlImageCate = z_taxonomy_image_url($term_id);
}
?>

<div id="post-<?php the_ID() ?>" class="single-post-content">
    <h1 class="single-post-content__title f-family-body">
		<?php the_title(); ?>
    </h1>

	<?php clinic_post_meta(); ?>

    <div class="single-post-content__detail" data-url-image-cate="<?php echo esc_url( $urlImageCate ); ?>">
		<?php
		the_content();

		clinic_link_page();
		?>
    </div>
</div>

<?php
get_template_part( 'components/inc','single-contact-us', array(
	'class' => 'mb-16'
) );

get_template_part( 'components/inc','comment-form' );

if ( $show_related == '1' ) :
    get_template_part( 'template-parts/post/inc','related-post' );
endif;