<?php
$columns_number = get_query_var( 'folio_grid_column_number' );
$show_meta      = get_query_var( 'folio_grid_show_meta' );

if ( has_post_thumbnail( get_the_ID() ) ) {
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
} else {
	$thumb[0] = get_template_directory_uri() . '/images/no-image.png';
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

switch ( $columns_number ) {
	case 2:
		$width_class = '6';
		break;
	case 3:
		$width_class = '4';
		break;
	case 4:
		$width_class = '3';
		break;
	case 5:
		$width_class = '2';
		break;
	case 6:
		$width_class = '2';
		break;
}
?>
<div class="col-sm-<?php echo esc_attr( $width_class ) ?>">
	<div class="simple-image-entry">
		<a class="mouseover poster-3d" data-offset="5" href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>" style="background-image: url(<?php echo esc_url( fw_resize( $thumb[0], '575', '500', true ) ) ?>);">
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
				<?php if ( 'yes' === $show_meta ) { ?>
					<div class="col-md-6 col-xs-text-center col-md-text-right">
						<div class="simple-article grey small"><?php echo( $display_cats ) ?></div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="empty-space col-xs-b35 col-sm-b0"></div>
</div>
