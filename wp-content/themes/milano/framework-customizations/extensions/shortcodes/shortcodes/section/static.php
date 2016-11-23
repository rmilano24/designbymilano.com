<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

wp_enqueue_script( 'modesto-frontend-helpers',
	get_template_directory_uri() . '/js/jquery.frontend.helpers.min.js',
	array( 'jquery' ),
	'1.1.3',
	true
);
