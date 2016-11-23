<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'title' => array(
		'label' => esc_html__( 'Title', 'modesto' ),
		'desc'  => esc_html__( 'Heading title', 'modesto' ),
		'type'  => 'text',
		'value' => ''
	),

	'subtitle' => array(
		'label' => esc_html__( 'Subtitle', 'modesto' ),
		'desc'  => esc_html__( 'Heading subtitle', 'modesto' ),
		'type'  => 'textarea',
		'value' => ''
	),

	'title_tag' => array(
		'label'   => esc_html__( 'Title tag', 'modesto' ),
		'desc'    => esc_html__( 'Select tag for title text', 'modesto' ),
		'type'    => 'select',
		'choices' => array(
			'h1' => 'H1',
			'h2' => 'H2',
			'h3' => 'H3',
			'h4' => 'H4',
			'h5' => 'H5',
			'h6' => 'H6',
		),
	),

	'enable_small' => array(
		'label'        => esc_html__( 'Make title small', 'modesto' ),
		'type'         => 'switch',
		'right-choice' => array(
			'value' => 'on',
			'label' => esc_html__( 'On', 'modesto' )
		),
		'left-choice'  => array(
			'value' => 'off',
			'label' => esc_html__( 'Off', 'modesto' )
		),
		'desc'         => esc_html__( 'Use smaller font size for title', 'modesto' ),
	),

	'align' => array(
		'type'    => 'radio',
		'label'   => esc_html__( 'Horizontal align', 'modesto' ),
		'desc'    => esc_html__( 'The horizontal alignment of elements', 'modesto' ),
		'choices' => array(
			'none'        => esc_html__( 'Inline', 'modesto' ),
			'text-left'   => esc_html__( 'Left', 'modesto' ),
			'text-center' => esc_html__( 'Centered', 'modesto' ),
			'text-right'  => esc_html__( 'Right', 'modesto' ),
		),
		'inline'  => true,
	),

	/*'uppercase' => array(
		'label'        => esc_html__( 'Enable uppercase', 'modesto' ),
		'type'         => 'switch',
		'right-choice' => array(
			'value' => 'on',
			'label' => esc_html__( 'On', 'modesto' )
		),
		'left-choice'  => array(
			'value' => 'off',
			'label' => esc_html__( 'Off', 'modesto' )
		),
		'desc'         => esc_html__( 'Transform title text to upper case', 'modesto' ),
	),*/

	'line' => array(
		'label'        => esc_html__( 'Enable line', 'modesto' ),
		'type'         => 'switch',
		'left-choice'  => array(
			'value' => 'no',
			'label' => esc_html__( 'No', 'modesto' )
		),
		'right-choice' => array(
			'value' => 'yes',
			'label' => esc_html__( 'Yes', 'modesto' )
		),
		'desc'         => esc_html__( 'Enable small line at top of the title', 'modesto' ),
	),
	fw()->theme->get_options( 'shortcode-styling' ),
	fw()->theme->get_options( 'shortcode-animations' ),
);