<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'project_header' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'style' => array(
				'label'   => esc_html__( 'Header style', 'modesto' ),
				'desc'    => esc_html__( 'Select default style for display stunning headers on portfolio items', 'modesto' ),
				'type'    => 'image-picker',
				'value'   => 'classic',
				'choices' => array(
					'classic'         => array(
						'label' => esc_html__( 'Classic', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/portfolio/single-stunning-small-1.png'
						),
						'large' => array(
							'width' => 300,
							'src'   => get_template_directory_uri() . '/images/admin/portfolio/single-stunning-large-1.png'
						),
					),
					'background-card' => array(
						'label' => esc_html__( 'Image background', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/portfolio/single-stunning-small-2.png'
						),
						'large' => array(
							'width' => 300,
							'src'   => get_template_directory_uri() . '/images/admin/portfolio/single-stunning-large-2.png'
						),
					),
					'background'      => array(
						'label' => esc_html__( 'Image background', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/portfolio/single-stunning-small-3.png'
						),
						'large' => array(
							'width' => 300,
							'src'   => get_template_directory_uri() . '/images/admin/portfolio/single-stunning-large-3.png'
						),
					),
					'full-screen'     => array(
						'label' => esc_html__( 'Full screen', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/portfolio/single-stunning-small-4.png'
						),
						'large' => array(
							'width' => 300,
							'src'   => get_template_directory_uri() . '/images/admin/portfolio/single-stunning-large-4.png'
						),
					),
					'none'            => array(
						'label' => esc_html__( 'No header', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/portfolio/single-stunning-small-5.png'
						),
						'large' => array(
							'width' => 300,
							'src'   => get_template_directory_uri() . '/images/admin/portfolio/single-stunning-large-5.png'
						),
					),
				),
			),
		),
		'choices' => array(
			'background'      => array(
				'color' => array(
					'type'         => 'switch',
					'value'        => 'white',
					'label'        => esc_html__( 'Default font color schema', 'modesto' ),
					'left-choice'  => array(
						'value' => 'white',
						//'color' => '#9E9E9E',
						'label' => esc_html__( 'White', 'modesto' ),
					),
					'right-choice' => array(
						'value' => 'dark',
						'color' => '#000',
						'label' => esc_html__( 'Dark', 'modesto' ),
					),
				),
			),
			'background-card' => array(
				'scroll_button' => array(
					'type'  => 'checkbox',
					'value' => true,
					'label' => esc_html__( 'Scroll button', 'modesto' ),
					'desc'  => esc_html__( 'Add scroll butoon with scroll to next section function', 'modesto' ),
					'text'  => esc_html__( 'Add scroll button', 'modesto' ),
				),
			),
			'full-screen'     => array(
				'color' => array(
					'type'         => 'switch',
					'value'        => 'white',
					'label'        => esc_html__( 'Default font color schema', 'modesto' ),
					'left-choice'  => array(
						'value' => 'white',
						//'color' => '#9E9E9E',
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

		'show_borders' => false,
	),
);