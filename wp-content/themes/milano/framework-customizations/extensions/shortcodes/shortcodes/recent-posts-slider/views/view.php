<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

$taxonomy_select = fw_akg( 'taxonomy_select', $atts );
$exclude         = fw_akg( 'exclude', $atts );
$order           = fw_akg( 'order', $atts, 'DESC' );
$orderby         = fw_akg( 'orderby', $atts, 'date' );
$per_page        = fw_akg( 'per_page', $atts, 10 );
$show_meta       = fw_akg( 'show_meta', $atts );
$show_readmore   = fw_akg( 'read_more_options/read_more_show', $atts );
$button_text     = fw_akg( 'read_more_options/1/button_text', $atts );
$slider_infinity = fw_akg( 'slider_infinity', $atts );
$slides_per_page = fw_akg( 'slides_per_page', $atts );
$autoplay        = fw_akg( 'autoplay', $atts );

if ( empty( $button_text ) ) {
	$button_text = esc_html__( 'read more', 'modesto' );
}

$args = array(
	'order'          => $order,
	'orderby'        => $orderby,
	'posts_per_page' => $per_page
);

if ( ! empty( $taxonomy_select ) ) {

	if ( '1' === $exclude ) {
		$args['category__not_in'] = $taxonomy_select;
	} else {
		$args['category__in'] = $taxonomy_select;
	}

}

$posts_query = new WP_Query( $args );

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
	'data-parallax'        => 2
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
<?php if ( $posts_query->have_posts() ) { ?>
	<div class="crumina-block <?php echo esc_attr( $add_class ) ?>" <?php echo ( $custom_style ) ?>>
		<div class="homepage-2-6-slider">
			<div class="swiper-container" <?php echo fw_attr_to_html( $data_atts ); ?>>
				<div class="swiper-button-prev swiper-button hidden-xs style-3 light"></div>
				<div class="swiper-button-next swiper-button hidden-xs style-3 light"></div>

				<div class="swiper-wrapper">

					<?php while ( $posts_query->have_posts() ): $posts_query->the_post() ?>

						<?php
						if ( has_post_thumbnail() ) {
							$post_thumbnail_id = get_post_thumbnail_id( get_the_ID());
							$thumb             = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
						} else {
							$thumb[0] = get_template_directory_uri() . '/images/no-image.png';
						} ?>

						<div class="swiper-slide">
							<div class="swiper-blog-entry full-size valign-middle">
								<div class="swiper-blog-entry-thumbnail full-size" style="background-image: url(<?php echo esc_url( fw_resize($thumb[0], '960', '600', true) ) ?>);"></div>
								<div class="valign-text-wrapper">
									<a class="h3 light blog-mouseover-1" href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>"><b><?php echo esc_attr( get_the_title( get_the_ID() ) ) ?></b></a>
									<?php if ( ! empty( $show_meta ) && ( '1' === $show_meta ) ) { ?>
										<div class="empty-space col-xs-b15"></div>
										<div class="simple-article light transparent"><?php echo esc_attr( get_the_author() ) ?> / <?php echo esc_attr( get_the_date( 'F d, Y' ) ) ?></div>
									<?php } ?>
									<?php if ( ! empty( $show_readmore ) && '1' === $show_readmore ) { ?>
										<div class="empty-space col-xs-b35"></div>
										<a href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>" class="button type-3 light"><?php echo esc_attr( $button_text ) ?></a>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php endwhile; ?>

				</div>
				<div class="swiper-pagination swiper-pagination-white visible-xs"></div>
			</div>
		</div>
	</div><!--.crumina-block-->
<?php } ?>