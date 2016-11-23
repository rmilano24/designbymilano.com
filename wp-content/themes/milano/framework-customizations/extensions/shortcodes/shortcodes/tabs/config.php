<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Tabs', 'modesto' ),
	'description' => esc_html__( 'Add some Tabs', 'modesto' ),
	'tab'         => esc_html__( 'Content Elements', 'modesto' ),
);