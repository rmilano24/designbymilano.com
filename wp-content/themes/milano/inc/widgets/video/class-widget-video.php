<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

class Modesto_Widget_Video extends WP_Widget {

	/**
	 * @internal
	 */
	public function __construct() {
		$widget_ops = array( 'description' => '' );
		parent::__construct( false, __( 'Theme widget: Video Widget', 'modesto' ), $widget_ops );
		add_action( 'admin_enqueue_scripts', array( $this, 'upload_scripts' ) );
	}

	public function upload_scripts() {
		wp_enqueue_media();
	}

	/**
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

		echo $args['before_widget'];

		if ( $instance['title'] ) {
			echo $args['before_title'];
			echo esc_html( $instance['title'] );
			echo $args['after_title'];
		}

		$url          = isset( $instance['url'] ) ? $instance['url'] : '';
		$image        = isset( $instance['image'] ) ? $instance['image'] : '';
		$video_title  = isset( $instance['video_title'] ) ? $instance['video_title'] : '';
		$video_box_id = uniqid( 'widget_video' );
		$thumbnail    = ! empty( $image ) ? $image : get_template_directory_uri() . '/images/no-photo-video.png';
		?>
		<div class="portfolio-detail-entry">
			<img src="<?php echo esc_url( fw_resize( $thumbnail, 720, 480, true ) ); ?>" alt="<?php echo esc_attr( $video_title ); ?>">
			<a class="play-button open-video" href="#<?php echo esc_attr( $video_box_id ); ?>"></a>
		</div>
		<?php if ( ! empty( $video_title ) ) { ?>
			<div class="empty-space col-xs-b20"></div>
			<h5 class="h5"><strong><?php echo esc_html( $video_title ); ?></strong></h5>
		<?php } ?>
		<div id="<?php echo esc_attr( $video_box_id ); ?>" class="popup-video-holder mfp-hide">
			<div class="plyr" data-source="oembed">
				<?php
				$video_link = $url;
				if ( preg_match( "/(youtube.com)/", $video_link ) ) {
					$video_id   = explode( "v=", preg_replace( "/(&)+(.*)/", null, $video_link ) );
					$youtube_id = $video_id[1];
				} elseif ( preg_match( "/(youtu.be)/", $video_link ) ) {
					$video_id   = explode( "/", preg_replace( "/(&)+(.*)/", null, $video_link ) );
					$youtube_id = $video_id[3];

				} elseif ( preg_match( "/(vimeo.com)/", $video_link ) ) {
					preg_match( '#(?:https?://)?(?:www.)?(?:player.)?vimeo.com/(?:[a-z]*/)*([0-9]{6,11})[?]?.*#', $video_link, $matches );
					$vimeo_id = $matches[1];
				}
				if ( ! empty( $youtube_id ) ) {
					echo '<div data-video-id="' . $youtube_id . '" data-type="youtube"></div>';
				} elseif ( ! empty( $vimeo_id ) ) {
					echo '<div data-video-id="' . $vimeo_id . '" data-type="vimeo"></div>';
				} ?>
			</div>
		</div>
		<?php
		echo $args['after_widget'];
	}

	/**
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	/**
	 * @param array $instance
	 *
	 * @return string|void
	 */
	public function form( $instance ) {
		$title       = isset( $instance['title'] ) ? $instance['title'] : '';
		$url         = isset( $instance['url'] ) ? $instance['url'] : '';
		$image       = isset( $instance['image'] ) ? $instance['image'] : '';
		$video_title = isset( $instance['video_title'] ) ? $instance['video_title'] : '';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title', 'modesto' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>"><?php echo esc_html__( 'Embed video link', 'modesto' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'url' ) ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>"><?php echo esc_html__( 'Video placeholder', 'modesto' ); ?>:</label>
			<input class="widefat widget_image_add" id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'image' ) ); ?>" type="text"
			       value="<?php echo esc_url( $image ); ?>">
			<a href="#" class="add-item-image button"><?php echo esc_html__( 'Add image', 'modesto' ); ?></a>
			<a href="#" class="remove-item-image button"><?php echo esc_html__( 'Remove image', 'modesto' ); ?></a>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'video_title' ) ); ?>"><?php echo esc_html__( 'Video Title', 'modesto' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'video_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'video_title' ) ); ?>" type="text"
			       value="<?php echo esc_attr( $video_title ); ?>">
		</p>
		<?php
	}
}
