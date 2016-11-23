<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */
global $allowedtags;
$smalll_class   = ( 'on' === $atts['enable_small'] ) ? ' small' : '';
$subtitle_class = ( 'on' === $atts['enable_small'] ) ? 'large' : 'large';
$uppercase      = fw_akg( 'uppercase', $atts );

$line = 'yes' === $atts['line'] ? 'line-decor' : '';

$add_class     = fw_akg( 'add_class', $atts );
$margin_bottom = fw_akg( 'margin_class', $atts, '' );
if ( ! empty( $margin_bottom ) ) {
	$add_class .= ' custom-space col-xs-b35 col-sm-' . $margin_bottom;
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

<div class="custom-heading <?php echo esc_attr( $atts['align'] ) . ' ' . $line ?> crumina-block <?php echo esc_attr( $add_class ) ?>" <?php echo( $custom_style ) ?> <?php echo( $animation_data ) ?>>
	<?php if ( ! empty( $atts['title'] ) ) {
		$title_class = esc_attr( $atts['title_tag'] );
		if ( ! empty( $smalll_class ) ) {
			$title_class .= $smalll_class;
		}
		echo fw_html_tag( $atts['title_tag'], array( 'class' => $title_class ), wp_kses( $atts['title'], $allowedtags ) ); ?>
	<?php } ?>
	<?php if ( ! empty( $atts['subtitle'] ) ) { ?>
		<div class="empty-space col-xs-b5"></div>
		<div class="subtitle <?php echo esc_attr( $subtitle_class ); ?>">
			<?php echo wp_kses( wpautop( $atts['subtitle'] ), $allowedtags ); ?>
		</div>
	<?php } ?>
</div><!--custom-heading-->
