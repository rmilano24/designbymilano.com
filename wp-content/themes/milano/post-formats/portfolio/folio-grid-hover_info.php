<?php

$excerpt_length = get_query_var( 'folio_grid_excerpt_length' );
$columns_number = get_query_var( 'folio_grid_column_number' );

if ( has_post_thumbnail( get_the_ID() ) ) {
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
} else {
	$thumb[0] = get_template_directory_uri() . '/images/no-image.png';
}

$excerpt = get_post_field( 'post_excerpt', get_the_ID() );
if ( isset( $excerpt ) && ! empty( $excerpt ) ) {
	$display_excerpt = wp_trim_words( $excerpt, $excerpt_length );
} else {
	$display_excerpt = wp_trim_words( get_the_content(), $excerpt_length );
}

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

<div class="col-sm-6 col-md-<?php echo esc_attr( $width_class ) ?>">
	<div class="homepage-portfolio-preview-1">
		<a href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>">
			<span class="background full-size" style="background-image: url(<?php echo esc_url( fw_resize( $thumb[0], '640', '640', true ) ) ?>);"></span>
			<span class="label h4 light"><b><?php echo esc_attr( get_the_title( get_the_ID() ) ) ?></b></span>
                            <span class="text">
                                <span class="h4 light"><b><?php echo esc_attr( get_the_title( get_the_ID() ) ) ?></b></span>
                                <span class="empty-space col-xs-b5"></span>
                                <span class="simple-article light transparent"><?php echo( $display_excerpt ) ?></span>
                            </span>
		</a>
	</div>
</div>
