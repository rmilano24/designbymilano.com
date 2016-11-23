<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(

	'overlay-switch' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'enable' => array(
				'label'        => esc_html__( 'Overlay menu', 'modesto' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__( 'Enable', 'modesto' ),
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__( 'Disable', 'modesto' ),
				),
				'value'        => 'yes',
			),
		),
		'choices' => array(
			'yes' => array(
				fw()->theme->get_options( 'overlay-settings' ),
				'position' => array(
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
	'head_style'     => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'selected' => array(
				'label'   => esc_html__( 'Navigation style', 'modesto' ),
				'desc'    => esc_html__( 'Select default style for display logotype and website navigation', 'modesto' ),
				'type'    => 'image-picker',
				'value'   => 'classic',
				'choices' => array(
					'classic' => get_template_directory_uri() . '/images/admin/header-left.png',
					'center'  => get_template_directory_uri() . '/images/admin/header-center.png',
				),
			),
		),
		'choices'      => array(
			'classic' => array(
				'top-panel' => array(
					'type'    => 'multi-picker',
					'label'   => false,
					'desc'    => false,
					'picker'  => array(
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
					'choices' => array(
						'yes' => array(
							fw()->theme->get_options( 'topbar-settings' ),
						),
					),
				),
			),
			'center'  => array(
				'top-text' => array(
					'type'    => 'multi-picker',
					'label'   => false,
					'desc'    => false,
					'picker'  => array(
						'enable' => array(
							'label'        => esc_html__( 'Text block', 'modesto' ),
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
			),
		),
		'show_borders' => true,
	),
);
