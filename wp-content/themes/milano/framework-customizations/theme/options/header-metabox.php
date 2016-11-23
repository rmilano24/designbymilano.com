<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'head_style' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'selected' => array(
				'label'   => esc_html__( 'Navigation style', 'modesto' ),
				'desc'    => esc_html__( 'Select default style for display logotype and website navigation', 'modesto' ),
				'type'    => 'image-picker',
				'value' => 'classic',
				'choices' => array(
					'classic' => get_template_directory_uri() . '/images/admin/header-left.png',
					'center'  => get_template_directory_uri() . '/images/admin/header-center.png',
				),
			),
		),
		'choices'      => array(
			'classic' => array(
				'top-panel'      => array(
					'type'   => 'multi-picker',
					'label'  => false,
					'desc'   => false,
					'picker' => array(
						'enable' => array(
							'label'        => esc_html__( 'Top panel', 'modesto' ),
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
				),
			),
			'center'  => array(
				'text'     => array(
					'label' => esc_html__( 'Text block', 'modesto' ),
					'desc'  => esc_html__( 'Will be shown in header', 'modesto' ),
					'type'  => 'textarea',
				),
				'position' => array(
					'label'        => esc_html__( 'Position', 'modesto' ),
					'type'         => 'switch',
					'right-choice' => array(
						'value' => 'right',
						'label' => esc_html__( 'Right', 'modesto' ),
					),
					'left-choice'  => array(
						'value' => 'left',
						'label' => esc_html__( 'Left', 'modesto' ),
					),
					'value'        => 'left',
				),
			),
		),
	),
	'header-width'   => array(
		'type'    => 'radio',
		'value'   => 'container',
		'label'   => esc_html__( 'Section Width', 'modesto' ),
		'desc'    => esc_html__( 'Width of element content container', 'modesto' ),
		'choices' => array(
			'container'            => esc_html__( 'Default', 'modesto' ),
			'wide-container'       => esc_html__( 'Large', 'modesto' ),
			'wide-container-fluid' => esc_html__( 'Full width', 'modesto' ),
		),
		'inline'  => true,
	),
	'bordered'       => array(
		'type'  => 'checkbox',
		'value' => false,
		'label' => esc_html__( 'Bordered', 'modesto' ),
		'desc'  => esc_html__( 'Add visual border for header', 'modesto' ),
		'text'  => esc_html__( 'Add border', 'modesto' ),
	),
	'hide_menu' => array(
		'label'        => esc_html__( 'Hide menu', 'modesto' ),
		'desc'         => esc_html__( 'Hide main menu in header', 'modesto' ),
		'type'         => 'switch',
		'right-choice' => array(
			'value' => 'yes',
			'label' => esc_html__( 'Hide', 'modesto' ),
		),
		'left-choice'  => array(
			'value' => 'no',
			'label' => esc_html__( 'Show', 'modesto' ),
		),
		'value'        => 'no',
	),
	'overlay-custom' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'enable' => array(
				'label'        => esc_html__( 'Enable Overlay Menu', 'modesto' ),
				'type'         => 'switch',
				'value'        => 'no',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__( 'Enable', 'modesto' ),
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__( 'Disable', 'modesto' ),
				),
			),
		),
		'choices' => array(
			'yes' => array(
				'frame'        => array(
					'label'        => esc_html__( 'Transparent frame', 'modesto' ),
					'desc'         => esc_html__( 'A small transparent frame around overlay.', 'modesto' ),
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
				'style-select' => array(
					'type'   => 'multi-picker',
					'label'  => false,
					'desc'   => false,
					'picker' => array(
						'style' => array(
							'label'   => esc_html__( 'Overlay style', 'modesto' ),
							'desc'    => esc_html__( 'Select style for overlay menu. Every variant has own options', 'modesto' ),
							'type'    => 'image-picker',
							'value'   => 'simple',
							'choices' => array(
								'simple'    => array(
									'label' => esc_html__( 'Simple', 'modesto' ),
									'small' => array(
										'height' => 100,
										'src'    => get_template_directory_uri() . '/images/admin/overlay-simple-thumb.jpg',
									),
									'large' => array(
										'height' => 400,
										'src'    => get_template_directory_uri() . '/images/admin/overlay-simple-img.jpg',
									),
								),
								'menu'      => array(
									'label' => esc_html__( 'With menu', 'modesto' ),
									'small' => array(
										'height' => 100,
										'src'    => get_template_directory_uri() . '/images/admin/overlay-menu-thumb.jpg',
									),
									'large' => array(
										'height' => 400,
										'src'    => get_template_directory_uri() . '/images/admin/overlay-menu-img.jpg',
									),
								),
								'3_columns' => array(
									'label' => esc_html__( '3 Columns', 'modesto' ),
									'small' => array(
										'height' => 100,
										'src'    => get_template_directory_uri() . '/images/admin/overlay-3-cols-thumb.jpg',
									),
									'large' => array(
										'height' => 400,
										'src'    => get_template_directory_uri() . '/images/admin/overlay-3-cols-img.jpg',
									),
								),
							),
						),
					),
					'show_borders' => true,
				),
				'position'     => array(
					'label'        => esc_html__( 'Button position', 'modesto' ),
					'type'         => 'switch',
					'right-choice' => array(
						'value' => 'right',
						'label' => esc_html__( 'Right', 'modesto' ),
					),
					'left-choice'  => array(
						'value' => 'left',
						'label' => esc_html__( 'Left', 'modesto' ),
					),
					'value'        => 'right',
				),
			),
		),
		'show_borders' => true,
	),
);