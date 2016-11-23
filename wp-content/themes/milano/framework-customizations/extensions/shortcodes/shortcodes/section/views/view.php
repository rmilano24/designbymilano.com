<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$section_classes = array();
$section_style   = $overlay_html = $video_attr = $bg_classes = $white_border = '';
$section_classes[] = isset( $atts['first_in_builder'] ) ? 'first-section' : '';
$full_height     = fw_akg( 'is_fullheight/full-container', $atts, 'no' );

$color_class = ( isset( $atts['color'] ) && 'white' === $atts['color'] ) ? 'simple-article light' : '';
$align_class = ( isset( $atts['text_align'] ) ) ? $atts['text_align'] : '';

$vertical_align = fw_akg( 'is_fullheight/yes/is_v_centered', $atts, false );
$vertical_class = ( true === $vertical_align ) ? 'valign-middle' : '';

if (true === fw_akg( 'is_fullheight/yes/border', $atts, false )){
	$white_border = 'white-border';
}

$bottom_type    = fw_akg( 'is_fullheight/yes/bottom/full-container', $atts, '' );
$bottom_content = '';
if ( 'text' === $bottom_type ) {
	$bottom_content = '<div class="copyright banner-menu-bottom hidden-xs"><div class="transparent small ' . esc_attr( $color_class ) . '">' . fw_akg( 'is_fullheight/yes/bottom/text/bottom_text', $atts, '' ) . '</div></div>';
}
if ( 'button' === $bottom_type ) {
	$bottom_content = '<div class="scroll-button style-3 ' . $color_class . ' hidden-xs"></div>';
} elseif ( 'share' === $bottom_type ) {
	$bottom_content = '<div class="banner-menu-bottom hidden-xs"><div class="follow style-4">' . modesto_get_share( get_the_ID() ) . '</div></div>';
} elseif ( 'social' === $bottom_type ) {
	$bottom_content = '<div class="banner-menu-bottom hidden-xs">' . modesto_get_socials( 'style-3', false ) . '</div>';
}
$border_class = fw_akg( 'is_fullheight/yes/paddings', $atts, '' );

//Margin bottom

//Additional styling
$section_classes[] = fw_akg( 'add_class', $atts, '' );
$margin_bottom     = fw_akg( 'margin_class', $atts, '' );
if ( ! empty( $margin_bottom ) ) {
	$section_classes[] = ' custom-space col-sm-' . $margin_bottom;
}
if ( 'b0' === $margin_bottom ) {
	$section_classes[] = ' col-xs-' . $margin_bottom;
}
$holder_style = ! empty( $atts['inline_style'] ) ? 'style="' . esc_attr( $atts['inline_style'] ) . '"' : '';


//Background options

// Image
$bg_source  = fw_akg( 'bg_options/variant/selected', $atts, 'image_bg' );
$bg_image   = fw_akg( 'bg_options/variant/image_bg/background_image/url', $atts, '' );
$bg_color   = fw_akg( 'bg_options/variant/image_bg/background_color', $atts, '' );
$image_size = fw_akg( 'bg_options/variant/image_bg/image_size', $atts, '' );
$bg_effect  = fw_akg( 'bg_options/variant/image_bg/bg_effect', $atts, '' );

if ( ( 'image_bg' === $bg_source ) ) {
	if ( ! empty( $bg_image ) ) {
		$section_style .= 'background-image:url(' . $bg_image . ');';
		if ( ! empty( $image_size ) ) {
			$section_style .= 'background-size:' . $image_size . ';';
		}
		if ( 'fixed' === $bg_effect ) {
			$section_style .= 'background-attachment:fixed;';
		}
	}
	if ( ! empty( $bg_color ) ) {
		$section_style .= 'background-color:' . $bg_color . ';';
	}
}

// Video
if ( ( 'video_bg' === $bg_source ) ) {
	$bg_classes .= ' js-section-background ';

	$video_source = fw_akg( 'bg_options/variant/video_bg/selected/source', $atts, '' );
	$poster       = fw_akg( 'bg_options/variant/video_bg/placeholder/url', $atts, '' );

	if ( 'oembed' === $video_source ) {
		$source = fw_akg( 'bg_options/variant/video_bg/selected/oembed/source', $atts, '' );
		if ( ! empty( $youtube ) ) {
			$video_attr = fw_htmlspecialchars( json_encode( array( 'source' => array( 'autoPlay' => true, 'video' => $source, 'poster' => $poster ) ) ) );
		}
	} else {
		$source = fw_akg( 'bg_options/variant/video_bg/selected/self', $atts, array() );
		$videos = array();
		foreach ( $source as $key => $value ) {
			if ( ! empty( $value ) ) {
				$videos[ $key ] = $value;
			}
		}

		$video_attr = fw_htmlspecialchars( json_encode( array( 'source' => array_merge( array( 'poster' => $poster ), $videos ) ) ) );
	}
}

// Overlay
$overlay_color = fw_akg( 'bg_options/variant/' . $bg_source . '/overlay_color', $atts, '' );
if ( ! empty( $overlay_color ) ) {
	$overlay_html = '<div class="section-overlay" style="background:' . esc_attr( $overlay_color ) . '"></div>';
	$section_classes[] = 'overlay-enabled';
}
if ( 'tilt' === $bg_effect && 'image_bg' === $bg_source ) {
	$vertical_class .= ' animated-background';
}

$inner_section_content = '<div class="' . esc_attr( $atts['container_width'] ) . ' ' . $color_class . ' ' . $align_class . '" >' . do_shortcode( $content ) . '</div>';
?>
<section class="section-holder <?php echo esc_attr( implode( ' ', $section_classes ) ) . ' ' . $border_class ?>" <?php echo( $holder_style ) ?>>
	<?php if ( 'tilt' === $bg_effect && 'image_bg' === $bg_source ) {
		wp_enqueue_script( 'modesto-tilt-effect' );
		$tilt_attr = fw_htmlspecialchars( json_encode( array(
			'opacity'  => '0.8',
			'movement' => array( 'perspective' => '1500', 'translateX' => '15', 'translateY' => '15', 'translateZ' => '2', 'rotateX' => '5', 'rotateY' => '5' )
		) ) );
		echo '<img src="' . $bg_image . '" alt="" class="modesto-tilt-effect"  data-tilt-options="' . esc_attr( $tilt_attr ) . '" />';
		
	} else { ?>
		<div class="bg-layer <?php echo esc_attr( $bg_classes ) ?>" style="<?php echo esc_attr( $section_style ); ?>" data-background-options="<?php echo esc_attr( $video_attr ) ?>"></div>
	<?php } ?>

	<?php echo( $overlay_html ); ?>
	<?php if ( 'yes' === $full_height ) { ?>
		<div class="page-height <?php echo esc_attr( $vertical_class ) . ' ' . esc_attr( $white_border ) ?>">
				<?php if ( true === $vertical_align ) {
					echo '<div class="teaser-content">';
					echo '<div class="header-empty-space"></div>';
					echo( $inner_section_content );
					echo '<div class="header-empty-space"></div>';
					echo '</div>';
					echo( $bottom_content );
				} else {
					echo( $inner_section_content );
				} ?>
		</div>
	<?php } else {
		echo( $inner_section_content );
	} ?>
</section>
