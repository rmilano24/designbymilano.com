<?php
if ( has_post_thumbnail( get_the_ID() ) ) {
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
} else {
	$thumb[0] = get_template_directory_uri() . '/images/no-image.png';
}
$last = get_query_var( 'list_last' );
?>
<div class="row">
	<div class="col-md-12">
		<a href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>" class="homepage-portfolio-preview mouseover" style="display: block;">
			<span class="image full-size" style="background-image: url(<?php echo esc_url( fw_resize( $thumb[0], '1170', '600', true ) ) ?>);"></span>
			<span class="mouseover-helper-frame"></span>
			<span class="text h2 small light"><b><?php echo esc_attr( get_the_title( get_the_ID() ) ) ?></b></span>
		</a>
	</div>
</div>

<?php if ( 'yes' === $last ) { ?>
	<div class="empty-space col-xs-b15 col-sm-b60"></div>
<?php } else { ?>
	<div class="empty-space col-xs-b15 col-sm-b110"></div>
<?php } ?>
