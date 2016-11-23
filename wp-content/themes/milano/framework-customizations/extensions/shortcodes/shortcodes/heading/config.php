<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array(
	'page_builder' => array(
		'title'       => esc_html__( 'Custom Heading', 'modesto' ),
		'description' => esc_html__( 'Custom title and subtitle', 'modesto' ),
		'tab'         => esc_html__( 'Content Elements', 'modesto' ),
		'icon' => 'fa fa-font',
		'title_template' => '{{- title }}<div><{{- o.title_tag }}>{{= o.title }}</{{- o.title_tag }}></div>',
	)
);