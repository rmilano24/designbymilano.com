<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'type'        => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'selected' => array(
				'label'   => false,
				'desc'    => esc_html__( 'Type of background', 'modesto' ),
				'type'    => 'image-picker',
				'value'   => 'player',
				'choices' => array(
					'button' => get_template_directory_uri() . '/images/shortcode/media/video-button.png',
					'player' => get_template_directory_uri() . '/images/shortcode/media/video-player.png',
				),
			),
		),
		'choices' => array(
			'button' => array(
				'color' => array(
					'type'         => 'switch',
					'value'        => 'white',
					'label'        => esc_html__( 'Default font color schema', 'modesto' ),
					'left-choice'  => array(
						'value' => 'white',
						'label' => esc_html__( 'White', 'modesto' ),
					),
					'right-choice' => array(
						'value' => 'dark',
						'color' => '#000',
						'label' => esc_html__( 'Dark', 'modesto' ),
					),
				),
			)
		)
	),
	'placeholder' => array(
		'label' => esc_html__( 'Placeholder Image', 'modesto' ),
		'desc'  => esc_html__( 'Please select placeholder image', 'modesto' ),
		'type'  => 'upload',
	),
	'selected'    => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'source' => array(
				'label'        => esc_html__( 'Video Source', 'modesto' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'oembed',
					'label' => esc_html__( 'Youtube / Vimeo', 'modesto' ),
				),
				'left-choice'  => array(
					'value' => 'self',
					'label' => esc_html__( 'Self hosted', 'modesto' ),
				),
				'value'        => 'oembed',
			),
		),
		'choices' => array(
			'oembed' => array(
				'source' => array(
					'label' => esc_html__( 'Video Link', 'modesto' ),
					'desc'  => esc_html__( 'Insert Video URL to embed this video', 'modesto' ),
					'type'  => 'oembed',
				),
			),
			'self'   => array(
				'mp4'  => array(
					'type'  => 'text',
					'label' => esc_html__( 'Link to mp4 video', 'modesto' ),
					'desc'  => esc_html__( 'Source of uploaded video', 'modesto' ),
				),
				'webm' => array(
					'type'  => 'text',
					'label' => esc_html__( 'Link to webm video', 'modesto' ),
					'desc'  => esc_html__( 'Source of uploaded video', 'modesto' ),
				),
				'ogg'  => array(
					'type'  => 'text',
					'label' => esc_html__( 'Link to ogg video', 'modesto' ),
					'desc'  => esc_html__( 'Source of uploaded video', 'modesto' ),
				),
			),
		),
	),
	fw()->theme->get_options( 'shortcode-styling' ),
	fw()->theme->get_options( 'shortcode-animations' ),
);
