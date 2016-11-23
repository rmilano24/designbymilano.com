<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'style' => array(
		'label'   => esc_html__( 'Post style', 'modesto' ),
		'desc'    => esc_html__( 'Select Style for display single post.', 'modesto' ),
		'type'    => 'image-picker',
		'value'   => 'default',
		'choices' => array(
			'default'   => array(
				'label' => esc_html__( 'Default', 'modesto' ),
				'small' => array(
					'height' => 100,
					'src'    => get_template_directory_uri() . '/images/admin/default.png'
				),
			),
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
);