<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

$image_source = fw_akg( 'source/selected', $atts, 'media' );

$image = fw_akg( 'source/media/image/url', $atts, '' );
$image = ( empty( $image ) ) ? fw_akg( 'source/external/link', $atts, '' ) : $image;

if ( empty( $image ) ) {
	return;
}
if ( 'media' === $image_source ) {
	$width  = fw_akg( 'source/media/size/width', $atts, '' );
	$height = fw_akg( 'source/media/size/height', $atts, '' );
	$crop   = fw_akg( 'source/media/size/crop', $atts, false );
	if ( ! empty( $width ) && ! empty( $height ) ) {
		$image_url = fw_resize( $image, $width, $height, $crop );
	} else {
		$image_url = $image;
	}
	$alt = get_post_meta( fw_akg( 'source/media/image/attachment_id', $atts, '' ), '_wp_attachment_image_alt', true );
} else {
	$image_url = $image;
	$alt       = '';
}

$img_attributes = array(
	'src' => $image_url,
	'alt' => $alt,
);

if ( ! empty( $width ) ) {
	$img_attributes['width'] = $width;
}
if ( ! empty( $height ) ) {
	$img_attributes['height'] = $height;
}

$add_class     = fw_akg( 'add_class', $atts, '' );
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


$image_link = fw_akg( 'image_link/selected', $atts, '' );

if ( 'cross' === $atts['hover_effect'] ) {
	$link_class  = 'mouseover';
	$link_helper = '<span class="mouseover-helper-frame"></span><span class="mouseover-helper-icon"></span>';
} elseif ( 'zoom' === $atts['hover_effect'] ) {
	$link_class  = 'overlay-thumbnail';
	$link_helper = fw_html_tag( 'img', $img_attributes );
} else {
	$link_class = $link_helper = '';
}

$animation = fw_akg('animation',$atts);
if(!empty($animation)){
	wp_enqueue_script( 'modesto-aos-animation' );
	$animation_data = 'aos="'.esc_attr($animation).'"';
}else{
	$animation_data = '';
}

echo '<div class="crumina-block image-block' . esc_attr( $add_class ) . '" ' . $custom_style . ' ' . $animation_data . '>';
echo '<div class="' . esc_attr( $atts['image_align'] ) . '">';
if ( 'zoom' === $image_link ) {
	echo '<a href="' . esc_url( $image ) . '" class="' . esc_attr( $link_class ) . ' zoom">' . $link_helper . fw_html_tag( 'img', $img_attributes ) . '</a>';
} elseif ( 'link' === $image_link ) {
	$url = modesto_gen_link_for_shortcode( $atts );
	echo '<a href="' . esc_url( $url['link'] ) . '" target="' . esc_attr( $url['target'] ) . '" class="' . esc_attr( $link_class ) . '">' . $link_helper . fw_html_tag( 'img', $img_attributes ) . '</a>';
} else {
	echo fw_html_tag( 'img', $img_attributes );
}
echo '</div></div>';

