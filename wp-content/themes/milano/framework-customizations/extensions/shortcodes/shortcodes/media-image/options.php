<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'source'      => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'selected' => array(
				'label'   => esc_html__( 'Image source', 'modesto' ),
				'type'    => 'select', // or 'short-select'
				'choices' => array(
					'media'    => esc_html__( 'Media library', 'modesto' ),
					'external' => esc_html__( 'External source', 'modesto' )
				),
				'desc'    => esc_html__( 'Select image source.', 'modesto' ),
			)
		),
		'choices' => array(
			'media'    => array(
				'image' => array(
					'type'  => 'upload',
					'label' => esc_html__( 'Choose Image', 'modesto' ),
					'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'modesto' )
				),
				'size'  => array(
					'type'          => 'popup',
					'label'         => esc_html__( 'Resize', 'modesto' ),
					'popup-title'   => esc_html__( 'Resize image', 'modesto' ),
					'button'        => esc_html__( 'Set custom size', 'modesto' ),
					'size'          => 'small', // small, medium, large
					'popup-options' => array(
						'width'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Width', 'modesto' ),
							'desc'  => esc_html__( 'Set image width', 'modesto' ),
							'help'  => esc_html__( 'Enter number of pixels ( PX )', 'modesto' ),
						),
						'height' => array(
							'type'  => 'text',
							'label' => esc_html__( 'Height', 'modesto' ),
							'desc'  => esc_html__( 'Set image height', 'modesto' ),
							'help'  => esc_html__( 'Enter number of pixels ( PX )', 'modesto' ),
						),
						'crop'   => array(
							'type'  => 'checkbox',
							'value' => false,
							'label' => esc_html__( 'Crop image', 'modesto' ),
							'desc'  => esc_html__( 'Crop and resize any image to the exact pixels or proportion you specified', 'modesto' ),
						),
					),
				),
			),
			'external' => array(
				'link' => array(
					'type'  => 'text',
					'label' => esc_html__( 'Type Link', 'modesto' ),
					'desc'  => esc_html__( 'Link to image', 'modesto' )
				),
			),
		),
	),
	'image_align' => array(
		'type'    => 'radio',
		'label'   => esc_html__( 'Horizontal align', 'modesto' ),
		'desc'    => esc_html__( 'The horizontal alignment of elements', 'modesto' ),
		'choices' => array(
			'alignleft'   => esc_html__( 'Left', 'modesto' ),
			'aligncenter' => esc_html__( 'Centered', 'modesto' ),
			'alignright'  => esc_html__( 'Right', 'modesto' ),
		),
		'inline'  => true,
	),
	'image_link'  => array(
		'type'   => 'multi-picker',
		'label'  => false,
		'desc'   => false,
		'picker' => array(
			'selected' => array(
				'label'   => esc_html__( 'On click action', 'modesto' ),
				'type'    => 'select', // or 'short-select'
				'choices' => array(
					''     => esc_html__( 'None', 'modesto' ),
					'link' => esc_html__( 'Open link', 'modesto' ),
					'zoom' => esc_html__( 'Zoom image', 'modesto' ),
				),
				'desc'    => esc_html__( 'Select image source.', 'modesto' ),
			),
		),
	),
	'link'         => array(
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
	'hover_effect' => array(
		'label'   => esc_html__( 'Hover effect', 'modesto' ),
		'desc'    => esc_html__( 'Choose a style for effect on hover', 'modesto' ),
		'type'    => 'select',
		'choices' => array(
			''      => esc_html__( 'None', 'modesto' ),
			'cross' => esc_html__( 'Bordered cross', 'modesto' ),
			'zoom'  => esc_html__( 'Zoom image', 'modesto' ),
		)
	),
	fw()->theme->get_options( 'shortcode-styling' ),
	fw()->theme->get_options( 'shortcode-animations' ),
);





