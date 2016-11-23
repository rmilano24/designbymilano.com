<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tabs' => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Tabs', 'modesto' ),
		'popup-title'   => esc_html__( 'Add/Edit Tabs', 'modesto' ),
		'desc'          => esc_html__( 'Create your tabs', 'modesto' ),
		'template'      => '{{=tab_title}}',
		'size'          => 'large',
		'popup-options' => array(
			'tab_title'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title', 'modesto' )
			),
			'tab_content' => array(
				'type'  => 'wp-editor',
				'size'  => 'large',
				'label' => esc_html__( 'Content', 'modesto' )
			)
		)
	),
	fw()->theme->get_options( 'shortcode-styling' ),
	fw()->theme->get_options( 'shortcode-animations' ),
);