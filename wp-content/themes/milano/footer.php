<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package modesto
 */

$footer_style = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'footer_style/style', 'simple' ) : 'simple';

if ( defined( 'FW' ) ) {
	$custom_footer = fw_get_db_post_option( get_the_ID(), 'custom_footer', array() );
	$footer_style  = ( 'yes' === fw_akg( 'enable', $custom_footer, 'no' ) ) ? fw_akg( 'yes/footer_style/style', $custom_footer, 'simple' ) : $footer_style;
}

if ( ! ( 'none' === $footer_style ) ) {
	get_template_part( 'parts/footer/footer', $footer_style );
} ?>
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

