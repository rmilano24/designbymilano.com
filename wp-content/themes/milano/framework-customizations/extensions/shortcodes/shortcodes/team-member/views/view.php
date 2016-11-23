<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( empty( $atts['image'] ) ) {
	$image = fw_get_framework_directory_uri( '/static/img/no-image.png' );
} else {
	$image = $atts['image']['url'];
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
?>

<?php
$output = '';

$output .= '<div class="crumina-block '.esc_attr( $add_class ).' " '.$custom_style.' '.$animation_data.'>';

if ( 'style_2' === $atts['item_style'] ) {

	$output .= '<div class="team-entry-wide">';

	$output .= '<img class="team-entry-wide-thumbnail" src="' . esc_url( $atts['image']['url'] ) . '" alt="" />';

	$output .= '<div class="description">';

	if ( isset( $atts['name'] ) && ! empty( $atts['name'] ) ) {
		$output .= '<div class="h5 light"><b>' . $atts['name'] . '</b></div>';
	}
	if ( isset( $atts['job'] ) && ! empty( $atts['job'] ) ) {
		$output .= '<div class="simple-article light transparent">' . $atts['job'] . '</div>';
		$output .= '<div class="empty-space col-xs-b15"></div>';
	}

	if ( isset( $atts['soc_networks'] ) && ! empty( $atts['soc_networks'] ) ) {

		$output .= '<div class="follow style-3">';

		foreach ( $atts['soc_networks'] as $single_soc_network ) {
			$output .= '<a class="entry" href="' . esc_url( $single_soc_network['link'] ) . '"><i class="' . $single_soc_network['icon'] . '"></i></a>';
		}

		$output .= '</div>';

	}

	$output .= '</div>';/*description*/

	$output .= '</div>';/*team-entry-wide*/

} else {

	$output .= '<div class="team-entry">';

	$output .= '<div class="team-thumbnail-wrapper">';

	if ( isset( $atts['soc_networks'] ) && ! empty( $atts['soc_networks'] ) ) {

		$output .= '<div class="follow style-5 text-center">';

		foreach ( $atts['soc_networks'] as $single_soc_network ) {
			$output .= '<a class="entry" href="' . esc_url( $single_soc_network['link'] ) . '"><i class="' . $single_soc_network['icon'] . '"></i></a>';
		}

		$output .= '</div>';

	}

	$output .= '<a class="team-thumbnail" href="#"><img src="' . esc_url( $atts['image']['url'] ) . '" alt="" /></a>';

	$output .= '</div>';/*team-thumbnail-wrapper*/

	$output .= '<div class="empty-space col-xs-b20"></div>';

	$output .= '<div class="text-center">';
	if ( isset( $atts['name'] ) && ! empty( $atts['name'] ) ) {
		$output .= '<div class="h5"><a class="mouseover-simple" href="#"><b>' . $atts['name'] . '</b></a></div>';
	}
	if ( isset( $atts['job'] ) && ! empty( $atts['job'] ) ) {
		$output .= '<div class="simple-article grey">' . $atts['job'] . '</div>';
	}
	$output .= '</div>';

	$output .= '</div>';/*team-entry*/

}

$output .= '</div>';

echo apply_filters( 'modesto_team_member_output', $output );
?>



