<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

class Modesto_Widget_Social extends WP_Widget {

	/**
	 * Mandatory constructor needs to call the parent constructor with the
	 * following params: id (if false, one will be generated automatically),
	 * the title of the widget (can be translated, of course), and last, params
	 * to further configure the widget.
	 * see https://codex.wordpress.org/Widgets_API for more info
	 */
	public function __construct() {
		parent::__construct(
			false,
			__( 'Theme widget: Social networks', 'modesto' ),
			array( 'description' => '', 'classname' => 'w-soc' )
		);
	}
	/**
	 * Renders the widget to the visitors
	 */
	public function widget( $args, $instance ) {

		echo $args['before_widget'];
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		$style = isset( $instance['soc_style'] ) ? $instance['soc_style'] : 'style-2';
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
		}
		echo modesto_get_socials( $style, false );
		echo $args['after_widget'];

	}
	/**
	 * Sanitizes the widget input before saving the data
	 */
	public function update( $new_instance, $old_instance ) {
		$instance            = array();
		$instance['title']   = wp_kses_post( $new_instance['title'] );
		$instance['soc_style']   = $new_instance['soc_style'];

		return $instance;
	}
	/**
	 * The most important function, used to show the widget form in the wp-admin
	 */
	public function form( $instance ) {
		$title = empty( $instance['title'] ) ? 'Follow us' : $instance['title'];
		$social_network_style = array(
			'style-1' => __( 'Simple', 'modesto' ),
			'style-4' => __( 'Rounded light gray', 'modesto' ),
			'style-2' => __( 'Rounded dark gray', 'modesto' ),
			'style-5' => __( 'Rounded dark', 'modesto' ),
		);
		$soc_style = isset( $instance['soc_style'] ) ? $instance['soc_style'] : '';

		$widget_output = '<p>';
		$widget_output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">' . esc_html__( 'Title', 'modesto' ) . ':</label>';
		$widget_output .= '<input class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" type="text" value="' . esc_attr( $title ) . '">';
		$widget_output .= '</p>';

		$widget_output .= '<p>';
		$widget_output .= '<label for="' . $this->get_field_id( 'soc_style' ) . '">' . esc_html__( 'Social networks style', 'modesto' ) . ':</label>';
		$widget_output .= '<select class="widefat" id="' . $this->get_field_id( 'soc_style' ) . '" name="' . $this->get_field_name( 'soc_style' ) . '">';

		foreach ( $social_network_style as $key => $value ) {
			$selected = ( $key === $soc_style ) ? ' selected="selected"' : '';
			$widget_output .= '<option' . $selected . ' value="' . $key . '">' . $value . '</option>';
		}
		$widget_output .= '</select>';
		$widget_output .= '</p>';

		echo( $widget_output );

	}

}
