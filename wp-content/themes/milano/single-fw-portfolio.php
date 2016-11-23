<?php
/**
 * The Template for displaying all single portfolio projects
 */

$the_id          = get_the_ID();
$selected_header = fw_get_db_settings_option( 'project_header/style', 'classic' );

$header_class    = $color = $inline_style = '';
$container_width = 'container';
if ( function_exists( 'fw_ext_page_builder_is_builder_post' ) && true === fw_ext_page_builder_is_builder_post( $the_id ) ) {
	$container_width = 'page-builder-wrap';
}

$sidenav_links = function_exists( 'fw_get_db_post_option' ) ? fw_get_db_post_option( get_the_ID(), 'custom_side_nav', array() ) : array();
$side_nav      = modesto_get_side_nav( $sidenav_links );

$next_post = get_next_post( false, '', 'fw-portfolio-category' );
$prev_post = get_previous_post( false, '', 'fw-portfolio-category' );
set_query_var( 'id', $the_id );
set_query_var( 'taxonomy', 'fw-portfolio-category' );
set_query_var( 'next_post', $next_post );
set_query_var( 'prev_post', $prev_post );
set_query_var( 'sidenav_links', $sidenav_links );

set_query_var( 'related_posts_count', 3 );

// Options from metabox.
$custom_stunning = fw_get_db_post_option( $the_id, 'custom_stunning', array() );
$post_nav        = fw_get_db_settings_option( 'folio-bottom-nav', array() );
$selected_header = ( 'yes' === fw_akg( 'enable', $custom_stunning, 'no' ) ) ? fw_akg( 'yes/project_header/style', $custom_stunning, 'classic' ) : $selected_header;
set_query_var( 'custom_stunning', $custom_stunning );


?>
<?php get_header(); ?>
<div id="content-block">
	<div id="primary" class="<?php echo esc_attr( $side_nav['class'] ); ?>">
		<?php echo( $side_nav['html'] );  // WPCS: XSS ok, sanitization ok. ?>
		
	<?php if ( 'classic' === $selected_header ) {
		get_template_part( 'parts/header/classic' );
	} elseif ( 'background-card' === $selected_header ) {
		get_template_part( 'parts/header/portfolio-card' );
	} elseif ( 'background' === $selected_header ) {
		get_template_part( 'parts/header/portfolio', 'datailed' );
	} elseif ( 'full-screen' === $selected_header ) {
		get_template_part( 'parts/header/portfolio', 'fullscreen' );
	}
	?>

		<?php if ( 'none' === $selected_header ) {
			modesto_top_header( $header_class = 'white', $color = 'dark', $sidenav_links );
			?>
			<div class="header-empty-space"></div>
			<div class="empty-space col-xs-b30 col-sm-b60"></div>
			<div class="wide-container">
				<div class="row">
					<div class="col-md-3 col-lg-4 text-center col-sm-b30 col-md-b-">
						<?php get_template_part( 'parts/header/portfolio', 'aside' ); ?>
						<?php if ( class_exists( 'RP4WP' ) ) {
							echo '<div class="empty-space col-xs-b25 col-sm-b50"></div>';
							get_template_part( 'parts/related/portfolio', 'related' );
						} ?>
					</div>
					<div class="col-md-9 col-lg-8">
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'simple-article' ); ?>>
							<?php while ( have_posts() ) : the_post(); ?>
								<?php the_content(); ?>
							<?php endwhile; ?>
						</article>
					</div>
				</div>
			</div>
		<?php } else { ?>
			<div class="<?php echo esc_attr( $container_width ); ?>">
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'simple-article' ); ?>>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				</article>
			</div>
		<?php } ?>
	</div>
	<?php echo( $side_nav['overlay'] );  // WPCS: XSS ok, sanitization ok. ?>
	<?php
	if ( function_exists( 'fw_ext_page_builder_is_builder_post' ) && !(true === fw_ext_page_builder_is_builder_post( get_the_ID() )) ) {?>
		<div class="empty-space col-sm-b110"></div>
	<?php }
	?>

	<?php
	$show_navigation    = fw_akg( 'post-navigation', $post_nav, 'no' );
	$navigation_style   = fw_akg( 'yes/navigation_style/nav_style', $post_nav );
	$related_item_style = fw_akg( 'yes/navigation_style/related/item_style', $post_nav );

	$related_meta = fw_get_db_post_option( $the_id, 'custom_related', array() );
	$customize    = fw_akg( 'enable', $related_meta );
	if ( 'yes' === $customize ) {
		$meta_show_navigation    = fw_akg( 'yes/folio-bottom-nav/post-navigation', $related_meta );
		$show_navigation         = _modesto_meta_options( $show_navigation, $meta_show_navigation, true );
		$meta_navigation_style   = fw_akg( 'yes/folio-bottom-nav/yes/navigation_style/nav_style', $related_meta );
		$navigation_style        = _modesto_meta_options( $navigation_style, $meta_navigation_style, true );
		$meta_related_item_style = fw_akg( 'yes/folio-bottom-nav/yes/navigation_style/related/item_style', $related_meta );
		$related_item_style      = _modesto_meta_options( $related_item_style, $meta_related_item_style, true );
	}

	if ( 'yes' === $show_navigation ) {
		if ( 'prev_next' === $navigation_style ) {
			set_query_var( 'navigation_page', fw_akg( 'yes/navigation_style/prev_next/page_select/0', $post_nav, 0 ) );
			get_template_part( 'parts/post', 'navigation' );
		} else {
			set_query_var( 'related_portfolio_style', $related_item_style );
			get_template_part( 'parts/post', 'related' );
		}
	} ?>
</div>
<!-- FOOTER -->
<?php get_footer(); ?>
