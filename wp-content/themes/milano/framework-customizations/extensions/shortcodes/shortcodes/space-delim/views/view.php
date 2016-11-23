<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var $atts
 */

$height_class = 'empty-space';
$height_class .= ( ! empty( $atts['height'] ) ) ? ' col-xs-b35 col-sm-' . $atts['height'] : '';

if ( 'no' !== fw_akg( 'custom/choice', $atts, 'no' ) ) {
	$tablet_a = fw_akg( 'custom/yes/tablet-album', $atts, '' );
	$height_class .= ( ! empty( $tablet_a ) ) ? ' col-sm-' . $tablet_a : '';

	$tablet_l = fw_akg( 'custom/yes/tablet-landscape', $atts, '' );
	$height_class .= ( ! empty( $tablet_l ) ) ? ' col-md-' . $tablet_l : '';

	$large = fw_akg( 'custom/yes/pc', $atts, '' );
	$height_class .= ( ! empty( $large ) ) ? ' col-lg-' . $large : '';
}

$add_class = fw_akg( 'add_class', $atts );
$add_style = fw_akg( 'inline_style', $atts );

if ( ! empty( $add_style ) ) {
	if ( substr_count( $add_style, 'style=' ) > 0 ) {
		$custom_style = $add_style;
	} else {
		$custom_style = 'style=' . $add_style . '"';
	}
}else{
	$custom_style = '';
}

$animation = fw_akg('animation',$atts);
if(!empty($animation)){
	wp_enqueue_script( 'modesto-aos-animation' );
	$animation_data = 'aos="'.esc_attr($animation).'"';
}else{
	$animation_data = '';
}

//Generate and Echo html
echo '<div class="crumina-block ' . esc_attr( $height_class . $add_class ) . ' " ' . $custom_style . ' ' . $animation_data . '></div>';

