<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'username'      => array(
		'label' => esc_html__( 'Author', 'modesto' ),
		'desc'  => esc_html__( 'Name of tweets author', 'modesto' ),
		'type'  => 'text',
		'value' => ''
	),
	'tweets_count'    => array(
		'type'       => 'slider',
		'value'      => 1,
		'properties' => array(
			'min'       => 1,
			'max'       => 20,
			'step'      => 1,
			'grid_snap' => true
		),
		'label'      => esc_html__( 'Count of tweets to display', 'modesto' ),
	),
	'slider_infinity' => array(
		'label'        => esc_html__( 'Infinite loop', 'modesto' ),
		'type'         => 'switch',
		'right-choice' => array(
			'value' => '1',
			'label' => esc_html__( 'On', 'modesto' ),
		),
		'left-choice'  => array(
			'value' => '0',
			'label' => esc_html__( 'Off', 'modesto' ),
		),
		'value'        => 'off',
		'desc'         => esc_html__( 'Enable loop slides without end', 'modesto' ),
	),
	'slides_per_page' => array(
		'type'       => 'slider',
		'value'      => 1,
		'properties' => array(
			'min'       => 1,
			'max'       => 10,
			'step'      => 1,
			'grid_snap' => true
		),
		'label'      => esc_html__( 'Slides per page', 'modesto' ),
	),
	'autoplay'        => array(
		'type'       => 'slider',
		'value'      => 0,
		'properties' => array(
			'min'       => 0,
			'max'       => 20,
			'step'      => 1,
			'grid_snap' => true
		),
		'label'      => esc_html__( 'Auto Scroll delay', 'modesto' ),
		'desc'       => esc_html__( 'Time between change slides in seconds', 'modesto' ),
		'help'       => esc_html__( 'If you will set "0" autopay will be disabled', 'modesto' ),
	),
	fw()->theme->get_options( 'shortcode-styling' ),
);