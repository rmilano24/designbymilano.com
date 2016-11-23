<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */

global $allowedposttags;
$hide_author    = get_query_var( 'hide_author', false );
$excerpt_length = get_query_var( 'excerpt_length', 40 );
$counter        = get_query_var( 'counter', '0' );
$even_odd       = ( 0 === $counter % 2 ) ? 'even' : 'odd';
$post_content   = wp_kses( modesto_generate_short_excerpt( get_the_ID(), intval( $excerpt_length ) ), $allowedposttags );
$odd_class      = ( 'odd' === $even_odd ) ? ' new-view ' : '';

if ( has_post_thumbnail() ) {
	$post_thumbnail_id  = get_post_thumbnail_id( get_the_ID() );
	$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
}
$header_bg = ( ! empty( $post_thumbnail_url ) ) ? 'background-image: url(' . $post_thumbnail_url . ')' : '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-landing-entry-3 clearfix' . $odd_class ); ?>>
	<div class="left">
		<div class="full-size mouseover valign-middle" style="<?php echo esc_attr( $header_bg ); ?>">
			<span class="mouseover-helper-frame"></span>
			<div class="valign-text-wrapper">
				<div class="align">
					<div class="simple-article small light transparent"><?php echo modesto_posted_additional(); ?></div>
					<div class="empty-space col-xs-b15"></div>
					<?php the_title( '<a class="h3 light blog-mouseover-1" href="' . esc_url( get_permalink() ) . '" rel="bookmark"><b>', '</b></a>' ); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="middle-wrapper">
		<div class="simple-article light large"><?php echo get_the_date( 'M d' ); ?><br><?php echo get_the_date( 'Y' ); ?></div>
	</div>
	<div class="right clearfix">
		<div class="text">
			<div class="cell-view">
				<?php
				if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && modesto_categorized_blog() ) :
					echo '<div class="simple-article"><div class="inline-tags">';
					echo modesto_post_category_list( get_the_ID(), '&nbsp;/&nbsp;' );
					echo '</div></div><div class="empty-space col-xs-b15"></div>';
				endif;
				?>
				<div class="simple-article large grey"><?php echo wpautop( $post_content ); ?></div>
			</div>
		</div>
		<?php if ( false === $hide_author ) { ?>
			<div class="avatar-wrapper">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 105 ); ?>
				<div class="empty-space col-xs-b20"></div>
				<div class="simple-article grey small blog-light-color"><?php echo modesto_posted_author(); ?></div>
			</div>
		<?php } ?>
	</div>
</article><!-- #post-## -->


