<?php
$show_related = clinic_get_option('opt_post_single_related', '1');
$contact = clinic_get_option('opt_post_single_contact');
$note = clinic_get_option('opt_post_single_note');
?>

<div id="post-<?php the_ID() ?>" class="single-post-content">
    <?php if (function_exists('bcn_display')) : ?>
        <div class="single-post-content__breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
            <?php bcn_display(); ?>
        </div>
    <?php endif; ?>

    <h1 class="single-post-content__title">
		<?php the_title(); ?>
    </h1>

	<?php clinic_post_meta(); ?>

    <div class="single-post-content__detail">
		<?php
		the_content();

		clinic_link_page();
		?>
    </div>

    <?php if ( !empty( $contact ) ) : ?>

    <div class="contact-info">
        <div class="contact-info__thumbnail">
            <?php
            if ( !empty( $contact['image']['id'] ) ) :
                echo wp_get_attachment_image( $contact['image']['id'], 'medium_large' );
            endif;
            ?>
        </div>

        <div class="contact-info__content">
            <h4 class="heading">
                <?php echo esc_html( $contact['heading'] ); ?>
            </h4>

            <div class="desc">
                <?php echo wpautop( $contact['content'] ); ?>
            </div>
        </div>
    </div>

    <?php endif; ?>

    <?php if ( !empty( $note ) ) : ?>

    <div class="note-box text-center">
        <?php echo wpautop( $note ); ?>
    </div>

    <?php endif; ?>
</div>

<?php
get_template_part( 'components/inc','comment-form' );

if ( $show_related == '1' ) :
    get_template_part( 'template-parts/post/inc','related-post' );
endif;