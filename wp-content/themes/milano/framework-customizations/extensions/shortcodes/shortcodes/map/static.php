<?php if (!defined('FW')) die('Forbidden');

$shortcodes_extension = fw_ext('shortcodes');

$language = substr( get_locale(), 0, 2 );
$api_key = fw_get_db_settings_option('map_key');
wp_enqueue_script(
	'google-maps-api-v3',
	'https://maps.googleapis.com/maps/api/js?key='.$api_key.'&libraries=places&language=' . $language,
	array(),
	'3.15',
	true
);
wp_enqueue_script(
	'modesto-shortcode-map-script',
	get_template_directory_uri() . '/framework-customizations/extensions/shortcodes/shortcodes/map/static/js/map-shortcode.js',
	array('jquery', 'underscore', 'google-maps-api-v3'),
	fw()->manifest->get_version(),
	true
);