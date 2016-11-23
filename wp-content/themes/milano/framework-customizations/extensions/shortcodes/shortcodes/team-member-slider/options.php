<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'item_style'      => array(
		'label'   => esc_html__( 'Select style of items', 'modesto' ),
		'type'    => 'image-picker',
		'value'   => 'style_1',
		'choices' => array(
			'style_1'  => array(
				'small' => array(
					'width' => 100,
					'src'   => get_template_directory_uri() . '/images/shortcode/team/style-1-thumb.png',
				),
				'large' => array(
					'src'   => get_template_directory_uri() . '/images/shortcode/team/style-1-full.png',
				),
			),
			'style_2' => array(
				'small' => array(
					'width' => 100,
					'src'   => get_template_directory_uri() . '/images/shortcode/team/style-2-thumb.png',
				),
				'large' => array(
					'src'   => get_template_directory_uri() . '/images/shortcode/team/style-2-full.png',
				),
			)
		),
	),
	'slider_infinity' => array(
		'label'        => esc_html__( 'Infinite loop', 'modesto' ),
		'type'         => 'switch',
		'right-choice' => array(
			'value' => 'on',
			'label' => esc_html__( 'On', 'modesto' ),
		),
		'left-choice'  => array(
			'value' => 'off',
			'label' => esc_html__( 'Off', 'modesto' ),
		),
		'value'        => 'off',
		'desc'         => esc_html__( 'Enable loop slides without end', 'modesto' ),
	),
	'slides_per_page' => array(
		'type'       => 'slider',
		'value'      => 1,
		'properties' => array(
			'min'       => 1,
			'max'       => 10,
			'step'      => 1,
			'grid_snap' => true
		),
		'label'      => esc_html__( 'Slides per page', 'modesto' ),
	),
	'autoplay'        => array(
		'type'       => 'slider',
		'value'      => 0,
		'properties' => array(
			'min'       => 0,
			'max'       => 20,
			'step'      => 1,
			'grid_snap' => true
		),
		'label'      => esc_html__( 'Auto Scroll delay', 'modesto' ),
		'desc'       => esc_html__( 'Time between change slides in seconds', 'modesto' ),
		'help'       => esc_html__( 'If you will set "0" autopay will be disabled', 'modesto' ),
	),
	'slides'          => array(
		'label'         => esc_html__( 'Slides', 'modesto' ),
		'type'          => 'addable-popup',
		'desc'          => esc_html__( 'Slider items', 'modesto' ),
		'popup-options' => array(
			'image'        => array(
				'label' => esc_html__( 'Team Member Image', 'modesto' ),
				'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'modesto' ),
				'type'  => 'upload'
			),
			'name'         => array(
				'label' => esc_html__( 'Team Member Name', 'modesto' ),
				'desc'  => esc_html__( 'Name of the person', 'modesto' ),
				'type'  => 'text',
				'value' => ''
			),
			'job'          => array(
				'label' => esc_html__( 'Team Member Job Title', 'modesto' ),
				'desc'  => esc_html__( 'Job title of the person.', 'modesto' ),
				'type'  => 'text',
				'value' => ''
			),
			'soc-networks' => array(
				'label'         => esc_html__( 'Social networks', 'modesto' ),
				'type'          => 'addable-popup',
				'template'      => '{{- link }}',
				'desc'          => esc_html__( 'Links for your social networks profiles', 'modesto' ),
				'popup-options' => array(
					'link' => array(
						'label' => esc_html__( 'Link', 'modesto' ),
						'type'  => 'text',
						'value' => 'http://',
						'desc'  => esc_html__( 'Type link for icon', 'modesto' ),
					),
					'icon' => array(
						'label' => esc_html__( 'Icon', 'modesto' ),
						'type'  => 'icon',
						'value' => 'fa fa-facebook',
						'desc'  => esc_html__( 'Select icon do display', 'modesto' ),
					),
				),
			),
		),
	),
	fw()->theme->get_options( 'shortcode-styling' ),
);