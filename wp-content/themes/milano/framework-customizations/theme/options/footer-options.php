<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'footer_style'        => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'style' => array(
				'label'   => esc_html__( 'Footer style', 'modesto' ),
				'desc'    => esc_html__( 'Select style for footer. Every variant has own options', 'modesto' ),
				'type'    => 'image-picker',
				'value'   => 'simple',
				'choices' => array(
					'simple'    => array(
						'label' => esc_html__( 'Simple', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/footer-simple-thumb.gif',
						),
						'large' => array(
							'width' => 600,
							'src'   => get_template_directory_uri() . '/images/admin/footer-simple-image.gif',
						),
					),
					'menu'      => array(
						'label' => esc_html__( 'With menu', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/footer-menu-thumb.gif',
						),
						'large' => array(
							'width' => 600,
							'src'   => get_template_directory_uri() . '/images/admin/footer-menu-image.gif',
						),
					),
					'3_columns' => array(
						'label' => esc_html__( '3 Columns', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/footer-3_columns-thumb.gif',
						),
						'large' => array(
							'width' => 600,
							'src'   => get_template_directory_uri() . '/images/admin/footer-3_columns-image.gif',
						),
					),
					'4_columns' => array(
						'label' => esc_html__( '4 Columns', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/footer-4_columns-thumb.gif',
						),
						'large' => array(
							'width' => 600,
							'src'   => get_template_directory_uri() . '/images/admin/footer-4_columns-image.gif',
						),
					),
				),
			),
		),
		'choices'      => array(
			'simple'    => array(
				'footer-bg' => array(
					'type'         => 'switch',
					'value'        => 'dark',
					'label'        => esc_html__( 'Color scheme', 'modesto' ),
					'desc'         => esc_html__( 'Inverse colors for text and set dark background', 'modesto' ),
					'help'         => sprintf( esc_html__( 'Customize background color and text color you can in <a href="%s">Appearance -> Styling section</a>.', 'modesto' ), admin_url( 'Appearance -> Styling section' ) ),
					'left-choice'  => array(
						'value' => 'light',
						'label' => esc_html__( 'Light', 'modesto' ),
					),
					'right-choice' => array(
						'value' => 'dark',
						'label' => esc_html__( 'Dark', 'modesto' ),
					),
				),
			),
			'menu'      => array(
				'footer_logo' => array(
					'label'        => esc_html__( 'Show Logo', 'modesto' ),
					'type'         => 'switch',
					'value'        => true,
					'desc'         => esc_html__( 'Logotype that defined in "General" settings tab', 'modesto' ),
					'left-choice'  => array(
						'value' => false,
						'label' => esc_html__( 'Hide', 'modesto' ),
					),
					'right-choice' => array(
						'value' => true,
						'label' => esc_html__( 'Show', 'modesto' ),
					),
				),
				'select_menu' => array(
					'desc'    => sprintf( esc_html__( 'Select one of website menus. Or <a href="%s">Create new menu</a>.', 'modesto' ), admin_url( 'nav-menus.php' ) ),
					'type'    => 'select',
					'label'   => esc_html__( 'Select menu to display', 'modesto' ),
					'choices' => modesto_get_menus(),
				),
			),
			'3_columns' => array(
				'footer-column-1' => array(
					'type'          => 'wp-editor',
					'label'         => esc_html__( 'Text in column', 'modesto' ),
					'desc'          => esc_html__( 'Text in left footer column', 'modesto' ),
					'tinymce'       => false,
					'media_buttons' => false,
					'teeny'         => true,
					'wpautop'       => true,
					'size'          => 'small',
					'editor_type'   => 'tinymce',
					'editor_height' => 100,
				),
				'footer-column-2' => array(
					'type'          => 'wp-editor',
					'label'         => esc_html__( 'Text in column', 'modesto' ),
					'desc'          => esc_html__( 'Text in right footer column', 'modesto' ),
					'tinymce'       => false,
					'media_buttons' => false,
					'wpautop'       => true,
					'size'          => 'small',
					'editor_height' => 100,
				),
			),
			'4_columns' => array(
				'footer_logo'     => array(
					'label'        => esc_html__( 'Show Logo', 'modesto' ),
					'type'         => 'switch',
					'value'        => true,
					'desc'         => esc_html__( 'Logotype that defined in "General" settings tab', 'modesto' ),
					'left-choice'  => array(
						'value' => false,
						'label' => esc_html__( 'Hide', 'modesto' ),
					),
					'right-choice' => array(
						'value' => true,
						'label' => esc_html__( 'Show', 'modesto' ),
					),
				),
				'footer-column-1' => array(
					'type'          => 'wp-editor',
					'label'         => esc_html__( 'Text in column', 'modesto' ),
					'desc'          => esc_html__( 'Text in left footer column', 'modesto' ),
					'media_buttons' => false,
					'tinymce'       => false,
					'wpautop'       => true,
					'size'          => 'small',
					'editor_type'   => 'html',
					'editor_height' => 100,
				),
				'footer-column-2' => array(
					'type'          => 'wp-editor',
					'label'         => esc_html__( 'Text in column', 'modesto' ),
					'desc'          => esc_html__( 'Text in right footer column', 'modesto' ),
					'tinymce'       => false,
					'media_buttons' => false,
					'teeny'         => true,
					'wpautop'       => true,
					'size'          => 'small',
					'editor_type'   => 'html',
					'editor_height' => 100,
				),
				'footer-column-3' => array(
					'type'          => 'wp-editor',
					'label'         => esc_html__( 'Text in column', 'modesto' ),
					'desc'          => esc_html__( 'Text in right footer column', 'modesto' ),
					'tinymce'       => false,
					'media_buttons' => false,
					'teeny'         => true,
					'wpautop'       => true,
					'size'          => 'small',
					'editor_type'   => 'html',
					'editor_height' => 100,
				),
			),
		),
		'show_borders' => false,
	),
	'footer-width'        => array(
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
	'footer-soc-networks' => array(
		'label'        => esc_html__( 'Social networks', 'modesto' ),
		'desc'         => esc_html__( 'Show social networks links from "General" settings tab', 'modesto' ),
		'type'         => 'switch',
		'left-choice'  => array(
			'value' => false,
			'label' => esc_html__( 'Hide', 'modesto' ),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__( 'Show', 'modesto' ),
		),
	),
	'footer-copyright'    => array(
		'type'          => 'wp-editor',
		'value'         => '&copy; 2016 All rights reserved. <span class="developed-by">Development with <i class="fa fa-heart"></i> by <a href="http://themeforest.net/user/crumina" target="blank">Crumina & UnionAgency.</a></span>',
		'label'         => esc_html__( 'Copyright text', 'modesto' ),
		'desc'          => esc_html__( 'Text before footer in bottom of site', 'modesto' ),
		'help'          => esc_html__( 'To disable that block on frontend - simply clean this field', 'modesto' ),
		'tinymce'       => false,
		'media_buttons' => false,
		'teeny'         => true,
		'wpautop'       => false,
		'size'          => 'large',
		'editor_height' => 100,
	),
);
