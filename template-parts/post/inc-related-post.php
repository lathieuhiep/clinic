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
            <h3 class="related-posts__heading text-uppercase">
                <i class="fa-solid fa-list"></i>
                <span><?php esc_html_e('Bài viết liên quan', 'clinic'); ?></span>
            </h3>

            <ul class="list-post reset-list">
                <?php
                while ($query->have_posts()) :
                    $query->the_post();
                ?>
                    <li class="item">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <i class="fa-solid fa-caret-right"></i>
                            <span><?php the_title(); ?></span>
                        </a>
                    </li>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </ul>
        </div>
    <?php
    endif;
endif;