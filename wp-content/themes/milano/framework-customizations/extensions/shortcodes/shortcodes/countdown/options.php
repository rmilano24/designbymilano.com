<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'item_style'       => array(
		'label' => esc_html__( 'Select style', 'modesto' ),
		'type'  => 'image-picker',
		'value' => 'style_1',
		'choices' => array(
			'style_1'  => get_template_directory_uri() . '/images/shortcode/countdown/style-1.png',
			'style_2' => get_template_directory_uri() . '/images/shortcode/countdown/style-2.png',
		),
	),
	'align' => array(
		'type'    => 'radio',
		'label'   => esc_html__( 'Horizontal align', 'modesto' ),
		'desc'    => esc_html__( 'The horizontal alignment of elements', 'modesto' ),
		'choices' => array(
			'alignleft'   => esc_html__( 'Left', 'modesto' ),
			'aligncenter' => esc_html__( 'Centered', 'modesto' ),
			'alignright'  => esc_html__( 'Right', 'modesto' ),
		),
		'inline'  => true,
	),
	'date' => array(
		'type'  => 'datetime-picker',
		'value' => '',
		'label' => esc_html__('Date', 'modesto'),
		'desc'  => esc_html__('End date', 'modesto'),
		'help'  => esc_html__( 'Click on field to choose date', 'modesto' ),
		'datetime-picker' => array(
			'format'        => 'Y/m/d H:i', // Format datetime.
			'maxDate'       => false,  // By default there is not maximum date , set a date in the datetime format.
			'minDate'       => false,  // By default minimum date will be current day, set a date in the datetime format.
			'timepicker'    => true,   // Show timepicker.
			'datepicker'    => true,   // Show datepicker.
			'defaultTime'   => '12:00' // If the input value is empty, timepicker will set time use defaultTime.
		),
	),
	fw()->theme->get_options( 'shortcode-styling' ),
	fw()->theme->get_options( 'shortcode-animations' ),
);