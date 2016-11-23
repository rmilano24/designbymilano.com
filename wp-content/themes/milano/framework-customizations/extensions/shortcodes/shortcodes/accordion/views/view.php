<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

$add_class     = fw_akg( 'add_class', $atts );
$margin_bottom = fw_akg( 'margin_class', $atts, '' );
if ( ! empty( $margin_bottom ) ) {
	$add_class .= ' custom-space col-sm-' . $margin_bottom;
}
$add_style = fw_akg( 'inline_style', $atts );

if ( ! empty( $add_style ) ) {
	if ( substr_count( $add_style, 'style=' ) > 0 ) {
		$custom_style = $add_style;
	} else {
		$custom_style = 'style=' . $add_style . '"';
	}
} else {
	$custom_style = '';
}

$animation = fw_akg( 'animation', $atts );
if ( ! empty( $animation ) ) {
	wp_enqueue_script( 'modesto-aos-animation' );
	$animation_data = 'aos="' . esc_attr( $animation ) . '"';
} else {
	$animation_data = '';
}

?>
<div class="crumina-block <?php echo esc_attr( $add_class ) ?>" <?php echo( $custom_style ) ?> <?php echo( $animation_data ) ?>>
	<div class="fw-accordion">
		<?php foreach ( $atts['tabs'] as $tab ) : ?>
			<h4 class="fw-accordion-title h4 small"><b><?php echo esc_html( $tab['tab_title'] ); ?></b></h4>
			<div class="fw-accordion-content">
				<p><?php echo do_shortcode( $tab['tab_content'] ); ?></p>
			</div>
		<?php endforeach; ?>
	</div>
</div>