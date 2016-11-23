<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Recent portfolio', 'modesto' ),
	'description' => esc_html__( 'Add block with recent portfolio posts', 'modesto' ),
	'tab'         => esc_html__( 'Content Elements', 'modesto' ),
	'popup_size'  => 'medium',
	'icon'        => 'dashicons dashicons-schedule'
);