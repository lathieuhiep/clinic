<?php
get_header();

// include slider
get_template_part( 'components/inc', 'slider' );

// get option theme
$show_related = clinic_get_option('opt_post_single_related', '1');
$sidebar = clinic_get_option('opt_post_single_sidebar_position', 'right');
$class_col_content = clinic_col_use_sidebar( $sidebar, 'sidebar-post', 8 );
?>

<div class="site-container single-post-warp">
    <?php get_template_part( 'components/inc', 'breadcrumbs' ); ?>

    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr( $class_col_content ); ?>">
                <?php
                if ( have_posts() ) : while (have_posts()) : the_post();

                    get_template_part('template-parts/post/content','single');

                    endwhile;
                endif;
                ?>
            </div>

            <?php if ( $sidebar !== 'hide' && is_active_sidebar( 'sidebar-post') ) : ?>
                <aside class="<?php echo esc_attr( clinic_col_sidebar(4) ); ?> site-sidebar order-1">
                    <?php dynamic_sidebar( 'sidebar-post' ); ?>
                </aside>
            <?php endif; ?>
        </div>
    </div>

    <?php
    if ( $show_related == '1' ) :
        get_template_part( 'template-parts/post/inc','related-post' );
    endif;
    ?>
</div>

<?php get_footer(); ?>

