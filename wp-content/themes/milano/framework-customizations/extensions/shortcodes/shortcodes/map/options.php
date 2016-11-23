<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$map_shortcode = fw_ext('shortcodes')->get_shortcode('map');
$all_styles    = _modesto_google_map_custom_styles();
$style_options = array();
foreach ($all_styles as $key => $value){
	$style_options[ $key ] = $value[0];
}
$options = array(
	'data_provider' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'picker' => array(
			'population_method' => array(
				'label'   => esc_html__('Population Method', 'modesto'),
				'desc'    => esc_html__( 'Select map population method (Ex: events, custom)', 'modesto' ),
				'type'    => 'select',
				'choices' => $map_shortcode->_get_picker_dropdown_choices(),
			)
		),
		'choices' => $map_shortcode->_get_picker_choices(),
		'show_borders' => false,
	),
	'map_style' => array(
		'type'  => 'select',
		'label' => 'Select map style',
		'desc'  => '',
		'choices' => $style_options
	),
	'map_type'          => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Map Type', 'modesto' ),
		'desc'    => esc_html__( 'Select map type', 'modesto' ),
		'choices' => array(
			'roadmap'   => esc_html__( 'Roadmap', 'modesto' ),
			'terrain'   => esc_html__( 'Terrain', 'modesto' ),
			'satellite' => esc_html__( 'Satellite', 'modesto' ),
			'hybrid'    => esc_html__( 'Hybrid', 'modesto' )
		)
	),
	'map_height'        => array(
		'label' => esc_html__( 'Map Height', 'modesto' ),
		'desc'  => esc_html__( 'Set map height (Ex: 300)', 'modesto' ),
		'type'  => 'text',
		'value' => '300',
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
	'disable_scrolling' => array(
		'type'         => 'switch',
		'value'        => false,
		'label'        => esc_html__( 'Disable zoom on scroll', 'modesto' ),
		'desc'         => esc_html__( 'Prevent the map from zooming when scrolling until clicking on the map', 'modesto' ),
		'left-choice'  => array(
			'value' => false,
			'label' => esc_html__( 'Yes', 'modesto' ),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__( 'No', 'modesto' ),
		),
	),
	'custom_marker' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'value' => array(
			'custom_marker_enable' => 'no',
		),
		'picker'       => array(
			'custom_marker_enable' => array(
				'label'        => esc_html__( 'Custom map marker', 'modesto' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'no',
					'label' => esc_html__( 'No', 'modesto' )
				),
				'left-choice'  => array(
					'value' => 'yes',
					'label' => esc_html__( 'Yes', 'modesto' )
				),
				'desc'         => esc_html__( 'Replace default map marker with custom image', 'modesto' ),
			)
		),
		'choices'      => array(
			'yes'    => array(
				'thumb' => array(
					'label' => esc_html__( 'Marker Image', 'modesto' ),
					'desc'  => esc_html__( 'Add marker image', 'modesto' ),
					'type'  => 'upload',
				)
			),
			'no' => array(),
		),
		'show_borders' => true,
	),
	'api_key'        => array(
		'label' => esc_html__( 'Set your API KEY for google maps service', 'modesto' ),
		'desc' => '<a href="https://developers.google.com/maps/documentation/javascript/get-api-key">' . esc_html__( 'Instruction to create API key', 'modesto' ) . '</a>',
		'type'  => 'text',
		'value' => '',
	),
	fw()->theme->get_options( 'shortcode-styling' ),
);