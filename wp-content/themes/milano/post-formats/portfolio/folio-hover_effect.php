<?php
$show_meta      = get_query_var( 'hover_effect_meta' );
$columns_number = get_query_var( 'hover_effects_columns_number' );

if ( '3' === $columns_number ) {
	$columns_class = 'style-1';
	$width = '550';
	$height = '424';
} else {
	$columns_class = '';
	$width = '571';
	$height = '500';
}

$portfolio_categories = wp_get_post_terms( get_the_ID(), 'fw-portfolio-category' );
$display_cats         = $filters = array();
if ( ! is_wp_error( $portfolio_categories ) ) {
	foreach ( $portfolio_categories as $single_cat ) {
		$display_cats[] = '<a href="' . esc_url( get_term_link( $single_cat->term_id ) ) . '">' . $single_cat->name . '</a>';
		$filters[]      = $single_cat->slug;
	}
	$display_cats = array_slice( $display_cats, 0, 2 );
}

$display_cats = implode( ' / ', $display_cats );

if ( has_post_thumbnail( get_the_ID() ) ) {
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
} else {
	$thumb[0] = get_template_directory_uri() . '/images/no-image.png';
}

if ( isset($show_excerpt) && 'yes' === $show_excerpt ) {

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

<div class="sorting-item <?php echo esc_attr( implode( ' ', $filters ) ) ?>">
	<div class="portfolio-landing-entry-1 <?php echo esc_attr( $columns_class ) ?>">
		<a class="mouseover poster-3d " data-offset="5" href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>" style="background-image: url(<?php echo esc_url( fw_resize( $thumb[0], $width, $height, true ) ) ?>);">
                            <span class="layer-1 full-size" data-offset="10">
                                <span class="mouseover-helper-frame"></span>
                            </span>
                            <span class="layer-1 full-size" data-offset="20">
                                <span class="mouseover-helper-icon"></span>
                            </span>
		</a>
		<div class="text-content">
			<div class="row">
				<div class="col-md-6 col-xs-text-center col-md-text-left">
					<div class="h5">
						<b><a class="mouseover-simple size-1" href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>"><?php echo esc_attr( get_the_title( get_the_ID() ) ) ?></a></b>
					</div>
				</div>
				<?php if ( 'on' === $show_meta ) { ?>
					<div class="col-md-6 col-xs-text-center col-md-text-right">
						<div class="simple-article grey small"><?php echo( $display_cats ) ?></div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>