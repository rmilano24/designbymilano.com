<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/** @internal */
function _modesto_filter_disable_default_shortcodes( $to_disable ) {
	// disable the shortcodes you want like this
	$to_disable[] = 'special_heading';
	$to_disable[] = 'call_to_action';
	$to_disable[] = 'slider';
	$to_disable[] = 'calendar';
	

	return $to_disable;
}

add_filter( 'fw_ext_shortcodes_disable_shortcodes', '_modesto_filter_disable_default_shortcodes' );