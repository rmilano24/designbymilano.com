<?php

$show_excerpt   = get_query_var( 'hover_fullwidth_show_excerpt' );
$excerpt_length = get_query_var( 'hover_fullwidth_excerpt_length' );
$show_meta      = get_query_var( 'hover_fullwidth_show_meta' );

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

<div class="sorting-item <?php echo esc_attr( implode( ' ', $filters ) ) ?>">
	<div class="portfolio-landing-entry-1 style-2">
		<a class="mouseover poster-3d " data-offset="5" href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>" style="background-image: url(<?php echo esc_url( fw_resize( $thumb[0], '795', '500', true ) ) ?>);">
                            <span class="layer-1 full-size" data-offset="10">
                                <span class="mouseover-helper-frame"></span>
                            </span>
                            <span class="layer-1 full-size" data-offset="20">
                                <span class="mouseover-helper-icon"></span>
                            </span>
		</a>
		<div class="text-content text-center">
			<?php if ( 'on' === $show_meta ) { ?>
				<div class="simple-article small grey"><?php echo( $display_cats ) ?></div>
				<div class="empty-soace col-xs-b15"></div>
			<?php } ?>
			<div class="h5">
				<b><a class="mouseover-simple size-1" href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>"><b><?php echo esc_attr( get_the_title( get_the_ID() ) ) ?></b></a></b>
			</div>
			<?php if ( 'yes' === $show_excerpt ) { ?>
				<div class="empty-space col-xs-b5"></div>
				<div class="simple-article grey"><?php echo( $display_excerpt ) ?></div>
			<?php } ?>
		</div>
	</div>
</div>