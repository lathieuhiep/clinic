<?php
$logo_mobile = clinic_get_option( 'opt_general_logo_mobile' );
$hotline_mobile = clinic_get_option('opt_general_hotline_mobile');
$phone_mobile = clinic_preg_replace_ony_number($hotline_mobile);
?>
<div class="top-nav-mobile d-lg-none">
    <div class="container h-100">
        <div class="grid-warp h-100">
            <div class="item hamburger">
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="28" viewBox="0 0 26 28" fill="none">
                        <path d="M25.0714 23.8778H0.928571C0.682299 23.8778 0.446113 23.9793 0.271972 24.1598C0.0978314 24.3404 0 24.5852 0 24.8406L0 26.766C0 27.0213 0.0978314 27.2662 0.271972 27.4467C0.446113 27.6273 0.682299 27.7287 0.928571 27.7287H25.0714C25.3177 27.7287 25.5539 27.6273 25.728 27.4467C25.9022 27.2662 26 27.0213 26 26.766V24.8406C26 24.5852 25.9022 24.3404 25.728 24.1598C25.5539 23.9793 25.3177 23.8778 25.0714 23.8778ZM25.0714 16.1761H0.928571C0.682299 16.1761 0.446113 16.2775 0.271972 16.4581C0.0978314 16.6386 0 16.8835 0 17.1388L0 19.0642C0 19.3196 0.0978314 19.5644 0.271972 19.745C0.446113 19.9255 0.682299 20.027 0.928571 20.027H25.0714C25.3177 20.027 25.5539 19.9255 25.728 19.745C25.9022 19.5644 26 19.3196 26 19.0642V17.1388C26 16.8835 25.9022 16.6386 25.728 16.4581C25.5539 16.2775 25.3177 16.1761 25.0714 16.1761ZM25.0714 8.47433H0.928571C0.682299 8.47433 0.446113 8.57576 0.271972 8.75631C0.0978314 8.93685 0 9.18172 0 9.43705L0 11.3625C0 11.6178 0.0978314 11.8627 0.271972 12.0432C0.446113 12.2238 0.682299 12.3252 0.928571 12.3252H25.0714C25.3177 12.3252 25.5539 12.2238 25.728 12.0432C25.9022 11.8627 26 11.6178 26 11.3625V9.43705C26 9.18172 25.9022 8.93685 25.728 8.75631C25.5539 8.57576 25.3177 8.47433 25.0714 8.47433ZM25.0714 0.772583H0.928571C0.682299 0.772583 0.446113 0.874012 0.271972 1.05456C0.0978314 1.2351 0 1.47997 0 1.7353L0 3.66074C0 3.91607 0.0978314 4.16094 0.271972 4.34148C0.446113 4.52203 0.682299 4.62346 0.928571 4.62346H25.0714C25.3177 4.62346 25.5539 4.52203 25.728 4.34148C25.9022 4.16094 26 3.91607 26 3.66074V1.7353C26 1.47997 25.9022 1.2351 25.728 1.05456C25.5539 0.874012 25.3177 0.772583 25.0714 0.772583Z" fill="#0B7158"/>
                    </svg>
                </button>
            </div>

            <div class="item logo text-center">
                <a class="d-block" href="<?php echo esc_url( get_home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
                    <?php
                    if ( ! empty( $logo_mobile['id'] ) ) :
                        echo wp_get_attachment_image( $logo_mobile['id'], 'full' );
                    else :
                        ?>

                        <img class="logo-default"
                             src="<?php echo esc_url( get_theme_file_uri( '/assets/images/logo.png' ) ) ?>"
                             alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" width="64" height="64"/>

                    <?php endif; ?>
                </a>
            </div>

            <?php if ( $hotline_mobile ) : ?>
                <div class="item contact">
                    <a href="tel:<?php echo esc_attr($phone_mobile); ?>">
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 18 17" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.35888 0.205162L3.24417 0.0281045C3.85929 -0.0949189 4.4834 0.193694 4.78804 0.742052L6.29826 3.46046C6.61104 4.02346 6.5127 4.72559 6.05729 5.181L5.04056 6.19773C4.5726 6.66625 4.48374 7.39321 4.82549 7.9604C5.399 8.91392 6.0666 9.77154 6.8283 10.5332C7.59001 11.2949 8.44701 11.9619 9.39933 12.5342C9.9666 12.8745 10.6926 12.7852 11.1606 12.3177L12.1773 11.301C12.6327 10.8456 13.3348 10.7473 13.8978 11.06L16.6162 12.5703C17.1646 12.8749 17.4532 13.499 17.3302 14.1141L17.1531 14.9994C17.0685 15.4222 16.7992 15.785 16.4184 15.9872C12.8454 17.8917 8.9682 16.7531 4.78668 12.5716C0.605155 8.3901 -0.533362 4.51287 1.37113 0.93995C1.5733 0.559101 1.93609 0.289794 2.35888 0.205162Z" fill="#04916F"/>
                        </svg>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>