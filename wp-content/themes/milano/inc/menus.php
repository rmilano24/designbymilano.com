<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Register menus
 */

// This theme uses wp_nav_menu() in two locations.
register_nav_menus( array(
	'primary'     => __( 'Top primary menu', 'modesto' ),
	'fallback_cb' => 'modesto_menu_fallback',
) );

if ( ! function_exists( 'modesto_menu_fallback' ) ) {
	function modesto_menu_fallback() {
		// Translators 1: Link to Menus, 2: Link to Customize
		printf( '<span class="menu-fallback" id="no-menu-fallback">' . esc_attr__( 'Please add a menu to this location on %1$s page.', 'modesto' ) . '</span>',
			sprintf( wp_kses( __( '<a href="%s">Menus</a>', 'modesto' ), array( 'a' => array( 'href' => array() ) ) ),
				get_admin_url( get_current_blog_id(), 'nav-menus.php' )
			)
		);
	}
}