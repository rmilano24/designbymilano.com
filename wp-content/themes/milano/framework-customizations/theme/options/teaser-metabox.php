<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
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
	'bg_image'    => array(
		'type'        => 'upload',
		'label'       => esc_html__( 'Background image', 'modesto' ),
		'desc'        => esc_html__( 'Background image for page', 'modesto' ),
		'images_only' => true,
	),
	'description' => array(
		'label' => esc_html__( 'Page description', 'modesto' ),
		'type'  => 'textarea',
		'desc'  => esc_html__( 'Description text to display under the title', 'modesto' ),
	),
);