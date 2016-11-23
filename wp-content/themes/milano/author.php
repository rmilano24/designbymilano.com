<?php
/**
 * The template for displaying Author archive pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 */

$blog_style = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'blog_style/style', 'classic' ) : 'classic';

get_header(); ?>

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