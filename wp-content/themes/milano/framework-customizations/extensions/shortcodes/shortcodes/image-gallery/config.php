<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Image gallery', 'modesto' ),
	'description' => esc_html__( 'Add a gallery of images', 'modesto' ),
	'tab'         => esc_html__( 'Content Elements', 'modesto' ),
	'icon'        => 'dashicons dashicons-format-gallery',
	'popup_size'  => 'medium',
);