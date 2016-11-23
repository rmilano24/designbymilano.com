<?php
/**
 * Replace default walker.
 *
 * @package modesto
 **/

remove_filter( 'wp_nav_menu_args', '_filter_fw_ext_mega_menu_wp_nav_menu_args' );

/** @internal */
function _filter_modesto_ext_mega_menu_wp_nav_menu_args( $args ) {
	$args['fallback_cb'] = 'modesto_menu_fallback';
	$args['walker']      = new FW_Ext_Mega_Menu_Custom_Walker();
	return $args;
}

add_filter( 'wp_nav_menu_args', '_filter_modesto_ext_mega_menu_wp_nav_menu_args' );

function _filter_modesto_ext_mega_menu_walker_nav_menu_start_el( $item_output, $item, $depth, $args ) {
	if (!fw_ext_mega_menu_is_mm_item($item)) {
		return $item_output;
	}

	// <li>
	//     {{ item_output }}
	//     <div>{{ item.description }}</div>
	//     <div class="mega-menu">
	//         <ul class="sub-menu"></ul>
	//     </div>
	// </li>

	if ($depth > 0 && fw_ext_mega_menu_get_meta($item, 'title-off')) {
		$item_output = '<a class="hidden-title">&nbsp;</a>';
	}

	// Note that raw description is stored in post_content field.
	if ($depth > 0 && trim($item->post_content)) {
		$item_output .= '<div>' . do_shortcode($item->post_content) . '</div>';
	}

	return $item_output;
}

add_filter( 'walker_nav_menu_start_el', '_filter_modesto_ext_mega_menu_walker_nav_menu_start_el', 10, 4 );