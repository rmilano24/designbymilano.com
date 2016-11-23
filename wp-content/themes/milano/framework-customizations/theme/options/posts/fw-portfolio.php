<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main'             => array(
		'title'   => false,
		'type'    => 'box',
		'context' => 'normal',
		'options' => array(),
	),
	'fields'           => array(
		'title'   => esc_html__( 'Portfolio additional fields', 'modesto' ),
		'type'    => 'box',
		'context' => 'side',
		'options' => array(
			'client'    => array(
				'label' => esc_html__( 'Client', 'modesto' ),
				'type'  => 'text',
				'value' => '',
				'desc'  => esc_html__( 'Name of client', 'modesto' ),
			),
			'team_box'  => array(
				'type'          => 'popup',
				'label'         => esc_html__( 'Project stuff', 'modesto' ),
				'desc'          => esc_html__( 'Members who worked on project', 'modesto' ),
				'popup-title'   => esc_html__( 'Project stuff', 'modesto' ),
				'button'        => esc_html__( 'Edit members', 'modesto' ),
				'size'          => 'small', // small, medium, large
				'popup-options' => array(
					'team' => array(
						'type'            => 'addable-box',
						'label'           => false,
						'desc'            => esc_html__( 'Members who worked on project', 'modesto' ),
						'box-options'     => array(
							'profession' => array( 'type' => 'text', 'label' => esc_html__( 'Profession', 'modesto' ), ),
							'name'       => array( 'type' => 'text', 'label' => esc_html__( 'Name', 'modesto' ), ),
						),
						'template'        => 'Staff: {{- profession }}', // box title
						'limit'           => 0, // limit the number of boxes that can be added
						'add-button-text' => esc_html__( 'Add project member', 'modesto' ),
						'sortable'        => true,
					)
				),
			),
			'works-box' => array(
				'type'          => 'popup',
				'label'         => esc_html__( 'Project works', 'modesto' ),
				'desc'          => esc_html__( 'Additional project information', 'modesto' ),
				'popup-title'   => esc_html__( 'Project works', 'modesto' ),
				'button'        => esc_html__( 'Edit', 'modesto' ),
				'size'          => 'small', // small, medium, large
				'popup-options' => array(
					'works' => array(
						'label'           => false,
						'type'            => 'addable-option',
						'help'            => esc_html__( 'Help tip', 'modesto' ),
						'option'          => array( 'type' => 'text' ),
						'add-button-text' => esc_html__( 'Add new project job', 'modesto' ),
						'sortable'        => true,
					),
				),
			),
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
								'label'        => esc_html__( 'Customize Stunning Header', 'modesto' ),
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
								fw()->theme->get_options( 'project-header' ),
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
			'related'         => array(
				'title'   => esc_html__( 'Related', 'modesto' ),
				'type'    => 'tab',
				'options' => array(
					'custom_related' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'enable' => array(
								'label'        => esc_html__( 'Customize Related', 'modesto' ),
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
								fw()->theme->get_options( 'project-related' ),
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


		),
	),
);