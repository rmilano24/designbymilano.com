<?php
/**
 * Include static files: javascript and css
 *
 * @package modesto.
 */

if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }


if ( is_admin() ) {
	return;
}

/**
 * Enqueue scripts and styles for the front end.
 */

// Add font, used in the main stylesheet.
wp_enqueue_style(
	'modesto-main-font',
	modesto_font_url(),
	array(),
	'1.0'
);

// Add bootstrap cores styles.
wp_enqueue_style(
	'bootstrap',
	get_template_directory_uri() . '/css/bootstrap.min.css',
	array(),
	'3.3.4'
);

// Load our main stylesheet.
wp_enqueue_style(
	'modesto-theme-style',
	get_template_directory_uri() . '/style.css',
	array( 'bootstrap' ),
	'1.0'
);

wp_enqueue_style(
	'modesto-bootstrap-extend',
	get_template_directory_uri() . '/css/bootstrap.extension.css',
	array( 'bootstrap' ),
	'1'
);
// Font Awesome stylesheet.
wp_enqueue_style(
	'font-awesome',
	get_template_directory_uri() . '/css/font-awesome/css/font-awesome.min.css',
	array(),
	'4.5.0'
);

if ( is_page_template( 'page-templates/page-slider-1.php' ) ) {
	wp_enqueue_style(
		'modesto-boxes-slider',
		get_template_directory_uri() . '/css/boxesFx.css',
		array(),
		'1.0'
	);
}

/*Shortcode animations*/
wp_enqueue_style( 'modesto-plugins-css',
	get_template_directory_uri() . '/css/plugins.min.css',
	array(),
	'1.6.16'
);


/*map*/
$language = substr( get_locale(), 0, 2 );
$api_key  = function_exists( 'fw_get_db_settings_option' ) ? fw_get_db_settings_option( 'map_key' ) : '';

wp_register_script(
	'google-maps-api-v3',
	'https://maps.googleapis.com/maps/api/js?key='.$api_key.'&libraries=places&language=' . $language,
	array(),
	'3.15',
	true
);
wp_register_script(
	'modesto-shortcode-map-script',
	get_template_directory_uri() . '/framework-customizations/extensions/shortcodes/shortcodes/map/static/js/map-shortcode.js',
	array('jquery', 'underscore', 'google-maps-api-v3'),
	'1',
	true
);

// Register scripts for use inside page templates and theme modules.
wp_register_script(
	'modesto-modernizr-custom',
	get_template_directory_uri() . '/js/modernizr.custom.js',
	array(),
	'2.8.2',
	true
);
wp_register_script(
	'modesto-boxes-slider',
	get_template_directory_uri() . '/js/boxesFx.js',
	array( 'modesto-modernizr-custom' ),
	'1.0',
	true
);
wp_register_script(
	'modesto-tilt-effect',
	get_template_directory_uri() . '/js/tiltfx.js',
	array( 'jquery' ),
	'1.0',
	true
);

wp_enqueue_script(
	'isotope-js',
	get_template_directory_uri() . '/js/isotope.pkgd.min.js',
	array(),
	'3.0.0',
	true
);

wp_register_script(
	'modesto-parallax-js',
	get_template_directory_uri() . '/js/parallax.jquery.js',
	array(),
	'3.0.0',
	true
);
wp_enqueue_script(
	'modesto-match-height-js',
	get_template_directory_uri() . '/js/jquery.matchHeight-min.js',
	array(),
	'0.7.0',
	true
);
wp_register_script(
	'modesto-niceslider',
	get_template_directory_uri() . '/js/niceslider.jquery.js',
	array(),
	'1.0',
	true
);
wp_register_script(
	'modesto-sliceslider',
	get_template_directory_uri() . '/js/sliceslider.jquery.js',
	array(),
	'1.0',
	true
);

wp_register_script(
	'modesto-aos-animation',
	get_template_directory_uri() . '/js/aos.js',
	array(),
	'1.0',
	true
);

if ( is_singular() ) {
	wp_enqueue_script(
		'modesto-social-sharer',
		get_template_directory_uri() . '/js/sharer.min.js',
		array(),
		'1.0',
		true
	);
	wp_enqueue_script(
		'modesto-likes-public-js',
		get_template_directory_uri() . '/js/simple-likes-public.js',
		array( 'jquery' ),
		'0.5',
		true
	);
	wp_localize_script( 'modesto-likes-public-js', 'simpleLikes', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'like'    => __( 'Like', 'modesto' ),
		'unlike'  => __( 'Unlike', 'modesto' )
	) );
}
if ( is_page_template( 'page-templates/portfolio-blog.php' ) ) {
	wp_enqueue_script( 'modesto-parallax-js' );
}

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

if ( is_singular() && wp_attachment_is_image() ) {
	wp_enqueue_script(
		'modesto-keyboard-image-navigation',
		get_template_directory_uri() . '/js/keyboard-image-navigation.js',
		array( 'jquery' ),
		'1.0'
	);
}


wp_enqueue_script(
	'mousewheel-js',
	get_template_directory_uri() . '/js/jquery.mousewheel.min.js',
	array( 'jquery' ),
	'3.1.13',
	true
);

wp_enqueue_script(
	'modesto-swiper-slider',
	get_template_directory_uri() . '/js/swiper.jquery.min.js',
	array( 'jquery' ),
	'3.2.7',
	true
);
wp_enqueue_script( 'plyr-player-js',
	get_template_directory_uri() . '/js/plyr.js',
	array(),
	'1.6.16',
	true
);
wp_enqueue_script(
	'modesto-equal-height',
	get_template_directory_uri() . '/js/jquery.matchHeight-min.js',
	array( 'jquery' ),
	'1.0',
	true
);

wp_enqueue_script(
	'maginific-popup-js',
	get_template_directory_uri() . '/js/jquery.magnific-popup.min.js',
	array(),
	'1.1.0',
	true
);

wp_enqueue_script(
	'modesto-theme-script',
	get_template_directory_uri() . '/js/global.js',
	array( 'jquery' ),
	'1.0',
	true
);

if ( function_exists( 'fw_ext_styling_get' ) ) {
	$quick_js = fw_ext_styling_get( 'quick_js', '' );
	wp_add_inline_script( 'modesto-theme-script', $quick_js );

}


