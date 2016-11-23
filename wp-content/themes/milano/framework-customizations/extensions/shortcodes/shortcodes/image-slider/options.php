<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
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
	'slides' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'text' => array(
				'label'        => esc_html__( 'Slider with text', 'modesto' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__( 'Enable', 'modesto' ),
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__( 'Disable', 'modesto' ),
				),
				'value'        => 'no',
			),
		),
		'choices' => array(
			'yes' => array(
				'slides'          => array(
					'label'         => esc_html__( 'Slides', 'modesto' ),
					'type'          => 'addable-popup',
					'template' => '{{- title }}',
					'desc'          => esc_html__( 'Slider items', 'modesto' ),
					'popup-options' => array(
						'image'       => array(
							'label' => esc_html__( 'Image', 'modesto' ),
							'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'modesto' ),
							'type'  => 'upload'
						),
						'title'       => array(
							'label' => esc_html__( 'Title', 'modesto' ),
							'desc'  => esc_html__( 'Title for image', 'modesto' ),
							'type'  => 'text',
							'value' => ''
						),
						'description' => array(
							'label' => esc_html__( 'Description', 'modesto' ),
							'desc'  => esc_html__( 'Description for image', 'modesto' ),
							'type'  => 'textarea',
							'value' => ''
						),
					),
				),
			),
			'no' => array(
				'slides'       => array(
					'type'        => 'multi-upload',
					'label'       => esc_html__( 'Slides', 'modesto' ),
					'desc'        => esc_html__( 'Slider items', 'modesto' ),
					'images_only' => true,
				),
			),
		),
	),



	fw()->theme->get_options( 'shortcode-styling' ),

);