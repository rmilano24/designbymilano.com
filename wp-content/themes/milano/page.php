<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 */
$sidenav_links = function_exists( 'fw_get_db_post_option' ) ? fw_get_db_post_option( get_the_ID(), 'custom_side_nav', array() ) : array();

$side_nav        = modesto_get_side_nav( $sidenav_links );
$container_width = 'container';
if ( function_exists( 'fw_ext_page_builder_is_builder_post' ) && true === fw_ext_page_builder_is_builder_post( get_the_ID() ) ) {
	$container_width = 'page-builder-wrap';
}
$logo               = $header_class = $header_space = '';
$transparent_header = ( function_exists( 'fw_get_db_post_option' ) ) ? fw_get_db_post_option( get_the_ID(), 'transparent_header', array() ) : array();
if ( ! empty( $transparent_header ) ) {
	if ( 'yes' === fw_akg( 'select', $transparent_header, 'no' ) ) {
		$logo         = 'dark';
		$header_class = 'dark';
		if ( 'white' === fw_akg( 'yes/color', $transparent_header, 'dark' ) ) {
			$header_class = 'light';
			$logo         = 'white';
		}
	} else {
		$header_space = '<div class="header-empty-space"></div>';
	}
} else {
	$header_space = '<div class="header-empty-space"></div>';
}
get_header();
modesto_top_header( $header_class, $logo, $sidenav_links );
echo( $header_space );
?>
<?php echo( $side_nav['overlay'] );  // WPCS: XSS ok, sanitization ok. ?>
<?php
$custom_stunning      = function_exists( 'fw_get_db_post_option' ) ? fw_get_db_post_option( get_the_ID(), 'custom_stunning', array() ) : array();
$custom_stunning_hide = isset( $custom_stunning['enable'] ) ? $custom_stunning['enable'] : 'no';
if ( 'yes' !== $custom_stunning_hide ) { ?>

	<div class="empty-space col-xs-b40 col-sm-b80"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center">
				<?php the_archive_title( '<h1 class="h2 page-title">', '</h1>' ); ?>
				<?php the_archive_description( '<div class="empty-space col-xs-b15"></div><div class="simple-article large grey text-center">', '</div>' );
				?>
			</div>
		</div>
	</div>
	<div class="empty-space col-xs-b40 col-sm-b80"></div>
<?php }
?>
	<div id="primary" class="<?php echo esc_attr( $side_nav['class'] ); ?>">
		<?php echo( $side_nav['html'] );  // WPCS: XSS ok, sanitization ok. ?>
		<div id="content" class="site-content <?php echo esc_attr( $container_width ) ?>" role="main">
			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				the_content();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			endwhile;
			?>
		</div><!-- #primary -->
	</div><!-- #content -->
<?php if ( 'container' === $container_width ) {
	echo '<div class="empty-space col-xs-b55 col-sm-b110"></div>';
} ?>


<?php

get_footer();
