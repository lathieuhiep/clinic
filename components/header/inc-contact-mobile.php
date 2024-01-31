<?php
$id_cf = clinic_get_option( 'opt_general_cf' );
?>
<div class="contact-mobile d-lg-none">
    <div class="contact-mobile__warp">
        <div class="menu-offcanvas">
            <button class="btn btn-primary d-flex align-items-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                <i class="icon-menu"></i>
            </button>
        </div>

        <div class="warp-cf">
            <?php
            if ( $id_cf ) :
                echo do_shortcode('[contact-form-7 id="' . $id_cf . '" ]');
            endif;
            ?>
        </div>
    </div>
</div>