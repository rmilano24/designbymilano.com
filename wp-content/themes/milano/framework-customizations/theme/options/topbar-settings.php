<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'topbar-options' => array(
		'type'          => 'popup',
		'label'         => esc_html__( 'Top bar section', 'modesto' ),
		'desc'          => esc_html__( 'Additional section before website header', 'modesto' ),
		'popup-title'   => esc_html__( 'Top bar section options', 'modesto' ),
		'button'        => esc_html__( 'Configure Top Bar Section', 'modesto' ),
		'size'          => 'medium',
		'popup-options' => array(
			'text-align'   => array(
				'type'    => 'image-picker',
				'value'   => 'left',
				'label'   => esc_html__( 'Content placement', 'modesto' ),
				'desc'    => esc_html__( 'Choose content position on top bar', 'modesto' ),
				'choices' => array(
					'left'  => get_template_directory_uri() . '/images/admin/top-section-left-text.png',
					'right' => get_template_directory_uri() . '/images/admin/top-section-right-text.png',
				),
			),
			'text-block'   => array(
				'label' => esc_html__( 'Text', 'modesto' ),
				'type'  => 'textarea',
				'value' => '<a class="mouseover-simple" href="tel:+35554358125">tel. +3 555 4358 125</a><div class="grey-line vertical"></div><a class="mouseover-simple" href="mailto:info@modesto.com">e-mail info@modesto.com</a>',
			),
			'soc-networks' => array(
				'label'        => esc_html__( 'Social networks', 'modesto' ),
				'desc'         => esc_html__( 'Show social networks links from "General" settings tab', 'modesto' ),
				'type'         => 'switch',
				'left-choice'  => array(
					'value' => false,
					'label' => esc_html__( 'Hide', 'modesto' ),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__( 'Show', 'modesto' ),
				),
			),
		),
	),
);