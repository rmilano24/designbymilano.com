<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'animation' => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Animation', 'modesto' ),
		'desc'    => esc_html__( 'Select animation for module', 'modesto' ),
		'choices' => array(
			''                => 'None',
			'fade-up'         => 'Fade Up',
			'fade-down'       => 'Fade Down',
			'fade-right'      => 'Fade Right',
			'fade-left'       => 'Fade left',
			'fade-up-right'   => 'Fade up right',
			'fade-up-left'    => 'Fade up left',
			'fade-down-right' => 'Fade down right',
			'fade-down-left'  => 'Fade down left',
			'flip-left'       => 'Flip left',
			'flip-right'      => 'Flip right',
			'flip-up'         => 'Flip up',
			'flip-down'       => 'Flip down',
			'zoom-in'         => 'Zoom in',
			'zoom-in-up'      => 'Zoom in up',
			'zoom-in-down'    => 'Zoom in down',
			'zoom-in-left'    => 'Zoom in left',
			'zoom-in-right'   => 'Zoom in right',
			'zoom-out'        => 'Zoom out',
			'zoom-out-up'     => 'Zoom out up',
			'zoom-out-down'   => 'Zoom out down',
			'zoom-out-left'   => 'Zoom out left',
			'zoom-out-right'  => 'Zoom out right',
		),
	)

);