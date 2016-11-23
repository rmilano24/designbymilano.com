<?php
/**
 * Template Name: Teaser Page
 */

global $allowedposttags;


if ( function_exists( 'fw_get_db_settings_option' ) ) {
	$overlay_style = fw_get_db_settings_option( 'overlay-switch/yes/overlay-options/style-select/style', 'simple' );
	$frame         = fw_get_db_settings_option( 'overlay-switch/yes/overlay-options/frame', 'no' );
	$copyright     = fw_get_db_settings_option( 'footer-copyright' );
	$soc_networks  = fw_get_db_settings_option( 'footer-soc-networks', false );
} else {
	$overlay_style  = 'simple';
	$frame          = 'no';
	$copyright      = '';
	$show_subscribe = false;
}

if ( function_exists( 'fw_get_db_post_option' ) ) {
	$bg_image       = fw_get_db_post_option( get_the_ID(), 'bg_image' );
	$description    = fw_get_db_post_option( get_the_ID(), 'description' );
	$date           = fw_get_db_post_option( get_the_ID(), 'date' );
	$show_subscribe = fw_get_db_post_option( get_the_ID(), 'subscribe', 'no' );
} else {
	$bg_image       = $description = $date = '';
	$show_subscribe = 'no';
}

$action = ( isset( $_SERVER["REQUEST_URI"] ) ) ? $_SERVER["REQUEST_URI"] : '';
$uid    = uniqid( 'subscribe' );

if ( isset( $bg_image['url'] ) && ! empty( $bg_image['url'] ) ) {
	$background = esc_url( fw_resize( $bg_image['url'], '1920', false, true ) );
} else {
	$background = '';
}

get_header();

wp_enqueue_script( 'modesto-tilt-effect' );

$frame_class = ( 'yes' === $frame ) ? 'frame' : '';
echo '<div class="overlay ' . esc_attr( $frame_class ) . '" data-rel="1">';
get_template_part( 'parts/overlay/' . $overlay_style );
echo '</div>'; ?>

	<div id="content-block">

		<header class="type-4 light fixed">
			<div class="wide-container-fluid">
				<div class="row">
					<div class="col-xs-6 col-sm-2">
						<?php echo modesto_get_logo( 'white' ) ?>
					</div>
					<div class="col-xs-6 col-sm-10 text-right">
						<div class="hamburger-icon open-overlay" data-rel="1">
							<span></span>
							<span></span>
							<span></span>
						</div>
					</div>
				</div>
			</div>
			<div class="close-layer toggle-visibility">
				<div class="button-close"></div>
			</div>
		</header>

		<div class="page-height animated-background teaser-slide valign-middle">
			<div class="header-empty-space"></div>
			<img src="<?php echo( $background ); ?>" alt="" class="modesto-tilt-effect"
			     data-tilt-options='{ "opacity" : 0.8, "movement": { "perspective" : 1500, "translateX" : 15, "translateY" : 15, "translateZ" : 2, "rotateX" : 5, "rotateY" : 5 } }'/>

			<div class="teaser-content">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="text-center">
								<div class="h2 light"><b><?php echo esc_attr( get_the_title( get_the_ID() ) ) ?></b>
								</div>
								<div class="empty-space col-xs-b15"></div>
								<div class="row">
									<div class="col-md-10 col-md-offset-1">
										<div class="simple-article light transparent">
											<?php echo wp_kses( wpautop( $description ), $allowedposttags ); ?>
										</div>
									</div>
								</div>
							</div>
							<div class="empty-space col-xs-b30 col-sm-b60"></div>
							<div class="row countdown" data-finalTime="<?php echo( $date ); ?>">
								<div class="col-xs-3">
									<div class="teaser-number-entry style-1">
										<div class="inline-tags simple-article  light transparent"><?php esc_html_e( 'Days', 'modesto' ) ?></div>
										<div class="empty-space col-xs-b20"></div>
										<div class="h2 light"><b class="days"></b></div>
									</div>
								</div>
								<div class="col-xs-3">
									<div class="teaser-number-entry style-1">
										<div class="inline-tags simple-article light transparent"><?php esc_html_e( 'Hours', 'modesto' ) ?></div>
										<div class="empty-space col-xs-b20"></div>
										<div class="h2 light"><b class="hours"></b></div>
									</div>
								</div>
								<div class="col-xs-3">
									<div class="teaser-number-entry style-1">
										<div class="inline-tags simple-article light transparent"><?php esc_html_e( 'Minutes', 'modesto' ) ?></div>
										<div class="empty-space col-xs-b20"></div>
										<div class="h2 light"><b class="minutes"></b></div>
									</div>
								</div>
								<div class="col-xs-3">
									<div class="teaser-number-entry style-1">
										<div class="inline-tags simple-article light transparent"><?php esc_html_e( 'Seconds', 'modesto' ) ?></div>
										<div class="empty-space col-xs-b20"></div>
										<div class="h2 light"><b class="seconds"></b></div>
									</div>
								</div>
							</div>
							<div class="empty-space col-xs-b30 col-sm-b60"></div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<footer class="type-2 transparent">
			<div class="wide-container-fluid">
				<div class="row">
					<div class="col-md-6 col-xs-text-center col-md-text-left col-sm-b10 col-md-b0">
						<div class="copyright">
							<div class="simple-article small light transparent">
								<?php
								if ( ! empty( $copyright ) ) {
									echo wp_kses( do_shortcode( $copyright ), $allowedposttags );
								}
								?>
							</div>
						</div>
						<div class="empty-space col-xs-b20 col-md-b0"></div>
					</div>
					<div class="col-md-6 col-xs-text-center col-md-text-right">
						<?php echo modesto_get_socials( 'style-3' ) ?>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="text-popup overlay">
		<div class="animation-wrapper full-size"></div>
		<div class="content-wrapper full-size">
			<div class="cell-view page-height">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 text-center">
							<div class="h2 small light"><b class="text-popup-title"></b></div>
							<div class="empty-space col-xs-b15"></div>
							<div class="simple-article light transparent text-popup-message"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a class="button-close"></a>
	</div>

<?php
wp_footer();
echo '</body> </html>';