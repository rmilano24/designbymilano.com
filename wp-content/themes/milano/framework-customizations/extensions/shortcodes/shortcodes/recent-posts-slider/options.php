<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	fw()->theme->get_options( 'loop-settings' ),
	'show_meta'         => array(
		'label'        => esc_html__( 'Show meta', 'modesto' ),
		'type'         => 'switch',
		'right-choice' => array(
			'value' => '1',
			'label' => esc_html__( 'On', 'modesto' ),
		),
		'left-choice'  => array(
			'value' => '0',
			'label' => esc_html__( 'Off', 'modesto' ),
		),
		'value'        => '1',
		'desc'         => esc_html__( 'Show date of post and author\'s name on slides', 'modesto' ),
	),
	'read_more_options' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'value'        => array(
			'read_more_show' => '1',
		),
		'picker'       => array(
			'read_more_show' => array(
				'label'        => esc_html__( 'Show read more', 'modesto' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => '1',
					'label' => esc_html__( 'Show', 'modesto' ),
				),
				'left-choice'  => array(
					'value' => '0',
					'label' => esc_html__( 'Hide', 'modesto' ),
				),
				'value'        => '1',
				'desc'         => esc_html__( 'Show read more button', 'modesto' ),
			),
		),
		'choices'      => array(
			'1' => array(
				'button_text' => array(
					'label' => esc_html__( 'Button text', 'modesto' ),
					'desc'  => esc_html__( 'Text on read more button', 'modesto' ),
					'type'  => 'text',
					'value' => ''
				),
			),
			'2' => array(),
		),
		'show_borders' => false,
	),
	'slider_infinity'   => array(
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
	'slides_per_page'   => array(
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
	'autoplay'          => array(
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