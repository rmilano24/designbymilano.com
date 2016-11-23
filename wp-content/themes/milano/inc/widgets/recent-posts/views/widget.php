<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * @var array  $r
 * @var string $widget_style
 */

while ( $r->have_posts() ) : $r->the_post();
	get_template_part( 'content', 'recent' );
endwhile;
wp_reset_postdata();
