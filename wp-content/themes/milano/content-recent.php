<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */

$hide_addinfo = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'hide-post-meta', false ) : false;

if ( has_post_thumbnail() ) {
	$post_thumbnail_id  = get_post_thumbnail_id( get_the_ID() );
	$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );

	$thumb_html = '<img src="' . esc_url( fw_resize( $post_thumbnail_url, 140, 140, true ) ) . '" alt="' . get_the_title() . '">';

} ?>

<div class="popular-entry clearfix">
	<a class="overlay-thumbnail" href="<?php the_permalink(); ?>">
		<?php
		if ( has_post_thumbnail() ) {
			echo ( $thumb_html . $thumb_html );
		} else {
			echo '<span class="overlay-thumbnail no-image"><i class="fa fa-newspaper-o" aria-hidden="true"></i></span>';
		} ?>
	</a>
	<div class="description">
		<?php if ( true !== $hide_addinfo ) { ?>
			<div class="simple-article small grey blog-light-color"><?php echo modesto_posted_on(); ?></div>
		<?php } ?>
		<div class="empty-space col-xs-b10"></div>
		<?php the_title( '<a class="h5 blog-mouseover-2" href="' . esc_url( get_permalink() ) . '" rel="bookmark"><b>', '</b></a>' ); ?>
		<div class="empty-space col-xs-b15"></div>
		<?php if ( true !== $hide_addinfo ) { ?>
			<div class="simple-article small grey blog-light-color"><?php echo modesto_posted_author(); ?></div>
		<?php } ?>
	</div>
</div>