<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$twitter_slider_otions = array();
if ( defined( 'FW' ) && function_exists( 'fw_ext_social_twitter_get_connection' ) && function_exists( 'curl_exec' ) ) {
	$twitter_slider_otions = array(
		'twitter' => array(
			'type'    => 'multi-picker',
			'label'   => false,
			'desc'    => false,
			'picker'  => array(
				'enable' => array(
					'label'        => esc_html__( 'Twitter in posts', 'modesto' ),
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
					'name'     => array(
						'type'  => 'text',
						'value' => 'crumina',
						'label' => esc_html__( 'User', 'modesto' ),
					),
					'number'   => array(
						'type'  => 'text',
						'value' => '5',
						'label' => esc_html__( 'Number of tweets', 'modesto' ),
					),
					'position' => array(
						'type'  => 'text',
						'value' => '5',
						'label' => esc_html__( 'Position in grid', 'modesto' ),
						'help'  => esc_html__( 'Type post number that twitter widget will be shown instead.', 'modesto' ),
					),
				),
			),
		),

	);
}

$options = array(
	'header_style' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'blog' => array(
				'label'   => esc_html__( 'Header style', 'modesto' ),
				'desc'    => esc_html__( 'Select default style for display stunning headers on blog category posts', 'modesto' ),
				'type'    => 'image-picker',
				'value'   => 'classic',
				'choices' => array(
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
					'none'        => array(
						'label' => esc_html__( 'No header', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/disable.png'
						),
					),
				),

			),
		),
		'choices' => array(
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
	'blog_style'   => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'style' => array(
				'label'   => esc_html__( 'Blog style', 'modesto' ),
				'desc'    => esc_html__( 'Select default style for display posts. Alternatively can be changed in page with template called "Blog"', 'modesto' ),
				'type'    => 'image-picker',
				'value'   => 'classic',
				'choices' => array(
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
		'choices'      => array(
			'classic'  => array(
				'hide_addinfo' => array(
					'type'  => 'checkbox',
					'value' => false,
					'label' => esc_html__( 'Hide additional info', 'modesto' ),
					'desc'  => esc_html__( 'Hide author name, post date and like/comments counters on posts list', 'modesto' ),
					'text'  => esc_html__( 'Hide', 'modesto' ),
				),
				'sidebar'      => array(
					'type'    => 'multi-picker',
					'label'   => false,
					'desc'    => false,
					'picker'  => array(
						'enable' => array(
							'label'        => esc_html__( 'Sidebar', 'modesto' ),
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
							'align' => array(
								'label'   => esc_html__( 'Sidebar align', 'modesto' ),
								'desc'    => esc_html__( 'Select sidebar position', 'modesto' ),
								'type'    => 'image-picker',
								'value'   => 'right',
								'choices' => array(
									'right' => array(
										'label' => esc_html__( 'Right align', 'modesto' ),
										'small' => array(
											'height' => 60,
											'src'    => get_template_directory_uri() . '/images/2cr.png'
										),
									),
									'left'  => array(
										'label' => esc_html__( 'Left align', 'modesto' ),
										'small' => array(
											'height' => 60,
											'src'    => get_template_directory_uri() . '/images/2cl.png'
										),
									),
								),
							),
						),
					),
				),
			),
			'grid'     => array(
				'text_length'  => array(
					'label' => esc_html__( 'Excerpt length', 'modesto' ),
					'type'  => 'short-text',
					'value' => 20,
					'desc'  => esc_html__( 'Number of words to display on news page', 'modesto' ),
				),
				'hide_addinfo' => array(
					'type'  => 'checkbox',
					'value' => false,
					'label' => esc_html__( 'Hide additional info', 'modesto' ),
					'desc'  => esc_html__( 'Hide author name, post date and like/comments counters on posts list', 'modesto' ),
					'text'  => esc_html__( 'Hide', 'modesto' ),
				),
				'sidebar'      => array(
					'type'    => 'multi-picker',
					'label'   => false,
					'desc'    => false,
					'picker'  => array(
						'enable' => array(
							'label'        => esc_html__( 'Sidebar', 'modesto' ),
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
							'align' => array(
								'label'   => esc_html__( 'Sidebar align', 'modesto' ),
								'desc'    => esc_html__( 'Select sidebar position', 'modesto' ),
								'type'    => 'image-picker',
								'value'   => 'right',
								'choices' => array(
									'right' => array(
										'label' => esc_html__( 'Right align', 'modesto' ),
										'small' => array(
											'height' => 60,
											'src'    => get_template_directory_uri() . '/images/2cr.png'
										),
									),
									'left'  => array(
										'label' => esc_html__( 'Left align', 'modesto' ),
										'small' => array(
											'height' => 60,
											'src'    => get_template_directory_uri() . '/images/2cl.png'
										),
									),
								),
							),
						),
					),
				),
			),
			'alt'      => array(
				'full_width'  => array(
					'type'  => 'checkbox',
					'value' => true,
					'label' => esc_html__( 'Full width', 'modesto' ),
					'desc'  => esc_html__( 'Layout will be stretched to full width of screen', 'modesto' ),
					'text'  => esc_html__( 'Make full width', 'modesto' ),
				),
				'text_length' => array(
					'label' => esc_html__( 'Excerpt length', 'modesto' ),
					'type'  => 'short-text',
					'value' => 40,
					'desc'  => esc_html__( 'Number of words to display on news page', 'modesto' ),
				),
				'hide_author' => array(
					'type'  => 'checkbox',
					'value' => false,
					'label' => esc_html__( 'Hide author', 'modesto' ),
					'desc'  => esc_html__( 'Hide avatar and nickname of posts author', 'modesto' ),
					'text'  => esc_html__( 'Hide', 'modesto' ),
				),
			),
			'material' => array(
				'hide_sort'    => array(
					'type'  => 'checkbox',
					'value' => false,
					'label' => esc_html__( 'Hide sort panel', 'modesto' ),
					'desc'  => esc_html__( 'Hide category based sort panel', 'modesto' ),
					'text'  => esc_html__( 'Hide', 'modesto' ),
				),
				'hide_addinfo' => array(
					'type'  => 'checkbox',
					'value' => false,
					'label' => esc_html__( 'Hide additional info', 'modesto' ),
					'desc'  => esc_html__( 'Hide author name, post date and like/comments counters on posts list', 'modesto' ),
					'text'  => esc_html__( 'Hide', 'modesto' ),
				),
				$twitter_slider_otions,
			),
		),
		'show_borders' => false,
	),

);