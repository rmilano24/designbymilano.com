<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

/**
 * Theme Includes
 */
require_once get_template_directory() .'/inc/init.php';

/**
 * TGM Plugin Activation
 */
require_once get_template_directory() . '/TGM-Plugin-Activation/class-tgm-plugin-activation.php';


/**
 * Activate main theme framework.
 *
 * @internal
 */
function _action_modesto_register_required_plugins() {
	tgmpa( array(
		array(
			'name'             => __( 'Unyson', 'modesto' ),
			'slug'             => 'unyson',
			'required'         => true,
		),
		array(
			'name'             => __( 'Related Posts for WordPress', 'modesto' ),
			'slug'             => 'related-posts-for-wp',
			'required'         => false,
		),
	) );
}

add_action( 'tgmpa_register', '_action_modesto_register_required_plugins' );

function modesto_admin_customizations() {

	wp_enqueue_style(
		'admin-styles-css',
		get_template_directory_uri() . '/css/admin-style.css',
		array(),
		'1.0'
	);
	wp_enqueue_script(
		'admin-scripts-js',
		get_template_directory_uri() . '/js/admin-scripts.js',
		array( 'jquery' ),
		'1.0',
		true
	);
}

add_action( 'admin_enqueue_scripts', 'modesto_admin_customizations' );

//theme update
require_once get_template_directory() . '/inc/includes/theme-update/theme-update-checker.php';

$modesto_update_checker = new ThemeUpdateChecker(
	'modesto',
	'http://up.crumina.net/updates.server/wp-update-server/?action=get_metadata&slug=modesto'
);