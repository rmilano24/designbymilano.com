<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'folio-bottom-nav' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'post-navigation' => array(
				'label'        => esc_html__( 'Enable inner navigation', 'modesto' ),
				'desc'         => esc_html__( 'Show additional navigation after portfolio', 'modesto' ),
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
				'navigation_style' => array(
					'type'    => 'multi-picker',
					'label'   => false,
					'desc'    => false,
					'picker'  => array(
						'nav_style' => array(
							'label'   => esc_html__( 'Navigation style', 'modesto' ),
							'desc'    => esc_html__( 'Select style of navigation', 'modesto' ),
							'type'    => 'select',
							'choices' => array(
								'prev_next' => esc_html__( 'Previous and next post navigation', 'modesto' ),
								'related'   => esc_html__( 'Related portfolio posts', 'modesto' )
							),
						),
					),
					'choices' => array(
						'prev_next' => array(
							'page_select' => array(
								'type'       => 'multi-select',
								'label'      => esc_html__( 'Primary portfolio page', 'modesto' ),
								'desc'       => esc_html__( 'Select a page which center icon will be linked to', 'modesto' ),
								'help'       => esc_html__( 'Click on field and type page name to find page', 'modesto' ),
								'population' => 'posts',
								'source'     => 'page',
								'limit'      => 1,
							),
						),
						'related'   => array(
							'item_style'     => array(
								'label'   => esc_html__( 'Items style', 'modesto' ),
								'type'    => 'image-picker',
								'value'   => 'title_on',
								'choices' => array(
									'title_on'     => array(
										'label' => esc_html__( 'Standard', 'modesto' ),
										'small' => array(
											'width' => 150,
											'src'   => get_template_directory_uri() . '/images/admin/portfolio/recent-on-small.png',
										),
										'large' => array(
											'width' => 300,
											'src'   => get_template_directory_uri() . '/images/admin/portfolio/recent-on-large.png',
										),
									),
									'title_bottom' => array(
										'label' => esc_html__( 'Fullwidth', 'modesto' ),
										'small' => array(
											'width' => 150,
											'src'   => get_template_directory_uri() . '/images/admin/portfolio/recent-under-small.png',
										),
										'large' => array(
											'width' => 300,
											'src'   => get_template_directory_uri() . '/images/admin/portfolio/recent-under-large.png',
										),
									),
								),
								'desc'    => esc_html__( 'Select style of related items', 'modesto' ),
							),
						)
					),
				),
			)
		),
	),

);