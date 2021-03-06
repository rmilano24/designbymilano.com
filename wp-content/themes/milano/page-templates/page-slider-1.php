<?php
/**
 * Template Name: Full Screen Slider.
 *
 * @package modesto
 */

get_header(); ?>

<?php
// Get slider options from page metabox.
$slider_style = ( function_exists( 'fw_get_db_post_option' ) ) ? fw_get_db_post_option( get_the_ID(), 'page_slider_style', array( 'slider_style' => 'white' ) ) : array( 'slider_style' => 'white' );
get_template_part( 'parts/sliders/page', $slider_style['slider_style'] . '-slider' );

