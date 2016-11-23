<?php
/**
 * Template Name: Portfolio
 */

get_header();

$sidenav_links = function_exists( 'fw_get_db_post_option' ) ? fw_get_db_post_option( get_the_ID(), 'custom_side_nav', array() ) : array();
$side_nav      = modesto_get_side_nav( $sidenav_links );

$custom_stunning      = fw_get_db_post_option( get_the_ID(), 'custom_stunning', array() );
$custom_stunning_hide = $custom_stunning['enable'];

$portfolio_style = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'portfolio_style/style', 'hover_info' ) : 'hover_info';
if ( function_exists( 'fw_get_db_post_option' ) ) {
	$meta_portfolio_style = fw_get_db_post_option( get_the_ID(), 'portfolio_style', 'hover_info' );
}
if ( isset( $meta_portfolio_style['style'] ) && ! empty( $meta_portfolio_style['style'] ) && ! ( 'default' === $meta_portfolio_style['style'] ) ) {
	$portfolio_style = $meta_portfolio_style['style'];
}
$porfolio_query = modesto_portfolio_loop();

?>

	<div id="content-block">

		<?php
		$logo               = $header_class = $header_space = '';
		$transparent_header = ( function_exists( 'fw_get_db_post_option' ) ) ? fw_get_db_post_option( get_the_ID(), 'transparent_header', array() ) : array();
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
		modesto_top_header( $header_class, $logo );
		echo( $header_space );
		if ( ! ( 'yes' === $custom_stunning_hide ) ) { ?>
			<div class="empty-space col-xs-b55 col-sm-b80"></div>
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center">
					<?php the_archive_title( '<h1 class="h2 page-title">', '</h1>' ); ?>
					<?php the_archive_description( '<div class="empty-space col-xs-b15"></div><div class="simple-article large grey text-center">', '</div>' );
					?>
				</div>
			</div>
			<div class="empty-space col-xs-b55 col-sm-b80"></div>
		<?php }
		?>

		<div id="primary" class="<?php echo esc_attr( $side_nav['class'] ); ?>">
			<?php echo( $side_nav['html'] );  // WPCS: XSS ok, sanitization ok. ?>
			<?php get_template_part( 'parts/portfolio/portfolio', $portfolio_style ); ?>
			<?php modesto_paging_nav( $porfolio_query ); ?>

		</div><!-- #primary -->
	</div><!-- #content-block -->

<?php get_footer();