<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

global $postallowedtags;

/**
 * @var array $atts
 */

$slider_infinity = fw_akg( 'slider_infinity', $atts, '0' );
$autoplay        = fw_akg( 'autoplay', $atts, '0' );
$slides          = fw_akg( 'slides', $atts );

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
	$custom_style = 'style="' . $add_style . '"';
} else {
	$custom_style = '';
}
?>
<div class="crumina-block <?php echo esc_attr( $add_class ) ?>" <?php echo( $custom_style ) ?>>
	<div class="page-height">
		<div class="homepage-4-container">
			<div class="homepage-4-slider style-1">
				<div class="swiper-container" data-parallax="1" <?php echo fw_attr_to_html( $data_atts ); ?>>
					<div class="swiper-button-prev swiper-button hidden style-1"></div>
					<div class="swiper-button-next swiper-button hidden style-1"></div>
					<div class="swiper-wrapper">
						<?php if ( ! empty( $slides ) ) {
							foreach ( $slides as $single_slide ) {
								?>
								<?php $url = modesto_gen_link_for_shortcode( fw_akg( 'button/yes', $single_slide ) ); ?>
								<div class="swiper-slide" style="background-image: url(<?php echo esc_url( fw_resize( $single_slide['image']['url'], '1675', '800', true ) ) ?>);">
									<div class="full-size valign-middle">
										<div class="valign-text-wrapper text-center">
											<?php if ( ! empty( $single_slide['title'] ) ) { ?>
												<div class="slide-title h2 light" data-swiper-parallax="-800">
													<b><?php echo esc_attr( $single_slide['title'] ) ?></b></div>
												<div class="empty-space col-xs-b15"></div>
											<?php } ?>
											<?php if ( ! empty( $single_slide['description'] ) ) { ?>
												<div class="banner-max-width">
													<div class="slide-description simple-article large light transparent" data-swiper-parallax="-400"><?php echo wp_kses( wpautop( $single_slide['description'] ), $postallowedtags ); ?></div>
												</div>
												<div class="empty-space col-xs-b35"></div>
											<?php } ?>
											<div data-swiper-parallax="-300">
												<a href="<?php echo esc_url( $url['link'] ) ?>" target="<?php echo esc_attr( $url['target'] ) ?>" class="button type-3 light"><?php echo esc_attr( fw_akg( 'button/yes/button_text', $single_slide ) ) ?></a>
											</div>
										</div>
									</div>
								</div>
							<?php }
						} ?>
					</div>
					<div class="swiper-pagination swiper-pagination-white"></div>
				</div>
			</div><!--.homepage-4-slider style-1-->
		</div><!--.homepage-4-container-->
	</div><!--.page-height-->
</div><!--.crumina-block-->