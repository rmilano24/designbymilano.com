<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'gallery' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'block_style' => array(
				'type'    => 'image-picker',
				'label'   => esc_html__( 'Style', 'modesto' ),
				'desc'    => esc_html__( 'Select variant of image gallery', 'modesto' ),
				'value'   => 'grid',
				'choices' => array(
					'grid'   => get_template_directory_uri() . '/images/shortcode/gallery/grid.png',
					'slider' => get_template_directory_uri() . '/images/shortcode/gallery/slider.png',
				),
			),
		),
		'choices'      => array(
			'grid'   => array(
				'columns_number' => array(
					'type'       => 'slider',
					'value'      => 6,
					'properties' => array(
						'min'       => 1,
						'max'       => 10,
						'step'      => 1,
						'grid_snap' => true
					),
					'label'      => esc_html__( 'Columns number', 'modesto' ),
				),
				'space'          => array(
					'label'        => esc_html__( 'Image spacing', 'modesto' ),
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
			'slider' => array(
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
					'desc'         => esc_html__( 'Enable loop slides by circle', 'modesto' ),
				),
				'slides_per_page' => array(
					'type'       => 'slider',
					'value'      => 6,
					'properties' => array(
						'min'       => 1,
						'max'       => 10,
						'step'      => 1,
						'grid_snap' => true
					),
					'label'      => esc_html__( 'Images per page', 'modesto' ),
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
			),
		),
		'show_borders' => true,
	),
	'images'  => array(
		'type'        => 'multi-upload',
		'label'       => esc_html__( 'Images', 'modesto' ),
		'desc'        => esc_html__( 'Images to display', 'modesto' ),
		'images_only' => true,
	),
	'size'    => array(
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
				'value' => '500'
			),
			'height' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Height', 'modesto' ),
				'desc'  => esc_html__( 'Set image height', 'modesto' ),
				'help'  => esc_html__( 'Enter number of pixels ( PX )', 'modesto' ),
				'value' => '500'
			),
			'crop'   => array(
				'type'  => 'checkbox',
				'value' => true,
				'label' => esc_html__( 'Crop image', 'modesto' ),
				'desc'  => esc_html__( 'Crop and resize any image to the exact pixels or proportion you specified', 'modesto' ),
			),
		),
	),

	'popup' => array(
		'label'        => esc_html__( 'Zoom image link', 'modesto' ),
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
	fw()->theme->get_options( 'shortcode-styling' ),
	fw()->theme->get_options( 'shortcode-animations' ),
);