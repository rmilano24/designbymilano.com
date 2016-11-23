<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'label'      => array(
		'label' => esc_html__( 'Button Label', 'modesto' ),
		'desc'  => esc_html__( 'This is the text that appears on your button', 'modesto' ),
		'type'  => 'text',
		'value' => 'Submit'
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
	'text_align' => array(
		'type'    => 'radio',
		'label'   => esc_html__( 'Horizontal align', 'modesto' ),
		'desc'    => esc_html__( 'The horizontal alignment of elements', 'modesto' ),
		'choices' => array(
			'none'        => esc_html__( 'Inline', 'modesto' ),
			'text-left'   => esc_html__( 'Left', 'modesto' ),
			'text-center' => esc_html__( 'Centered', 'modesto' ),
			'text-right'  => esc_html__( 'Right', 'modesto' ),
		),
		'inline'  => true,
	),
	'style'      => array(
		'label'   => esc_html__( 'Button Style', 'modesto' ),
		'desc'    => esc_html__( 'Choose a style for your button', 'modesto' ),
		'type'    => 'select',
		'choices' => array(
			'type-3'      => esc_html__( 'Classic', 'modesto' ),
			'type-1'      => esc_html__( 'Undelined', 'modesto' ),
			'type-2'      => esc_html__( 'Underlined bold', 'modesto' ),
			'button-link' => esc_html__( 'With dashes', 'modesto' ),
		)
	),
	fw()->theme->get_options( 'shortcode-styling' ),
	fw()->theme->get_options( 'shortcode-animations' ),
);