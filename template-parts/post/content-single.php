<?php
$show_related = clinic_get_option('opt_post_single_related', '1');
?>

<div id="post-<?php the_ID() ?>" class="single-post-content">
    <h1 class="single-post-content__title">
		<?php the_title(); ?>
    </h1>

    <?php if (function_exists('bcn_display')) : ?>
        <div class="single-post-content__breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
            <?php bcn_display(); ?>
        </div>
    <?php endif; ?>

	<?php clinic_post_meta(); ?>

    <div class="single-post-content__detail">
		<?php
		the_content();

		clinic_link_page();
		?>
    </div>
</div>

<?php
if ( $show_related == '1' ) :
    get_template_part( 'template-parts/post/inc','related-post' );
endif;

get_template_part( 'components/inc','comment-form' );