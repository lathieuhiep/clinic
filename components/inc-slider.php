<?php
$gallery = clinic_get_option('opt_general_slider');

if ( !empty( $gallery ) ) :
    $gallery_ids = explode( ',', $gallery );
?>

<div class="slider-main">
    <div class="slider-main__warp owl-carousel owl-theme">
        <?php foreach ( $gallery_ids as $gallery_item_id ): ?>
            <div class="item">
                <?php echo wp_get_attachment_image( $gallery_item_id, 'full' ); ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
endif;