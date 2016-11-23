<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

$slider_infinity = fw_akg( 'slider_infinity', $atts, 'off' );
$slides_per_page = fw_akg( 'slides_per_page', $atts, 1 );
$autoplay        = fw_akg( 'autoplay', $atts, 0 );
$slides          = fw_akg( 'slides', $atts );

$small = $medium = 1;
if ( ! empty( $slides_per_page ) && $slides_per_page < 4 && $slides_per_page > 1 ) {
	$medium = $slides_per_page - 1;
	$small  = $slides_per_page - 2;
} elseif ( $slides_per_page === 1 ) {
	$medium = $small = 1;
}

$data_atts = array(
	'data-slides-per-view' => esc_attr( $slides_per_page ),
	'data-breakpoints'     => 1,
	'data-xs-slides'       => 1,
	'data-sm-slides'       => esc_attr( $small ),
	'data-md-slides'       => esc_attr( $medium ),
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
}else{
	$custom_style = '';
}
?>

<div class="crumina-block <?php echo esc_attr( $add_class ) ?>" <?php echo ( $custom_style ) ?>>

	<div class="swiper-container" <?php echo fw_attr_to_html( $data_atts ); ?>>

		<div class="swiper-button-prev swiper-button hidden"></div>
		<div class="swiper-button-next swiper-button hidden"></div>

		<div class="swiper-wrapper">

			<?php if ( ! empty( $slides ) ) {

				foreach ( $slides as $single_slide ) { ?>

					<div class="swiper-slide">
						<div class="text-center">
							<img class="blockquote-image" src="<?php echo esc_url( fw_resize( $single_slide['image']['url'], '125', '125' ) ) ?>" alt="">
							<div class="empty-space col-xs-b25"></div>
							<div class="h5 small"><b><?php echo esc_attr( $single_slide['testimonial'] ); ?></b></div>
							<div class="empty-space col-xs-b15"></div>
							<div class="simple-article grey">
								<span class="inline-indent"></span><?php echo esc_attr( $single_slide['author'] ); ?>
							</div>
						</div>
					</div>

				<?php }
			}
			?>

		</div><!--.swiper-wrapper-->
		<div class="swiper-pagination relative-pagination" style="margin-top: 20px;"></div>

	</div><!--.swiper-container-->

</div><!--.crumina-block-->