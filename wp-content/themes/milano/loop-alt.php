<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */

if ( 'page-templates/blog.php' === get_page_template_slug() ) {
	$excerpt_length = ( function_exists( 'fw_get_db_post_option' ) ) ? fw_get_db_post_option( get_the_ID(), 'blog_style/grid/text_length', 40 ) : 40;
	$hide_author    = ( function_exists( 'fw_get_db_post_option' ) ) ? fw_get_db_post_option( get_the_ID(), 'blog_style/alt/hide_author', false ) : false;
	$full_width     = ( function_exists( 'fw_get_db_post_option' ) ) ? fw_get_db_post_option( get_the_ID(), 'blog_style/alt/full_width', true ) : true;
} else {
	$excerpt_length = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'blog_style/grid/text_length', 40 ) : 40;
	$hide_author    = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'blog_style/alt/hide_author', false ) : false;
	$full_width     = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'blog_style/alt/full_width', true ) : true;
}


set_query_var( 'hide_author', $hide_author );
$content_class = 'col-md-12';

// The Query
$args      = get_query_var( 'query_arguments', array() );
$the_query = new WP_Query( $args );

if ( true === $full_width ) {
	echo '</div></div>'; // WPCS: XSS OK.
	$content_class = '';
} ?>
	<div id="content" class="site-content <?php echo esc_attr( $content_class ) ?>" role="main">
		<?php
		if ( $the_query->have_posts() ) :
			$i = 0;
			while ( $the_query->have_posts() ) : $the_query->the_post();
				set_query_var( 'counter', $i );
				get_template_part( 'content', 'alt' );
				$i ++;
			endwhile; ?>
			<div class="empty-space col-xs-b60"></div>
			<?php modesto_paging_nav( $the_query ); ?>

		<?php else :
			// If no content, include the "No posts found" template.
			get_template_part( 'content', 'none' );

		endif;
		?>
	</div>
<?php if ( true === $full_width ) {
	echo '<div class="container"><div class="row">'; // WPCS: XSS OK.
} ?>