<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */

$url           = modesto_gen_link_for_shortcode( $atts );
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

$animation = fw_akg('animation',$atts);
if(!empty($animation)){
	wp_enqueue_script( 'modesto-aos-animation' );
	$animation_data = 'aos="'.esc_attr($animation).'"';
}else{
	$animation_data = '';
}
if ( 'none' !== $atts['text_align'] ) {
	echo '<div class="crumina-block ' . esc_attr( $add_class ) . ' ' . esc_attr( $atts['text_align'] ) . '" ' . $custom_style . ' '.$animation_data.'>';
}
?>

	<a href="<?php echo esc_url( $url['link'] ) ?>" target="<?php echo esc_attr( $url['target'] ) ?>" class="button <?php echo esc_attr( $atts['style'] ) ?>">
		<?php echo strip_tags( $atts['label'], '<strong><b><i>' ); ?>
	</a>

<?php if ( 'none' !== $atts['text_align'] ) {
	echo '</div>';
} ?>