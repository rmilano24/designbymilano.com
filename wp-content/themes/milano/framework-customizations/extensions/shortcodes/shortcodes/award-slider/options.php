<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'slider_infinity' => array(
		'label'        => esc_html__( 'Infinite loop', 'modesto' ),
		'type'         => 'switch',
		'right-choice' => array(
			'value' => 'on',
			'label' => esc_html__( 'On', 'modesto' ),
		),
		'left-choice'  => array(
			'value' => 'off',
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

	'slides' => array(
		'label'         => esc_html__( 'Slides', 'modesto' ),
		'type'          => 'addable-popup',
		'template' => '{{- date }}',
		'desc'          => esc_html__( 'Slider items', 'modesto' ),
		'popup-options' => array(
			'award'      => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'style' => array(
						'label'        => esc_html__( 'Award name style', 'modesto' ),
						'type'         => 'switch',
						'left-choice' => array(
							'value' => 'award_image',
							'label' => esc_html__( 'Image', 'modesto' )
						),
						'right-choice'  => array(
							'value' => 'text',
							'label' => esc_html__( 'Text', 'modesto' )
						),
						'desc'         => esc_html__( 'Style of award name displaying', 'modesto' ),
					)
				),
				'choices' => array(
					'award_image' => array(
						'image' => array(
							'label' => esc_html__( 'Award Image', 'modesto' ),
							'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'modesto' ),
							'type'  => 'upload'
						),
					),
					'text'        => array(
						'award_title' => array(
							'label' => esc_html__( 'Title', 'modesto' ),
							'desc'  => esc_html__( 'Heading title', 'modesto' ),
							'type'  => 'text',
							'value' => ''
						),
						'title_color' => array(
							'label'        => esc_html__( 'Title color', 'modesto' ),
							'type'         => 'switch',
							'right-choice' => array(
								'value' => 'light',
								'label' => esc_html__( 'Light', 'modesto' )
							),
							'left-choice'  => array(
								'value' => 'dark',
								'label' => esc_html__( 'Dark', 'modesto' )
							),
							'desc'         => esc_html__( 'Color of award title', 'modesto' ),
						)
					),
				),
			),
			'date'       => array(
				'type'            => 'datetime-picker',
				'label'           => esc_html__( 'Date', 'modesto' ),
				'desc'            => esc_html__( 'Date of award', 'modesto' ),
				'datetime-picker' => array(
					'format'     => 'd-M-Y',
					'maxDate'    => false,
					'minDate'    => false,
					'timepicker' => false,
					'datepicker' => true,
				),
			),
			'background' => array(
				'label' => esc_html__( 'Slide background', 'modesto' ),
				'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'modesto' ),
				'type'  => 'upload'
			),
		),
	),

	fw()->theme->get_options( 'shortcode-styling' ),

);
