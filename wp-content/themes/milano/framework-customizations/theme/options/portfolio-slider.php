<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'page_options'  => array(
		'title'   => esc_html__( 'Page options', 'modesto' ),
		'type'    => 'tab',
		'options' => array(
			'folio_slider_style' => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'slider_style' => array(
						'label'   => esc_html__( 'Style of page slider', 'modesto' ),
						'type'    => 'image-picker',
						'value'   => 'creative1',
						'choices' => array(
							'creative1' => array(
								'label' => esc_html__( 'Creative', 'modesto' ),
								'small' => array(
									'height' => 100,
									'src'    => get_template_directory_uri() . '/images/admin/slider-thumb-12.jpg',
								),
								'large' => array(
									'height' => 300,
									'src'    => get_template_directory_uri() . '/images/admin/slider-tooltip-12.jpg',
								),
							),
							'creative2' => array(
								'label' => esc_html__( 'Creative', 'modesto' ),
								'small' => array(
									'height' => 100,
									'src'    => get_template_directory_uri() . '/images/admin/slider-thumb-13.jpg',
								),
								'large' => array(
									'height' => 300,
									'src'    => get_template_directory_uri() . '/images/admin/slider-tooltip-13.jpg',
								),
							),
							'portfolio'   => array(
								'label' => esc_html__( 'Portfolio Slider', 'modesto' ),
								'small' => array(
									'height' => 100,
									'src'    => get_template_directory_uri() . '/images/admin/slider-thumb-11.jpg',
								),
								'large' => array(
									'height' => 300,
									'src'    => get_template_directory_uri() . '/images/admin/slider-tooltip-11.jpg',
								),
							),
						),
						'desc'    => esc_html__( 'Select Style of full page slider', 'modesto' ),
					),
				),
				'choices'      => array(
					'creative1' => array(
						'button_label' => array(
							'type'  => 'text',
							'label' => esc_html__( 'Slide Button Text', 'modesto' ),
							'value' => esc_html__( 'View more', 'modesto' ),
							'desc'  => esc_html__( 'Text that will be shown on button', 'modesto' ),
						),
					),
					'creative2' => array(
						'button_label' => array(
							'type'  => 'text',
							'label' => esc_html__( 'Slide Button Text', 'modesto' ),
							'value' => esc_html__( 'View more', 'modesto' ),
							'desc'  => esc_html__( 'Text that will be shown on button', 'modesto' ),
						),
					),
					'portfolio' => array(
						'button_label' => array(
							'type'  => 'text',
							'label' => esc_html__( 'Slide Button Text', 'modesto' ),
							'value' => esc_html__( 'View more', 'modesto' ),
							'desc'  => esc_html__( 'Text that will be shown on button', 'modesto' ),
						),
					),
				),
				'show_borders' => false,
			),
		),
	),
	'slider_slides' => array(
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
						'help'        => esc_html__( 'Recommended image size:', 'modesto' ) . ' 1920px X 1000px',
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
					fw()->theme->get_options( 'portfolio-additional-options' ),
					'link'        => array(
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
					'color'       => array(
						'label' => esc_html__( 'Slide primary color', 'modesto' ),
						'desc'  => esc_html__( 'Will be modified slide content background color', 'modesto' ),
						'type'  => 'rgba-color-picker',
						'help'  => esc_html__( 'Click on field to choose color', 'modesto' ),
					),
				),
			),
		),
	),
);
