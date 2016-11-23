<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */


$youtube_id   = $vimeo_id = '';
$type         = fw_akg( 'type/selected', $atts, 'player' );
$image        = fw_akg( 'placeholder/url', $atts, '' );
$source       = fw_akg( 'selected/source', $atts, 'oembed' );
$video_box_id = uniqid( 'video' );

$add_class     = fw_akg( 'add_class', $atts );
$margin_bottom = fw_akg( 'margin_class', $atts, '' );
if ( ! empty( $margin_bottom ) ) {
	$add_class .= ' custom-space col-sm-' . $margin_bottom;
}
$add_style = fw_akg( 'inline_style', $atts );

if ( ! empty( $add_style ) ) {
	if ( substr_count( $add_style, 'style=' ) > 0 ) {
		$custom_style = $add_style;
	} else {
		$custom_style = 'style=' . $add_style . '"';
	}
} else {
	$custom_style = '';
}

$animation = fw_akg('animation',$atts);
if(!empty($animation)){
	wp_enqueue_script( 'modesto-aos-animation' );
	$animation_data = 'aos="'.esc_attr($animation).'"';
}else{
	$animation_data = '';
}

ob_start();
// Generate video player.
?>
<div class="plyr" data-source="<?php echo esc_attr( $source ); ?>">
	<?php if ( 'oembed' === $source ) {
		$video_link = fw_akg( 'selected/oembed/source', $atts, '' );
		if ( preg_match( "/(youtube.com)/", $video_link ) ) {
			$video_id   = explode( "v=", preg_replace( "/(&)+(.*)/", null, $video_link ) );
			$youtube_id = $video_id[1];
		} elseif ( preg_match( "/(youtu.be)/", $video_link ) ) {
			$video_id   = explode( "/", preg_replace( "/(&)+(.*)/", null, $video_link ) );
			$youtube_id = $video_id[3];

		} elseif ( preg_match( "/(vimeo.com)/", $video_link ) ) {
			$regexstr = '/https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/';
			preg_match( $regexstr, $video_link, $matches );
			$vimeo_id = $matches[3];
		}
		if ( ! empty( $youtube_id ) ) {
			echo '<div data-video-id="' . $youtube_id . '" data-type="youtube"></div>';
		} elseif ( ! empty( $vimeo_id ) ) {
			echo '<div data-video-id="' . $vimeo_id . '" data-type="vimeo"></div>';
		} ?>
	<?php } else { ?>
		<video poster="<?php echo esc_url( $image ); ?>" controls>
			<!-- Video files -->
			<?php
			$mp4_link = fw_akg( 'selected/self/mp4', $atts, '' );
			$source   = fw_akg( 'selected/self', $atts, array() );
			foreach ( $source as $key => $value ) {
				if ( ! empty( $value ) ) {
					echo '<source src="' . esc_url( $value ) . '" type="video/' . esc_attr( $key ) . '">';
				}
			} ?>
			<?php if ( ! empty( $mp4_link ) ) { ?>
				<!-- Fallback for browsers that don't support the <video> element -->
				<a href="<?php echo esc_url( $mp4_link ); ?>"><?php esc_html_e( 'Download', 'modesto' ); ?></a>
			<?php } ?>
		</video>
	<?php } ?>
</div>
<?php $video_player_html = ob_get_clean(); ?>

<div class="crumina-block <?php echo esc_attr( $add_class ) ?>" <?php echo( $custom_style ) ?> <?php echo( $animation_data ) ?>>
	<?php if ( 'button' === $type ) { ?>
		<?php $button_wrap_class = ( ! empty( $image ) ) ? 'button-wrapper' : 'empty-space col-xs-b90'; ?>
		<?php $button_wrap_class .= ' ' . fw_akg( 'type/button/color', $atts, 'white' ) . '-play-button'; ?>

		<div class="<?php echo esc_attr( $button_wrap_class ); ?>">
			<?php if ( ! empty( $image ) ) {
				echo fw_html_tag( 'img', array( 'src' => esc_url( $image ), 'alt' => '' ) );
			} ?>
			<a class="play-button open-video" href="#<?php echo esc_attr( $video_box_id ); ?>"></a>
		</div>
		<div id="<?php echo esc_attr( $video_box_id ); ?>" class="popup-video-holder mfp-hide">
			<?php echo( $video_player_html ); ?>
		</div>
	<?php } else {
		echo( $video_player_html );
	} ?>
</div>
