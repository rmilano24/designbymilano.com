<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Taxonomy Sub Nav
 * list taxonomy terms as a submenu
 *
 * @package modesto
 * @author  Anthony Wilhelm (@awshout / anthonywilhelm.com)
 * @since   1.0.0
 * @link    http://wp.tutsplus.com/tutorials/creating-a-filterable-portfolio-with-wordpress-and-jquery/
 * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 */

if ( ! function_exists( 'modesto_category_submenu' ) ) {
	function modesto_category_submenu( $args = '' ) {

		$defaults = array(
			'taxonomy'   => 'category',
			'all_link'   => esc_html__( 'All', 'modesto' ),
			'quicksand'  => false,
			'terms_args' => array( 'parent' => 0 ),
			'item_class' => 'mouseover-simple',
		);
		$args     = wp_parse_args( $args, $defaults );

		$terms = get_terms( $args['taxonomy'], $args['terms_args'] ) ? get_terms( $args['taxonomy'], $args['terms_args'] ) : '';
		$count = count( $terms );

		if ( $count > 1 ) {

			$output     = '';
			$module_css = array();
			if ( $args['quicksand'] ) {
				$output .= '<li class="always-visible"><a data-filter="*" class="active ' . $args['item_class'] . ' ">' . $args['all_link'] . '</a></li>';
			}

			$current_category = single_cat_title( '', false );
			$i                = 2;
			foreach ( $terms as $term ) {
				$active                    = ( $term->name == $current_category ) ? 'active' : '';
				$styles                    = _modesto_callback_get_cat_color( $term->term_id );
				$module_css[ $term->slug ] = $styles['style'];
				if ( $args['quicksand'] ) {
					$output .= '<li><a href="#" data-category=".' . esc_attr( $term->slug ) . '" data-filter=".' . esc_attr( $term->slug ) . '" class="' . $args['item_class'] . ' ' . $styles['class'] . '">' . esc_html( $term->name ) . '</a></li>';
				} else {
					$output .= '<li><a data-category=".' . esc_attr( $term->slug ) . '" class="' . $args['item_class'] . ' ' . $styles['class'] . ' ' . $active . '" href="' . esc_url( get_term_link( $term->slug, $args['taxonomy'] ) ) . '">' . esc_html( $term->name ) . '</a></li>';
				}
				$i ++;
			}
			if ( ! empty( $module_css ) ) {
				$output .= ' <div class="move-inline-styles">';
				foreach ( $module_css as $key => $value ) {
					if ( ! empty( $value ) ) {
						$output .= '.sorting-menu a.active[data-filter=".' . $key . '"] {' . $value . '; color:#fff;}';
					}
				}
				$output .= '</div>';
			}

			echo apply_filters( 'modesto_category_submenu', $output, $args );
		}

	}
}
