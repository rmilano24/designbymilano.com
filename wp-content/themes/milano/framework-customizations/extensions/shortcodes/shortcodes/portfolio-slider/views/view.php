<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */
$style    = fw_akg( 'style/slider_style', $atts );
$per_page = '2';
if ( 'standard' === $style ) {
	$show_excerpt   = fw_akg( 'style/standard/excerpt_settings/excerpt_show', $atts );
	$excerpt_length = fw_akg( 'style/standard/excerpt_settings/yes/excerpt_length', $atts );
	$read_more      = fw_akg( 'style/standard/excerpt_settings/yes/read_more_text', $atts, esc_html__( 'view more', 'modesto' ) );
	$show_meta      = fw_akg( 'style/standard/show_meta', $atts );
	$project_info   = fw_akg( 'style/standard/project_info', $atts );
} elseif ( 'description' === $style ) {
	$per_page       = fw_akg( 'style/description/slides_per_page', $atts, 2 );
	$show_excerpt   = fw_akg( 'style/description/excerpt_settings/excerpt_show', $atts );
	$excerpt_length = fw_akg( 'style/description/excerpt_settings/yes/excerpt_length', $atts );
	$show_meta      = $project_info = '';

} else {
	$show_excerpt   = '';
	$excerpt_length = '';
	$project_info   = '';
	$show_meta      = fw_akg( 'style/fullwidth/show_meta', $atts );
}

$slides_number   = fw_akg( 'items_number', $atts, 1 );
$slider_infinity = fw_akg( 'slider_infinity', $atts, '0' );
$autoplay        = fw_akg( 'autoplay', $atts, 0 );
$taxonomy_select = fw_akg( 'taxonomy_select', $atts );
$exclude         = fw_akg( 'exclude', $atts );
$order           = fw_akg( 'order', $atts );
$orderby         = fw_akg( 'orderby', $atts );

$add_class     = fw_akg( 'add_class', $atts );
$margin_bottom = fw_akg( 'margin_class', $atts, '' );
if ( ! empty( $margin_bottom ) ) {
	$add_class .= ' custom-space col-sm-' . $margin_bottom;
}
$add_style       = fw_akg( 'inline_style', $atts );

if ( empty( $read_more ) ) {
	$read_more = esc_html__( 'view more', 'modesto' );
}

if ( ! empty( $add_style ) ) {

	$custom_style = 'style="' . $add_style . '"';

} else {
	$custom_style = '';
}

$args = array(
	'post_type'      => 'fw-portfolio',
	'order'          => $order,
	'orderby'        => $orderby,
	'posts_per_page' => $slides_number
);

if ( ! empty( $taxonomy_select ) ) {
	if ( true == $exclude ) {
		$operator = 'NOT IN';
	} else {
		$operator = 'IN';
	}
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'fw-portfolio-category',
			'field'    => 'term_id',
			'terms'    => $taxonomy_select,
			'operator' => $operator,
		),
	);
}

$porfolio_query = new WP_Query( $args );

$data_atts = array(
	'data-breakpoints' => 1,
	'data-xs-slides'   => 1,
	'data-sm-slides'   => 1,
	'data-md-slides'   => 1,
);

if ( 'description' === $style ) {
	$data_atts['data-slides-per-view'] = $per_page;
} else {
	$data_atts['data-slides-per-view'] = 1;
}

$data_atts['data-loop'] = $slider_infinity;

if ( ! empty( $autoplay ) && ! ( 0 === $autoplay ) ) {
	$data_atts['data-autoplay'] = esc_attr( $autoplay ) . '000';
} else {
	$data_atts['data-autoplay'] = '0';
}

if ( $porfolio_query->have_posts() ) {
	?>

	<div class="crumina-block-slider <?php echo esc_attr( $add_class ) ?>" <?php echo( $custom_style ) ?>>

		<?php if ( 'standard' === $style ) { ?>
			<div class="page-height">
				<div class="homepage-14-container">
					<div class="homepage-14-slider">
						<div class="swiper-container" data-speed="1000" data-parallax="1" data-mousewheel="0" <?php echo fw_attr_to_html( $data_atts ); ?>>
							<div class="swiper-button-prev swiper-button hidden-xs style-2"></div>
							<div class="swiper-button-next swiper-button hidden-xs style-2"></div>

							<div class="swiper-wrapper">

								<?php while ( $porfolio_query->have_posts() ): $porfolio_query->the_post() ?>

									<?php
									if ( has_post_thumbnail() ) {
										$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
										$thumb             = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
									} else {
										$thumb[0] = get_template_directory_uri() . '/images/no-image.png';
									}
									$client = fw_get_db_post_option( get_the_ID(), 'client', '' );
									$team   = fw_get_db_post_option( get_the_ID(), 'team_box', '' );

									if ( 'yes' === $show_excerpt ) {
										$excerpt = get_post_field( 'post_excerpt', get_the_ID() );
										if ( isset( $excerpt ) && ! empty( $excerpt ) ) {
											$display_excerpt = wp_trim_words( $excerpt, $excerpt_length );
										} else {
											$display_excerpt = wp_trim_words( get_the_content(), $excerpt_length );
										}
									} else {
										$display_excerpt = '';
									}
									?>

									<div class="swiper-slide" style="background-image: url(<?php echo esc_url( $thumb[0] ) ?>);">
										<div class="full-size valign-middle">
											<div class="valign-text-wrapper text-center">
												<div class="slide-title h2 light" data-swiper-parallax="-800">
													<b><?php echo esc_attr( get_the_title( get_the_ID() ) ) ?></b></div>
												<div class="empty-space col-xs-b15"></div>
												<div class="banner-max-width">
													<div class="slide-description simple-article large light transparent" data-swiper-parallax="-400"><?php echo( $display_excerpt ); ?></div>
												</div>
												<div class="empty-space col-xs-b10"></div>
												<div data-swiper-parallax="-300">
													<a href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>" class="button-link light"><?php echo esc_attr( $read_more ) ?></a>
												</div>
											</div>
										</div>
										<div class="banner-text-bottom hidden-xs hidden-sm align-1 simple-article light transparent small" data-swiper-parallax="-60%">
											<?php if ( ! empty( $client ) && ( 'yes' === $show_meta ) ) { ?>
												<?php esc_html_e( 'For:', 'modesto' ) ?>
												<span style="color: #fff;"><?php echo esc_attr( $client ) ?></span>
											<?php } ?>
										</div>
										<div class="banner-text-bottom hidden-xs hidden-sm align-2 simple-article light transparent small" data-swiper-parallax="-80%">
											<?php echo _modesto_get_portfolio_categories( 'mouseover-simple' ) ?>
										</div>
										<div class="banner-text-bottom hidden-xs hidden-sm align-3 simple-article light transparent small" data-swiper-parallax="-100%">
											<?php if ( ! empty( $project_info ) && 'yes' === $project_info && ! empty( $team['team'] ) ) { ?>
												<div class="inside-align">
													<?php foreach ( $team['team'] as $team_member ) { ?>
														<?php echo esc_attr( $team_member['profession'] ) ?>
														<span style="color: #fff;"><?php echo esc_attr( $team_member['name'] ) ?></span>
														<br />
													<?php } ?>
												</div>
											<?php } ?>
										</div>
									</div>

								<?php endwhile; ?>

							</div>
							<div class="swiper-pagination swiper-pagination-white visible-xs"></div>
						</div>
					</div>
				</div>
			</div>

		<?php } elseif ( 'fullwidth' === $style ) { ?>

			<div class="homepage-2-2-slider">
				<div class="swiper-container" data-ini="1" <?php echo fw_attr_to_html( $data_atts ); ?>>
					<div class="swiper-button-prev swiper-button hidden-xs style-3"></div>
					<div class="swiper-button-next swiper-button hidden-xs style-3"></div>

					<div class="swiper-wrapper">

						<?php while ( $porfolio_query->have_posts() ): $porfolio_query->the_post(); ?>

							<?php
							if ( has_post_thumbnail() ) {
								$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
								$thumb             = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
							} else {
								$thumb[0] = get_template_directory_uri() . '/images/no-image.png';
							}
							$client = fw_get_db_post_option( get_the_ID(), 'client', '' );
							?>

							<div class="swiper-slide">
								<div class="background" style="background-image: url(<?php echo esc_url( fw_resize( $thumb[0], '1170', '600', true ) ) ?>);"></div>
								<div class="description">
									<div class="row">

										<div class="col-sm-4 hidden-xs">
											<?php if ( ! empty( $show_meta ) && 'yes' === $show_meta && ! empty( $client ) ) { ?>
												<div class="simple-article grey"><?php esc_html_e( 'For:', 'modesto' ) ?>
													<span style="color: #222;"><?php echo esc_attr( $client ) ?></span>
												</div>
											<?php } ?>
										</div>

										<div class="col-sm-4 text-center">
											<a class="h5 mouseover-simple"><b><?php echo esc_attr( get_the_title( get_the_ID() ) ) ?></b></a>
										</div>

										<div class="col-sm-4 text-right hidden-xs">
											<?php if ( ! empty( $show_meta ) && 'yes' === $show_meta ) { ?>
												<div class="simple-article grey"><?php echo _modesto_get_portfolio_categories() ?></div>
											<?php } ?>
										</div>

									</div>
								</div>
							</div>

						<?php endwhile; ?>

					</div>
					<div class="swiper-pagination swiper-pagination-white visible-xs"></div>
				</div>
			</div>

		<?php } else { ?>

			<div class="homepage-2-6-slider">
				<div class="swiper-container" <?php echo fw_attr_to_html( $data_atts ); ?> data-parallax="2">
					<div class="swiper-button-prev swiper-button hidden-xs style-3"></div>
					<div class="swiper-button-next swiper-button hidden-xs style-3"></div>

					<div class="swiper-wrapper">

						<?php while ( $porfolio_query->have_posts() ): $porfolio_query->the_post(); ?>

							<?php
							if ( has_post_thumbnail() ) {
								$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
								$thumb             = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
							} else {
								$thumb[0] = get_template_directory_uri() . '/images/no-image.png';
							}
							if ( 'yes' === $show_excerpt ) {
								$excerpt = get_post_field( 'post_excerpt', get_the_ID() );
								if ( isset( $excerpt ) && ! empty( $excerpt ) ) {
									$display_excerpt = wp_trim_words( $excerpt, $excerpt_length );
								} else {
									$display_excerpt = wp_trim_words( get_the_content(), $excerpt_length );
								}
							} else {
								$display_excerpt = '';
							}
							?>

							<div class="swiper-slide">
								<a class="entry full-size" href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>">
									<span class="background full-size" style="background-image: url(<?php echo esc_url( fw_resize( $thumb[0], '959', '600', true ) ) ?>);"></span>
                            <span class="text text-center">
                                <span class="slide-title h4 light"><b><?php echo esc_attr( get_the_title( get_the_ID() ) ) ?></b></span>
                                <span class="empty-space col-xs-b15"></span>
                                <span class="slide-description simple-article light transparent"><?php echo( $display_excerpt ) ?></span>
                            </span>
								</a>
							</div>

						<?php endwhile; ?>

					</div>
					<div class="swiper-pagination swiper-pagination-white visible-xs"></div>
				</div>
			</div>

		<?php } ?>

	</div><!--.crumina-block-->

<?php } ?>

<?php wp_reset_postdata(); ?>
