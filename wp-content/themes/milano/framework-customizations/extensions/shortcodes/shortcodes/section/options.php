<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'container-width' => array(
		'type'    => 'radio',
		'value'   => 'container',
		'label'   => esc_html__( 'Content Width', 'modesto' ),
		'desc'    => esc_html__( 'Width of element content container', 'modesto' ),
		'choices' => array(
			'container'            => esc_html__( 'Default', 'modesto' ),
			'wide-container'       => esc_html__( 'Large', 'modesto' ),
			'wide-container-fluid' => esc_html__( 'Full width', 'modesto' ),
		),
		'inline'  => true,
	),
	'is_fullheight'   => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'full-container' => array(
				'label'        => esc_html__( 'Full Height', 'modesto' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__( 'Enable', 'modesto' ),
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__( 'Disable', 'modesto' ),
				),
				'value'        => 'no',
			),
		),
		'choices' => array(
			'yes' => array(
				'is_v_centered' => array(
					'label' => esc_html__( 'Center Vertical', 'modesto' ),
					'type'  => 'switch',
				),
				'bottom'        => array(
					'type'    => 'multi-picker',
					'label'   => false,
					'desc'    => false,
					'picker'  => array(
						'full-container' => array(
							'label'   => esc_html__( 'Bottom Content', 'modesto' ),
							'desc'    => esc_html__( 'Display in a bottom of section', 'modesto' ),
							'type'    => 'select',
							'choices' => array(
								''       => esc_html__( '---', 'modesto' ),
								'button' => esc_html__( 'Scroll Arrow', 'modesto' ),
								'text'   => esc_html__( 'Text', 'modesto' ),
								'share'  => esc_html__( 'Share Buttons', 'modesto' ),
								'social' => esc_html__( 'Social Buttons', 'modesto' ),
							),
						),
					),
					'choices' => array(
						'text' => array(
							'bottom_text' => array(
								'type'  => 'textarea',
								'label' => esc_html__( 'Text', 'modesto' ),
							),
						),
					),
				),
				'border'           => array(
					'type'         => 'switch',
					'label'        => esc_html__( 'White border around section content', 'modesto' ),
				),
			),
		),
	),
	'color'           => array(
		'type'         => 'switch',
		'value'        => 'dark',
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
	'text_align'      => array(
		'type'    => 'radio',
		'label'   => esc_html__( 'Horizontal align', 'modesto' ),
		'desc'    => esc_html__( 'The horizontal alignment of elements', 'modesto' ),
		'choices' => array(
			'text-left'   => esc_html__( 'Left', 'modesto' ),
			'text-center' => esc_html__( 'Centered', 'modesto' ),
			'text-right'  => esc_html__( 'Right', 'modesto' ),
		),
		'inline'  => true,
	),
	'bg_options' => array(
		'type'          => 'popup',
		'label'         => esc_html__( 'Background options', 'modesto' ),
		'desc'          => esc_html__( 'Edit section background options', 'modesto' ),
		'popup-title'   => esc_html__( 'Background options', 'modesto' ),
		'button'        => esc_html__( 'Edit Background', 'modesto' ),
		'size'          => 'medium', // small, medium, large
		'popup-options' => array(
			'variant' => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'selected' => array(
						'label'   => false,
						'desc'    => esc_html__( 'Type of background', 'modesto' ),
						'type'    => 'image-picker',
						'value'   => 'image_bg',
						'choices' => array(
							'image_bg' => get_template_directory_uri() . '/images/shortcode/section/image_bg.png',
							'video_bg' => get_template_directory_uri() . '/images/shortcode/section/video_bg.png',
						),
					),
				),
				'choices'      => array(
					'image_bg' => array(
						'background_color' => array(
							'label' => esc_html__( 'Background Color', 'modesto' ),
							'desc'  => esc_html__( 'Please select the background color', 'modesto' ),
							'type'  => 'color-picker',
						),
						'background_image' => array(
							'label' => esc_html__( 'Background Image', 'modesto' ),
							'desc'  => esc_html__( 'Please select the background image', 'modesto' ),
							'type'  => 'upload',
						),
						'overlay_color'    => array(
							'label' => esc_html__( 'Overlay Color', 'modesto' ),
							'desc'  => esc_html__( 'Please select color of overlay', 'modesto' ),
							'type'  => 'rgba-color-picker',
							'value' => ''
						),

						'bg_effect'  => array(
							'type'    => 'radio',
							'label'   => esc_html__( 'Image Effect', 'modesto' ),
							'desc'    => esc_html__( 'Select effect for background image', 'modesto' ),
							'choices' => array(
								''      => esc_html__( 'None', 'modesto' ),
								'tilt'  => esc_html__( 'Tilt Effect', 'modesto' ),
								'fixed' => esc_html__( 'Fixed Image', 'modesto' ),
							),
							'inline'  => true,
						),
						'image_size' => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Background Size', 'modesto' ),
							'choices' => array(
								''        => esc_html__( 'Default', 'modesto' ),
								'cover'   => esc_html__( 'Cover', 'modesto' ),
								'contain' => esc_html__( 'Contain', 'modesto' ),
							),
						),
					),
					'video_bg' => array(
						'placeholder'   => array(
							'label' => esc_html__( 'Placeholder Image', 'modesto' ),
							'desc'  => esc_html__( 'Please select placeholder image', 'modesto' ),
							'type'  => 'upload',
						),
						'overlay_color' => array(
							'label' => esc_html__( 'Overlay Color', 'modesto' ),
							'desc'  => esc_html__( 'Please select color of overlay', 'modesto' ),
							'type'  => 'rgba-color-picker',
							'value' => ''
						),
						'selected'      => array(
							'type'    => 'multi-picker',
							'label'   => false,
							'desc'    => false,
							'picker'  => array(
								'source' => array(
									'label'        => esc_html__( 'Video Source', 'modesto' ),
									'type'         => 'switch',
									'right-choice' => array(
										'value' => 'oembed',
										'label' => esc_html__( 'Youtube', 'modesto' ),
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

					),
				),
				'show_borders' => true,
			),
		),
	),
	fw()->theme->get_options( 'shortcode-styling' ),
);