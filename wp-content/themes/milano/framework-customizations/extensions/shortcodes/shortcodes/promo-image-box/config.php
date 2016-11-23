<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Promo image', 'modesto' ),
	'description' => esc_html__( 'Add a Box with some information', 'modesto' ),
	'tab'         => esc_html__( 'Content Elements', 'modesto' ),
	'icon'        => 'dashicons dashicons-analytics',
	'popup_size'  => 'medium',
);