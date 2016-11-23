<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/**
 * Set up the content width value based on the theme's design.
 *
 * @see _action_modesto_content_width()
 */
if ( ! isset( $content_width ) ) {
	$content_width = 800;
}

/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package modesto
 */


if ( ! function_exists( 'modesto_get_logo' ) ) :
	/**
	 * Generate Logo from theme options
	 *
	 * @param string $color Color Variant of logo.
	 * @param string $class Additional class for logo wrapper.
	 *
	 * @return string
	 */
	function modesto_get_logo( $color = 'dark', $class = '' ) {

		// Default logotype ( site name ).
		$output = '<a id="logo" class="' . esc_attr( $class ) . '" href="' . esc_url( home_url( '/' ) ) . '" rel="home"><span class="text">' . esc_html( get_bloginfo( 'name' ) ) . '</span></a>';

		$color = ( empty( $color ) ) ? 'dark' : $color;

		if ( function_exists( 'fw_get_db_settings_option' ) ) {
			$logotype_options = fw_get_db_settings_option( 'logo-options/theme-logotype' );

			if ( is_array( $logotype_options ) ) {
				if ( 'image' === $logotype_options['logo_type'] && isset( $logotype_options['image'][ 'logo_image_' . $color ] ) ) {
					$logo_style = '';
					if ( true === $logotype_options['image'][ 'retina_' . $color ] ) {
						$image_meta = wp_get_attachment_metadata( $logotype_options['image'][ 'logo_image_' . $color ]['attachment_id'] );
						$logo_width = $image_meta['width'] / 2;
						$logo_style = 'style="max-width:' . intval( $logo_width ) . 'px;"';
					}
					$output = '<a id="logo" class="' . esc_attr( $class ) . '" href="' . esc_url( home_url( '/' ) ) . '" rel="home"><img ' . $logo_style . ' src="' . esc_url( $logotype_options['image'][ 'logo_image_' . $color ]['url'] ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '"></a>';
				} else {
					$output = '<a id="logo" class="' . esc_attr( $class ) . '" href="' . esc_url( home_url( '/' ) ) . '" rel="home"><span class="text">' . esc_html( $logotype_options['text']['name'] ) . '</span></a>';
				}
			}
		}

		return $output;
	}
endif;
if ( ! function_exists( 'modesto_get_share' ) ) :
	/**
	 * @return string
	 */
	function modesto_get_share( $id = '' ) {
		$id   = ( empty( $id ) ) ? get_the_ID() : $id;
		$html = '<a class="entry sharer" data-sharer="facebook" data-title="' . get_the_title( $id ) . '" data-url="' . esc_attr( wp_get_shortlink( $id ) ) . '"><i class="fa fa-facebook"></i></a>
        <a class="entry sharer" data-sharer="googleplus" data-title="' . get_the_title( $id ) . '" data-url="' . esc_attr( wp_get_shortlink( $id ) ) . '"><i class="fa fa-google-plus"></i></a>
        <a class="entry sharer" data-sharer="twitter" data-title="' . get_the_title( $id ) . '" data-url="' . esc_attr( wp_get_shortlink( $id ) ) . '"><i class="fa fa-twitter"></i></a>
        <a class="entry sharer" data-sharer="pinterest" data-title="' . get_the_title( $id ) . '" data-url="' . esc_attr( wp_get_shortlink( $id ) ) . '"><i class="fa fa-pinterest-p"></i></a>
        <a class="entry sharer" data-sharer="xing" data-title="' . get_the_title( $id ) . '" data-url="' . esc_attr( wp_get_shortlink( $id ) ) . '"><i class="fa fa-xing"></i></a>';

		return $html;
	}
endif;

if ( ! function_exists( 'modesto_get_socials' ) ) :

	/**
	 * Generate social icons with links
	 *
	 * @param string $class Additional class for wrapper.
	 *
	 * @return string
	 */
	function modesto_get_socials( $class = '', $get_title = true ) {
		$html = '';

		if ( function_exists( 'fw_get_db_settings_option' ) ) {
			if ( true === $get_title ) {
				$networks_title = fw_get_db_settings_option( 'soc-label', 'Follow me:' );
			} else {
				$networks_title = '';
			}
			$networks = fw_get_db_settings_option( 'soc-networks', array() );
			if ( ! empty( $networks ) ) {
				$html .= '<div class="follow ' . esc_attr( $class ) . '" itemscope itemtype="http://schema.org/Organization">';
				$html .= '<link itemprop="url" href="' . esc_url( get_home_url() ) . '">';
				if ( ! empty( $networks_title ) ) {
					$html .= '<span class="title">' . esc_html( $networks_title ) . '</span>';
				}
				foreach ( $networks as $social ) {
					$html .= '<a class="entry" href="' . esc_url( $social['link'] ) . '" target="_blank"><i class="' . esc_attr( $social['icon'] ) . '"></i></a>';
				}
				$html .= '</div>';
			}
		}

		return $html;
	}
endif;


if ( ! function_exists( 'modesto_get_side_nav' ) ) :

	/**
	 * Generate Site edge links navigation
	 *
	 * @param array $options Options array.
	 *
	 * @return string
	 */
	function modesto_get_side_nav( $options = array() ) {
		$html = $class = $metabox = $overlay = '';

		if ( ! function_exists( 'fw_get_db_settings_option' ) ) {
			return array(
				'class'   => '',
				'html'    => '',
				'overlay' => ''
			);
		}
		$enable_side_nav       = fw_akg( 'enable', $options, 'no' );
		$links_from_meta_left  = fw_akg( 'yes/side-nav-options/left-links', $options, array() );
		$links_from_meta_right = fw_akg( 'yes/side-nav-options/right-links', $options, array() );
		$left_links            = ! empty( $links_from_meta_left ) ? $links_from_meta_left : fw_get_db_settings_option( 'side-nav-options/left-links', array() );
		$right_links           = ! empty( $links_from_meta_right ) ? $links_from_meta_right : fw_get_db_settings_option( 'side-nav-options/right-links', array() );

		if ( 'yes' === $enable_side_nav ) {

			$class = 'wide-container-fluid wide-paddings';

			$all_links = array_merge( $left_links, $right_links );

			if ( ! empty( $left_links ) ) {
				$html .= '<nav class="homepage-4-slider-navigation left hidden-xs text-center"><div class="rotate"><div class="row">';
				foreach ( $left_links as $link ) {
					$columns = intval( 12 / count( $left_links ) );
					$html .= '<div class="col-sm-' . $columns . '">';
					$html .= '<a class="mouseover-simple" href="' . esc_url( $link['link'] ) . '">' . esc_html( $link['label'] ) . '</a>';
					$html .= '</div>';
				}
				$html .= '</div></div></nav>';
			}
			if ( ! empty( $right_links ) ) {
				$html .= '<nav class="homepage-4-slider-navigation right hidden-xs text-center"><div class="rotate"><div class="row">';
				foreach ( $right_links as $link ) {
					$columns = intval( 12 / count( $right_links ) );
					$html .= '<div class="col-sm-' . $columns . '">';
					$html .= '<a class="mouseover-simple" href="' . esc_url( $link['link'] ) . '">' . esc_html( $link['label'] ) . '</a>';
					$html .= '</div>';
				}
				$html .= '</div></div></nav>';
			}

			if ( ! empty( $all_links ) ) {
				ob_start();
				?>
				<div class="overlay" data-rel="10">
					<div class="animation-wrapper full-size"></div>
					<div class="content-wrapper full-size valign-middle">
						<nav class="text-center single-column clearfix" style="width: 100%">
							<ul>
								<?php
								foreach ( $all_links as $link ) {
									echo '<li><a href="' . esc_url( $link['link'] ) . '">' . esc_html( $link['label'] ) . '</a></li>';
								} ?>
							</ul>
						</nav>
						<a class="button-close"></a>
					</div>
				</div>
				<?php
				$overlay .= ob_get_clean();
			}
		}

		return array(
			'class'   => $class,
			'html'    => $html,
			'overlay' => $overlay
		);

	}
endif;


if ( ! function_exists( ' modesto_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 *
	 * @param bool $post_id Id of post to get date.
	 *
	 * @return string
	 */
	function modesto_posted_on( $post_id = false ) {

		$post_id     = $post_id ? $post_id : get_the_ID();
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf( $time_string, esc_attr( get_the_date( 'c', $post_id ) ), esc_html( get_the_date( false, $post_id ) ) );

		return $time_string;

	}
endif;

if ( ! function_exists( ' modesto_posted_author' ) ) :
	/**
	 * Prints HTML with meta information for the author.
	 *
	 * @return string
	 */
	function modesto_posted_author() {
		$output = '<span class="post__author author vcard">';
		$output .= sprintf(
			esc_html_x( 'by %s', 'post author', 'modesto' ),
			'<span class="post__author-name fn n"><a class="url post__author-link" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);
		$output .= '</span>';

		return $output;
	}
endif;


if ( ! function_exists( ' modesto_post_category_list' ) ) :
	/**
	 * Prints HTML with meta information for the author.
	 *
	 * @param bool|false $post_id   ID Post.
	 * @param string     $separator Categories list separator.
	 * @param bool|false $colored   Set category labels bg color from category metabox.
	 * @param integer    $limit     Limit for categories.
	 *
	 * @return string
	 */
	function modesto_post_category_list( $post_id = false, $separator = '', $colored = false, $limit = 5 ) {
		$post_id         = $post_id ? $post_id : get_the_ID();
		$count           = 1;
		$categories_list = '';
		$categories      = get_the_category( $post_id );
		foreach ( $categories as $category ) {
			if ( $count < $limit + 1 ) {
				$color = ( true === $colored ) ? _modesto_callback_get_cat_color( $category->term_id ) : false;
				$categories_list .= '<a href="' . get_category_link( $category->term_id ) . '" class="post__cat ' . $color['class'] . '" style="' . $color['style'] . '" title="' . sprintf( esc_html__( 'All posts from %s', 'modesto' ), $category->name ) . '">' . $category->name . '</a>';
				if ( count( $categories ) !== $count ) {
					$categories_list .= $separator;
				}
				$count ++;
			}

		}

		return $categories_list;
	}
endif;

if ( ! function_exists( '_modesto_callback_get_cat_color' ) ) {
	/**
	 * Generate colors for category labels.
	 *
	 * @param int $id
	 *
	 * @return array
	 */
	function _modesto_callback_get_cat_color( $id = 0 ) {
		$class = $style = '';
		if ( function_exists( 'fw_get_db_term_option' ) && 0 !== $id ) {
			$color_option = fw_get_db_term_option( $id, 'category', 'category_bg_color', '' );
			if ( ! empty ( $color_option ) ) {
				$style = 'background-color:' . $color_option . ';';
				$class = 'colored-category';
			}
		}

		return array(
			'class' => $class,
			'style' => $style
		);
	}

}

if ( ! function_exists( ' modesto_posted_additional' ) ) :
	/**
	 * Prints HTML with meta information for comments / likes.
	 *
	 * @param int $id Post ID.
	 *
	 * @return string
	 */
	function modesto_posted_additional( $id = 0 ) {
		$output = '<span class="post__additional">';
		$id     = ( '0' !== $id ) ? $id : get_the_ID();
		if ( function_exists( 'get_simple_likes_button' ) ) {
			$like_tally  = get_post_meta( $id, '_post_like_count', true );
			$like_output = ( $like_tally >= 1 ) ? $like_tally : '0';
			$output .= $like_output . ' <i class="fa fa-heart-o"></i> ';
		}
		if ( ! post_password_required( $id ) && comments_open( $id ) ) {
			$output .= get_comments_number( $id );
			$output .= ' <i class="fa fa-comments-o"></i>';
		}

		$output .= '</span>';

		return $output;
	}
endif;

if ( ! function_exists( 'modesto_comments' ) ) :
	/**
	 * Reactor List Comments Callback
	 * callback function for wp_list_comments in reactor/comments.php
	 *
	 * @param object $comment Comment object.
	 * @param array  $args    Arguments for callback.
	 * @param int    $depth   Max. depth of comments tree.
	 */
	function modesto_comments( $comment, $args, $depth ) {
		do_action( 'modesto_comments', $comment, $args, $depth );
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
				// Display trackbacks differently than normal comments.
				?>
				<li <?php comment_class( 'comment-entry' ); ?> id="comment-<?php comment_ID(); ?>">
					<h6><?php esc_html_e( 'Pingback:', 'modesto' ); ?><?php comment_author_link(); ?> </h6>
					<?php edit_comment_link( esc_html__( 'Edit', 'modesto' ), '<div class="simple-article small"><span>', '</span></div>' ); ?>
					<div class="clearfix"></div>
					<div class="empty-space col-xs-b30"></div>
				</li>

				<?php
				break;
			default :
				// Proceed with normal comments.
				global $comment_depth;
				global $allowedtags;

				if ( '1' === $comment_depth ) {
					$reply_comment = '';
				} else {
					$reply_comment = ' reply-comment';
				} ?>

				<li <?php comment_class( 'comment-entry' . $reply_comment ); ?> id="div-comment-<?php comment_ID(); ?>">
					<?php if ( '0' === $comment->comment_approved ) : ?>
						<h5 class="comment-awaiting-moderation"> <?php esc_html_e( 'Your comment is awaiting moderation.', 'modesto' ); ?></h5>
					<?php endif; ?>

					<?php
					$avatar_output = get_avatar( $comment, 69 );
					$avatar_output = str_replace( 'alignnone', 'icon', $avatar_output );
					echo wp_kses( $avatar_output, $allowedtags );
					?>
					<div class="description">
						<div class="align">
							<div class="row comments-heading">
								<div class="col-md-8 col-sm-8 col-xs-8">
									<?php
									$comment_author_email = get_comment_author_email();
									$is_user              = get_user_by( 'email', $comment_author_email );

									if ( ! ( false === $is_user ) ) {
										$author_name      = $is_user->display_name;
										$author_posts_url = get_author_posts_url( $is_user->ID );
										$author_link      = '<a href="' . $author_posts_url . '" rel="external nofollow" class="url">' . $author_name . '</a>';
									} else {
										$author_link = get_comment_author_link();
									} ?>
									<div class="h6"><b><?php echo wp_kses( $author_link, $allowedtags ); ?></b></div>
									<div
										class="simple-article small grey blog-light-color text-left"><?php printf( _x( '%s ago', '%s = human-readable time difference', 'modesto' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?></div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-4 text-right">
									<?php
									$comment_reply_link = '';
									ob_start();
									comment_reply_link( array_merge( $args, array(
										'reply_text' => esc_html__( 'Reply', 'modesto' ),
										'before'     => '<div class="simple-article small">',
										'after'      => '</div>',
										'depth'      => $depth,
										'max_depth'  => $args['max_depth'],
									) ) );
									$comment_reply_link .= ob_get_clean();
									echo( $comment_reply_link );
									?>
								</div>
							</div>
							<div class="simple-article grey"><?php comment_text(); ?></div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="empty-space col-xs-b45"></div>
				</li>
				<!-- #comment-## -->
				<?php
				break;
		endswitch; // End comment_type check. ?>
	<?php }
endif;

if ( ! function_exists( 'modesto_top_header' ) ) {
	/**
	 * @param string $header_class Class for header.
	 * @param string $color        Color of logotype.
	 * @param array  $sidenav_links
	 */
	function modesto_top_header( $header_class = 'white', $color = 'dark', $sidenav_links = array() ) {

		$text_position = $header_text = $text_block = '';

		if ( ! defined( 'FW' ) ) {
			$header_style    = 'classic';
			$overlay_enable  = $top_panel_enable = $frame = $hide_menu = 'no';
			$header_width    = 'container';
			$burger_position = 'right';
			$overlay_style   = 'simple';
			$border          = false;
		} else {
			$header_style     = fw_get_db_settings_option( 'head_style/selected', 'classic' );
			$overlay_enable   = fw_get_db_settings_option( 'overlay-switch/enable', 'no' );
			$top_panel_enable = fw_get_db_settings_option( 'head_style/classic/top-panel/enable', 'no' );
			$header_width     = fw_get_db_settings_option( 'header-width', 'container' );
			$burger_position  = fw_get_db_settings_option( 'overlay-switch/yes/position', 'right' );
			$border           = fw_get_db_settings_option( 'bordered', false );
			$overlay_style    = fw_get_db_settings_option( 'overlay-switch/yes/overlay-options/style-select/style', 'simple' );
			$frame            = fw_get_db_settings_option( 'overlay-switch/yes/overlay-options/frame', 'no' );
			$hide_menu        = 'no';
			if ( 'center' === $header_style ) {
				$header_text   = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'head_style/' . $header_style . '/top-text/yes/text', '' ) : '';
				$text_position = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'head_style/' . $header_style . '/top-text/yes/position', 'left' ) : 'left';
			}
			if ( is_singular( array( 'page', 'fw-portfolio' ) ) && function_exists( 'fw_akg' ) ) {
				$custom_header = fw_get_db_post_option( get_the_ID(), 'custom-header', array() );
				if ( 'yes' === fw_akg( 'enable', $custom_header, 'no' ) ) {
					$header_style     = fw_akg( 'yes/head_style/selected', $custom_header, 'classic' );
					$top_panel_enable = fw_akg( 'yes/head_style/classic/top-panel/enable', $custom_header, 'no' );
					$header_width     = fw_akg( 'yes/header-width', $custom_header, 'container' );
					$border           = fw_akg( 'yes/bordered', $custom_header, false );
					$overlay_enable   = fw_akg( 'yes/overlay-custom/enable', $custom_header, 'no' );
					$burger_position  = fw_akg( 'yes/overlay-custom/yes/position', $custom_header, 'right' );
					$overlay_style    = fw_akg( 'yes/overlay-custom/yes/style-select/style', $custom_header, 'simple' );
					$frame            = fw_akg( 'yes/overlay-custom/yes/frame', $custom_header, 'no' );
					$hide_menu        = fw_akg( 'yes/hide_menu', $custom_header, 'no' );
					if ( 'center' === $header_style ) {
						$text_position = fw_akg( 'yes/head_style/center/position', $custom_header, 'left' );
						$header_text   = fw_akg( 'yes/head_style/center/text', $custom_header );
					}
				}
			}
		}

		if ( 'yes' === $overlay_enable ) {
			$frame_class = ( 'yes' === $frame ) ? 'frame' : '';
			echo '<div class="overlay ' . esc_attr( $frame_class ) . '" data-rel="1">';
			get_template_part( 'parts/overlay/' . $overlay_style );
			echo '</div>';
		}
		if ( 'yes' === $top_panel_enable ) {
			get_template_part( 'parts/section', 'toppanel' );
			$color = 'dark';
			$header_class .= ' type-3 ';
		} else {
			if ( false !== strpos( $header_class, 'type-' ) ) {
				$header_class .= ' ';
			} else {
				$header_class .= ' type-4 ';
			}
			if ( false === strpos( $header_class, 'static' ) ) {
				$header_class .= ' fixed ';
			}
		}
		if ( true === $border ) {
			$header_class .= 'grey-line';
		}

		?>
		<!-- HEADER -->
		<header class="<?php echo esc_attr( $header_class ); ?>">
			<div class="<?php echo esc_attr( $header_width ); ?>">
				<div class="row">
					<?php if ( 'classic' === $header_style ) { ?>
						<div class="col-xs-6 col-sm-2">
							<?php if ( 'yes' === $overlay_enable && 'left' === $burger_position ) { ?>
								<div class="hamburger-icon open-overlay" data-rel="1">
									<span></span><span></span><span></span>
								</div>
							<?php } ?>
							<?php echo modesto_get_logo( $color ); // WPCS: XSS ok, sanitization ok. ?>
						</div>
						<div class="col-xs-6 col-sm-10 text-right">
							<div class="navigation-wrapper">
								<?php echo modesto_get_logo( 'dark', 'responsive' ); // WPCS: XSS ok, sanitization ok. ?>
								<div class="navigation-overflow">
									<?php if ( 'yes' !== $hide_menu ) {
										wp_nav_menu( array(
											'theme_location' => 'primary',
											'menu_id'        => 'primary-menu',
											'container'      => 'nav',
											'menu_class'     => 'text-left clearfix'
										) );
									} ?>
								</div>
								<?php echo modesto_get_socials( 'style-1' );  // WPCS: XSS ok, sanitization ok. ?>
							</div>
							<?php if ( 'yes' !== $hide_menu ) { ?>
								<div class="hamburger-icon open-navigation">
									<span></span><span></span><span></span>
								</div>
							<?php } ?>
							<?php if ( 'yes' === $overlay_enable && 'right' === $burger_position ) { ?>
								<div class="hamburger-icon open-overlay" data-rel="1">
									<span></span><span></span><span></span>
								</div>
							<?php } ?>

						</div>
					<?php } else { ?>
						<div class="col-sm-4 hidden-xs">
							<div class="header-block">
								<?php if ( 'yes' === $overlay_enable && 'left' === $burger_position ) { ?>
									<div class="hamburger-icon open-overlay" data-rel="1">
										<span></span><span></span><span></span>
									</div>
								<?php } ?>
								<?php if ( ! empty( $header_text ) && 'left' === $text_position ) { ?>
									<?php global $allowedposttags;
									echo wp_kses( $header_text, $allowedposttags );
									?>
								<?php } ?>
							</div>
						</div>
						<div class="col-xs-6 col-xs-text-left col-sm-text-center col-sm-4">
							<?php echo modesto_get_logo( $color ); // WPCS: XSS ok, sanitization ok. ?>
						</div>
						<div class="col-xs-6 col-sm-4 text-right">
							<div class="header-block">
								<?php if ( ! empty( $header_text ) && 'right' === $text_position ) { ?>
									<?php global $allowedposttags;
									echo wp_kses( $header_text, $allowedposttags );
								} ?>
								<?php if ( 'yes' === $overlay_enable && 'right' === $burger_position ) { ?>
									<div class="hamburger-icon open-overlay" data-rel="1">
										<span></span><span></span><span></span>
									</div>
								<?php } elseif ( ! empty( $sidenav_links ) ) { ?>
									<div class="visible-xs">
										<div class="hamburger-icon open-overlay" data-rel="10">
											<span></span>
											<span></span>
											<span></span>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="close-layer toggle-visibility">
				<div class="button-close"></div>
			</div>
		</header>
	<?php }
}