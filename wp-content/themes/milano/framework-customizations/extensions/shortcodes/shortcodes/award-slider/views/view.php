<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */

if ( 'on' === $atts['slider_infinity'] ) {
	$data_loop = 'data-loop=1';
} else {
	$data_loop = 'data-loop=0';
}

if ( ! ( 0 === $atts['autoplay'] ) ) {
	$data_autoplay = 'data-autoplay=' . intval( $atts['autoplay'] ) . '000';
} else {
	$data_autoplay = 'data-autoplay=0';
}
$small = $medium = 1;

if ( $atts['slides_per_page'] < 4 && $atts['slides_per_page'] > 1 ) {
	$medium = $atts['slides_per_page'] - 1;
	$small  = $atts['slides_per_page'] - 2;
} elseif ( $atts['slides_per_page'] === 1 ) {
	$medium = $small = 1;
}
$slides = fw_akg( 'slides', $atts, array() );

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
	<div class="swiper-container awards-slider" data-slides-per-view="<?php echo esc_attr( $atts['slides_per_page'] ) ?>" data-breakpoints="1" data-xs-slides="1" data-sm-slides="<?php echo esc_attr( $small ) ?>" data-md-slides="<?php echo esc_attr( $medium ) ?>" data-parallax="0" data-ini="0" <?php echo esc_attr( $data_loop ) ?> <?php echo esc_attr( $data_autoplay ) ?>>

		<div class="swiper-button-prev swiper-button hidden"></div>
		<div class="swiper-button-next swiper-button hidden"></div>

		<div class="swiper-wrapper">
			<?php foreach ( $slides as $single_slide ) { ?>
				<div class="swiper-slide">
					<div class="content">
						<div class="entry">
							<div class="background full-size" style="background-image: url(<?php echo esc_url( $single_slide['background']['url'] ) ?>);"></div>
							<?php if ( ! empty( $single_slide['date'] ) ) { ?>
								<?php $date = explode( '-', $single_slide['date'] ); ?>
								<div class="award-date">
									<span><?php echo esc_attr( $date[0] ) ?></span> <?php echo esc_attr( $date[1] ) ?> <?php echo esc_attr( $date[2] ) ?>
								</div>
							<?php } ?>
							<div class="award-logo">
								<?php if ( 'award_image' === $single_slide['award']['style'] ) { ?>
									<?php if ( ! empty( $single_slide['award']['award_image']['image']['url'] ) ) { ?>
										<img src="<?php echo esc_url( $single_slide['award']['award_image']['image']['url'] ) ?>" alt="" />
									<?php } ?>
								<?php } else { ?>
									<?php
									$title       = fw_akg( 'award/text/award_title', $single_slide );
									$title_color = fw_akg( 'award/text/title_color', $single_slide );
									if ( ! empty( $title ) ) {
										?>
										<div class="h4 text-uppercase <?php echo esc_attr( $title_color ) ?>">
											<span><?php echo esc_attr( $title ) ?></span>
										</div>
									<?php }
									?>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div><!--swiper-wrapper-->
		<div class="swiper-pagination relative-pagination"></div>
	</div><!--swiper-container-->
</div>

