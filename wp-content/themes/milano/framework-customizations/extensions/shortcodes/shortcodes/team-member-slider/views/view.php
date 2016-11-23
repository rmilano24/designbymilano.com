<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$output = '';

if ( isset( $atts['slider_infinity'] ) && ( 'on' === $atts['slider_infinity'] ) ) {
	$data_loop = 'data-loop="1"';
} else {
	$data_loop = 'data-loop="0"';
}

if ( isset( $atts['autoplay'] ) && ! ( 0 === $atts['autoplay'] ) ) {

	$data_autoplay = 'data-autoplay="' . intval($atts['autoplay']) . '000"';

} else {

	$data_autoplay = 'data-autoplay="0"';

}
$small = $medium = 1;
if ( isset( $atts['slides_per_page'] ) && $atts['slides_per_page'] < 4 && $atts['slides_per_page'] > 1 ) {
	$medium = $atts['slides_per_page'] - 1;
	$small  = $atts['slides_per_page'] - 2;
} elseif ( $atts['slides_per_page'] === 1 ) {
	$medium = $small = 1;
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

$output .= '<div class="crumina-block '.esc_attr( $add_class ).' " '.$custom_style.'>';

$output .= '<div class="swiper-container" data-slides-per-view="' . $atts['slides_per_page'] . '" data-breakpoints="1" data-xs-slides="1" data-sm-slides="' . $small . '" data-md-slides="' . $medium . '" ' . $data_loop . ' '.esc_attr($data_autoplay).'>';
$output .= '<div class="swiper-button-prev swiper-button hidden"></div>';
$output .= '<div class="swiper-button-next swiper-button hidden"></div>';
$output .= '<div class="swiper-wrapper">';

if ( isset( $atts['slides'] ) && ! empty( $atts['slides'] ) ) {

	foreach ( $atts['slides'] as $single_slide ) {

		$output .= '<div class="swiper-slide">';

		if ( 'style_2' === $atts['item_style'] ) {

			$output .= '<div class="team-entry-wide">';

			$output .= '<img class="team-entry-wide-thumbnail" src="' . esc_url( $single_slide['image']['url'] ) . '" alt="" />';

			$output .= '<div class="description">';

			if ( isset( $single_slide['name'] ) && ! empty( $single_slide['name'] ) ) {
				$output .= '<div class="h5 light"><b>' . $single_slide['name'] . '</b></div>';
			}
			if ( isset( $single_slide['job'] ) && ! empty( $single_slide['job'] ) ) {
				$output .= '<div class="simple-article light transparent">' . $single_slide['job'] . '</div>';
				$output .= '<div class="empty-space col-xs-b15"></div>';
			}

			if ( isset( $single_slide['soc-networks'] ) && ! empty( $single_slide['soc-networks'] ) ) {

				$output .= '<div class="follow style-3">';

				foreach ( $single_slide['soc-networks'] as $single_soc_network ) {
					$output .= '<a class="entry" href="' . esc_url( $single_soc_network['link'] ) . '"><i class="' . $single_soc_network['icon'] . '"></i></a>';
				}

				$output .= '</div>';

			}

			$output .= '</div>';/*description*/

			$output .= '</div>';/*team-entry-wide*/

		} else {

			$output .= '<div class="team-entry">';

			$output .= '<div class="team-thumbnail-wrapper">';

			if ( isset( $single_slide['soc-networks'] ) && ! empty( $single_slide['soc-networks'] ) ) {

				$output .= '<div class="follow style-5 text-center">';

				foreach ( $single_slide['soc-networks'] as $single_soc_network ) {
					$output .= '<a class="entry" href="' . esc_url( $single_soc_network['link'] ) . '"><i class="' . $single_soc_network['icon'] . '"></i></a>';
				}

				$output .= '</div>';

			}

			$output .= '<a class="team-thumbnail" href="#"><img src="' . esc_url( $single_slide['image']['url'] ) . '" alt="" /></a>';

			$output .= '</div>';/*team-thumbnail-wrapper*/

			$output .= '<div class="empty-space col-xs-b20"></div>';

			$output .= '<div class="text-center">';
			if ( isset( $single_slide['name'] ) && ! empty( $single_slide['name'] ) ) {
				$output .= '<div class="h5"><a class="mouseover-simple" href="#"><b>' . $single_slide['name'] . '</b></a></div>';
			}
			if ( isset( $single_slide['job'] ) && ! empty( $single_slide['job'] ) ) {
				$output .= '<div class="simple-article grey">' . $single_slide['job'] . '</div>';
			}
			$output .= '</div>';

			$output .= '</div>';/*team-entry*/

		}

		$output .= '</div>';/*.swiper-slide*/

	}

}

$output .= '</div>';/*.swiper-wrapper*/
$output .= '<div class="swiper-pagination relative-pagination"></div>';
$output .= '</div>';/*.swiper-container*/

$output .= '</div>';/*crumina-block*/

echo apply_filters( 'modesto_team_member_slider_output', $output );