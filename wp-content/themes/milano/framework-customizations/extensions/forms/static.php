<?php if (!defined('FW')) die('Forbidden');

// file: {theme}/inc/static.php
// https://github.com/ThemeFuse/Theme-Includes

if (!is_admin()) {
	wp_enqueue_script(
		'fw-form-helpers',
		fw_get_framework_directory_uri('/static/js/fw-form-helpers.js'),
		array('jquery'),
		'1',
		true
	);
	wp_localize_script('fw-form-helpers', 'fwAjaxUrl', admin_url( 'admin-ajax.php', 'relative' ));
}

