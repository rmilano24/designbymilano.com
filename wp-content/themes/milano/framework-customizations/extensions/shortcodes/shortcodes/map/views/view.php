<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var $map_data_attr
 * @var $atts
 * @var $content
 * @var $tag
 */

$all_styles                      = _modesto_google_map_custom_styles();
$map_data_attr['data-map-style'] = trim( json_encode( $all_styles[ $map_data_attr['data-map-style'] ][1] ), '"' );
$map_data_attr['data-locations'] = str_replace( '\\', '', $map_data_attr['data-locations'] );

$enable_custom_marker       = fw_akg( 'custom_marker/custom_marker_enable', $atts, 'no' );
$enable_custom_marker_image = fw_akg( 'custom_marker/yes/thumb/url', $atts, '' );
$zoom = fw_akg('map_zoom',$atts,14);

$map_data_attr['data-zoom'] = $zoom;

unset( $map_data_attr['data-custom-marker'] );

if ( 'yes' === $enable_custom_marker ) {
	if ( ! empty( $enable_custom_marker_image ) ) {
		$map_data_attr['data-custom-marker'] = $enable_custom_marker_image;
	}
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
?>
<div class="crumina-block <?php echo esc_attr( $add_class ) ?>" <?php echo( $custom_style ) ?>>
	<div class="fw-map" <?php echo fw_attr_to_html( $map_data_attr ); ?>>
		<div class="fw-map-canvas"></div>
	</div>
</div>