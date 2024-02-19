<?php
$term_ids  = wp_get_post_terms( get_the_ID(), 'category', array( 'fields' => 'ids' ) );

if ( !empty( $term_ids ) ):
	$limit = clinic_get_option('opt_post_single_related_limit', 6);

    $arg = array(
        'post_type' => 'post',
        'cat' => $term_ids,
        'post__not_in' => array(get_the_ID()),
        'posts_per_page' => $limit,
    );

    $query = new WP_Query($arg);

    if ($query->have_posts()) :
    ?>
        <div class="related-posts">
            <div class="container">
                <h3 class="related-posts__heading text-uppercase">
                    <?php esc_html_e('Bài viết liên quan', 'clinic'); ?>
                </h3>

                <div class="list-post reset-list">
                    <?php
                    while ($query->have_posts()) :
                        $query->the_post();
                    ?>
                        <div class="item">
                            <figure class="item__thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </figure>

                            <div class="item__content">
                                <h3 class="title">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>

                                <p class="date">
                                    <?php echo esc_html( get_the_date('d/m/Y') ); ?>
                                </p>

                                <a class="link" href="<?php the_permalink(); ?>">
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
        </div>
    <?php
    endif;
endif;