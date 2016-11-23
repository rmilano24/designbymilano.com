<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 */

get_header();

$blog_style = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'blog_style/style', 'classic' ) : 'classic';
if ( is_category() && function_exists( 'fw_get_db_term_option' ) ) {
	$category_style = fw_get_db_term_option( get_queried_object_id(), 'category', 'blog_style/style', 'default' );
	$blog_style     = ( 'default' !== $category_style ) ? $category_style : $blog_style;
}
$side_nav        = modesto_get_side_nav(  );
?>
	<div id="content-block">

		<?php get_template_part( 'parts/stunning-header', 'category' ); ?>

		<div id="primary" class="wide-container-fluid wide-paddings <?php echo esc_attr( $side_nav['class'] ); ?>">
			<?php echo( $side_nav['html'] );  // WPCS: XSS ok, sanitization ok. ?>
			<div class="container">
				<div class="row">
					<?php get_template_part( 'loop', $blog_style ); ?>
				</div>
			</div><!-- #primary -->
		</div><!-- #content -->
	</div><!-- #content-block -->
<?php
get_footer();

