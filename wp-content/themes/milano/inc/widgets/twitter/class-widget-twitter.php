<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

if ( defined( 'FW' ) && class_exists( 'TwitterOAuth' ) && function_exists( 'curl_exec' ) ) {

	class Modesto_Widget_Twitter extends WP_Widget {

		/**
		 * @internal
		 */
		function __construct() {
			$widget_ops = array( 'description' => __( 'Twitter Feed Slider', 'modesto' ) );
			parent::__construct( false, __( 'Theme widget: Twitter', 'modesto' ), $widget_ops );
		}

		/**
		 * @param array $args
		 * @param array $instance
		 */
		function widget( $args, $instance ) {

			$user          = esc_attr( $instance['user'] );
			$title         = esc_attr( $instance['title'] );
			$style         = esc_attr( $instance['style'] );
			$number        = ( (int) ( esc_attr( $instance['number'] ) ) > 0 ) ? esc_attr( $instance['number'] ) : 5;
			$before_widget = $args['before_widget'];
			$after_widget  = $args['after_widget'];

			$consumer_key         = fw_get_db_settings_option( 'twitter-consumer-key' );
			$consumer_secret      = fw_get_db_settings_option( 'twitter-consumer-secret' );
			$access_tocken        = fw_get_db_settings_option( 'twitter-access-token' );
			$access_tocken_secret = fw_get_db_settings_option( 'twitter-access-token-secret' );

			if ( fw()->extensions->get( 'social' ) ) {
				if ( empty( $consumer_key ) ) {
					$consumer_key = fw_get_db_ext_settings_option( 'social', 'twitter-consumer-key' );
				}
				if ( empty( $consumer_secret ) ) {
					$consumer_secret = fw_get_db_ext_settings_option( 'social', 'twitter-consumer-secret' );
				}
				if ( empty( $access_tocken ) ) {
					$access_tocken = fw_get_db_ext_settings_option( 'social', 'twitter-access-token' );
				}
				if ( empty( $access_tocken_secret ) ) {
					$access_tocken_secret = fw_get_db_ext_settings_option( 'social', 'twitter-access-token-secret' );
				}


				if ( $title ) {
					$title = $args['before_title'] . $title . $args['after_title'];
				}

				$tweets = get_site_transient( 'scratch_tweets_' . $user . '_' . $number );

				if ( empty( $tweets ) ) {
					/* @var $connection TwitterOAuth */

					$connection = new TwitterOAuth( $consumer_key, $consumer_secret, $access_tocken, $access_tocken_secret );
					$tweets     = $connection->get( 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=' . $user . '&count=' . $number );

					set_site_transient( 'scratch_tweets_' . $user . '_' . $number, $tweets, HOUR_IN_SECONDS );
				}
			}
			$view_path = get_template_directory() . 'inc/widgets/twitter/views/widget.php';
			echo fw_render_view( $view_path, compact( 'before_widget', 'title', 'tweets', 'number', 'size', 'style', 'after_widget' ) );
		}

		function update( $new_instance, $old_instance ) {
			return $new_instance;
		}

		function form( $instance ) {
			$instance = wp_parse_args( (array) $instance, array(
				'user'   => '',
				'number' => '',
				'title'  => '',
				'style'  => ''
			) );
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'modesto' ); ?>:</label>
				<input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>"
				       value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat"
				       id="<?php $this->get_field_id( 'title' ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'user' ); ?>"><?php _e( 'User', 'modesto' ); ?> :</label>
				<input type="text" name="<?php echo $this->get_field_name( 'user' ); ?>"
				       value="<?php echo esc_attr( $instance['user'] ); ?>" class="widefat"
				       id="<?php $this->get_field_id( 'user' ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of tweets', 'modesto' ); ?>:</label>
				<input type="text" name="<?php echo $this->get_field_name( 'number' ); ?>"
				       value="<?php echo esc_attr( $instance['number'] ); ?>" class="widefat"
				       id="<?php echo $this->get_field_id( 'number' ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php _e( 'Select style', 'modesto' ); ?>:</label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'style' ) ); ?>" class="widefat">
					<option value="gray" <?php selected( 'gray', $instance['style'] ) ?>><?php esc_html_e( 'Gray', 'modesto' ); ?></option>
					<option value="blue" <?php selected( 'blue', $instance['style'] ) ?>><?php esc_html_e( 'Blue', 'modesto' ); ?></option>
				</select>
			</p>
			<?php
		}
	}
}

