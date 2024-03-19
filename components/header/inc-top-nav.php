<?php
$logo = clinic_get_option( 'opt_general_logo' );
$address =clinic_get_opt_general_address();
$working_time = clinic_get_option('opt_general_working_time');
$hotline = clinic_get_opt_hotline();
?>

<div class="top-nav d-none d-lg-block">
    <div class="container">
        <div class="grid-layout">
            <div class="logo">
                <a class="d-block" href="<?php echo esc_url( get_home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
                    <?php
                    if ( ! empty( $logo['id'] ) ) :
                        echo wp_get_attachment_image( $logo['id'], 'full' );
                    else :
                        ?>

                        <img class="logo-default" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/logo.png' ) ) ?>" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" width="64" height="64"/>

                    <?php endif; ?>
                </a>
            </div>

            <div class="info">
                <div class="item address">
                    <div class="item__icon">
                        <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjciIGhlaWdodD0iMjYiIHZpZXdCb3g9IjAgMCAyNyAyNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xNi4yMzAyIDAuNTUzNzExQzE1LjM4MTcgMC4xODQ1NyAxNC40NzE3IDAgMTMuNSAwQzEyLjUyODMgMCAxMS42MTgzIDAuMTg0NTcgMTAuNzY5OCAwLjU1MzcxMUM5LjkyMTMxIDAuOTIyODUyIDkuMTc1NDYgMS40Mjg3MSA4LjUzMjI2IDIuMDcxMjlDNy45MDI3NCAyLjcwMDIgNy40MDMyMyAzLjQzODQ4IDcuMDMzNzIgNC4yODYxM0M2LjY3NzkxIDUuMTMzNzkgNi41IDYuMDQyOTcgNi41IDcuMDEzNjdDNi41IDcuNzI0NjEgNi42MDI2NCA4LjQwODIgNi44MDc5MiA5LjA2NDQ1QzcuMDEzMiA5LjcyMDcgNy4zMDA1OSAxMC4zMjIzIDcuNjcwMDkgMTAuODY5MUwxMy41IDIxTDE5LjQ1MzEgMTAuNzA1MUMxOS43ODE1IDEwLjE3MTkgMjAuMDM0NyA5LjU5MDgyIDIwLjIxMjYgOC45NjE5MUMyMC40MDQyIDguMzMzMDEgMjAuNSA3LjY4MzU5IDIwLjUgNy4wMTM2N0MyMC41IDYuMDQyOTcgMjAuMzIyMSA1LjEzMzc5IDE5Ljk2NjMgNC4yODYxM0MxOS41OTY4IDMuNDM4NDggMTkuMDkwNCAyLjcwMDIgMTguNDQ3MiAyLjA3MTI5QzE3LjgxNzcgMS40Mjg3MSAxNy4wNzg3IDAuOTIyODUyIDE2LjIzMDIgMC41NTM3MTFaTTEzLjUgMTAuNTA2OEMxNS40MzQ5IDEwLjUwNjggMTcuMDAzNCA4LjkzOTgzIDE3LjAwMzQgNy4wMDY4NEMxNy4wMDM0IDUuMDczODQgMTUuNDM0OSAzLjUwNjg0IDEzLjUgMy41MDY4NEMxMS41NjUxIDMuNTA2ODQgOS45OTY1OCA1LjA3Mzg0IDkuOTk2NTggNy4wMDY4NEM5Ljk5NjU4IDguOTM5ODMgMTEuNTY1MSAxMC41MDY4IDEzLjUgMTAuNTA2OFoiIGZpbGw9IiMxMTkyNDYiLz4KPHBhdGggZD0iTTEuMzczMTMgMjQuNjExMUgyNkwyMi42NDE4IDE4SDUuMTA0NDhMMSAyNSIgc3Ryb2tlPSIjMTE5MjQ2Ii8+Cjwvc3ZnPgo=" alt="">
                    </div>

                    <div class="item__content">
                        <?php if ( !empty( $address ) ) : ?>
                            <p><?php esc_html_e( 'Địa chỉ', 'clinic' ); ?></p>

                            <strong class="text-uppercase"><?php echo esc_html( $address ); ?></strong>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="item">
                    <div class="item__icon">
                        <i class="icon-clock"></i>
                    </div>

                    <div class="item__content">
                        <p><?php esc_html_e('Thời gian làm việc', 'clinic'); ?></p>
                        <strong><?php echo esc_html( $working_time ); ?></strong>
                    </div>
                </div>

                <div class="item">
                    <div class="item__icon">
                        <i class="icon-phone-circle"></i>
                    </div>

                    <div class="item__content">
                        <p><?php esc_html_e('Hotline tư vấn', 'clinic'); ?></p>

                        <a class="phone fw-bold" href="tel:<?php echo esc_attr( clinic_preg_replace_ony_number( $hotline ) ); ?>">
                            <?php echo esc_html( $hotline ); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>