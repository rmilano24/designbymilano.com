<?php
$desc_position  = get_query_var( 'hover_info_desc' );
$show_excerpt   = get_query_var( 'hover_info_excerpt' );
$excerpt_length = get_query_var( 'hover_info_excerpt_length' );
$slide_title    = get_query_var( 'hover_info_title_on_slide' );

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

if ( 'top' === $desc_position ) {
	$align_class = 'new-animation';
} else {
	$align_class = '';
}
?>
<div class="sorting-item <?php echo esc_attr( implode( ' ', $filters ) ) ?>">
	<div class="homepage-portfolio-preview-1 <?php echo esc_attr( $align_class ) ?>">
		<a href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>">
			<span class="background full-size" style="background-image: url(<?php echo esc_url( fw_resize( $thumb[0], '574', '574', true ) ) ?>);"></span>

			<?php if ( 'yes' === $slide_title ) { ?>
				<span class="label h4 light"><b><?php echo esc_attr( get_the_title( get_the_ID() ) ) ?></b></span>
			<?php } ?>

			<span class="text">
                                <span class="h4 light"><b><?php echo esc_attr( get_the_title( get_the_ID() ) ) ?></b></span>
				<?php if ( 'yes' === $show_excerpt ) { ?>
					<span class="empty-space col-xs-b15"></span>
					<span class="simple-article light transparent"><p><?php echo( $display_excerpt ) ?></p></span>
				<?php } ?>
                            </span>
		</a>
	</div>
</div>
