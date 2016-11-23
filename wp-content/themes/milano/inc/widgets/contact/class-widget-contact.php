<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

class Modesto_Widget_Contact extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'description' => 'Contact form' );
		parent::__construct( false, __( 'Theme widget: Contact form', 'modesto' ), $widget_ops );
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( $instance['title'] ) {
			echo $args['before_title'];
			echo apply_filters( 'widget_title', $instance['title'] );
			echo $args['after_title'];
		}

		$button_text = $instance['button_text'];
		$view_path   = get_template_directory() . '/inc/widgets/contact/views/widget.php';
		echo fw_render_view( $view_path, compact( 'button_text' ) );
		
		echo $args['after_widget'];
	}

	public function form( $instance ) {

		$instance = wp_parse_args( (array) $instance, array(
			'title'       => '',
			'email'       => '',
			'button_text' => esc_html__( 'send message', 'modesto' ),

		) );

		$title       = $instance['title'];
		$email       = $instance['email'];
		$button_text = $instance['button_text'];

		$widget_output = '';

		$widget_output .= '<p>';
		$widget_output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">' . esc_html__( 'Title', 'modesto' ) . '</label>';
		$widget_output .= '<input class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" type="text" value="' . esc_attr( $title ) . '">';
		$widget_output .= '</p>';

		$widget_output .= '<p>';
		$widget_output .= '<label for="' . esc_attr( $this->get_field_id( 'email' ) ) . '">' . esc_html__( 'Email', 'modesto' ) . '</label>';
		$widget_output .= '<input class="widefat" id="' . esc_attr( $this->get_field_id( 'email' ) ) . '" name="' . esc_attr( $this->get_field_name( 'email' ) ) . '" type="text" value="' . esc_attr( $email ) . '">';
		$widget_output .= '</p>';

		$widget_output .= '<p>';
		$widget_output .= '<label for="' . esc_attr( $this->get_field_id( 'button_text' ) ) . '">' . esc_html__( 'Text on the button', 'modesto' ) . '</label>';
		$widget_output .= '<input class="widefat" id="' . esc_attr( $this->get_field_id( 'button_text' ) ) . '" name="' . esc_attr( $this->get_field_name( 'button_text' ) ) . '" type="text" value="' . esc_attr( $button_text ) . '">';
		$widget_output .= '</p>';

		echo apply_filters( '_modesto_contact_widget', $widget_output );
	}

	public function update( $new_instance, $old_instance ) {

		$instance = array();

		$instance['title'] = strip_tags( $new_instance['title'] );

		$instance['email'] = $new_instance['email'];

		$instance['button_text'] = strip_tags( $new_instance['button_text'] );

		return $instance;

	}

}