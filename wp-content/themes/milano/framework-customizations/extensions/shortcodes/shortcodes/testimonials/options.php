<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'image'       => array(
		'label' => esc_html__( 'Photo of author', 'modesto' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'modesto' ),
		'type'  => 'upload'
	),
	'testimonial' => array(
		'label' => esc_html__( 'Testimonial', 'modesto' ),
		'desc'  => esc_html__( 'Text of testimonial', 'modesto' ),
		'type'  => 'textarea',
		'value' => ''
	),
	'author'      => array(
		'label' => esc_html__( 'Author/job', 'modesto' ),
		'desc'  => esc_html__( 'Testimonial author name and job position', 'modesto' ),
		'type'  => 'text',
		'value' => ''
	),
	fw()->theme->get_options( 'shortcode-styling' ),
	fw()->theme->get_options( 'shortcode-animations' ),
);