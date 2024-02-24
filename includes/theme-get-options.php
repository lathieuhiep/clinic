<?php
// logo
function clinic_get_opt_logo()
{
    return clinic_get_option( 'opt_general_logo' );
}

// get hotline theme option general
function clinic_get_opt_hotline()
{
    return clinic_get_option('opt_general_hotline');
}

// get map
function clinic_get_opt_link_map()
{
    return clinic_get_option('opt_general_link_map');
}

// get medical appointment theme option general
function clinic_get_opt_medical_appointment()
{
    return clinic_get_option('opt_general_medical_appointment_form');
}

// get link chat doctor theme option general
function clinic_get_opt_link_chat_doctor()
{
    return clinic_get_option('opt_general_chat_doctor');
}

// get link chat messenger theme option general
function clinic_get_opt_link_chat_messenger()
{
    return clinic_get_option('opt_general_chat_messenger');
}

// get chat zalo theme option general
function clinic_get_opt_chat_zalo()
{
    return clinic_get_option('opt_general_chat_zalo');
}

// Social Network
function clinic_get_social_url(): void {
    $social_networks = [
        'facebook' => 'facebook-f',
        'youtube' => 'youtube'
    ];
    $phone = clinic_get_opt_hotline();

    foreach ( $social_networks as $key => $item ) :
        $social_url = clinic_get_option('opt_social_network_' . $key);

        if ( !empty( $social_url ) ) :
            ?>
            <div class="social-network-item <?php echo esc_attr($key); ?>">
                <a href="<?php echo esc_url( $social_url ); ?>" target="_blank">
                    <i class="icon-<?php echo esc_attr($item); ?>"></i>
                </a>
            </div>
        <?php
        endif;
    endforeach;

    if ($phone) :
?>
    <div class="social-network-item phone">
        <a href="tel:<?php echo esc_attr(clinic_preg_replace_ony_number($phone)); ?>">
            <i class="icon-phone"></i>
        </a>
    </div>
<?php
    endif;
}