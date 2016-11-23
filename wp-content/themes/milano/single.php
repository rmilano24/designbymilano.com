<?php
/**
 * The Template for displaying all single posts
 */

$post_style      = 'classic';
$meta_style      = 'default';
$post_navigation = 'no';
$naigation_page  = 0;

if ( function_exists( 'fw_get_db_settings_option' ) ) {
	$post_style      = fw_get_db_settings_option( 'single-style', 'classic' );
	$meta_style      = fw_get_db_post_option( get_the_ID(), 'style', 'default' );
	$post_navigation = fw_get_db_settings_option( 'post-navigation/option', 'no' );
	$naigation_page  = fw_get_db_settings_option( 'post-navigation/yes/page_select/0' );
}

set_query_var( 'navigation_page', $naigation_page );
$post_style = ( 'default' !== $meta_style ) ? $meta_style : $post_style;

get_header();
if ( $post_style === 'header_bg' ) {
	modesto_top_header( 'light', 'white' );
} else {
	modesto_top_header();
}

get_template_part( 'single', $post_style );

if ( 'yes' === $post_navigation ) {
	get_template_part( 'parts/post', 'navigation' );
}

get_footer();
