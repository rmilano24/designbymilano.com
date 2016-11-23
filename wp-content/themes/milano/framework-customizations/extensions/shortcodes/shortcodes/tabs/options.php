<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


$options = array(
	'tabs' => array(
		'label'         => esc_html__( 'Tabs', 'modesto' ),
		'type'          => 'addable-popup',
		'limit'         => 8,
		'template'      => '{{=title}}',
		'size'          => 'large',
		'popup-options' => array(
			'title'        => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title', 'modesto' )
			),
			'tabs_content' => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'value'   => 'layout_1',
				'picker'  => array(
					'slider' => array(
						'label'        => esc_html__( 'Enable slider in tab', 'modesto' ),
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
						'slide'          => array(
							'label'       => esc_html__( 'Tabs', 'modesto' ),
							'type'        => 'addable-box',
							'limit'       => 8,
							'template'    => esc_html__( 'Slide', 'modesto' ),
							'box-options' => array(
								'content' => array(
									'label'           => esc_html__( 'Content column', 'modesto' ),
									'desc'            => esc_html__( 'If you will add two columns of content - tab will be split into 2 columns', 'modesto' ),
									'type'            => 'addable-popup',
									'limit'           => 2,
									'size'            => 'large',
									'template'        => '{{=title}}',
									'add-button-text' => esc_html__( 'Add Content', 'modesto' ),
									'popup-options'   => array(
										'title'       => array(
											'label' => esc_html__( 'Title', 'modesto' ),
											'desc'  => esc_html__( 'Title for section', 'modesto' ),
											'type'  => 'text',
											'value' => ''
										),
										'description' => array(
											'label' => esc_html__( 'Description', 'modesto' ),
											'desc'  => esc_html__( 'Description for section', 'modesto' ),
											'type'  => 'wp-editor',
											'size'  => 'large',
											'height' => '300',
										),
										'border'      => array(
											'label' => esc_html__( 'Add border', 'modesto' ),
											'type'  => 'switch',
											'desc'  => esc_html__( 'Add border around slide content', 'modesto' ),
										),
									),
								),
							),
						),
						'slider_options' => array(
							'type'         => 'multi-picker',
							'label'        => false,
							'desc'         => false,
							'picker'       => array(
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
							),
							'choices'      => array(
								'on' => array(
									'autoplay' => array(
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
							'show_borders' => false,
						),
						'arrows' => array(
							'type'  => 'checkbox',
							'value' => true,
							'label' => esc_html__( 'Show navigation arrows', 'modesto' ),
						),
						'dots' => array(
							'type'  => 'checkbox',
							'value' => false,
							'label' => esc_html__( 'Show navigation dots', 'modesto' ),
						),
					),
					'no'  => array(
						'content' => array(
							'label'           => esc_html__( 'Content column', 'modesto' ),
							'desc'            => esc_html__( 'If you will add two columns of content - tab will be split into 2 columns', 'modesto' ),
							'type'            => 'addable-popup',
							'limit'           => 2,
							'size'            => 'large',
							'template'        => '{{=title}}',
							'add-button-text' => esc_html__( 'Add Content', 'modesto' ),
							'popup-options'   => array(
								'title'       => array(
									'label' => esc_html__( 'Title', 'modesto' ),
									'desc'  => esc_html__( 'Title for section', 'modesto' ),
									'type'  => 'text',
									'value' => ''
								),
								'description' => array(
									'label' => esc_html__( 'Description', 'modesto' ),
									'desc'  => esc_html__( 'Description for section', 'modesto' ),
									'type'  => 'wp-editor',
									'size'  => 'large',
									'height' => '300',
								),
								'border'      => array(
									'label' => esc_html__( 'Add border', 'modesto' ),
									'type'  => 'switch',
									'desc'  => esc_html__( 'Add border around slide content', 'modesto' ),
								),
							),
						),
					),
				),
			),
		),
	),
	fw()->theme->get_options( 'shortcode-styling' ),
	fw()->theme->get_options( 'shortcode-animations' ),
);