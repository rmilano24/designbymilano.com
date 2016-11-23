<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'description'   => array(
		'label' => esc_html__( 'Page description', 'modesto' ),
		'type'  => 'textarea',
		'desc'  => esc_html__( 'Description text to display under the title', 'modesto' ),
	),
	'contact_title' => array(
		'label' => esc_html__( 'Contact form title', 'modesto' ),
		'type'  => 'text',
		'desc'  => esc_html__( 'Title before contact block form', 'modesto' ),
	),
	'column_1'      => array(
		'type'          => 'wp-editor',
		'label'         => esc_html__( 'Text in column', 'modesto' ),
		'desc'          => esc_html__( 'Text in left column', 'modesto' ),
		'tinymce'       => true,
		'media_buttons' => false,
		'teeny'         => true,
		'wpautop'       => true,
		'size'          => 'small',
		'editor_type'   => 'html',
		'editor_height' => 100,
		'reinit'        => true,
	),
	'column_2'      => array(
		'type'          => 'wp-editor',
		'label'         => esc_html__( 'Text in column', 'modesto' ),
		'desc'          => esc_html__( 'Text in center column', 'modesto' ),
		'tinymce'       => true,
		'media_buttons' => false,
		'teeny'         => true,
		'wpautop'       => true,
		'size'          => 'small',
		'editor_type'   => 'html',
		'editor_height' => 100,
		'reinit'        => true,
	),
	'column_3'      => array(
		'type'          => 'wp-editor',
		'label'         => esc_html__( 'Text in column', 'modesto' ),
		'desc'          => esc_html__( 'Text in right column', 'modesto' ),
		'tinymce'       => true,
		'media_buttons' => false,
		'teeny'         => true,
		'wpautop'       => true,
		'size'          => 'small',
		'editor_type'   => 'html',
		'editor_height' => 100,
		'reinit'        => true,
	),
	'soc_networks'  => array(
		'label'        => esc_html__( 'Social networks', 'modesto' ),
		'desc'         => esc_html__( 'Show social networks links from "General" settings tab', 'modesto' ),
		'type'         => 'switch',
		'left-choice'  => array(
			'value' => 'no',
			'label' => esc_html__( 'Hide', 'modesto' ),
		),
		'right-choice' => array(
			'value' => 'yes',
			'label' => esc_html__( 'Show', 'modesto' ),
		),
	),
	'email'         => array(
		'label' => esc_html__( 'Contact form email', 'modesto' ),
		'type'  => 'text',
		'desc'  => esc_html__( 'Email for contact form messages(if empty, admin email will be set)', 'modesto' ),
	),
	'locations' => array(
		'label' => esc_html__('Locations', 'modesto'),
		'popup-title' => esc_html__('Add/Edit Location', 'modesto'),
		'type' => 'addable-popup',
		'desc' => false,
		'template' => '{{  if (location.location !== "") {  print(location.location)} else { print("' . esc_html__('Note: Please set location', 'modesto') . '")} }}',
		'popup-options' => array(
			'location' => array(
				'type' => 'map',
				'label' =>esc_html__('Location','modesto'),
			),
			'title' => array(
				'type' => 'text',
				'label' => esc_html__('Location Title', 'modesto'),
				'desc' => esc_html__('Set location title', 'modesto'),
			),
			'description' => array(
				'type'  => 'textarea',
				'label' => esc_html__('Location Description', 'modesto'),
				'desc'  => esc_html__('Set location description', 'modesto')
			),
			'url' => array(
				'type'  => 'text',
				'label' => esc_html__('Location Url', 'modesto'),
				'desc'  => esc_html__('Set page url (Ex: http://example.com)', 'modesto'),
			),
			'thumb' => array(
				'label'       => esc_html__('Location Image', 'modesto'),
				'desc'        => esc_html__('Add location image', 'modesto'),
				'type'        => 'upload',
			)
		)
	),
	'map_zoom' => array(
	'type'       => 'slider',
	'value'      => 14,
	'properties' => array(
		'min'       => 1,
		'max'       => 21,
		'step'      => 1,
		'grid_snap' => true
	),
	'label'      => esc_html__( 'Map zoom', 'modesto' ),
),
);