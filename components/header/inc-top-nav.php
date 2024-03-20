<?php
$hotline_group = clinic_get_opt_hotline_list();
$address =clinic_get_opt_general_address();
?>

<div class="top-nav d-none d-lg-block">
    <div class="container">
        <div class="info d-flex align-items-center justify-content-between">
            <div class="item">
                <div class="item__icon">
                    <i class="icon-phone-circle"></i>
                </div>

                <div class="item__content phone">
                    <span><?php esc_html_e('Hotline:', 'clinic'); ?></span>

                    <?php
                    if ( $hotline_group ) :
                        foreach ( $hotline_group as $item ) :
                    ?>
                        <a class="phone fw-bold" href="tel:<?php echo esc_attr( clinic_preg_replace_ony_number( $item['phone'] ) ); ?>">
                            <?php echo esc_html($item['phone']); ?>
                        </a>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>

            <div class="item address">
                <div class="item__icon">
                    <i class="icon-location-dot"></i>
                </div>

                <div class="item__content">
                    <?php if ( !empty( $address ) ) : ?>
                        <strong><?php echo esc_html( $address ); ?></strong>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>