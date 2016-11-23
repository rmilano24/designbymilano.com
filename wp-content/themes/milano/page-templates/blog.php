<?php
/**
 * Template Name: Blog
 */

get_header();

$the_id = get_the_ID();

$blog_style = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'blog_style/style', 'classic' ) : 'classic';
$sidenav_links = fw_get_db_post_option( $the_id, 'custom_side_nav', array() );
$side_nav = modesto_get_side_nav( $sidenav_links );

$container_width = 'container';
if ( function_exists( 'fw_ext_page_builder_is_builder_post' ) && true === fw_ext_page_builder_is_builder_post( $the_id ) ) {
	$container_width = 'page-builder-wrap';
}

if ( is_front_page() ) {
	$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
} else {
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
}

$args = array(
	'post_type'           => 'post',
	'ignore_sticky_posts' => true,
	'paged'               => $paged,
);

if ( function_exists( 'fw_get_db_post_option' ) ) {
	$blog_style     = fw_get_db_post_option( $the_id, 'blog_style/style', 'classic' );
	$perpage        = fw_get_db_post_option( $the_id, 'per_page', false );
	$blog_cat_array = fw_get_db_post_option( $the_id, 'taxonomy_select', false );
	$exclude        = fw_get_db_post_option( $the_id, 'exclude', false );
	$order          = fw_get_db_post_option( $the_id, 'order', 'DESC' );
	$orderby        = fw_get_db_post_option( $the_id, 'orderby', 'date' );

	if ( 'DESC' !== $order && false !== $order ) {
		$args['order'] = $order;
	}
	if ( 'date' !== $orderby && false !== $orderby ) {
		$args['orderby'] = $orderby;
	}
	if ( false !== $perpage ) {
		$args['posts_per_page'] = $perpage;
	}
	if ( isset( $blog_cat_array ) && ! empty( $blog_cat_array ) ) {
		if ( false === $exclude ) {
			$args['category__in'] = $blog_cat_array;
		} else {
			$args['category__not_in'] = $blog_cat_array;
		}
	}
}

set_query_var( 'query_arguments', $args );

if ( 'material' === $blog_style ) {
	wp_enqueue_script( 'isotope-js' );
	wp_enqueue_script( 'modesto-match-height-js' );
}
?>
	<div id="content-block">

		<?php get_template_part( 'parts/stunning-header', 'category' ); ?>

		<div id="primary" class="<?php echo esc_attr( $side_nav['class'] ); ?>">
			<?php echo( $side_nav['html'] );  // WPCS: XSS ok, sanitization ok. ?>

			<div class="<?php esc_attr( $container_width ) ?>">

				<?php while ( have_posts() ) : the_post();
					the_content();
				endwhile; ?>
			</div><!-- #content -->
			<div class="container">
				<div class="row">
					<?php get_template_part( 'loop', $blog_style ); ?>
				</div>
			</div><!-- #primary -->
		</div><!-- #content -->
	</div><!-- #content-block -->
<?php
get_footer();