<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Filters and Actions
 */

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 *
 * @internal
 */
function _action_modesto_admin_fonts() {
	wp_enqueue_style( 'modesto-custom-font', modesto_font_url(), array(), '1.0' );
}

add_action( 'admin_print_scripts-appearance_page_custom-header', '_action_modesto_admin_fonts' );

if ( ! function_exists( '_action_modesto_setup' ) ) :
	/**
	 * Theme setup.
	 *
	 * Set up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support post thumbnails.
	 *
	 * @internal
	 */
	function _action_modesto_setup() {
		/*
		 * Make Theme available for translation.
		 */
		load_theme_textdomain( 'modesto', get_template_directory() . '/languages' );

		// This theme styles the visual editor to resemble the theme style.
		add_editor_style( array( 'css/editor-style.css', modesto_font_url() ) );

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 140, 140, true );

		//Add excerpt field for pages
		add_post_type_support( 'page', 'excerpt' );
		add_post_type_support( 'fw-portfolio', 'excerpt' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		
		// This theme uses its own gallery styles.
		add_filter( 'use_default_gallery_style', '__return_false' );
	}

endif;
add_action( 'init', '_action_modesto_setup' );


function modesto_additional_image_sizes() {
	add_image_size( 'single-thumb', 1170 );
}

add_action( 'after_setup_theme', 'modesto_additional_image_sizes' );

/**
 * Adjust content_width value for image attachment template.
 *
 * @internal
 */
function _action_modesto_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 810;
	}
}

add_action( 'template_redirect', '_action_modesto_content_width' );


/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @param array $classes A list of existing body class values.
 *
 * @return array The filtered body class list.
 * @internal
 */
function _filter_modesto_body_classes( $classes ) {

	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} else {
		$classes[] = 'masthead-fixed';
	}

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}

	if ( function_exists( 'fw_ext_sidebars_get_current_position' ) ) {
		$current_position = fw_ext_sidebars_get_current_position();
		if ( in_array( $current_position, array( 'full', 'left' ) )
		     || empty( $current_position )
		     || is_page_template( 'page-templates/full-width.php' )
		     || is_page_template( 'page-templates/contributors.php' )
		     || is_attachment()
		) {
			$classes[] = 'full-width';
		}
	} else {
		$classes[] = 'full-width';
	}

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		$classes[] = 'slider';
	} elseif ( is_front_page() ) {
		$classes[] = 'grid';
	}

	$classes[] = 'fonts-8';

	$bg_color = ( function_exists( 'fw_get_db_post_option' ) ) ? fw_get_db_post_option( get_the_ID(), 'bg-color', false ) : false;
	if ( $bg_color ) {
		$classes[] = 'with-bg';
	}

	return $classes;
}

add_filter( 'body_class', '_filter_modesto_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @param array $classes A list of existing post class values.
 *
 * @return array The filtered post class list.
 * @internal
 */
function _filter_modesto_post_classes( $classes ) {
	if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}

add_filter( 'post_class', '_filter_modesto_post_classes' );


/**
 * Extend the default WordPress category title.
 *
 * Remove 'Category' word from cat title.
 *
 * @param string $title Original category title.
 *
 * @return string The filtered category title.
 * @internal
 */
function _filter_modesto_archive_title( $title ) {
	if ( is_home() ) {
		$title = __( 'Latest posts', 'modesto' );
	} elseif ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( ( is_singular( 'post' ) ) ) {
		$category = get_the_category( get_the_ID() );
		$title    = $category[0]->name;
	} elseif ( is_singular() ) {
		$title = get_the_title();
	}

	return $title;
}

add_filter( 'get_the_archive_title', '_filter_modesto_archive_title' );

/**
 * Extend the default WordPress category description.
 *
 * Add description for pages.
 *
 * @param string $description Original description.
 *
 * @return string The filtered category title.
 * @internal
 */
function _filter_modesto_archive_description( $description ) {

	if ( ( is_singular( 'post' ) ) ) {
	$category = get_the_category( get_the_ID() );
	$description = $category[0]->description;
	} elseif ( is_singular() ) {
		$description = do_shortcode( get_the_excerpt() );
	}

	return $description;
}

add_filter( 'get_the_archive_description', '_filter_modesto_archive_description' );


/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 *
 * @return string The filtered title.
 * @internal
 */
function _filter_modesto_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'modesto' ), max( $paged, $page ) );
	}

	return $title;
}

add_filter( 'wp_title', '_filter_modesto_wp_title', 10, 2 );


/**
 * Flush out the transients used in modesto_categorized_blog.
 *
 * @internal
 */
function _action_modesto_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'modesto_category_count' );
}

add_action( 'edit_category', '_action_modesto_category_transient_flusher' );
add_action( 'save_post', '_action_modesto_category_transient_flusher' );

/**
 * Theme Customizer support
 */

/**
 * Implement Theme Customizer additions and adjustments.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 * @internal
 */
function _action_modesto_customize_register( $wp_customize ) {
	// Add custom description to Colors and Background sections.
	$wp_customize->get_section( 'colors' )->description           = __( 'Background may only be visible on wide screens.',
		'modesto' );
	$wp_customize->get_section( 'background_image' )->description = __( 'Background may only be visible on wide screens.',
		'modesto' );

	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Rename the label to "Site Title Color" because this only affects the site title in this theme.
	$wp_customize->get_control( 'header_textcolor' )->label = __( 'Site Title Color', 'modesto' );

	// Rename the label to "Display Site Title & Tagline" in order to make this option extra clear.
	$wp_customize->get_control( 'display_header_text' )->label = __( 'Display Site Title &amp; Tagline', 'modesto' );

	// Add the featured content section in case it's not already there.
	$wp_customize->add_section( 'featured_content', array(
		'title'       => __( 'Featured Content', 'modesto' ),
		'description' => sprintf( __( 'Use a <a href="%1$s">tag</a> to feature your posts. If no posts match the tag, <a href="%2$s">sticky posts</a> will be displayed instead.',
			'modesto' ),
			esc_url( add_query_arg( 'tag', _x( 'featured', 'featured content default tag slug', 'modesto' ),
				admin_url( 'edit.php' ) ) ),
			admin_url( 'edit.php?show_sticky=1' )
		),
		'priority'    => 130,
	) );

	// Add the featured content layout setting and control.
	$wp_customize->add_setting( 'featured_content_layout', array(
		'default'           => 'grid',
		'sanitize_callback' => '_modesto_sanitize_layout',
	) );

	$wp_customize->add_control( 'featured_content_layout', array(
		'label'   => __( 'Layout', 'modesto' ),
		'section' => 'featured_content',
		'type'    => 'select',
		'choices' => array(
			'grid'   => __( 'Grid', 'modesto' ),
			'slider' => __( 'Slider', 'modesto' ),
		),
	) );
}

add_action( 'customize_register', '_action_modesto_customize_register' );

/**
 * Sanitize the Featured Content layout value.
 *
 * @param string $layout Layout type.
 *
 * @return string Filtered layout type (grid|slider).
 * @internal
 */
function _modesto_sanitize_layout( $layout ) {
	if ( ! in_array( $layout, array( 'grid', 'slider' ) ) ) {
		$layout = 'grid';
	}

	return $layout;
}

/**
 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @internal
 */
function _action_modesto_customize_preview_js() {
	wp_enqueue_script(
		'modesto-customizer',
		get_template_directory_uri() . '/js/customizer.js',
		array( 'customize-preview' ),
		'1.0',
		true
	);
}

add_action( 'customize_preview_init', '_action_modesto_customize_preview_js' );

/**
 * Register widget areas.
 *
 * @internal
 */
function _action_modesto_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Blog sidebar', 'modesto' ),
			'id'            => 'sidebar-blog',
			'description'   => __( 'Appears in categories and single posts.', 'modesto' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s simple-article col-xs-b30 col-sm-b60">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title h4">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Overlay Sidebar Column 1', 'modesto' ),
			'id'            => 'sidebar-overlay-1',
			'description'   => __( 'Appears in overlay section of the site.', 'modesto' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s simple-article light transparent col-xs-b30 col-sm-b50">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title h4 small light col-xs-b15">',
			'after_title'   => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Overlay Sidebar Column 2', 'modesto' ),
			'id'            => 'sidebar-overlay-2',
			'description'   => __( 'Appears in overlay section of the site.', 'modesto' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s simple-article light transparent col-xs-b30 col-sm-b50">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title h4 small light col-xs-b15">',
			'after_title'   => '</div>',
		)
	);

}

add_action( 'widgets_init', '_action_modesto_widgets_init' );

/**
 * Add tags to allowedtags filter
 */
function modesto_extend_allowed_tags() {
	global $allowedtags;



	$allowedtags['p']      = array(
		'style' => array(),
	);
	$allowedtags['i']      = array(
		'class' => array(),
	);
	$allowedtags['br']     = array(
		'class' => array(),
	);
	$allowedtags['img']    = array(
		'src'    => array(),
		'alt'    => array(),
		'width'  => array(),
		'height' => array(),
		'class'  => array(),
	);
	$allowedtags['span']   = array(
		'class' => array(),
		'style' => array(),
	);
	$allowedtags['a']      = array(
		'class' => array(),
		'href'  => array(),
	);
}

add_action( 'init', 'modesto_extend_allowed_tags' );

if ( defined( 'FW' ) ):
	/**
	 * Display current submitted FW_Form errors
	 * @return array
	 */
	if ( ! function_exists( '_action_modesto_display_form_errors' ) ):
		function _action_modesto_display_form_errors() {
			$form = FW_Form::get_submitted();

			if ( ! $form || $form->is_valid() ) {
				return;
			}

			wp_enqueue_script(
				'modesto-show-form-errors',
				get_template_directory_uri() . '/js/form-errors.js',
				array( 'jquery' ),
				'1.0',
				true
			);

			wp_localize_script( 'modesto-show-form-errors', '_localized_form_errors', array(
				'errors'  => $form->get_errors(),
				'form_id' => $form->get_id()
			) );
		}
	endif;
	add_action( 'wp_enqueue_scripts', '_action_modesto_display_form_errors' );
endif;


/**
 * Change image sizes for blog on theme activation.
 */
function modesto_enforce_image_size_options() {
	update_option( 'thumbnail_size_w', 140 );
	update_option( 'thumbnail_size_h', 140 );
	update_option( 'medium_size_w', 500 );
	update_option( 'medium_size_h', 500 );
	update_option( 'large_size_w', 1170 );
	update_option( 'large_size_h', 900 );
}

add_action( 'switch_theme', 'modesto_enforce_image_size_options' );


// Plugin Activation
function modesto_create_subscribers_field() {
	global $wpdb;
	$table_name    = $wpdb->prefix . 'crumsubscribe';
	$current_table = $wpdb->get_var( $wpdb->prepare( "SHOW TABLES LIKE %s", $table_name ) );
	if ( $current_table != $table_name ) {
		$structure = "CREATE TABLE $table_name (
        id INT(9) NOT NULL AUTO_INCREMENT,
        modesto_name VARCHAR(200) NOT NULL,
        modesto_email VARCHAR(200) NOT NULL,
	UNIQUE KEY id (id)
    );";

		$wpdb->query( $structure );
	}
}

add_action( 'switch_theme', 'modesto_create_subscribers_field' );

add_filter( 'jpeg_quality', create_function( '', 'return 85;' ) );


/**
 * Theme demos array.
 *
 * @param array $demos
 *
 * @return array
 */
function _filter_modesto_fw_ext_backups_demos( $demos ) {

	if ( class_exists( 'FW_Ext_Backups_Demo' ) ) {
		$demos_array = array(
			'modesto' => array(
				'title'        => esc_html__( 'Main Theme demo', 'modesto' ),
				'screenshot'   => get_template_directory_uri() . '/screenshot.png',
				'preview_link' => 'http://theme.crumina.net/modesto/',
			),
		);

		$download_url = 'http://up.crumina.net/demo-data/modesto/upload.php';

		foreach ( $demos_array as $id => $data ) {
			$demo = new FW_Ext_Backups_Demo( $id, 'piecemeal', array(
				'url'     => $download_url,
				'file_id' => $id,
			) );
			$demo->set_title( $data['title'] );
			$demo->set_screenshot( $data['screenshot'] );
			$demo->set_preview_link( $data['preview_link'] );

			$demos[ $demo->get_id() ] = $demo;

			unset( $demo );
		}
	}

	return $demos;
}

add_filter( 'fw:ext:backups-demo:demos', '_filter_modesto_fw_ext_backups_demos' );

add_action( 'wp_ajax_modesto_send_message', 'do_modesto_send_message' );
add_action( 'wp_ajax_nopriv_modesto_send_message', 'do_modesto_send_message' );

/**
 * Send massage in contact forms by ajax.
 * 
 * @return bool
 */
function do_modesto_send_message() {
	if ( isset( $_POST['name'] ) && isset( $_POST['email'] ) && isset( $_POST['message'] ) ) {

		$name_text    = esc_html__( 'Name', 'modesto' );
		$email_text   = esc_html__( 'Email Address', 'modesto' );
		$comment_text = esc_html__( 'Message', 'modesto' );
		
		$name    = $_POST['name'];
		$email   = $_POST['email'];
		$subject = isset( $_POST['subject'] ) ? $_POST['subject'] : esc_html__( 'From contact form on your site', 'modesto' );
		$message = $_POST['message'];
		$admin_email = get_option('admin_email');
		$send_to = $admin_email;
		
		$body    = "$name_text: $name \n\n $email_text: $email \n\n $comment_text: $message";
		$headers = 'From: ' . $name . ' <' . $send_to . '>' . "\r\n" . 'Reply-To: ' . $email;
		$success = wp_mail( $send_to, $subject, $body, $headers );
		if ( $success ) {
			return true;
		} else {
			return false;
		}
	}
}


/**
 * Customize the Password Form on Protected Posts
 *
 * @param int $post Post ID.
 *
 * @return string
 */
function modesto_password_form( $post ) {
	$current_post = get_post( $post );
	$label        = 'pwbox-' . ( empty( $current_post->ID ) ? rand() : $current_post->ID );
	$output       = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form subscribe-form" method="post">
	<h5>' . esc_html__( 'This content is password protected. To view it please enter your password below:', 'modesto' ) . '</h5>
    <div class="row"><div class="col-sm-9 col-md-8 col-lg-9 col-xs-b15 col-sm-b0"><div class="input-wrapper">
    <input class="input" required="required" id="' . $label . '" type="password" size="20"><label for="' . $label . '">' . __( 'Password:', 'modesto' ) . '</label><span></span></div></div>
    <div class="col-sm-3 col-md-4 col-lg-3"><button class="button type-3" style="width: 100%;">' . esc_attr__( 'Submit', 'modesto' ) . '</button></div></div></form>
    </form>';

	return $output;
}

add_filter( 'the_password_form', 'modesto_password_form' );