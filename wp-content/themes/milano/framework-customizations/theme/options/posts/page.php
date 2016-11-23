<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'slider-template'  => array(
		'title'    => false,
		'type'     => 'box',
		'priority' => 'high',
		'options'  => array(
			fw()->theme->get_options( 'page-slider' ),
		),
	),
	'portfolio-slider' => array(
		'title'    => false,
		'type'     => 'box',
		'priority' => 'high',
		'options'  => array(
			fw()->theme->get_options( 'portfolio-slider' ),
		),
	),
	'design-customize' => array(
		'title'    => esc_html__( 'Customize design', 'modesto' ),
		'type'     => 'box',
		'priority' => 'high',
		'options'  => array(
			'header'          => array(
				'title'   => esc_html__( 'Header', 'modesto' ),
				'type'    => 'tab',
				'options' => array(
					'custom-header' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'enable' => array(
								'label'        => esc_html__( 'Customize', 'modesto' ),
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
								fw()->theme->get_options( 'header-metabox' ),
							),
						),
					),
				),
			),
			'stunning-header' => array(
				'title'   => esc_html__( 'Stunning Header', 'modesto' ),
				'type'    => 'tab',
				'options' => array(
					'custom_stunning' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'enable' => array(
								'label'        => esc_html__( 'Show Stunning Header', 'modesto' ),
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
						),
						'choices' => array(
							'yes' => array(
								fw()->theme->get_options( 'page-header' ),
							),
						),
					),
				),
			),
			'sidenav-links'   => array(
				'title'   => esc_html__( 'Vertical navigation', 'modesto' ),
				'type'    => 'tab',
				'options' => array(
					'custom_side_nav' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'enable' => array(
								'label'        => esc_html__( 'Side Vertical navigation', 'modesto' ),
								'desc'         => sprintf( esc_html__( 'Default vertical menu items you can set in <a href="%s">Appearance -> Theme Settings</a>.', 'modesto' ), admin_url( 'themes.php?page=fw-settings' ) ),
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
								fw()->theme->get_options( 'sidenav-options' ),
							),
						),
					),
				),
			),
			'footer'          => array(
				'title'   => esc_html__( 'Footer', 'modesto' ),
				'type'    => 'tab',
				'options' => array(
					'custom_footer' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'enable' => array(
								'label'        => esc_html__( 'Customize Footer', 'modesto' ),
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
								fw()->theme->get_options( 'footer-metabox' ),
							),
						),
					),
				),
			),
			'typography'      => array(
				'title'   => esc_html__( 'Typography', 'modesto' ),
				'type'    => 'tab',
				'options' => array(
					'font_settings' => array(
						'title'   => false,
						'type'    => 'box',
						'options' => array(
							fw()->theme->get_options( 'typography-metabox' ),
						),
					),
				),
			),
			'design'          => array(
				'title'   => esc_html__( 'Design', 'modesto' ),
				'type'    => 'tab',
				'options' => array(
					'bg-color'           => array(
						'type'  => 'color-picker',
						'value' => '',
						'label' => esc_html__( 'Page background color', 'modesto' ),
						'help'  => esc_html__( 'Click on field to choose color', 'modesto' ),
					),
					'transparent_header' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'select' => array(
								'label'        => esc_html__( 'Make header transparent', 'modesto' ),
								'type'         => 'switch',
								'right-choice' => array(
									'value' => 'yes',
									'label' => esc_html__( 'Yes', 'modesto' ),
								),
								'left-choice'  => array(
									'value' => 'no',
									'label' => esc_html__( 'No', 'modesto' ),
								),
								'value'        => 'no',
							),
						),
						'choices' => array(
							'yes' => array(
								'color' => array(
									'type'         => 'switch',
									'value'        => 'dark',
									'label'        => esc_html__( 'Header color schema', 'modesto' ),
									'left-choice'  => array(
										'value' => 'white',
										'label' => esc_html__( 'White', 'modesto' ),
									),
									'right-choice' => array(
										'value' => 'dark',
										'color' => '#000',
										'label' => esc_html__( 'Dark', 'modesto' ),
									),
								),
							),
						),
					),
				),
			),
		),
	),
	'blog-template'    => array(
		'title'   => false,
		'type'    => 'box',
		'options' => array(
			'blog_settings' => array(
				'title'   => esc_html__( 'Blog Settings', 'modesto' ),
				'type'    => 'tab',
				'options' => array(
					fw()->theme->get_options( 'blog-settings' ),
				),
			),
			'loop_settings' => array(
				'title'   => esc_html__( 'Loop Settings', 'modesto' ),
				'type'    => 'tab',
				'options' => array(
					fw()->theme->get_options( 'loop-settings' ),
				),
			),
		),
	),
	'portfolio-page'   => array(
		'title'    => false,
		'type'     => 'box',
		'priority' => 'high',
		'options'  => array(
			fw()->theme->get_options( 'portfolio-page-metabox' ),
		),
	),
	'teaser-page'      => array(
		'title'    => esc_html__( 'Teaser page settings', 'modesto' ),
		'type'     => 'box',
		'priority' => 'high',
		'options'  => array(
			fw()->theme->get_options( 'teaser-metabox' ),
		),
	),
	'contact-page'     => array(
		'title'    => esc_html__( 'Contact page settings', 'modesto' ),
		'type'     => 'box',
		'priority' => 'high',
		'options'  => array(
			fw()->theme->get_options( 'contact-metabox' ),
		),
	),
);