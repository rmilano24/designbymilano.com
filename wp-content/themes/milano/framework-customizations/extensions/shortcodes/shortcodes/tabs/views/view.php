<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

global $allowedposttags;

/**
 * @var array $atts
 */

$tabs = fw_akg( 'tabs', $atts );

$titles_array = array();
if ( ! empty( $tabs ) ) {
	foreach ( $tabs as $single_tab ) {
		$titles_array[] = $single_tab['title'];
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

$animation = fw_akg( 'animation', $atts );
if ( ! empty( $animation ) ) {
	wp_enqueue_script( 'modesto-aos-animation' );
	$animation_data = 'aos="' . esc_attr( $animation ) . '"';
} else {
	$animation_data = '';
}
?>
<?php if ( ! empty( $tabs ) ) { ?>
	<div class="crumina-block <?php echo esc_attr( $add_class ) ?>" <?php echo( $custom_style ) ?> <?php echo( $animation_data ) ?>>
		<?php if ( ! empty( $titles_array ) ) { ?>
			<div class="sorting-menu style-1 text-center">
				<div class="responsive-filtration-title visible-xs">
					<i class="fa"></i><b><span class="text"><?php echo esc_attr( $titles_array[0] ) ?></span></b><i class="fa fa-angle-down"></i>
				</div>
				<ul class="responsive-filtration-toggle">
					<?php $i = 1; ?>
					<?php foreach ( $titles_array as $single_title ) { ?>
						<li>
							<a class="tab-menu <?php if ( 1 === $i ) {
								echo 'active';
							} ?>" data-tab-menu="1" data-tab="<?php echo esc_attr( $i ); ?>"><?php echo esc_attr( $single_title ) ?></a>
						</li>
						<?php $i ++; ?>
					<?php } ?>
				</ul><!--.responsive-filtration-toggle-->
			</div><!--.sorting-menu-->
		<?php } ?>
		<div class="empty-space col-xs-b30 col-sm-b60"></div>
		<?php $j = 1 ?>
		<?php foreach ( $tabs as $single_tab ) { ?>
			<div class="tab-entry" data-tab-menu="1" data-tab="<?php echo esc_attr( $j ); ?>" <?php if ( 1 === $j ) {
				echo 'style="display: block; opacity: 1;"';
			} ?>>

				<?php $enable_slider = fw_akg( 'tabs_content/slider', $single_tab, 'no' );
				if ( 'no' === $enable_slider ) {
					$slide_content        = fw_akg( 'tabs_content/no/content', $single_tab, array() );
					$slider_content_count = ( 0 === count( $slide_content ) ) ? 1 : count( $slide_content );
					$column_count         = 'col-md-' . intval( 12 / $slider_content_count ); ?>
					<div class="container">
						<div class="row">
							<?php foreach ( $slide_content as $item ) {
								$column_class = true === $item['border'] ? 'article-frame' : 'col-xs-b30 col-md-b0'; ?>
								<div class="<?php echo esc_attr( $column_count . ' ' . $column_class ); ?>">
									<h4 class="small"><?php echo esc_html( $item['title'] ); ?></h4>
									<br/>
									<div class="simple-article">
										<?php echo wp_kses( wpautop( $item['description'] ), $allowedposttags ); ?>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				<?php } else {
					$inner_slides   = fw_akg( 'tabs_content/yes/slide', $single_tab );
					$slider_options = fw_akg( 'tabs_content/yes/slider_options', $single_tab );
					$infinite       = isset( $slider_options['slider_infinity'] ) ? $slider_options['slider_infinity'] : 0;
					$infinite       = ( 'on' === $infinite ) ? 1 : 0;
					$autoscroll     = isset( $slider_options['on']['autoplay'] ) ? $slider_options['on']['autoplay'] : 0;
					$autoscroll     = intval( $autoscroll * 1000 );
					$arrows         = fw_akg( 'tabs_content/yes/arrows', $single_tab, true );
					$dots           = fw_akg( 'tabs_content/yes/dots', $single_tab, false );
					?>
					<div class="swiper-container swiper-text" data-auto-height="1" data-loop="<?php echo esc_attr( $infinite ); ?>" data-autoplay="<?php echo esc_attr( $autoscroll ); ?>">
						<?php if ( true === $arrows ) { ?>
							<div class="swiper-button-prev swiper-button visible-lg style-3"></div>
							<div class="swiper-button-next swiper-button visible-lg style-3"></div>
						<?php } ?>
						<div class="swiper-wrapper">
							<?php foreach ( $inner_slides as $single_inner_slide ) {
								$slide_content        = fw_akg( 'content', $single_inner_slide, array() );
								$slider_content_count = ( 0 === count( $slide_content ) ) ? 1 : count( $slide_content );
								$column_count         = 'col-md-' . intval( 12 / $slider_content_count );
								?>
								<div class="swiper-slide">
									<div class="container">
										<div class="row">
											<?php foreach ( $slide_content as $item ) {
												$column_class = true === $item['border'] ? ' article-frame' : ' col-xs-b30 col-md-b0'; ?>
												<div class="<?php echo esc_attr( $column_count . ' ' . $column_class ); ?>">
													<h4 class="small"><?php echo esc_html( $item['title'] ); ?></h4>
													<br/>
													<div class="simple-article">
														<?php echo wp_kses( wpautop( $item['description'] ), $allowedposttags ); ?>
													</div>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
							<?php } ?>
						</div><!--.swiper-wrapper-->
						<?php if ( true === $dots ) { ?>
							<div class="swiper-pagination col-xs-b20"></div>
						<?php } ?>
					</div><!--.swiper-container-->
				<?php } ?>
			</div><!--tab-entry-->
			<?php $j ++; ?>
		<?php } ?>
	</div><!--.crumina-block-->
<?php } ?>