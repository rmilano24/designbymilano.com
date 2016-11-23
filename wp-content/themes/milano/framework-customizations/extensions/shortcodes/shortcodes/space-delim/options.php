<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'height' => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Spacer height', 'modesto' ),
		'choices' => modesto_get_spacers(),
		'value'   => 'b35'
	),
	'custom' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'choice' => array(
				'label'        => esc_html__( 'Customize responsive', 'modesto' ),
				'type'         => 'switch',
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__( 'No', 'modesto' ),
				),
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__( 'Yes', 'modesto' ),
				),
				'value'        => 'no',
			),
		),
		'choices' => array(
			'yes' => array(
				'tablet-album'     => array(
					'type'    => 'select',
					'label'   => esc_html__( 'Tablet Album', 'modesto' ),
					'choices' => modesto_get_spacers(),
					'value'   => 'b45',
					'help'    => esc_html__( 'Above screen size', 'modesto' ) . ' 768px',
				),
				'tablet-landscape' => array(
					'type'    => 'select',
					'label'   => esc_html__( 'Tablet Landscape', 'modesto' ),
					'choices' => modesto_get_spacers(),
					'value'   => 'b50',
					'help'    => esc_html__( 'Above screen size', 'modesto' ) . ' 992px',
				),
				'pc'               => array(
					'type'    => 'select',
					'label'   => esc_html__( 'Large screens', 'modesto' ),
					'choices' => modesto_get_spacers(),
					'value'   => 'b60',
					'help'    => esc_html__( 'Above screen size', 'modesto' ) . ' 1200px',
				),
			),
		),
	),
	fw()->theme->get_options( 'shortcode-styling' ),
	fw()->theme->get_options( 'shortcode-animations' ),
);
