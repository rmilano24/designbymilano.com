<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'page_options' => array(
		'title'   => esc_html__( 'Page options', 'modesto' ),
		'type'    => 'tab',
		'options' => array(
			'page_slider_style' => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'slider_style' => array(
						'label'   => esc_html__( 'Style of page slider', 'modesto' ),
						'type'    => 'image-picker',
						'value'   => 'white',
						'choices' => array(
							'white'  => array(
								'label' => esc_html__( 'White', 'modesto' ),
								'small' => array(
									'height' => 100,
									'src'    => get_template_directory_uri() . '/images/admin/slider-thumb-1.jpg',
								),
								'large' => array(
									'height' => 300,
									'src'    => get_template_directory_uri() . '/images/admin/slider-tooltip-1.jpg',
								),
							),
							'dark' => array(
								'label' => esc_html__( 'Dark', 'modesto' ),
								'small' => array(
									'height' => 100,
									'src'    => get_template_directory_uri() . '/images/admin/slider-thumb-2.jpg',
								),
								'large' => array(
									'height' => 300,
									'src'    => get_template_directory_uri() . '/images/admin/slider-tooltip-2.jpg',
								),
							),
							'square'       => array(
								'label' => esc_html__( 'Square', 'modesto' ),
								'small' => array(
									'height' => 100,
									'src'    => get_template_directory_uri() . '/images/admin/slider-thumb-3.jpg',
								),
								'large' => array(
									'height' => 300,
									'src'    => get_template_directory_uri() . '/images/admin/slider-tooltip-3.jpg',
								),
							),
							'vertical'     => array(
								'label' => esc_html__( 'Vertical', 'modesto' ),
								'small' => array(
									'height' => 100,
									'src'    => get_template_directory_uri() . '/images/admin/slider-thumb-4.jpg',
								),
								'large' => array(
									'height' => 300,
									'src'    => get_template_directory_uri() . '/images/admin/slider-tooltip-4.jpg',
								),
							),
							'vertical2'    => array(
								'label' => esc_html__( 'Vertical', 'modesto' ),
								'small' => array(
									'height' => 100,
									'src'    => get_template_directory_uri() . '/images/admin/slider-thumb-4-1.jpg',
								),
								'large' => array(
									'height' => 300,
									'src'    => get_template_directory_uri() . '/images/admin/slider-tooltip-4-1.jpg',
								),
							),
							'column'       => array(
								'label' => esc_html__( 'Columns', 'modesto' ),
								'small' => array(
									'height' => 100,
									'src'    => get_template_directory_uri() . '/images/admin/slider-thumb-5.jpg',
								),
								'large' => array(
									'height' => 300,
									'src'    => get_template_directory_uri() . '/images/admin/slider-tooltip-5.jpg',
								),
							),
							'column4'      => array(
								'label' => esc_html__( 'Columns', 'modesto' ),
								'small' => array(
									'height' => 100,
									'src'    => get_template_directory_uri() . '/images/admin/slider-thumb-8.jpg',
								),
								'large' => array(
									'height' => 300,
									'src'    => get_template_directory_uri() . '/images/admin/slider-tooltip-8.jpg',
								),
							),
							'border'       => array(
								'label' => esc_html__( 'Bordered', 'modesto' ),
								'small' => array(
									'height' => 100,
									'src'    => get_template_directory_uri() . '/images/admin/slider-thumb-6.jpg',
								),
								'large' => array(
									'height' => 300,
									'src'    => get_template_directory_uri() . '/images/admin/slider-tooltip-6.jpg',
								),
							),
							'parallax'     => array(
								'label' => esc_html__( 'Parallax', 'modesto' ),
								'small' => array(
									'height' => 100,
									'src'    => get_template_directory_uri() . '/images/admin/slider-thumb-7.jpg',
								),
								'large' => array(
									'height' => 300,
									'src'    => get_template_directory_uri() . '/images/admin/slider-tooltip-7.jpg',
								),
							),
							'4items_slide' => array(
								'label' => esc_html__( 'Four items on page', 'modesto' ),
								'small' => array(
									'height' => 100,
									'src'    => get_template_directory_uri() . '/images/admin/slider-thumb-9.jpg',
								),
								'large' => array(
									'height' => 300,
									'src'    => get_template_directory_uri() . '/images/admin/slider-tooltip-9.jpg',
								),
							),
							'4items_full'  => array(
								'label' => esc_html__( 'Four items on page', 'modesto' ),
								'small' => array(
									'height' => 100,
									'src'    => get_template_directory_uri() . '/images/admin/slider-thumb-10.jpg',
								),
								'large' => array(
									'height' => 300,
									'src'    => get_template_directory_uri() . '/images/admin/slider-tooltip-10.jpg',
								),
							),

						),
						'desc'    => esc_html__( 'Select Style of full page slider', 'modesto' ),
					),
				),
				'choices'      => array(
					'white'     => array(
						'button_link'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Bottom Button link:', 'modesto' ),
							'value' => 'http://',
							'desc'  => esc_html__( 'Insert link to page / portfolio item / external website', 'modesto' ),
						),
						'button_label'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Bottom Button Text', 'modesto' ),
							'value' => esc_html__( 'VIEW ALL PROJECTS', 'modesto' ),
							'desc'  => esc_html__( 'Text that will be shown on button', 'modesto' ),
						),
						'page_slider_options' => array(
							'type'         => 'multi-picker',
							'label'        => false,
							'desc'         => false,
							'picker'       => array(
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
							),
							'choices'      => array(
								'on'  => array(
									'autoplay' => array(
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
								),
								'off' => array(),
							),
							'show_borders' => false,
						),
					),
					'dark'      => array(),
					'square'    => array(
						'effect' => array(
							'type'    => 'select',
							'value'   => 'effect-1',
							'label'   => esc_html__( 'Effect', 'modesto' ),
							'desc'    => esc_html__( 'Choose effect on change slides.', 'modesto' ),
							'choices' => array(
								'effect-1' => esc_html__( 'Classic', 'modesto' ),
								'effect-2' => esc_html__( 'Lateral', 'modesto' ),
								'effect-3' => esc_html__( 'Fall', 'modesto' ),
							),
						),
						'button_label'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Slide Button Text', 'modesto' ),
							'value' => esc_html__( 'View more', 'modesto' ),
							'desc'  => esc_html__( 'Text that will be shown on button', 'modesto' ),
						),
						'autoplay' => array(
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
					),
					'vertical'  => array(
						'button_label'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Slide Button Text', 'modesto' ),
							'value' => esc_html__( 'View more', 'modesto' ),
							'desc'  => esc_html__( 'Text that will be shown on button', 'modesto' ),
						),
					),
					'vertical2' => array(
						'button_label' => array(
							'type'  => 'text',
							'label' => esc_html__( 'Slide Button Text', 'modesto' ),
							'value' => esc_html__( 'View more', 'modesto' ),
							'desc'  => esc_html__( 'Text that will be shown on button', 'modesto' ),
						),
					),
					'column'    => array(
						'button_label'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Slide Button Text', 'modesto' ),
							'value' => esc_html__( 'View more', 'modesto' ),
							'desc'  => esc_html__( 'Text that will be shown on button', 'modesto' ),
						),
						'page_slider_options' => array(
							'type'         => 'multi-picker',
							'label'        => false,
							'desc'         => false,
							'picker'       => array(
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
							),
							'choices'      => array(
								'on'  => array(
									'autoplay' => array(
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
								),
								'off' => array(),
							),
							'show_borders' => false,
						),
					),
					'column4'   => array(
						'button_label'        => array(
							'type'  => 'text',
							'label' => esc_html__( 'Slide Button Text', 'modesto' ),
							'value' => esc_html__( 'View more', 'modesto' ),
							'desc'  => esc_html__( 'Text that will be shown on button', 'modesto' ),
						),
						'number'              => array(
							'type'       => 'slider',
							'value'      => 4,
							'properties' => array(
								'min'       => 1,
								'max'       => 4,
								'step'      => 1,
								'grid_snap' => true
							),
							'label'      => esc_html__( 'Number of images', 'modesto' ),
							'desc'       => esc_html__( 'Select number of images that will be displayed on screen', 'modesto' ),
						),
						'page_slider_options' => array(
							'type'         => 'multi-picker',
							'label'        => false,
							'desc'         => false,
							'picker'       => array(
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
							),
							'choices'      => array(
								'on'  => array(
									'autoplay' => array(
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
								),
								'off' => array(),
							),
							'show_borders' => false,
						),
					),
					'border'    => array(
						'button_label'        => array(
							'type'  => 'text',
							'label' => esc_html__( 'Slide Button Text', 'modesto' ),
							'value' => esc_html__( 'View more', 'modesto' ),
							'desc'  => esc_html__( 'Text that will be shown on button', 'modesto' ),
						),
						'page_slider_options' => array(
							'type'         => 'multi-picker',
							'label'        => false,
							'desc'         => false,
							'picker'       => array(
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
							),
							'choices'      => array(
								'on'  => array(
									'autoplay' => array(
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
								),
								'off' => array(),
							),
							'show_borders' => false,
						),
					),
					'parallax'  => array(
						'button_label'        => array(
							'type'  => 'text',
							'label' => esc_html__( 'Slide Button Text', 'modesto' ),
							'value' => esc_html__( 'View more', 'modesto' ),
							'desc'  => esc_html__( 'Text that will be shown on button', 'modesto' ),
						),
						'page_slider_options' => array(
							'type'         => 'multi-picker',
							'label'        => false,
							'desc'         => false,
							'picker'       => array(
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
							),
							'choices'      => array(
								'on'  => array(
									'autoplay' => array(
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
								),
								'off' => array(),
							),
							'show_borders' => false,
						),
					),
				),
				'show_borders' => false,
			),
		),
	),
	'slider_slides'  => array(
		'title'   => esc_html__( 'Manage slides', 'modesto' ),
		'type'    => 'tab',
		'options' => array(
			'page_slider_media' => array(
				'label'           => false,
				'type'            => 'addable-popup',
				'popup-title'     => esc_html__( 'Add media slide', 'modesto' ),
				'add-button-text' => esc_html__( 'Add media slide', 'modesto' ),
				'template'        => '{{- title }}',
				'desc'            => esc_html__( 'Add image / video slides to this slider', 'modesto' ),
				'popup-options'   => array(
					'image'       => array(
						'type'        => 'upload',
						'label'       => esc_html__( 'Image', 'modesto' ),
						'desc'        => esc_html__( 'Slide image', 'modesto' ),
						'images_only' => true,
					),
					'title'       => array(
						'label' => esc_html__( 'Title', 'modesto' ),
						'type'  => 'text',
						'desc'  => esc_html__( 'Title text that will displayed on this slide', 'modesto' ),
					),
					'description' => array(
						'label' => esc_html__( 'Description', 'modesto' ),
						'type'  => 'textarea',
						'desc'  => esc_html__( 'Subtitle text that will displayed on this slide', 'modesto' ),
					),
					'link'       => array(
						'label' => esc_html__( 'Link', 'modesto' ),
						'type'  => 'text',
						'value' => 'http://',
						'desc'  => esc_html__( 'Insert link to page / portfolio item / external website', 'modesto' ),
					),
					'tags'        => array(
						'label' => esc_html__( 'Slide tags', 'modesto' ),
						'type'  => 'text',
						'desc'  => esc_html__( 'Additional slide short description. Usually used for display slide tags / parameters', 'modesto' ),
					),
					'logo_image' => array(
						'label'       => esc_html__( 'Project logo', 'modesto' ),
						'desc'        => esc_html__( 'Will be available only on square (3-rd) Slider', 'modesto' ),
						'type'        => 'upload',
						'images_only' => true,
					),
				),
			),
		),
	),
);
