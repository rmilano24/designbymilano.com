<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'category_bg_color' => array(
		'label' => esc_html__( 'Category label color', 'modesto' ),
		'type'  => 'rgba-color-picker',
		'help'  => esc_html__( 'Click on field to choose color', 'modesto' ),
		'value' => '',
	),
	'header_style'      => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'blog' => array(
				'label'   => esc_html__( 'Header style', 'modesto' ),
				'desc'    => esc_html__( 'Select default style for display stunning headers on blog category posts', 'modesto' ),
				'type'    => 'image-picker',
				'value' => 'default',
				'choices' => array(
					'default'     => array(
						'label' => esc_html__( 'Default', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/default.png'
						),
					),
					'classic'     => array(
						'label' => esc_html__( 'Classic', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/stunning-simple-thumb.png'
						),
						'large' => array(
							'width' => 300,
							'src'   => get_template_directory_uri() . '/images/admin/stunning-simple.png'
						),
					),
					'background'  => array(
						'label' => esc_html__( 'Image background', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/stunnig-image-thumb.png'
						),
						'large' => array(
							'width' => 300,
							'src'   => get_template_directory_uri() . '/images/admin/stunnig-image.png'
						),
					),
					'full-screen' => array(
						'label' => esc_html__( 'Full screen', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/stunnig-fullscreen-thumb.png'
						),
						'large' => array(
							'width' => 300,
							'src'   => get_template_directory_uri() . '/images/admin/stunnig-fullscreen.png'
						),
					),
				),

			),
		),
		'choices' => array(
			'classic'     => array(),
			'background'  => array(
				'color'      => array(
					'type'  => 'color-picker',
					'value' => '',
					'label' => esc_html__( 'Default background color', 'modesto' ),
					'help'  => esc_html__( 'Click on field to choose color', 'modesto' ),
				),
				'image'      => array(
					'type'  => 'upload',
					'label' => esc_html__( 'Default background image', 'modesto' ),
				),
				'fullscreen' => array(
					'type'  => 'checkbox',
					'value' => true,
					'label' => esc_html__( 'Full width image', 'modesto' ),
					'desc'  => esc_html__( 'Expand image to full width of stunning header', 'modesto' ),
					'text'  => esc_html__( 'Expand', 'modesto' ),
				),
			),
			'full-screen' => array(
				'color'         => array(
					'type'  => 'color-picker',
					'value' => '',
					'label' => esc_html__( 'Default background color', 'modesto' ),
					'help'  => esc_html__( 'Click on field to choose color', 'modesto' ),
				),
				'image'         => array(
					'type'  => 'upload',
					'label' => esc_html__( 'Default background image', 'modesto' ),
				),
				'scroll_button' => array(
					'type'  => 'checkbox',
					'value' => true,
					'label' => esc_html__( 'Scroll button', 'modesto' ),
					'desc'  => esc_html__( 'Add scroll butoon with scroll to next section function', 'modesto' ),
					'text'  => esc_html__( 'Add scroll button', 'modesto' ),
				),
			)
		),

		'show_borders' => false,
	),
	'blog_style'        => array(
		'type'   => 'multi-picker',
		'label'  => false,
		'desc'   => false,
		'picker' => array(
			'style' => array(
				'label'   => esc_html__( 'Blog style', 'modesto' ),
				'desc'    => esc_html__( 'Select default style for display posts. Alternatively can be changed in page with template called "Blog"', 'modesto' ),
				'type'    => 'image-picker',
				'value'   => 'default',
				'choices' => array(
					'default'  => array(
						'label' => esc_html__( 'Default', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/default.png'
						),
					),
					'classic'  => array(
						'label' => esc_html__( 'Classic', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/bloc-classic-thumb.png'
						),
						'large' => array(
							'width' => 300,
							'src'   => get_template_directory_uri() . '/images/admin/bloc-classic-image.png'
						),
					),
					'grid'     => array(
						'label' => esc_html__( 'Grid', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/blog-grid-thumb.png'
						),
						'large' => array(
							'width' => 300,
							'src'   => get_template_directory_uri() . '/images/admin/blog-grid-image.png'
						),
					),
					'alt'      => array(
						'label' => esc_html__( 'Alternation', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/bloc-left-right-thumb.png'
						),
						'large' => array(
							'width' => 300,
							'src'   => get_template_directory_uri() . '/images/admin/bloc-left-right-image.png'
						),
					),
					'material' => array(
						'label' => esc_html__( 'Material', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/blog-material-thumb.png'
						),
						'large' => array(
							'width' => 300,
							'src'   => get_template_directory_uri() . '/images/admin/blog-material-image.png'
						),
					)

				),
			)
		),

		'show_borders' => false,
	),
);