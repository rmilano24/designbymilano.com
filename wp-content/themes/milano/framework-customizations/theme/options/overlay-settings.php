<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'overlay-options' => array(
		'type'          => 'popup',
		'label'         => esc_html__( 'Configure popup overlay', 'modesto' ),
		'popup-title'   => esc_html__( 'Configure popup overlay', 'modesto' ),
		'button'        => esc_html__( 'Select options', 'modesto' ),
		'size'          => 'medium',
		'popup-options' => array(
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
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
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
				'choices' => array(
					'simple'    => array(
						'select_menu' => array(
							'desc'    => sprintf( esc_html__( 'Select one of website menus. Or <a href="%s">Create new menu</a>.', 'modesto' ), admin_url( 'nav-menus.php' ) ),
							'type'    => 'select',
							'label'   => esc_html__( 'Select menu to display', 'modesto' ),
							'choices' => modesto_get_menus(),
						),
					),
					'menu'      => array(
						'select_menu' => array(
							'desc'    => sprintf( esc_html__( 'Select one of website menus. Or <a href="%s">Create new menu</a>.', 'modesto' ), admin_url( 'nav-menus.php' ) ),
							'type'    => 'select',
							'label'   => esc_html__( 'Select menu to display', 'modesto' ),
							'choices' => modesto_get_menus(),
						),
					),
					'3_columns' => array(
						'title' => array(
							'type'  => 'text',
							'label' => esc_html__( 'Text block title', 'modesto' ),
							'desc'  => esc_html__( 'Title for text block in overflow panel', 'modesto' ),
						),
						'text'  => array(
							'label'         => esc_html__( 'Text', 'modesto' ),
							'desc'          => esc_html__( 'Text in overflow window', 'modesto' ),
							'type'          => 'wp-editor',
							'size'          => 'small',
							'editor_height' => 200,
						),
					),
				),
			),
		),
	),
);