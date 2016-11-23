<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */

global $allowedposttags;
$excerpt_length = get_query_var( 'excerpt_length', 25 );
$hide_addinfo   = get_query_var( 'hide_addinfo', false );
$post_content   = wp_kses( modesto_generate_short_excerpt( get_the_ID(), intval( $excerpt_length ) ), $allowedposttags );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-landing-entry-2' ); ?>>
	<?php if ( has_post_thumbnail() ) {
		$post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
		<a class="mouseover" style="background-image: url(<?php echo esc_url( fw_resize( $post_thumbnail[0], '370', '270', true ) ); ?>);" href="<?php the_permalink(); ?>"><span class="mouseover-helper-icon"></span></a>
	<?php } else { ?>
		<a class="mouseover" href="<?php the_permalink(); ?>"><span class="overlay-thumbnail no-image"><i class="fa fa-newspaper-o" aria-hidden="true"></i></span></a>
	<?php } ?>

	<?php
	if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && modesto_categorized_blog() ) :
		echo '<div class="blog-icons col-xs-text-right"><div class="blog-category">';
		echo modesto_post_category_list();
		echo '</div></div>';
	endif;
	?>
	<div class="description js-equal-height">
		<div class="title">
			<?php the_title( '<a class="h4 small blog-mouseover-2" href="' . esc_url( get_permalink() ) . '" rel="bookmark"><b>', '</b></a>' ); ?>
		</div>
		<div class="empty-space col-xs-b10"></div>
		<?php if ( true !== $hide_addinfo ) { ?>
			<div class="simple-article grey small blog-light-color"><?php echo modesto_posted_on(); ?></div>
		<?php } ?>
		<div class="empty-space col-xs-b15"></div>
		<div class="simple-article grey small"><?php echo wpautop( $post_content ); ?></div>
	</div>
	<div class="data">
		<div class="left valign-middle">
			<div class="simple-article small grey blog-light-color">
				<?php echo modesto_posted_author(); ?>
			</div>
		</div>
		<div class="right text-center valign-middle">
			<div class="simple-article small grey blog-light-color"><?php echo modesto_posted_additional() ?></div>
		</div>
	</div>
</article><!-- #post-## -->
