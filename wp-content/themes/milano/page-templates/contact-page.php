<?php
/**
 * Template Name: Contact Page
 */
get_header();


global $allowedposttags;

/*Contact form script*/
wp_enqueue_script( 'crum-contact-form', get_template_directory_uri() . '/js/contact.form.js', array(), '1.0', true );
wp_enqueue_script( 'google-maps-api-v3' );
wp_enqueue_script( 'modesto-shortcode-map-script' );

if ( function_exists( 'fw_get_db_settings_option' ) ) {
	$overlay_style = fw_get_db_settings_option( 'overlay-switch/yes/overlay-options/style-select/style', 'simple' );
	$frame         = fw_get_db_settings_option( 'overlay-switch/yes/overlay-options/frame', 'no' );

	$description    = fw_get_db_post_option( get_the_ID(), 'description' );
	$contact_title  = fw_get_db_post_option( get_the_ID(), 'contact_title' );
	$networks_title = fw_get_db_settings_option( 'soc-label', esc_html__( 'Follow me:', 'modesto' ) );

	$column_1     = fw_get_db_post_option( get_the_ID(), 'column_1' );
	$column_2     = fw_get_db_post_option( get_the_ID(), 'column_2' );
	$column_3     = fw_get_db_post_option( get_the_ID(), 'column_3' );
	$soc_networks = fw_get_db_post_option( get_the_ID(), 'soc_networks', 'yes' );

	$zoom      = fw_get_db_post_option( get_the_ID(), 'map_zoom', 14 );
	$locations = fw_get_db_post_option( get_the_ID(), 'locations', array() );
} else {
	$overlay_style  = 'simple';
	$frame          = 'no';
	$description    = $contact_title = $column_1 = $column_2 = $column_3 = '';
	$networks_title = esc_html__( 'Follow me:', 'modesto' );
	$soc_networks   = 'yes';
	$zoom           = 14;
	$locations      = array();
}

set_query_var( 'contact_page_zoom', $zoom );
set_query_var( 'contact_page_locations', $locations );

$i = 0;
if ( isset( $column_1 ) && ! empty( $column_1 ) ) {
	$i ++;
}
if ( isset( $column_2 ) && ! empty( $column_2 ) ) {
	$i ++;
}
if ( isset( $column_3 ) && ! empty( $column_3 ) ) {
	$i ++;
}
if ( 'yes' === $soc_networks ) {
	$i ++;
}

switch ( $i ) {
	case 1:
		$column_class = '12';
		break;
	case 2:
		$column_class = '6';
		break;
	case 3:
		$column_class = '4';
		break;
	case 4:
		$column_class = '3';
		break;
	default:
		$column_class = '12';
}
?>

	<div id="content-block">
		<?php modesto_top_header( 'dark', 'dark' ); ?>
		<div class="contacts-wrapper-1">
			<div class="header-empty-space"></div>
			<div class="container">
				<div class="empty-space col-xs-b25 col-sm-b50"></div>

				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center">
						<div class="h2 dark dark"><b><?php echo get_the_title( get_the_ID() ) ?></b></div>
						<div class="empty-space col-xs-b15"></div>
						<?php if ( isset( $description ) && ! empty( $description ) ) { ?>
							<div class="simple-article large dark transparent text-center"><?php echo wp_kses( wpautop( $description ), $allowedposttags ); ?></div>
						<?php } ?>
					</div>
				</div>

				<div class="empty-space col-xs-b30 col-sm-b60"></div>

				<div class="row simple-article dark transparent">
					<div class="col-xs-6 col-sm-<?php echo esc_attr( $column_class ) ?>">
						<div class="contacts-entry">
							<?php if ( ! empty( $column_1 ) ) {
								echo wp_kses( wpautop( $column_1 ), $allowedposttags );
							} ?>
						</div>
					</div>
					<div class="col-xs-6 col-sm-<?php echo esc_attr( $column_class ) ?>">
						<div class="contacts-entry">
							<?php if ( ! empty( $column_2 ) ) {
								echo wp_kses( wpautop( $column_2 ), $allowedposttags );
							} ?>
						</div>
					</div>
					<div class="col-xs-6 col-sm-<?php echo esc_attr( $column_class ) ?>">
						<div class="contacts-entry">
							<?php if ( ! empty( $column_3 ) ) {
								echo wp_kses( wpautop( $column_3 ), $allowedposttags );
							} ?>
						</div>
					</div>
					<?php if ( 'yes' === $soc_networks ) { ?>
						<div class="col-xs-6 col-sm-<?php echo esc_attr( $column_class ) ?>">
							<div class="contacts-entry">
								<?php if ( isset( $networks_title ) && ! empty( $networks_title ) ) { ?>
									<div class="h4 dark small"><b><?php echo esc_attr( $networks_title ) ?></b></div>
								<?php } ?>
								<div class="empty-space col-xs-b15"></div>
								<?php echo modesto_get_socials( '', false ) ?>
							</div>
						</div>
					<?php } ?>
				</div>
				<div class="empty-space col-xs-b55 col-sm-b110"></div>
				<?php if ( isset( $contact_title ) && ! empty( $contact_title ) ) { ?>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center">
							<div class="h4 dark"><b><?php echo esc_attr( $contact_title ) ?></b></div>
						</div>
					</div>
				<?php } ?>
				<div class="empty-space col-xs-b90 col-sm-b120"></div>
			</div>
		</div>

		<div class="container">
			<div class="contacts-form-1-align">
				<div class="row">
					<div class="col-xs-10 col-xs-offset-1">
						<div class="empty-space col-xs-b60"></div>

						<?php get_template_part( 'parts/contact/contact', 'form' ) ?>

						<div class="empty-space col-xs-b60"></div>
					</div>
				</div>
			</div>
		</div>

		<?php get_template_part( 'parts/contact/contact', 'map' ) ?>

	</div>
<?php
get_footer();
?>
