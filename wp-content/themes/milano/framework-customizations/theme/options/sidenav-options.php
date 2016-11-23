<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'side-nav-options' => array(
		'type'          => 'popup',
		'label'         => esc_html__( 'Vertical navigation links', 'modesto' ),
		'desc'          => esc_html__( 'Link for pages where vertical navigation is turned on', 'modesto' ),
		'popup-title'   => esc_html__( 'Side navigation options', 'modesto' ),
		'button'        => esc_html__( 'Add / Change links', 'modesto' ),
		'size'          => 'medium',
		'popup-options' => array(
			'left-links'  => array(
				'type'            => 'addable-box',
				'label'           => esc_html__( 'Left side links:', 'modesto' ),
				'desc'            => esc_html__( 'Links that will be displayed on left edge', 'modesto' ),
				'box-options'     => array(
					'link'  => array(
						'label' => esc_html__( 'Link', 'modesto' ),
						'type'  => 'text',
						'value' => 'http://',
						'desc'  => esc_html__( 'Type link url', 'modesto' ),
					),
					'label' => array(
						'label' => esc_html__( 'Label', 'modesto' ),
						'type'  => 'text',
						'value' => '',
						'desc'  => esc_html__( 'Type menu label', 'modesto' ),
					),
				),
				'template'        => 'Page: {{- label }}',
				'limit'           => 4,
				'add-button-text' => esc_html__( 'Add link', 'modesto' ),
				'sortable'        => true,
			),
			'right-links' => array(
				'type'            => 'addable-box',
				'label'           => esc_html__( 'Right side links:', 'modesto' ),
				'desc'            => esc_html__( 'Links that will be displayed on right edge', 'modesto' ),
				'box-options'     => array(
					'link'  => array(
						'label' => esc_html__( 'Link', 'modesto' ),
						'type'  => 'text',
						'value' => 'http://',
						'desc'  => esc_html__( 'Type link url', 'modesto' ),
					),
					'label' => array(
						'label' => esc_html__( 'Label', 'modesto' ),
						'type'  => 'text',
						'value' => '',
						'desc'  => esc_html__( 'Type menu label', 'modesto' ),
					),
				),
				'template'        => 'Page: {{- label }}',
				'limit'           => 4,
				'add-button-text' => esc_html__( 'Add link', 'modesto' ),
				'sortable'        => true,
			),
		),
	),
);