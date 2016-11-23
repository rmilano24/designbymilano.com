<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

global $postallowedtags;

/**
 * @var array $atts
 */

$slider_infinity = fw_akg( 'slider_infinity', $atts, '0' );
$autoplay        = fw_akg( 'autoplay', $atts, '0' );

$textbox = fw_akg( 'slides/text', $atts );

$slides = fw_akg( 'slides/' . $textbox . '/slides', $atts );

$data_atts = array(
	'data-breakpoints' => 1,
	'data-xs-slides'   => 1,
	'data-sm-slides'   => 1,
	'data-md-slides'   => 1,
);

if ( ! empty( $slider_infinity ) ) {
	$data_atts['data-loop'] = '1';
} else {
	$data_atts['data-loop'] = '0';
}

if ( ! empty( $autoplay ) && ! ( 0 === $autoplay ) ) {
	$data_atts['data-autoplay'] = esc_attr( $autoplay ) . '000';
} else {
	$data_atts['data-autoplay'] = '0';
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
$slider_class = 'yes' === $textbox ? 'simple-slider style-1' : ''; ?>

<div class="crumina-block <?php echo esc_attr( $add_class ) ?>" <?php echo( $custom_style ) ?>>
	<div class="swiper-container <?php echo esc_attr( $slider_class ) ?>" data-parallax="1" <?php echo fw_attr_to_html( $data_atts ); ?>>
		<div class="swiper-button-prev swiper-button hidden-xs style-2"></div>
		<div class="swiper-button-next swiper-button hidden-xs style-2"></div>
		<div class="swiper-wrapper">
			<?php if ( ! empty( $slides ) ) {
				foreach ( $slides as $single_slide ) {
					if ( 'yes' === $textbox ) { ?>
						<div class="swiper-slide" style="background-image: url(<?php echo esc_url( $single_slide['image']['url'] ) ?>);">
							<?php if ( ! empty( $single_slide['title'] ) || ! empty( $single_slide['description'] ) ) { ?>
								<div class="frame-article-entry">
									<div class="frame-wrapper">
										<div class="frame full-size" data-swiper-parallax="-800"></div>
										<div class="cell-view">
											<div class="simple-article large light text-center" data-swiper-parallax="-400">
												<?php if ( ! empty( $single_slide['title'] ) ) { ?>
													<h1><b><?php echo esc_attr( $single_slide['title'] ) ?></b></h1>
												<?php } ?>
												<?php if ( ! empty( $single_slide['description'] ) ) { ?>
													<div class="empty-space col-xs-b10"></div>
													<?php echo wp_kses( wpautop( $single_slide['description'] ), $postallowedtags ); ?>
												<?php } ?>
											</div>
										</div><!--.cell-view-->
									</div>
								</div>
							<?php } ?>
						</div>
					<?php } else {
						$alt = get_post_meta($single_slide['attachment_id'], '_wp_attachment_image_alt', true);
						$src = $single_slide['url'];
						?>
						<div class="swiper-slide">
							<div class="portfolio-detail-entry">
								<img src="<?php echo esc_url( $src ) ?>" alt="<?php esc_attr( $alt ) ?>">
							</div>
						</div>
					<?php }
				}
			} ?>
		</div>
		<div class="swiper-pagination swiper-pagination-white"></div>
	</div>
</div><!--.crumina-block-->