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
	'slides'          => array(
		'label'         => esc_html__( 'Slides', 'modesto' ),
		'type'          => 'addable-popup',
		'template'      => '{{- title }}',
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
			'button'      => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'value'        => array(
					'add_button' => 'no',
				),
				'picker'       => array(
					'add_button' => array(
						'label'        => esc_html__( 'Add button', 'modesto' ),
						'type'         => 'switch',
						'right-choice' => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'modesto' )
						),
						'left-choice'  => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'modesto' )
						),
						'desc'         => esc_html__( 'Add button on slide', 'modesto' ),
					)
				),
				'choices'      => array(
					'no'  => array(),
					'yes' => array(
						'button_text' => array(
							'label' => esc_html__( 'Button text', 'modesto' ),
							'desc'  => esc_html__( 'Text on the button', 'modesto' ),
							'type'  => 'text',
							'value' => ''
						),
						'link'        => array(
							'type'          => 'popup',
							'label'         => esc_html__( 'Set link', 'modesto' ),
							'popup-title'   => esc_html__( 'Insert/edit link', 'modesto' ),
							'button'        => esc_html__( 'Select URL', 'modesto' ),
							'size'          => 'small', // small, medium, large
							'popup-options' => array(
								'selected' => array(
									'type'    => 'multi-picker',
									'label'   => false,
									'desc'    => false,
									'picker'  => array(
										'selected' => array(
											'label'   => esc_html__( 'Image source', 'modesto' ),
											'type'    => 'select', // or 'short-select'
											'choices' => array(
												'url'  => esc_html__( 'Type url', 'modesto' ),
												'page' => esc_html__( 'Select page', 'modesto' ),
											),
											'desc'    => esc_html__( 'Select image source.', 'modesto' ),
										),
									),
									'choices' => array(
										'url'  => array(
											'link' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Type Link', 'modesto' ),
												'desc'  => esc_html__( 'Where should this element link to?', 'modesto' )
											),
										),
										'page' => array(
											'link' => array(
												'type'       => 'multi-select',
												'label'      => esc_html__( 'Select some blog page', 'modesto' ),
												'desc'       => esc_html__( 'Select a page which this element will be linked to', 'modesto' ),
												'help'       => esc_html__( 'Click on field and type page name to find page', 'modesto' ),
												'population' => 'posts',
												'source'     => 'page',
												'limit'      => 1,
											),
										),
									),
								),
								'target'   => array(
									'type'         => 'switch',
									'label'        => esc_html__( 'Open Link in New Window', 'modesto' ),
									'desc'         => esc_html__( 'Select here if you want to open the linked page in a new window', 'modesto' ),
									'right-choice' => array(
										'value' => '_blank',
										'label' => esc_html__( 'Yes', 'modesto' ),
									),
									'left-choice'  => array(
										'value' => '_self',
										'label' => esc_html__( 'No', 'modesto' ),
									),
								),
							),
						),
					)
				),
				/**
				 * (optional) if is true, the borders between choice options will be shown
				 */
				'show_borders' => false,
			)
		),
	),


	fw()->theme->get_options( 'shortcode-styling' ),

);