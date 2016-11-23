<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */
if ( 'page-templates/blog.php' === get_page_template_slug() ) {
	$hide_addinfo  = ( function_exists( 'fw_get_db_post_option' ) ) ? fw_get_db_post_option( get_the_ID(), 'blog_style/classic/hide_addinfo', false ) : false;
	$show_sidebar  = ( function_exists( 'fw_get_db_post_option' ) ) ? fw_get_db_post_option( get_the_ID(), 'blog_style/classic/sidebar/enable', 'yes' ) : 'yes';
	$sidebar_align = ( function_exists( 'fw_get_db_post_option' ) ) ? fw_get_db_post_option( get_the_ID(), 'blog_style/classic/sidebar/yes/align', 'right' ) : 'right';
} else {
	$hide_addinfo  = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'blog_style/classic/hide_addinfo', false ) : false;
	$show_sidebar  = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'blog_style/classic/sidebar/enable', 'yes' ) : 'yes';
	$sidebar_align = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'blog_style/classic/sidebar/yes/align', 'right' ) : 'right';
}
$content_class = ( 'yes' === $show_sidebar ) ? 'col-md-8' : 'col-md-12';
$sidebar_class = 'col-md-4';


if ( ( 'yes' === $show_sidebar ) && 'left' === $sidebar_align ) {
	$content_class .= ' col-md-push-4';
	$sidebar_class .= ' col-md-pull-8';
}

set_query_var( 'hide_addinfo', $hide_addinfo );

// The Query
$args              = get_query_var( 'query_arguments', array() );
if ( empty( $args ) ) {
	global $wp_query;
	$the_query = $wp_query;
} else {
	$the_query = new WP_Query( $args );
}

?>
	<div id="content" class="site-content <?php echo esc_attr( $content_class ) ?>" role="main">
		<?php
		if ( $the_query->have_posts() ) : ?>
			<div class="post-loop">
				<?php while ( $the_query->have_posts() ) : $the_query->the_post();
					get_template_part( 'content' );
				endwhile; ?>
			</div>
			<div class="empty-space col-xs-b60"></div>
			<?php modesto_paging_nav( $the_query ); ?>
		<?php else :
			// If no content, include the "No posts found" template.
			get_template_part( 'content', 'none' );

		endif;
		?>

	</div>
<?php if ( 'yes' === $show_sidebar ) { ?>
	<aside class="<?php echo esc_attr( $sidebar_class ); ?>">
		<?php get_sidebar(); ?>
	</aside>
<?php } ?>