<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'twitter-consumer-key'        => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Consumer Key', 'modesto' ),
		'desc'  => esc_html__( 'Enter Twitter Consumer Key.', 'modesto' ),
	),
	'twitter-consumer-secret'     => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Consumer Secret', 'modesto' ),
		'desc'  => esc_html__( 'Enter Twitter App Secret.', 'modesto' ),
	),
	'twitter-access-token'        => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Access Token', 'modesto' ),
		'desc'  => esc_html__( 'Enter Twitter Access Token.', 'modesto' ),
	),
	'twitter-access-token-secret' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Access Token Secret', 'modesto' ),
		'desc'  => esc_html__( 'Enter Twitter Access Token Secret.', 'modesto' ),
	),
	'map_key'        => array(
		'label' => esc_html__( 'Set your API KEY for google maps service', 'modesto' ),
		'desc' => '<a href="https://developers.google.com/maps/documentation/javascript/get-api-key">' . esc_html__( 'Instruction to create API key', 'modesto' ) . '</a>',
		'type'  => 'text',
		'value' => '',
	),
);

