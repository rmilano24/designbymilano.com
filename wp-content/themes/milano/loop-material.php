<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */

if ( 'page-templates/blog.php' === get_page_template_slug() ) {
	if (function_exists( 'fw_get_db_post_option' )){
		$enable_twitter = fw_get_db_post_option( get_the_ID(), 'blog_style/material/twitter/enable', false );
		$hide_addinfo   = fw_get_db_post_option( get_the_ID(), 'blog_style/material/hide_addinfo', false );
		$hide_sorting   = fw_get_db_post_option( get_the_ID(), 'blog_style/material/hide_sort', false );
		$blog_cat_array = fw_get_db_post_option( get_the_ID(), 'taxonomy_select', false );
		$exclude        = fw_get_db_post_option( get_the_ID(), 'exclude', false );	
	} else{
		$enable_twitter = $hide_addinfo = $hide_sorting = $blog_cat_array = $exclude = false;
	}
	$isotope_sort   = true;
} else {
	$enable_twitter = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'blog_style/material/twitter/enable', false ) : false;
	$hide_addinfo   = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'blog_style/material/hide_addinfo', false ) : false;
	$hide_sorting   = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'blog_style/material/hide_sort', false ) : false;
	$isotope_sort   = false;
}
$exclude = $replaced = false;


if ( 'yes' === $enable_twitter ) {
	if ( is_page_template( 'page-templates/blog.php' ) ) {
		$post_to_replace = fw_get_db_post_option( get_the_ID(), 'blog_style/material/twitter/yes/position', 5 );
		$user            = fw_get_db_post_option( get_the_ID(), 'blog_style/material/twitter/yes/user', 'crumina' );
		$count           = fw_get_db_post_option( get_the_ID(), 'blog_style/material/twitter/yes/number', 5 );
	} else {
		$post_to_replace = fw_get_db_settings_option( 'blog_style/material/twitter/yes/position', 5 );
		$user            = fw_get_db_settings_option( 'blog_style/material/twitter/yes/user', 'crumina' );
		$count           = fw_get_db_settings_option( 'blog_style/material/twitter/yes/number', 5 );
	}
} else {
	$post_to_replace = 0;
	$count           = $user = '';
}
if ( ! empty( $blog_cut_array ) ) {
	if ( true === $exclude ) {
		$sorting_attributes = array( 'terms_args' => array( 'exclude' => $blog_cut_array ) );
	} else {
		$sorting_attributes = array( 'terms_args' => array( 'include' => $blog_cut_array ) );
	}
} else {
	$sorting_attributes = array( 'parent' => 0 );
}

set_query_var( 'hide_addinfo', $hide_addinfo );
$i = 1;

// The Query
$args      = get_query_var( 'query_arguments', array() );
$the_query = new WP_Query( $args );

?>
<div id="content" class="site-content col-md-12" role="main">
	<?php if ( true !== $hide_sorting ) { ?>
		<div class="empty-space col-xs-b30 col-sm-b60"></div>

		<div class="sorting-menu style-3 text-center">
			<div class="responsive-filtration-title visible-xs"><i class="fa"></i><b><span class="text"><?php esc_attr_e( 'All', 'modesto' ); ?></span></b><i class="fa fa-angle-down"></i></div>
			<ul class="responsive-filtration-toggle">
				<?php modesto_category_submenu( array( 'taxonomy' => 'category', 'quicksand' => $isotope_sort, 'terms_args' => $sorting_attributes ) ); ?>
			</ul>
		</div>
		<div class="empty-space col-xs-b30 col-sm-b60"></div>
	<?php } ?>
	<?php
	if ( $the_query->have_posts() ) : ?>
		<div class="sorting-container blog-1">
			<div class="grid-sizer"></div>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post();

				if ( ( 'yes' === $enable_twitter ) && ( $i === intval( $post_to_replace ) ) && ( false === $replaced ) ) {
					echo '<div class="sorting-item">';
					the_widget( 'Widget_Twitter', 'title=&user=' . esc_attr( $user ) . '&number=' . esc_attr( $count ) . '&style=blue blog-landing-entry-1 twitter-entry' );
					echo '</div>';
					$replaced = true;
				} else {
					set_query_var( 'counter', $i );
					get_template_part( 'content', 'material' );
				}
				if ( 7 === $i ) {
					$i = 1;
				} else {
					$i ++;
				}

			endwhile; ?>
		</div>
		<?php modesto_paging_nav( $the_query ); ?>
	<?php else :
		// If no content, include the "No posts found" template.
		get_template_part( 'content', 'none' );
	endif;
	?>

</div>

