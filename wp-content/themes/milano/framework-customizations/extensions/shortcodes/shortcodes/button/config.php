<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Button', 'modesto' ),
	'description' => esc_html__( 'Add a Button', 'modesto' ),
	'tab'         => esc_html__( 'Content Elements', 'modesto' ),
	'icon'        => 'dashicons dashicons-admin-links'
);