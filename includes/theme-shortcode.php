<?php
// short code title has icon
add_shortcode('title_has_icon' , 'clinic_title_has_icon');
function clinic_title_has_icon($args): false|string {
	ob_start();
	?>
	<div class="title-has-icon">
		<div class="title-has-icon__image">
			<img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icon-title.png' ) ) ?>" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" width="105" height="80"/>
		</div>

		<h2 class="title-has-icon__text m-0"><?php echo esc_html( $args['title'] ); ?></h2>
	</div>
	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

// short code contact us
add_shortcode('single_contact_us' , 'clinic_shortcode_contactus');
function clinic_shortcode_contactus(): false|string {
	ob_start();

	get_template_part( 'components/inc','single-contact-us', array(
		'class' => 'mt-24 mb-24'
	) );

	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

// short code text zoom in zoom out
add_shortcode('text_zoom_in_zoom_out' , 'clinic_text_zoom_in_zoom_out');
function clinic_text_zoom_in_zoom_out($args, $content = null): false|string
{
    ob_start();

    $text_align = $args['text_align'] ?? 'center';
    $font_weight = $args['font_weight'] ?? 'bold';
    $link = $args['link'] ?? '';
    $target = $args['target'] ?? '_blank';
?>
    <p class="text-zoom-in-zoom-out text-<?php echo esc_attr( $text_align ); ?> fw-<?php echo esc_attr( $font_weight ); ?>">
        <?php if ($link) : ?>

        <a class="txt-content d-inline-block zoom-in-zoom-out" href="<?php echo esc_attr($link); ?>" target="<?php echo esc_attr($target); ?>"><?php echo esc_html( $content ); ?></a>

        <?php else: ?>

        <span class="txt-content d-inline-block zoom-in-zoom-out"><?php echo esc_html( $content ); ?></span>

        <?php endif; ?>
    </p>
<?php
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}