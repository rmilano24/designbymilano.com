<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'general' => array(
		'title'   => esc_html__( 'General', 'modesto' ),
		'type'    => 'tab',
		'options' => array(
			'general-box' => array(
				'title'   => esc_html__( 'General Settings', 'modesto' ),
				'type'    => 'box',
				'options' => array(
					'logo-options' => array(
						'type'          => 'popup',
						'label'         => esc_html__( 'Logotype options', 'modesto' ),
						'desc'          => esc_html__( 'Set your website image or text based logotype', 'modesto' ),
						'popup-title'   => esc_html__( 'Logotype options', 'modesto' ),
						'button'        => esc_html__( 'Define website logotype', 'modesto' ),
						'size'          => 'medium',
						'popup-options' => array(
							'theme-logotype' => array(
								'type'         => 'multi-picker',
								'label'        => false,
								'desc'         => false,
								'picker'       => array(
									'logo_type' => array(
										'label'        => esc_html__( 'Type of site logo', 'modesto' ),
										'type'         => 'switch',
										'right-choice' => array(
											'value' => 'text',
											'label' => esc_html__( 'Text', 'modesto' ),
										),
										'left-choice'  => array(
											'value' => 'image',
											'label' => esc_html__( 'Image', 'modesto' ),
										),
										'value'        => 'yes',
										'desc'         => esc_html__( 'Select what you like to display - image or text in logotype section', 'modesto' ),

									),
								),
								'choices'      => array(
									'text'  => array(
										'name' => array(
											'type'  => 'text',
											'label' => esc_html__( 'Text', 'modesto' ),
											'desc'  => esc_html__( 'Write your website logo name', 'modesto' ),
											'value' => get_bloginfo( 'name' ),
										),
									),
									'image' => array(
										'logo_image_white' => array(
											'label'       => esc_html__( 'Image White', 'modesto' ),
											'desc'        => esc_html__( 'Will be displayed on dark backgrounds', 'modesto' ),
											'type'        => 'upload',
											'images_only' => true,
											'value'       => array(
												'url' => get_template_directory_uri() . '/img/logo1.png',
											),
										),
										'retina_white'     => array(
											'type'  => 'switch',
											'value' => 'no',
											'label' => esc_html__( 'Retina-ready', 'modesto' ),
											'desc'  => esc_html__( 'This image wil be displayed twice smaller than uploaded image size.', 'modesto' ),
										),
										'logo_image_dark' => array(
											'label'       => esc_html__( 'Image Dark', 'modesto' ),
											'desc'        => esc_html__( 'Will be displayed on white backgrounds', 'modesto' ),
											'type'        => 'upload',
											'images_only' => true,
											'value'       => array(
												'url' => get_template_directory_uri() . '/img/logo.png',
											),
										),
										'retina_dark'     => array(
											'type'  => 'switch',
											'value' => 'no',
											'label' => esc_html__( 'Retina-ready', 'modesto' ),
											'desc'  => esc_html__( 'This image wil be displayed twice smaller than uploaded image size.', 'modesto' ),
										),
									),
								),
								'show_borders' => true,
							),
						),
					),
					'soc-label' => array(
						'type'  => 'text',
						'label' => esc_html__( 'Social block Label', 'modesto' ),
						'desc'  => esc_html__( 'Label for Social networks links block', 'modesto' ),
						'value' => 'Follow me:',
					),
					'soc-networks' => array(
						'label'         => esc_html__( 'Social networks', 'modesto' ),
						'type'          => 'addable-popup',
						'template'      => '{{- link }}',
						'desc'          => esc_html__( 'Links for your social networks profiles', 'modesto' ),
						'popup-options' => array(
							'link' => array(
								'label' => esc_html__( 'Link', 'modesto' ),
								'type'  => 'text',
								'value' => 'http://',
								'desc'  => esc_html__( 'Type link for icon', 'modesto' ),
							),
							'icon' => array(
								'label' => esc_html__( 'Icon', 'modesto' ),
								'type'  => 'icon',
								'value' => 'fa fa-facebook',
								'desc'  => esc_html__( 'Select icon do display', 'modesto' ),
							),
						),
					),
					fw()->theme->get_options( 'sidenav-options' ),
				),
			),
		),
	),
);
