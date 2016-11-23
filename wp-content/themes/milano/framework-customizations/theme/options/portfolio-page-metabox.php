<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'portfolio_style' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'style' => array(
				'label'   => esc_html__( 'Portfolio style', 'modesto' ),
				'desc'    => esc_html__( 'Select default style for display portfolios. Alternatively can be changed in page with template called "Portfolio"', 'modesto' ),
				'type'    => 'image-picker',
				'value' => 'default',
				'choices' => array(
					'default'                => array(
						'label' => esc_html__( 'Default', 'modesto' ),
						'small' => array(
							'height' => 100,
							'src'    => get_template_directory_uri() . '/images/admin/default.png',
						),
						'large' => array(
							'width' => 300,
							'src'   => get_template_directory_uri() . '/images/admin/default.png',
						),
					),
					'hover_info'             => array(
						'label' => esc_html__( 'With hover info', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/folio-loop/hover-info-small.png',
						),
						'large' => array(
							'width' => 300,
							'src'   => get_template_directory_uri() . '/images/admin/folio-loop/hover-info-large.png',
						),
					),
					'hover_effect'           => array(
						'label' => esc_html__( 'With hover effect', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/folio-loop/hover-effect-small.png',
						),
						'large' => array(
							'width' => 300,
							'src'   => get_template_directory_uri() . '/images/admin/folio-loop/hover-effect-large.png',
						),
					),
					'hover_effect_fullwidth' => array(
						'label' => esc_html__( 'Fullwidth with hover effect', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/folio-loop/hover-effect-desc-small.png',
						),
						'large' => array(
							'width' => 300,
							'src'   => get_template_directory_uri() . '/images/admin/folio-loop/hover-effect-desc-large.png',
						),
					),
					'extended'               => array(
						'label' => esc_html__( 'With extended description', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/folio-loop/extended-small.png',
						),
						'large' => array(
							'width' => 300,
							'src'   => get_template_directory_uri() . '/images/admin/folio-loop/extended-large.png',
						),
					),
					'fancy'                  => array(
						'label' => esc_html__( 'Fancy', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/folio-loop/fancy-small.png',
						),
						'large' => array(
							'width' => 300,
							'src'   => get_template_directory_uri() . '/images/admin/folio-loop/fancy-large.png',
						),
					),
					'alter'                  => array(
						'label' => esc_html__( 'Alter', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/folio-loop/alter-small.png',
						),
						'large' => array(
							'width' => 300,
							'src'   => get_template_directory_uri() . '/images/admin/folio-loop/alter-large.png',
						),
					),
					'grid'                   => array(
						'label' => esc_html__( 'Grid', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/folio-loop/grid-small.png',
						),
						'large' => array(
							'width' => 300,
							'src'   => get_template_directory_uri() . '/images/admin/folio-loop/grid-large.png',
						),
					),
					'list'                   => array(
						'label' => esc_html__( 'List', 'modesto' ),
						'small' => array(
							'width' => 100,
							'src'   => get_template_directory_uri() . '/images/admin/folio-loop/list-small.png',
						),
						'large' => array(
							'width' => 300,
							'src'   => get_template_directory_uri() . '/images/admin/folio-loop/list-large.png',
						),
					),
				),
			)
		),
		'choices'      => array(
			'default'                => array(),
			'hover_info'             => array(
				'show_filter_panel' => array(
					'label'   => esc_html__( 'Show filter', 'modesto' ),
					'type'    => 'select',
					'desc'    => esc_html__( 'Show filter panel before portfolio items', 'modesto' ),
					'choices' => array(
						'default' => esc_html__( 'Default', 'modesto' ),
						'no'      => esc_html__( 'No', 'modesto' ),
						'yes'     => esc_html__( 'Yes', 'modesto' ),
					),
				),
				'columns_settings'  => array(
					'type'    => 'multi-picker',
					'label'   => false,
					'desc'    => false,
					'value'   => array(
						'columns_number' => 'default',
					),
					'picker'  => array(
						// '<custom-key>' => option
						'columns_number' => array(
							'label'   => esc_html__( 'Columns number', 'modesto' ),
							'type'    => 'select',
							'desc'    => esc_html__( 'Number of item columns', 'modesto' ),
							'choices' => array(
								'default' => esc_html__( 'Default', 'modesto' ),
								'2'       => esc_html__( 'Two', 'modesto' ) . ' ' . esc_html__( 'columns', 'modesto' ),
								'3'       => esc_html__( 'Three', 'modesto' ) . ' ' . esc_html__( 'columns', 'modesto' ),
							),
						),
					),
					'choices' => array(
						'default' => array(),
						'2'       => array(),
						'3'       => array(
							'fullwidth' => array(
								'label'   => esc_html__( 'Enable fullwidth', 'modesto' ),
								'type'    => 'select',
								'desc'    => esc_html__( 'Enable full width section', 'modesto' ),
								'choices' => array(
									'default' => esc_html__( 'Default', 'modesto' ),
									'no'      => esc_html__( 'No', 'modesto' ),
									'yes'     => esc_html__( 'Yes', 'modesto' ),
								),
							)
						),
					),
				),
				'excerpt_settings'  => array(
					'type'    => 'multi-picker',
					'label'   => false,
					'desc'    => false,
					'value'   => array(
						'excerpt_show' => 'default',

						'yes' => array(
							'position' => 'default',
						)
					),
					'picker'  => array(
						// '<custom-key>' => option
						'excerpt_show' => array(
							'label'   => esc_html__( 'Show excerpt', 'modesto' ),
							'type'    => 'select',
							'desc'    => esc_html__( 'Show short excerpt', 'modesto' ),
							'choices' => array(
								'default' => esc_html__( 'Default', 'modesto' ),
								'no'      => esc_html__( 'No', 'modesto' ),
								'yes'     => esc_html__( 'Yes', 'modesto' ),
							),
						)
					),
					'choices' => array(
						'default' => array(),
						'no'      => array(),
						'yes'     => array(
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
				'title_on_slide'    => array(
					'label'   => esc_html__( 'Show title', 'modesto' ),
					'type'    => 'select',
					'desc'    => esc_html__( 'Show title on the bottom of slide', 'modesto' ),
					'choices' => array(
						'default' => esc_html__( 'Default', 'modesto' ),
						'no'      => esc_html__( 'No', 'modesto' ),
						'yes'     => esc_html__( 'Yes', 'modesto' ),
					),
				),
				'add_info'          => array(
					'label'   => esc_html__( 'Info position', 'modesto' ),
					'type'    => 'select',
					'desc'    => esc_html__( 'Position of title and excerpt(if enabled) on slide', 'modesto' ),
					'choices' => array(
						'default' => esc_html__( 'Default', 'modesto' ),
						'top'     => esc_html__( 'Top', 'modesto' ),
						'bottom'  => esc_html__( 'Bottom', 'modesto' ),
					),
				),

			),
			'hover_effect'           => array(
				'show_filter'      => array(
					'type'    => 'multi-picker',
					'label'   => false,
					'desc'    => false,
					'value'   => array(
						'show_filter_panel' => 'default',

						'yes' => array(
							'position' => 'default',
						)
					),
					'picker'  => array(
						// '<custom-key>' => option
						'show_filter_panel' => array(
							'label'   => esc_html__( 'Show filter', 'modesto' ),
							'type'    => 'select',
							'desc'    => esc_html__( 'Show filter panel before portfolio items', 'modesto' ),
							'choices' => array(
								'default' => esc_html__( 'Default', 'modesto' ),
								'no'      => esc_html__( 'No', 'modesto' ),
								'yes'     => esc_html__( 'Yes', 'modesto' ),
							),
						)
					),
					'choices' => array(
						'default' => array(),
						'no'  => array(),
						'yes' => array(
							'filter_settings' => array(
								'type'    => 'multi-picker',
								'label'   => false,
								'desc'    => false,
								'value'   => array(
									'filter_style' => 'standard',
								),
								'picker'  => array(
									'filter_style' => array(
										'label'   => esc_html__( 'Filter style', 'modesto' ),
										'type'    => 'select',
										'desc'    => esc_html__( 'Style of sorting filter', 'modesto' ),
										'choices' => array(
											'default'  => esc_html__( 'Default', 'modesto' ),
											'standard' => esc_html__( 'Standard', 'modesto' ),
											'select'   => esc_html__( 'Select', 'modesto' ),
										),
									),
								),
								'choices' => array(
									'select'   => array(
										'title' => array(
											'label' => esc_html__( 'Title', 'modesto' ),
											'desc'  => esc_html__( 'Small title on left from filter', 'modesto' ),
											'type'  => 'text',
										),
									),
									'standard' => array()
								),
							),

						),
					),
				),
				'columns_settings' => array(
					'type'    => 'multi-picker',
					'label'   => false,
					'desc'    => false,
					'value'   => array(
						'columns_number' => 'default',
					),
					'picker'  => array(
						// '<custom-key>' => option
						'columns_number' => array(
							'label'   => esc_html__( 'Columns number', 'modesto' ),
							'type'    => 'select',
							'desc'    => esc_html__( 'Number of item columns', 'modesto' ),
							'choices' => array(
								'default' => esc_html__( 'Default', 'modesto' ),
								'2'       => esc_html__( 'Two', 'modesto' ) . ' ' . esc_html__( 'columns', 'modesto' ),
								'3'       => esc_html__( 'Three', 'modesto' ) . ' ' . esc_html__( 'columns', 'modesto' ),
							),
						),
					),
					'choices' => array(
						'default' => array(),
						'2'       => array(),
						'3'       => array(
							'fullwidth' => array(
								'label'   => esc_html__( 'Enable fullwidth', 'modesto' ),
								'type'    => 'select',
								'desc'    => esc_html__( 'Enable full width section', 'modesto' ),
								'choices' => array(
									'default' => esc_html__( 'Default', 'modesto' ),
									'no'      => esc_html__( 'No', 'modesto' ),
									'yes'     => esc_html__( 'Yes', 'modesto' ),
								),
							)
						),
					),
				),
				'show_meta'        => array(
					'label'   => esc_html__( 'Show meta', 'modesto' ),
					'type'    => 'select',
					'desc'    => esc_html__( 'Show portfolio metadata(categories, client name etc.)', 'modesto' ),
					'choices' => array(
						'default' => esc_html__( 'Default', 'modesto' ),
						'on'      => esc_html__( 'On', 'modesto' ),
						'off'     => esc_html__( 'Off', 'modesto' ),
					),
				),

			),
			'hover_effect_fullwidth' => array(
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
							'label'   => esc_html__( 'Show excerpt', 'modesto' ),
							'type'    => 'select',
							'desc'    => esc_html__( 'Show short excerpt', 'modesto' ),
							'choices' => array(
								'default' => esc_html__( 'Default', 'modesto' ),
								'no'      => esc_html__( 'No', 'modesto' ),
								'yes'     => esc_html__( 'Yes', 'modesto' ),
							),
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
				'show_meta'        => array(
					'label'   => esc_html__( 'Show meta', 'modesto' ),
					'type'    => 'select',
					'desc'    => esc_html__( 'Show portfolio metadata(categories, client name etc.)', 'modesto' ),
					'choices' => array(
						'default' => esc_html__( 'Default', 'modesto' ),
						'on'      => esc_html__( 'On', 'modesto' ),
						'off'     => esc_html__( 'Off', 'modesto' ),
					),
				),
				'fullwidth'        => array(
					'label'   => esc_html__( 'Enable fullwidth', 'modesto' ),
					'type'    => 'select',
					'desc'    => esc_html__( 'Enable full width section', 'modesto' ),
					'choices' => array(
						'default' => esc_html__( 'Default', 'modesto' ),
						'no'      => esc_html__( 'No', 'modesto' ),
						'yes'     => esc_html__( 'Yes', 'modesto' ),
					),
				)
			),
			'extended'               => array(
				'excerpt_settings' => array(
					'type'    => 'multi-picker',
					'label'   => false,
					'desc'    => false,
					'value'   => array(

						'excerpt_show' => 'default',

						'yes' => array(
							'position' => 'default',
						)
					),
					'picker'  => array(
						// '<custom-key>' => option
						'excerpt_show' => array(
							'label'   => esc_html__( 'Show excerpt', 'modesto' ),
							'type'    => 'select',
							'desc'    => esc_html__( 'Show short excerpt', 'modesto' ),
							'choices' => array(
								'default' => esc_html__( 'Default', 'modesto' ),
								'no'      => esc_html__( 'No', 'modesto' ),
								'yes'     => esc_html__( 'Yes', 'modesto' ),
							),
						)
					),
					'choices' => array(
						'default' => array(),
						'no'      => array(),
						'yes'     => array(
							'excerpt_length' => array(
								'label' => esc_html__( 'Excerpt length', 'modesto' ),
								'desc'  => esc_html__( 'Length of excerpt text(words)', 'modesto' ),
								'help'  => esc_html__( 'Please input number here(leave empty for theme default value)', 'modesto' ),
								'type'  => 'text',
								'value' => 9
							),
						),
					),
				),
				'show_meta'        => array(
					'label'   => esc_html__( 'Show meta', 'modesto' ),
					'type'    => 'select',
					'desc'    => esc_html__( 'Show portfolio metadata(categories, client name etc.)', 'modesto' ),
					'choices' => array(
						'default' => esc_html__( 'Default', 'modesto' ),
						'on'      => esc_html__( 'On', 'modesto' ),
						'off'     => esc_html__( 'Off', 'modesto' ),
					),
				),
			),
			'fancy'                  => array(
				'show_meta' => array(
					'label'   => esc_html__( 'Show meta', 'modesto' ),
					'type'    => 'select',
					'desc'    => esc_html__( 'Show portfolio metadata(categories, client name etc.)', 'modesto' ),
					'choices' => array(
						'default' => esc_html__( 'Default', 'modesto' ),
						'on'      => esc_html__( 'On', 'modesto' ),
						'off'     => esc_html__( 'Off', 'modesto' ),
					),
				),
			),
			'alter'                  => array(
				'excerpt_settings' => array(
					'type'    => 'multi-picker',
					'label'   => false,
					'desc'    => false,
					'value'   => array(

						'excerpt_show' => 'default',

						'yes' => array(
							'position' => 'top',
						)
					),
					'picker'  => array(
						// '<custom-key>' => option
						'excerpt_show' => array(
							'label'   => esc_html__( 'Show excerpt', 'modesto' ),
							'type'    => 'select',
							'desc'    => esc_html__( 'Show short excerpt', 'modesto' ),
							'choices' => array(
								'default' => esc_html__( 'Default', 'modesto' ),
								'no'      => esc_html__( 'No', 'modesto' ),
								'yes'     => esc_html__( 'Yes', 'modesto' ),
							),
						)
					),
					'choices' => array(
						'default' => array(),
						'no'      => array(),
						'yes'     => array(
							'excerpt_length' => array(
								'label' => esc_html__( 'Excerpt length', 'modesto' ),
								'desc'  => esc_html__( 'Length of excerpt text(words)', 'modesto' ),
								'help'  => esc_html__( 'Please input number here(leave empty for theme default value)', 'modesto' ),
								'type'  => 'text',
								'value' => 9
							),
							'read_more_text' => array(
								'label' => esc_html__( 'Read more text', 'modesto' ),
								'desc'  => esc_html__( 'Text on read more button', 'modesto' ),
								'help'  => esc_html__( 'Leave empty for theme default value', 'modesto' ),
								'type'  => 'text',
								'value' => esc_html__( 'read more', 'modesto' )
							),
						),
					),
				),
				'fullwidth'        => array(
					'label'   => esc_html__( 'Enable fullwidth', 'modesto' ),
					'type'    => 'select',
					'desc'    => esc_html__( 'Enable full width section', 'modesto' ),
					'choices' => array(
						'default' => esc_html__( 'Default', 'modesto' ),
						'no'      => esc_html__( 'No', 'modesto' ),
						'yes'     => esc_html__( 'Yes', 'modesto' ),
					),
				)
			),
			'grid'                   => array(
				'grid_settings'  => array(
					'type'    => 'multi-picker',
					'label'   => false,
					'desc'    => false,
					'value'   => array(
						'style' => 'award_image',
					),
					'picker'  => array(
						'item_style' => array(
							'label'   => esc_html__( 'Item style', 'modesto' ),
							'desc'    => esc_html__( 'Select style of items', 'modesto' ),
							'type'    => 'image-picker',
							'value'  => 'default',
							'choices' => array(
								'default'      => array(
									'label' => esc_html__( 'Default', 'modesto' ),
									'small' => array(
										'height' => 100,
										'src'    => get_template_directory_uri() . '/images/admin/default.png',
									),
									'large' => array(
										'width' => 300,
										'src'   => get_template_directory_uri() . '/images/admin/default.png',
									),
								),
								'hover_info'   => array(
									'label' => esc_html__( 'With hover info', 'modesto' ),
									'small' => array(
										'width' => 100,
										'src'   => get_template_directory_uri() . '/images/admin/folio-loop/hover-info-small.png',
									),
									'large' => array(
										'width' => 300,
										'src'   => get_template_directory_uri() . '/images/admin/folio-loop/hover-info-large.png',
									),
								),
								'hover_effect' => array(
									'label' => esc_html__( 'With hover effect', 'modesto' ),
									'small' => array(
										'width' => 100,
										'src'   => get_template_directory_uri() . '/images/admin/folio-loop/hover-effect-small.png',
									),
									'large' => array(
										'width' => 300,
										'src'   => get_template_directory_uri() . '/images/admin/folio-loop/hover-effect-large.png',
									),
								),
							),
						),
					),
					'choices' => array(
						'default'      => array(),
						'hover_info'   => array(
							'excerpt_length' => array(
								'label' => esc_html__( 'Excerpt length', 'modesto' ),
								'desc'  => esc_html__( 'Length of excerpt text(words)', 'modesto' ),
								'help'  => esc_html__( 'Please input number here', 'modesto' ),
								'type'  => 'text',
								'value' => 9
							),
							'fullwidth'      => array(
								'label'   => esc_html__( 'Enable fullwidth', 'modesto' ),
								'type'    => 'select',
								'desc'    => esc_html__( 'Enable full width section', 'modesto' ),
								'choices' => array(
									'default' => esc_html__( 'Default', 'modesto' ),
									'no'      => esc_html__( 'No', 'modesto' ),
									'yes'     => esc_html__( 'Yes', 'modesto' ),
								),
							)
						),
						'hover_effect' => array(
							'show_meta' => array(
								'label'   => esc_html__( 'Show meta', 'modesto' ),
								'type'    => 'select',
								'desc'    => esc_html__( 'Show portfolio metadata(categories, client name etc.)', 'modesto' ),
								'choices' => array(
									'default' => esc_html__( 'Default', 'modesto' ),
									'on'      => esc_html__( 'On', 'modesto' ),
									'off'     => esc_html__( 'Off', 'modesto' ),
								),
							),
						),
					),
				),
				'columns_number' => array(
					'value'      => 3,
					'label'      => esc_html__( 'Columns number', 'modesto' ),
					'type'       => 'slider',
					'properties' => array(
						'min'       => 2,
						'max'       => 6,
						'step'      => 1,
						'grid_snap' => true
					),
					'desc'       => esc_html__( 'Number of item columns', 'modesto' ),
				),
			),
			'list'                   => array()

		),
		'show_borders' => false,
	),
	'order'           => array(
		'label'   => esc_html__( 'Order', 'modesto' ),
		'type'    => 'select',
		'desc'    => esc_html__( 'Designates the ascending or descending order of items', 'modesto' ),
		'choices' => array(
			'default' => esc_html__( 'Default', 'modesto' ),
			'DESC'    => esc_html__( 'Descending', 'modesto' ),
			'ASC'     => esc_html__( 'Ascending', 'modesto' ),
		),

	),
	'orderby'         => array(
		'label'   => esc_html__( 'Order posts by', 'modesto' ),
		'type'    => 'select',
		'desc'    => esc_html__( 'Sort retrieved posts by parameter.', 'modesto' ),
		'choices' => array(
			'default'       => esc_html__( 'Default', 'modesto' ),
			'date'          => esc_html__( 'Order by date', 'modesto' ),
			'comment_count' => esc_html__( 'Order by number of comments', 'modesto' ),
			'author'        => esc_html__( 'Order by author.', 'modesto' ),
			'modified'      => esc_html__( 'Order by last modified date.', 'modesto' ),
		),
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
	'per_page'        => array(
		'label' => esc_html__( 'Items per page', 'modesto' ),
		'desc'  => esc_html__( 'How many portfolios show per page', 'modesto' ),
		'help'  => esc_html__( 'Please input number here. Leave empty for default value', 'modesto' ),
		'type'  => 'text',
	),

);