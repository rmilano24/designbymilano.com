<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main' => array(
		'title'   => false,
		'type'    => 'box',
		'context' => 'normal',
		'options' => array(
			fw()->theme->get_options( 'post-metabox' ),
		),
	),
);