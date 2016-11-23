<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Service box', 'modesto' ),
	'description' => esc_html__( 'Add a box with service description', 'modesto' ),
	'tab'         => esc_html__( 'Content Elements', 'modesto' ),
	'popup_size'  => 'medium',
	'icon'        => 'dashicons dashicons-admin-generic'
);