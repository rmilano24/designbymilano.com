<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'slides'          => array(
		'label'         => esc_html__( 'Slides', 'modesto' ),
		'type'          => 'addable-popup',
		'desc'          => esc_html__( 'Clients', 'modesto' ),
		'template' => esc_html__('Client','modesto').': {{- client_name }}',
		'popup-title' => null,
		'size' => 'small',
		'add-button-text' => esc_html__('Add client', 'modesto'),
		'popup-options' => array(
			'client_name'        => array(
				'label' => esc_html__( 'Client Name', 'modesto' ),
				'desc'  => esc_html__( 'Will be used in "title" and "alt" tags', 'modesto' ),
				'type'  => 'text'
			),
			'client_logo'        => array(
				'label' => esc_html__( 'Client logo', 'modesto' ),
				'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'modesto' ),
				'type'  => 'upload'
			),
			'popup_image'        => array(
				'label' => esc_html__( 'Popup image for client', 'modesto' ),
				'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'modesto' ),
				'type'  => 'upload'
			),
			'link'       => array(
				'type'          => 'popup',
				'label'         => esc_html__( 'Set link', 'modesto' ),
				'popup-title'   => esc_html__( 'Insert/edit link', 'modesto' ),
				'button'        => esc_html__( 'Select URL', 'modesto' ),
				'size'          => 'small', // small, medium, large
				'popup-options' => array(
					'selected' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'selected' => array(
								'label'   => esc_html__( 'Image source', 'modesto' ),
								'type'    => 'select', // or 'short-select'
								'choices' => array(
									'url'  => esc_html__( 'Type url', 'modesto' ),
									'page' => esc_html__( 'Select page', 'modesto' ),
								),
								'desc'    => esc_html__( 'Select image source.', 'modesto' ),
							),
						),
						'choices' => array(
							'url'  => array(
								'link' => array(
									'type'  => 'text',
									'label' => esc_html__( 'Type Link', 'modesto' ),
									'desc'  => esc_html__( 'Where should this element link to?', 'modesto' )
								),
							),
							'page' => array(
								'link' => array(
									'type'       => 'multi-select',
									'label'      => esc_html__( 'Select some blog page', 'modesto' ),
									'desc'       => esc_html__( 'Select a page which this element will be linked to', 'modesto' ),
									'help'       => esc_html__( 'Click on field and type page name to find page', 'modesto' ),
									'population' => 'posts',
									'source'     => 'page',
									'limit'      => 1,
								),
							),
						),
					),
					'target'   => array(
						'type'         => 'switch',
						'label'        => esc_html__( 'Open Link in New Window', 'modesto' ),
						'desc'         => esc_html__( 'Select here if you want to open the linked page in a new window', 'modesto' ),
						'right-choice' => array(
							'value' => '_blank',
							'label' => esc_html__( 'Yes', 'modesto' ),
						),
						'left-choice'  => array(
							'value' => '_self',
							'label' => esc_html__( 'No', 'modesto' ),
						),
					),
				),
			),
		),
	),
	'columns'        => array(
		'type'       => 'slider',
		'value'      => 6,
		'properties' => array(
			'min'       => 1,
			'max'       => 6,
			'step'      => 1,
			'grid_snap' => true
		),
		'label'      => esc_html__( 'Columns number', 'modesto' ),
		'desc'       => esc_html__( 'Number of columns for clients presentation', 'modesto' ),
	),
	fw()->theme->get_options( 'shortcode-styling' ),
	fw()->theme->get_options( 'shortcode-animations' ),
);