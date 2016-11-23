<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

global $postallowedtags;

/**
 * @var array $atts
 */

$block_style = fw_akg( 'block_style/style', $atts, 'square' );

$square_columns = fw_akg( 'block_style/square/columns', $atts );
$square_items   = fw_akg( 'block_style/square/items', $atts );

$round_options = fw_akg( 'block_style/round', $atts );
$round_items   = fw_akg( 'block_style/round/items', $atts );

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

$animation = fw_akg('animation',$atts);
if(!empty($animation)){
	wp_enqueue_script( 'modesto-aos-animation' );
	$animation_data = 'aos="'.esc_attr($animation).'"';
}else{
	$animation_data = '';
}

?>

<div class="crumina-block-service <?php echo esc_attr( $add_class ) ?>" <?php echo( $custom_style ) ?> <?php echo( $animation_data ) ?>>

	<?php if ( ! empty( $block_style ) && 'round' === $block_style ) { ?>

		<div class="container hidden-xs">

			<div class="row nopadding">

				<?php if ( ! empty( $round_items ) ) {

					$item_count = count( $round_items );
					switch ( $item_count ) {
						case 1:
							$column = 12;
							break;
						case 2:
							$column = 6;
							break;
						case 3:
							$column = 4;
							break;
						case 4:
							$column = 3;
							break;
						case 5:
							$column = 2;
							break;
						case 6:
							$column = 2;
					}

					foreach ( $round_items as $single_item ) {
						$item_color_class = empty( $single_item['color'] ) ? 'light' : '';
						?>

						<div class="col-sm-<?php echo esc_attr( $column ) ?> services-banner-icon-wrapper">
							<div class="services-banner-icon-entry <?php echo esc_attr($item_color_class); ?>" style="color: <?php echo esc_attr( $single_item['color'] ) ?>;">
								<?php if ( 'image' === $single_item['img_style']['type'] && ! empty( $single_item['img_style']['image']['img']['url'] ) ) { ?>
									<img src="<?php echo esc_url( fw_resize( $single_item['img_style']['image']['img']['url'], '150', '150' ) ) ?>" alt="">
								<?php } else { ?>
									<i class="<?php echo esc_attr( $single_item['img_style']['icon']['icn'] ) ?>"></i>
								<?php } ?>
								<div class="services-banner-icon-text">
									<div class="visible-1">
										<h6 class="h6 <?php echo esc_attr( $single_item['text_color'] ) ?> text-uppercase">
											<b><?php echo esc_attr( $single_item['title'] ) ?></b></h6>
									</div>
									<div class="visible-2">
										<div class="simple-article <?php echo esc_attr( $single_item['text_color'] ) ?> transparent">
											<?php echo wp_kses( wpautop( $single_item['description'] ), $postallowedtags ); ?>
										</div>
									</div>
								</div>
							</div>
						</div>

					<?php }

				} ?>

			</div><!--.row nopadding-->

		</div><!--.container hidden-xs-->

	<?php } else { ?>

		<div class="services-square-wrapper clearfix columns-<?php echo esc_attr( $square_columns ) ?>">

			<?php if ( ! empty( $square_items ) ) {

				foreach ( $square_items as $single_item ) {
					?>

					<div class="services-square-entry">
						<div class="content">
							<div class="layer-1 full-size valign-middle">
								<div class="valign-text-wrapper">
									<?php if ( 'image' === $single_item['img_style']['type'] && ! empty( $single_item['img_style']['image']['img']['url'] ) ) { ?>
										<img class="col-xs-b15" src="<?php echo esc_url( fw_resize( $single_item['img_style']['image']['img']['url'], '70', '60' ) ) ?>" alt="">
										<br>
									<?php } else { ?>
										<div class="col-xs-b15">
											<i class="<?php echo esc_attr( $single_item['img_style']['icon']['icn'] ) ?>"></i>
										</div>
									<?php } ?>
									<div class="h5"><b><?php echo esc_attr( $single_item['title'] ) ?></b></div>
								</div>
							</div>
							<div class="layer-2 full-size valign-middle">
								<div class="valign-text-wrapper">
									<div class="h5 light"><b><?php echo esc_attr( $single_item['title'] ) ?></b></div>
									<div class="empty-space col-xs-b10"></div>
									<div class="simple-article light transparent">
										<?php echo wp_kses( wpautop( $single_item['description'] ), $postallowedtags ); ?>
									</div>
								</div>
							</div>
						</div>
					</div>

				<?php }

			} ?>

		</div><!--.services-square-wrapper clearfix-->

	<?php } ?>
</div><!--.crumina-block-->