<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'single-style' => array(
		'label'   => esc_html__( 'Post style', 'modesto' ),
		'desc'    => esc_html__( 'Select Style for display single post.', 'modesto' ),
		'type'    => 'image-picker',
		'value'   => 'classic',
		'choices' => array(
			'classic'   => array(
				'label' => esc_html__( 'Classic', 'modesto' ),
				'small' => array(
					'height' => 100,
					'src'    => get_template_directory_uri() . '/images/admin/blog-1-thumb.jpg'
				),
				'large' => array(
					'height' => 211,
					'src'    => get_template_directory_uri() . '/images/admin/blog-1-image.jpg'
				),
			),
			'centered'  => array(
				'label' => esc_html__( 'Centered', 'modesto' ),
				'small' => array(
					'height' => 100,
					'src'    => get_template_directory_uri() . '/images/admin/blog-3-thumb.jpg'
				),
				'large' => array(
					'height' => 211,
					'src'    => get_template_directory_uri() . '/images/admin/blog-3-image.jpg'
				),
			),
			'header_bg' => array(
				'label' => esc_html__( 'Header Background', 'modesto' ),
				'small' => array(
					'height' => 100,
					'src'    => get_template_directory_uri() . '/images/admin/blog-2-thumb.jpg'
				),
				'large' => array(
					'height' => 211,
					'src'    => get_template_directory_uri() . '/images/admin/blog-2-image.jpg'
				),
			),
		),
	),
	'hide-post-meta'  => array(
		'type'  => 'checkbox',
		'value' => false,
		'label' => esc_html__( 'Hide additional post info', 'modesto' ),
		'desc'  => esc_html__( 'Hide author / date post information ', 'modesto' ),
		'text'  => esc_html__( 'Hide', 'modesto' ),
	),
	'post-navigation' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'option' => array(
				'label'        => esc_html__( 'Previous and next post navigation', 'modesto' ),
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
				'page_select' => array(
					'type'       => 'multi-select',
					'label'      => esc_html__( 'Primary blog page', 'modesto' ),
					'desc'       => esc_html__( 'Select a page which center icon will be linked to', 'modesto' ),
					'help'       => esc_html__( 'Click on field and type page name to find page', 'modesto' ),
					'population' => 'posts',
					'source'     => 'page',
					'limit'      => 1,
				),
			),
		),
	),
	'recent_style' => array(
		'label'   => esc_html__( 'Related posts style', 'modesto' ),
		'desc'    => esc_html__( 'Select Style for display recent posts box below main post.', 'modesto' ),
		'help'    => esc_html__( 'Block will show only if "Related Posts for WordPress" plugin installed and activated', 'modesto' ),
		'type'    => 'image-picker',
		'value'   => 'full',
		'choices' => array(
			'full'  => array(
				'label' => esc_html__( 'No Description', 'modesto' ),
				'small' => array(
					'height' => 100,
					'src'    => get_template_directory_uri() . '/images/admin/related-1-thumb.jpg'
				),
				'large' => array(
					'height' => 211,
					'src'    => get_template_directory_uri() . '/images/admin/related-1-image.jpg'
				),
			),
			'short' => array(
				'label' => esc_html__( 'With Description', 'modesto' ),
				'small' => array(
					'height' => 100,
					'src'    => get_template_directory_uri() . '/images/admin/related-2-thumb.jpg'
				),
				'large' => array(
					'height' => 211,
					'src'    => get_template_directory_uri() . '/images/admin/related-2-image.jpg'
				),
			),

		),
	),
);