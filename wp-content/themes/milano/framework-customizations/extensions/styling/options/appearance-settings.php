<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'quick_css' => array(
		'label' => esc_html__( 'Quick CSS', 'modesto' ),
		'desc'  => sprintf(
			esc_html__( 'Just want to do some quick CSS changes? Enter them here, they will be %s applied to the theme. ', 'modesto' ),
			'<br/>',
			'<br/>'
		),
		'type'  => 'textarea',
		'value' => '',
	),
	'quick_js'  => array(
		'label' => esc_html__( 'Quick js', 'modesto' ),
		'desc'  => sprintf(
			esc_html__( 'Just want to do some quick JS changes? Enter them here, they will be %s applied to the theme. ', 'modesto' ),
			'<br/>',
			'<br/>'
		),
		'type'  => 'textarea',
		'value' => '',
	),
);