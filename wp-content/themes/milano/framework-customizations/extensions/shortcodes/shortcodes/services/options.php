<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'block_style' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'value'        => array(
			'style' => 'square',
		),
		'picker'       => array(
			// '<custom-key>' => option
			'style' => array(
				'label'   => esc_html__( 'Choose style', 'modesto' ),
				'type'    => 'select', // or 'short-select'
				'choices' => array(
					'square' => esc_html__( 'Square', 'modesto' ),
					'round'  => esc_html__( 'Round', 'modesto' )
				),
				'desc'    => esc_html__( 'Style of module and inner items', 'modesto' ),
			)
		),
		'choices'      => array(
			'square' => array(
				'columns' => array(
					'type'       => 'slider',
					'value'      => 5,
					'properties' => array(
						'min'       => 1,
						'max'       => 6,
						'step'      => 1,
						'grid_snap' => true
					),
					'label'      => esc_html__( 'Columns number', 'modesto' ),
					'desc'       => esc_html__( 'Number of columns', 'modesto' ),
				),

				'items' => array(
					'label'         => esc_html__( 'Items', 'modesto' ),
					'type'          => 'addable-popup',
					'desc'          => esc_html__( 'Service items', 'modesto' ),
					'popup-options' => array(
						'img_style' => array(
							'type'    => 'multi-picker',
							'label'   => false,
							'desc'    => false,
							'value'   => array(
								'type' => 'icon',
							),
							'picker'  => array(
								// '<custom-key>' => option
								'type' => array(
									'label'        => esc_html__( 'Icon type', 'modesto' ),
									'type'         => 'switch',
									'right-choice' => array(
										'value' => 'icon',
										'label' => esc_html__( 'Icon', 'modesto' )
									),
									'left-choice'  => array(
										'value' => 'image',
										'label' => esc_html__( 'Image', 'modesto' )
									),
									'desc'         => esc_html__( 'Type of service icon', 'modesto' ),
								)
							),
							'choices' => array(
								'image' => array(
									'img' => array(
										'label' => esc_html__( 'Service Image', 'modesto' ),
										'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'modesto' ),
										'type'  => 'upload'
									),
								),
								'icon'  => array(
									'icn' => array(
										'type'  => 'icon',
										'value' => 'fa-smile-o',
										'label' => esc_html__( 'Service icon', 'modesto' ),
										'desc'  => esc_html__( 'Icon for service description', 'modesto' ),
									)
								),
							),
						),

						'title'       => array(
							'label' => esc_html__( 'Service title', 'modesto' ),
							'desc'  => esc_html__( 'Title of item service', 'modesto' ),
							'type'  => 'text',
							'value' => ''
						),
						'description' => array(
							'label' => esc_html__( 'Description', 'modesto' ),
							'desc'  => esc_html__( 'Service description', 'modesto' ),
							'type'  => 'textarea',
							'value' => ''
						),
					),
				),
			),
			'round'  => array(
				'items' => array(
					'label'         => esc_html__( 'Items', 'modesto' ),
					'type'          => 'addable-popup',
					'limit'         => 6,
					'template'      => '{{-title}}',
					'desc'          => esc_html__( 'Service items', 'modesto' ),
					'popup-options' => array(
						'img_style' => array(
							'type'    => 'multi-picker',
							'label'   => false,
							'desc'    => false,
							'value'   => array(
								'type' => 'icon',
							),
							'picker'  => array(
								// '<custom-key>' => option
								'type' => array(
									'label'        => esc_html__( 'Icon type', 'modesto' ),
									'type'         => 'switch',
									'right-choice' => array(
										'value' => 'icon',
										'label' => esc_html__( 'Icon', 'modesto' )
									),
									'left-choice'  => array(
										'value' => 'image',
										'label' => esc_html__( 'Image', 'modesto' )
									),
									'desc'         => esc_html__( 'Type of service icon', 'modesto' ),
								)
							),
							'choices' => array(
								'image' => array(
									'img' => array(
										'label' => esc_html__( 'Service Image', 'modesto' ),
										'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'modesto' ),
										'type'  => 'upload'
									),
								),
								'icon'  => array(
									'icn' => array(
										'type'  => 'icon',
										'value' => 'fa-smile-o',
										'label' => esc_html__( 'Service icon', 'modesto' ),
										'desc'  => esc_html__( 'Icon for service description', 'modesto' ),
									)
								),
							),
						),

						'title'       => array(
							'label' => esc_html__( 'Service title', 'modesto' ),
							'desc'  => esc_html__( 'Title of item service', 'modesto' ),
							'type'  => 'text',
							'value' => ''
						),
						'description' => array(
							'label' => esc_html__( 'Description', 'modesto' ),
							'desc'  => esc_html__( 'Service description', 'modesto' ),
							'type'  => 'textarea',
							'value' => ''
						),
						'text_color'  => array(
							'label'        => esc_html__( 'Text color', 'modesto' ),
							'type'         => 'switch',
							'value'        => 'light',
							'right-choice' => array(
								'value' => 'light',
								'label' => esc_html__( 'Light', 'modesto' )
							),
							'left-choice'  => array(
								'value' => 'dark',
								'label' => esc_html__( 'Dark', 'modesto' )
							),
							'desc'         => esc_html__( 'Color of award title', 'modesto' ),
						),
						'color'       => array(
							'type'     => 'color-picker',
							'value'    => '',
							'palettes' => array( '#ece1a4', '#f38b8b', '#c690dc', '#8aabd8' ),
							'label'    => esc_html__( 'Item color', 'modesto' ),
							'desc'     => esc_html__( 'Color of item border and item background on hover', 'modesto' ),
						)
					),
				),
			),
		),
		'show_borders' => false,
	),
	fw()->theme->get_options( 'shortcode-styling' ),
	fw()->theme->get_options( 'shortcode-animations' ),

);