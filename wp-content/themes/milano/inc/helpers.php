<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Helper functions and classes with static methods for usage in theme
 */


/**
 * Register Lato Google font.
 *
 * @return string
 */
function modesto_font_url() {
	$font_url = '';

	$variant_number = function_exists( 'fw_get_db_post_option' )? fw_get_db_post_option( get_the_ID(), 'font_pairs', '999' ) : '999';

	if ( ! ( '999' === $variant_number ) ) {

		$custom_font_pairs = fw_get_db_settings_option( 'font_pairs' );

		$custom_pair = $enqueue_fonts = array();

		if ( is_array( $custom_font_pairs ) ) {
			$custom_pair = $custom_font_pairs[ $variant_number ];
		}

		$font_1 = fw_akg( 'font_1/family', $custom_pair );
		$font_2 = fw_akg( 'font_2/family', $custom_pair );

		if ( ! empty( $font_1 ) ) {
			$enqueue_fonts[] = $font_1 . ':300,400,700,900';
		}

		if ( ! empty( $font_2 ) ) {
			$enqueue_fonts[] = $font_2 . ':300,400,700,900';
		}

		$font_url = esc_url( add_query_arg( 'family', urlencode( implode( '|', $enqueue_fonts ) ),
			"//fonts.googleapis.com/css" ) );

	} else {
		/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
		if ( 'off' !== _x( 'on', 'Theme font: on or off', 'modesto' ) ) {
			$font_url = esc_url( add_query_arg( 'family', urlencode( 'Droid+Serif:400italic,700italic|PT+Mono|Montserrat' ),
				"//fonts.googleapis.com/css" ) );
		}
	}
	$font_url = str_replace( '%2B', '+', $font_url );

	return $font_url;
}

/**
 * Getter function for Featured Content Plugin.
 *
 * @return array An array of WP_Post objects.
 */
function modesto_get_featured_posts() {
	/**
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters( 'modesto_get_featured_posts', array() );
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @return bool Whether there are featured posts.
 */
function modesto_has_featured_posts() {
	return ! is_paged() && (bool) modesto_get_featured_posts();
}

if ( ! function_exists( 'modesto_the_attached_image' ) ) : /**
 * Print the attached image with a link to the next attached image.
 */ {
	function modesto_the_attached_image() {
		$post = get_post();
		/**
		 * Filter the default attachment size.
		 *
		 * @param array $dimensions {
		 *                          An array of height and width dimensions.
		 *
		 * @type int    $height     Height of the image in pixels. Default 810.
		 * @type int    $width      Width of the image in pixels. Default 810.
		 * }
		 */
		$attachment_size     = apply_filters( 'modesto_attachment_size', array( 810, 810 ) );
		$next_attachment_url = wp_get_attachment_url();

		$next_id = false;
		/*
		 * Grab the IDs of all the image attachments in a gallery so we can get the URL
		 * of the next adjacent image in a gallery, or the first image (if we're
		 * looking at the last image in a gallery), or, in a gallery of one, just the
		 * link to that image file.
		 */
		$attachment_ids = get_posts( array(
			'post_parent'    => $post->post_parent,
			'fields'         => 'ids',
			'numberposts'    => - 1,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'menu_order ID',
		) );

		// If there is more than 1 attachment in a gallery...
		if ( count( $attachment_ids ) > 1 ) {
			foreach ( $attachment_ids as $attachment_id ) {
				if ( $attachment_id == $post->ID ) {
					$next_id = current( $attachment_ids );
					break;
				}
			}

			// get the URL of the next image attachment...
			if ( $next_id ) {
				$next_attachment_url = get_attachment_link( $next_id );
			} // or get the URL of the first image attachment.
			else {
				$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
			}
		}

		printf( '<a href="%1$s" rel="attachment">%2$s</a>',
			esc_url( $next_attachment_url ),
			wp_get_attachment_image( $post->ID, $attachment_size )
		);
	}
}
endif;

if ( ! function_exists( 'modesto_list_authors' ) ) {
	/**
	 * Print a list of all site contributors who published at least one post.
	 */
	function modesto_list_authors() {
		$contributor_ids = get_users( array(
			'fields'  => 'ID',
			'orderby' => 'post_count',
			'order'   => 'DESC',
			'who'     => 'authors',
		) );

		foreach ( $contributor_ids as $contributor_id ) :
			$post_count = count_user_posts( $contributor_id );

			// Move on if user has not published a post (yet).
			if ( ! $post_count ) {
				continue;
			}
			?>

			<div class="contributor">
				<div class="contributor-info">
					<div class="contributor-avatar"><?php echo get_avatar( $contributor_id, 132 ); ?></div>
					<div class="contributor-summary">
						<h2 class="contributor-name"><?php echo get_the_author_meta( 'display_name', $contributor_id ); ?></h2>
						<p class="contributor-bio">
							<?php echo get_the_author_meta( 'description', $contributor_id ); ?>
						</p>
						<a class="button contributor-posts-link"
						   href="<?php echo esc_url( get_author_posts_url( $contributor_id ) ); ?>">
							<?php printf( _n( '%d Article', '%d Articles', $post_count, 'modesto' ), $post_count ); ?>
						</a>
					</div>
					<!-- .contributor-summary -->
				</div>
				<!-- .contributor-info -->
			</div><!-- .contributor -->

			<?php
		endforeach;
	}
}

if ( ! function_exists( 'modesto_paging_nav' ) ) :
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 *
	 * @param array $wp_query WordPress query.
	 */
	function modesto_paging_nav( $wp_query = null ) {

		if ( ! $wp_query ) {
			$wp_query = $GLOBALS['wp_query'];
		}

		// Don't print empty markup if there's only one page.
		if ( $wp_query->max_num_pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links( array(
			'base'               => $pagenum_link,
			'format'             => $format,
			'total'              => $wp_query->max_num_pages,
			'current'            => $paged,
			'mid_size'           => 2,
			'add_args'           => array_map( 'urlencode', $query_args ),
			'prev_text'          => '<span>' . __( 'Previous', 'modesto' ) . '</span>',
			'next_text'          => '<span>' . __( 'Next', 'modesto' ) . '</span>',
			'before_page_number' => '<span>',
			'after_page_number'  => '</span>',
		) );

		if ( $links ) :
			?>
			<div class="empty-space col-xs-b25 col-sm-b50"></div>
			<div class="align-center align-center pagination-wrap ">
				<nav class="navigation page-pagination grey" role="navigation">
					<h5 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', 'modesto' ); ?></h5>
					<?php echo( $links ); ?>
					<!-- .pagination -->
				</nav>
				<!-- .navigation -->
			</div>
			<div class="empty-space col-xs-b55 col-sm-b110"></div>
			<?php
		endif;
	}
endif;

if ( ! function_exists( 'modesto_post_nav' ) ) : /**
 * Display navigation to next/previous post when applicable.
 */ {
	function modesto_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '',
			true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}

		?>
		<nav class="navigation post-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'modesto' ); ?></h1>

			<div class="nav-links">
				<?php
				if ( is_attachment() ) :
					previous_post_link( '%link',
						__( '<span class="meta-nav">Published In</span>%title', 'modesto' ) );
				else :
					previous_post_link( '%link',
						__( '<span class="meta-nav">Previous Post</span>%title', 'modesto' ) );
					next_post_link( '%link', __( '<span class="meta-nav">Next Post</span>%title', 'modesto' ) );
				endif;
				?>
			</div>
			<!-- .nav-links -->
		</nav><!-- .navigation -->
		<?php
	}
}
endif;


/**
 * Find out if blog has more than one category.
 *
 * @return boolean true if blog has more than 1 category
 */
function modesto_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'modesto_category_count' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'modesto_category_count', $all_the_cool_cats );
	}

	if ( 1 !== (int) $all_the_cool_cats ) {
		// This blog has more than 1 category so modesto_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so modesto_categorized_blog should return false.
		return false;
	}
}


if ( ! ( function_exists( 'modesto_generate_short_excerpt' ) ) ) {
	/**
	 * Generate short exerpt for blog posts.
	 *
	 * @param int  $post_id        Id of post.
	 * @param int  $excerpt_length Lengt for exertpt from post meta.
	 * @param bool $trim_excerpt   Cut custom excerpt.
	 *
	 * @return string
	 */
	function modesto_generate_short_excerpt( $post_id, $excerpt_length = 15, $trim_excerpt = false ) {
		$post_excerpt = get_post_field( 'post_excerpt', $post_id );

		if ( isset( $post_excerpt ) && ! empty( $post_excerpt ) ) {
			$trimmed_excerpt = $post_excerpt;
			if ( true === $trim_excerpt ) {
				$trimmed_excerpt = wp_trim_words( strip_shortcodes( $post_excerpt ), $excerpt_length );
			}
		} else {
			$excerpt         = get_the_content();
			$trimmed_excerpt = wp_trim_words( strip_shortcodes( $excerpt ), $excerpt_length );
		}

		return $trimmed_excerpt;
	}
}

if ( ! function_exists( 'modesto_get_menus' ) ) :
	/**
	 * Get array with menus for theme options
	 *
	 * @return array
	 */
	function modesto_get_menus() {
		$menus_list = array( '' => '--------------' );
		$menus      = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
		if ( is_array( $menus ) ) {
			foreach ( $menus as $menu_instance ) {
				$menus_list[ $menu_instance->term_id ] = $menu_instance->name;
			}
		}

		return $menus_list;
	}
endif;


if ( ! function_exists( 'modesto_get_spacers' ) ) :
	/**
	 * Get array with spacers for theme options
	 *
	 * @return array
	 */
	function modesto_get_spacers() {
		$spacers = array( '' => '--------------' );
		for ( $count = 0; $count < 125; $count = $count + 5 ) {
			$spacers[ 'b' . $count ] = esc_html__( 'Height', 'modesto' ) . ': ' . $count . ' (' . esc_html__( 'px', 'modesto' ) . ')';
		}
		// + Extra large spacers classes

		$extra_large = array(
			'b200' => esc_html__( 'Height', 'modesto' ) . ': 200 (' . esc_html__( 'px', 'modesto' ) . ')',
			'b250' => esc_html__( 'Height', 'modesto' ) . ': 250 (' . esc_html__( 'px', 'modesto' ) . ')',
		);

		$spacers = array_merge( $spacers, $extra_large );

		return $spacers;
	}
endif;


if ( ! function_exists( 'modesto_gen_link_for_shortcode' ) ) :
	/**
	 * Generate link from block options
	 *
	 * @param array $atts Shortcode options
	 *
	 * @return array
	 */
	function modesto_gen_link_for_shortcode( $atts ) {
		$link_source = fw_akg( 'link/selected/selected', $atts, '' );
		if ( 'page' === $link_source ) {
			$link = get_permalink( fw_akg( 'link/selected/page/link/0', $atts, '' ) );
		} else {
			$link = fw_akg( 'link/selected/url/link', $atts, '' );
		}
		$target = fw_akg( 'link/target', $atts, '_self' );

		$url['link']   = $link;
		$url['target'] = $target;

		return $url;
	}
endif;


/**
 * Disable content editor for page template.
 */
function modesto_disable_content_editor() {

	$only = array(
		'only' => array( array( 'id' => 'page' ) ),
	);
	if ( function_exists( 'fw_current_screen_match' ) && fw_current_screen_match( $only ) ) {

		$post_id = ( isset( $_GET['post'] ) ) ? $_GET['post'] : '';

		if ( empty( $post_id ) ) {
			remove_meta_box( 'fw-options-box-slider-template', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-portfolio-slider', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-blog-template', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-portfolio-page', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-teaser-page', 'page', 'normal' );
		}
		$template_file = get_post_meta( $post_id, '_wp_page_template', true );
		if ( 'page-templates/page-slider-1.php' === $template_file ) {
			remove_post_type_support( 'page', 'editor' );
			add_filter( 'admin_body_class', '_modesto_publish_button_enable' );

			remove_meta_box( 'fw-options-box-portfolio-slider', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-blog-template', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-portfolio-page', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-teaser-page', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-contact-page', 'page', 'normal' );
		} elseif ( 'page-templates/portfolio-slider.php' === $template_file ) {
			remove_post_type_support( 'page', 'editor' );
			add_filter( 'admin_body_class', '_modesto_publish_button_enable' );
			remove_meta_box( 'fw-options-box-slider-template', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-blog-template', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-portfolio-page', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-teaser-page', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-contact-page', 'page', 'normal' );
		} elseif ( 'page-templates/blog.php' === $template_file ) {
			add_filter( 'admin_body_class', '_modesto_disable_stunning_tab' );
			remove_meta_box( 'fw-options-box-portfolio-slider', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-portfolio-page', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-slider-template', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-teaser-page', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-contact-page', 'page', 'normal' );
		} elseif ( 'page-templates/portfolio-blog.php' === $template_file ) {
			add_filter( 'admin_body_class', '_modesto_page_template_blog' );
			remove_meta_box( 'fw-options-box-slider-template', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-portfolio-slider', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-blog-template', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-teaser-page', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-contact-page', 'page', 'normal' );
		} elseif ( 'page-templates/page-teaser.php' === $template_file ) {
			add_filter( 'admin_body_class', '_modesto_page_template_teaser' );
			remove_meta_box( 'fw-options-box-slider-template', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-portfolio-slider', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-design-customize', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-blog-template', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-portfolio-page', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-contact-page', 'page', 'normal' );
		} elseif ( 'page-templates/contact-page.php' === $template_file ) {
			add_filter( 'admin_body_class', '_modesto_page_template_contact' );
			remove_meta_box( 'fw-options-box-slider-template', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-portfolio-slider', 'page', 'normal' );
			//remove_meta_box( 'fw-options-box-design-customize', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-blog-template', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-portfolio-page', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-teaser-page', 'page', 'normal' );
		} else {
			add_filter( 'admin_body_class', '_modesto_page_template_general' );
			remove_meta_box( 'fw-options-box-portfolio-slider', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-slider-template', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-blog-template', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-portfolio-page', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-teaser-page', 'page', 'normal' );
			remove_meta_box( 'fw-options-box-contact-page', 'page', 'normal' );
		}

	}
}

add_action( 'do_meta_boxes', 'modesto_disable_content_editor', 99 );

function _modesto_publish_button_enable() {
	return 'slider-page-template';
}

function _modesto_disable_stunning_tab() {
	return 'disable-stunning-tab';
}


function _modesto_page_template_blog() {
	return 'blog-page-template';
}

function _modesto_page_template_teaser() {
	return 'teaser-page-template';
}

function _modesto_page_template_contact() {
	return 'contact-page-template';
}

function _modesto_page_template_general() {
	return 'general-page-template';
}

/**
 * @param      $option
 * @param      $meta_option
 * @param bool $default
 *
 * @return mixed
 */
function _modesto_meta_options( $option, $meta_option, $default = false ) {

	if ( true === $default ) {

		if ( isset( $meta_option ) && ! empty( $meta_option ) && ( 'default' !== $meta_option ) ) {
			$option = $meta_option;
		}

	} else {

		if ( isset( $meta_option ) && ! empty( $meta_option ) ) {
			$option = $meta_option;
		}

	}

	return $option;

}


/**
 * @param string $class
 * @param string $id
 * @param bool   $href
 *
 * @return array|string
 */
function _modesto_get_portfolio_categories( $class = '', $id = '', $href = true ) {
	if ( empty( $id ) ) {
		$id = get_the_ID();
	}
	$portfolio_categories = wp_get_post_terms( $id, 'fw-portfolio-category' );
	$display_cats         = array();
	if ( ! is_wp_error( $portfolio_categories ) ) {
		foreach ( $portfolio_categories as $single_cat ) {
			if ( false === $href ) {
				$display_cats[] = $single_cat->name;
			} else {
				$display_cats[] = '<a class="' . esc_attr( $class ) . '" href="' . esc_url( get_term_link( $single_cat->term_id ) ) . '">' . $single_cat->name . '</a>';
			}
		}
		$display_cats = array_slice( $display_cats, 0, 2 );
	}

	$display_cats = implode( ' / ', $display_cats );

	return $display_cats;
}

function _modesto_get_related_portfolios( $id, $number = 3 ) {

	$portfolio_categories = wp_get_post_terms( $id, 'fw-portfolio-category' );

	$ids = array();

	if ( ! is_wp_error( $portfolio_categories ) ) {

		foreach ( $portfolio_categories as $single_category ) {
			$ids[] = $single_category->term_id;
		}

		$args = array(
			'post_type'      => 'fw-portfolio',
			'orderby'        => 'title',
			'posts_per_page' => $number,
			'tax_query'      => array(
				array(
					'taxonomy' => 'fw-portfolio-category',
					'field'    => 'term_id',
					'terms'    => $ids,
					'operator' => 'IN',
				),
			)
		);

		$new_query = new WP_Query( $args );

		$related_portfolios = array();

		if ( $new_query->have_posts() ) {
			while ( $new_query->have_posts() ): $new_query->the_post();

				if ( ! ( $id === get_the_ID() ) ) {
					$related_portfolios[] = get_the_ID();
				}

			endwhile;
		}

		if ( count( $related_portfolios ) < $number ) {

			$add_args  = array(
				'post_type' => 'fw-portfolio',
				'orderby'   => 'title',
			);
			$add_query = new WP_Query( $add_args );
			if ( $add_query->have_posts() ) {
				while ( $add_query->have_posts() ): $add_query->the_post();
					if ( ! in_array( get_the_ID(), $related_portfolios ) ) {
						$related_portfolios[] = get_the_ID();
					}
				endwhile;
			}

			$related_portfolios = array_slice( $related_portfolios, 0, $number );

		}

		FW_Cache::set( 'related_portfolio_' . $id, $related_portfolios );

		wp_reset_postdata();
	}

}

if ( ! function_exists( 'modesto_relative_time' ) ) {

	/**
	 * Convert dates to readable format.
	 *
	 * @param int $a Time in Unix format.
	 *
	 * @return string
	 */
	function modesto_relative_time( $a ) {
		// Get current timestampt.
		$b = strtotime( esc_html__( 'now', 'modesto' ) );
		// Get timestamp when tweet created.
		$c = strtotime( $a );
		// Get difference.
		$d = $b - $c;
		// Calculate different time values.
		$minute = 60;
		$hour   = $minute * 60;
		$day    = $hour * 24;

		if ( is_numeric( $d ) && $d > 0 ) {
			// If less then 3 seconds.
			if ( $d < 3 ) {
				return esc_html__( 'right now', 'modesto' );
			}
			// If less then minute.
			if ( $d < $minute ) {
				return floor( $d ) . esc_html__( 'seconds ago', 'modesto' );
			}
			// If less then 2 minutes.
			if ( $d < $minute * 2 ) {
				return esc_html__( 'about 1 minute ago', 'modesto' );
			}
			// If less then hour.
			if ( $d < $hour ) {
				return floor( $d / $minute ) . ' ' . esc_html__( 'minutes ago', 'modesto' );
			}
			// If less then 2 hours.
			if ( $d < $hour * 2 ) {
				return 'about 1 hour ago';
			}
			// If less then day.
			if ( $d < $day ) {
				return floor( $d / $hour ) . ' ' . esc_html__( 'hours ago', 'modesto' );
			}
			// If more then day, but less then 2 days.
			if ( $d > $day && $d < $day * 2 ) {
				return 'yesterday';
			}
			// If less then year.
			if ( $d < $day * 365 ) {
				return floor( $d / $day ) . ' ' . esc_html__( 'days ago', 'modesto' );
			}

			// Else return more than a year.
			return esc_html__( 'over a year ago', 'modesto' );
		} else {
			return '';
		}
	}
}

/**
 * Convert text in tweets to links.
 *
 * @param string $status Tweet.
 *
 * @return mixed
 */
function modesto_twitter_convert_links( $status ) {

	$status = preg_replace_callback( '/((http:\/\/|https:\/\/)[^ )]+)/', function ( $matches ) {
		return '<a href="' . $matches[1] . '" class="link" title="' . $matches[1] . '" target="_blank" ><strong>' . ( ( strlen( $matches[1] ) >= 450 ? substr( $matches[1], 0, 450 ) . '...' : $matches[1] ) ) . '</strong></a>';
	}, $status );


	$status = preg_replace( "/(#([_a-z0-9\-]+))/i", "<a href=\"https://twitter.com/search?q=$2\" class=\"link\" title=\"Search $1\" target=\"_blank\"><strong>$1</strong></a>", $status );

	return $status;
}

// Related posts plugin addition.
add_filter( 'rp4wp_append_content', '__return_false' );

// based on https://gist.github.com/cosmocatalano/4544576
function modesto_scrape_instagram( $username, $slice = 9 ) {

	$username = strtolower( $username );
	$username = str_replace( '@', '', $username );

	if ( false === ( $instagram = get_transient( 'instagram-widget-' . sanitize_title_with_dashes( $username ) ) ) ) {

		$remote = wp_remote_get( 'https://instagram.com/' . trim( $username ) );

		if ( is_wp_error( $remote ) ) {
			return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'modesto' ) );
		}
		if ( 200 !== wp_remote_retrieve_response_code( $remote ) ) {
			return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'modesto' ) );
		}

		$shards      = explode( 'window._sharedData = ', $remote['body'] );
		$insta_json  = explode( ';</script>', $shards[1] );
		$insta_array = json_decode( $insta_json[0], true );

		if ( ! $insta_array ) {
			return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'modesto' ) );
		}

		if ( isset( $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'] ) ) {
			$user   = $insta_array['entry_data']['ProfilePage'][0]['user'];
			$images = $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];
		} else {
			return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'modesto' ) );
		}

		if ( ! is_array( $images ) ) {
			return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'modesto' ) );
		}

		$instagram = array();

		foreach ( $images as $image ) {

			$image['thumbnail_src'] = preg_replace( '/^https?\:/i', '', $image['thumbnail_src'] );
			$image['display_src']   = preg_replace( '/^https?\:/i', '', $image['display_src'] );

			if ( ( strpos( $image['thumbnail_src'], 's640x640' ) !== false ) ) {
				$image['thumbnail'] = str_replace( 's640x640', 's160x160', $image['thumbnail_src'] );
				$image['small']     = str_replace( 's640x640', 's320x320', $image['thumbnail_src'] );
			} else {
				$urlparts  = wp_parse_url( $image['thumbnail_src'] );
				$pathparts = explode( '/', $urlparts['path'] );
				array_splice( $pathparts, 3, 0, array( 's160x160' ) );
				$image['thumbnail'] = '//' . $urlparts['host'] . implode( '/', $pathparts );
				$pathparts[3]       = 's320x320';
				$image['small']     = '//' . $urlparts['host'] . implode( '/', $pathparts );
			}

			$image['large'] = $image['thumbnail_src'];

			if ( true === $image['is_video'] ) {
				$type = 'video';
			} else {
				$type = 'image';
			}

			$caption = __( 'Instagram Image', 'modesto' );
			if ( ! empty( $image['caption'] ) ) {
				$caption = $image['caption'];
			}

			$instagram[] = array(
				'user'        => $user,
				'description' => $caption,
				'link'        => '//instagram.com/p/' . $image['code'],
				'time'        => $image['date'],
				'comments'    => $image['comments']['count'],
				'likes'       => $image['likes']['count'],
				'thumbnail'   => $image['thumbnail'],
				'small'       => $image['small'],
				'large'       => $image['large'],
				'original'    => $image['display_src'],
				'type'        => $type,
			);
		}

		// Do not set an empty transient - should help catch private or empty accounts.
		if ( ! empty( $instagram ) ) {
			$instagram = json_encode( serialize( $instagram ) );
			set_transient( 'instagram-widget-' . sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'null_instagram_cache_time', HOUR_IN_SECONDS * 2 ) );
		}
	}

	if ( ! empty( $instagram ) ) {
		$instagram = unserialize( json_decode( $instagram ) );

		return array_slice( $instagram, 0, $slice );
	} else {
		return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'modesto' ) );
	}
}

/**
 * Move comment field to bottom helper.
 *
 * @param $fields
 *
 * @return mixed
 */
function modesto_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;

	return $fields;
}

add_filter( 'comment_form_fields', 'modesto_comment_field_to_bottom' );

if ( ! function_exists( '_modesto_google_map_custom_styles' ) ) {
	/**
	 * Custom styles for map shortcode
	 *
	 * @return array
	 */
	function _modesto_google_map_custom_styles() {
		return array(
			'default'            => array(
				esc_html__( "Default", 'modesto' ),
				""
			),
			'dark'               => array(
				esc_html__( "Dark", 'modesto' ),
				"[{'featureType':'all','elementType':'labels.text.fill','stylers':[{'saturation':36},{'color':'#000000'},{'lightness':40}]},{'featureType':'all','elementType':'labels.text.stroke','stylers':[{'visibility':'on'},{'color':'#000000'},{'lightness':16}]},{'featureType':'all','elementType':'labels.icon','stylers':[{'visibility':'off'}]},{'featureType':'administrative','elementType':'geometry.fill','stylers':[{'color':'#000000'},{'lightness':20}]},{'featureType':'administrative','elementType':'geometry.stroke','stylers':[{'color':'#000000'},{'lightness':17},{'weight':1.2}]},{'featureType':'landscape','elementType':'geometry','stylers':[{'color':'#000000'},{'lightness':20}]},{'featureType':'poi','elementType':'geometry','stylers':[{'color':'#000000'},{'lightness':21}]},{'featureType':'road.highway','elementType':'geometry.fill','stylers':[{'color':'#000000'},{'lightness':17}]},{'featureType':'road.highway','elementType':'geometry.stroke','stylers':[{'color':'#000000'},{'lightness':29},{'weight':0.2}]},{'featureType':'road.arterial','elementType':'geometry','stylers':[{'color':'#000000'},{'lightness':18}]},{'featureType':'road.local','elementType':'geometry','stylers':[{'color':'#000000'},{'lightness':16}]},{'featureType':'transit','elementType':'geometry','stylers':[{'color':'#000000'},{'lightness':19}]},{'featureType':'water','elementType':'geometry','stylers':[{'color':'#000000'},{'lightness':17}]}]"
			),
			'omni'               => array(
				esc_html__( "Omni", 'modesto' ),
				"[{'featureType':'landscape','stylers':[{'saturation':-100},{'lightness':65},{'visibility':'on'}]},{'featureType':'poi','stylers':[{'saturation':-100},{'lightness':51},{'visibility':'simplified'}]},{'featureType':'road.highway','stylers':[{'saturation':-100},{'visibility':'simplified'}]},{'featureType':'road.arterial','stylers':[{'saturation':-100},{'lightness':30},{'visibility':'on'}]},{'featureType':'road.local','stylers':[{'saturation':-100},{'lightness':40},{'visibility':'on'}]},{'featureType':'transit','stylers':[{'saturation':-100},{'visibility':'simplified'}]},{'featureType':'administrative.province','stylers':[{'visibility':'off'}]},{'featureType':'water','elementType':'labels','stylers':[{'visibility':'on'},{'lightness':-25},{'saturation':-100}]},{'featureType':'water','elementType':'geometry','stylers':[{'hue':'#ffff00'},{'lightness':-25},{'saturation':-97}]}]"
			),
			'coy-beauty'         => array(
				esc_html__( "Coy Beauty", 'modesto' ),
				"[{'featureType':'all','elementType':'geometry.stroke','stylers':[{'visibility':'simplified'}]},{'featureType':'administrative','elementType':'all','stylers':[{'visibility':'off'}]},{'featureType':'administrative','elementType':'labels','stylers':[{'visibility':'simplified'},{'color':'#a31645'}]},{'featureType':'landscape','elementType':'all','stylers':[{'weight':'3.79'},{'visibility':'on'},{'color':'#ffecf0'}]},{'featureType':'landscape','elementType':'geometry','stylers':[{'visibility':'on'}]},{'featureType':'landscape','elementType':'geometry.stroke','stylers':[{'visibility':'on'}]},{'featureType':'poi','elementType':'all','stylers':[{'visibility':'simplified'},{'color':'#a31645'}]},{'featureType':'poi','elementType':'geometry','stylers':[{'saturation':'0'},{'lightness':'0'},{'visibility':'off'}]},{'featureType':'poi','elementType':'geometry.stroke','stylers':[{'visibility':'off'}]},{'featureType':'poi.business','elementType':'all','stylers':[{'visibility':'simplified'},{'color':'#d89ca8'}]},{'featureType':'poi.business','elementType':'geometry','stylers':[{'visibility':'on'}]},{'featureType':'poi.business','elementType':'geometry.fill','stylers':[{'visibility':'on'},{'saturation':'0'}]},{'featureType':'poi.business','elementType':'labels','stylers':[{'color':'#a31645'}]},{'featureType':'poi.business','elementType':'labels.icon','stylers':[{'visibility':'simplified'},{'lightness':'84'}]},{'featureType':'road','elementType':'all','stylers':[{'saturation':-100},{'lightness':45}]},{'featureType':'road.highway','elementType':'all','stylers':[{'visibility':'simplified'}]},{'featureType':'road.arterial','elementType':'labels.icon','stylers':[{'visibility':'off'}]},{'featureType':'transit','elementType':'all','stylers':[{'visibility':'off'}]},{'featureType':'water','elementType':'all','stylers':[{'color':'#d89ca8'},{'visibility':'on'}]},{'featureType':'water','elementType':'geometry.fill','stylers':[{'visibility':'on'},{'color':'#fedce3'}]},{'featureType':'water','elementType':'labels','stylers':[{'visibility':'off'}]}]"
			),
			'subtle-grayscale'   => array(
				esc_html__( "Subtle Grayscale", 'modesto' ),
				"[{'featureType':'landscape','stylers':[{'saturation':-100},{'lightness':65},{'visibility':'on'}]},{'featureType':'poi','stylers':[{'saturation':-100},{'lightness':51},{'visibility':'simplified'}]},{'featureType':'road.highway','stylers':[{'saturation':-100},{'visibility':'simplified'}]},{'featureType':'road.arterial','stylers':[{'saturation':-100},{'lightness':30},{'visibility':'on'}]},{'featureType':'road.local','stylers':[{'saturation':-100},{'lightness':40},{'visibility':'on'}]},{'featureType':'transit','stylers':[{'saturation':-100},{'visibility':'simplified'}]},{'featureType':'administrative.province','stylers':[{'visibility':'off'}]},{'featureType':'water','elementType':'labels','stylers':[{'visibility':'on'},{'lightness':-25},{'saturation':-100}]},{'featureType':'water','elementType':'geometry','stylers':[{'hue':'#ffff00'},{'lightness':-25},{'saturation':-97}]}]"
			),
			'pale-dawn'          => array(
				esc_html__( "Pale Dawn", 'modesto' ),
				"[{'featureType':'water','stylers':[{'visibility':'on'},{'color':'#acbcc9'}]},{'featureType':'landscape','stylers':[{'color':'#f2e5d4'}]},{'featureType':'road.highway','elementType':'geometry','stylers':[{'color':'#c5c6c6'}]},{'featureType':'road.arterial','elementType':'geometry','stylers':[{'color':'#e4d7c6'}]},{'featureType':'road.local','elementType':'geometry','stylers':[{'color':'#fbfaf7'}]},{'featureType':'poi.park','elementType':'geometry','stylers':[{'color':'#c5dac6'}]},{'featureType':'administrative','stylers':[{'visibility':'on'},{'lightness':33}]},{'featureType':'road'},{'featureType':'poi.park','elementType':'labels','stylers':[{'visibility':'on'},{'lightness':20}]},{},{'featureType':'road','stylers':[{'lightness':20}]}]"
			),
			'blue-water'         => array(
				esc_html__( "Blue water", 'modesto' ),
				"[{'featureType':'water','stylers':[{'color':'#46bcec'},{'visibility':'on'}]},{'featureType':'landscape','stylers':[{'color':'#f2f2f2'}]},{'featureType':'road','stylers':[{'saturation':-100},{'lightness':45}]},{'featureType':'road.highway','stylers':[{'visibility':'simplified'}]},{'featureType':'road.arterial','elementType':'labels.icon','stylers':[{'visibility':'off'}]},{'featureType':'administrative','elementType':'labels.text.fill','stylers':[{'color':'#444444'}]},{'featureType':'transit','stylers':[{'visibility':'off'}]},{'featureType':'poi','stylers':[{'visibility':'off'}]}]"
			),
			'shades-of-grey'     => array(
				esc_html__( "Shades of Grey", 'modesto' ),
				"[{'featureType':'water','elementType':'geometry','stylers':[{'color':'#000000'},{'lightness':17}]},{'featureType':'landscape','elementType':'geometry','stylers':[{'color':'#000000'},{'lightness':20}]},{'featureType':'road.highway','elementType':'geometry.fill','stylers':[{'color':'#000000'},{'lightness':17}]},{'featureType':'road.highway','elementType':'geometry.stroke','stylers':[{'color':'#000000'},{'lightness':29},{'weight':0.2}]},{'featureType':'road.arterial','elementType':'geometry','stylers':[{'color':'#000000'},{'lightness':18}]},{'featureType':'road.local','elementType':'geometry','stylers':[{'color':'#000000'},{'lightness':16}]},{'featureType':'poi','elementType':'geometry','stylers':[{'color':'#000000'},{'lightness':21}]},{'elementType':'labels.text.stroke','stylers':[{'visibility':'on'},{'color':'#000000'},{'lightness':16}]},{'elementType':'labels.text.fill','stylers':[{'saturation':36},{'color':'#000000'},{'lightness':40}]},{'elementType':'labels.icon','stylers':[{'visibility':'off'}]},{'featureType':'transit','elementType':'geometry','stylers':[{'color':'#000000'},{'lightness':19}]},{'featureType':'administrative','elementType':'geometry.fill','stylers':[{'color':'#000000'},{'lightness':20}]},{'featureType':'administrative','elementType':'geometry.stroke','stylers':[{'color':'#000000'},{'lightness':17},{'weight':1.2}]}]"
			),
			'midnight-commander' => array(
				esc_html__( "Midnight Commander", 'modesto' ),
				"[{'featureType':'water','stylers':[{'color':'#021019'}]},{'featureType':'landscape','stylers':[{'color':'#08304b'}]},{'featureType':'poi','elementType':'geometry','stylers':[{'color':'#0c4152'},{'lightness':5}]},{'featureType':'road.highway','elementType':'geometry.fill','stylers':[{'color':'#000000'}]},{'featureType':'road.highway','elementType':'geometry.stroke','stylers':[{'color':'#0b434f'},{'lightness':25}]},{'featureType':'road.arterial','elementType':'geometry.fill','stylers':[{'color':'#000000'}]},{'featureType':'road.arterial','elementType':'geometry.stroke','stylers':[{'color':'#0b3d51'},{'lightness':16}]},{'featureType':'road.local','elementType':'geometry','stylers':[{'color':'#000000'}]},{'elementType':'labels.text.fill','stylers':[{'color':'#ffffff'}]},{'elementType':'labels.text.stroke','stylers':[{'color':'#000000'},{'lightness':13}]},{'featureType':'transit','stylers':[{'color':'#146474'}]},{'featureType':'administrative','elementType':'geometry.fill','stylers':[{'color':'#000000'}]},{'featureType':'administrative','elementType':'geometry.stroke','stylers':[{'color':'#144b53'},{'lightness':14},{'weight':1.4}]}]"
			),
			'retro'              => array(
				esc_html__( "Retro", 'modesto' ),
				"[{'featureType':'administrative','stylers':[{'visibility':'off'}]},{'featureType':'poi','stylers':[{'visibility':'simplified'}]},{'featureType':'road','elementType':'labels','stylers':[{'visibility':'simplified'}]},{'featureType':'water','stylers':[{'visibility':'simplified'}]},{'featureType':'transit','stylers':[{'visibility':'simplified'}]},{'featureType':'landscape','stylers':[{'visibility':'simplified'}]},{'featureType':'road.highway','stylers':[{'visibility':'off'}]},{'featureType':'road.local','stylers':[{'visibility':'on'}]},{'featureType':'road.highway','elementType':'geometry','stylers':[{'visibility':'on'}]},{'featureType':'water','stylers':[{'color':'#84afa3'},{'lightness':52}]},{'stylers':[{'saturation':-17},{'gamma':0.36}]},{'featureType':'transit.line','elementType':'geometry','stylers':[{'color':'#3f518c'}]}]"
			),
			'light-monochrome'   => array(
				esc_html__( "Light Monochrome", 'modesto' ),
				"[{'featureType':'water','elementType':'all','stylers':[{'hue':'#e9ebed'},{'saturation':-78},{'lightness':67},{'visibility':'simplified'}]},{'featureType':'landscape','elementType':'all','stylers':[{'hue':'#ffffff'},{'saturation':-100},{'lightness':100},{'visibility':'simplified'}]},{'featureType':'road','elementType':'geometry','stylers':[{'hue':'#bbc0c4'},{'saturation':-93},{'lightness':31},{'visibility':'simplified'}]},{'featureType':'poi','elementType':'all','stylers':[{'hue':'#ffffff'},{'saturation':-100},{'lightness':100},{'visibility':'off'}]},{'featureType':'road.local','elementType':'geometry','stylers':[{'hue':'#e9ebed'},{'saturation':-90},{'lightness':-8},{'visibility':'simplified'}]},{'featureType':'transit','elementType':'all','stylers':[{'hue':'#e9ebed'},{'saturation':10},{'lightness':69},{'visibility':'on'}]},{'featureType':'administrative.locality','elementType':'all','stylers':[{'hue':'#2c2e33'},{'saturation':7},{'lightness':19},{'visibility':'on'}]},{'featureType':'road','elementType':'labels','stylers':[{'hue':'#bbc0c4'},{'saturation':-93},{'lightness':31},{'visibility':'on'}]},{'featureType':'road.arterial','elementType':'labels','stylers':[{'hue':'#bbc0c4'},{'saturation':-93},{'lightness':-2},{'visibility':'simplified'}]}]"
			),
			'paper'              => array(
				esc_html__( "Paper", 'modesto' ),
				"[{'featureType':'administrative','stylers':[{'visibility':'off'}]},{'featureType':'poi','stylers':[{'visibility':'simplified'}]},{'featureType':'road','stylers':[{'visibility':'simplified'}]},{'featureType':'water','stylers':[{'visibility':'simplified'}]},{'featureType':'transit','stylers':[{'visibility':'simplified'}]},{'featureType':'landscape','stylers':[{'visibility':'simplified'}]},{'featureType':'road.highway','stylers':[{'visibility':'off'}]},{'featureType':'road.local','stylers':[{'visibility':'on'}]},{'featureType':'road.highway','elementType':'geometry','stylers':[{'visibility':'on'}]},{'featureType':'road.arterial','stylers':[{'visibility':'off'}]},{'featureType':'water','stylers':[{'color':'#5f94ff'},{'lightness':26},{'gamma':5.86}]},{},{'featureType':'road.highway','stylers':[{'weight':0.6},{'saturation':-85},{'lightness':61}]},{'featureType':'road'},{},{'featureType':'landscape','stylers':[{'hue':'#0066ff'},{'saturation':74},{'lightness':100}]}]"
			),
			'gowalla'            => array(
				esc_html__( "Gowalla", 'modesto' ),
				"[{'featureType':'road','elementType':'labels','stylers':[{'visibility':'simplified'},{'lightness':20}]},{'featureType':'administrative.land_parcel','elementType':'all','stylers':[{'visibility':'off'}]},{'featureType':'landscape.man_made','elementType':'all','stylers':[{'visibility':'off'}]},{'featureType':'transit','elementType':'all','stylers':[{'visibility':'off'}]},{'featureType':'road.local','elementType':'labels','stylers':[{'visibility':'simplified'}]},{'featureType':'road.local','elementType':'geometry','stylers':[{'visibility':'simplified'}]},{'featureType':'road.highway','elementType':'labels','stylers':[{'visibility':'simplified'}]},{'featureType':'poi','elementType':'labels','stylers':[{'visibility':'off'}]},{'featureType':'road.arterial','elementType':'labels','stylers':[{'visibility':'off'}]},{'featureType':'water','elementType':'all','stylers':[{'hue':'#a1cdfc'},{'saturation':30},{'lightness':49}]},{'featureType':'road.highway','elementType':'geometry','stylers':[{'hue':'#f49935'}]},{'featureType':'road.arterial','elementType':'geometry','stylers':[{'hue':'#fad959'}]}]"
			),
			'greyscale'          => array(
				esc_html__( "Greyscale", 'modesto' ),
				"[{'featureType':'all','stylers':[{'saturation':-100},{'gamma':0.5}]}]"
			),
			'apple-maps-esque'   => array(
				esc_html__( "Apple Maps-esque", 'modesto' ),
				"[{'featureType':'water','elementType':'geometry','stylers':[{'color':'#a2daf2'}]},{'featureType':'landscape.man_made','elementType':'geometry','stylers':[{'color':'#f7f1df'}]},{'featureType':'landscape.natural','elementType':'geometry','stylers':[{'color':'#d0e3b4'}]},{'featureType':'landscape.natural.terrain','elementType':'geometry','stylers':[{'visibility':'off'}]},{'featureType':'poi.park','elementType':'geometry','stylers':[{'color':'#bde6ab'}]},{'featureType':'poi','elementType':'labels','stylers':[{'visibility':'off'}]},{'featureType':'poi.medical','elementType':'geometry','stylers':[{'color':'#fbd3da'}]},{'featureType':'poi.business','stylers':[{'visibility':'off'}]},{'featureType':'road','elementType':'geometry.stroke','stylers':[{'visibility':'off'}]},{'featureType':'road','elementType':'labels','stylers':[{'visibility':'off'}]},{'featureType':'road.highway','elementType':'geometry.fill','stylers':[{'color':'#ffe15f'}]},{'featureType':'road.highway','elementType':'geometry.stroke','stylers':[{'color':'#efd151'}]},{'featureType':'road.arterial','elementType':'geometry.fill','stylers':[{'color':'#ffffff'}]},{'featureType':'road.local','elementType':'geometry.fill','stylers':[{'color':'black'}]},{'featureType':'transit.station.airport','elementType':'geometry.fill','stylers':[{'color':'#cfb2db'}]}]"
			),
			'subtle'             => array(
				esc_html__( "Subtle", 'modesto' ),
				"[{'featureType':'poi','stylers':[{'visibility':'off'}]},{'stylers':[{'saturation':-70},{'lightness':37},{'gamma':1.15}]},{'elementType':'labels','stylers':[{'gamma':0.26},{'visibility':'off'}]},{'featureType':'road','stylers':[{'lightness':0},{'saturation':0},{'hue':'#ffffff'},{'gamma':0}]},{'featureType':'road','elementType':'labels.text.stroke','stylers':[{'visibility':'off'}]},{'featureType':'road.arterial','elementType':'geometry','stylers':[{'lightness':20}]},{'featureType':'road.highway','elementType':'geometry','stylers':[{'lightness':50},{'saturation':0},{'hue':'#ffffff'}]},{'featureType':'administrative.province','stylers':[{'visibility':'on'},{'lightness':-50}]},{'featureType':'administrative.province','elementType':'labels.text.stroke','stylers':[{'visibility':'off'}]},{'featureType':'administrative.province','elementType':'labels.text','stylers':[{'lightness':20}]}]"
			),
			'neutral-blue'       => array(
				esc_html__( "Neutral Blue", 'modesto' ),
				"[{'featureType':'water','elementType':'geometry','stylers':[{'color':'#193341'}]},{'featureType':'landscape','elementType':'geometry','stylers':[{'color':'#2c5a71'}]},{'featureType':'road','elementType':'geometry','stylers':[{'color':'#29768a'},{'lightness':-37}]},{'featureType':'poi','elementType':'geometry','stylers':[{'color':'#406d80'}]},{'featureType':'transit','elementType':'geometry','stylers':[{'color':'#406d80'}]},{'elementType':'labels.text.stroke','stylers':[{'visibility':'on'},{'color':'#3e606f'},{'weight':2},{'gamma':0.84}]},{'elementType':'labels.text.fill','stylers':[{'color':'#ffffff'}]},{'featureType':'administrative','elementType':'geometry','stylers':[{'weight':0.6},{'color':'#1a3541'}]},{'elementType':'labels.icon','stylers':[{'visibility':'off'}]},{'featureType':'poi.park','elementType':'geometry','stylers':[{'color':'#2c5a71'}]}]"
			),
			'flat-map'           => array(
				esc_html__( "Flat Map", 'modesto' ),
				"[{'stylers':[{'visibility':'off'}]},{'featureType':'road','stylers':[{'visibility':'on'},{'color':'#ffffff'}]},{'featureType':'road.arterial','stylers':[{'visibility':'on'},{'color':'#fee379'}]},{'featureType':'road.highway','stylers':[{'visibility':'on'},{'color':'#fee379'}]},{'featureType':'landscape','stylers':[{'visibility':'on'},{'color':'#f3f4f4'}]},{'featureType':'water','stylers':[{'visibility':'on'},{'color':'#7fc8ed'}]},{},{'featureType':'road','elementType':'labels','stylers':[{'visibility':'off'}]},{'featureType':'poi.park','elementType':'geometry.fill','stylers':[{'visibility':'on'},{'color':'#83cead'}]},{'elementType':'labels','stylers':[{'visibility':'off'}]},{'featureType':'landscape.man_made','elementType':'geometry','stylers':[{'weight':0.9},{'visibility':'off'}]}]"
			),
			'shift-worker'       => array(
				esc_html__( "Shift Worker", 'modesto' ),
				"[{'stylers':[{'saturation':-100},{'gamma':1}]},{'elementType':'labels.text.stroke','stylers':[{'visibility':'off'}]},{'featureType':'poi.business','elementType':'labels.text','stylers':[{'visibility':'off'}]},{'featureType':'poi.business','elementType':'labels.icon','stylers':[{'visibility':'off'}]},{'featureType':'poi.place_of_worship','elementType':'labels.text','stylers':[{'visibility':'off'}]},{'featureType':'poi.place_of_worship','elementType':'labels.icon','stylers':[{'visibility':'off'}]},{'featureType':'road','elementType':'geometry','stylers':[{'visibility':'simplified'}]},{'featureType':'water','stylers':[{'visibility':'on'},{'saturation':50},{'gamma':0},{'hue':'#50a5d1'}]},{'featureType':'administrative.neighborhood','elementType':'labels.text.fill','stylers':[{'color':'#333333'}]},{'featureType':'road.local','elementType':'labels.text','stylers':[{'weight':0.5},{'color':'#333333'}]},{'featureType':'transit.station','elementType':'labels.icon','stylers':[{'gamma':1},{'saturation':50}]}]"
			),
		);
	}
}

/**
 * @param $rows
 *
 * @return array
 */
function map_locations_parse( $rows ) {
	$result = array();
	if ( ! empty( $rows ) ) {
		foreach ( $rows as $key => $row ) {
			$result[ $key ]['title']       = fw_akg( 'title', $row );
			$result[ $key ]['url']         = fw_akg( 'url', $row );
			$result[ $key ]['thumb']       = fw_resize( wp_get_attachment_url( fw_akg( 'thumb/attachment_id', $row ) ), 100, 60, true );
			$result[ $key ]['coordinates'] = fw_akg( 'location/coordinates', $row );
			$result[ $key ]['description'] = fw_akg( 'description', $row );
		}
	}

	return $result;
}


function modesto_portfolio_loop() {
	$per_page = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'per_page', 9 ) : 9;
	$order    = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'order', 'DESC' ) : 'DESC';
	$orderby  = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'orderby', 'date' ) : 'date';

	if ( function_exists( 'fw_get_db_post_option' ) ) {
		$meta_per_page          = fw_get_db_post_option( get_the_ID(), 'per_page' );
		$meta_order             = fw_get_db_post_option( get_the_ID(), 'order' );
		$meta_orderby           = fw_get_db_post_option( get_the_ID(), 'orderby' );
		$meta_custom_categories = fw_get_db_post_option( get_the_ID(), 'taxonomy_select' );
		$meta_exclude           = fw_get_db_post_option( get_the_ID(), 'exclude' );
	} else {
		$meta_custom_categories = array();
		$meta_exclude           = false;
	}

	if ( isset( $meta_per_page ) && ! empty( $meta_per_page ) ) {
		$per_page = $meta_per_page;
	}

	if ( isset( $meta_order ) && ! empty( $meta_order ) && ! ( 'default' === $meta_order ) ) {
		$order = $meta_order;
	}

	if ( isset( $meta_orderby ) && ! empty( $meta_orderby ) && ! ( 'default' === $meta_orderby ) ) {
		$orderby = $meta_orderby;
	}

	if ( is_front_page() ) {
		$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
	} else {
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	}

	$args = array(
		'post_type'      => 'fw-portfolio',
		'paged'          => $paged,
		'posts_per_page' => $per_page,
		'order'          => $order,
		'orderby'        => $orderby
	);

	if ( ! empty( $meta_custom_categories ) ) {
		if ( true === $meta_exclude ) {
			$operator = 'NOT IN';
		} else {
			$operator = 'IN';
		}
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'fw-portfolio-category',
				'field'    => 'term_id',
				'terms'    => $meta_custom_categories,
				'operator' => $operator,
			),
		);
	}

	$porfolio_query = new WP_Query( $args );

	return $porfolio_query;

}
