<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */


$images = fw_akg( 'images', $atts );
$style  = fw_akg( 'gallery/block_style', $atts );
$popup  = fw_akg( 'popup', $atts, 'no' );

$width  = fw_akg( 'size/width', $atts, '' );
$height = fw_akg( 'size/height', $atts, '' );
$crop   = fw_akg( 'size/crop', $atts, false );

$columns       = fw_akg( 'gallery/grid/columns_number', $atts, false );
$gallery_class = 'no' === fw_akg( 'gallery/grid/space', $atts, 'no' ) ? 'nopadding' : '';


$slider_infinity = fw_akg( 'gallery/slider/slider_infinity', $atts );
$per_page        = fw_akg( 'gallery/slider/slides_per_page', $atts );
$autoplay        = fw_akg( 'gallery/slider/autoplay', $atts );
$autoplay        = ! empty( $autoplay ) ? $autoplay . '000' : '0';

$add_class     = fw_akg( 'add_class', $atts );
$margin_bottom = fw_akg( 'margin_class', $atts, '' );
if ( ! empty( $margin_bottom ) ) {
	$add_class .= ' custom-space col-sm-' . $margin_bottom;
}
$add_style       = fw_akg( 'inline_style', $atts );

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
<?php if ( ! empty( $images ) ) { ?>
	<div class="crumina-block <?php echo esc_attr( $add_class ) ?>" <?php echo( $custom_style ) ?> <?php echo( $animation_data ) ?>>
		<?php if ( 'grid' === $style ) { ?>
			<div class="gallery gallery-columns-<?php echo esc_attr( $columns ) ?> <?php echo esc_attr( $gallery_class ) ?>">
				<?php foreach ( $images as $single_image ) {
					$url = fw_resize( $single_image['url'], $width, $height, $crop );
					$alt = get_post_meta( $single_image['attachment_id'], '_wp_attachment_image_alt', true );
					?>
					<figure class="gallery-item">
						<div class="gallery-icon">
							<?php if ( 'yes' === $popup ) { ?>
								<a class="presentation-item mouseover" href="<?php echo esc_url( $single_image['url'] ) ?>">
									<?php echo fw_html_tag( 'img', array( 'src' => $url, 'width' => $width, 'height' => $height, 'alt' => $alt ) ); ?>
									<span class="mouseover-helper-frame"></span>
									<span class="mouseover-helper-icon"></span>
								</a>
							<?php } else {
								echo '<span class="overlay-thumbnail">';
								echo fw_html_tag( 'img', array( 'src' => $url, 'width' => $width, 'height' => $height, 'alt' => $alt ) );
								echo fw_html_tag( 'img', array( 'src' => $url, 'width' => $width, 'height' => $height, 'alt' => $alt ) );
								echo '</span>';
							} ?>
						</div>
					</figure>
				<?php } ?>
			</div>
		<?php } else { ?>
			<div class="swiper-container image--slider" data-autoplay="<?php echo esc_attr( $autoplay ) ?>" data-loop="<?php echo esc_attr( $slider_infinity ) ?>"
			     data-center="0" data-auto-height="false" data-slides-per-view="<?php echo esc_attr( $per_page ) ?>" data-breakpoints="1" data-xs-slides="1" data-sm-slides="3" data-md-slides="4" data-parallax="0"
			     data-ini="0">
				<div class="swiper-button-prev swiper-button hidden"></div>
				<div class="swiper-button-next swiper-button hidden"></div>
				<div class="swiper-wrapper">

					<?php foreach ( $images as $single_image ) {
						$url = fw_resize( $single_image['url'], $width, $height, $crop );
						$alt = get_post_meta( $single_image['attachment_id'], '_wp_attachment_image_alt', true );
						?>

						<div class="swiper-slide">
							<figure>
								<?php if ( 'yes' === $popup ) { ?>
									<a class="presentation-item mouseover" href="<?php echo esc_url( $single_image['url'] ) ?>">
										<?php echo fw_html_tag( 'img', array( 'src' => $url, 'width' => $width, 'height' => $height, 'alt' => $alt ) ); ?>
										<span class="mouseover-helper-frame"></span>
										<span class="mouseover-helper-icon"></span>
									</a>
								<?php } else {
									echo fw_html_tag( 'img', array( 'src' => $url, 'width' => $width, 'height' => $height, 'alt' => $alt ) );
								} ?>
							</figure>
						</div>

					<?php } ?>

				</div>
				<div class="swiper-pagination relative-pagination"></div>
			</div>
		<?php } ?>
	</div>
<?php } ?>
