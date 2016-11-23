<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */

$portfolio_style = fw_akg( 'portfolio_style/style', $atts );

$show_filter  = $columns_number = $excerpt = $excerpt_length = $title_on_slide = $add_info = '';
$filter_style = $show_meta = $item_style = $read_more_text = '';

if ( 'hover_info' === $portfolio_style ) {
	$show_filter    = fw_akg( 'portfolio_style/hover_info/show_filter_panel', $atts );
	$columns_number = fw_akg( 'portfolio_style/hover_info/columns_number', $atts );
	$excerpt        = fw_akg( 'portfolio_style/hover_info/excerpt_settings/excerpt_show', $atts );
	$excerpt_length = fw_akg( 'portfolio_style/hover_info/excerpt_settings/yes/excerpt_length', $atts );
	$title_on_slide = fw_akg( 'portfolio_style/hover_info/title_on_slide', $atts );
	$add_info       = fw_akg( 'portfolio_style/hover_info/add_info', $atts );

	set_query_var( 'hover_info_desc', $add_info );
	set_query_var( 'hover_info_excerpt', $excerpt );
	set_query_var( 'hover_info_excerpt_length', $excerpt_length );
	set_query_var( 'hover_info_title_on_slide', $title_on_slide );

	if ( '3' === $columns_number ) {
		$folio_class = 'portfolio-1';
	} else {
		$folio_class = 'portfolio-7';
	}
} elseif ( 'hover_effect' === $portfolio_style ) {
	$show_filter    = fw_akg( 'portfolio_style/hover_effect/show_filter/show_filter_panel', $atts );
	$filter_style   = fw_akg( 'portfolio_style/hover_effect/show_filter/yes/filter_settings/filter_style', $atts );
	$select_title   = fw_akg( 'portfolio_style/hover_effect/show_filter/yes/filter_settings/select/title', $atts );
	$columns_number = fw_akg( 'portfolio_style/hover_effect/columns_number', $atts );
	$show_meta      = fw_akg( 'portfolio_style/hover_effect/show_meta', $atts );

	set_query_var( 'hover_effect_meta', $show_meta );
	set_query_var( 'hover_effects_columns_number', $columns_number );

	if ( '2' === $columns_number ) {
		$folio_class = 'portfolio-5';
	} else {
		$folio_class = 'portfolio-6';
	}
} elseif ( 'hover_effect_fullwidth' === $portfolio_style ) {
	$excerpt        = fw_akg( 'portfolio_style/hover_effect_fullwidth/excerpt_settings/excerpt_show', $atts );
	$excerpt_length = fw_akg( 'portfolio_style/hover_effect_fullwidth/excerpt_settings/yes/excerpt_length', $atts );
	$show_meta      = fw_akg( 'portfolio_style/hover_effect_fullwidth/show_meta', $atts );

	set_query_var( 'hover_fullwidth_show_excerpt', $excerpt );
	set_query_var( 'hover_fullwidth_excerpt_length', $excerpt_length );
	set_query_var( 'hover_fullwidth_show_meta', $show_meta );
} elseif ( 'extended' === $portfolio_style ) {
	$excerpt        = fw_akg( 'portfolio_style/extended/excerpt_settings/excerpt_show', $atts );
	$excerpt_length = fw_akg( 'portfolio_style/extended/excerpt_settings/yes/excerpt_length', $atts );
	$show_meta      = fw_akg( 'portfolio_style/extended/show_meta', $atts );

	$folio_class = 'portfolio-3';

	set_query_var( 'extended_show_excerpt', $excerpt );
	set_query_var( 'extended_excerpt_length', $excerpt_length );
	set_query_var( 'extended_show_meta', $show_meta );
} elseif ( 'fancy' === $portfolio_style ) {
	$show_meta = fw_akg( 'portfolio_style/fancy/show_meta', $atts );

	set_query_var( 'fancy_show_meta', $show_meta );
} elseif ( 'alter' === $portfolio_style ) {
	$excerpt        = fw_akg( 'portfolio_style/alter/excerpt_settings/excerpt_show', $atts );
	$excerpt_length = fw_akg( 'portfolio_style/alter/excerpt_settings/yes/excerpt_length', $atts );
	$read_more_text = fw_akg( 'portfolio_style/alter/excerpt_settings/yes/read_more_text', $atts );

	set_query_var( 'alter_show_excerpt', $excerpt );
	set_query_var( 'alter_excerpt_length', $excerpt_length );
	set_query_var( 'alter_readmore', $read_more_text );
} elseif ( 'grid' === $portfolio_style ) {
	$item_style     = fw_akg( 'portfolio_style/grid/grid_settings/item_style', $atts );
	$excerpt_length = fw_akg( 'portfolio_style/grid/grid_settings/hover_info/excerpt_length', $atts );
	$show_meta      = fw_akg( 'portfolio_style/grid/grid_settings/hover_effect/show_meta', $atts );
	$columns_number = fw_akg( 'portfolio_style/grid/columns_number', $atts );

	if ( 'hover_info' === $item_style ) {
		set_query_var( 'folio_grid_excerpt_length', $excerpt_length );
	} else {
		set_query_var( 'folio_grid_show_meta', $show_meta );
	}
	set_query_var( 'folio_grid_column_number', $columns_number );
}
$taxonomy_select = fw_akg( 'taxonomy_select', $atts );
$exclude         = fw_akg( 'exclude', $atts );
$order           = fw_akg( 'order', $atts );
$orderby          = fw_akg( 'orderby', $atts );
$per_page        = fw_akg( 'per_page', $atts );

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


$args = array(
	'post_type'      => 'fw-portfolio',
	'posts_per_page' => $per_page,
	'order'          => $order,
	'orderby'        => $orderby
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

if ( $porfolio_query->have_posts() ) {

	wp_enqueue_script( 'isotope-js' );
	wp_enqueue_script( 'modesto-parallax-js' );

	?>

	<div class="crumina-block-recent <?php echo esc_attr( $add_class ) ?>" <?php echo( $custom_style ) ?><?php echo( $animation_data ) ?>>

		<?php if ( 'alter' === $portfolio_style ) { ?>

			<div class="empty-space col-sm-b15"></div>

			<?php
			$i = 0;
			while ( $porfolio_query->have_posts() ): $porfolio_query->the_post();

				set_query_var( 'alter_count', $i );

				get_template_part( 'post-formats/portfolio/folio', 'alter' );

				$i ++;
				if ( 2 === $i ) {
					$i = 0;
				}

			endwhile;
			?>

			<div class="empty-space col-sm-b15"></div>

		<?php } elseif ( 'extended' === $portfolio_style ) { ?>

			<div class="sorting-menu style-1 text-center">
				<div class="responsive-filtration-title visible-xs">
					<i class="fa"></i><b><span class="text"><?php esc_attr_e( 'All', 'modesto' ); ?></span></b><i class="fa fa-angle-down"></i>
				</div>
				<ul class="responsive-filtration-toggle">
					<?php modesto_category_submenu( array(
						'taxonomy'   => 'fw-portfolio-category',
						'quicksand'  => true,
						'terms_args' => array( 'parent' => 0 ),
						'item_class' => 'extended'
					) ); ?>
				</ul>
			</div><!--.sorting-menu-->
			<div class="empty-space col-xs-b30 col-sm-b60"></div>

			<div class="sorting-container <?php echo esc_attr( $folio_class ) ?>">
				<div class="grid-sizer"></div>

				<?php
				while ( $porfolio_query->have_posts() ): $porfolio_query->the_post();

					get_template_part( 'post-formats/portfolio/folio', 'extended' );

				endwhile; ?>

			</div><!--.sorting-container -->


		<?php } elseif ( 'fancy' === $portfolio_style ) {
			$i = 0;
			while ( $porfolio_query->have_posts() ): $porfolio_query->the_post();

				set_query_var( 'fancy_style', $i );

				get_template_part( 'post-formats/portfolio/folio', 'fancy' );

				$i ++;
				if ( 6 === $i ) {
					$i = 0;
				}

			endwhile;

		} elseif ( 'grid' === $portfolio_style ) {

			if ( 'hover_info' === $item_style ) {
				?>
				<div class="row nopadding">

					<?php
					if ( $porfolio_query->have_posts() ) {

						while ( $porfolio_query->have_posts() ): $porfolio_query->the_post();

							get_template_part( 'post-formats/portfolio/folio-grid', $item_style );

						endwhile;

					} ?>

				</div><!--.row-->
			<?php } elseif ( 'hover_effect' === $item_style ) { ?>

				<div class="empty-space col-xs-b55 col-sm-b110"></div>

				<?php
				if ( $porfolio_query->have_posts() ) {

					while ( $porfolio_query->have_posts() ): $porfolio_query->the_post();

						get_template_part( 'post-formats/portfolio/folio-grid', $item_style );

					endwhile;

				} ?>

			<?php }

		} elseif ( 'hover_effect' === $portfolio_style ) { ?>

			<?php if ( 'yes' === $show_filter ) { ?>
				<?php if ( 'select' === $filter_style ) { ?>
					<div class="row">
					<div class="col-md-6 col-xs-text-center col-md-text-left">
						<?php if ( isset( $select_title ) && ! empty( $select_title ) ) { ?>
							<div class="h2 small"><b><?php echo esc_attr( $select_title ) ?></b></div>
						<?php } ?>
					</div>
					<div class="col-md-6 col-xs-text-center col-md-text-right">
					<div class="sorting-menu style-2 text-left">
					<div class="responsive-filtration-title">
						<span class="text"><?php esc_attr_e( 'All', 'modesto' ); ?></span></div>
				<?php } else { ?>

					<div class="sorting-menu style-1 text-center">
					<div class="responsive-filtration-title visible-xs">
						<i class="fa"></i><b><span class="text"><?php esc_attr_e( 'All', 'modesto' ); ?></span></b><i class="fa fa-angle-down"></i>
					</div>
				<?php } ?>

				<ul class="responsive-filtration-toggle">
					<?php modesto_category_submenu( array(
						'taxonomy'   => 'fw-portfolio-category',
						'quicksand'  => true,
						'terms_args' => array( 'parent' => 0 ),
						'item_class' => 'extended'
					) ); ?>
				</ul>

				<?php if ( 'select' === $filter_style ) { ?>
					</div><!--.sorting-menu style-2 text-left-->
					</div><!--.col-md-6 col-xs-text-center col-md-text-right-->
					</div><!--.row-->
				<?php } else { ?>
					</div><!--.sorting-menu style-1 text-center-->
				<?php } ?>
			<?php } ?>

			<div class="empty-space col-xs-b30 col-sm-b60"></div>

			<div class="sorting-container <?php echo esc_attr( $folio_class ) ?>">
				<div class="grid-sizer"></div>
				<?php

				while ( $porfolio_query->have_posts() ): $porfolio_query->the_post();

					get_template_part( 'post-formats/portfolio/folio', 'hover_effect' );

				endwhile; ?>

			</div><!--.sorting-container -->

		<?php } elseif ( 'hover_effect_fullwidth' === $portfolio_style ) { ?>

			<div class="row">

				<div class="wide-container-fluid wide-paddings">

					<div class="sorting-menu style-1 text-center">
						<div class="responsive-filtration-title visible-xs">
							<i class="fa"></i><b><span class="text"><?php esc_attr_e( 'All', 'modesto' ); ?></span></b><i class="fa fa-angle-down"></i>
						</div>

						<ul class="responsive-filtration-toggle">
							<?php modesto_category_submenu( array(
								'taxonomy'   => 'fw-portfolio-category',
								'quicksand'  => true,
								'terms_args' => array( 'parent' => 0 ),
								'item_class' => 'extended'
							) ); ?>
						</ul>

					</div><!--.sorting-menu style-1 text-center-->

					<div class="empty-space col-xs-b30 col-sm-b60"></div>

					<div class="sorting-container portfolio-2">
						<div class="grid-sizer"></div>

						<?php


						while ( $porfolio_query->have_posts() ): $porfolio_query->the_post();

							get_template_part( 'post-formats/portfolio/folio', 'hover_effect_fullwidth' );

						endwhile; ?>


					</div><!--.sorting-container -->
				</div><!--.wide-container-fluid-->

			</div><!--.row-->

		<?php } elseif ( 'hover_info' === $portfolio_style ) { ?>

			<?php if ( 'yes' === $show_filter ) { ?>

				<div class="sorting-menu style-1 text-center">
					<div class="responsive-filtration-title visible-xs">
						<i class="fa"></i><b><span class="text"><?php esc_attr_e( 'All', 'modesto' ); ?></span></b><i class="fa fa-angle-down"></i>
					</div>

					<ul class="responsive-filtration-toggle">
						<?php modesto_category_submenu( array(
							'taxonomy'   => 'fw-portfolio-category',
							'quicksand'  => true,
							'terms_args' => array( 'parent' => 0 ),
							'item_class' => 'extended'
						) ); ?>
					</ul>
				</div><!--.sorting-menu-->

				<div class="empty-space col-xs-b30 col-sm-b60"></div>

			<?php } ?>

			<div class="sorting-container <?php echo esc_attr( $folio_class ) ?>">
				<div class="grid-sizer"></div>
				<?php

				while ( $porfolio_query->have_posts() ): $porfolio_query->the_post();

					get_template_part( 'post-formats/portfolio/folio', 'hover_info' );

				endwhile; ?>

			</div><!--.sorting-container -->

		<?php } else {
			$j = 1;
			while ( $porfolio_query->have_posts() ): $porfolio_query->the_post();
				if ( $j === $porfolio_query->post_count ) {
					set_query_var( 'list_last', 'yes' );
				} else {
					set_query_var( 'list_last', 'no' );
				}
				get_template_part( 'post-formats/portfolio/folio', 'list' );
				$j ++;
			endwhile;
		} ?>

	</div><!--.crumina-block-->

	<?php wp_reset_postdata(); ?>

<?php }