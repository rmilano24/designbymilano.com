<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */
if ( 'page-templates/blog.php' === get_page_template_slug() ) {
	$excerpt_length = ( function_exists( 'fw_get_db_post_option' ) ) ? fw_get_db_post_option( get_the_ID(), 'blog_style/grid/text_length', 20 ) : 20;
	$hide_addinfo   = ( function_exists( 'fw_get_db_post_option' ) ) ? fw_get_db_post_option( get_the_ID(), 'blog_style/grid/hide_addinfo', false ) : false;
	$show_sidebar   = ( function_exists( 'fw_get_db_post_option' ) ) ? fw_get_db_post_option( get_the_ID(), 'blog_style/grid/sidebar/enable', 'yes' ) : 'yes';
	$sidebar_align  = ( function_exists( 'fw_get_db_post_option' ) ) ? fw_get_db_post_option( get_the_ID(), 'blog_style/grid/sidebar/yes/align', 'right' ) : 'right';
} else {
	$excerpt_length = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'blog_style/grid/text_length', 20 ) : 20;
	$hide_addinfo   = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'blog_style/grid/hide_addinfo', false ) : false;
	$show_sidebar   = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'blog_style/grid/sidebar/enable', 'yes' ) : 'yes';
	$sidebar_align  = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'blog_style/grid/sidebar/yes/align', 'right' ) : 'right';
}

$content_class  = ( 'yes' === $show_sidebar ) ? 'col-md-8' : 'col-md-12';
$grid_class     = ( 'yes' === $show_sidebar ) ? 'col-md-6' : 'col-md-4';
$sidebar_class  = 'col-md-4';

if ( ( 'yes' === $show_sidebar ) && 'left' === $sidebar_align ) {
	$content_class .= ' col-md-push-4';
	$sidebar_class .= ' col-md-pull-8';
}

set_query_var( 'excerpt_length', intval( $excerpt_length ) );
set_query_var( 'hide_addinfo', $hide_addinfo );

// The Query
$args               = get_query_var( 'query_arguments', array() );
$the_query          = new WP_Query( $args );

?>
	<div class="empty-space col-xs-b25 col-sm-b50"></div>
	<div id="content" class="site-content <?php echo esc_attr( $content_class ) ?>" role="main">
		<?php
		if ( $the_query->have_posts() ) : ?>
			<div class="row">
				<?php while ( $the_query->have_posts() ) : $the_query->the_post();
					echo '<div class="' . esc_attr( $grid_class ) . ' col-sm-6 blog-entry-clear">';
					get_template_part( 'content', 'grid' );
					echo '<div class="empty-space col-xs-b30 col-sm-b60"></div></div>';
				endwhile; ?>
			</div>
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