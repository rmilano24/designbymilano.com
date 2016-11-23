<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */


$post_thumbnail_url = $post_resized_thumb = $item_width = '';

$the_id       = get_the_ID();
$hide_addinfo = get_query_var( 'hide_addinfo', false );

if ( has_post_thumbnail() ) {
	$post_thumbnail_id  = get_post_thumbnail_id( $the_id );
	$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
	$post_resized_thumb = fw_resize( $post_thumbnail_url, 360, 250, true );

}

$the_terms   = get_the_terms( $the_id, 'category' );
$cat_array   = $cat_names = array();
$cat_array[] = 'sorting-item';

if ( 0 === $counter % 4 ) {
	$item_width         = 'size-2';
	$post_resized_thumb = fw_resize( $post_thumbnail_url, 750, 250, true );
} elseif ( ( 0 === $counter % 6 ) || ( 0 === $counter % 7 ) ) {
	$item_width         = 'size-1';
	$post_resized_thumb = fw_resize( $post_thumbnail_url, 555, 250, true );
}

if ( $the_terms && ! is_wp_error( $the_terms ) ) :
	foreach ( $the_terms as $the_term ) {
		$cat_array[] = esc_html( $the_term->slug );
	}
endif;
$cat_array = implode( ' ', $cat_array );

$header_bg = ( ! empty( $post_resized_thumb ) ) ? 'background-image: url(' . esc_url( $post_resized_thumb ) . ')' : 'background-color: #9E9E9E';
?>

<div class="<?php echo esc_attr( $item_width ); ?> <?php echo esc_attr( $cat_array ); ?>">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-landing-entry-1 js-equal-height' ); ?>>
		<a class="mouseover" style="<?php echo esc_attr( $header_bg ) ?>" href="<?php the_permalink(); ?>">
			<?php if ( ! empty( $post_resized_thumb ) ){ ?>
				<img src="<?php echo esc_attr( $post_resized_thumb ) ?>" alt="<?php the_title();?>">
			<?php } ?>
			<span class="mouseover-helper-icon"></span>
		</a>
		<div class="blog-icons">
			<div class="row">
				<div class="col-xs-4">
					<div class="simple-article small light transparent"><?php echo modesto_posted_additional(); ?></div>
				</div>
				<?php
				if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && modesto_categorized_blog() ) :
					echo '<div class="col-xs-8 col-xs-text-right"><div class="blog-category">';
					echo modesto_post_category_list( $the_id, '', true );
					echo '</div> </div>';
				endif;
				?>
			</div>
		</div>
		<div class="description">
			<div class="title">
				<?php the_title( '<a class="h4 small blog-mouseover-2" href="' . esc_url( get_permalink() ) . '" rel="bookmark"><b>', '</b></a>' ); ?>
			</div>
			<div class="empty-space col-xs-b15"></div>
			<?php if ( true !== $hide_addinfo ) { ?>
				<div class="simple-article grey small blog-light-color"><?php echo modesto_posted_author(); ?> / <?php echo modesto_posted_on(); ?></div>
			<?php } ?>
		</div>
	</article><!-- #post-## -->
</div>