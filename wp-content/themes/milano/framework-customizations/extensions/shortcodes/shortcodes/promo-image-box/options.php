<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'bg_image' => array(
		'label' => esc_html__( 'Background Image', 'modesto' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'modesto' ),
		'type'  => 'upload'
	),
	'title'    => array(
		'label' => esc_html__( 'Title', 'modesto' ),
		'desc'  => esc_html__( 'Image box title', 'modesto' ),
		'type'  => 'text',
		'value' => ''
	),
	'item'     => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'value'        => array(
			'item_style' => 'extended',
		),
		'picker'       => array(
			'item_style' => array(
				'label'        => esc_html__( 'Item style', 'modesto' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'extended',
					'label' => esc_html__( 'Extended', 'modesto' )
				),
				'left-choice'  => array(
					'value' => 'simple',
					'label' => esc_html__( 'Simple', 'modesto' )
				),
				'desc'         => esc_html__( 'Style of item', 'modesto' ),
			)
		),
		'choices'      => array(
			'simple'   => array(),
			'extended' => array(
				'description'       => array(
					'label' => esc_html__( 'Description', 'modesto' ),
					'desc'  => esc_html__( 'Image box description', 'modesto' ),
					'type'  => 'textarea',
					'value' => ''
				),
				'hover_description' => array(
					'label' => esc_html__( 'Hover Description', 'modesto' ),
					'desc'  => esc_html__( 'Image box description on hover', 'modesto' ),
					'type'  => 'textarea',
					'value' => ''
				),
				'text_color'        => array(
					'label'        => esc_html__( 'Text color', 'modesto' ),
					'type'         => 'switch',
					'value'        => 'light',
					'right-choice' => array(
						'value' => 'light',
						'label' => esc_html__( 'Light', 'modesto' )
					),
					'left-choice'  => array(
						'value' => 'dark',
						'label' => esc_html__( 'Dark', 'modesto' )
					),
					'desc'         => esc_html__( 'Color of award title', 'modesto' ),
				),
			)
		),
		'show_borders' => false,
	),
	fw()->theme->get_options( 'shortcode-styling' ),
	fw()->theme->get_options( 'shortcode-animations' ),
);