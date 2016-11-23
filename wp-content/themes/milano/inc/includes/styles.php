<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
//custom styles
add_action( 'wp_enqueue_scripts', '_modesto_custom_font', 99 );

function _modesto_custom_font() {
	$custom_pair       = array();
	$custom_css        = '';

	if ( function_exists( 'fw_get_db_post_option' ) ) {
		$pair_number       = fw_get_db_post_option( get_the_ID(), 'font_pairs', '999' );
		$custom_font_pairs = fw_get_db_settings_option( 'font_pairs', null );

		if ( is_array( $custom_font_pairs ) && '999' !== $pair_number && is_singular() ) {
			$custom_pair = $custom_font_pairs[ $pair_number ];
		}

		if ( ! empty( $custom_pair ) ) {
			$font_1 = fw_akg( 'font_1/family', $custom_pair );
			$font_2 = fw_akg( 'font_2/family', $custom_pair );


			if ( ! empty( $font_1 ) ) {
				$custom_css .= 'body, .simple-article, .fonts-6 footer.type-2 .copyright, .fonts-6 .header-block{ font-family: ' . $font_1 . '}';
			}
			if ( ! empty( $font_2 ) ) {
				$custom_css .= 'h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6,
			.homepage-4-slider-navigation,
			.slider-click,
			.slider-click-label,
			nav,
			.header-block,
			.awards-slider .award-date,
			.sorting-menu.style-1, .sorting-menu.style-2,
			.footer-nav
			{font-family:' . $font_2 . '}';
			}
		}
		$bg_color = fw_get_db_post_option( get_the_ID(), 'bg-color', '' );
		$custom_css .= ( ! empty ( $bg_color ) ) ? 'body{background-color:' . esc_attr( $bg_color ) . '}' : '';

	}

	if ( function_exists('fw_ext_styling_get') ) {
		$quick_css = fw_ext_styling_get( 'quick_css', '' );

		if(isset($quick_css) && !empty($quick_css)){
			$custom_css .= ' '.$quick_css;
		}
	}


	wp_add_inline_style( 'modesto-theme-style', $custom_css );

}