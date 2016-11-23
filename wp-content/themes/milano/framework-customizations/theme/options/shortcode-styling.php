<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'margin_class' => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Margin bottom', 'modesto' ),
		'choices' => modesto_get_spacers(),
		'value'   => ''
	),
	'add_class'    => array(
		'label' => esc_html__( 'Additional classes', 'modesto' ),
		'desc'  => esc_html__( 'Extra classes for customize your shortcode', 'modesto' ),
		'type'  => 'text',
		'value' => ''
	),
	'inline_style' => array(
		'label' => esc_html__( 'Inline style', 'modesto' ),
		'desc'  => esc_html__( 'Inline styles for customize your shortcode', 'modesto' ),
		'type'  => 'textarea',
		'help'  => esc_html__( 'You can use both "style="{your custom css rules}"" and {you custom css rules} syntax', 'modesto' ),
		'value' => ''
	),

);
