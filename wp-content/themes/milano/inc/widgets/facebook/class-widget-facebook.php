<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

class Modesto_Widget_Facebook extends WP_Widget {

	/**
	 * @internal
	 */
	function __construct() {
		$widget_ops = array( 'description' => 'Page Steam' );
		parent::__construct( false, __( 'Theme widget: Facebook', 'modesto' ), $widget_ops );
	}

	/**
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

		echo $args['before_widget'];

		$title = apply_filters( 'widget_title', $instance['title'] );

		if ( strpos( $instance['url'], 'http' ) !== false ) {
			$url = $instance['url'];
		} else {
			$url = 'https://www.facebook.com/' . $instance['url'];
		}
		$width             = $instance['width'];
		$height            = $instance['height'];
		$small_headder     = $instance['small_header'];
		$hide_cover        = $instance['hide_cover'];
		$show_faces        = $instance['show_faces'];
		$page_posts        = $instance['page_posts'];
		$small_header_show = ( 'on' === $small_headder ) ? 'true' : 'false';
		$hide_cover_show   = ( 'on' === $hide_cover ) ? 'true' : 'false';
		$show_faces_show   = ( 'off' !== $show_faces ) ? 'true' : 'false';
		$page_posts_show   = ( 'on' === $page_posts ) ? 'true' : 'false';

		if ( $instance['title'] ) {
			echo $args['before_title'];
			echo esc_html( $title );
			echo $args['after_title'];
		} ?>

		<div class="fb-page"
		     data-href="<?php echo esc_url( $url ); ?>"
		     data-width="<?php echo esc_attr( $width ); ?>"
		     data-height="<?php echo esc_attr( $height ); ?>"
		     data-small-header="<?php echo esc_attr( $small_header_show ); ?>"
		     data-hide-cover="<?php echo esc_attr( $hide_cover_show ); ?>"
		     data-show-facepile="<?php echo esc_attr( $show_faces_show ); ?>"
		     data-show-posts="<?php echo esc_attr( $page_posts_show ); ?>"
		     data-adapt-container-width="true">
		</div>
		<div id="fb-root"></div>
		<script>
			(function (d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s);
				js.id = id;
				js.src = "//connect.facebook.net/<?php echo esc_html( get_locale() ) ?>/sdk.js#xfbml=1&version=v2.3";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>

		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {

		$instance = wp_parse_args( (array) $instance, array(
			'title'        => __( 'Facebook', 'modesto' ),
			'url'          => '',
			'width'        => '360',
			'height'       => '',
			'small_header' => '',
			'hide_cover'   => '',
			'show_faces'   => '',
			'page_posts'   => '',
		) );

		$title        = $instance['title'];
		$url          = $instance['url'];
		$width        = $instance['width'];
		$height       = $instance['height'];
		$small_header = $instance['small_header'] ? 'checked="checked"' : '';;
		$hide_cover = $instance['hide_cover'] ? 'checked="checked"' : '';;
		$show_faces = $instance['show_faces'] ? 'checked="checked"' : '';;
		$page_posts = $instance['page_posts'] ? 'checked="checked"' : '';;

		$widget_output = '';

		$widget_output .= '<p>';
		$widget_output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">' . __( 'Title', 'modesto' ) . '</label>';
		$widget_output .= '<input class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" type="text" value="' . esc_attr( $title ) . '">';
		$widget_output .= '</p>';

		$widget_output .= '<p>';
		$widget_output .= '<label for="' . esc_attr( $this->get_field_id( 'url' ) ) . '">' . __( 'URL:', 'modesto' ) . '</label>';
		$widget_output .= '<input class="widefat" id="' . esc_attr( $this->get_field_id( 'url' ) ) . '" name="' . esc_attr( $this->get_field_name( 'url' ) ) . '" type="text" value="' . esc_attr( $url ) . '">';
		$widget_output .= '</p>';

		$widget_output .= '<p>';
		$widget_output .= '<label for="' . esc_attr( $this->get_field_id( 'width' ) ) . '">' . __( 'Width', 'modesto' ) . '</label>';
		$widget_output .= '<input class="widefat" id="' . esc_attr( $this->get_field_id( 'width' ) ) . '" name="' . esc_attr( $this->get_field_name( 'width' ) ) . '" type="text" value="' . esc_attr( $width ) . '">';
		$widget_output .= '</p>';

		$widget_output .= '<p>';
		$widget_output .= '<label for="' . esc_attr( $this->get_field_id( 'height' ) ) . '">' . __( 'Height', 'modesto' ) . '</label>';
		$widget_output .= '<input class="widefat" id="' . esc_attr( $this->get_field_id( 'height' ) ) . '" name="' . esc_attr( $this->get_field_name( 'height' ) ) . '" type="text" value="' . esc_attr( $height ) . '">';
		$widget_output .= '</p>';

		$widget_output .= '<p>';
		$widget_output .= '<input class="widefat" id="' . esc_attr( $this->get_field_id( 'small_header' ) ) . '" name="' . esc_attr( $this->get_field_name( 'small_header' ) ) . '" type="checkbox" ' . esc_attr( $small_header
			) . '>';
		$widget_output .= '<label for="' . esc_attr( $this->get_field_id( 'small_header' ) ) . '">' . __( 'Small header', 'modesto' ) . '</label>';
		$widget_output .= '<br/>';

		$widget_output .= '<input class="widefat" id="' . esc_attr( $this->get_field_id( 'hide_cover' ) ) . '" name="' . esc_attr( $this->get_field_name( 'hide_cover' ) ) . '" type="checkbox" ' . esc_attr( $hide_cover ) .
		                  '>';
		$widget_output .= '<label for="' . esc_attr( $this->get_field_id( 'hide_cover' ) ) . '">' . __( 'Hide Cover Photo', 'modesto' ) . '</label>';
		$widget_output .= '<br/>';

		$widget_output .= '<input class="widefat" id="' . esc_attr( $this->get_field_id( 'show_faces' ) ) . '" name="' . esc_attr( $this->get_field_name( 'show_faces' ) ) . '" type="checkbox" ' . esc_attr( $show_faces ) .
		                  '>';
		$widget_output .= '<label for="' . esc_attr( $this->get_field_id( 'show_faces' ) ) . '">' . __( 'Show Friend\'s Faces', 'modesto' ) . '</label>';
		$widget_output .= '<br/>';

		$widget_output .= '<input class="widefat" id="' . esc_attr( $this->get_field_id( 'page_posts' ) ) . '" name="' . esc_attr( $this->get_field_name( 'page_posts' ) ) . '" type="checkbox" ' . esc_attr( $page_posts ) .
		                  '>';
		$widget_output .= '<label for="' . esc_attr( $this->get_field_id( 'page_posts' ) ) . '">' . __( 'Show Page Posts', 'modesto' ) . '</label>';
		$widget_output .= '<br/>';

		$widget_output .= '</p>';

		echo( $widget_output );

	}


	public function update( $new_instance, $old_instance ) {

		$instance = array();

		$instance['title'] = strip_tags( $new_instance['title'] );

		$instance['url'] = strip_tags( $new_instance['url'] );

		$instance['width'] = strip_tags( $new_instance['width'] );

		$instance['height'] = strip_tags( $new_instance['height'] );

		$instance['small_header'] = strip_tags( $new_instance['small_header'] );

		$instance['hide_cover'] = strip_tags( $new_instance['hide_cover'] );

		$instance['show_faces'] = strip_tags( $new_instance['show_faces'] );

		$instance['page_posts'] = strip_tags( $new_instance['page_posts'] );

		return $instance;

	}
}


