<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
global $allowedposttags;

/**
 * @var array $atts
 */

$item_style        = fw_akg( 'item/item_style', $atts );
$bg_image          = fw_akg( 'bg_image', $atts );
$description       = fw_akg( 'item/extended/description', $atts );
$title             = fw_akg( 'title', $atts );
$hover_description = fw_akg( 'item/extended/hover_description', $atts );
$text_color        = fw_akg( 'item/extended/text_color', $atts );

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

$animation = fw_akg( 'animation', $atts );
if ( ! empty( $animation ) ) {
	wp_enqueue_script( 'modesto-aos-animation' );
	$animation_data = 'aos="' . esc_attr( $animation ) . '"';
} else {
	$animation_data = '';
}

?>

<div class="crumina-block <?php echo esc_attr( $add_class ) ?>" <?php echo( $custom_style ) ?> <?php echo( $animation_data ) ?>>

	<?php if ( 'simple' === $item_style ) { ?>
		<div class="col-md-12">
			<a href="#" class="homepage-portfolio-preview mouseover" style="display:block">
				<span class="image full-size" style="background-image: url(<?php echo esc_url( fw_resize( $bg_image['url'], '1140', '580', true ) ) ?>);"></span>
				<span class="mouseover-helper-frame"></span>
				<?php if ( ! empty( $title ) ) { ?>
					<span class="text h2 small light"><b><?php echo esc_attr( $title ) ?></b></span>
				<?php } ?>
			</a>
		</div>
	<?php } else { ?>
		<div class="services-preview-entry" style="background-image: url(<?php echo esc_url( $bg_image['url'] ) ?>);">

			<div class="content">

				<div class="align-1">
					<?php if ( ! empty( $title ) ) { ?>
						<div class="h4 <?php echo esc_attr( $text_color ) ?>"><b><?php echo esc_attr( $title ) ?></b>
						</div>
					<?php } ?>
					<div class="animation">
						<div class="empty-space col-xs-b15"></div>
						<div class="simple-article small <?php echo esc_attr( $text_color ) ?> transparent">
							<?php echo wp_kses( wpautop( $hover_description ), $allowedposttags ); ?>
						</div>
					</div>
				</div>
				<div class="align-2">
					<div class="simple-article <?php echo esc_attr( $text_color ) ?> transparent">
						<?php echo wp_kses( wpautop( $description ), $allowedposttags ); ?>
					</div>
				</div>

			</div><!--.content-->

		</div><!--.services-preview-entry-->
	<?php } ?>

</div><!--.crumina-block-->







