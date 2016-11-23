<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 */
get_header();

$blog_style = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'blog_style/style', 'classic' ) : 'classic';
?>
	<div id="content-block">

		<?php get_template_part( 'parts/stunning-header', 'category' ); ?>

		<div id="primary">
			<div class="container">
				<div class="row">
					<?php get_template_part( 'loop', $blog_style ); ?>
				</div>
			</div><!-- #primary -->
		</div><!-- #content -->
	</div><!-- #content-block -->
<?php
get_footer();
