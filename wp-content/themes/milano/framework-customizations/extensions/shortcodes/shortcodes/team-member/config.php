<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Team Member', 'modesto' ),
	'description' => esc_html__( 'Add a Team Member', 'modesto' ),
	'tab'         => esc_html__( 'Content Elements', 'modesto' ),
	'icon'        => 'fa fa-user',
	'popup_size'  => 'medium',
);