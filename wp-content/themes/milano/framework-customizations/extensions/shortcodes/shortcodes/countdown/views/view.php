<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

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

$output = '';

if ( isset( $atts['date'] ) && ! empty( $atts['date'] ) ) {

	if ( isset($atts['item_style']) && 'style_2' === $atts['item_style'] ) {
		$wrap_class = 'row text-center nopadding';
		$item_class = 'style-2';
	} else {
		$wrap_class = 'row';
		$item_class = 'style-1';
	}


	if ( isset($atts['text_color']) && 'dark' === $atts['text_color'] ) {
		$text_class  = 'light transparent';
		$digit_class = 'light';
	} else {
		$text_class  = '';
		$digit_class = '';
	}

	$output .= '<div class="crumina-block ' . esc_attr( $add_class ) . '" ' . $custom_style . ' '.$animation_data.'>';

	$output .= '<div class="' . esc_attr( $wrap_class ) . ' countdown" data-finalTime="' . $atts['date'] . '">';


	/*Days*/
	$output .= '<div class="col-xs-3 nopadding">';
	$output .= '<div class="teaser-number-entry ' . esc_attr( $item_class ) . '">';
	$output .= '<div class="inline-tags simple-article  ' . esc_attr( $text_class ) . '">' . esc_html__( 'Days', 'modesto' ) . '</div>';
	$output .= '<div class="h2 ' . esc_attr( $digit_class ) . '"><b class="days"></b></div>';
	$output .= '</div>';/*.teaser-number-entry*/
	$output .= '</div>';/*col-xs-3*/

	/*Hours*/
	$output .= '<div class="col-xs-3 nopadding">';
	$output .= '<div class="teaser-number-entry ' . esc_attr( $item_class ) . '">';
	$output .= '<div class="inline-tags simple-article  ' . esc_attr( $text_class ) . '">' . esc_html__( 'Hours', 'modesto' ) . '</div>';
	$output .= '<div class="h2 ' . esc_attr( $digit_class ) . '"><b class="hours"></b></div>';
	$output .= '</div>';/*.teaser-number-entry*/
	$output .= '</div>';/*col-xs-3*/

	/*Minutes*/
	$output .= '<div class="col-xs-3 nopadding">';
	$output .= '<div class="teaser-number-entry ' . esc_attr( $item_class ) . '">';
	$output .= '<div class="inline-tags simple-article  ' . esc_attr( $text_class ) . '">' . esc_html__( 'Minutes', 'modesto' ) . '</div>';
	$output .= '<div class="h2 ' . esc_attr( $digit_class ) . '"><b class="minutes"></b></div>';
	$output .= '</div>';/*.teaser-number-entry*/
	$output .= '</div>';/*col-xs-3*/

	/*Seconds*/
	$output .= '<div class="col-xs-3 nopadding">';
	$output .= '<div class="teaser-number-entry ' . esc_attr( $item_class ) . '">';
	$output .= '<div class="inline-tags simple-article  ' . esc_attr( $text_class ) . '">' . esc_html__( 'Seconds', 'modesto' ) . '</div>';
	$output .= '<div class="h2 ' . esc_attr( $digit_class ) . '"><b class="seconds"></b></div>';
	$output .= '</div>';/*.teaser-number-entry*/
	$output .= '</div>';/*col-xs-3*/

	$output .= '</div>';
	$output .= '</div>';

}

echo apply_filters( 'modesto_countdown_output', $output );
