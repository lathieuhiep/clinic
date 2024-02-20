<?php
// include slider
get_template_part( 'components/inc', 'slider' );
get_template_part( 'components/inc', 'breadcrumbs' );

// option theme
$sidebar = clinic_get_option('opt_post_cat_sidebar_position', 'right');
$class_col_content = clinic_col_use_sidebar($sidebar, 'sidebar-main');

// get term
$term = get_queried_object();
?>

<div class="site-container archive-post-warp">
    <div class="container">
        <div class="row post-row">
            <div class="<?php echo esc_attr( $class_col_content ); ?>">
                <?php if ( have_posts() ) : ?>
                    <div class="content-archive-post">
                        <div class="grid">
                            <?php
                            while ( have_posts() ) :
                                the_post();
                            ?>
                                <div class="item">
                                    <div class="post-thumbnail">
                                        <?php the_post_thumbnail('large'); ?>
                                    </div>

                                    <div class="item__content">
                                        <h2 class="post-title">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                <?php if (is_sticky() && is_home()) : ?>
                                                    <i class="fa fa-thumb-tack" aria-hidden="true"></i>
                                                <?php
                                                endif;

                                                the_title();
                                                ?>
                                            </a>
                                        </h2>

                                        <p class="post-date">
                                            <?php echo esc_html( get_the_date() ); ?>
                                        </p>

                                        <div class="post-desc">
                                            <p>
                                                <?php
                                                if (has_excerpt()) :
                                                    echo esc_html(get_the_excerpt());
                                                else:
                                                    echo wp_trim_words(get_the_content(), 30, '...');
                                                endif;
                                                ?>
                                            </p>

                                            <?php clinic_link_page(); ?>
                                        </div>

                                        <a class="text-read-more" href="<?php the_permalink(); ?>">
                                            <span><?php esc_html_e('Đọc tiếp', 'clinic'); ?></span>
                                            <i class="icon-angle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                <?php
	                clinic_pagination();
                else:
	                if ( is_search() ) :
		                get_template_part('template-parts/post/content', 'no-data');
	                endif;
                endif;
                ?>
            </div>

            <?php
            if ( $sidebar !== 'hide' ) :
                get_sidebar();
            endif;
            ?>
        </div>
    </div>
</div>