<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */

$hide_addinfo = get_query_var( 'hide_addinfo', false );
$text_class   = $post_class = '';
if ( has_post_thumbnail() && ( ! is_home() ) ) {
	$post_thumbnail_id  = get_post_thumbnail_id( get_the_ID() );
	$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
	$text_class         = 'light';
} else {
	$post_class = ' no-thumbnail';
}

$header_bg = ( ! empty( $post_thumbnail_url ) ) ? 'background-image: url(' . $post_thumbnail_url . ')' : ''; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-landing-entry-4' . $post_class ); ?>>

	<?php if ( is_home() ) { ?>
		<?php the_post_thumbnail( 'large' ); ?>
		<div class="empty-space col-xs-b15 col-md-b30"></div>
	<?php } elseif ( ! empty( $header_bg ) ) { ?>
		<div class="background full-size" style="<?php echo esc_attr( $header_bg ) ?>"></div>
	<?php } ?>

	<div class="blog-icons">
		<div class="row">
			<div class="col-xs-4">
				<?php if ( true !== $hide_addinfo ) { ?>
					<div class="simple-article small <?php echo esc_attr( $text_class ); ?> transparent"><?php echo modesto_posted_additional(); ?></div>
				<?php } ?>
			</div>
			<div class="col-xs-8 col-xs-text-right">
				<?php
				if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && modesto_categorized_blog() ) :
					echo '<div class="blog-category">';
					echo modesto_post_category_list();
					echo '</div>';
				endif;
				?>
			</div>
		</div>
	</div>
	<div class="description">
		<?php the_title( '<a class="h3 ' . esc_attr( $text_class ) . ' blog-mouseover-1" href="' . esc_url( get_permalink() ) . '" rel="bookmark"><b>', '</b></a>' ); ?>
		<div class="empty-space col-xs-b15"></div>
		<?php if ( true !== $hide_addinfo ) { ?>
			<div class="simple-article small <?php echo esc_attr( $text_class ); ?> transparent"><?php echo modesto_posted_author(); ?> / <?php echo modesto_posted_on(); ?></div>
		<?php } ?>
	</div>
	<?php if ( ! has_post_thumbnail() ) { ?>
		<div class="empty-space col-xs-b15 col-md-b30"></div>
		<div class="simple-article">
			<?php if ( is_search() ) {
				the_excerpt();
			} else {
				the_content();
			} ?>
		</div>
	<?php } ?>
	<?php
	wp_link_pages( array(
		'before' => '<hr>' . __( 'Pages:', 'modesto' ),
		'after'  => '',
	) );
	?>
</article><!-- #post-## -->
<div class="empty-space col-xs-b30 col-sm-b60"></div>

