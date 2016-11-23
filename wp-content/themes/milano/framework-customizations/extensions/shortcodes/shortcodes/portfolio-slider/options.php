<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'style'           => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'value'        => array(
			'slider_style' => 'phone',
		),
		'picker'       => array(
			'slider_style' => array(
				'label'   => esc_html__( 'Slider style', 'modesto' ),
				'type'    => 'image-picker',
				'valu'    => 'standard',
				'choices' => array(
					'standard'    => get_template_directory_uri() . '/images/shortcode/slider/portfolio-classic.png',
					'fullwidth'   => get_template_directory_uri() . '/images/shortcode/slider/portfolio-full.png',
					'description' => get_template_directory_uri() . '/images/shortcode/slider/portdolio-desc.png',
				),
				'desc'    => esc_html__( 'Select style of slider', 'modesto' ),
			)
		),
		'choices'      => array(
			'standard'    => array(
				'excerpt_settings' => array(
					'type'    => 'multi-picker',
					'label'   => false,
					'desc'    => false,
					'value'   => array(
						'excerpt_show' => 'yes',

						'yes' => array(
							'position' => 'top',
						)
					),
					'picker'  => array(
						// '<custom-key>' => option
						'excerpt_show' => array(
							'label'        => esc_html__( 'Show excerpt', 'modesto' ),
							'type'         => 'switch',
							'right-choice' => array(
								'value' => 'no',
								'label' => esc_html__( 'No', 'modesto' )
							),
							'left-choice'  => array(
								'value' => 'yes',
								'label' => esc_html__( 'Yes', 'modesto' )
							),
							'desc'         => esc_html__( 'Show short excerpt on right of featured image', 'modesto' ),
						)
					),
					'choices' => array(
						'no'  => array(),
						'yes' => array(
							'excerpt_length' => array(
								'label' => esc_html__( 'Excerpt length', 'modesto' ),
								'desc'  => esc_html__( 'Length of excerpt text(words)', 'modesto' ),
								'help'  => esc_html__( 'Please input number here', 'modesto' ),
								'type'  => 'text',
								'value' => 9
							),
							'read_more_text' => array(
								'label' => esc_html__( 'Read more text', 'modesto' ),
								'desc'  => esc_html__( 'Text on read more button', 'modesto' ),
								'type'  => 'text',
								'value' => esc_html__( 'view more', 'modesto' )
							),
						),
					),
				),
				'show_meta'        => array(
					'label'        => esc_html__( 'Show meta', 'modesto' ),
					'type'         => 'switch',
					'value'        => 'on',
					'right-choice' => array(
						'value' => 'yes',
						'label' => esc_html__( 'Yes', 'modesto' )
					),
					'left-choice'  => array(
						'value' => 'no',
						'label' => esc_html__( 'No', 'modesto' )
					),
					'desc'         => esc_html__( 'Show portfolio metadata(categories and client name)', 'modesto' ),
				),
				'project_info'     => array(
					'label'        => esc_html__( 'Show project info', 'modesto' ),
					'type'         => 'switch',
					'value'        => 'on',
					'right-choice' => array(
						'value' => 'yes',
						'label' => esc_html__( 'Yes', 'modesto' )
					),
					'left-choice'  => array(
						'value' => 'no',
						'label' => esc_html__( 'No', 'modesto' )
					),
					'desc'         => esc_html__( 'Show additional info about portfolio post on slide', 'modesto' ),
				),
			),
			'description' => array(
				'excerpt_settings' => array(
					'type'    => 'multi-picker',
					'label'   => false,
					'desc'    => false,
					'value'   => array(
						'excerpt_show' => 'yes',

						'yes' => array(
							'position' => 'top',
						)
					),
					'picker'  => array(
						// '<custom-key>' => option
						'excerpt_show' => array(
							'label'        => esc_html__( 'Show excerpt', 'modesto' ),
							'type'         => 'switch',
							'right-choice' => array(
								'value' => 'no',
								'label' => esc_html__( 'No', 'modesto' )
							),
							'left-choice'  => array(
								'value' => 'yes',
								'label' => esc_html__( 'Yes', 'modesto' )
							),
							'desc'         => esc_html__( 'Show short excerpt on right of featured image', 'modesto' ),
						)
					),
					'choices' => array(
						'no'  => array(),
						'yes' => array(
							'excerpt_length' => array(
								'label' => esc_html__( 'Excerpt length', 'modesto' ),
								'desc'  => esc_html__( 'Length of excerpt text(words)', 'modesto' ),
								'help'  => esc_html__( 'Please input number here', 'modesto' ),
								'type'  => 'text',
								'value' => 9
							),
						),
					),
				),
				'slides_per_page'  => array(
					'type'       => 'slider',
					'value'      => 2,
					'properties' => array(
						'min'       => 1,
						'max'       => 10,
						'step'      => 1,
						'grid_snap' => true
					),
					'label'      => esc_html__( 'Slides per page', 'modesto' ),
				),
			),
			'fullwidth'   => array(
				'show_meta' => array(
					'label'        => esc_html__( 'Show meta', 'modesto' ),
					'type'         => 'switch',
					'value'        => 'on',
					'right-choice' => array(
						'value' => 'yes',
						'label' => esc_html__( 'Yes', 'modesto' )
					),
					'left-choice'  => array(
						'value' => 'no',
						'label' => esc_html__( 'No', 'modesto' )
					),
					'desc'         => esc_html__( 'Show portfolio metadata(categories and client name)', 'modesto' ),
				),
			),
		),
		'show_borders' => false,
	),
	'items_number'    => array(
		'label' => esc_html__( 'Items number', 'modesto' ),
		'desc'  => esc_html__( 'Number of slides', 'modesto' ),
		'value' => 9,
		'type'  => 'text',
	),
	'slider_infinity' => array(
		'label'        => esc_html__( 'Infinite loop', 'modesto' ),
		'type'         => 'switch',
		'right-choice' => array(
			'value' => '1',
			'label' => esc_html__( 'On', 'modesto' ),
		),
		'left-choice'  => array(
			'value' => '0',
			'label' => esc_html__( 'Off', 'modesto' ),
		),
		'value'        => 'off',
		'desc'         => esc_html__( 'Enable loop slides without end', 'modesto' ),
	),
	'autoplay'        => array(
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
	'taxonomy_select' => array(
		'type'       => 'multi-select',
		'label'      => esc_html__( 'Categories', 'modesto' ),
		'help'       => esc_html__( 'Click on field and type category name to find  category', 'modesto' ),
		'population' => 'taxonomy',
		'source'     => 'fw-portfolio-category',
		'limit'      => 100,
	),
	'exclude'         => array(
		'type'  => 'checkbox',
		'value' => false,
		'label' => esc_html__( 'Exclude selected', 'modesto' ),
		'desc'  => esc_html__( 'Show all categories except that selected in "Categories" option', 'modesto' ),
		'text'  => esc_html__( 'Exclude', 'modesto' ),
	),
	'order'           => array(
		'label'   => esc_html__( 'Order', 'modesto' ),
		'type'    => 'select',
		'desc'    => esc_html__( 'Designates the ascending or descending order of items', 'modesto' ),
		'choices' => array(
			'DESC' => esc_html__( 'Descending', 'modesto' ),
			'ASC'  => esc_html__( 'Ascending', 'modesto' ),
		),

	),
	'orderby'         => array(
		'label'   => esc_html__( 'Order posts by', 'modesto' ),
		'type'    => 'select',
		'desc'    => esc_html__( 'Sort retrieved posts by parameter.', 'modesto' ),
		'choices' => array(
			'title'         => esc_html__( 'Order by title', 'modesto' ),
			'date'          => esc_html__( 'Order by date', 'modesto' ),
			'comment_count' => esc_html__( 'Order by number of comments', 'modesto' ),
			'author'        => esc_html__( 'Order by author.', 'modesto' ),
			'modified'      => esc_html__( 'Order by last modified date.', 'modesto' ),
		),
	),
	fw()->theme->get_options( 'shortcode-styling' ),
);